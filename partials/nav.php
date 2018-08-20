<?php
$buttons = array(
	'STAR Map'   => 'star-map.php',
	'Wave Map'   => 'wave-forecast.php',
	'Mynd STAR Blips' => 'star-week.php',
	'Mynd Tephigrams'     => 'tephigram.php',
	'Mynd Blips'      => 'blipspot.php',
	'RASPTable'  => 'rasp',
//	'Mynd Hangarcam'     => 'hangarcam.php',
	'MGC Ladder Entries' => 'https://www.bgaladder.co.uk/Enquiry.asp?Season=2018&SortField=1&SortOrder=DESC&Month=0&SortField2=8&SortOrder2=DESC&Club=MID&PageSize=20&LPID=0&Glider=0&cboPilot=0&Action=Show+Results&cboTP=&iPage=1&PilotID=0&ckSortField=&ckSortField2=&ckSortOrder=&ckSortOrder2=&LO='
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