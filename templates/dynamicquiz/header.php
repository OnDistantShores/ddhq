
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="<?php echo $root; ?>/favicon.ico">

    <link rel="stylesheet" href="<?php echo $root; ?>/res/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/res/css/quiz.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/res/css/blocs.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/res/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $root; ?>/res/css/ionicons.min.css" />

    <title>Squizzlr!</title>

    <script type="text/javascript" src="<?php echo $root; ?>/res/bootstrap/assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo $root; ?>/res/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $root; ?>/res/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo $root; ?>/res/chartjs/Chart.min.js"></script>
    <script type="text/javascript" src="<?php echo $root; ?>/res/js/blocs.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="<?php echo $root; ?>/res/bootstrap/dist/assets/js/html5shiv.js"></script>
      <script src="<?php echo $root; ?>/res/bootstrap/dist/assets/js/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #46454B;">
    <script>
        window.fbAsyncInit = function() {
          FB.init({
            //appId      : '472457762917327', // Real app
            appId      : '472465906249846', // Test app
            xfbml      : true,
            version    : 'v2.3'
          });
        };

        (function(d, s, id){
           var js, fjs = d.getElementsByTagName(s)[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement(s); js.id = id;
           js.src = "//connect.facebook.net/en_US/sdk.js";
           fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
    </script>

    <?php if (!(isset($hideStripeHeader) && $hideStripeHeader)): ?>

        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container" style="font-size: 26px; font-weight: bold;margin-top: 3px;">
              <a class="brand" href="/">Squizzlr</a>
            </div>
          </div>
        </div>
        <div style="margin-top: 60px;"></div>
    <?php endif; ?>
