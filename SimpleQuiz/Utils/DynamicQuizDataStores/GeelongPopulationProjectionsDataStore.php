<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

use SimpleQuiz\Utils\DynamicQuizDataStore;
use SimpleQuiz\Utils\DynamicQuizQuestion;

/**
 * Uses Geelong's population projections datasets
 * @url https://data.gov.au/dataset/geelong-population-projections
 */
class GeelongPopulationProjectionsDataStore extends DynamicQuizDataStore {

    protected $_data = null;
    protected $_rawLocation = null;

    protected $_projectionYear = "2051";

    public function __construct() {
        $this->_questionIds[0] = "GeelongPopulationProjections-HowManyPeopleWillLiveInYourAreaIn" . $this->_projectionYear;
    }

    public function getRelevantDataQuestions($gender, $age, $location) {

        $this->_rawLocation = $location;

        // Only relevant for Geelongians
        if ($location->getSuburb() == "Geelong" || $location->getDistrict() == "Geelong" || $location->getRegion() == "Geelong") {

            // Make sure we get some data for this suburb
            if ($this->retrieveData()) {

                $correctAnswer = $this->getCorrectAnswer();
                $didYouKnowData = $this->getDidYouKnowData();

                $lowestLevelLocation = $this->_rawLocation->getLowestLevelLocation();

                $question = new DynamicQuizQuestion($this->_questionIds[0]);
                $question->setDescription("According to 2011 estimates, how many people will live in " . $lowestLevelLocation . " in " . $this->_projectionYear . "?");
                $question->setCorrectAnswer($correctAnswer);
                $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber($correctAnswer));

                $years = $this->_projectionYear - 2011;
                $change = round((($this->_data[$this->_projectionYear] - $this->_data["2011"]) / $this->_data["2011"]) * 100, 1);

                $question->setDidYouKnowHtml("<p><strong>The population of " . $lowestLevelLocation . " is set to grow by " . $change . "% over the next " . $years . " years.</strong></p>"
                                             . $question->generateLineChartHtml($didYouKnowData));

                return array($question);
            }
        }

        return array();
    }

    protected function retrieveData() {

        $lowestLevelLocation = $this->_rawLocation->getLowestLevelLocation();

        $result = \ORM::for_table('geelong_population_projections')
                    ->raw_query("SELECT SUM(`2011`) AS `2011`,
                                SUM(`2016`) AS `2016`,
                                SUM(`2021`) AS `2021`,
                                SUM(`2026`) AS `2026`,
                                SUM(`2031`) AS `2031`,
                                SUM(`2036`) AS `2036`,
                                SUM(`2041`) AS `2041`,
                                SUM(`2046`) AS `2046`,
                                SUM(`2051`) AS `2051`
                                FROM geelong_population_projections
                                WHERE lga11_name LIKE '%" . $lowestLevelLocation . "%' OR id_areas LIKE '%" . $lowestLevelLocation . "%' OR settlement LIKE '%" . $lowestLevelLocation . "%'")
                    ->find_one();

        $this->_data = $result->as_array();

        // Check there's actually a number here to see whether the suburb matched
        if ($this->_data["2011"]) {
            return true;
        }

        return false;
    }

    protected function getCorrectAnswer() {
        return $this->_data[$this->_projectionYear];
    }

    protected function getDidYouKnowData(){
        return $this->_data;
    }
}
