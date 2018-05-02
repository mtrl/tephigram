<?php
// Set BGA turnpoint
if ( isset( $_GET['tp'] ) ) {
	$tp = strtoupper( strip_tags( $_GET['tp'] ) );
} else {
	$tp = "MYN";
}

$title      = "{$tp} STAR Forecast";
$body_class = "star-week";
$app_icon = null;

include_once( 'partials/header.php' );
?>
<div class="col-lg-12 text-center">
  <h1><?php echo $tp ?> STAR Rating</h1>
  <form action="star-week.php" method="get" name="trigraph">
    <div class="form-group">
      <input type="text" name="tp" placeholder="Turnpoint trigraph" value="<?php echo $_GET['tp'] ?>">
      <input type="submit" value="Go">
    </div>
  </form>
</div>
</div>
<div class="row">
  <div class="col-lg-12 text-center graphs">
	  <?php
	  $star_graph_html = '<div class="btn-group">';
	  for ( $i = 0; $i <= 6; $i ++ ) {
		  $day             = time() + ( $i * 86400 );
		  $the_date        = date( "l", $day );
		  $star_graph_html .= '<div><br>';
		  $star_graph_html .= '<a href="blipspot.php?tp=' . $tp . '&day=' . $the_date . '"">';
		  $star_graph_html .= "<img src=\"http://app.stratus.org.uk/blip/blip_stars.php?region=" . date( 'l', $day ) . "&tp={$tp}\">";
		  $star_graph_html .= '</a>';
	  }
	  $star_graph_html .= '</div>';

	  echo $star_graph_html;
	  ?>
  </div>
</div>
<?php include_once( 'partials/footer.php' ) ?>
