<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage belfast
 * @since belfast 1.0
 */
 ?>
<div class="col-md-5" id="sidebar">
      <?php do_action( 'before_sidebar' ); ?>
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
    	    <?php else : ?>
		<div class="alert alert-help">
			<p><?php _e("Please activate some Widgets.", "belfast");  ?></p>
		</div>
		<?php endif; // end sidebar widget area ?>
</div>