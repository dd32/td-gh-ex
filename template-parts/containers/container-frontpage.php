<?php
/**
 * Default sidebars and grid container for the site content.
 *
 * @package BA Tours
 */

?>

<?php if ( apply_filters( 'bathemos_flag', false, 'container' ) == 'before' ) : ?>

		<?php do_action( 'bathemos_content_before' ); ?>

		<div class="row">
			
			<div id="primary" class="content-area">
			
				<!-- Main -->
				
				<main id="main" class="site-main">

					<?php do_action( 'bathemos_main_before' ); ?>

<?php elseif ( apply_filters( 'bathemos_flag', false, 'container' ) == 'after' ) : ?>

					<?php do_action( 'bathemos_main_after' ); ?>
						
				</main><!-- #main -->
				
			</div><!-- #primary -->
			
		</div><!-- .row -->

		<?php do_action( 'bathemos_content_after' ); ?>

<?php endif; ?>
