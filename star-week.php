<?php
// BGA turnpoint
if ( isset( $_GET['tp'] ) ) {
	$tp = strtoupper( strip_tags( $_GET['tp'] ) );
} else {
	$tp = "MYN";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <!--  <link rel="apple-touch-icon" href="blipspot-icon.png">-->
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>STAR Forecast</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
        integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
        crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"
        integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
  <style>
    h2 a {
      font-size: 0.5em;
      margin-left: 10px;
      padding-bottom: 0.3em;
    }

    img {
      max-width: 100%;
    }

    img.graph {
      background: url('loading.gif') center center no-repeat;
      background-size: contain;
      max-height: 700px;
      min-height: 150px;
      height: auto;
    }

  </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-78268-21']);
      _gaq.push(['_gat._forceSSL']);
      _gaq.push(['_trackPageview']);

      (function () {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
      })();

  </script>
</head>
<body>
<div class="container">
  <div class="row">
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
			$the_date        = date( "D", $day );
			$star_graph_html .= '<div><br>';
			$star_graph_html .= '<a href="blipspot.php?tp=' . $tp . '&day=' . $the_date . '>';
			$star_graph_html .= "<img src=\"http://app.stratus.org.uk/blip/blip_stars.php?region=" . date( 'l', $day ) . "&tp={$tp}\">";
			$star_graph_html .= '</a>';
		}
		$star_graph_html .= '</div>';

		echo $star_graph_html;
		?>
    </div>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"
        integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ=="
        crossorigin="anonymous"></script>
<script>
    $(function () {

    });
</script>

</body>
</html>
