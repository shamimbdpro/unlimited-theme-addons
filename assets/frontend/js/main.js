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


     // Elementor frontend support for Image Comparison.
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
    $(".uta-twentytwenty[data-orientation='vertical']").twentytwenty({orientation: 'vertical'});

 


 // Jquery Counter Up.

  var utaCounterHandler = function ($scope, $) {
      
     $(".odometer").appear(function(e) {
        $(".odometer").each(function() {
            var e = $(this).attr("data-count");
            $(this).html(e)
        })
     });
   

    };

    // Accordion.
    var utaAccordion = function ($scope, $) {

        $(".uta-accordion li.active .accordion-body").slideDown(100);
        $('.uta-accordion li').click(function(e) {
            e.preventDefault();

           let dataID = $(this).parent().attr('id');

            let toggleSpeed = $(this).data('speed');

            if ($(this).hasClass("active")) {

                $("#"+dataID+" li").removeClass("active").find(".accordion-body").slideUp(toggleSpeed);

            } else {
                $("#"+dataID+" li.active .accordion-body").slideUp(toggleSpeed);
                $("#"+dataID+" li.active").removeClass("active");
                $(this).addClass("active").find(".accordion-body").slideDown(toggleSpeed);

            }

         e.stopImmediatePropagation();

        });

    };


  $(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/uta-counter-up.default', utaCounterHandler);

        elementorFrontend.hooks.addAction('frontend/element_ready/uta-accordion.default', utaAccordion);
      
    });




})(jQuery);


