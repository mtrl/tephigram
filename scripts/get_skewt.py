#!/usr/bin/python
import sys, urllib, os
num_days_to_dl = 5
lat = "52.521483"
lon = "-2.877388"
start_time = 700
end_time = 1800
time_step = 100
url = 'http://rasp.inn.leedsmet.ac.uk/cgi-bin/get_rasp_skewt.cgi?region=UK{}&grid=d2&day=0&lat=' + lat + '&lon=' + lon + '&time={}'

image_dir = os.path.normpath(os.path.dirname(os.path.realpath(__file__)) + "/../images") + "/{}/"

for day in range(0, num_days_to_dl + 1):
    if not os.path.exists(image_dir.format(day)):
        os.makedirs(image_dir.format(day))
        print "Getting SkewT for day {}".format(day)
    for time in range(start_time, end_time, time_step):
        time = str(time).zfill(4)
        if(day == 0):
            day_code = '4'
        else:
            day_code = '%2b' + str(day)
        image_url = url.format(day_code,time)
        #time = str(time).zfill(4)
        print "Downloading SkewT for day {} and time {}".format(day,str(time).zfill(4))
        #print image_url
        try:
            image_file = image_dir.format(day)+"{}.png".format(time);
            skewt_image = urllib.URLopener()
            skewt_image.retrieve(image_url, image_file)
            # TODO: Convert these PNGs to JPG
            #im = Image.open(image_file)
            #im.save(image_file.replace(".png",".jpg"))
            #os.remove(image_file)
        except Exception as detail:
            print "Error downloading SkewT chart for day {} and time {}".format(day, time), detail
print "Done"
