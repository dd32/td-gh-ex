<?php
/**
 * @package Best_Charity
	=========================
			WIDGET CLASS
	=========================
 */


 // widget Footer Layouts
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/widget-footer-layout-1.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/widget-footer-layout-2.php';   

// Register Widget
    if ( ! function_exists( 'best_charity_register_widget' ) ) {
    /**
     * Load widget.
     *
     * @since 1.0.0
     */
    function best_charity_register_widget() {

        // Footer Layout One
        register_widget( 'Best_Charity_Footer_Layouts_One' );

        // Footer Latest News
        register_widget( 'Best_Charity_Footer_Latest_News' );

     

    }
}

add_action( 'widgets_init', 'best_charity_register_widget' );