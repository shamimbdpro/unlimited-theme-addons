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

    // Elementor frontend support for Testimonial.
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/uta-testimonial.default', function($scope, $) {
            $scope.find(".uta-testimonials").not('.slick-initialized').slick({
                autoplay: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        });
    });

    // Elementor frontend support for Client Logo.
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/uta-company-logo.default', function($scope, $) {
            $scope.find(".uta-company-logo").not('.slick-initialized').slick();
        });
    });


    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uta-twentytwenty.default', function ($scope, $) {
            var before_text = $scope.find('.before_text').text();
            var after_text = $scope.find('.after_text').text();
            $(".uta-twentytwenty[data-orientation='vertical']").twentytwenty({
                'before_label' : before_text,
                'after_label'  : after_text,
                'orientation': 'vertical'
            });
        });
    });


    $(window).on('elementor/frontend/init', function(){
        elementorFrontend.hooks.addAction('frontend/element_ready/uta-twentytwenty.default', function ($scope, $) {
            var before_text = $scope.find('.before_text').text();
            var after_text = $scope.find('.after_text').text();
            $(".uta-twentytwenty[data-orientation!='vertical']").twentytwenty({
                'before_label' : before_text,
                'after_label'  : after_text
            });
        });
    });

    $(".uta-twentytwenty[data-orientation!='vertical']").twentytwenty();
    $(".uta-twentytwenty[data-orientation='vertical']").twentytwenty({orientation: 'vertical'})


    
})(jQuery);



