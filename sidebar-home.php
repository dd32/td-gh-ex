<?php
/**
 * The sidebar containing the main home columns widget areas
 *
 * @subpackage fmuzz
 * @author tishonator
 * @since fmuzz 1.0.1
 *
 */
?>

<div id="home-cols">

	<div id="home-cols-inner">

		<?php if ( is_active_sidebar( 'homepage-column-1-widget-area' ) ) : ?>

				<?php 
					/**
					 * Display widgets dragged in 'Homepage Columns 1' widget areas
					 */
				?>
				<div class="col3a">
					<?php dynamic_sidebar( 'homepage-column-1-widget-area' ); ?>
				</div><!-- .col3a -->

		<?php endif; ?>
	
		<?php if ( is_active_sidebar( 'homepage-column-2-widget-area' ) ) : ?>

				<?php 
					/**
					 * Display widgets dragged in 'Homepage Columns 2' widget areas
					 */
				?>
				<div class="col3b">
					<?php dynamic_sidebar( 'homepage-column-2-widget-area' ); ?>
				</div><!-- .col3b -->

		<?php endif; ?>

		<?php if ( is_active_sidebar( 'homepage-column-3-widget-area' ) ) : ?>

				<?php 
					/**
					 * Display widgets dragged in 'Homepage Columns 3' widget areas
					 */
				?>
				<div class="col3c">
					<?php dynamic_sidebar( 'homepage-column-3-widget-area' ); ?>
				</div><!-- .col3c -->

		<?php endif; ?>

		<div class="clear">
		</div><!-- .clear -->

	</div><!-- #home-cols-inner -->

</div><!-- #home-cols -->
