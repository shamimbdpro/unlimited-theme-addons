(function($) {
    "use strict";

    // Preloader
    $(window).load(function() {
        $('#preloader').delay(0).fadeOut();
    });

    //Navbar
    $(window).on("load resize", function(event){
        if ($(this).width() >= 992) {
            if ($('.menu-bar.fixed-top').length) {
                $('.banner').addClass('banner-extra-pad');                
                $('.banner-products li:nth-child(3),.banner-products li:nth-child(4)').css('top', '20%');
                $('.breadcrumb-content').addClass('breadcrumb-extra-pad');
            }
        } else {
            $('.banner').removeClass('banner-extra-pad');
            $('.breadcrumb-content').removeClass('breadcrumb-extra-pad');
        }
    });

    // Products Tooltip
    $(".sit-preview").smartImageTooltip({previewTemplate: "envato", imageWidth: "500px"});

    // Bootstrap dropdown hover menu
    $('ul.navbar-nav li.dropdown').hover(function() {
      $(this).find('.dropdown-menu').stop(true, true).fadeIn(100);
    }, function() {
      $(this).find('.dropdown-menu').stop(true, true).fadeOut(100);
    });

    //Mobile Nav Hide Show
    if($('.mobile-menu').length){
        
        var mobileMenuContent = $('.desktop-menu').html();
        $('.mobile-menu .navigation').append(mobileMenuContent);

        //Menu Toggle Btn
        $('.mobile-nav-toggler').on('click', function() {
            $('body').addClass('mobile-menu-visible');
        });

        //Menu Toggle Btn
        $('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
            $('body').removeClass('mobile-menu-visible');
        });
    }

    $('.mobile-menu li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
    $('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function() {
            $(this).prev('ul').slideToggle(500);
    });

    $(window).on("load", function() {

        // Download
        if ($('.download_items').length) {
            var $container = $('.download_items');
            $container.isotope();

            $('.download-filter ul li').on("click", function() {
                $(".download-filter ul li").removeClass("select-cat");
                $(this).addClass("select-cat");
                var selector = $(this).attr('data-filter');
                $(".download_items").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });
                return false;
            });
        }

        // Newest
        if ($('.newest_items').length) {
            var $container = $('.newest_items');
            $container.isotope();

            $('.newest-filter ul li').on("click", function() {
                $(".newest-filter ul li").removeClass("select-cat");
                $(this).addClass("select-cat");
                var selector = $(this).attr('data-filter');
                $(".newest_items").isotope({
                    filter: selector,
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false,
                    }
                });
                return false;
            });
        }

    }); // window load end 

    //Accordion
    $('.themeplace-accordion-item:first-child').addClass('active');
    $('.themeplace-accordion-item:first-child .collapse').addClass('show');
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).parent().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        $(this).parent().removeClass('active');
    });

  

    // Popup Video
    $('.themeplace-popup-video,.themeplace-popup-url').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    // Popup Gallery
    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
            }
        }
    });
    
    //Backtotop
    $(window).on('scroll', function() {
        if ($(this).scrollTop() >= 700) {
            $('#backtotop').fadeIn(500);
        } else {
            $('#backtotop').fadeOut(500);
        }
    });

    $('#backtotop').on('click', function() {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
    });

    // EDD Download Shortcode add ROW
    $('.edd_downloads_list').addClass('row');

    // Remove Class From Newly Added Item
    $(window).on('resize', function() {
        if (window.matchMedia('(max-width: 414px)').matches) {
            $('.newest_items div').removeClass('dm-col-10');
            $('.newest_items div').addClass('col-4');
        } 
    });

    // Menu ajax cart 
    $(document.body).on('click', '.edd-add-to-cart', function(){
        setTimeout(function () { 
            $('.menu-cart').load(themeplace_menu_ajax.ajaxurl+'?action=themeplace_menu_ajax&_wpnonce='+themeplace_menu_ajax.nonce);
        }, 1000);
    });
    // Elementor frontend support
    $(window).on('elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction('frontend/element_ready/testimonials.default', function($scope, $) {
            $scope.find(".testimonials").not('.slick-initialized').slick({
                autoplay: true,
                infinite: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        });
    });

})(jQuery);
