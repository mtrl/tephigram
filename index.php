<?php
$image_dir = "images/";
// get dirs in images
$days = scandir($image_dir);
// Get images in dirs
foreach($days as $day)
{
  if(substr($day,0,1) != ".")
  {
    $the_date = date("d M Y", time() + ($day * 86400) );
    echo '<a href="?day=' . $day . '">' . $the_date . '</a><br/>';
  }
}

// Day iamges
$day_images = scandir($image_dir . $days);
foreach($day_images as $day_image)
{
  if(substr($day_images,0,1) != ".")
  {

  }
}
?>
