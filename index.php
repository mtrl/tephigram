<?php
$title      = "Soaring Forecasts - Midland Gliding Club";
$body_class = "star-week";
$app_icon   = null;

include_once( 'partials/header.php' );
?>
<div class="row">
  <div class="col-sm-12 col-md-6 col-md-offset-3">
    <h1 class="text-center">MYN Soaring Forecast Tools</h1>
	  <?php include( 'partials/nav.php' ) ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12 text-center">
    <small><?php echo get_current_tag() ?> | <a
          href="https://raw.githubusercontent.com/mtrl/tephigram/master/RELEASENOTES.txt" target="_blank">Release
        notes</a></small>
  </div>
</div>

<?php include_once ('partials/footer.php') ?>