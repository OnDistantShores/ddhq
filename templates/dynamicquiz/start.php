<?php
    include 'header.php';
?>
    <div class="container dynamic-quiz" role="main">
        <div class="row">

            <?php if (!(isset($fbLoginSuccess) && $fbLoginSuccess == 1)): ?>
                    <div class="col-sm-12">
                        <p>Provide some details about yourself to get started</p>
                    </div>

                    <div class="col-sm-5">
                        <p><a href="<?php echo $fbLoginUrl; ?>"><button class="btn btn-primary facebook-login">Connect via Facebook</button></a></p>
                    </div>

                    <div class="col-sm-2">
                        <p>- OR -</p>
                    </div>
            <?php endif; ?>

            <div class="col-sm-<?php if (isset($fbLoginSuccess) && $fbLoginSuccess == 1) echo "6 col-sm-offset-3"; else echo "5"; ?>">

                <form id="dynamic-quiz-start" method="post" action="<?php echo $root; ?>/dynamicquiz/question">

                    <?php if (isset($fbLoginSuccess) && $fbLoginSuccess == 1): ?>
                        <p><img src="<?php echo $fbImage; ?>" /></p>
                        <p>Thanks for authenticating, <?php echo $fbName; ?>. Check your details below and then you're ready to go!</p>
                    <?php endif; ?>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option <?php if (isset($fbGender) && $fbGender == "Male") echo " selected"; ?>>Male</option>
                            <option <?php if (isset($fbGender) && $fbGender == "Female") echo " selected"; ?>>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" value="<?php if (isset($fbAge)) echo $fbAge; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="location"><?php if (isset($fbNarrowedLocation) && $fbNarrowedLocation == 1) echo "Further clarify your location"; else echo "Location"; ?></label>
                        <select name="location" class="form-control">
                            <?php
                                foreach ($suburbs as $suburb) {
                                    echo "<option>" . $suburb . "</option>" . PHP_EOL;
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Start</button>
                    <input type="hidden" name="starting" value="1" />
                </form>
            </div>
        </div>
    </div>

<?php include 'footer.php';