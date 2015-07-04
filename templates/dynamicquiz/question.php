<?php
    include'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2>Question <?php echo $num; ?>:</h2>
                <p><?php echo $question->getDescription(); ?></p>
                <form id="dynamic-quiz-question">
                    <ul>
                    <?php
                        $answers = array_merge(array($question->getCorrectAnswer()), $question->getWrongAnswers());
                        shuffle($answers);

                        $answerId = 0;
                        foreach ($answers as $answer) {
                            echo '<li><input type="radio" id="answer' . $answerId . '" value="' . $answer . '" name="answers" />' .PHP_EOL;
                            echo '<label for="answer' . $answerId . '">' . $answer . '</label></li>' . PHP_EOL;
                            $answerId++;
                        }
                    ?>
                    </ul>
                    <p>
                        <input type="hidden" name="num" value="<?php echo $num; ?>" />
                        <input type="submit" id="submit" class="btn btn-primary" name="submit" value="Check" />
                    </p>
                </form>

                <div id="results" style="display: none;">
                    <div class="result"></div>

                    <h3>Did you know?</h3>

                    <div class="didYouKnow"><?php echo $question->getDidYouKnowHtml(); ?></div>

                    <p><a href="<?php echo $root; ?>/dynamicquiz/question"><button class="btn btn-primary">Go to the next question &gt;</button></a></p>
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
<?php include 'footer.php';
