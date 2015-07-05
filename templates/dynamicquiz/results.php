<?php
    include 'header.php';
?>

<div class="bloc hero b-parallax bgc-outer-space bg-crowd d-bloc">

    <div class="container dynamic-quiz" role="main">
        <div class="row">
            <div class="col-md-6 col-md-offset-3" style="text-align: center;">
                    <h2>Your results</h2>

                    <h3>You scored <strong><?php echo $score; ?></strong> out of <strong><?php echo $num; ?></strong>. <?php
                        if (($score / $num) >= 0.5) {
                            echo "Good job!";
                        }
                        else {
                            echo "Better luck next time!";
                        }
                    ?></h3>

                    <br />

                    <p><button class="btn btn-primary facebook-share">Share my result on Facebook!</button></p>
                    <!--<p><div class="fb-like" data-share="true" data-width="400" data-show-faces="true"></div></p>-->

                    <br /><br />

                    <p><strong>Squizzlr</strong> has given you a little taste of all the deep & interesting datasets made available by the Australian Government at
                    <a href="http://data.gov.au">data.gov.au</a>. There's more where this came from - why don't you try exploring!</p>
                </div>
            </div>
        </div>
    </div><!--container-->

</div>

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
