<?php
/**
 * Big Blue Theme Customizer.
 *
 * @package Big Blue
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function big_blue_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
	$wp_customize->add_panel( 'big_blue_home_featured_panel', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __('Home Page Features', 'big-blue' ),
		'description'    => __('Section that will show on Home page', 'big-blue' ),
	) );
	
	//slider
	$wp_customize->add_section( 'big_blue_slider_section' , array(
		'title'       => __( 'Slider', 'big-blue' ),
		'priority'    => 20,
		'description' => __( 'Slider Option', 'big-blue' ),
		'panel'  => 'big_blue_home_featured_panel',
	) );

	$wp_customize->add_setting('big_blue_display_slider_setting', array(
		'default'        => 1,
		'sanitize_callback' => 'big_blue_sanitize_checkbox',
	));

	$wp_customize->add_control('big_blue_display_slider_control', array(
		'settings' => 'big_blue_display_slider_setting',
		'label'    => __('Display Slider', 'big-blue'),
		'section'  => 'big_blue_slider_section',
		'type'     => 'checkbox',
		'priority'	=> 24
	));
	//  =============================
	//  Select Box               
	//  =============================
	$wp_customize->add_setting('big_blue_category_setting', array(
		'default' => '',
		'sanitize_callback' => 'big_blue_sanitize_category',
	));

	$wp_customize->add_control('big_blue_category_control', array(
		'settings' => 'big_blue_category_setting',
		'type' => 'select',
		'label' => __('Select Category:','big-blue'),
		'section' => 'big_blue_slider_section',
		'active_callback' =>'big_blue_slider_active_callback',
		'choices' => $cats,
		'priority'	=> 25
	));
		
	//  Set Speed
	$wp_customize->add_setting( 'big_blue_slider_speed_setting', array (
		'default' => '6000',
		'sanitize_callback' => 'big_blue_sanitize_integer',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_slider_speed', array(
		'label'    => __( 'Slider Speed (milliseconds)', 'big-blue' ),
		'section'  => 'big_blue_slider_section',
		'settings' => 'big_blue_slider_speed_setting',
		'active_callback' =>'big_blue_slider_active_callback',
		'priority'	=> 26
	) ) );
	
	/* social media option */
	$wp_customize->add_section( 'big_blue_social_section' , array(
		'title'       => __( 'Social Media Icons', 'big-blue' ),
		'priority'    => 25,
		'description' => __( 'Optional social media buttons in the header', 'big-blue' ),
	) );

	$wp_customize->add_setting( 'big_blue_facebook_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_facebook', array(
		'label'    => __( 'Enter your Facebook url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_facebook_setting',
		'priority'    => 1,
	) ) );

	$wp_customize->add_setting( 'big_blue_twitter_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_twitter', array(
		'label'    => __( 'Enter your Twitter url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_twitter_setting',
		'priority'    => 2,
	) ) );
	
	$wp_customize->add_setting( 'big_blue_google_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_google', array(
		'label'    => __( 'Enter your Google+ url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_google_setting',
		'priority'    => 3,
	) ) );

	$wp_customize->add_setting( 'big_blue_pinterest_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_pinterest', array(
		'label'    => __( 'Enter your Pinterest url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_pinterest_setting',
		'priority'    => 4,
	) ) );

	$wp_customize->add_setting( 'big_blue_linkedin_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_linkedin', array(
		'label'    => __( 'Enter your Linkedin url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_linkedin_setting',
		'priority'    => 5,
	) ) );

	$wp_customize->add_setting( 'big_blue_youtube_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_youtube', array(
		'label'    => __( 'Enter your Youtube url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_youtube_setting',
		'priority'    => 6,
	) ) );

	$wp_customize->add_setting( 'big_blue_tumblr_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_tumblr', array(
		'label'    => __( 'Enter your Tumblr url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_tumblr_setting',
		'priority'    => 7,
	) ) );

	$wp_customize->add_setting( 'big_blue_instagram_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_instagram', array(
		'label'    => __( 'Enter your Instagram url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_instagram_setting',
		'priority'    => 8,
	) ) );

	$wp_customize->add_setting( 'big_blue_flickr_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_flickr', array(
		'label'    => __( 'Enter your Flickr url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_flickr_setting',
		'priority'    => 9,
	) ) );

	$wp_customize->add_setting( 'big_blue_vimeo_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_vimeo', array(
		'label'    => __( 'Enter your Vimeo url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_vimeo_setting',
		'priority'    => 1,
	) ) );
	$wp_customize->add_setting( 'big_blue_rss_setting', array (
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_rss', array(
		'label'    => __( 'Enter your RSS url', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_rss_setting',
		'priority'    => 11,
	) ) );

	$wp_customize->add_setting( 'big_blue_email_setting', array (			
		'sanitize_callback' => 'sanitize_email',
	) );
	
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'big_blue_email', array(
		'label'    => __( 'Enter your email address', 'big-blue' ),
		'section'  => 'big_blue_social_section',
		'settings' => 'big_blue_email_setting',
		'priority'    => 12,
	) ) );
	
	/* color option */
	$wp_customize->add_setting( 'big_blue_primary_color_setting', array (
		'default'     => '#ffd21f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'big_blue_primary_color', array(
		'label'    => __( 'Theme Primary Color', 'big-blue' ),
		'section'  => 'colors',
		'settings' => 'big_blue_primary_color_setting',
	) ) );
	
	$wp_customize->add_setting( 'big_blue_secondary_color_setting', array (
		'default'     => '#001627',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'big_blue_secondary_color', array(
		'label'    => __( 'Theme Secondary Color', 'big-blue' ),
		'section'  => 'colors',
		'settings' => 'big_blue_secondary_color_setting',
	) ) );
}
add_action( 'customize_register', 'big_blue_customize_register' );
	
function big_blue_slider_active_callback() {
	if ( get_theme_mod( 'big_blue_display_slider_setting', 0 ) ) {
		return true;
	}
	return false;
}
function big_blue_carousel_active_callback() {
	if ( get_theme_mod( 'big_blue_display_featured_carousel_setting', 0 ) ) {
		return true;
	}
	return false;
}
function big_blue_featured_active_callback() {
	if ( get_theme_mod( 'big_blue_display_featured_articles_setting', 0 ) ) {
		return true;
	}
	return false;
}

/**
 * Sanitize checkbox
 */

if (!function_exists( 'big_blue_sanitize_checkbox' ) ) :
	function big_blue_sanitize_checkbox( $input ) {
		if ( $input != 1 ) {
			return 0;
		} else {
			return 1;
		}
	}
endif;

/**
 * Sanitize integer input
 */
if ( ! function_exists( 'big_blue_sanitize_integer' ) ) :
	function big_blue_sanitize_integer( $input ) {		
		return absint($input);
	}
endif;

if ( ! function_exists( 'big_blue_sanitize_category' ) ){
	function big_blue_sanitize_category( $input ) {
		$categories = get_categories();
		$cats = array();
		$i = 0;
		foreach($categories as $category){
			if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cats[$category->slug] = $category->name;
		}
		$valid = $cats;

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return '';

		}
	}
}

function big_blue_sanitize_text_field( $str ) {

	return esc_html(sanitize_text_field( $str ));

}
		
if ( ! function_exists( 'big_blue_apply_color' ) ) :
  function big_blue_apply_color() {
	?>
	<style id="color-settings">
	<?php if (esc_html(get_theme_mod('big_blue_primary_color_setting')) ) { ?>
		.top-nav ul li a:hover, .social-meidia li a:hover, .site-title a:hover, .main-navigation, .footer-widget-container ul li a:hover, .big-blue-recent-post .meta-info-comment a:hover, .big-blue-recent-post .post-author a:hover, a, #featured-post h3 a:hover,
.featured-articles .article-excerpt h2 a:hover, .entry-title a:hover, .site-footer a:hover, .slide-post-details h1 a:hover, .comment-meta .fn a, .reply a, #search-icon .fa-search:hover,
button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .read_more:hover, .pagination, .widget-area ul li a{color:<?php echo esc_html(get_theme_mod('big_blue_primary_color_setting')); ?>}
		button, input[type="button"], input[type="reset"], input[type="submit"], .featured-post-meta, .read_more, .next.page-numbers, .prev.page-numbers{ background:<?php echo esc_html(get_theme_mod('big_blue_primary_color_setting')); ?>}
		.read_more, button, input[type="button"], input[type="reset"], input[type="submit"], .read_more:hover{border: solid 2px <?php echo esc_html(get_theme_mod('big_blue_primary_color_setting')); ?> !important;}
	<?php } ?>
	
	<?php if (esc_html(get_theme_mod('big_blue_secondary_color_setting')) ) { ?>
		.footer-widget-container{ background:<?php echo esc_html(get_theme_mod('big_blue_secondary_color_setting')); ?>}
	<?php } ?>
	
	</style>
	<?php	  
  }
endif;
add_action( 'wp_head', 'big_blue_apply_color' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function big_blue_customize_preview_js() {
	wp_enqueue_script( 'big_blue_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'big_blue_customize_preview_js' );
