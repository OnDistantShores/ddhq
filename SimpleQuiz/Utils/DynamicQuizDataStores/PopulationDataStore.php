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

        $question = new DynamicQuizQuestion();
        $question->setDescription("How many " . $gender . "s aged " . $age . " are there in " . $location . "?");
        $question->setCorrectAnswer(123);
        $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber(123));
        $question->setDidYouKnowHtml("<div><p><strong>Did you know you're in the majority group?</strong></p><p>Here's a graph to tell you more.</p></div>");
        return array($question);
    }
}
