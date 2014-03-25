<?php

function azabujuban_custom_header_setup(){
	$args = array(
		'default-text-color'     => '220e10',
		'default-image'          => '%2$s/images/headers/koboreume.png',

		'height'                 => 230,
		'width'                  => 1600,
		'uploads'                => true,

		'wp-head-callback'       => 'twentythirteen_header_style',
		'admin-head-callback'    => 'twentythirteen_admin_header_style',
		'admin-preview-callback' => 'twentythirteen_admin_header_image',
	);
	add_theme_support( 'custom-header', $args );
}
add_action('after_setup_theme', 'azabujuban_custom_header_setup');

function azabujuban_header_image_setup(){
	global $_wp_default_headers;
	unregister_default_headers(array_keys($_wp_default_headers));
	
	register_default_headers( array(
		'koboreume' => array(
			'url'           => '%2$s/images/headers/koboreume.png',
			'thumbnail_url' => '%2$s/images/headers/koboreume-thumbnail.png',
			'description'   => _x( 'Koboreume', 'header image description', 'twentythirteen' )
		),
		'tsuyushiba' => array(
			'url'           => '%2$s/images/headers/tsuyushiba.png',
			'thumbnail_url' => '%2$s/images/headers/tsuyushiba-thumbnail.png',
			'description'   => _x( 'Tsuyushiba', 'header image description', 'twentythirteen' )
		),
		'sarasa_hanabishi' => array(
			'url'           => '%2$s/images/headers/sarasa_hanabishi.png',
			'thumbnail_url' => '%2$s/images/headers/sarasa_hanabishi-thumbnail.png',
			'description'   => _x( 'Sarasa Hanabishi', 'header image description', 'twentythirteen' )
		),
		'kikuseigaiha' => array(
			'url'           => '%2$s/images/headers/kikuseigaiha.png',
			'thumbnail_url' => '%2$s/images/headers/kikuseigaiha-thumbnail.png',
			'description'   => _x( 'Kikuseigaiha', 'header image description', 'twentythirteen' )
		),
		'ichimatsuhanabishi' => array(
			'url'           => '%2$s/images/headers/ichimatsuhanabishi.png',
			'thumbnail_url' => '%2$s/images/headers/ichimatsuhanabishi-thumbnail.png',
			'description'   => _x( 'Ichimatsuhanabishi', 'header image description', 'twentythirteen' )
		),
	) );
}
add_action('after_setup_theme', 'azabujuban_header_image_setup', 12);

function azabujuban_original_customize( $wp_customize ) {
	$wp_customize->add_setting('navbar_color', array(
		'default'           => '#f7f5e7',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'navbar_color', array(
		'label'    => 'Header Navigation Color',
		'section'  => 'colors',
		'settings' => 'navbar_color',
	)));
	
	$wp_customize->add_setting('paging_navigation_color', array(
		'default'           => '#e8e5ce',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'paging_navigation_color', array(
		'label'    => 'Paging Navigation Color',
		'section'  => 'colors',
		'settings' => 'paging_navigation_color',
	)));
	
	$wp_customize->add_setting('footer_widget_area_color', array(
		'default'           => '#220e10',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'footer_widget_area_color', array(
		'label'    => 'Footer Widget Area Color',
		'section'  => 'colors',
		'settings' => 'footer_widget_area_color',
	)));
	
	$wp_customize->add_setting('site_info_color', array(
		'default'           => '#e8e5ce',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability'        => 'edit_theme_options',
		'type'           => 'option',
	));
	$wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'site_info_color', array(
		'label'    => 'Site Info Color',
		'section'  => 'colors',
		'settings' => 'site_info_color',
	)));
}
add_action('customize_register', 'azabujuban_original_customize');

function azabujuban_customize_css(){
	echo "<style type=\"text/css\">\n<!--\n";
	echo ".navbar { background-color:".get_option('navbar_color')."; }";
	echo ".paging-navigation { background-color:".get_option('paging_navigation_color')."; }";
	echo ".site-info { background-color:".get_option('site_info_color')."; }";
	echo ".site-footer .sidebar-container { background-color:".get_option('footer_widget_area_color')."; }";
	echo "-->\n</style>\n";
}
add_action('wp_head', 'azabujuban_customize_css');



include( STYLESHEETPATH . '/extras/adminbar/adminbar.php' );

//Dashboard
function example_dashboard_widget_function() {
?>
<a href="http://www.conoha.jp/lp/20131201wp/?banner_id=vn_wp_20150116wps_azabu" target="_blank"><img src="<?php echo get_stylesheet_directory_uri() .'/images/conoha.gif' ?>" style="width:100%"></a>
<?php
}
function example_add_dashboard_widgets() {
wp_add_dashboard_widget('example_dashboard_widget', 'ConoHa VPS hosting', 'example_dashboard_widget_function');
global $wp_meta_boxes;
$normal_dashboard = $wp_meta_boxes['dashboard']['normal']['core'];
$example_widget_backup = array('example_dashboard_widget' => $normal_dashboard['example_dashboard_widget']);
unset($normal_dashboard['example_dashboard_widget']);
$sorted_dashboard = array_merge($example_widget_backup, $normal_dashboard);
$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;
}
add_action('wp_dashboard_setup', 'example_add_dashboard_widgets' );
