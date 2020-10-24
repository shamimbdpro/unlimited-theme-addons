(function($) {
    "use strict";
    // Popup Video
    $('.uta-popup-video,.uta-popup-url').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // Elementor frontend support
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonials.default', function($scope, $) {
            $scope.find(".testimonials").not('.slick-initialized').slick({
                autoplay: true,
                infinite: true,
                speed: 300,
                slidesToShow: 2,
                slidesToScroll: 1,
            });
        });
    });

})(jQuery);
