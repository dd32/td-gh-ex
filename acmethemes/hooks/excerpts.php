<?php
/**
 * Excerpt length 90 return
 *
 * @since acmeblog 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('acmeblog_alter_excerpt') ) :
    function acmeblog_alter_excerpt(){
        return 90;
    }
endif;

add_filter('excerpt_length', 'acmeblog_alter_excerpt');

/**
 * Add ... for more view
 *
 * @since acmeblog 1.1.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('acmeblog_excerpt_more') ) :
    function acmeblog_excerpt_more($more) {
        return '...';
    }
endif;
add_filter('excerpt_more', 'acmeblog_excerpt_more');