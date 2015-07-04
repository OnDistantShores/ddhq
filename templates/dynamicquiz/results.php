<?php
    include 'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-6">
                <div class="well">
                    <h2>Your results</h2>

                    <p>You scored <strong><?php echo $score; ?></strong> out of <strong><?php echo $num; ?></strong>.</p>

                    <p><?php
                        if (($score / $num) >= 0.5) {
                            echo "Good job!";
                        }
                        else {
                            echo "Better luck next time!";
                        }
                    ?></p>

                    <p><button class="btn btn-primary facebook-share">Share my result on Facebook!</button></p>
                    <!--<p><div class="fb-like" data-share="true" data-width="400" data-show-faces="true"></div></p>-->
                </div>
            </div>
            <div class="col-md-6">
                <div class="well">
                    <h2>Top Scorers</h2>
                    <p>TODO</p>
                    <ul class="leaders">
                        <?php
                        /*$leaders = $quiz->getLeaders(30);
                        $counter = 1;
                        foreach ($leaders as $leader) :
                            $name = '';
                            //if current user, bolden the username
                            if ($leader['name'] == $user->getName()) :
                                $name = '<strong class="currentuser">' . $leader['name'] . '</strong>';
                            else:
                                $name = $leader['name'];
                            endif;
                            $percentage = round(( (int) $leader['score'] / (int) $numquestions ) * 100);
                            echo '<li>' . $name. ': ' .  $percentage . '%</li>';

                            $counter++;

                        endforeach;*/
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--container-->

    <script type="text/javascript">
        $(document).ready(function () {

            $(".facebook-share").click(function() {
                FB.ui({
                    method: 'feed',
                    link: '<?php echo \SimpleQuiz\Utils\Base\Config::$siteurl; ?>',
                    caption: 'I scored <?php echo $score; ?> out of <?php echo $num; ?> on Quizzy, the personalised government data quiz. See if you can do better!',
                }, function(response){});
            });

        });
    </script>

<?php
    include 'footer.php';
