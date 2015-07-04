<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

use SimpleQuiz\Utils\DynamicQuizDataStore;
use SimpleQuiz\Utils\DynamicQuizQuestion;

/**
 * Uses the Cancer incidence & mortality data
 * @url http://data.gov.au/dataset/australian-cancer-incidence-and-mortality
 */
class CancerDataStore extends DynamicQuizDataStore {

    protected $_data = null;
    protected $_rawAge = null;
    protected $_rawGender = null;

    public function __construct() {
        $this->_questionIds[0] = "Cancer-HowManyPeopleDieOfCancerYourAgeGender";
    }

    public function getRelevantDataQuestions($gender, $age, $location) {

        $this->_rawGender = $gender;
        $this->_rawAge = $age;

        // Make sure we get some data
        if ($this->retrieveData()) {

            $correctAnswer = $this->getCorrectAnswer();
            $didYouKnowData = $this->getDidYouKnowData();

            $question = new DynamicQuizQuestion($this->_questionIds[0]);
            $question->setDescription("How many " . lcfirst($gender) . "s aged " . $this->getAgeReadable($age) . " died of cancer in 2011?");
            $question->setCorrectAnswer($correctAnswer);
            $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber($correctAnswer));

            $dataKeys = array_keys($this->_data);
            $dataValues = array_values($this->_data);

            $question->setDidYouKnowHtml("<p><strong>" . $dataKeys[0] . " is the biggest killer amongst " . lcfirst($gender) . "s aged " . $this->getAgeReadable($age) . ", killing " . number_format($dataValues[0]) . " " . lcfirst($gender) . "s in 2011.</strong></p>"
                                         . $question->generateBarChartHtml($didYouKnowData));

            return array($question);
        }

        return array();
    }

    protected function retrieveData() {

        $ageFieldName = $this->getAgeGroupFieldName($this->_rawAge);
        if (!$ageFieldName) {
            return false;
        }

        $result = \ORM::for_table('cancer')
                    ->raw_query("SELECT Cancer_Type, " . $ageFieldName . " AS value
                                FROM cancer
                                WHERE Sex = '" . $this->_rawGender . "'
                                ORDER BY " . $ageFieldName . " DESC")
                    ->find_many();

        $this->_data = array();
        foreach ($result as $row) {
            $this->_data[$row["Cancer_Type"]] = $row["value"];
        }

        if (count($this->_data) > 0) {
            return true;
        }

        return false;
    }

    protected function getCorrectAnswer() {
        return array_sum($this->_data);
    }

    protected function getDidYouKnowData(){
        // Get the first 10 - the dataset's too long otherwise
        return array_slice($this->_data, 0, 10, true);
    }

    protected function getAgeGroupFieldName($age) {
      switch($age){
        case ($age>=0 && $age<=4)   : return "Age_0_to_4";
        case ($age>=5 && $age<=9)   : return "Age_5_to_9";
        case ($age>=10 && $age<=14) : return "Age_10_to_14";
        case ($age>=15 && $age<=19) : return "Age_15_to_19";
        case ($age>=20 && $age<=24) : return "Age_20_to_24";
        case ($age>=25 && $age<=29) : return "Age_25_to_29";
        case ($age>=30 && $age<=34) : return "Age_30_to_34";
        case ($age>=35 && $age<=39) : return "Age_35_to_39";
        case ($age>=40 && $age<=44) : return "Age_40_to_44";
        case ($age>=45 && $age<=49) : return "Age_45_to_49";
        case ($age>=50 && $age<=54) : return "Age_50_to_54";
        case ($age>=55 && $age<=59) : return "Age_55_to_59";
        case ($age>=60 && $age<=64) : return "Age_60_to_64";
        case ($age>=65 && $age<=69) : return "Age_65_to_69";
        case ($age>=70 && $age<=74) : return "Age_70_to_74";
        case ($age>=75 && $age<=79) : return "Age_75_to_79";
        case ($age>=80 && $age<=84) : return "Age_80_to_84";
        case ($age>=85) : return "Age_85";
      }
      return null;
    }

    protected function getAgeReadable($age) {
      switch($age){
        case ($age>=0 && $age<=4)   : return "0-4";
        case ($age>=5 && $age<=9)   : return "5-9";
        case ($age>=10 && $age<=14) : return "10-14";
        case ($age>=15 && $age<=19) : return "15-19";
        case ($age>=20 && $age<=24) : return "20-24";
        case ($age>=25 && $age<=29) : return "25-29";
        case ($age>=30 && $age<=34) : return "30-34";
        case ($age>=35 && $age<=39) : return "35-39";
        case ($age>=40 && $age<=44) : return "40-44";
        case ($age>=45 && $age<=49) : return "45-49";
        case ($age>=50 && $age<=54) : return "50-54";
        case ($age>=55 && $age<=59) : return "55-59";
        case ($age>=60 && $age<=64) : return "60-64";
        case ($age>=65 && $age<=69) : return "65-69";
        case ($age>=70 && $age<=74) : return "70-74";
        case ($age>=75 && $age<=79) : return "75-79";
        case ($age>=80 && $age<=84) : return "80-84";
        case ($age>=85) : return "85+";
      }
      return null;
    }
}
