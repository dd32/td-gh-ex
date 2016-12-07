<?php
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	class Asterion_Home {
	   
	    public function __construct() {


	    }


		function sections() {

	    	$sections = array(
	    		esc_html__( 'About', 'asterion' ),
	    		esc_html__( 'Features', 'asterion' ),
	    		esc_html__( 'Portfolio', 'asterion' ),
	    		esc_html__( 'Counters', 'asterion' ),
	    		esc_html__( 'Testimonials', 'asterion' ),
	    		esc_html__( 'Latest Posts', 'asterion' ),
	    		esc_html__( 'Team', 'asterion' ),
	    		esc_html__( 'Contact us', 'asterion' )
	    	);

	    	return $sections;
	    }

	    function section_order() {

	    	$sections = $this->sections();

	    	$section_order = array();

	    	foreach( $sections as $key => $section) {
	    		$section_order[$key+1][0] = $section;	
	    		$section_order[$key+1][1] = $this->number_to_word($key+1);	
	    	}

	    	return $section_order;

	    }


	    function number_to_word( $nr ) {
	    	switch ( $nr ) {
	    		case '1':
	    			return esc_html__( 'First', 'asterion' );
	    			break;
	    		case '2':
	    			return esc_html__( 'Second', 'asterion' );
	    			break;
	    		case '3':
	    			return esc_html__( 'Third', 'asterion' );
	    			break;
	    		case '4':
	    			return esc_html__( 'Forth', 'asterion' );
	    			break;
	    		case '5':
	    			return esc_html__( 'Fifth', 'asterion' );
	    			break;
	    		case '6':
	    			return esc_html__( 'Sixth', 'asterion' );
	    			break;
	    		case '7':
	    			return esc_html__( 'Seventh', 'asterion' );
	    			break;
	    		case '8':
	    			return esc_html__( 'Eight', 'asterion' );
	    			break;
	    		case '9':
	    			return esc_html__( 'Ninth', 'asterion' );
	    			break;
	    		case '10':
	    			return esc_html__( 'Tenth', 'asterion' );
	    			break;
	    	}
	    }


	    function section( $val ) {
	    	$sections = $this->section_order();

	    	foreach ( $sections as $key => $section) {

	    		$_section = get_theme_mod( 'asterion_'.strtolower(str_replace( ' ', '_', $section[0] )).'_show', 1 );

	    		if( $val == $key && $_section == 1 ) {
	    			get_template_part( 'sections/'.strtolower(str_replace( ' ', '-', $section[0] )) );
	    		}
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