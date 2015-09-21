/**
 * Customizer Preview Code
 */

(function($){

    wp.customize('actuate_theme_lite[color_site_title]', function (value) {
        value.bind(function (newval) {
            $('#wrapper .site-title a').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_site_desc]', function (value) {
        value.bind(function (newval) {
            $('#wrapper .site-description').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_blog_p_title]', function (value) {
        value.bind(function (newval) {
            $('#wrapper .loop-post-title h1 a').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_blog_p_meta]', function (value) {
        value.bind(function (newval) {
            $('#wrapper .loop-post-meta, #wrapper .loop-post-meta .loop-meta-comments a').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_blog_p_content]', function (value) {
        value.bind(function (newval) {
            $('#wrapper .loop-post-excerpt p').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_posts_title]', function (value) {
        value.bind(function (newval) {
            $('body.single #wrapper .post-title h1').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_posts_meta]', function (value) {
        value.bind(function (newval) {
            $('body.single #wrapper .post-meta').css('color', newval);
        })
    });
    wp.customize('actuate_theme_lite[color_posts_content]', function (value) {
        value.bind(function (newval) {
            $('body.single #wrapper .post-content').css('color', newval);
        })
    });
})(jQuery);