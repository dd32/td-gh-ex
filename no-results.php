<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 */
global $cx_framework_options; ?>

<article id="post-0" class="post no-results not-found">
	<header class="entry-header">
		<h1 class="entry-title"><?php _e( 'Nothing Found', 'conica' ); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
			
			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'conica' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
			
		<?php elseif ( is_search() ) : ?>
			
			<p><?php echo $cx_framework_options['cx-options-site-msg-nosearch']; ?></p>
			
            <div class="not-found-options">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="conica-button"><?php _e( 'Return Home', 'conica' ); ?></a>
                <a class="conica-button search-button"><?php _e( 'Search', 'conica' ); ?></a>
            </div>
			
		<?php else : ?>
			
			<p><?php echo $cx_framework_options['cx-options-site-msg-nosearch']; ?></p>
            
            <div class="not-found-options">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="conica-button"><?php _e( 'Return Home', 'conica' ); ?></a>
                <a class="conica-button search-button"><?php _e( 'Search', 'conica' ); ?></a>
            </div>
			
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-0 .post .no-results .not-found -->