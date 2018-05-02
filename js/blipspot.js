$(function() {
    // Get the day
    var selected_day = $('.btn.active').data('day');
    updateBlips(selected_day);

    $('.day-select .btn').on('click', function(el) {
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