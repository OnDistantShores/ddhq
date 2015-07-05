<?php
namespace SimpleQuiz\Utils;

abstract class DynamicQuizDataStore {

    protected $_questionIds = array();

    public function getSupportedQuestionIds() {
        return $this->_questionIds;
    }

    abstract public function getRelevantDataQuestions($gender, $age, $location);

    protected function generateRandomWrongAnswersForNumber($number, $percentageRandomVariation = 100) {
        $answers = array();

        for ($i = 0; $i < 3; $i++) {
            $answers[] = $number + mt_rand((-1 * $number * ($percentageRandomVariation / 100)), ($number * ($percentageRandomVariation / 100)));
        }

        return $answers;
    }

}
