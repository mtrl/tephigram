# SkewT by Mark Williams
This little python and PHP project downloads a specified number of day's SkewT charts from the Leeds Met rasp.inn.leedsmet.ac.uk service and
makes them available in a nicely formatted and responsive web page.

## Requirements
+ A linux server with SSH access
+ Python 2.7+
+ A PHP capable web server (apache/nginx/IIS whatever)

## How to use this
1. Upload the project to a Linux server with Apache/nginx w/ PHP and python installed.
1. Update the lat lon variables in the scripts/get_skewt.py file to the lat lon values of the location for which you want SkewT charts
1. Set up a cronjob on the server to call the scripts/get_skewt.py file once a day (e.g. 01 06 * * * /var/www/skewt/scripts/get_skewt.py)
1. Once the Python script has been run once you can view the downloaded SkewT files at http://yoururl.com/skewt/

## TODO
I wrote this project in a couple of hours one evening so it's not the most amazingly architected bit of software. This is my little disclaimer for anyone checking my code quality :)

Time allowing I'll be adding the following functionality.

1. Convert the downloaded PNGs to JPGs
1. Get the first SkewT chart at sunrise and the last at sunset
1. Restructure the python script to meet python standards
1. Use a configuration file
