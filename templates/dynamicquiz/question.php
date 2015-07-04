<?php
    include'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2>Question <?php echo ($num + 1); ?>:</h2>
                <p><?php echo $question->getDescription(); ?></p>
                <form id="dynamic-quiz-question">
                    <ul>
                    <?php
                        $answers = array_merge(array($question->getCorrectAnswer()), $question->getWrongAnswers());
                        shuffle($answers);

                        $answerId = 0;
                        foreach ($answers as $answer) {
                            echo '<li><input type="radio" id="answer' . $answerId . '" value="' . $answer . '" name="answers" />' .PHP_EOL;
                            echo '<label for="answer' . $answerId . '">' . number_format($answer) . '</label></li>' . PHP_EOL;
                            $answerId++;
                        }
                    ?>
                    </ul>
                    <p>
                        <input type="submit" id="submit" class="btn btn-primary" name="submit" value="Check" />
                    </p>
                </form>

                <div id="results" style="display: none;">
                    <div class="result"></div>

                    <h3>Did you know?</h3>

                    <div class="didYouKnow"><?php echo $question->getDidYouKnowHtml(); ?></div>

                    <form id="dynamic-quiz-next-question" method="post" action="<?php echo $root; ?>/dynamicquiz/question">
                        <button class="btn btn-primary">Continue &gt;</button>
                        <input type="hidden" name="result" id="result" value="0" />
                    </form>
                </div>

            </div>
        </div>
    </div><!--container-->

    <script type="text/javascript">
        $(document).ready(function () {

            // TODO Make this not have to cancel the form submission - make it not a real form in the first place!
            $("#dynamic-quiz-question").submit(function(event) {
                var correctAnswer = "<?php echo $question->getCorrectAnswer(); ?>";

                if ($("#dynamic-quiz-question input[type='radio']:checked").val() == correctAnswer) {
                    $("#results .result")
                        .css("color", "green")
                        .html("<strong>Correct!</strong>");
                    $("#dynamic-quiz-next-question #result").val(1);
                }
                else {
                    $("#results .result")
                        .css("color", "red")
                        .html("<strong>Incorrect!</strong> The correct answer was '" + correctAnswer + "'.");
                }

                $("#results").show();

                $("#dynamic-quiz-question #submit").attr('disabled','disabled');

                if ($.doDidYouKnowAction) {
                    $.doDidYouKnowAction($("#results .didYouKnow"));
                }

                event.preventDefault();
                return false;
            });

        });
    </script>
<?php
    include 'footer.php';
