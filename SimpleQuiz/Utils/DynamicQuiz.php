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
    public function __construct(Set $container) {
        $this->_datastores = $container->datastores;
    }

    public function setPersonalisation($gender, $age, $location) {
        $this->_person_gender = $gender;
        $this->_person_age = $age;
        $this->_person_location = new Location($location);
    }

    // Find the next question for display. Ensure that the question hasn't already been presented.
    public function generateNextQuestion($questionsAlreadyPresented) {
        foreach ($this->_datastores as $datastore) {

            // Check whether we should even bother looking at this datastore
            $dataStoreHasQuestionsNotYetPresented = false;
            foreach ($datastore->getSupportedQuestionIds() as $supportedQuestionId) {
                if (!in_array($supportedQuestionId, $questionsAlreadyPresented)) {
                    $dataStoreHasQuestionsNotYetPresented = true;
                }
            }

            if ($dataStoreHasQuestionsNotYetPresented) {
                $datastoreQuestions = $datastore->getRelevantDataQuestions($this->_person_gender, $this->_person_age, $this->_person_location);

                if (count($datastoreQuestions) > 0) {
                    // Just because some were found doesn't guarantee they haven't already been shown, because datastores that generate multiple questions without all having
                    // been shown will pass the above check. Check each question individually now.
                    foreach ($datastoreQuestions as $datastoreQuestion) {
                        if (!in_array($datastoreQuestion->getId(), $questionsAlreadyPresented)) {
                            return $datastoreQuestion;
                        }
                    }
                }
            }
        }

        return null;
    }
}
