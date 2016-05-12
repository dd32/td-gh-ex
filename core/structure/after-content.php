<?php
/**
 * Template functions used for the after content section.
 */
//FOOTER WIDGETS
if ( ! function_exists( 'igthemes_footer_widgets' ) ) {
	function igthemes_footer_widgets() {
		if ( is_active_sidebar( 'footer-4' ) ) {
			$widget_columns = apply_filters( 'igthemes_footer_widget_regions', 4 );
		} elseif ( is_active_sidebar( 'footer-3' ) ) {
			$widget_columns = apply_filters( 'igthemes_footer_widget_regions', 3 );
		} elseif ( is_active_sidebar( 'footer-2' ) ) {
			$widget_columns = apply_filters( 'igthemes_footer_widget_regions', 2 );
		} elseif ( is_active_sidebar( 'footer-1' ) ) {
			$widget_columns = apply_filters( 'igthemes_footer_widget_regions', 1 );
		} else {
			$widget_columns = apply_filters( 'igthemes_footer_widget_regions', 0 );
		}

		if ( $widget_columns > 0 ) : ?>

			<section class="footer-widgets col-<?php echo intval( $widget_columns ); ?>">
                <div class="container">
				    <?php $i = 0; while ( $i < $widget_columns ) : $i++; ?>

					   <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>

						  <section class="block footer-widget-<?php echo intval( $i ); ?>">
				        	   <?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
						  </section>

			             <?php endif; ?>

				    <?php endwhile; ?>
                </div><!-- /.container  -->
			</section><!-- /.footer-widgets  -->

		<?php endif;
	}
}
