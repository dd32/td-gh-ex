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
				$ariel_active_sidebar = 0;
				/**
				 * We need number of active sidebars for proper layout class
				 * and we know there can be no more than 4 sidebars
				 * @var integer
				 */
				for ( $ariel_i = 1; $ariel_i < 5; $ariel_i++ ) {
					if ( is_active_sidebar( 'footer-row-2-col-' . $ariel_i ) ) { $ariel_active_sidebar++; }
				}
				/**
				 * Get sidebar class based on number of active sidebars
				 * @var atring
				 */
				$ariel_class = ariel_get_bootstrap_class( $ariel_active_sidebar );

				if ( $ariel_active_sidebar > 0 ) : ?>

				<div class="row">

					<?php
						for ( $ariel_i = 1; $ariel_i < 5; $ariel_i++ ) {
							if ( is_active_sidebar( 'footer-row-2-col-' . $ariel_i ) ) : ?>
								<div class="<?php echo esc_attr($ariel_class); ?>"><?php dynamic_sidebar( 'footer-row-2-col-' . $ariel_i ); ?></div>
							<?php endif; // is_active_sidebar( 'footer-row-2-col-' . $ariel_i )
						}
					?>

				</div><!-- row" -->

			<?php endif; // $ariel_active_sidebar > 0 ?>

		</div><!-- container -->
	</div><!-- footer-widgets -->

<?php endif; // any of footer sidebars is active
