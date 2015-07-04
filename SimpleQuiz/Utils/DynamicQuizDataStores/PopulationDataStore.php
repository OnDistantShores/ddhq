<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

use SimpleQuiz\Utils\DynamicQuizDataStore;
use SimpleQuiz\Utils\DynamicQuizQuestion;

/**
 * Uses ABS.Stat's Estimated Resident Population data sets
 * @url TODO
 */
class PopulationDataStore extends DynamicQuizDataStore {

    public function getRelevantDataQuestions($gender, $age, $location) {

        // TODO Use real data for all of this!

        $question = new DynamicQuizQuestion("Population-HowManyPeopleYourAgeGenderLocation");
        $question->setDescription("How many " . $gender . "s aged " . $age . " are there in " . $location . "?");
        $question->setCorrectAnswer(123);
        $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber(123));
        $didYouKnowData = array(
            "0-4" => 342,
            "5-9" => 234,
            "10-14" => 122,
            "15-19" => 345,
            "20-24" => 452,
            "25-29" => 233,
        );
        $question->setDidYouKnowHtml("<p><strong>Did you know you're in the majority group?</strong></p>" . $question->generateBarChartHtml($didYouKnowData));
        return array($question);
    }
}
