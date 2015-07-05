<?php
    include'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <h3>Question <?php echo ($num + 1); ?>:</h3>
                <h3><?php echo $question->getDescription(); ?></h3>
            </div>
        </div>
    </div>

    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <?php
                $answers = array_merge(array($question->getCorrectAnswer()), $question->getWrongAnswers());
                shuffle($answers);

                $answerId = 0;
                foreach ($answers as $answer) {
                    echo '<div class="col-md-3" style="text-align: center;">';
                    echo '<div class="answer" style="cursor: pointer; border: 1px solid black; padding: 20px;" data-answer="' . $answer . '">';
                    echo '<h3>' . $question->getNumberFormattingPrefix() . number_format($answer) . '</h3>';
                    echo '</div>';
                    echo '</div>' . PHP_EOL;
                    $answerId++;
                }
            ?>
        </div>
    </div>

    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-12">
                <div id="results" style="display: none;text-align: center;">
                    <div class="result"></div>

                    <h3>Did you know?</h3>

                    <div class="didYouKnow" style="text-align: center;"><?php echo $question->getDidYouKnowHtml(); ?></div>

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
            var buttonsDisabled = false;

            // TODO Make this not have to cancel the form submission - make it not a real form in the first place!
            $(".answer").click(function() {
                if (!buttonsDisabled) {
                    var correctAnswer = "<?php echo $question->getCorrectAnswer(); ?>";

                    if ($(this).data("answer") == correctAnswer) {
                        $("#results .result")
                            .css("color", "green")
                            .html("<strong>Correct!</strong>");
                        $("#dynamic-quiz-next-question #result").val(1);
                    }
                    else {
                        $("#results .result")
                            .html("<strong style='color: red;'>Incorrect!</strong> The correct answer was '<?php echo $question->getNumberFormattingPrefix() . number_format($question->getCorrectAnswer()); ?>'.");
                    }

                    $("#results").show();

                    $("#dynamic-quiz-question #submit").attr('disabled','disabled');

                    if ($.doDidYouKnowAction) {
                        $.doDidYouKnowAction($("#results .didYouKnow"));
                    }

                    buttonsDisabled = true;
                }
            });

        });
    </script>
<?php
    include 'footer.php';
