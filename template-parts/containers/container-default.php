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
			
			<?php do_action( 'bathemos_get_panel', 'sidebar-left' ); ?>
			
			<div id="primary" class="<?php echo esc_attr(apply_filters( 'bathemos_style', 'content-area', 'primary' )); ?> <?php echo esc_attr(apply_filters( 'bathemos_column_width', 'col-md-7', 'main', 'rest' )); ?>">
				
				<?php do_action( 'bathemos_get_panel', 'content-top' ); ?>
				
				<div id="content-main" class="row">
				
					<?php do_action( 'bathemos_get_panel', 'content-left' ); ?>
					
					<!-- Main -->
				
					<main id="main" class="<?php echo esc_attr(apply_filters( 'bathemos_style', 'site-main', 'main' )); ?> <?php echo esc_attr(apply_filters( 'bathemos_column_width', 'col-md-12', 'content', 'rest' )); ?>">

						<?php do_action( 'bathemos_main_before' ); ?>

<?php elseif ( apply_filters( 'bathemos_flag', false, 'container' ) == 'after' ) : ?>

						<?php do_action( 'bathemos_main_after' ); ?>
						
					</main><!-- #main -->
				
					<?php do_action( 'bathemos_get_panel', 'content-right' ); ?>
				
				</div>
				
				<?php do_action( 'bathemos_get_panel', 'content-bottom' ); ?>
					
			</div><!-- #primary -->
			
			<?php do_action( 'bathemos_get_panel', 'sidebar-right' ); ?>
			
		</div><!-- .row -->

		<?php do_action( 'bathemos_content_after' ); ?>

<?php endif; ?>
