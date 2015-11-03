#!/usr/bin/python
import sys, urllib, os
start_time = 0700
end_time = 2100
image_dir = "images/day-{}/"
url = 'http://rasp.inn.leedsmet.ac.uk/cgi-bin/get_rasp_skewt.cgi?region=UK%2b{}&grid=d2&day=0&lat=52.521483&lon=-2.877388&time={}'

for day in range(0, 5):
    if not os.path.exists(image_dir.format(day)):
        os.makedirs(image_dir.format(day))
        print "Getting SkewT for day {}".format(day)
    for time in range(start_time, end_time, 100):
        image_url = url.format(day,time)
        time = str(time).zfill(4)
        print "Downloading SkewT for day {} and time {}".format(day,time)
        print image_url
        try:
            skewt_image = urllib.URLopener()
            skewt_image.retrieve(image_url, image_dir.format(day)+"{}.png".format(time))
        except:
            print "Error downloading SkewT chart for day {} and time {}".format(day, time)
print "Done"
