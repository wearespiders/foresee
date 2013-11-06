function is_touch_device() {
    return !!('ontouchstart' in window) || !! ('onmsgesturechange' in window);
}
jQuery.exists = function (selector) {
    return (jQuery(selector).length > 0);
};

(function ($) {

    "use strict";




    /* Blog, Portfolio Audio */
    /* -------------------------------------------------------------------- */

    function loop_audio_init() {
        if ($.exists('.jp-jplayer')) {
            $('.jp-jplayer.mk-blog-audio').each(function () {
                var css_selector_ancestor = "#" + $(this).siblings('.jp-audio').attr('id');
                var ogg_file, mp3_file, mk_theme_js_path;
                ogg_file = $(this).attr('data-ogg');
                mp3_file = $(this).attr('data-mp3');
                $(this).jPlayer({
                    ready: function () {
                        $(this).jPlayer("setMedia", {
                            mp3: mp3_file,
                            ogg: ogg_file,
                        });
                    },
                    play: function () { // To avoid both jPlayers playing together.
                        $(this).jPlayer("pauseOthers");
                    },
                    swfPath: mk_theme_js_path,
                    supplied: "mp3, ogg",
                    cssSelectorAncestor: css_selector_ancestor,
                    wmode: "window"
                });
            });
        }
    }

    /* jQuery Colorbox lightbox */
    /* -------------------------------------------------------------------- */

    function mk_prettyPhoto_init() {
        $(".mk-lightbox").prettyPhoto({
            animation_speed: 'fast',
            /* fast/slow/normal */
            slideshow: 5000,
            /* false OR interval time in ms */
            autoplay_slideshow: false,
            /* true/false */
            opacity: 0.80,
            /* Value between 0 and 1 */
            show_title: true,
            /* true/false */
            allow_resize: true,
            /* Resize the photos bigger than viewport. true/false */
            default_width: 500,
            default_height: 344,
            counter_separator_label: '/',
            /* The separator for the gallery counter 1 "of" 2 */
            theme: 'mk-prettyphoto',
            horizontal_padding: 5,
            /* The padding on each side of the picture */
            hideflash: false,
            /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
            wmode: 'opaque',
            /* Set the flash wmode attribute */
            autoplay: true,
            /* Automatically start videos: True/False */
            modal: false,
            /* If set to true, only the close button will close the window */
            deeplinking: true,
            /* Allow prettyPhoto to update the url to enable deeplinking. */
            overlay_gallery: true,
            /* If set to true, a gallery will overlay the fullscreen image on mouse over */


        });
    }

    /* Background Parallax Effects */
        /* -------------------------------------------------------------------- */

        function mk_backgrounds_parallax() {
            if(mk_header_parallax == true) { $('.mk-header-bg').addClass('mk-parallax-enabled');}
            if(mk_body_parallax == true) { $('body').addClass('mk-parallax-enabled');}
            if(mk_banner_parallax == true) { $('#mk-header').addClass('mk-parallax-enabled');}
            if(mk_page_parallax == true) { $('#theme-page').addClass('mk-parallax-enabled');}
            if(mk_footer_parallax == true) { $('#mk-footer').addClass('mk-parallax-enabled');}

            $('.mk-parallax-enabled').each(function() {
                if(!is_touch_device()) {
                   $(this).parallax("49%", -0.2);
                }

            });
        }


    $(document).ready(function () {

        mk_prettyPhoto_init();
        mk_backgrounds_parallax();



        /* Animated Contents */
        /* -------------------------------------------------------------------- */
        if (!is_touch_device()) {
            $('body').addClass('mk-transform');
        }

        function mk_animated_contents() {
            if ($.exists('.mk-animate-element')) {
                $(".mk-animate-element:in-viewport").each(function (i) {
                    var $this = $(this);
                    if (!$this.hasClass('mk-in-viewport')) {
                        setTimeout(function () {
                            $this.addClass('mk-in-viewport');
                        }, 200 * i);
                    }
                });
            }
        }
        mk_animated_contents();
        $(window).scroll(function () {
            mk_animated_contents();
        });


        /* Box Blur effect */
        /* -------------------------------------------------------------------- */


        $(window).load(function () {
            if ($.exists('.icon-box-boxed.blured-box, .mk-employee-item.employee-item-blur') && !is_touch_device()) {
                $('.icon-box-boxed.blured-box, .mk-employee-item.employee-item-blur').blurjs({
                    source: ".mk-blur-parent",
                    radius: 22,
                    overlay: "rgba(255,255,255,0.6)"
                });
            }

        });


        /* Tabs */
        /* -------------------------------------------------------------------- */


        if ($.exists('.mk-tabs, .mk-news-tab')) {
            $(".mk-tabs, .mk-news-tab").tabs();
        }


        /* Removes Page Section top distance if used the first element */
        /* -------------------------------------------------------------------- */
        if($.exists('.mk-page-section-frist')) {
                $('.mk-main-wrapper').hide();
                $('#theme-page').css('padding-top', 0);
        }

        



        /* Adds Video element to page section background */
        /* -------------------------------------------------------------------- */

       

        function mk_video_background_size() {
                var $width;
            if($.exists('.mk-boxed-enabled')) {
                $width = $('#mk-boxed-layout').width();
            } else {
                $width = $('body').width();
            }

            $('.mk-section-video video, .mk-section-video .mejs-overlay, .mk-section-video .mejs-container').css({width : $width, height : parseInt($width/1.777)});
            $('.mk-section-video').css('width', $width);
            $('.mk-section-video video, .mk-section-video object').attr({'width' : $width, 'height' : parseInt($width/1.777)});

    }

        if($.exists('.mk-section-video')) {
            mk_video_background_size();
            

            if(!is_touch_device() || $(window).width() > 960) {
                
                 $('.mk-section-video video').mediaelementplayer();
                $('.mk-video-preload').hide();
            }
            

            $(window).on("debouncedresize", function () {
                        mk_video_background_size();
            });
        }



        /* Floating Go to top Link */
        /* -------------------------------------------------------------------- */
        $(window).scroll(function () {
            if ($(this).scrollTop() > 700) {
                $('.mk-go-top, .mk-quick-contact-wrapper').removeClass('off').addClass('on');
            }
            else {
                $('.mk-go-top, .mk-quick-contact-wrapper').removeClass('on').addClass('off');
            }
        });

        $('.mk-go-top, .mk-back-top-link, .single-back-top a, .divider-go-top, .comments-back-top').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 800);
            return false;
        });

        $('.mk-classic-comments').click(function () {
            $("html, body").animate({
                scrollTop: $('#comments').offset().top
            }, 800);

        });



        /* Portfolio Grid & List view */
        /* -------------------------------------------------------------------- */

        if ($.exists('.mk-portfolio-orientation')) {
            $('.mk-portfolio-orientation a').on('click', function () {

                $(this).siblings().removeClass('current').end().addClass('current');
                var data_view_id = '#' + $(this).parent().attr('data-view');
                if ($(this).hasClass('mk-grid-view')) {

                    $(data_view_id).removeClass('mk-portfolio-list').addClass('mk-portfolio-grid');

                }
                else {
                    $(data_view_id).removeClass('mk-portfolio-grid').addClass('mk-portfolio-list');
                }
                $('.mk-theme-loop').isotope('reLayout');
                return false;
            });
        }




        /* Accordions & Toggles */
        /* -------------------------------------------------------------------- */

        /* Accordions */

        if ($.exists('.mk-accordion')) {

            $.tools.toolsTabs.addEffect("slide", function (i, done) {
                this.getPanes().slideUp(250);
                this.getPanes().eq(i).slideDown(250, function () {
                    done.call();
                });
            });

            $(".mk-accordion").each(function () {

                if ($(this).hasClass('accordion-action')) {


                    var $initialIndex = $(this).attr('data-initialIndex');
                    if ($initialIndex == undefined || $initialIndex == 0) {
                        $initialIndex = 0;
                    }
                    $(this).toolsTabs("div.mk-accordion-pane", {
                        toolsTabs: '.mk-accordion-tab',
                        effect: 'slide',
                        initialIndex: $initialIndex,
                        slideInSpeed: 400,
                        slideOutSpeed: 400
                    });
                }
                else {
                    $(".toggle-action .mk-accordion-tab").toggle(

                    function () {
                        $(this).addClass('current');
                        $(this).siblings('.mk-accordion-pane').slideDown(150);
                    }, function () {
                        $(this).removeClass('current');
                        $(this).siblings('.mk-accordion-pane').slideUp(150);
                    });
                }
            });

        }





        /* Toggles */

        if ($.exists('.mk-toggle-title')) {
            $(".mk-toggle-title").toggle(

            function () {
                $(this).addClass('active-toggle');
                $(this).siblings('.mk-toggle-pane').slideDown(200);
            }, function () {
                $(this).removeClass('active-toggle');
                $(this).siblings('.mk-toggle-pane').slideUp(200);
            });
        }



        /* Message Boxes */
        /* -------------------------------------------------------------------- */

        $('.box-close-btn').on('click', function () {
            $(this).parent().fadeOut(300);
            return false;

        });



        $('.mk-tooltip').each(function () {
            $(this).find('.tooltip-init').hover(function () {
                $(this).siblings('.tooltip-text').animate({
                    'opacity': 1
                }, 400);

            }, function () {
                $(this).siblings('.tooltip-text').animate({
                    'opacity': 0
                }, 400);
            });

        });



    



        /* Newspaper Comments & Share section */
        /* -------------------------------------------------------------------- */

        function mk_newspaper_comments_share() {

            $('.mk-newspaper-comments-share').each(function () {

                $(this).find('.mk-comment-count').click(function () {

                    $(this).parent().find('.newspaper-share-buttons').slideUp(300).end().find('.mk-newspaper-comments-list').slideDown(300);
                    setTimeout(function () {
                        $('.mk-theme-loop').isotope('reLayout');
                    }, 500);
                });

                $(this).find('.mk-share-count').click(function () {

                    $(this).parent().find('.mk-newspaper-comments-list').slideUp(300).end().find('.newspaper-share-buttons').slideDown(300);
                    mk_share_btn();
                    setTimeout(function () {
                        $('.mk-theme-loop').isotope('reLayout');
                    }, 500);

                });

            });

        }
        mk_newspaper_comments_share();



        /* Responsive Fixes */
        /* -------------------------------------------------------------------- */


        function mk_responsive_fix() {

            if ($(window).width() > mk_responsive_nav_width) {
                $('body').removeClass('mk-responsive').addClass('mk-desktop');
                $('#mk-responsive-nav').hide();
                mk_main_navigation_init();
                mk_main_navigation();
            }

            if ($(window).width() < mk_responsive_nav_width) {
              if (!$.exists('#mk-responsive-nav')) {
                    $('.main-navigation-ul').clone().attr({id:"mk-responsive-nav", "class":""}).insertAfter('.mk-header-inner');
                }
                $('#mk-responsive-nav li, #mk-responsive-nav li a, #mk-responsive-nav ul, #mk-responsive-nav div').attr('style', '');
                $('body').removeClass('mk-desktop').addClass('mk-responsive');
                $('mk-header-padding-wrapper').css('padding', 0);
            }

        }

        $(window).load(function () {
            mk_responsive_fix();

            $('.modern-style-nav .header-logo, .modern-style-nav .header-logo a').css('width', $('.header-logo img').width());
        });

        $(window).on("debouncedresize", function () {
            mk_responsive_fix();
        });








        /* Initialize isiotop for newspaper style */
        /* -------------------------------------------------------------------- */

        function loops_iosotop_init() {
            if ($('.mk-theme-loop').hasClass('isotop-enabled')) {
                var $mk_container, $mk_container_item;
                $mk_container = $('.mk-theme-loop');
                $mk_container_item = '.mk-isotop-item';

                $mk_container.isotope({
                    itemSelector: $mk_container_item,
                    animationEngine: "best-available",
                    masonry: {
                        columnWidth: 1
                    }

                });




                $('#mk-filter-portfolio ul li a').click(function () {
                    var $this;
                    $this = $(this);
                    if ($this.hasClass('.current')) {
                        return false;
                    }
                    var $optionSet = $this.parents('#mk-filter-portfolio ul');
                    $optionSet.find('.current').removeClass('current');
                    $this.addClass('current');

                    var selector = $(this).attr('data-filter');

                    $mk_container.isotope({
                        filter: selector
                    });


                    return false;
                });

                $('.mk-loadmore-button').css('display', 'block');
                if ($('.mk-theme-loop').hasClass('scroll-load-style') || $('.mk-theme-loop').hasClass('load-button-style')) {
                    if (!$.exists('.mk-pagination')) {
                        $('.mk-loadmore-button').hide();
                    }
                    $('.mk-pagination').hide();
                    $mk_container.infinitescroll({
                        navSelector: '.mk-pagination',
                        nextSelector: '.mk-pagination a:first',
                        itemSelector: $mk_container_item,
                        debug: false,
                        animate: false,
                        bufferPx: 70,
                        loading: {
                            finishedMsg: "No more pages to load.",
                            img: mk_images_dir + "/load-more-loading.gif",
                            msg: null,
                            msgText: "",
                            selector: '.mk-loadmore-button',
                            speed: 100,
                            start: undefined
                        },
                        errorCallback: function () {

                            $('.mk-loadmore-button').html('No More Posts');

                        },

                    },

                    function (newElements) {

                        if ($.exists('.mk-blog-container')) {
                            FB.XFBML.parse();
                            twttr.widgets.load();
                            $(".mk-googleplus").each(function () {
                                gapi.plusone.render($(this).get(0), {
                                    "size": "tall"
                                });
                            });
                        }
                        $(".classic-googleplus").each(function () {
                            gapi.plusone.render($(this).get(0), {
                                "size": "medium"
                            });
                        });

                        var $newElems = $(newElements);

                        $newElems.imagesLoaded(function () {
                            $mk_container.isotope('appended', $newElems);
                            $mk_container.isotope('reLayout');
                            loop_audio_init();
                            isotop_load_fix();
                            mk_newspaper_comments_share();
                            mk_social_share();
                            mk_prettyPhoto_init();


                        });
                    }

                    );



                    /* Loading elements based on scroll window */
                    if ($('.mk-theme-loop.isotop-enabled').hasClass('load-button-style')) {
                        $(window).unbind('.infscr');
                        $('.mk-loadmore-button').click(function () {

                            $mk_container.infinitescroll('retrieve');

                            return false;

                        });
                    }


                }
                else {
                    $('.mk-loadmore-button').hide();
                }

            }
        }


        $('.filter-faq li a').click(function () {

            $(this).parent().siblings().children().removeClass('current');
            $(this).addClass('current');

            var filterVal = $(this).attr('data-filter');

            if (filterVal === '') {
                $('.mk-faq-container .mk-faq-toggle').slideDown(200).removeClass('hidden');
            }
            else {
                $('.mk-faq-container .mk-faq-toggle').each(function () {
                    if (!$(this).hasClass(filterVal)) {
                        $(this).slideUp(200).addClass('hidden');
                    }
                    else {
                        $(this).slideDown(200).removeClass('hidden');
                    }
                });
            }
            return false;
        });







        /* reload elements on reload */
        /* -------------------------------------------------------------------- */

        if ($.exists('.mk-blog-container.isotop-enabled') || $.exists('.mk-portfolio-container') || $.exists('.mk-news-container')) {
            $(window).load(function () {
                $(window).unbind('keydown');
                loops_iosotop_init();
                isotop_load_fix();
                mk_share_btn();
            });


            $(window).on("debouncedresize", function () {
                $('.mk-theme-loop').isotope('reLayout');
            });

        }






        /* Fix isotop layout */
        /* -------------------------------------------------------------------- */

        function isotop_load_fix() {
            if ($.exists('.mk-blog-container.isotop-enabled') || $.exists('.mk-portfolio-container') || $.exists('.mk-news-container')) {
                $('.mk-blog-container.isotop-enabled>article, .mk-portfolio-container>article, .mk-news-container>article').each(function (i) {
                    $(this).delay(i * 100).animate({
                        'opacity': 1
                    }, 100);

                }).promise().done(function () {
                    setTimeout(function () {
                        $('.mk-theme-loop').isotope('reLayout');
                    }, 1000);
                });
            }

        }


        function mk_share_btn() {
            if (!$('body').hasClass('share-api-scripts-loaded')) {
                $.getScript("http://platform.twitter.com/widgets.js");
                $.getScript("https://apis.google.com/js/plusone.js");
                $.getScript("//connect.facebook.net/en_US/all.js#xfbml=1", function () {
                    FB.init({
                        status: true,
                        cookie: true,
                        xfbml: true
                    });
                });
            }
            $('body').addClass('share-api-scripts-loaded');
        }



        /* Load Social Share */
        /* -------------------------------------------------------------------- */

        function mk_social_share() {

            $('.mk-blog-share-container').click(function () {

                $(this).find('.mk-blog-share-buttons, .single-share-buttons').stop(true, true).fadeIn();
                mk_share_btn();
                setTimeout(function () {
                    $('.mk-theme-loop').isotope('reLayout');
                }, 1000);
                return false;
            });

            $('.mk-news-share a').click(function () {
                $('.news-share-buttons').stop(true, true).fadeIn();
                mk_share_btn();
                $('body').addClass('share-api-scripts-loaded');
                return false;
            });

        }
        mk_social_share();



        /* Jplayer */
        /* -------------------------------------------------------------------- */

        loop_audio_init();




        /* Recent Works Widget */
        /* -------------------------------------------------------------------- */

        $('.widget_recent_portfolio li').each(function () {

            $(this).find('.portfolio-widget-thumb').hover(function () {

                $(this).siblings('.portfolio-widget-info').animate({
                    'opacity': 1
                }, 200);
            }, function () {

                $(this).siblings('.portfolio-widget-info').animate({
                    'opacity': 0
                }, 200);
            });


        });








        /* Contact Form */
        /* -------------------------------------------------------------------- */


        if ($.tools.validator != undefined) {

            $.tools.validator.addEffect("contact_form", function (errors) {
                $.each(errors, function (index, error) {
                    var input = error.input;

                    input.addClass('mk-invalid');
                });
            }, function (inputs) {
                inputs.removeClass('mk-invalid');
            });


            $('.mk-contact-form').validator({
                effect: 'contact_form'
            }).submit(function (e) {
                var form = $(this);
                if (!e.isDefaultPrevented()) {
                    $(this).find('.mk-contact-loading').fadeIn('slow');
                    $.post(this.action, {
                        'to': $('input[name="contact_to"]').val().replace("*", "@"),
                        'name': $('input[name="contact_name"]').val(),
                        'email': $('input[name="contact_email"]').val(),
                        'content': $('textarea[name="contact_content"]').val()
                    }, function () {
                        form.fadeIn('fast', function () {
                            $(this).find('.mk-contact-loading').fadeOut('slow');
                            $(this).find('.mk-contact-success').delay(2000).fadeIn('slow').delay(8000).fadeOut();
                            $(this).find('input, textarea').val("");
                        });
                    });
                    e.preventDefault();
                }
            });





        }





        /* Blog Loop Carousel Shortcode */
        /* -------------------------------------------------------------------- */



        function mk_blog_carousel() {
            if (!$.exists('.mk-blog-showcase')) { return; }
            $('.mk-blog-showcase ul li').each(function () {

                $(this).on('hover', function () {

                    $(this).siblings('li').removeClass('mk-blog-first-el').end().addClass('mk-blog-first-el');

                });

            });


        }
        mk_blog_carousel();









        /* Main Navigation */
        /* -------------------------------------------------------------------- */

        function mk_main_navigation_init() {

            $(".main-navigation-ul").dcMegaMenu({
                rowItems: '6',
                speed: 300,
                effect: 'fade',
                fullWidth: true
            });
            
        }


        function mk_main_navigation() {
            var nav_height = $('#mk-main-navigation').height();
            $('.main-navigation-ul div.sub-container').css('top', nav_height);
            if($('.mk-header-inner').hasClass('mk-fixed')) {
                $('#mk-nav-search-wrapper').css('top', nav_height);
            } else {
                $('#mk-nav-search-wrapper').css('top', nav_height-15);
            }
            

        }


        function mk_responsive_nav() {

            $('.mk-nav-responsive-link').click(function () {
                if ($('body').hasClass('mk-opened-nav')) {
                    $('body').removeClass('mk-opened-nav').addClass('mk-closed-nav');
                    $('#mk-responsive-nav').slideUp(800);
                }
                else {
                    $('body').removeClass('mk-closed-nav').addClass('mk-opened-nav');
                    $('#mk-responsive-nav').slideDown(1000);
                }
            });


        }
        mk_responsive_nav();



        /* Header Fixed */

        /* -------------------------------------------------------------------- */
        var mk_header_height = $('.mk-header-inner').height();


        var wp_admin_height = 0;
        var mk_limit_height;
        if ($.exists("#wpadminbar")) {
            wp_admin_height = $("#wpadminbar").height();
        }
        var mk_window_y = 0;
        mk_window_y = $(window).scrollTop();

        if ($('#mk-header').hasClass('classic-style-nav')) {
            mk_limit_height = wp_admin_height + (mk_header_height * 2);
        }
        else {
            mk_limit_height = wp_admin_height;
        }



        function mk_fix_classic_header() {
            mk_window_y = $(window).scrollTop();
            if (mk_window_y > mk_limit_height) {
                if (!($(".mk-header-nav-container").hasClass("mk-fixed"))) {
                    //$(".mk-header-toolbar").hide();
                    $(".mk-header-padding-wrapper").css("padding-top", mk_header_height);
                    $(".mk-header-nav-container").addClass("mk-fixed").css("top", wp_admin_height);
                }

            }
            else {
                if (($(".mk-header-nav-container").hasClass("mk-fixed"))) {
                    //$(".mk-header-toolbar").show();
                    $(".mk-header-nav-container").css({
                        "top": 0
                    }).removeClass("mk-fixed");
                    $(".mk-header-padding-wrapper").css("padding-top", "");
                }
            }
        }


        function mk_fix_modern_header() {
            var mk_window_y = $(window).scrollTop(),
            header_els = $('#mk-header.modern-style-nav .mk-header-inner .main-navigation-ul > li > a, .mk-header-inner #mk-header-search, #mk-header.modern-style-nav .mk-header-inner .mk-header-start-tour, .mk-header-inner,#mk-header.modern-style-nav .mk-search-trigger'),
            header_height = parseInt($('#mk-header').attr('data-height')),
            header_height_sticky = parseInt($('#mk-header').attr('data-sticky-height')),
            new_height = 0;
            if (mk_window_y > mk_limit_height) {
                if (!($(".mk-header-inner").hasClass("mk-fixed"))) {
                    $(".mk-header-toolbar").hide();
                    $(".mk-header-padding-wrapper").css("padding-top", header_height + 'px');
                    $(".mk-header-inner").addClass("mk-fixed").css({
                        "top": wp_admin_height
                    });
                }
               
                
            }
            else {
                if (($(".mk-header-inner").hasClass("mk-fixed"))) {
                    $(".mk-header-toolbar").show();
                    $(".mk-header-inner").css({
                        "top": 0
                    }).removeClass("mk-fixed");
                    $(".mk-header-padding-wrapper").css("padding-top", "");
                }
                
                
            }
    
            if($(window).width() > mk_responsive_nav_width){
            if(mk_window_y < (header_height - header_height_sticky)) {
                new_height = header_height - mk_window_y;

            } else {
                new_height = header_height_sticky;
            }
              header_els.css({height: new_height + 'px', lineHeight: new_height + 'px'});
            }
        }


        if (mk_window_y > mk_limit_height && !(is_touch_device() || $(window).width() < mk_responsive_nav_width || mk_header_sticky === false)) {
            if ($('#mk-header').hasClass('classic-style-nav')) {
                mk_fix_classic_header();
            }
            else {
                mk_fix_modern_header();
            }

        }



        $(window).scroll(function () {
            if (is_touch_device() || mk_header_sticky === false || $(window).width() < mk_responsive_nav_width) { return; }

            if ($('#mk-header').hasClass('classic-style-nav')) {
                mk_fix_classic_header();
            }
            else {
                mk_fix_modern_header();
            }
            mk_main_navigation();
            setTimeout(function () {
                mk_main_navigation();
            }, 1000);

        });






        /* Header Search Form */
        /* -------------------------------------------------------------------- */

        function mk_header_searchform() {

            $('.mk-header-toolbar #mk-header-searchform .text-input').on('focus', function () {

                if ($('.mk-header-toolbar #mk-header-searchform .text-input').hasClass('on-close-state')) {
                    $('.mk-header-toolbar #mk-header-searchform .text-input').removeClass('on-close-state').animate({
                        'width': '200px'
                    }, 200);
                    return false;
                }
            });

            $(".mk-header-toolbar .mk-header-searchform").click(function (event) {
                if (event.stopPropagation) {
                    event.stopPropagation();
                }
                else if (window.event) {
                    window.event.cancelBubble = true;
                }
            });

            $('.widget .mk-searchform .text-input').focus(function () {
                $(this).parent().find('.mk-icon-remove-sign').css('opacity', 0.5);
            });
            $('.widget .mk-searchform .text-input').blur(function () {
                $(this).parent().find('.mk-icon-remove-sign').css('opacity', 0);
            });

            $("html").click(function () {
                $(this).find(".mk-header-toolbar #mk-header-searchform .text-input").addClass('on-close-state').animate({
                    'width': 90
                }, 300);
            });

            $('.mk-searchform .mk-icon-remove-sign, .mk-notfound-search .mk-icon-remove-sign').on('click', function () {
                $(this).siblings('#mk-header-searchform .text-input, .mk-searchform .text-input, .mk-notfound-search .notfound-text-input').val(' ').focus();
            });
        }
        mk_header_searchform();




        /* Login Form */
        /* -------------------------------------------------------------------- */



        $(".mk-header-login, .mk-header-signup, .mk-quick-contact-wrapper, .mk-blog-share-container, .news-share-buttons, .main-nav-side-search").click(function (event) {
            if (event.stopPropagation) {
                event.stopPropagation();
            }
            else if (window.event) {
                window.event.cancelBubble = true;
            }
        });
        $("html").click(function () {
            $(this).find(".mk-login-register, #mk-header-subscribe, #mk-quick-contact, .single-share-buttons, .mk-blog-share-buttons, .news-share-buttons, #mk-nav-search-wrapper").fadeOut(100);
            $('.mk-quick-contact-link').removeClass('quick-contact-active');
            $('.mk-toggle-trigger').removeClass('mk-toggle-active');
        });

        $('.mk-forget-password').on('click', function () {
            $('#mk-forget-panel').siblings().hide().end().show();
        });

        $('.mk-create-account').on('click', function () {
            $('#mk-register-panel').siblings().hide().end().show();
        });

        $('.mk-return-login').on('click', function () {
            $('#mk-login-panel').siblings().hide().end().show();
        });


        $('.mk-quick-contact-link').on('click', function () {
            if(!$(this).hasClass('quick-contact-active')) {
                $('#mk-quick-contact').fadeIn(150);
                $(this).addClass('quick-contact-active');
            } else {
                 $('#mk-quick-contact').fadeOut(100);
                 $(this).removeClass('quick-contact-active');
            }
            return false;
        });


        $('.mk-toggle-trigger').on('click', function () {
            if(!$(this).hasClass('mk-toggle-active')) {
                $('.mk-box-to-trigger').fadeOut(100);
                $(this).parent().find('.mk-box-to-trigger').fadeIn(150);
                $(this).addClass('mk-toggle-active');
            } else {
                 $('.mk-box-to-trigger').fadeOut(100);
                 $(this).removeClass('mk-toggle-active');
            }
            return false;
        });





        /* Milestone Number Shortcode */
        /* -------------------------------------------------------------------- */

        if ($.exists('.mk-milestone')) {
           
           $('.mk-milestone').each(function(){

            var el_this = $(this),
                stop_number = el_this.find('.milestone-number').attr('data-stop'),
                animation_speed = parseInt(el_this.find('.milestone-number').attr('data-speed'));

                $({countNum: el_this.find('.milestone-number').text()}).animate({countNum: stop_number}, {
                      duration: animation_speed,
                      easing:'linear',
                      step: function() {
                        el_this.find('.milestone-number').text(Math.floor(this.countNum));
                      },
                      complete: function() {
                        el_this.find('.milestone-number').text(this.countNum);
                      }
                    });

           });
        }


    /* Skill Meter and Charts */
    /* -------------------------------------------------------------------- */

    function mk_skill_meter() {
        if ($.exists('.mk-skill-meter')) {
            $(".mk-skill-meter .progress-outer:in-viewport").each(function () {
                var $this = $(this);
                if (!$this.hasClass('scroll-animated')) {
                    $this.addClass('scroll-animated');
                    $this.animate({
                        width: $(this).attr("data-width") + '%'
                    }, 2000);
                }

            });
        }
    }



    function mk_charts() {
        if ($.exists('.mk-chart')) {
            $(window).on("load", function () {
                $('.mk-chart').each(function () {
                    var $this, $parent_width, $chart_size;
                    $this = $(this);
                    $parent_width = $(this).parent().width();
                    $chart_size = $this.attr('data-barSize');
                    if ($parent_width < $chart_size) {
                        $chart_size = $parent_width;
                        $this.css('line-height', $chart_size);
                        $this.find('i').css({
                            'line-height': $chart_size + 'px',
                            'font-size': ($chart_size / 3)
                        });
                    }
                    if (!$this.hasClass('chart-animated')) {
                        $this.easyPieChart({
                            animate: 1300,
                            lineCap: 'round',
                            lineWidth: $this.attr('data-lineWidth'),
                            size: $chart_size,
                            barColor: $this.attr('data-barColor'),
                            trackColor: $this.attr('data-trackColor'),
                            scaleColor: 'transparent',
                            onStep: function (value) {
                                this.$el.find('.chart-percent span').text(Math.ceil(value));
                            }
                        });
                    }
                });
            });
        }
    }


    $(document).ready(function () {
        mk_skill_meter();
        mk_charts();

    });


    $(window).scroll(function () {
        mk_skill_meter();
        mk_charts();
    });





    function mk_nice_scroll(){
        $("html").niceScroll({
            scrollspeed: 50,
            mousescrollstep: 40,
            cursorwidth: 8,
            cursorborder: 0,
            cursorcolor: '#797979',
            cursorborderradius: 6,
            autohidemode: true,
            horizrailenabled: false,
            zindex : 9999
        });
        
    }
    if($(window).width() > 690 && $('body').outerHeight(true) > $(window).height() && mk_smooth_scroll == true) {
        mk_nice_scroll()    
    }







    /* Smooth scroll using hash */
    /* -------------------------------------------------------------------- */
        $(document).ready(function() {
          function filterPath(string) {
          return string
            .replace(/^\//,'')
            .replace(/(index|default).[a-zA-Z]{3,4}$/,'')
            .replace(/\/$/,'');
          }
          var locationPath = filterPath(location.pathname);
          var scrollElem = scrollableElement('html', 'body');
         
          $('.mk-smooth[href*=#]').each(function() {
            var thisPath = filterPath(this.pathname) || locationPath;
            if (  locationPath == thisPath
            && (location.hostname == this.hostname || !this.hostname)
            && this.hash.replace(/#/,'') ) {
              var $target = $(this.hash), target = this.hash;
              if (target) {
                var targetOffset = $target.offset().top - 100;
                $(this).click(function(event) {
                  event.preventDefault();
                  $(scrollElem).animate({scrollTop: targetOffset}, 1400, function() {
                    location.hash = target;
                  });
                });
              }
            }
          });
         
          // use the first element that is "scrollable"
          function scrollableElement(els) {
            for (var i = 0, argLength = arguments.length; i <argLength; i++) {
              var el = arguments[i],
                  $scrollElement = $(el);
              if ($scrollElement.scrollTop()> 0) {
                return el;
              } else {
                $scrollElement.scrollTop(1);
                var isScrollable = $scrollElement.scrollTop()> 0;
                $scrollElement.scrollTop(0);
                if (isScrollable) {
                  return el;
                }
              }
            }
            return [];
          }
         
        });

    $("#mk-main-navigation a").bind('click',function(event){
        if ($.exists("#wpadminbar")) {
            var wp_admin_height = $("#wpadminbar").height();
        } else {
            wp_admin_height = 0;
        }
        $("#mk-main-navigation li").removeClass('current-menu-item');
        $(this).parent('li').addClass('current-menu-item');
        
        var header_height = $('.mk-header-inner').height();     
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - (header_height + wp_admin_height) + "px"
        }, {
            duration: 1200,
            easing: "easeInOutExpo"
        });

        return false;
        event.preventDefault();
    });



});
})(jQuery);