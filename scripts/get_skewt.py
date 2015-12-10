#!/usr/bin/python
import sys, urllib, os, time, shutil
num_days_to_dl = 5
lat = "52.521483"
lon = "-2.877388"
start_time = 700
end_time = 1800
time_step = 100
url = 'http://rasp.inn.leedsmet.ac.uk/cgi-bin/get_rasp_skewt.cgi?region=UK{}&grid=d2&day=0&lat=' + lat + '&lon=' + lon + '&time={}'

image_dir = os.path.normpath(os.path.dirname(os.path.realpath(__file__)) + "/../images") + "/{}/"

for day in range(0, num_days_to_dl + 1):
    # Skip day 1
    if day == 1:
        day = 2
    if os.path.exists(image_dir.format(day)):
        shutil.rmtree(image_dir.format(day))

    os.makedirs(image_dir.format(day))
    print "Getting SkewT for day {}".format(day)

    for image_time in range(start_time, end_time, time_step):
        image_time = str(image_time).zfill(4)
        if(day == 0):
            day_code = '4'
        else:
            day_code = '%2b' + str(day)
        image_url = url.format(day_code,image_time)
        #time = str(time).zfill(4)
        print "Downloading SkewT for day {} and time {}".format(day,str(image_time).zfill(4))
        #print image_url
        try:
            thetime = str(time.time())
            image_file = image_dir.format(day)+"{}.png".format(image_time);
            skewt_image = urllib.URLopener()
            skewt_image.retrieve(image_url, image_file.replace(".png", "_time_" + thetime + ".png"))
            # TODO: Convert these PNGs to JPG
            #im = Image.open(image_file)
            #im.save(image_file.replace(".png",".jpg"))
            #os.remove(image_file)
        except Exception as detail:
            print "Error downloading SkewT chart for day {} and time {}".format(day, image_time), detail
print "Done"
