<?php
/**
 * Excerpt length and more text
 */
if ( !function_exists('acmeblog_alter_excerpt') ) :
    function acmeblog_alter_excerpt(){
        return 90;
    }
endif;

add_filter('excerpt_length', 'acmeblog_alter_excerpt');

if ( !function_exists('acmeblog_excerpt_more') ) :
    function acmeblog_excerpt_more($more) {
        return '...';
    }
endif;
add_filter('excerpt_more', 'acmeblog_excerpt_more');