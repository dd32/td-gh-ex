<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Animate Lite
 */

get_header(); ?>

<div class="container">
    <div class="pet_content_scroller">
        <div class="pet_contentbx_area">
            <header class="page-header">
                <h1 class="entry-title"><?php esc_html_e( '404 Not Found', 'animate-lite' ); ?></h1>                
            </header><!-- .page-header -->
            <div class="page-content">
                <p><?php esc_html_e( 'Looks like you have taken a wrong turn.....<br />Don\'t worry... it happens to the best of us.', 'animate-lite' ); ?></p>  
            </div><!-- .page-content -->
        </div><!-- pet_contentbx_area-->   
        <?php get_sidebar();?>       
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>