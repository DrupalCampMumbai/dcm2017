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
            // Execute for each title only once.
            $('.view-display-id-sessions_listing .view-content h3').once().each(function( index ) {

                // Add custom class to h3 element.
                $(this).addClass('dcm-special-title');

                // Fetch title text.
                var session_title_text = $(this).text();

                // Trim whitespaces.
                var session_title_trimmed = session_title_text.trim();

                // Split trimmed text with whitespaces.
                var split_session_title = session_title_trimmed.split(' ');

                // For each element in split_session_title array.
                for (var i = 0; i <= split_session_title.length; i++) {

                    // Fetch h3 element's html.
                    var h3_html = $(this).html();

                    // Check previous and next element, if previous element has text and next element is empty, then
                    // fetch that element.
                    if (i != 0 && split_session_title[i - 1] != "" && (split_session_title[i + 1] == "" || i == (split_session_title.length - 1))) {

                        // Fetch h3 element's text.
                        var text = $(this).text();

                        // Split text based on whitespaces.
                        var split_session_text = text.split(' ');

                        // Remove text from html.
                        $(this).html(h3_html.replace(session_title_trimmed, ' '));

                        // Fetch new html.
                        var replacement_html = $(this).html();

                        for (var i = 0; i <= split_session_text.length; i++) {
                            if (i != 0 && split_session_text[i - 1] != "" && (split_session_text[i + 1] == "" || i == (split_session_text.length - 1))) {

                                var split_session_trim = text.replace(split_session_text[i], '');

                                // Remove multiple text.
                                var new_replacement_html = replacement_html.replace(session_title_trimmed, ' ');

                                // Add span tag for last element.
                                $(this).html(new_replacement_html + split_session_trim + '<span class="session-title-span">' + split_session_text[i] + '</span>');

                                // Add alt tag for image.
                                $(this).find('img').attr('alt', session_title_trimmed);

                            }
                        }
                    }
                }
            });
        }
    };

    // We pass the parameters of this anonymous function are the global variables
    // that this script depend on. For example, if the above script requires
    // jQuery, you should change (Drupal) to (Drupal, jQuery) in the line below
    // and, in this file's first line of JS, change function (Drupal) to
    // (Drupal, $)
})(jQuery, Drupal);
