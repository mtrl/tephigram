<?php
$selected_day_int = isset($_GET['day']) ? $_GET['day'] : 0;
// If no date selected and time > 1500, show tomorrow's forecast
if(!isset($_GET['day']) && date('H') >= 15 ) {
    $selected_day_int = 1;
}
$selected_day_human =  date('D', time() + ($selected_day_int * 86400));
//echo $selected_day;

$image_dir = "images/";
// get dirs in images
$days = scandir($image_dir);
// Get images in dirs
$day_buttons_html = '<div class="btn-group">';
foreach($days as $day)
{
  if(substr($day,0,1) != ".")
  {
    $the_date = date("D", time() + ($day * 86400) );
    $day_buttons_html .= '<a class="btn btn-info btn-sm';
    if($selected_day_human == $the_date) {
        $day_buttons_html .= ' active';
    }
    $day_buttons_html .= '" href="?day=' . $day . '">' . $the_date . '</a> ';
  }
}

$day_buttons_html .= '</div>';

$day_images_html = "";
$last_updated = "";

$day_images_html = "<ul class=\"bxslider\">";
$day_dir = $image_dir . intval($selected_day_int) . "/";
// Day iamges
$day_images = scandir($day_dir);
//print_r($day_images);
for($i = 7; $end != true; ++$i) {
      $day_image = $day_images[$i];
      if(substr($day_image, 0, 1) != ".")
      {
        $epoch = explode(".", explode("_time_",$day_image)[1])[0];
        $download_time = date("D d M", $epoch) . " at " . date("H:i:s", $epoch);
        $day_images_html .= "<li><img src=\"{$day_dir}{$day_image}\"></li>";
        $last_updated = "Image updated " . $download_time;
      }
      if($i == 14) {
          $i = 0;
      }
      if($i == 6) {
          $end = true;
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
    <title>Tephigram - Midland Gliding Club</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <link rel="stylesheet" href="css/tephi.css?<?php echo time() ?>">

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
            <h1>MYN Tephigrams</h1>
		<br>
          <?php echo $day_buttons_html ?><br><br>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $day_images_html ?>
          <br/>
          <small><?php echo $last_updated ?> | <a href="https://raw.githubusercontent.com/mtrl/tephigram/master/RELEASENOTES.txt" target="_blank">Release notes</a></small>
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
      var slider = $('.bxslider');
      slider.bxSlider({
        speed: '250',
        preloadImages: 'all',
        pager: false,
        controls: true,
        autoStart: false,
        onSliderLoad: function() {
                $("body").keydown(function(e) {
                    if (e.keyCode == 37) { // left
                      slider.goToPrevSlide();
                    } else if(e.keyCode == 39) { // right
                      slider.goToNextSlide();
                    }
                  });

            }
      });
  });
</script>
  </body>
</html>
