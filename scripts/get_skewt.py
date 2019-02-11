#!/usr/bin/python
from PIL import Image
import sys, urllib, os, time, shutil
num_days_to_dl = 4
lat = "52.517936"
lon = "-2.879209"
start_time = 700
end_time = 2000
time_step = 100
url = 'http://mrsap.org/rasp/skewt.php?region=UK{}&lat=' + lat + '&lon=' + lon + '&grid=d2&time={}&plot=skewt'
image_dimensions = 800, 800

image_dir = os.path.normpath(os.path.dirname(os.path.realpath(__file__)) + "/../images") + "/{}/"

for day in range(0, num_days_to_dl + 1):
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
        print image_url
        try:
            thetime = str(time.time())
            image_file = image_dir.format(day)+"{}.png".format(image_time);
            skewt_image = urllib.URLopener()
            timestamped_filename = image_file.replace(".png", "_time_" + thetime + ".png")
            skewt_image.retrieve(image_url, timestamped_filename)
            # Convert the PNGs to JPG
            im = Image.open(timestamped_filename)
            im.thumbnail(image_dimensions, Image.ANTIALIAS)
            im.save(timestamped_filename.replace(".png",".jpg"), "JPEG")
            os.remove(timestamped_filename)
        except Exception as detail:
            print "Error downloading SkewT chart for day {} and time {}".format(day, image_time), detail
print "Done"
