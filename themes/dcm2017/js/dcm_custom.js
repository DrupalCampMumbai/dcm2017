/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal) {

    'use strict';

    // To understand behaviors, see https://drupal.org/node/756722#behaviors
    Drupal.behaviors.custom_behavior = {
        attach: function (context, settings) {

            $(document).ready(function($){
                /*Navigation menu on hover*/
                $(".dropdown").hover(
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                        $(this).toggleClass('open');
                        $('span', this).toggleClass("caret caret-up");
                    },
                    function() {
                        $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                        $(this).toggleClass('open');
                        $('span', this).toggleClass("caret caret-up");
                    });
                /*End Navigation menu on hover*/

                /*Propose session get heighest session height and apply to all session block*/
                var highest = null;
                var hi = 0;
                $(".view-sessions .owl-item ul li").each(function(){
                    var h = $(this).height();
                    if(h > hi){
                        hi = h;
                    }
                });
                $(".view-sessions .owl-item ul li").height(hi);
                /*End Propose session get heighest session height and apply to all session block*/

                /*Propose session get heighest session height and apply to all session block*/
                var highest1 = null;
                var hi1 = 0;
                $(".view-sponsors .views-field-body").each(function(){
                    var h1 = $(this).outerHeight(true);
                    if(h1 > hi1){
                        hi1 = h1;
                    }
                });
                $(".view-sponsors .views-field-field-sponsor-logo").height(hi1);
                /*End Propose session get heighest session height and apply to all session block*/

                /*Sponcers page odd/even class*/
                $('.path-sponsors .view-sponsors .view-content .views-row:odd').addClass('odd');
                $('.path-sponsors .view-sponsors .view-content .views-row:even').addClass('even');
                /*End Sponcers page odd/even class*/

                /*For screen size*/
                if ($(window).width() < 960) {
                    /*Responsive menu*/
                    $('#navbar .navbar-toggle').on('click', function (e) {
                        $('body').addClass('sliderO');
                        $('header#navbar').append('<div class="menuSlideOverlay"></div>');
                        $('.welcomeUserMenu').append('<div class="menuSlideClose">X</div>');
                        if ($('.menuSlideOverlay').length > 0) {
                            $('.menuSlideOverlay').on('click', function (e) {
                                $('header#navbar .navbar-toggle').trigger('click');
                                $('body').removeClass('sliderO');
                                $('.menuSlideOverlay, .menuSlideClose').remove();
                            });
                        }
                    });
                    $('body').on('click', '.menuSlideClose', function() {
                        $('header#navbar .navbar-toggle').trigger('click');
                        $('body').removeClass('sliderO');
                        $('.menuSlideOverlay, .menuSlideClose').remove();
                    });
                    $('#navbar .navbar-toggle').one('click', function (e) {
                        if ($('#welcomeUserMenu').length < 1) {
                            var userNametxt = drupalSettings.dcm_extend.site_menu.user_name;
                            console.log(userNametxt);
                            $('header#navbar #dcm-sticky-menu .menu.nav').prepend('<h2 id="welcomeUserMenu" class="welcomeUserMenu"><span>Hello</span> <span class="uName">' + userNametxt + '</span></h2>');
                        }
                    });
                    //$('.user-logged-in .uName').text(userNametxt);
                    /*End Responsive menu*/
                } else {
                    $('.welcomeUserMenu').remove();
                }
                /*End For screen size*/
            });
        }
    };

    // We pass the parameters of this anonymous function are the global variables
    // that this script depend on. For example, if the above script requires
    // jQuery, you should change (Drupal) to (Drupal, jQuery) in the line below
    // and, in this file's first line of JS, change function (Drupal) to
    // (Drupal, $)
})(jQuery, Drupal);
