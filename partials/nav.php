<div class="nav">
	<?php if ( $display_intro_text ): ?>
      <h1 class="text-center">MYN Soaring Forecast Tools</h1>
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
	<?php
	$buttons = array(
		'STAR map' => 'star-map.php',
		'STAR blips' => 'star-week.php',
		'Tephis'    => 'tephigram.php',
		'Blips'     => 'blipspot.php',
		'RASPTable'    => 'rasp',
		'Hangar'     => 'hangarcam.php',
	);
	?>

  <div class="btn-group hidden-xs">
	  <?php foreach ( $buttons as $title => $url ): ?>
        <a class="btn btn-sm btn-info<?php echo stristr( $_SERVER['PHP_SELF'], $url ) && $url != 'rasp' ? " active" : null ?>"
           href="<?php echo $url ?>"><?php echo $title ?></a>
	  <?php endforeach; ?>
  </div>

  <div class="btn-group btn-group-sm visible-xs">
	  <?php foreach ( $buttons as $title => $url ): ?>
        <a class="btn-sm btn btn-info<?php echo stristr( $_SERVER['PHP_SELF'], $url ) && $url != 'rasp' ? " active" : null ?>"
           href="<?php echo $url ?>"><?php echo substr( $title, 0, stripos( $title, " " ) ? stripos( $title, " " ) : strlen( $title ) ) ?></a>
	  <?php endforeach; ?>
  </div>
</div>