<?php include_once( 'functions.php' ) ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<?php if ( $app_icon ): ?>
      <link rel="apple-touch-icon" href="<?php echo $app_icon ?>">
	<?php endif ?>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo $title; ?></title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
        crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="css/jquery.bxslider.css">
  <link rel="stylesheet" href="css/styles.css">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-78268-21']);
      _gaq.push(['_gat._forceSSL']);
      _gaq.push(['_trackPageview']);

      (function () {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
      })();

  </script>
</head>
<body class="<?php echo $body_class ?>">
<div class="container">

  <div class="row">
    <div class="col-sm-12 col-md-6 col-md-offset-3">
		<?php include( 'partials/nav.php' ) ?>
    </div>
  </div>