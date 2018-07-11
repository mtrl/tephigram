$(document).ready(function () {
    var slider = $('.bxslider');
    slider.bxSlider({
        speed: '250',
        preloadImages: 'all',
        pager: false,
        controls: true,
        autoStart: false,
        onSliderLoad: function () {
            $("body").keydown(function (e) {
                if (e.keyCode == 37) { // left
                    slider.goToPrevSlide();
                } else if (e.keyCode == 39) { // right
                    slider.goToNextSlide();
                }
            });

        }
    });
});