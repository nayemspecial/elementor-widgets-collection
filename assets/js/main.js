(function ($) {
    "use strict";

    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/slider_widget.default', function ($scope) {

            var $slider = $scope.find('.hero-slider');

            if ($slider.length > 0) {
                $slider.slick({
                    dots: true,
                    infinite: true,
                    speed: 800,
                    fade: true,
                    cssEase: 'linear',
                    autoplay: true,
                    autoplaySpeed: 2000,
                    arrows: true
                });
            }
        });
    });

})(jQuery);