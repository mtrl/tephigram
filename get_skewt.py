#!/usr/bin/python
import sys, urllib, os
start_time = 800
end_time = 2000
image_dir = "images/{}/"
url = 'http://rasp.inn.leedsmet.ac.uk/cgi-bin/get_rasp_skewt.cgi?region=UK%2b{}&grid=d2&day=0&lat=52.521483&lon=-2.877388&time={}'

for day in range(0, 5):
    if not os.path.exists(image_dir.format(day)):
        os.makedirs(image_dir.format(day))
        print "Getting SkewT for day {}".format(day)
    for time in range(start_time, end_time, 100):
        print "Downloading SkewT for day {} and time {}".format(day,time)
        skewt_image = urllib.URLopener()
        skewt_image.retrieve(url.format(day,time), image_dir.format(day)+"{}.png".format(time))
        print "Downloaded!"
