<?php
/*
 * This file initializes the theme per
 * theme type / functions etc.
 * It contains only theme related functions etc.
 *
 * @package atlast-agency/theme-init
 * @since 1.0.0
 */

if ( ! function_exists( 'atlast_agency_wp_menu_fallback' ) ):
	function atlast_agency_wp_menu_fallback() {
		/*
		 * If no menu item is assigned to a menu , then please ,create some :D
		 */
		if ( current_user_can( 'edit_others_pages' ) ):
			echo '<ul class="top-menu no-menu-items"><li>
<a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a Menu', 'atlast-agency' ) . '</a>
</li></ul>';
		endif;
	}

endif;


if ( ! function_exists( 'atlast_agency_get_prefix' ) ):
	function atlast_agency_get_prefix() {
		/*
		 *  Generic prefix for that theme.
		 */
		$prefix = 'atlast-agency';

		return esc_attr( $prefix );
	}
endif;

if ( ! function_exists( 'atlast_agency_get_logo_url' ) ):
	function atlast_agency_get_logo_url() {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$image          = wp_get_attachment_image_src( $custom_logo_id, 'full' );

		return $image[0];
	}
endif;


if ( ! function_exists( 'atlast_agency_set_header_image' ) ):
	function atlast_agency_set_header_image() {

		$header_image_url = esc_url( get_header_image() );
		if ( empty( $header_image_url ) ): return; endif;

		$prefix        = atlast_agency_get_prefix();
		$where_to_show = absint( get_theme_mod( $prefix . '_everywhere_header', '0' ) );
		$header_style  = absint( get_theme_mod( $prefix . '_header_with_sidemenu_enable', '0' ) );


		$html = '<div class="header-image-container" style="background-image: url(' . get_header_image() . ') ">';
		/* Has header text? */

		$header_text = absint( get_theme_mod( $prefix . '_header_image_content', '' ) );
		if ( $header_text != 0 && $header_text != null ):
			$page = get_post( absint( $header_text ) );
			$html .= '<div class="header-page-wrapper">';
			$html .= '<h2>' . esc_html( $page->post_title ) . '</h2>';
			$html .= '<h3>' . esc_html( get_the_excerpt( $page->ID ) ) . '</h3>';
			$html .= '<a href="' . esc_url( get_the_permalink( $page->ID ) ) . '" class="header-btn"><i class="fas fa-angle-right"></i>' .
			         esc_html__( 'Learn More', 'atlast-agency' ) . '</a>';
			$html .= '</div>';
		endif;
		$html .= '</div>'; // .header-image-container


		if ( $where_to_show == 0 ) {
			if ( is_front_page() || is_home() ) {
				echo $html;
			}
		} else {
			echo $html;
		}

	}
endif;
add_action( 'atlast_agency_after_header', 'atlast_agency_set_header_image', 5 );

if ( ! function_exists( 'atlast_agency_fire_slider' ) ):
	function atlast_agency_fire_slider() {
		$checkSlider = atlast_agency_check_slider();
		if ( $checkSlider == true ) {
			if ( is_front_page() || is_home() ):
				get_template_part( 'template-parts/slider/slider', 'tpl' );
			endif;
		}
	}
endif;
add_action( 'atlast_agency_after_header', 'atlast_agency_fire_slider', 4 );
/*
 * Register the WordPress customizer
 *
 * @since 1.0.0
 */
add_action( 'customize_register', 'atlast_agency_customizer_settings' );
if ( ! function_exists( 'atlast_agency_customizer_settings' ) ):
	function atlast_agency_customizer_settings( $wp_customize ) {
		$prefix = 'atlast-agency';
		require_once( get_template_directory() . '/includes/customizer-functions/customizer-panels.php' ); // Get all the panels.
	}
endif;

/*
 * Function tha returns the single blog posts categories
 */
if ( ! function_exists( 'atlast_agency_post_categories' ) ):
	function atlast_agency_post_categories() {
		$terms = wp_get_object_terms( get_the_ID(), 'category' );
		if ( ! empty( $terms ) ):
			$html = '';
			foreach ( $terms as $term ):
				$html .= '<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">' . esc_html( $term->name ) . '</a>';
			endforeach;

			return $html;
		else:
			return false;
		endif;


	}
endif;


/*
 * Theme Customizer Sanitization function
 * for extra elements.
 */

function atlast_agency_sanitize_number_absint( $number, $setting ) {
	$number = absint( $number );

	return ( $number ? $number : $setting->default );
}

function atlast_agency_sanitize_checkbox( $checked ) {

	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function atlast_agency_sanitize_dropdown_pages( $page_id, $setting ) {

	$page_id = absint( $page_id );

	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


if ( ! function_exists( 'atlast_agency_show_section_title' ) ):
	function atlast_agency_show_section_title( $item ) {
		$id = absint( $item );
		if ( $item == 0 ):
			return false;
		else:
			$info            = array();
			$page            = get_post( $item );
			$info['title']   = esc_html( $page->post_title );
			$info['excerpt'] = esc_html( $page->post_excerpt );

			return $info;
		endif;


	}
endif;

if ( ! function_exists( 'atlast_agency_separate_portfolio_items' ) ):
	function atlast_agency_separate_portfolio_items( $projects, $style = 1 ) {

		if ( $style == 1 && ! empty( $projects ) ):

			$allItems      = array();
			$featuredItems = array();
			$otherItems    = array();
			$counter       = 0;
			foreach ( $projects as $pr ) {
				if ( $counter % 5 == 0 ) {
					$featuredItems[] = $pr;
				} else {
					$otherItems[] = $pr;
				}
				if ( $counter == 5 ): break; endif;
				$counter ++;
			}

			$allItems['featured'] = $featuredItems;
			$allItems['other']    = $otherItems;

			return $allItems;

		elseif ( $style == 2 && ! empty( $projects ) ):
			$allItems         = array();
			$first_two_items  = array();
			$featuredItems    = array();
			$second_two_items = array();

			$counter = 0;
			foreach ( $projects as $pr ) {
				if ( $counter < 2 ) {
					$first_two_items[] = $pr;
				} elseif ( $counter == 2 ) {
					$featuredItems[] = $pr;
				} else {
					$second_two_items[] = $pr;
				}
				if ( $counter == 5 ): break; endif;
				$counter ++;
			}
			$allItems['first_two']  = $first_two_items;
			$allItems['featured']   = $featuredItems;
			$allItems['second_two'] = $second_two_items;

			return $allItems;

		elseif ( $style == 3 & ! empty( $projects ) ):
			$allItems = array();
			$items    = array();

			foreach ( $projects as $pp ) {
				$allItems[] = $pp;

			}

			return $allItems;
		endif;
	}
endif;

if ( ! function_exists( 'atlast_agency_check_slider' ) ):
	function atlast_agency_check_slider() {
		$prefix    = atlast_agency_get_prefix();
		$sliderOpt = absint( get_theme_mod( $prefix . '_slider_parent_page', '' ) );
		if ( $sliderOpt != 0 ) {
			return true;
		} else {
			return false;
		}
	}
endif;

if ( ! function_exists( 'atlast_agency_random_colors' ) ):
	function atlast_agency_random_colors( $rand ) {
		// $rand = rand(1, 4);

		switch ( $rand ) {
			case 1:
				return 'red-dot';
				break;
			case 2:
				return 'blue-dot';
				break;
			case 3:
				return 'green-dot';
				break;
			case 4:
				return 'pink-dot';
				break;
			default:
				return 'lightblue-dot';
		}
	}
endif;

if ( ! function_exists( 'atlast_agency_return_trans_class' ) ):
	function atlast_agency_return_trans_class() {
		$prefix = atlast_agency_get_prefix();
		$trans  = absint( get_theme_mod( $prefix . '_transparent_header', 0 ) );

		if ( $trans == 1 && !is_front_page() ){
			return '';
		}
		else if($trans == 1 && !is_home()){
			return '';
		}
		else if ( $trans == 1 ) {
			return 'transparent-header';
		}
		else{
			return '';
		}

	}
endif;