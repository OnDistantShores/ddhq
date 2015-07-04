<?php
namespace SimpleQuiz\Utils;

use SimpleQuiz\Utils\Quiz;
use SimpleQuiz\Utils\Base\User;
use Slim\Helper\Set;

class DynamicQuiz extends Quiz {

    protected $_datastores;
    protected $_person_gender;
    protected $_person_age;
    protected $_person_location;

    /**
     * @param Set $container
     */
    public function __construct(Set $container)
    {
        $this->_datastores = $container->datastores;
    }

    public function setPersonalisation($gender, $age, $location)
    {
        $this->_person_gender = $gender;
        $this->_person_age = $age;
        $this->_person_location = new Location($location);
    }

    public function generateQuestion() {
        // TODO Somehow keep track of which question we're up to and have asked already

        $questions = $this->getRelevantDataQuestions();

        return $questions[0];
    }

    protected function getRelevantDataQuestions() {
        $questions = array();

        foreach ($this->_datastores as $datastore) {
            $datastoreQuestions = $datastore->getRelevantDataQuestions($this->_person_gender, $this->_person_age, $this->_person_location);

            $questions = array_merge($questions, $datastoreQuestions);
        }

        return $questions;
    }
}
