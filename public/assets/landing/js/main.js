/*-----------------------------------------------------------------

Template Name: Axispro Business & corporate agency HTML template 
Author:  Valorwide
Author URI: https://themeforest.net/user/Valorwide/portfolio
Version: 1.0.0
Description: Axispro Business & corporate agency HTML template <

-------------------------------------------------------------------
CSS TABLE OF CONTENTS
-------------------------------------------------------------------

01. header
02. magnificPopup
03. counter up
04. wow animation
05. nice select
06. swiper slider
07. search popup
08. back to top 
09. mousecursor
10. circle-progress 
11. preloader 


------------------------------------------------------------------*/

(function($) {
    "use strict";

    $(document).ready( function() {

        //>> Mobile Menu Js Start <<//
        $('#mobile-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "1199",
            meanExpand: ['<i class="far fa-plus"></i>'],
        });

        //>> Sidebar Toggle Js Start <<//
        $(".offcanvas__close,.offcanvas__overlay").on("click", function() {
            $(".offcanvas__info").removeClass("info-open");
            $(".offcanvas__overlay").removeClass("overlay-open");
        });
        $(".sidebar__toggle").on("click", function() {
            $(".offcanvas__info").addClass("info-open");
            $(".offcanvas__overlay").addClass("overlay-open");
        });

        //>> Body Overlay Js Start <<//
        $(".body-overlay").on("click", function() {
            $(".offcanvas__area").removeClass("offcanvas-opened");
            $(".df-search-area").removeClass("opened");;
            $(".body-overlay").removeClass("opened");
        });

        //>> Sticky Header Js Start <<//

        $(window).scroll(function() {
            if ($(this).scrollTop() > 250) {
                $("#header-sticky").addClass("sticky");
            } else {
                $("#header-sticky").removeClass("sticky");
            }
        });

        //>> Video Popup Start <<//
        $(".img-popup").magnificPopup({
            type: "image",
            gallery: {
                enabled: true,
            },
        });

        $('.video-popup').magnificPopup({
            type: 'iframe',
            callbacks: {
            }
        });
        
        //>> Counterup Start <<//
        $(".count").counterUp({
            delay: 15,
            time: 4000,
        });

        //>> Wow Animation Start <<//
        new WOW().init();

        //>> Nice Select Start <<//
        $('select').niceSelect();

        //>> Service Slider Start <<//
        if($('.hero-slider').length > 0) {
            const heroSlider = new Swiper(".hero-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },

                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
            });
        }

        //>> Service Slider Start <<//
        if($('.sevice-slider').length > 0) {
            const serviceSlider = new Swiper(".sevice-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".dot",
                    clickable: true,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    400: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //>> Project Slider Start <<//
        if($('.project-slider').length > 0) {
            const projectSlider = new Swiper(".project-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 4,
                    },
                    991: {
                        slidesPerView: 3,
                    },
                    767: {
                        slidesPerView: 2,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    400: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //>> Brand Slider Start <<//
        if($('.brand-slider').length > 0) {
            const brandSlider = new Swiper(".brand-slider", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 5,
                    },
                    991: {
                        slidesPerView: 4,
                    },
                    767: {
                        slidesPerView: 3,
                    },
                    575: {
                        slidesPerView: 2,
                    },
                    400: {
                        slidesPerView: 2,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //>> Brand Slider-2 Start <<//
        if($('.brand-slider-2').length > 0) {
            const brandSlider2 = new Swiper(".brand-slider-2", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 2000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 5,
                    },
                    991: {
                        slidesPerView: 4,
                    },
                    767: {
                        slidesPerView: 3,
                    },
                    575: {
                        slidesPerView: 2,
                    },
                    400: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

        //>> Testimonial Slider Start <<//
        if($('.testimonial-active').length > 0) {
            const testimonialActive = new Swiper(".testimonial-active", {
                spaceBetween: 30,
                speed: 2000,
                loop: true,
                autoplay: {
                    delay: 1000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".array-prev",
                    prevEl: ".array-next",
                },
                breakpoints: {
                    1199: {
                        slidesPerView: 1,
                    },
                    991: {
                        slidesPerView: 1,
                    },
                    767: {
                        slidesPerView: 1,
                    },
                    575: {
                        slidesPerView: 1,
                    },
                    0: {
                        slidesPerView: 1,
                    },
                },
            });
        }

         //>> Search Popup Start <<//
         const $searchWrap = $(".search-wrap");
         const $navSearch = $(".nav-search");
         const $searchClose = $("#search-close");
 
         $(".search-trigger").on("click", function (e) {
             e.preventDefault();
             $searchWrap.animate({ opacity: "toggle" }, 500);
             $navSearch.add($searchClose).addClass("open");
         });
 
         $(".search-close").on("click", function (e) {
             e.preventDefault();
             $searchWrap.animate({ opacity: "toggle" }, 500);
             $navSearch.add($searchClose).removeClass("open");
         });
 
         function closeSearch() {
             $searchWrap.fadeOut(200);
             $navSearch.add($searchClose).removeClass("open");
         }
 
         $(document.body).on("click", function (e) {
             closeSearch();
         });
 
         $(".search-trigger, .main-search-input").on("click", function (e) {
             e.stopPropagation();
         });

        //>> Back To Top Slider Start <<//
        $(window).scroll(function () {
            if ($(this).scrollTop() > 20) {
                $("#back-top").addClass("show");
            } else {
                $("#back-top").removeClass("show");
            }
        });
        $("#back-top").click(function () {
            $("html, body").animate({ scrollTop: 0 }, 800);
            return false;
        });

        //>> Mouse Cursor Start <<//
        function mousecursor() {
            if ($("body")) {
                const e = document.querySelector(".cursor-inner"),
                    t = document.querySelector(".cursor-outer");
                let n,
                    i = 0,
                    o = !1;
                (window.onmousemove = function(s) {
                    o ||
                        (t.style.transform =
                            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                        (e.style.transform =
                            "translate(" + s.clientX + "px, " + s.clientY + "px)"),
                        (n = s.clientY),
                        (i = s.clientX);
                }),
                $("body").on("mouseenter", "a, .cursor-pointer", function() {
                        e.classList.add("cursor-hover"), t.classList.add("cursor-hover");
                    }),
                    $("body").on("mouseleave", "a, .cursor-pointer", function() {
                        ($(this).is("a") && $(this).closest(".cursor-pointer").length) ||
                        (e.classList.remove("cursor-hover"),
                            t.classList.remove("cursor-hover"));
                    }),
                    (e.style.visibility = "visible"),
                    (t.style.visibility = "visible");
            }
        }
        $(function() {
            mousecursor();
        });

         // circle-progress
         $(".circle-bar").loading();

    }); // End Document Ready Function

    $.fn.loading = function() {
        const DEFAULTS = {
            backgroundColor: '#b3cef6',
            progressColor: '#4b86db',
            percent: 75,
            duration: 2000
        };

        $(this).each(function() {
            const $target = $(this);

            const opts = {
                backgroundColor: $target.data('color') ? $target.data('color').split(',')[0] : DEFAULTS.backgroundColor,
                progressColor: $target.data('color') ? $target.data('color').split(',')[1] : DEFAULTS.progressColor,
                percent: $target.data('percent') ? $target.data('percent') : DEFAULTS.percent,
                duration: $target.data('duration') ? $target.data('duration') : DEFAULTS.duration
            };
            // console.log(opts);

            $target.append('<div class="background"></div><div class="rotate"></div><div class="left"></div><div class="right"></div><div class=""><span>' + opts.percent + '%</span></div>');

            $target.find('.background').css('background-color', opts.backgroundColor);
            $target.find('.left').css('background-color', opts.backgroundColor);
            $target.find('.rotate').css('background-color', opts.progressColor);
            $target.find('.right').css('background-color', opts.progressColor);

            const $rotate = $target.find('.rotate');
            setTimeout(function() {
                $rotate.css({
                    'transition': 'transform ' + opts.duration + 'ms linear',
                    'transform': 'rotate(' + opts.percent * 3.6 + 'deg)'
                });
            }, 1);

            if (opts.percent > 50) {
                let animationRight = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-end';
                let animationLeft = 'toggle ' + (opts.duration / opts.percent * 50) + 'ms step-start';
                $target.find('.right').css({
                    animation: animationRight,
                    opacity: 1
                });
                $target.find('.left').css({
                    animation: animationLeft,
                    opacity: 0
                });
            }
        });
    }

    function loader() {
        $(window).on('load', function() {
            // Animate loader off screen
            $(".preloader").addClass('loaded');                    
            $(".preloader").delay(600).fadeOut();                       
        });
    }

    loader();
   

})(jQuery); // End jQuery

