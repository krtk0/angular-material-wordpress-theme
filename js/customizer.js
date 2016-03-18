/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
    // Site title and description.
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-description').text(to);
        });
    });
    // Title font color.
    wp.customize('title_font_color', function (value) {
        value.bind(function (to) {
            $('.site-title a').css({
                'color': to
            });
        });
    });
    // Header font color.
    wp.customize('header_font_color', function (value) {
        value.bind(function (to) {
            $('.site-description').css({
                'color': to
            });
        });
    });
})(jQuery);
