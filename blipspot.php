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

$day_buttons_html = '<div class="btn-group">';
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


?>
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
    <title>Blipspots - Midland Gliding Club</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
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
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
<script>
    $(function() {
        // Get the day
        var selected_day = $('.btn.active').data('day');
        updateBlips(selected_day);

        $('.btn').on('click', function(el) {
            console.log($(this).data('day'));
            $('.btn.active').removeClass('active');
            $(this).addClass('active');
            // Get the day
            var selected_day = $('.btn.active').data('day');
            updateBlips(selected_day);
            return false;
        });

        function updateBlips(selected_day) {
            // Get the image links
            var links =
                [
                    {
                        'title' : 'Star rating',
                        'url' : 'http://app.stratus.org.uk/blip/blip_stars.php?region={0}&tp={1}',
                        'info' : 'Note that the \'Stars\' Forecast is experimental and based on original work by Paul Scorer.'
                    },
                    {
                        'title' : 'Wind Direction',
                        'url' : 'http://app.stratus.org.uk/blip/blip_wind_dir.php?region={0}&tp={1}',
                        'info' : ''
                    },
                    {
                        'title' : 'Wind Speed',
                        'url' : 'http://app.stratus.org.uk/blip/blip_wind.php?region={0}&tp={1}',
                        'info' : ''
                    },
                    {
                        'title' : 'Thermal and Cloud',
                        'url' : 'http://app.stratus.org.uk/blip/blip_main.php?region={0}&tp={1}',
                        'info' : ''
                    },
                    {
                        'title' : 'Cu Potential',
                        'url' : 'http://app.stratus.org.uk/blip/blip_cu.php?region={0}&tp={1}',
                        'info' : 'For Cu Potential, a positive number means there will be Cumulus clouds, a good day is typically around a 1000 (or more).'
                    },
                    {
                        'title' : 'Dew Point and Dry Air Temperature',
                        'url' : 'http://app.stratus.org.uk/blip/blip_temp.php?region={0}&tp={1}',
                        'info' : 'On a good day, we need a 10 degree (or more) difference between the dry temperature and dew point.'
                    },
                    {
                        'title' : 'Visible Surface Sun',
                        'url' : 'http://app.stratus.org.uk/blip/blip_sun.php?region={0}&tp={1}',
                        'info' : 'A sun percentage value of 60% or more means that the ground will warm up and clouds can develop. Less than 50% means there may be top cover or just too much cloud about (e.g. stratus "spread out" or Cirrus "top cover").'
                    },
                    {
                        'title' : 'Boundary Layer Cloud Pc',
                        'url' : 'http://app.stratus.org.uk/blip/blip_get.php?day={0}&type=blcloudpct&tp={1}&output=plot',
                        'info' : 'Boundary layer cloud percent is useful to see if over developing. If the sun percent is low but the boundary layer percent is still high, check the Skew-T for top cover.'
                    },
                    {
                        'title' : '1 Hour Accumulated Rain',
                        'url' : 'http://app.stratus.org.uk/blip/blip_rain.php?region={0}&tp={1}',
                        'info' : 'Ideally we do not want rain. A hint of a tenth of a millimetre means the air is fairly damp and the wet/dry temperatures will be close to each other.'
                    }
                ];

            var graph_html = "";

            $(links).each(function(i, blip) {
                graph_html += "<h2>" + blip.title;
                if(blip.info != '') {
                    var div_id = blip.title;
                    div_id = div_id.replace(/[ 0-9]/g, '').toLowerCase();
                    if(blip.info) {
                        graph_html += '<a class="glyphicon glyphicon-info-sign" data-toggle="collapse" data-target="#' + div_id + '"></a>';
                        graph_html += '</h2>';
                        graph_html += '<p id="' + div_id + '" class="collapse">' + blip.info + '</p>';
                    }
                } else {
                    graph_html += '</h2>';
                }
                  graph_html += "<div><img src='" + blip.url.replace('{0}', selected_day).replace('{1}', '<?php echo $tp ?>') + "' class='graph' title=''></div>";
            });

            $('.graphs').html(graph_html);
        }
    });
</script>

</body>
</html>
