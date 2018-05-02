<?php
// If the time is after 1600, show tomorrow's forecast
if(intval(date('H')) > 15 && !isset($_GET['day'])) {
    $date = new DateTime();
    $date->add(new DateInterval('P1D'));
    $selected_day = $date->format('l');
} else if(isset($_GET['day'])) {
    $selected_day = $_GET['day'];
} else {
    $selected_day = date('l');
}
// BGA turnpoint
if(isset($_GET['tp'])) {
    $tp = strtoupper(strip_tags($_GET['tp']));
} else {
    $tp = "MYN";
}

$day_buttons_html = '<div class="btn-group day-select">';
for($i = 0; $i <= 6; $i++)
{
    $day = time() + ($i * 86400);
    $the_date = date("D", $day );
    $day_buttons_html .= '<a class="btn btn-info btn-sm';
    // Set button active
    if($selected_day == date("l", $day)) {
        $day_buttons_html .= ' active';
    }
    $day_buttons_html .= '" href="#" data-day="' . date('l', $day) .'">' . $the_date . '</a> ';
}
$day_buttons_html .= '</div>';

$title      = "MGC Tephigram Forecast";
$body_class = "tephi";
$app_icon = "images/blipspot-icon.png";

include_once( 'partials/header.php' );

?>

    <div class="row">
        <div class="col-lg-12 text-center">
            <h1><?php echo $tp ?> Blipspots</h1>
            <?php echo $day_buttons_html ?><br><br>
            <form action="blipspot.php" method="get" name="trigraph">
                <div class="form-group">
                    <input type="text" name="tp" placeholder="Turnpoint trigraph" value="<?php echo $_GET['tp'] ?>">
                    <input type="submit" value="Go">
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center graphs">

        </div>
    </div>
<?php include_once ('partials/footer.php') ?>