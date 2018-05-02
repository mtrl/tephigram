<?php if ( $display_intro_text ): ?>
  <h1 class="text-center">MYN Soaring Forecast Tools</h1>
  <p>
    <a href="http://rasp-uk.uk/">RASP</a> provides an excellent set of tools for forecasting soarable weather,
    however the RASP web pages are very difficult to navigate on mobile devices.
  </p>
  <p>To solve this problem here are a few tools that render the RASP data a in a format that is a bit easier to use on
    mobile devices.</p>
  <p>These forecasts are currently just for the MYN (Midland Gliding Club) turnpoint.</p>
<?php else: ?>
  <br>
<?php endif ?>
<div class="text-center">
  <div class="btn-group">
      <?php
      $buttons = array(
        'Tephigrams' => 'tephigram.php',
        'Blipspots' => 'blipspot.php',
        'STAR forecast' => 'star-week.php',
        'RASPTable' => 'rasp',
        'Hangarcam' => 'hangarcam.php',
      );
      ?>
    <?php foreach ($buttons as $title => $url): ?>
      <a class="btn btn-info<?php echo stristr($_SERVER['PHP_SELF'], $url) ? " active" : null ?>" href="<?php echo $url ?>"><?php echo $title ?></a>
    <?php endforeach; ?>
  </div>
</div>