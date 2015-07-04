<?php
namespace SimpleQuiz\Utils;

class DynamicQuizQuestion {

    protected $_description;
    protected $_correctAnswer;
    protected $_wrongAnswers = array();
    protected $_didYouKnowHtml;

    public function setDescription($description) {
        $this->_description = $description;
    }
    public function getDescription() {
        return $this->_description;
    }

    public function setCorrectAnswer($correctAnswer) {
        $this->_correctAnswer = $correctAnswer;
    }
    public function getCorrectAnswer() {
        return $this->_correctAnswer;
    }

    public function setWrongAnswers(array $wrongAnswers) {
        $this->_wrongAnswers = $wrongAnswers;
    }
    public function getWrongAnswers() {
        return $this->_wrongAnswers;
    }

    public function setDidYouKnowHtml($didYouKnowHtml) {
        $this->_didYouKnowHtml = $didYouKnowHtml;
    }
    public function getDidYouKnowHtml() {
        return $this->_didYouKnowHtml;
    }
}
