<?php
namespace SimpleQuiz\Utils;

class DynamicQuizQuestion {

    protected $_id;
    protected $_description;
    protected $_correctAnswer;
    protected $_wrongAnswers = array();
    protected $_didYouKnowHtml;

    public function __construct($id) {
        $this->_id = $id;
    }

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

    public function generateBarChartHtml($data) {
        $labels = "'" . implode("', '", array_keys($data)) . "'";

        $html = "
            <script type='text/javascript'>
                $.doDidYouKnowAction = function(parent) {
                    $('<canvas id=\'bar\' width=\'400\' height=\'400\'></canvas>').appendTo(parent);
                    var ctx = document.getElementById('bar').getContext('2d');
                    var barChart = new Chart(ctx).Bar({
                        labels: [" . $labels . "],
                        datasets: [
                            {
                                label: 'Population by age',
                                fillColor: 'rgba(220,220,220,0.5)',
                                strokeColor: 'rgba(220,220,220,0.8)',
                                highlightFill: 'rgba(220,220,220,0.75)',
                                highlightStroke: 'rgba(220,220,220,1)',
                                data: [" . implode(",", array_values($data)) . "]
                            }
                        ],
                        responsive: true
                    });
                };
            </script>
        ";

        return $html;
    }
}
