<?php
add_action( 'after_setup_theme', 'alanding_lite_setup' );
function alanding_lite_setup() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(166, 124, TRUE);
	global $content_width;
	if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'automatic-feed-links' );
	add_image_size( 'my-theme-logo-size', 500, 200, true );
    add_theme_support( 'site-logo', array( 'size' => 'my-theme-logo-size' ) );
    load_theme_textdomain( 'alanding-lite', get_template_directory() . '/languages' );
}
function alanding_lite_widgets() {
	register_sidebar(		
	array(
		'id' => 'sidebar-header',
		'name' => __( 'sidebar-header', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user1',
		'name' => __( 'sidebar-block1-user1', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user2',
		'name' => __( 'sidebar-block1-user2', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block1-user3',
		'name' => __( 'sidebar-block1-user3', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user1',
		'name' => __( 'sidebar-block2-user1', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user2',
		'name' => __( 'sidebar-block2-user2', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block2-user3',
		'name' => __( 'sidebar-block2-user3', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user1',
		'name' => __( 'sidebar-block3-user1', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user2',
		'name' => __( 'sidebar-block3-user2', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block3-user3',
		'name' => __( 'sidebar-block3-user3', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user1',
		'name' => __( 'sidebar-block4-user1', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user2',
		'name' => __( 'sidebar-block4-user2', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block4-user3',
		'name' => __( 'sidebar-block4-user3', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user1',
		'name' => __( 'sidebar-block5-user1', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user2',
		'name' => __( 'sidebar-block5-user2', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block5-user3',
		'name' => __( 'sidebar-block5-user3', 'alanding-lite' ),
	)		
	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block6-user1',
		'name' => __( 'sidebar-block6-user1', 'alanding-lite' ),
	)	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block6-user2',
		'name' => __( 'sidebar-block6-user2', 'alanding-lite' ),
	)		);
	register_sidebar(		
	array(
		'id' => 'sidebar-block6-user3',
		'name' => __( 'sidebar-block6-user3', 'alanding-lite' ),
	)	);
	register_sidebar(		
	array(
		'id' => 'sidebar-block6-user4',
		'name' => __( 'sidebar-block6-user4', 'alanding-lite' ),
	)				
	);
}
add_action( 'widgets_init', 'alanding_lite_widgets' );
function alanding_lite_frontend() {
 	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'alanding_lite_frontend' );
function alanding_lite_wp_title( $title, $sep ) {
	global $paged, $page;
	if ( is_feed() )
		return $title;
	$title .= get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'alanding-lite' ), max( $paged, $page ) );
	return $title;
}
add_filter( 'wp_title', 'alanding_lite_wp_title', 10, 2 );
function alanding_lite_menu() {
	add_theme_page('ALanding Setup', 'Documentation', 'edit_theme_options', 'alanding-lite', 'alanding_lite_menu_page');
}
add_action('admin_menu', 'alanding_lite_menu');
function alanding_lite_menu_page() {
echo '
<br>
<center><h1>' . __( '17 Sidebar for theme ALanding lite', 'alanding-lite' ) . '</h1>
<br>
<img src="' . get_template_directory_uri() . '/images/alanding-sidebar.png">
<br><br><br>
' . __( 'Go to the section Pages, and click on Add New.<br>On the right side in the field Template choose a desired number of blocks, type in the page name page and save.', 'alanding-lite' ) . '<br><br>
<img src="' . get_template_directory_uri() . '/images/help1.jpg">
<br><br><br>
' . __( 'Go to Settings -> Reading and assign a static page.', 'alanding-lite' ) . '<br><br>
<img src="' . get_template_directory_uri() . '/images/help2.jpg">
<br><br><br>
';
}
?>