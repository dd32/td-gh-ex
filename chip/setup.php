<?php
/** Tell WordPress to run chiplife_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'chiplife_setup' );

if ( ! function_exists( 'chiplife_setup' ) ):
	
	function chiplife_setup() {
	
		/** This theme styles the visual editor with editor-style.css to match the theme style. */
		add_editor_style();		
		
		/** Load up our theme options page and related code. */
		locate_template( array( CHIP_LIFE_OPTION_FSROOT . 'options.php' ), true, false );
		add_action( 'admin_init'	, array( 'Chip_Life_Options', 'chip_admin_init' ) );
		add_action( 'admin_init'	, array( 'Chip_Life_Options', 'chip_init_default' ) );	
		add_action( 'admin_print_styles-appearance_page_theme_options', array( 'Chip_Life_Options', 'chip_admin_styles_fn' ) );
		add_action( 'admin_menu'	, array( 'Chip_Life_Options', 'chip_admin_menu' ) );			
		
		/** Grab Chip Life's widgets. */
		locate_template( array( CHIP_LIFE_WIDGET_FSROOT . 'chip-social/chip-social.php' ), true, false );			
		
		/** Add default posts and comments RSS feed links to <head>. */
		add_theme_support( 'automatic-feed-links' );
		
		/** This theme uses wp_nav_menu() in two locations.*/
		register_nav_menus(
			array(
				'primary-menu'		=>	__( 'Primary Menu' ),
				'secondary-menu'	=>	__( 'Secondary Menu' ),
			)
		);
		
		/** Add support for custom backgrounds */
		add_custom_background();
		
		/** This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );
		
		/** The default header text color */
		define( 'HEADER_TEXTCOLOR', '272836' );
		/** By leaving empty, we allow for random image rotation. */
		define( 'HEADER_IMAGE', '' );
		/** The height and width of your custom header. */
		define( 'HEADER_IMAGE_WIDTH', apply_filters( 'chip_life_header_image_width', 960 ) );
		define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'chip_life_header_image_height', 200 ) );
		/** Header Text */
		define( 'NO_HEADER_TEXT', false );
		
		/** Turn on random header image rotation by default. */
		add_theme_support( 'custom-header', array( 'random-default' => true ) );
		/** Add a way for the custom header to be styled in the admin panel that controls */
		add_custom_image_header( 'chip_life_header_style', 'chip_life_admin_header_style' );
		
		/** Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI. */
		register_default_headers( array(
			
			'chiplife' =>	array(
				'url' => '%s/images/headers/header-chiplife.png',
				'thumbnail_url' => '%s/images/headers/header-chiplife-thumb.png',
				'description' => 'Chip Life'
			),
			
			'blue' =>	array(
				'url' => '%s/images/headers/header-blue.png',
				'thumbnail_url' => '%s/images/headers/header-blue-thumb.png',
				'description' => 'Blue'
			),
			
			'lightgreen' =>	array(
				'url' => '%s/images/headers/header-lightgreen.png',
				'thumbnail_url' => '%s/images/headers/header-lightgreen-thumb.png',
				'description' => 'Light Green'
			),
			
			'slate' =>	array(
				'url' => '%s/images/headers/header-slate.png',
				'thumbnail_url' => '%s/images/headers/header-slate-thumb.png',
				'description' => 'Slate'
			),
			
			'violet' =>	array(
				'url' => '%s/images/headers/header-violet.png',
				'thumbnail_url' => '%s/images/headers/header-violet-thumb.png',
				'description' => 'Violet'
			),
			
			'yellow' =>	array(
				'url' => '%s/images/headers/header-yellow.png',
				'thumbnail_url' => '%s/images/headers/header-yellow-thumb.png',
				'description' => 'Yellow'
			),	
			
		
		) );		
	
	}

endif; // chiplife_setup
?>