<?php
$image_dir = "images/";
// get dirs in images
$days = scandir($image_dir);
// Get images in dirs
$day_buttons_html = "";
foreach($days as $day)
{
  if(substr($day,0,1) != ".")
  {
    $the_date = date("D jS M", time() + ($day * 86400) );
    $day_buttons_html .= '<a class="btn btn-info btn-sm" href="?day=' . $day . '">' . $the_date . '</a> ';
  }
}

$day_images_html = "";
$last_updated = "";
$day = isset($_GET['day']) ? $_GET['day'] : 0;

$day_images_html = "<ul class=\"bxslider\">";
$day_dir = $image_dir . intval($day) . "/";
// Day iamges
$day_images = scandir($day_dir);
foreach($day_images as $day_image)
{
  if(substr($day_image,0,1) != ".")
  {
    $epoch = explode(".", explode("_time_",$day_image)[1])[0];
    $download_time = date("D d M", $epoch) . " at " . date("H:i:s", $epoch);
    $day_images_html .= "<li><img src=\"{$day_dir}{$day_image}\"></li>";
    $last_updated = "Image updated " . $download_time;
  }
}
$day_images_html .= "</ul>";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Midland Gliding Club SkewT Charts</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" href="css/skewt.css">

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
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1>SkewT Charts for Midland Gliding Club</h1>
          <p>
            This page shows SkewT charts for the coordinates <a href="https://www.google.co.uk/maps/place/52%C2%B031'04.1%22N+2%C2%B052'45.1%22W/@52.517812,-2.8813727,678m/data=!3m2!1e3!4b1!4m2!3m1!1s0x0:0x0" target="_blank">52.517936, -2.879209</a> and is updated daily at 0800 GMT.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $day_buttons_html ?><br><br>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $day_images_html ?>
          <br/>
          <small><?php echo $last_updated ?></small>
        </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script>
    $(document).ready(function(){
      $('.bxslider').bxSlider({
        speed: '250',
        preloadImages: 'all',
        pager: false,
        controls: true,
        autoStart: false,

      });

      $.backstretch("bg.jpg");
  });
</script>
  </body>
</html>
