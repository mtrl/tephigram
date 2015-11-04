#!/usr/bin/python
import sys, urllib, os
#import sunrise
# TODO: Set start and end time using a sunrise lib of some sort
start_time = 700
end_time = 1800
time_step = 200
image_dir = "images/{}/"
url = 'http://rasp.inn.leedsmet.ac.uk/cgi-bin/get_rasp_skewt.cgi?region=UK{}&grid=d2&day=0&lat=52.521483&lon=-2.877388&time={}'

for day in range(0, 5):
    if not os.path.exists(image_dir.format(day)):
        os.makedirs(image_dir.format(day))
        print "Getting SkewT for day {}".format(day)
    for time in range(start_time, end_time, time_step):
        print time
        if(day == 0):
            day_code = '4'
        else:
            day_code = '%2b' + str(day)
        image_url = url.format(day_code,time)
        #time = str(time).zfill(4)
        print "Downloading SkewT for day {} and time {}".format(day,time)
        print image_url
        try:
            image_file = image_dir.format(day)+"{}.png".format(time);
            skewt_image = urllib.URLopener()
            skewt_image.retrieve(image_url, image_file)
            # TODO: Convert these PNGs to JPG
            #im = Image.open(image_file)
            #im.save(image_file.replace(".png",".jpg"))
        except:
            print "Error downloading SkewT chart for day {} and time {}".format(day, time)
print "Done"
