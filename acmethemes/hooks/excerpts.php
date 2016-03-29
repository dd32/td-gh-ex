<?php
/**
 * Excerpt length 90 return
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( !function_exists('acmephoto_alter_excerpt') ) :
    function acmephoto_alter_excerpt(){
        return 70;
    }
endif;

add_filter('excerpt_length', 'acmephoto_alter_excerpt');

/**
 * Add ... for more view
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('acmephoto_excerpt_more') ) :
    function acmephoto_excerpt_more($more) {
        return '...';
    }
endif;
add_filter('excerpt_more', 'acmephoto_excerpt_more');