<?php
namespace SimpleQuiz\Utils;

abstract class DynamicQuizDataStore {

    abstract public function getRelevantDataQuestions($gender, $age, $location);

    protected function generateRandomWrongAnswersForNumber($number) {
        return array(
            round($number / 10),
            $number * 10,
            $number * 100,
        );
    }

}
