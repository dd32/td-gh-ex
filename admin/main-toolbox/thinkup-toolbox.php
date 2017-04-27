<?php

function alante_thinkup_setup() {    

	/**
	 * About page class
	 */
	require_once get_template_directory() . '/admin/main-toolbox/thinkup-toolbox-class-about.php';

	/*
	* About page instance
	*/

	// Get theme data
	$theme_data     = wp_get_theme();

	// Get name of parent theme
	if ( is_child_theme() ) {
		$theme_name    = strtolower( str_replace( '_lite', '', $theme_data->parent()->get( 'Name' ) ) );
		$theme_version = strtolower( str_replace( '_lite', '', $theme_data->parent()->get( 'Version ' ) ) );
	} else {
		$theme_name    = strtolower( str_replace( '_lite', '', $theme_data->get( 'Name' ) ) );
		$theme_version = strtolower( str_replace( '_lite', '', $theme_data->get( 'Version ' ) ) );
	}

	$config = array(
		// Menu name under Appearance.
		'menu_name'               => sprintf( __( 'About %1$s (Free)', 'alante' ), ucfirst( $theme_name ) ),
		// Page title.
		'page_name'               => sprintf( __( 'About %1$s (Free)', 'alante' ), ucfirst( $theme_name ) ),
		// Main welcome title
		'welcome_title'         => sprintf( __( 'Welcome to %1$s! - Version ', 'alante' ), ucfirst( $theme_name ) ),
		// Main welcome content
		'welcome_content'       => sprintf( esc_html__(  '%1$s is a free multi-purpose WordPress theme. It\'s fully responsive and perfect for any type of website, it\'s great web agency businesses, corporate websites , personal, blogs, photography and everything in between! Create a stunning homepage with the featured homepage sections and add a beautiful slideshow in seconds.', 'alante' ), ucfirst( $theme_name ) ),
		/**
		 * Tabs array.
		 *
		 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
		 * the will be the name of the function which will be used to render the tab content.
		 */
		'upgrade'                    => array(
			'upgrade_url'     => '//www.thinkupthemes.com/themes/' . $theme_name . '/',
			'price_discount'  => __( 'Upgrade for $31 (10% off)', 'alante' ),
			'price_normal'	  => __( 'Normally $35. Use coupon at checkout.', 'alante' ),
			'coupon'	      => $theme_name . '31',
			'button'	      => __( 'Upgrade Now', 'alante' ),
		),
		'tabs'                    => array(
			'getting_started'  => __( 'Getting Started', 'alante' ),
			'support_content'       => __( 'Support', 'alante' ),
			'free_pro'         => __( 'Free VS PRO', 'alante' ),
		),
		// Getting started tab
		'getting_started' => array(
			'first' => array (
				'title' => esc_html__( 'Setup Slideshow','alante' ),
				'text' => esc_html__( 'Add a slider to your site in seconds. Go to the Customizer -> Theme Options -> Homepage and choose Image Slider. Add up to 3 slides quickly!','alante' ) . '<br /><br />' . esc_html__( 'Want more slides? With Alante Pro you can add as many slides as you want! Plus add video slides, image only slides and so much more!', 'alante' ),
				'button_label' => sprintf( esc_html__( 'View %1$s Pro','alante' ), ucfirst( $theme_name ) ),
				'button_link' => esc_url( '//www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button' => false,
				'recommended_actions' => false,
                'is_new_tab' => true
			),
			'second' => array(
				'title' => esc_html__( 'Setup Homepage','alante' ),
				'text' => esc_html__( 'Create a homepage fast. Go to the Customizer -> Theme Options -> Homepage (Featured) to start adding content. Add up to 3 sections fast!','alante' ) . '<br /><br />' . esc_html__( 'Fully customize your homepage with Alante Pro. Add as many sections as you want, change the button text, disable cropping. Plus much more!', 'alante' ),
				'button_label' => sprintf( esc_html__( 'View %1$s Pro', 'alante' ), ucfirst( $theme_name ) ),
				'button_link' => esc_url( '//www.thinkupthemes.com/themes/' . $theme_name . '/' ),
				'is_button' => false,
				'recommended_actions' => false,
                'is_new_tab' => true
			),
			'third' => array(
				'title' => esc_html__( 'Go to Customizer','alante' ),
				'text' => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.','alante' ),
				'button_label' => esc_html__( 'Go to Customizer','alante' ),
				'button_link' => esc_url( admin_url( 'customize.php' ) ),
				'is_button' => true,
				'recommended_actions' => false,
                'is_new_tab' => true
			)
		),
		// Support content tab.
		'support_content'      => array(
			'first' => array (
				'title' => esc_html__( 'Free Support','alante' ),
				'icon' => 'dashicons dashicons-sos',
				'text' => esc_html__( 'Get free support from the amazing volunteers over at the wordpress forums. This support is provided by volunteers not Think Up Themes staff.','alante' ),
				'button_label' => esc_html__( 'Contact Free Support','alante' ),
				'button_link' => esc_url( '//wordpress.org/support/theme/' . $theme_name . '/' ),
				'is_button' => false,
				'is_new_tab' => true
			),
			'second' => array(
				'title' => esc_html__( 'Changelog','alante' ),
				'icon' => 'dashicons dashicons-portfolio',
				'text' => esc_html__( 'Want to know what\'s been happing with the latest changes? Take a look at the changelog. Your can find this in the themes readme.txt file.','alante' ),
				'button_label' => '',
				'button_link' => '',
				'is_button' => false,
				'is_new_tab' => false
			),
			'third' => array(
				'title' => esc_html__( 'Premium Support','alante' ),
				'icon' => 'dashicons dashicons-book-alt',
				'text' => sprintf( esc_html__( 'Get support from the brains behind %1$s. Upgrade to %1$s Pro and you\'ll get help straight from the theme developers!', 'alante' ), ucfirst( $theme_name ) ) . '<br /><br />' . sprintf( esc_html__( 'Get VIP access to the knowledge base, personal ticket support and much more so you can make the most out of %1$s!', 'alante' ), ucfirst( $theme_name ) ),
				'button_label' => sprintf( esc_html__( 'Get %1$s Pro','alante' ), ucfirst( $theme_name ) ),
				'button_link' => '//www.thinkupthemes.com/themes/' . $theme_name . '/',
				'is_button' => true,
				'is_new_tab' => true
			),
		),
		// Free vs pro array.
		'free_pro'                => array(
			'free_theme_name'     => ucfirst( $theme_name ) . ' (free)',
			'pro_theme_name'      => ucfirst( $theme_name ) . ' PRO',
			'pro_theme_link'      => '//www.thinkupthemes.com/themes/' . $theme_name . '/',
			'get_pro_theme_label' => sprintf( __( 'Get %s now!', 'alante' ), 'Alante Pro' ),
			'features'            => array(
				array(
					'title'            => __( 'Mobile Friendly', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Background Image', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Fontpage Sections', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '3',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => 'Unlimited',
				),
				array(
					'title'            => __( 'Fontpage Slides', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'true',
					'is_in_lite_text'  => '3',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => 'Unlimited',
				),
				array(
					'title'            => __( 'Built-In Social Buttons', 'alante' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => '7',
					'is_in_pro'        => '',
					'is_in_pro_text'   => 'Unlimited',
				),
				array(
					'title'            => __( 'Advanced Theme Options', 'alante' ),
					'description'      => '',
					'is_in_lite'       => '',
					'is_in_lite_text'  => 'Basic',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Page Builder', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Theme Options Panel', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Unlimited Color Options', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( '600+ Google Fonts', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( '150+ Shortcodes', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'ThinkUpSlider', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Unlimited Sliders', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Portfolio', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Google Map Section', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Custom Widgets', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Parallax Effects', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Animation Effects', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Extended Layout Options', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'Premium Support', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
				array(
					'title'            => __( 'No credit footer link', 'alante' ),
					'description'      => '',
					'is_in_lite'       => 'false',
					'is_in_lite_text'  => '',
					'is_in_pro'        => 'true',
					'is_in_pro_text'   => '',
				),
			),
		),
	);
	alante_thinkup_about_page::init( $config );

}

add_action('after_setup_theme', 'alante_thinkup_setup');

?>