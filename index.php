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
if(isset($_GET['day']))
{
  $day_dir = $image_dir . $_GET['day'] . "/";
  // Day iamges
  $day_images = scandir($day_dir);
  foreach($day_images as $day_image)
  {
    if(substr($day_image,0,1) != ".")
    {
      $day_images_html .= "<img src=\"{$day_dir}{$day_image}\">";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SkewT for MGC</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <link rel="stylesheet" href="skewt.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1>MGC SkewT images</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <?php echo $day_buttons_html ?>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <div id="slides">
          <?php echo $day_images_html ?>
          </div>
        </div>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script src="js/jquery.slides.min.js"></script>
    <script>
  $(function() {
    $('#slides').slidesjs({
      width: 940,
      height: 528
    });
  });
</script>
  </body>
</html>
