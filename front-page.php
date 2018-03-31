<?php

/**
 * Template Name: Home Page
 *
 * @package bakery_shop
 */

get_header();

/**
 * Home Page Contents
 * 
 * @see bakery_shop_featured    - 20
 * @see bakery_shop_welcome     - 30
 * @see bakery_shop_blog        - 40 
 * @see bakery_shop_cta        - 60
 * @see bakery_shop_portfolio   - 70
 * @see bakery_shop_team       - 80
 * @see bakery_shop_testimonial - 90
*/
do_action( 'bakery_shop_home_page' );

get_footer();