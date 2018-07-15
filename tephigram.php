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
$end = false;
for($i = 7; $end != true; ++$i) {
	$day_image = $day_images[$i];
	if(substr($day_image, 0, 1) != "." && $day_image != '')
	{
		$epoch = explode(".", explode("_time_",$day_image)[1])[0];
		$download_time = date("D d M", $epoch) . " at " . date("H:i:s", $epoch);
		$day_images_html .= "<li><img src=\"{$day_dir}{$day_image}\"></li>";
		$last_updated = "Image updated " . $download_time;
	}
	if($i == 13) {
		$i = 0;
	}
	if($i == 6) {
		$end = true;
	}
}
$day_images_html .= "</ul>";

$title      = "MGC Tephigram Forecast";
$body_class = "tephi";
$additional_js = array('tephigram.js');

include_once( 'partials/header.php' );

?>
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
          <small><?php echo $last_updated ?></small>
        </div>
    </div>
  </div>

<?php include_once ('partials/footer.php') ?>
