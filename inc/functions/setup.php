<?php

if ( ! function_exists( 'aemi_content_width' ) )
{
	function aemi_content_width()
	{
		$GLOBALS['content_width'] = apply_filters( 'aemi_content_width', 1024 );
	}
}

$theme = wp_get_theme( 'aemi' );
$aemi_version = $theme['Version'];

if ( ! function_exists( 'aemi_setup' ) )
{
	function aemi_setup()
	{
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'aemi-large', 1920, 1200, false );
		add_image_size( 'aemi-content', 800, 500, false );
		add_image_size( 'aemi-logo', 92, 92, false );

		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu', 'aemi' ),
				'footer-menu' => __( 'Footer Menu', 'aemi' )
			)
		);

		add_theme_support( 'html5' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

	/*
	Later Support
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );
	*/

	add_theme_support( 'custom-background', apply_filters( 'aemi_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_theme_support( 'custom-header', array(
		'default-image'          => '',
		'width'                  => 2880,
		'height'                 => 172,
		'flex-height'            => true,
		'flex-width'             => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => false,
		'default-text-color'     => '',
		'wp-head-callback'       => '',
		'admin-head-callback'    => '',
		'admin-preview-callback' => '',
	) );

	add_theme_support( 'site-logo' );

	add_theme_support( 'custom-logo', array(
		'height'      => 92,
		'width'       => 92,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array(),
	) );

	add_editor_style( array( 'assets/editor-style.css' ) );

	$starter_content = apply_filters( 'aemi_starter_content', array(
		'widgets' => array(
			'header-widget-area' => array(
				'search',
			),
			/*
			Later Support
			'sidebar-widget-area' => array(
				'',
			),
			*/
			'footer-widget-area' => array(
				'',
			),
		),
	) );
	add_theme_support( 'starter-content', $starter_content );
	}
}
add_action( 'after_setup_theme', 'aemi_setup' );



function aemi_tagcount_filter ( $variable )
{
	$variable = str_replace( '<span class="tag-link-count"> (', '<span class="tag-link-count">&bull;', $variable );
	$variable = str_replace( ')</span>', '</span>', $variable );
	return $variable;
}
add_filter('wp_tag_cloud','aemi_tagcount_filter');



function aemi_search_form( $form )
{
	$form = '<form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( '',  'aemi' ) . '</label>
	<input type="search" value="' . get_search_query() . '" name="s" id="search" placeholder="Search" />' . '<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search', 'aemi' ) . '" />
	</form>';
	return $form;
}
add_filter( 'get_search_form', 'aemi_search_form' );




if ( ! function_exists( 'aemi_widgets_init' ) )
{
	function aemi_widgets_init()
	{
		register_sidebar( array (
			'name' => __( 'Header Widget Area', 'aemi' ),
			'id' => 'header-widget-area',
			'description' => 'Add widgets in this area to display them on header area.',
			'before_widget' => '<div id="widget-%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="widget-title">',
			'after_title' => '</h6>',
		) );
		/* register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'aemi' ),
		'id' => 'sidebar-widget-area',
		'description' => 'Add widgets in this area to display them on sidebar area.',
		'before_widget' => '<div id="widget-%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="widget-title">',
		'after_title' => '</h6>',
		) ); */
		register_sidebar( array (
			'name' => __( 'Footer Widget Area', 'aemi' ),
			'id' => 'footer-widget-area',
			'description' => 'Add widgets in this area to display them on footer area.',
			'before_widget' => '<div id="widget-%1$s" class="widget-container %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h6 class="widget-title">',
			'after_title' => '</h6>',
		) );
	}
}


if ( ! function_exists( 'aemi_scripts' ) )
{
	function aemi_scripts()
	{
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'font', get_template_directory_uri() . '/assets/css/fonts.css' );
		wp_enqueue_script ( 'act', get_template_directory_uri() . '/assets/js/act.js' );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
