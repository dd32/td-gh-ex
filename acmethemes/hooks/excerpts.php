<?php
/**
 * Excerpt length 90 return
 *
 * @since AcmePhoto 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('acmephoto_alter_excerpt') ) :
    function acmephoto_alter_excerpt(){
        return 90;
    }
endif;

add_filter('excerpt_length', 'acmephoto_alter_excerpt');

/**
 * Add blank for more view
 *
 * @since acmephoto 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('acmephoto_excerpt_more') ) :
    function acmephoto_excerpt_more($more) {
        return ' ';
    }
endif;

add_filter('excerpt_more', 'acmephoto_excerpt_more');