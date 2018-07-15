<?php
$selected_day_int = isset( $_GET['d'] ) ? $_GET['d'] : 0;
// If no date selected and time > 1500, show tomorrow's forecast
if ( ! isset( $_GET['d'] ) && date( 'H' ) >= 15 ) {
	$selected_day_int = 1;
}
$selected_day_human = date( 'D', time() + ( $selected_day_int * 86400 ) );

$star_url = "http://rasp-uk.uk/UK+%d/FCST/wstar.curr.%04dlst.d2.body.png";

$start_time = 600;
$end_time   = 1900;


$day_buttons_html = '<div class="btn-group day-select">';
for ( $i = 0; $i <= 6; $i ++ ) {
	$day              = time() + ( $i * 86400 );
	$the_date         = date( "D", $day );
	$day_buttons_html .= '<a class="btn btn-info btn-sm';
	// Set button active
	if ( $selected_day_int == $i ) {
		$day_buttons_html .= ' active';
	}
	$day_buttons_html .= '" href="?d=' . $i . '" data-day="' . date( 'l', $day ) . '"';
	$day_buttons_html .= '>' . $the_date . '</a> ';
}
$day_buttons_html .= '</div>';

$title         = "MGC Star Map Forecast";
$body_class    = "star-map";
$app_icon      = "images/blipspot-icon.png";
$additional_js = array( 'star-map.js' );


include_once( 'partials/header.php' );

?>

	<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Star Map</h1>
		<?php echo $day_buttons_html ?><br><br>
	</div>
	<div class="row">
		<div class="col-lg-12 text-center graphs">
			<ul class="bxslider">
				<?php
				for ( $time = 1200; true; $time = $time + 100 ) {
					$img_url = sprintf( $star_url, $selected_day_int, $time );
					?>
					<li>
						<?php echo sprintf( "%s<br>%04d", $selected_day_human, $time ) ?><br>
						<img src="<?php echo $img_url ?>">
					</li>
					<?php
					if($time == $end_time) {
						$time = $start_time;
					}

					if($time === 1100) {
						break;
					}
				}
				?>
			</ul>
		</div>
	</div>
<?php include_once( 'partials/footer.php' ) ?>