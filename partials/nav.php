<?php
$buttons = array(
	'UK STAR map'   => 'star-map.php',
	'Mynd STAR Blipspots' => 'star-week.php',
	'Mynd Tephigrams'     => 'tephigram.php',
	'Mynd Blipspots'      => 'blipspot.php',
	'RASPTable'  => 'rasp',
	'Mynd Hangarcam'     => 'hangarcam.php',
);
?>

<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
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