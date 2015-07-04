<?php

$app->get('/dynamicquiz/start', function () use ($app) {
    $simple = $app->simple;

    $session = $app->session;

    $app->render('dynamicquiz/start.php', array('session' => $session));
});

$app->post('/dynamicquiz/question', function () use ($app) {
    $simple = $app->simple;
    $quiz = $app->dynamicQuiz;

    $session = $app->session;

    $starting = $app->request()->post('starting');
    if ($starting) {

        // Set up session
        // TODO Is this required? Better way to store this?
        $session->set('score', 0);
        $session->set('finished', 'no');
        $session->set('num', 0);
        $session->set('last', null);
        $session->set('starttime', date('Y-m-d H:i:s'));

        $quiz->setPersonalisation($app->request()->post('gender'), $app->request()->post('age'), $app->request()->post('location'));
    }
    else {
        // TODO Resume quiz progress from session - ensure setPersonalisation() is set
    }

    $session->set('num', $session->get('num') + 1);
    $question = $quiz->generateQuestion();

    $app->render('dynamicquiz/question.php', array('session' => $session, 'num' => $session->get('num'), 'quiz' => $quiz, 'question' => $question));
});

