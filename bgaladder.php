<?php
$title      = "MGC BGA Ladder Results";
$body_class = "ladder";

include_once( 'partials/header.php' );

$club = 'MID';
$year = date('Y');

$data_url = "https://www.bgaladder.net/APIV1/DailyScores?Season={$year}&Month=0&Day=0&Club={$club}&rows=1000&page=1&sidx=FlightDate%20desc%2C%20Points&sord=desc&_=1552641055928";

$data = json_decode(file_get_contents($data_url));
?>

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1><?php echo $title ?></h1>
			<table class="table table-responsive table-bordered table-striped table-hover table-condensed">
				<thead>
				<tr>
					<th>Date</th>
					<th>Pilot</th>
					<th>Glider</th>
					<th>Task</th>
					<th>Cmts</th>
					<th>Dist km</th>
					<th>Time</th>
					<th>Actual speed</th>
					<th>Hcap speed</th>
					<th>Max height ft</th>
					<th>Height gain ft</th>
					<th>XC points</th>
					<th>Height points</th>
					<th>Total points</th>
				</tr>
				</thead>
				<tbody>
				<?php if(!sizeof($data->rows) ) { ?>
					<tr><td colspan="14">No scores this season :(</td></tr>
				<?php }
				?>
			<?php foreach($data->rows as $row): ?>
				<?php
					$flight_date = date_create_from_format('Y-m-d\TH:i:s', $row->FlightDate);
				?>
			<tr>
				<td width="90px"><?php echo $flight_date->format('d-m-Y') ?></td>
				<td><?php echo $row->Forename ?> <?php echo $row->Surname ?></td>
				<td><?php echo $row->Glider ?></td>
				<td><?php echo $row->Task ?></td>
				<td><?php echo $row->CommentCount ?></td>
				<td><?php echo round($row->Distance,2) ?></td>
				<td><?php echo $row->TaskTime ?></td>
				<td><?php echo round($row->Speed,2) ?></td>
				<td><?php echo round($row->HandicapSpeed,2) ?></td>
				<td><?php echo $row->MaxHeight ?></td>
				<td><?php echo $row->HeightGain ?></td>
				<td><?php echo $row->XCPoints ?></td>
				<td><?php echo $row->HeightPoints ?></td>
				<td><?php echo ($row->XCPoints + $row->HeightPoints) ?></td>
			</tr>
			<?php endforeach; ?>
				</tbody>
				</thead>
			</table>
        </div>
    </div>

    </div>
<?php include_once ('partials/footer.php') ?>