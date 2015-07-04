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

<?php
    include 'footer.php';
