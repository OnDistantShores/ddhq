<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

use SimpleQuiz\Utils\DynamicQuizDataStore;
use SimpleQuiz\Utils\DynamicQuizQuestion;

/**
 * Uses the ATO individual tax tables data
 * @url https://www.ato.gov.au/About-ATO/Research-and-statistics/In-detail/Tax-statistics/Taxation-statistics-2012-13/?page=22#Individuals
 */
class WagesDataStore extends DynamicQuizDataStore {

    protected $_data = null;
    protected $_rawAge = null;
    protected $_rawGender = null;
    protected $_rawLocation = null;
    protected $_state = null;
    protected $_stateCode = null;
    protected $_ageRange = null;

    public function __construct() {
        $this->_questionIds[0] = "Wages-AverageSalaryForYourAgeGenderState";
    }

    public function getRelevantDataQuestions($gender, $age, $location) {

        $this->_rawGender = $gender;
        $this->_rawAge = $age;
        $this->_rawLocation = $location;

        $this->_state = $location->getState();
        $this->_stateCode = $this->getStateCode($this->_state);
        $this->_ageRange = $this->getAgeRange($this->_rawAge);

        if ($this->_stateCode && $this->_ageRange) {

            // Make sure we get some data
            if ($this->retrieveData()) {

                $correctAnswer = $this->getCorrectAnswer();
                if ($correctAnswer) {

                    $didYouKnowDataByAge = $this->getDidYouKnowDataByAge();

                    $question = new DynamicQuizQuestion($this->_questionIds[0]);
                    $question->setNumberFormattingPrefix("$");
                    $question->setDescription("In 2013-14, what was the average salary for " . lcfirst($gender) . "s aged " . $this->_ageRange . " in " . $this->_state . "?");
                    $question->setCorrectAnswer($correctAnswer);
                    $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber($correctAnswer, 40));

                    // Find the biggest earning group
                    $didYouKnowDataByAgeCopy = $didYouKnowDataByAge;
                    arsort($didYouKnowDataByAgeCopy);
                    $keys = array_keys($didYouKnowDataByAgeCopy);

                    $question->setDidYouKnowHtml("<p><strong>" . ucfirst($gender) . "s aged " . $keys[0] . " were the highest earning " . lcfirst($gender) . "s in " . $this->_state . " in 2013-14, earning an average of $" . number_format($didYouKnowDataByAge[$keys[0]]) . " per taxable person.</strong></p>"
                                                 . $question->generateBarChartHtml($didYouKnowDataByAge)
                                                 . "<p>It's always a good time to take control of your Superannuation!</p>");

                    return array($question);
                }
            }
        }

        return array();
    }

    protected function retrieveData() {

        $result = \ORM::for_table('wages')
                    ->raw_query("SELECT Gender, Age_Range, SUM(Salary_or_wages_no) AS the_count, SUM(Salary_or_wages) AS the_total
                                FROM wages
                                WHERE StateTerritory = '" . $this->_stateCode . "'
                                GROUP BY Gender, Age_Range
                                ORDER BY Gender, Age_Range")
                    ->find_many();

        $this->_data = array();
        foreach ($result as $row) {
            $this->_data[] = array(
                "Gender" => $row["Gender"],
                "Age_Range" => $row["Age_Range"],
                "count" => $row["the_count"],
                "total" => $row["the_total"],
            );
        }

        if (count($this->_data) > 0) {
            return true;
        }

        return false;
    }

    protected function getCorrectAnswer() {
        foreach ($this->_data as $row) {
            if ($row["Gender"] == $this->_rawGender && $row["Age_Range"] == $this->_ageRange) {
                return round($row["total"] / $row["count"]);
            }
        }
        return null;
    }

    protected function getDidYouKnowDataByAge() {
        $rows = array();
        foreach ($this->_data as $row) {
            if ($row["Gender"] == $this->_rawGender) {
                $rows[$row["Age_Range"]] = round($row["total"] / $row["count"]);
            }
        }
        return $rows;
    }

    // TODO Add gender pie graph
    /*protected function getDidYouKnowDataByGender() {
        $rows = array();
        foreach ($this->_data as $row) {
            if ($row["Gender"] == $this->_rawGender) {
                $rows[$row["Age_Range"]] = round($row["total"] / $row["count"]);
            }
        }
        return $rows;
    }*/

    protected function getAgeRange($age) {
      switch($age){
        case ($age>=0 && $age<=17) : return "0-17";
        case ($age>=18 && $age<=24) : return "18-24";
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
        case ($age>=75) : return "75+";
      }
      return null;
    }

    protected function getStateCode($state) {
        $mapping = array(
            "New South Wales" => "NSW",
            "Victoria" => "VIC",
            "Queensland" => "QLD",
            "South Australia" => "SA",
            "Western Australia" => "WA",
            "Tasmania" => "TAS",
            "Northern Territory" => "NT",
            "Australian Capital Territory" => "ACT",
        );

        if (isset($mapping[$state])) {
            return $mapping[$state];
        }

        return null;
    }
}
