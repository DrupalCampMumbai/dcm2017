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
    Drupal.behaviors.dcm_custom = {
        attach: function (context, settings) {

            // Sessions title JS.
            console.log('hi');
            $('.view-display-id-sessions_listing .view-content h3').each(function( index ) {
               // console.log($(this));
            $(this).addClass('dcm-special-title');
            var session_title_text = $(this).text();
            var session_title_trimmed = session_title_text.trim();
            //console.log(session_title_trimmed);
            var split_session_title = session_title_trimmed.split(' ');
            //console.log(split_session_title);

            for (var i = 0; i <= split_session_title.length; i++) {
                if (i != 0 && split_session_title[i - 1] != "" && (split_session_title[i + 1] == "" || i == (split_session_title.length - 1))) {
                    //$(this).html('<span>'+split_session_title[i]+'</span>');
                    var text = $(this).text();
                    var split_session_text = text.split(' ');
                    console
                    for (var i = 0; i <= split_session_text.length; i++) {
                        if (i != 0 && split_session_text[i - 1] != "" && (split_session_text[i + 1] == "" || i == (split_session_text.length - 1))) {

                            var split_session_trim = text.replace(split_session_text[i], '');
                            console.log(split_session_text[i]);
                            console.log(split_session_trim);

                        }
                    }
                }
            }
            });

            // Array.prototype.clean = function(deleteValue) {
            //     for (var i = 0; i < this.length; i++) {
            //         if (this[i] == deleteValue) {
            //             this.splice(i, 1);
            //             i--;
            //         }
            //     }
            //     return this;
            // };
            //
            // var split_session_title_array = split_session_title.clean("");
            // console.log(split_session_title_array);
        }
    };

    // We pass the parameters of this anonymous function are the global variables
    // that this script depend on. For example, if the above script requires
    // jQuery, you should change (Drupal) to (Drupal, jQuery) in the line below
    // and, in this file's first line of JS, change function (Drupal) to
    // (Drupal, $)
})(jQuery, Drupal);
