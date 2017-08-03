<?php
/**
* The template for displaying the footer widgets
*
* @package ariel
*/
if ( is_active_sidebar( 'footer-row-2-col-1' )
	|| is_active_sidebar( 'footer-row-2-col-2' )
	|| is_active_sidebar( 'footer-row-2-col-3' )
	|| is_active_sidebar( 'footer-row-2-col-4' ) ) : ?>

	<div class="footer-widgets footer-row-columns">
		<div class="container">

			<?php
				$active_sidebar = 0;
				/**
				 * We need number of active sidebars for proper layout class
				 * and we know there can be no more than 4 sidebars
				 * @var integer
				 */
				for ( $i = 1; $i < 5; $i++ ) {
					if ( is_active_sidebar( 'footer-row-2-col-' . $i ) ) { $active_sidebar++; }
				}
				/**
				 * Get sidebar class based on number of active sidebars
				 * @var atring
				 */
				$class = ariel_get_bootstrap_class( $active_sidebar );

				if ( $active_sidebar > 0 ) : ?>

				<div class="row">

					<?php
						for ( $i = 1; $i < 5; $i++ ) {
							if ( is_active_sidebar( 'footer-row-2-col-' . $i ) ) : ?>
								<div class="<?php echo $class; ?>"><?php dynamic_sidebar( 'footer-row-2-col-' . $i ); ?></div>
							<?php endif; // is_active_sidebar( 'footer-row-2-col-' . $i )
						}
					?>

				</div><!-- row" -->

			<?php endif; // $active_sidebar > 0 ?>

		</div><!-- container -->
	</div><!-- footer-widgets -->

<?php endif; // any of footer sidebars is active
