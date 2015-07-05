<?php

use SimpleQuiz\Utils\Base\Config;

//$app->get('/dynamicquiz/start/', function () use ($app) {
$app->get('/', function () use ($app) {

    $simple = $app->simple;

    $session = $app->session;

    $fbUser = null;
    $fbCallbackUrl = urlencode(Config::$siteurl . "?fbcallback=1#details");
    $fbLoginUrl = "https://www.facebook.com/dialog/oauth?client_id=472465906249846&redirect_uri=" . $fbCallbackUrl . "&scope=public_profile,user_birthday,user_location"; // TODO cleanup - use Config:: etc

    // If we're here because we have already been auth-ed by Facebook
    if ($app->request()->get("fbcallback") == 1) {
        $code = $app->request()->get("code");

        try {
            $response = file_get_contents("https://graph.facebook.com/v2.3/oauth/access_token?"
                                          . "client_id=472465906249846&"
                                          . "redirect_uri=" . $fbCallbackUrl . "&"
                                          . "client_secret=45689b67d361c7490353a92499010451&"
                                          . "code=" . $code, false, stream_context_create(array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false))));

            $decodedResponse = json_decode($response, true);
            $accessToken = $decodedResponse["access_token"];

            $response = file_get_contents("https://graph.facebook.com/me?access_token=" . $accessToken, false, stream_context_create(array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false))));
            $fbUser = json_decode($response, true);
        }
        catch (Exception $e) {}
    }

    // Load the suburb list, but narrow it down if Facebook data can help here
    $fbnarrowedlocation = 0;
    if ($fbUser && isset($fbUser["location"]) && $fbUser["location"] && isset($fbUser["location"]["name"]) && $fbUser["location"]["name"]) {

        $explodedLocation = explode(",", $fbUser["location"]["name"]);
        $cleanLocation = $explodedLocation[0];

        $locations = \ORM::for_table('location')
                    ->raw_query("SELECT suburb FROM location WHERE state = '" . $cleanLocation . "' OR region = '" . $cleanLocation . "' OR district = '" . $cleanLocation . "' OR suburb = '" . $cleanLocation . "'")
                    ->find_many();

        $fbNarrowedLocation = 1;
    }
    else {
        $locations = \ORM::for_table('location')->select_many('suburb')->order_by_asc('suburb')->find_many();
    }

    $suburbs = array();
    foreach ($locations as $location) {
        $suburbs[] = $location["suburb"];
    }

    $templateData = array('session' => $session, 'suburbs' => $suburbs, 'hideStripeHeader' => true);
    if ($fbUser) {
        $templateData['fbLoginSuccess'] = 1;
        $templateData['fbNarrowedLocation'] = $fbNarrowedLocation;

        $templateData['fbName'] = $fbUser["first_name"];
        $templateData['fbImage'] = "http://graph.facebook.com/" . $fbUser["id"] . "/picture?type=large";
        $templateData['fbGender'] = (isset($fbUser["gender"]) ? ucfirst($fbUser["gender"]) : null);

        if (isset($fbUser["birthday"])) {
            $dateParts = explode("/", $fbUser["birthday"]);
            if (count($dateParts) == 3) {
                $templateData['fbAge'] = 2015 - $dateParts[2]; // TODO clean up this
            }
        }
    }
    else {
        $templateData['fbLoginUrl'] = $fbLoginUrl;
    }

    $app->render('dynamicquiz/start.php', $templateData);
});

$app->post('/dynamicquiz/question', function () use ($app) {
    $simple = $app->simple;
    $quiz = $app->dynamicQuiz;

    $session = $app->session;

    $starting = $app->request()->post('starting');
    if ($starting) {

        // Set up session
        $session->set('score', 0);
        $session->set('finished', 0);
        $session->set('num', 0);
        $session->set('finishedtime', null);
        $session->set('starttime', date('Y-m-d H:i:s'));

        // Set up personalisation selected
        $session->set('gender', $app->request()->post('gender'));
        $session->set('age', $app->request()->post('age'));
        $session->set('location', $app->request()->post('location'));

        // Keep track of which questions not to show
        $session->set('questionsAlreadyPresented', array());
    }
    else {
        // A question was answered - update scores
        $session->set('num', $session->get('num') + 1);
        if ($app->request()->post('result') == "1") {
            $session->set('score', $session->get('score') + 1);
        }
    }

    // Work out the next question (if there is one...?)

    $quiz->setPersonalisation($session->get('gender'), $session->get('age'), $session->get('location'));

    $questionsAlreadyPresented = $session->get('questionsAlreadyPresented');

    $question = $quiz->generateNextQuestion($questionsAlreadyPresented);

    if ($question == null) {
        $session->set('finished', 1);
        $session->set('finishedtime', date('Y-m-d H:i:s'));

        $app->redirect($app->request->getRootUri() . '/dynamicquiz/results/');
    }
    else {
        $questionsAlreadyPresented[] = $question->getId();
        $session->set('questionsAlreadyPresented', $questionsAlreadyPresented);

        $app->render('dynamicquiz/question.php', array('session' => $session, 'num' => $session->get('num'), 'quiz' => $quiz, 'question' => $question));
    }
});

$app->get('/dynamicquiz/results/', function () use ($app) {
    $simple = $app->simple;
    $quiz = $app->dynamicQuiz;

    $session = $app->session;

    if ($session->get('finished') != 1) {
        $app->redirect($app->request->getRootUri().'/');
    }

    if ($session->get('num') > 0) {
        $app->render('dynamicquiz/results.php', array('num' => $session->get('num'), 'score' => $session->get('score'), 'time' => (strtotime($session->get('finishedtime')) - strtotime($session->get('starttime')))));
    }
    else {
        $app->flashnow('quizerror','The quiz you have selected does not exist. Return to the main menu to try again');
        $app->render('quiz/error.php', array('quiz' => $quiz, 'categories' => $categories, 'session' => $session));
        $app->stop();
    }
});

