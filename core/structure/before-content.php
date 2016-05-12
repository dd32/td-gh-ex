<?php
/**
 * Template functions used for the before content section.
 */
//WIDGET AREA
if ( ! function_exists( 'igthemes_header_widgets' ) ) {
	function igthemes_header_widgets() {
		if ( is_active_sidebar( 'header-4' ) ) {
			$widget_columns = apply_filters( 'igthemes_header_widget_regions', 4 );
		} elseif ( is_active_sidebar( 'header-3' ) ) {
			$widget_columns = apply_filters( 'igthemes_header_widget_regions', 3 );
		} elseif ( is_active_sidebar( 'header-2' ) ) {
			$widget_columns = apply_filters( 'igthemes_header_widget_regions', 2 );
		} elseif ( is_active_sidebar( 'header-1' ) ) {
			$widget_columns = apply_filters( 'igthemes_header_widget_regions', 1 );
		} else {
			$widget_columns = apply_filters( 'igthemes_header_widget_regions', 0 );
		}

		if ( $widget_columns > 0 ) : ?>
			<section class="header-widgets col-<?php echo intval( $widget_columns ); ?>">
                <div class="container">

				    <?php $i = 0; while ( $i < $widget_columns ) : $i++; ?>

					   <?php if ( is_active_sidebar( 'header-' . $i ) ) : ?>

						  <section class="block header-widget-<?php echo intval( $i ); ?>">
				        	   <?php dynamic_sidebar( 'header-' . intval( $i ) ); ?>
						  </section>

			         <?php endif; ?>

				    <?php endwhile; ?>
                    
			     </section><!-- /.container  -->
			</section><!-- /.header-widgets  -->

		<?php endif;
	}
}

// BREADCRUMBS
if ( ! function_exists( 'igthemes_breadcrumb' ) ) {
    function igthemes_breadcrumb() {
        if (igthemes_option('breadcrumb')) {
	       if ( function_exists('bcn_display') ) { ?>
                <div class="breadcrumb" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <div class="container">
                        <?php bcn_display(); ?>
                    </div>
                </div>
            <?php
	        } elseif ( function_exists('yoast_breadcrumb') ) { 
                    yoast_breadcrumb('<div class="breadcrumb"><div class="container">','</div></div>');
            } else {
                if (!is_home() && !is_shop() && !is_product()) {
                    echo '<div class="breadcrumb"><div class="container">';
                    echo '<a href="'. esc_url(home_url('/')) .'">';
                    echo esc_html__('Home', 'basic-shop');
                    echo '</a>';
                if (is_category() || is_single()) {
                    echo " &#47; ";
                    the_category(' &#47; ');
                    if (is_singular( 'post' )) {
                        echo " &#47; ";
                        the_title();
                    } 
                    elseif (is_singular()) {
                        echo the_title();
                    }
                }
                elseif (is_page()) {
                    echo " &#47; ";
                    echo the_title();
                }
                elseif (is_archive()) {
                    echo " &#47; ";
                    echo single_month_title();
                    echo single_tag_title("", false);
                }
                echo '</div></div>';
                }
                if (is_product() || is_shop()) {
                   woocommerce_breadcrumb(); 
                }
            }
        }
    }
}
