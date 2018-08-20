<?php
$selected_day_int = isset( $_GET['d'] ) ? $_GET['d'] : 0;
// If no date selected and time > 1500, show tomorrow's forecast
if ( ! isset( $_GET['d'] ) && date( 'H' ) >= 15 ) {
	$selected_day_int = 1;
}
$selected_day_human = date( 'D', time() + ( $selected_day_int * 86400 ) );

// Get selected pressure
$selected_pressure = isset( $_GET['p'] ) ? $_GET['p'] : '950';

$image_url = "http://rasp-uk.uk/UK+%d/FCST/press%d.curr.%04dlst.d2.body.png";

$start_time = 1000;
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

$pressures = array(
	'1000' => '~350 ft (1000 hPa)',
	'950'  => '~1,800 ft (950 hPa)',
	'850'  => '~4,800 ft (850 hPa)',
	'700'  => '~10,000 ft (700 hPa)',
	'500'  => '~18,000 ft (500 hPa)',
);

$pressure_buttons_html = '<div class="btn-group">';
foreach ( $pressures as $pressure_hpa => $pressure_desc ) {
	$day                   = $_GET['d'] ? $_GET['d'] : '0';
	$pressure_buttons_html .= '<a class="btn btn-info btn-sm';
	// Set button active
	if ( $selected_pressure == $pressure_hpa ) {
		$pressure_buttons_html .= ' active';
	}
	$pressure_buttons_html .= '" href="?d=' . $day . '&p=' . $pressure_hpa . '"';
	$pressure_desc = substr($pressure_desc, 0, stripos($pressure_desc, "("));
	$pressure_buttons_html      .= '>' . $pressure_desc . '</a> ';
}
$pressure_buttons_html .= '</div>';

$title      = "UK Wave Forecast";
$body_class = "wave-forecast";
$app_icon   = "images/blipspot-icon.png";
$additional_js = array( 'wave-forecast.js' );

include_once( 'partials/header.php' );
?>

	<div class="row">
	<div class="col-lg-12 text-center">
		<h1>Wave Forecast</h1>
		<?php echo $day_buttons_html ?><br><br>
		<?php echo $pressure_buttons_html ?><br><br>

	</div>
	<div class="row">
		<div class="col-lg-12 text-center graphs">
			<ul class="bxslider">
				<?php
				for ( $time = 1200; true; $time = $time + 100 ) {
					$img_url = sprintf( $image_url, $selected_day_int, $selected_pressure, $time );
					?>
					<li>
						<?php echo sprintf( "%s<br>%04d @ %s", $selected_day_human, $time, $pressures[$selected_pressure] ) ?><br>
						<img src="<?php echo $img_url ?>">
					</li>
					<?php
					if ( $time == $end_time ) {
						$time = $start_time;
					}

					if ( $time === 1100 ) {
						break;
					}
				}
				?>
			</ul>
		</div>
	</div>
<?php include_once( 'partials/footer.php' ) ?>