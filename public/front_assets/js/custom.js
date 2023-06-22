jQuery(document).ready(function($) {
    (function($) {

        'use strict';

        /*-----------------------
        --> Off Canvas Menu
        -------------------------*/
        /*Variables*/
        var $offCanvasNav = $('.off-canvas-nav'),
            $offCanvasNavSubMenu = $offCanvasNav.find('.sub-menu');

        /*Add Toggle Button With Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.parent().prepend('<span class="menu-expand"><i class="fas fa-chevron-down"></i></span>');

        /*Close Off Canvas Sub Menu*/
        $offCanvasNavSubMenu.slideUp();

        /*Category Sub Menu Toggle*/
        $offCanvasNav.on('click', 'li a, li .menu-expand', function(e) {
            var $this = $(this);
            if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
                e.preventDefault();
                if ($this.siblings('ul:visible').length) {
                    $this.parent('li').removeClass('active');
                    $this.siblings('ul').slideUp();
                } else {
                    $this.parent('li').addClass('active');
                    $this.closest('li').siblings('li').find('ul:visible').slideUp();
                    $this.siblings('ul').slideDown();
                }
            }
        });

        // Off Canvas Open close
        $(".off-canvas-btn").on('click', function() {
            $(".off-canvas-wrapper").addClass('open');
        });

        $(".btn-close-off-canvas").on('click', function() {
            $(".off-canvas-wrapper").removeClass('open');
        });

        /**********************
         *Expand Category Menu
         ***********************/

        function categoryMenuExpand() {
            $(".hidden-menu-item").css('display', 'none');

            $(window).on({
                load: function() {
                    var ww = $(window).width();
                    if (ww <= 1200) {
                        $(".hidden-lg-menu-item").css('display', 'none');
                    }
                },
                resize: function() {

                    var ww = $(window).width();
                    if (ww <= 1200) {
                        $(".hidden-lg-menu-item").css('display', 'none');
                    }
                }
            });
            $(".js-expand-hidden-menu").on('click', function(e) {
                e.preventDefault();
                $(".hidden-menu-item").toggle(500);
                var window_width = $(window).width();
                if (window_width <= 1200) {
                    $(".hidden-lg-menu-item").toggle(500);
                }
                var htmlAfter = "Close Categories";
                var htmlBefore = "More Categories";

                $(this).html($(this).text() == htmlAfter ? htmlBefore : htmlAfter);
                $(this).toggleClass("menu-close");
            });
        }
        /**********************
         *Expand Category Mobile Menu 
         ***********************/

        function categoryMenuExpandInMobile() {
            $('.category-menu .has-children > a').on('click', function(e) {
                e.preventDefault();
                $(this).siblings('.sub-menu').slideToggle('500');
            });
        }
        categoryMenuExpand();
        categoryMenuExpandInMobile();

        /*------------------------
        	--> Search PopUp
        ------------------------*/
        (function() {
            $(".search-trigger").on('click', function() {
                $(".search-wrapper").addClass('open');
            })
            $(".search-dismiss,body").on('click', function(e) {
                    $(".search-wrapper").removeClass('open')
                })
                // $("body").on('click', function () { 
                // 	$(".search-wrapper").removeClass('open')
                // })
            $(".search-box,.search-trigger").on('click', function(e) {
                e.stopPropagation();
            })
        })();

        $('.category-trigger').on('click', function(e) {
            $('.category-nav').toggleClass('show');
            e.stopPropagation();
        })

        /*------------------------
        	--> Slick Carousel
        ------------------------*/

        var $html = $('html');
        var $body = $('body');
        var $uptimoSlickSlider = $('.sb-slick-slider');

        /*For RTL*/
        if ($html.attr("dir") == "rtl" || $body.attr("dir") == "rtl") {
            $uptimoSlickSlider.attr("dir", "rtl");
        }

        $uptimoSlickSlider.each(function() {

            /*Setting Variables*/
            var $this = $(this),
                $setting = $this.data('slick-setting') ? $this.data('slick-setting') : '',
                $autoPlay = $setting.autoplay ? $setting.autoplay : false,
                $autoPlaySpeed = parseInt($setting.autoplaySpeed, 10) || 2000,
                $asNavFor = $setting.asNavFor ? $setting.asNavFor : null,
                $appendArrows = $setting.appendArrows ? $setting.appendArrows : $this,
                $appendDots = $setting.appendDots ? $setting.appendDots : $this,
                $arrows = $setting.arrows ? $setting.arrows : false,
                $prevArrow = $setting.prevArrow ? '<button class="' + ($setting.prevArrow.buttonClass ? $setting.prevArrow.buttonClass : 'slick-prev') + '"><i class="' + $setting.prevArrow.iconClass + '"></i></button>' : '<button class="slick-prev">previous</button>',
                $nextArrow = $setting.nextArrow ? '<button class="' + ($setting.nextArrow.buttonClass ? $setting.nextArrow.buttonClass : 'slick-next') + '"><i class="' + $setting.nextArrow.iconClass + '"></i></button>' : '<button class="slick-next">next</button>',
                $centerMode = $setting.centerMode ? $setting.centerMode : false,
                $centerPadding = $setting.centerPadding ? $setting.centerPadding : '50px',
                $dots = $setting.dots ? $setting.dots : false,
                $fade = $setting.fade ? $setting.fade : false,
                $focusOnSelect = $setting.focusOnSelect ? $setting.focusOnSelect : false,
                $infinite = $setting.infinite ? $setting.infinite : false,
                $pauseOnHover = $setting.pauseOnHover ? $setting.pauseOnHover : false,
                $rows = parseInt($setting.rows, 10) || 1,
                $slidesToShow = parseInt($setting.slidesToShow, 10) || 1,
                $slidesToScroll = parseInt($setting.slidesToScroll, 10) || 1,
                $swipe = $setting.swipe ? $setting.swipe : true,
                $swipeToSlide = $setting.swipeToSlide ? $setting.swipeToSlide : false,
                $variableWidth = $setting.variableWidth ? $setting.variableWidth : false,
                $vertical = $setting.vertical ? $setting.vertical : false,
                $verticalSwiping = $setting.verticalSwiping ? $setting.verticalSwiping : false,
                $rtl = $setting.rtl || $html.attr('dir="rtl"') || $body.attr('dir="rtl"') ? true : false;

            /*Responsive Variable, Array & Loops*/
            var $responsiveSetting = typeof $this.data('slick-responsive') !== 'undefined' ? $this.data('slick-responsive') : '',
                $responsiveSettingLength = $responsiveSetting.length,
                $responsiveArray = [];
            for (var i = 0; i < $responsiveSettingLength; i++) {
                $responsiveArray[i] = $responsiveSetting[i];
            }
            /*Slider Start*/
            $this.slick({
                autoplay: $autoPlay,
                autoplaySpeed: $autoPlaySpeed,
                asNavFor: $asNavFor,
                appendArrows: $appendArrows,
                appendDots: $appendDots,
                arrows: $arrows,
                dots: $dots,
                centerMode: $centerMode,
                centerPadding: $centerPadding,
                fade: $fade,
                focusOnSelect: $focusOnSelect,
                infinite: $infinite,
                pauseOnHover: $pauseOnHover,
                rows: $rows,
                slidesToShow: $slidesToShow,
                slidesToScroll: $slidesToScroll,
                swipe: $swipe,
                swipeToSlide: $swipeToSlide,
                variableWidth: $variableWidth,
                vertical: $vertical,
                verticalSwiping: $verticalSwiping,
                rtl: $rtl,
                prevArrow: $prevArrow,
                nextArrow: $nextArrow,
                responsive: $responsiveArray
            });

        });
        /*---------------------------
        	--> Dropdown Slide Item
        ----------------------------*/

        $(".slide-down--btn").on('click', function(e) {
            e.stopPropagation();
            $(this).siblings('.slide-down--item').slideToggle("400");
            $(this).siblings('.slide-down--item').toggleClass("show");
            var $selectClass = $(this).parents('.slide-wrapper').siblings().children('.slide-down--item');
            $(this).parents('.slide-wrapper').siblings().children('.slide-down--item').slideUp('400');
        })

        /*-------------------------------------
        	--> Slideup While clicking On Dom
        ---------------------------------------*/
        function clickDom() {
            $('body').on('click', function(e) {
                $('.slide-down--item').slideUp('500');
            });
            $('.slide-down--item').on('click', function(e) {
                e.stopPropagation();
            })
        };

        clickDom();


        /*-------------------------------------
        	--> Sticky Header
        ---------------------------------------*/
        function stickyHeader() {

            var headerHeight = $('.site-header')[0].getBoundingClientRect().height;
            $(window).on({
                resize: function() {
                    var width = $(window).width();
                    if ((width <= 991)) {
                        $('.sticky-init').removeClass('fixed-header');
                        if ($('.sticky-init').hasClass('sticky-header')) {
                            $('.sticky-init').removeClass('sticky-header');
                        }

                    } else {
                        $('.sticky-init').addClass('fixed-header');
                    }
                },
                load: function() {
                    var width = $(window).width();
                    if ((width <= 991)) {
                        $('.sticky-init').removeClass('fixed-header');
                        if ($('.sticky-init').hasClass('sticky-header')) {
                            $('.sticky-init').removeClass('sticky-header');
                        }

                    } else {
                        $('.sticky-init').addClass('fixed-header');
                    }
                }
            });
            $(window).on('scroll', function() {
                if ($(window).scrollTop() >= headerHeight) {
                    $('.fixed-header').addClass('sticky-header');
                } else {
                    $('.fixed-header').removeClass('sticky-header');
                }
            })


        }
        stickyHeader()
            /*-------------------------------------
            	--> Range Slider
            ---------------------------------------*/
        $(function() {
            $(".sb-range-slider").slider({
                range: true,
                min: 0,
                max: 753,
                values: [80, 320],
                slide: function(event, ui) {
                    $("#amount").val("£" + ui.values[0] + " - £" + ui.values[1]);
                }
            });
            $("#amount").val("£" + $(".sb-range-slider").slider("values", 0) +
                " - £" + $(".sb-range-slider").slider("values", 1));
        });

        /*-------------------------------------
        	--> Product View Mode
        ---------------------------------------*/
        $('.product-view-mode a').on('click', function(e) {
            e.preventDefault();

            var shopProductWrap = $('.shop-product-wrap');
            var viewMode = $(this).data('target');

            $('.product-view-mode a').removeClass('active');
            $(this).addClass('active');
            shopProductWrap.removeClass('grid list').addClass(viewMode);
            if (shopProductWrap.hasClass('grid')) {
                $('.pm-product').removeClass('product-type-list')
            } else {
                $('.pm-product').addClass('product-type-list')
            }
        })

        /*-------------------------------------
        	--> Quantity
        ---------------------------------------*/
        $('.count-btn').on('click', function() {
            var $button = $(this);
            var oldValue = $button.parent('.count-input-btns').parent().find('input').val();
            if ($button.hasClass('inc-ammount')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent('.count-input-btns').parent().find('input').val(newVal);
        });
        /*-------------------------------------
        	--> Shipping Form Toggle
        ---------------------------------------*/
        $('[data-shipping]').on('click', function() {
                if ($('[data-shipping]:checked').length > 0) {
                    $('#shipping-form').slideDown();
                } else {
                    $('#shipping-form').slideUp();
                }
            })
            /*-------------------------------------
            	--> Add To Cart Animation
            ---------------------------------------*/
        $('.add-to-cart').on('click', function(e) {
            e.preventDefault();

            if ($(this).hasClass('added')) {
                $(this).removeClass('added').find('i').removeClass('ti-check').addClass('ti-shopping-cart').siblings('span').text('add to cart');
            } else {
                $(this).addClass('added').find('i').addClass('ti-check').removeClass('ti-shopping-cart').siblings('span').text('added');
            }
        });
        /*-------------------------------------
        	--> Data Background Image
        ---------------------------------------*/
        function bgImageSettings() {
            $('.bg-image').each(function() {
                var $this = $(this),
                    $image = $this.data('bg');

                $this.css({
                    'background-image': 'url(' + $image + ')'
                });
            });
        }

        bgImageSettings();

        /*-------------------------------------
        	--> NIce Select
        ---------------------------------------*/
        $('.nice-select').niceSelect()


        /*-------------------------------------
        	--> Product Sorting
        ---------------------------------------*/
        $('.product-view-mode a').on('click', function(e) {
                e.preventDefault();

                var shopProductWrap = $('.shop-product-wrap');
                var viewMode = $(this).data('target');

                $('.product-view-mode a').removeClass('active');
                $(this).addClass('active');
                shopProductWrap.removeClass('grid list grid-four').addClass(viewMode);
                if (shopProductWrap.hasClass('grid') || shopProductWrap.hasClass('grid-four')) {
                    $('.product-card').removeClass('card-style-list')
                } else {
                    $('.product-card').addClass('card-style-list')
                }
            })
            /*-------------------------------------
            	--> Payment method select
            ---------------------------------------*/
        $('[name="payment-method"]').on('click', function() {

            var $value = $(this).attr('value');

            $('.single-method p').slideUp();
            $('[data-method="' + $value + '"]').slideDown();

        });
        $('.slide-trigger').on('click', function() {

            var $value = $(this).data('target');

            // $('.single-method p').slideUp();
            $($value).slideToggle();

        });



        /*---------------------------------------------------------------------------------------
        --> Scroll Top (When the user clicks on the button, scroll to the top of the document)
        -----------------------------------------------------------------------------------------*/
        $.scrollUp({
            scrollText: '<i class="ion-chevron-right"></i><i class="ion-chevron-right"></i>',
            easingType: 'linear',
            scrollSpeed: 900,
        });
    })(jQuery);

    /*--
    	MailChimp
    -----------------------------------*/
    $('#mc-form').ajaxChimp({
        language: 'en',
        callback: mailChimpResponse,
        // ADD YOUR MAILCHIMP URL BELOW HERE!
        url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'

    });

    function mailChimpResponse(resp) {

        if (resp.result === 'success') {
            $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
            $('.mailchimp-error').fadeOut(400);

        } else if (resp.result === 'error') {
            $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
        }
    }


    /*-------------------------------------
    	--> Countdown Activation
    ---------------------------------------*/

    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="single-countdown"><span class="single-countdown__time">%D</span><span class="single-countdown__text">Days</span></div><div class="single-countdown"><span class="single-countdown__time">%H</span><span class="single-countdown__text">Hours</span></div><div class="single-countdown"><span class="single-countdown__time">%M</span><span class="single-countdown__text">mins</span></div><div class="single-countdown"><span class="single-countdown__time">%S</span><span class="single-countdown__text">Secs</span></div>'));
        });
    });
    $('.color-list a').on('click', function(e) {
        e.preventDefault();
        var $this = $(this);
        $this.addClass('active');
        $this.siblings().removeClass('active');
        var $navs = document.querySelectorAll('#product-nav .single-slide');
        var $details = document.querySelectorAll('#products-details .single-slide');
        var $btnColor = $this.data('swatch-color');
        for (var i = 0; i < $navs.length; i++) {
            $navs[i].classList.remove('slick-current');
            if ($navs[i].classList.contains($btnColor)) {
                $navs[i].classList.add('slick-current');
            }
        }
        for (var i = 0; i < $details.length; i++) {
            $details[i].classList.remove('slick-current');
            $details[i].style.opacity = 0;
            if ($details[i].classList.contains($btnColor)) {
                $details[i].classList.add('slick-current');
                $details[i].style.opacity = 1;
            }
        }

    });

    /*--
        15: Google Map
    ----------------------------------------------------*/
    // Initialize and add the map
    if ($('#google-map').length) {
        function initMap() {
            // The location of Uluru
            var uluru = { lat: 40.7127753, lng: -74.0059728 };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('google-map'), { zoom: 12, center: uluru });
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({ position: uluru, map: map });
        }
        initMap();
    }

});