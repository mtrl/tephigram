<?php
$buttons = array(
	'STAR Map'   => 'star-map.php',
	'Wave'   => 'wave-forecast.php',
	'Welsh Wave'   => 'wave-forecast-cy.php',
	'Mynd STAR' => 'star-week.php',
	'Mynd Tephigrams'     => 'tephigram.php',
	'Mynd Blips'      => 'blipspot.php',
	'RASPTable'  => 'rasp',
	'Mynd Hangarcam'     => 'hangarcam.php',
	'MGC Ladder Entries' => 'bgaladder.php'
);
?>

<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php foreach ( $buttons as $title => $url ): ?>
					<li><a href="<?php echo $url ?>"><?php echo $title ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</nav>