<?php
$image_dir = "images/";
// get dirs in images
$days = scandir($image_dir);
// Get images in dirs
foreach($days as $day)
{
  if(substr($day,0,1) != ".")
  {
    $the_date = date("D jS F", time() + ($day * 86400) );
    echo '<a href="?day=' . $day . '">' . $the_date . '</a><br/>';
  }
}

if(isset($_GET['day']))
{
  $day_dir = $image_dir . $_GET['day'] . "/";
  // Day iamges
  $day_images = scandir($day_dir);
  foreach($day_images as $day_image)
  {
    if(substr($day_image,0,1) != ".")
    {
      echo "<img src=\"{$day_dir}{$day_image}\"><br>";
    }
  }
}
  ?>
