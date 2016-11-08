<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	class Asterion_Home {
	   
	    public function __construct() {


	    }

	    function section( $val ) {

	        $features = get_theme_mod( 'asterion_features_show', 1 );
	        $portfolio = get_theme_mod( 'asterion_portfolio_show', 1 );
	        $about = get_theme_mod( 'asterion_about_show', 1 );
	        $counters = get_theme_mod( 'asterion_counters_show', 1 );
	        $testimonials = get_theme_mod( 'asterion_testimonials_show', 1 );
	        $team = get_theme_mod( 'asterion_team_show', 1 );
	        $contact = get_theme_mod( 'asterion_contact_show', 1 );
	        
	        if( $val == 1 && $features == 1 ) {
	            get_template_part( 'sections/features' );
	        } elseif( $val == 2 && $portfolio == 1 ) {
	            get_template_part( 'sections/portfolio' );
	        } elseif( $val == 3 && $about == 1 ) {
	            get_template_part( 'sections/about' );
	        } elseif( $val == 4 && $counters == 1 ) {
	            get_template_part( 'sections/counters' );
	        } elseif( $val == 5 && $testimonials == 1 ) {
	            get_template_part( 'sections/testimonials' );
	        } elseif( $val == 6 && $team == 1 ) {
	            get_template_part( 'sections/team' );
	        } elseif( $val == 7 && $contact == 1 ) {
	            get_template_part( 'sections/contact' ); 
	        }



	    }


		function widget_counter( $sidebar_id ) {
			global $_wp_sidebars_widgets;
			if ( empty( $_wp_sidebars_widgets ) ) :
				$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
			endif;
			
			$sidebars_widgets_count = $_wp_sidebars_widgets;
			
			if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
				$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
				$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
				if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
					// Four widgets er row if there are exactly four or more than six
					$widget_classes .= ' per-row-4';
				elseif ( $widget_count >= 3 ) :
					// Three widgets per row if there's three or more widgets 
					$widget_classes .= ' per-row-3';
				elseif ( 2 == $widget_count ) :
					// Otherwise show two widgets per row
					$widget_classes .= ' per-row-2';
				endif; 
				echo esc_attr($widget_classes);
			endif;
		}
				

	}

?>