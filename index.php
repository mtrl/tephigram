<?php
$title      = "Soaring Forecasts - Midland Gliding Club";
$body_class = "star-week";
$app_icon   = null;

$display_intro_text = true;

include_once( 'partials/header.php' );
?>
	<div class="nav">
		<?php if ( $display_intro_text ): ?>
			<h1 class="text-center">Soaring Forecast Tools</h1>
			<p>
				<a href="http://rasp-uk.uk/">RASP</a> provides an excellent set of tools for forecasting soarable weather,
				however the RASP web pages are very difficult to navigate on mobile devices.
			</p>
			<p>To solve this problem here are a few tools that render the RASP data a in a format that is a bit easier to use
				on
				mobile devices.</p>
			<p>These forecasts are currently just for the MYN (Midland Gliding Club) turnpoint.</p>
		<?php else: ?>
			<br>
		<?php endif ?>


	</div>
<?php include_once( 'partials/footer.php' ) ?>