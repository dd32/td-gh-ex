<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div id="single-post" class="page-404">
                <div <?php post_class( 'post' ); ?>>

                    <div class="clear"></div>
					<?php do_action( ATTIRE_THEME_PREFIX . 'before_contents' ); ?>
                    <h1 class="entry-title">
						<?php echo apply_filters( ATTIRE_THEME_PREFIX . 'page_not_found_title', __( '404, Page not found!', 'attire' ) ); ?></h1>
                    <div class="entry-content">
						<?php echo apply_filters( ATTIRE_THEME_PREFIX . 'page_not_found_message', __( 'Nothing found here! Please use navigation above or search to find what you are looking for.', 'attire' ) ); ?>
                    </div>
					<?php do_action( ATTIRE_THEME_PREFIX . 'after_contents' ); ?>

                </div>
            </div>
        </div>
    </div>

<?php get_footer(); 
