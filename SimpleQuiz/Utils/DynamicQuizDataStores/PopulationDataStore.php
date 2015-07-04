<?php
namespace SimpleQuiz\Utils\DynamicQuizDataStores;

use SimpleQuiz\Utils\DynamicQuizDataStore;
use SimpleQuiz\Utils\DynamicQuizQuestion;
use SimpleQuiz\Utils\DynamicQuizDataStore\AbsStatContstants;

/**
 * Uses ABS.Stat's Estimated Resident Population data sets
 * @url TODO
 */
class PopulationDataStore extends DynamicQuizDataStore {

    protected $_dataSeriesNodes = null;
    protected $_rawGender = null;
    protected $_rawAge = null;
    protected $_rawLocation = null;
    protected $_genderId = null;
    protected $_ageId = null;
    protected $_ageRange = null;
    protected $_stateId = null;

    public function __construct() {
        $this->_questionIds[0] = "Population-HowManyPeopleYourAgeGenderLocation";
    }

    public function getRelevantDataQuestions($gender, $age, $location) {

        $this->_rawGender = $gender;
        $this->_rawAge = $age;
        $this->_rawLocation = $location;

        $this->_genderId = AbsStatConstants::getGenderId($gender);
        $this->_ageId = AbsStatConstants::getAgeGroupId($age);
        $this->_ageRange = AbsStatConstants::getAgeRangeFromId($this->_ageId);
        $this->_stateId = AbsStatConstants::getStateId($location->getState());

        if ($this->retrieveData()) {
            $correctAnswer = $this->getCorrectAnswer();
            $didYouKnowData = $this->getDidYouKnowData();

            $question = new DynamicQuizQuestion($this->_questionIds[0]);
            $question->setDescription("How many " . lcfirst($gender) . "s aged " . $this->_ageRange . " are there in " . $location->getState() . "?");
            $question->setCorrectAnswer($correctAnswer);
            $question->setWrongAnswers($this->generateRandomWrongAnswersForNumber($correctAnswer));

            $totalMalePopulation = array_sum(array_values($didYouKnowData));
            $percentage = round(($correctAnswer / $totalMalePopulation) * 100, 1);

            $question->setDidYouKnowHtml("<p><strong>The " . $this->_ageRange. " age bracket makes up " . $percentage . "% of " . lcfirst($gender) . "s in " . $location->getState() . ".</strong></p>"
                                         . $question->generateBarChartHtml($didYouKnowData));

            return array($question);
        }

        return array();
    }

    protected function retrieveData() {
        $client = new \SoapClient("http://stat.abs.gov.au/sdmxws/sdmx.asmx?WSDL");

        $xml_params = "<GetGenericData xmlns=\"http://stats.oecd.org/OECDStatWS/SDMX/\">
                    <QueryMessage>
                   <message:QueryMessage xmlns=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/query\" xmlns:message=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/message\" xsi:schemaLocation=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/query http://www.sdmx.org/docs/2_0/SDMXQuery.xsd http://www.SDMX.org/resources/SDMXML/schemas/v2_0/message http://www.sdmx.org/docs/2_0/SDMXMessage.xsd\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\">
        <Header xmlns=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/message\">
            <ID>none</ID>
            <Test>false</Test>
            <Truncated>false</Truncated>
            <Prepared>2015-07-04T00:18:24</Prepared>
            <Sender id=\"YourID\">
                <Name xml:lang=\"en\">Your English Name</Name>
            </Sender>
            <Receiver id=\"ABS\">
                <Name xml:lang=\"en\">Australian Bureau of Statistics</Name>
            </Receiver>
        </Header>
        <Query xmlns=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/message\">
            <DataWhere xmlns=\"http://www.SDMX.org/resources/SDMXML/schemas/v2_0/query\">
                <And>
                    <DataSet>ERP_QUARTERLY</DataSet>
                    <Dimension id=\"FREQUENCY\">Q</Dimension>
                    <Attribute id=\"TIME_FORMAT\">P3M</Attribute>
                    <Time>
                        <StartTime>2014-Q4</StartTime>
                        <EndTime>2014-Q4</EndTime>
                    </Time>
                    <Dimension id=\"MEASURE\">1</Dimension>
                    <Or>
                      <Dimension id=\"SEX_ABS\">" . $this->_genderId . "</Dimension>
                    </Or>
                    <Or>
                        <Dimension id=\"STATE\">" . $this->_stateId . "</Dimension>
                    </Or>
                    <Or>
                        <Dimension id=\"AGE\">A04</Dimension>
                        <Dimension id=\"AGE\">A59</Dimension>
                        <Dimension id=\"AGE\">A10</Dimension>
                        <Dimension id=\"AGE\">A15</Dimension>
                        <Dimension id=\"AGE\">A20</Dimension>
                        <Dimension id=\"AGE\">A25</Dimension>
                        <Dimension id=\"AGE\">A30</Dimension>
                        <Dimension id=\"AGE\">A35</Dimension>
                        <Dimension id=\"AGE\">A40</Dimension>
                        <Dimension id=\"AGE\">A45</Dimension>
                        <Dimension id=\"AGE\">A50</Dimension>
                        <Dimension id=\"AGE\">A55</Dimension>
                        <Dimension id=\"AGE\">A60</Dimension>
                        <Dimension id=\"AGE\">A65</Dimension>
                        <Dimension id=\"AGE\">A70</Dimension>
                        <Dimension id=\"AGE\">A75</Dimension>
                        <Dimension id=\"AGE\">A80</Dimension>
                        <Dimension id=\"AGE\">8599</Dimension>
                        <Dimension id=\"AGE\">A85</Dimension>
                        <Dimension id=\"AGE\">A90</Dimension>
                        <Dimension id=\"AGE\">A95</Dimension>
                        <Dimension id=\"AGE\">A99</Dimension>
                    </Or>
                </And>
            </DataWhere>
        </Query>
    </message:QueryMessage>


                </QueryMessage>
    </GetGenericData>";

        $soapVar = new \SoapVar($xml_params, XSD_ANYXML, null, null, null);

        try {
            $data = $client->GetGenericData($soapVar);
        }
        catch(\Exception $e) {
            return false;
        }

        $xmlDoc = new \DOMDocument();
        $xmlDoc->loadXML($data->GetGenericDataResult->any);

        $this->dataSeriesNodes = $xmlDoc->getElementsByTagName("Series");

        return true;
    }

    protected function getCorrectAnswer() {

         foreach ($this->dataSeriesNodes as $key=>$SeriesNode) {
                $SeriesKey = $SeriesNode->firstChild->firstChild->nextSibling;
                $StateID = $SeriesKey->getAttribute("value");
                if($StateID == $this->_stateId){
                    $sexKey = $SeriesKey->nextSibling;
                    $sexID = $sexKey->getAttribute("value");
                    if($sexID == $this->_genderId){
                      $ageKey = $sexKey->nextSibling;
                      $ageID = $ageKey->getAttribute("value");
                      if($ageID == $this->_ageId){
                        $SeriesValue = $SeriesNode->lastChild->lastChild;
                        $DataItemValue = $SeriesValue->getAttribute("value");
                        return $DataItemValue;
                      }
                    }
                }
          }

        return null;
    }

    protected function getDidYouKnowData(){
        $responseArray = array();

        foreach ($this->dataSeriesNodes as $key=>$SeriesNode) {
                $SeriesKey = $SeriesNode->firstChild->firstChild->nextSibling;
                $StateID = $SeriesKey->getAttribute("value");
                if($StateID == $this->_stateId){
                    $sexKey = $SeriesKey->nextSibling;
                    $sexID = $sexKey->getAttribute("value");
                    if($sexID == $this->_genderId){
                      $ageKey = $sexKey->nextSibling;
                      $ageID = $ageKey->getAttribute("value");
                      $SeriesValue = $SeriesNode->lastChild->lastChild;
                      $DataItemValue = $SeriesValue->getAttribute("value");
                      if(AbsStatConstants::$AGE[$ageID]){
                          $ageDescription = AbsStatConstants::$AGE[$ageID];
                          $responseArray[$ageDescription] = $DataItemValue;
                      }
                    }
                }
          }
          return $responseArray;
    }
}
