<?php

$app->get('/dynamicquiz/start', function () use ($app) {
    $simple = $app->simple;

    $session = $app->session;

    $locations = \ORM::for_table('location')->select_many('suburb')->order_by_asc('suburb')->find_many();
    $suburbs = array();
    foreach ($locations as $location) {
        $suburbs[] = $location["suburb"];
    }

    $app->render('dynamicquiz/start.php', array('session' => $session, 'suburbs' => $suburbs));
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

