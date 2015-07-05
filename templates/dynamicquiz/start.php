<?php
    include 'header.php';
?>

<div id="hero-bloc" class="bloc hero b-parallax bgc-outer-space bg-hands-in-sand-29190636-std d-bloc">
	<div class="container bloc-sm hero-nav">
		<nav class="navbar row">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html"><img src="<?php echo $root; ?>/images/govhacklogo.png" width="80px" height="80px" /></a>
				<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1">
				<ul class="site-navigation nav navbar-nav">
				</ul>
			</div>
		</nav>
	</div>
	<div class="v-center text-center">
		<div class="vc-content">
			<h1 class=" tc-white lg-shadow" style="font-weight: bold;">
				Squizzlr
			</h1>
			<h3 class=" lg-shadow">
				Quizzes | Insights | Discovery
			</h3>

            <br /><br /><br /><br />

            <!--<a id="scroll-hero" class="btn-dwn" onclick="scrollToTarget('#detailsform')"><span class="fa fa-chevron-down"></span></a>-->

            <a href="#" class="btn btn-xl btn-wire lg-shadow" onclick="scrollToTarget('#details')">Take the quiz</a>
            <a href="#" class="btn btn-xl btn-wire lg-shadow" onclick="scrollToTarget('#find-out-more')">Find out more</a>
		</div>
	</div>
</div>

<div class="bloc bgc-white bg-citysky d-bloc" id="details">
    <a name="details"></a>

    <form id="dynamic-quiz-start" method="post" action="<?php echo $root; ?>/dynamicquiz/question">

        <div class="container">

            <br /><br />

            <?php if (isset($fbLoginSuccess) && $fbLoginSuccess == 1): ?>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3" style="text-align: center;">
                        <p><img src="<?php echo $fbImage; ?>" /></p>
                        <h3 class="lg-shadow">Thanks for authenticating, <?php echo $fbName; ?>. Check your details below and then you're ready to go!</h3>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-sm-12" style="text-align: center;">
                        <h3 class="lg-shadow">An interactive quiz, connecting many different govenment data sources, personalised just for you.</h3>
                        <h3 class="lg-shadow">Give it a squiz. Share it with your friends. You might even learn a thing or two!</h3>
                    </div>
                </div>

                <br />
            <?php endif; ?>

            <div class="row">

                <?php /*if (!(isset($fbLoginSuccess) && $fbLoginSuccess == 1)) {
                    $sizeOfOtherElements = 3;
                ?>
                    <div class="col-sm-3">
                        <div class="text-center">
                            <span class="fa fa-facebook-square icon-round icon-md"></span>
                        </div>
                        <h3 class="text-center mg-md">
                            Facebook
                        </h3><a href="<?php echo $fbLoginUrl; ?>" class="btn btn-lg btn-block btn-wire">Connect (optional)</a>
                    </div>
                <?php } else { $sizeOfOtherElements = 4; }*/ $sizeOfOtherElements = 4; ?>

                <div class="col-sm-<?php echo $sizeOfOtherElements; ?>">
                    <div class="text-center">
                        <span class="fa fa-child icon-round icon-md"></span>
                    </div>
                    <h3 class="text-center mg-md">
                        Gender
                    </h3>
                    <div class="btn-group btn-block">
                        <select name="gender" class="form-control">
                            <option <?php if (isset($fbGender) && $fbGender == "Male") echo " selected"; ?>>Male</option>
                            <option <?php if (isset($fbGender) && $fbGender == "Female") echo " selected"; ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-<?php echo $sizeOfOtherElements; ?>">
                    <div class="text-center">
                        <span class="fa fa-smile-o icon-round icon-md"></span>
                    </div>
                    <h3 class="text-center mg-md">
                        Age
                    </h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="age" placeholder="Age" name="age" value="<?php if (isset($fbAge)) echo $fbAge; ?>" />
                    </div>
                </div>
                <div class="col-sm-<?php echo $sizeOfOtherElements; ?>">
                    <div class="text-center">
                        <span class="ion ion-map icon icon-map icon-round icon-md"></span>
                    </div>
                    <h3 class="text-center mg-md">
                        <?php if (isset($fbNarrowedLocation) && $fbNarrowedLocation == 1) echo "Further clarify your location"; else echo "Location"; ?>
                    </h3>
                    <div class="btn-group btn-block">
                        <select name="location" class="form-control">
                            <?php
                                foreach ($suburbs as $suburb) {
                                    echo "<option>" . $suburb . "</option>" . PHP_EOL;
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row voffset-md">
                <div class="col-sm-12">
                    <div class="row">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="text-center">
                        <a href="#" class="btn btn-xl btn-wire" id="btn-details-submit">Get started!</a>
                    </div>
                </div>
            </div>

            <br /><br />

        </div>
        <input type="hidden" name="starting" value="1" />
    </form>
</div>

<div class="bloc d-bloc" id="find-out-more" style="background-color: black;">

    <div class="container">

        <br /><br />

        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <p><strong>Squizzlr</strong> was built as part of <a href="http://govhack.org" target="_blank">GovHack 2015</a> by <strong>Ashish Shekhar</strong> and <strong>Cameron Ross</strong>.

                <p><a href="http://hackerspace.govhack.com/content/squizzlr">Find out more about the project</a></p>

                <p><a href="https://github.com/OnDistantShores/ddhq">Find the code on GitHub</a></p>

                <p>Uses <a href="https://github.com/ElanMan/simple-quiz">Simple-Quiz framework</a>, <a href="http://getbootstrap.com">Bootstrap</a>, <a href="http://chartjs.com">Chart.js</a> and <a href="http://jquery.com">JQuery</a>.</p>
            </div>
        </div>

        <br /><br />
    </div>
</div>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#btn-details-submit").click(function(event) {
                $("#dynamic-quiz-start").submit();

                event.preventDefault();
                return false;
            });

        });
    </script>

<?php include 'footer.php';