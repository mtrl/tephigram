<?php include_once('functions.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="apple-touch-icon" href="blipspot-icon.png">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Soaring Forecasts - Midland Gliding Club</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
    <style>
        h2 a {
            font-size: 0.5em;
            margin-left: 10px;
            padding-bottom: 0.3em;
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
        <div class="col-sm-12 col-md-6 col-md-offset-3">
            <h1 class="text-center">MYN Soaring Forecast Tools</h1>
            <p>
                <a href="http://rasp-uk.uk/">RASP</a> provides an excellent set of tools for forecasting soarable weather,
                however the RASP web pages are very difficult to navigate on mobile devices.
            </p>
            <p>To solve this problem here are a few tools that render the RASP data a in a format that is a bit easier to use on mobile devices.</p>
            <p>These forecasts are currently just for the MYN (Midland Gliding Club) turnpoint.</p>

            <div class="text-center">
                <div class="btn-group">
                    <a class="btn btn-info" href="tephigram.php">Tephigrams</a>
                    <a class="btn btn-info" href="blipspot.php">Blipspots</a>
                    <a class="btn btn-info" href="star-week.php">STAR forecast</a>
                    <a class="btn btn-info" href="rasp">RASPTable*</a>
                </div>
                <p><br><small>*RASPTable is in a very alpha state, is really mobile only and needs some love.</small></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 text-center">
            <small><?php echo get_current_tag() ?> | <a href="https://raw.githubusercontent.com/mtrl/tephigram/master/RELEASENOTES.txt" target="_blank">Release notes</a></small>
        </div>
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script>

</script>

</body>
</html>
