<?php
/* Theme Customizer */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function auto_store_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	

/***********************************************************************************
 * Sanitize Functions
***********************************************************************************/
					
		function auto_store_sanitize_checkbox( $input ) {
			if ( $input ) {
				return 1;
			}
			return 0;
		}
/***********************************************************************************/
		
		function auto_store_sanitize_social( $input ) {
			$valid = array(
				'' => esc_attr__( ' ', 'auto-store' ),
				'_self' => esc_attr__( '_self', 'auto-store' ),
				'_blank' => esc_attr__( '_blank', 'auto-store' ),
			);

			if ( array_key_exists( $input, $valid ) ) {
				return $input;
			} else {
				return '';
			}
		}
		
		
/***********************************************************************************
 * Social media option
***********************************************************************************/
 
		$wp_customize->add_section( 'auto_store_social_section' , array(
			'title'       => __( 'Social Media', 'auto-store' ),
			'description' => __( 'Social media buttons', 'auto-store' ),
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'social_media_activate_header', array (
			'sanitize_callback' => 'auto_store_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate_header', array(
			'label'    => __( 'Activate Social Icons in Header:', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'social_media_activate_header',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'social_media_activate', array (
			'sanitize_callback' => 'auto_store_sanitize_checkbox',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_media_activate', array(
			'label'    => __( 'Activate Social Icons in Footer:', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'social_media_activate',
			'type' => 'checkbox',
		) ) );
		
		$wp_customize->add_setting( 'auto_store_social_link_type', array (
			'sanitize_callback' => 'auto_store_sanitize_social',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_social_link_type', array(
			'label'    => __( 'Link Type', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_social_link_type',
			'type'     =>  'select',
            'choices'  => array(
				'' => esc_attr__( ' ', 'auto-store' ),
				'_self' => esc_attr__( '_self', 'auto-store' ),
				'_blank' => esc_attr__( '_blank', 'auto-store' ),
            ),			
		) ) );
		
		$wp_customize->add_setting( 'social_media_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_color', array(
			'label'    => __( 'Social Icons Color:', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'social_media_color',
		) ) );
				
		$wp_customize->add_setting( 'social_media_hover_color', array (
			'sanitize_callback' => 'sanitize_hex_color',
		) );
				
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'social_media_hover_color', array(
			'label'    => __( 'Social Hover Icons Color:', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'social_media_hover_color',
		) ) );
		
		$wp_customize->add_setting( 'auto_store_facebook', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_facebook', array(
			'label'    => __( 'Enter Facebook url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_facebook',
		) ) );
	
		$wp_customize->add_setting( 'auto_store_twitter', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_twitter', array(
			'label'    => __( 'Enter Twitter url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_twitter',
		) ) );

		$wp_customize->add_setting( 'auto_store_google', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_google', array(
			'label'    => __( 'Enter Google+ url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_google',
		) ) );
		
		$wp_customize->add_setting( 'auto_store_linkedin', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_linkedin', array(
			'label'    => __( 'Enter Linkedin url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_linkedin',
		) ) );


		$wp_customize->add_setting( 'auto_store_rss', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_rss', array(
			'label'    => __( 'Enter RSS url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_rss',
		) ) );
		
		$wp_customize->add_setting( 'auto_store_pinterest', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_pinterest', array(
			'label'    => __( 'Enter Pinterest url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_pinterest',
		) ) );
		
		$wp_customize->add_setting( 'auto_store_youtube', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_youtube', array(
			'label'    => __( 'Enter Youtube url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_youtube',
		) ) );
					
		$wp_customize->add_setting( 'auto_store_vimeo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_vimeo', array(
			'label'    => __( 'Enter Vimeo url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_vimeo',
		) ) );
		
							
		$wp_customize->add_setting( 'auto_store_instagram', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_instagram', array(
			'label'    => __( 'Enter Ynstagram url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_instagram',
		) ) );
			
		$wp_customize->add_setting( 'auto_store_stumbleupon', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_stumbleupon', array(
			'label'    => __( 'Enter Stumbleupon url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_stumbleupon',
		) ) );
											
		$wp_customize->add_setting( 'auto_store_flickr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_flickr', array(
			'label'    => __( 'Enter Flickr url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_flickr',
		) ) );
		
													
		$wp_customize->add_setting( 'auto_store_dribbble', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_dribbble', array(
			'label'    => __( 'Enter Dribbble url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_dribbble',
		) ) );
															
		$wp_customize->add_setting( 'auto_store_digg', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_digg', array(
			'label'    => __( 'Enter Digg url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_digg',
		) ) );
																	
		$wp_customize->add_setting( 'auto_store_skype', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_skype', array(
			'label'    => __( 'Enter Skype url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_skype',
		) ) );
																			
		$wp_customize->add_setting( 'auto_store_deviantart', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_deviantart', array(
			'label'    => __( 'Enter Deviantart url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_deviantart',
		) ) );
																					
		$wp_customize->add_setting( 'auto_store_yahoo', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_yahoo', array(
			'label'    => __( 'Enter Yahoo url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_yahoo',
		) ) );
																							
		$wp_customize->add_setting( 'auto_store_reddit_alien', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_reddit_alien', array(
			'label'    => __( 'Enter Reddit Alien url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_reddit_alien',
		) ) );
		
																									
		$wp_customize->add_setting( 'auto_store_paypal', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_paypal', array(
			'label'    => __( 'Enter Paypal url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_paypal',
		) ) );
																											
		$wp_customize->add_setting( 'auto_store_dropbox', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_dropbox', array(
			'label'    => __( 'Enter Dropbox url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_dropbox',
		) ) );
																													
		$wp_customize->add_setting( 'auto_store_soundcloud', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_soundcloud', array(
			'label'    => __( 'Enter Soundcloud url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_soundcloud',
		) ) );
		
																															
		$wp_customize->add_setting( 'auto_store_vk', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_vk', array(
			'label'    => __( 'Enter VK url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_vk',
		) ) );
																																	
		$wp_customize->add_setting( 'auto_store_envelope', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_envelope', array(
			'label'    => __( 'Enter Envelope url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_envelope',
		) ) );
																																			
		$wp_customize->add_setting( 'auto_store_address_book', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_book', array(
			'label'    => __( 'Enter Address Book url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_book',
		) ) );
																																					
		$wp_customize->add_setting( 'auto_store_address_apple', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_apple', array(
			'label'    => __( 'Enter Apple url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_apple',
		) ) );
																																							
		$wp_customize->add_setting( 'auto_store_address_apple', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_amazon', array(
			'label'    => __( 'Enter Amazon url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_amazon',
		) ) );
																																									
		$wp_customize->add_setting( 'auto_store_address_slack', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_slack', array(
			'label'    => __( 'Enter Slack url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_slack',
		) ) );
																																											
		$wp_customize->add_setting( 'auto_store_address_slideshare', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_slideshare', array(
			'label'    => __( 'Enter Slideshare url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_slideshare',
		) ) );
																																													
		$wp_customize->add_setting( 'auto_store_address_wikipedia', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_wikipedia', array(
			'label'    => __( 'Enter Wikipedia url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_wikipedia',
		) ) );
																																															
		$wp_customize->add_setting( 'auto_store_address_wordpress', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_wordpress', array(
			'label'    => __( 'Enter WordPress url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_wordpress',
		) ) );
																																																	
		$wp_customize->add_setting( 'auto_store_address_odnoklassniki', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_odnoklassniki', array(
			'label'    => __( 'Enter Odnoklassniki url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_odnoklassniki',
		) ) );
																																																			
		$wp_customize->add_setting( 'auto_store_address_tumblr', array (
			'sanitize_callback' => 'esc_url_raw',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_address_tumblr', array(
			'label'    => __( 'Enter Tumblr url', 'auto-store' ),
			'section'  => 'auto_store_social_section',
			'settings' => 'auto_store_address_tumblr',
		) ) );
			
	
		
/***********************************************************************************
 * Sidebar Options
***********************************************************************************/
 
		$wp_customize->add_section( 'auto_store_sidebar' , array(
			'title'       => __( 'Sidebar Options', 'auto-store' ),
			'priority'   => 64,
		) );
		
		$wp_customize->add_setting( 'auto_store_sidebar_width', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_sidebar_width', array(
			'label'    => __( 'Sidebar Width:', 'auto-store' ),
			'section'  => 'auto_store_sidebar',		
			'settings' => 'auto_store_sidebar_width',
			'type'     =>  'range',		
			'input_attrs'     => array(
				'min'  => 10,
				'max'  => 50,
				'step' => 1,
	),			
		) ) );
		
		$wp_customize->add_setting( 'auto_store_sidebar_position', array (
			'sanitize_callback' => 'sanitize_text_field',
		) );
				
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'auto_store_sidebar_position', array(
			'label'    => __( 'Sidebar Position', 'auto-store' ),
			'section'  => 'auto_store_sidebar',
			'settings' => 'auto_store_sidebar_position',
			'type' => 'radio',
			'choices' => array(
				'1' => __( 'Left', 'auto-store' ),
				'2' => __( 'Right', 'auto-store' ),
				'3' => __( 'No Sidebar', 'auto-store' ),
				),			
			
		) ) );
		
/********************************************
* Sidebar Title Background
*********************************************/ 
	
		$wp_customize->add_setting('auto_store_aside_background_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_store_aside_background_color', array(
		'label' => __('Sidebar Title Background Color', 'auto-store'),        
		'section' => 'auto_store_sidebar',
		'settings' => 'auto_store_aside_background_color'
		)));
		
/********************************************
* Sidebar Title Color
*********************************************/ 
	
		$wp_customize->add_setting('auto_store_aside_title_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_store_aside_title_color', array(
		'label' => __('Sidebar Title Color', 'auto-store'),        
		'section' => 'auto_store_sidebar',
		'settings' => 'auto_store_aside_title_color'
		)));

/********************************************
* Sidebar Background
*********************************************/ 
	
		$wp_customize->add_setting('auto_store_aside_background_color1', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_store_aside_background_color1', array(
		'label' => __('Sidebar Background Color', 'auto-store'),        
		'section' => 'auto_store_sidebar',
		'settings' => 'auto_store_aside_background_color1'
		)));
		
/********************************************
* Sidebar Link Color
*********************************************/ 
	
		$wp_customize->add_setting('auto_store_aside_link_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_store_aside_link_color', array(
		'label' => __('Sidebar Link Color', 'auto-store'),        
		'section' => 'auto_store_sidebar',
		'settings' => 'auto_store_aside_link_color'
		)));
						
/********************************************
* Sidebar Link Hover Color
*********************************************/ 
	
		$wp_customize->add_setting('auto_store_aside_link_hover_color', array(         
		'default'     => '',
		'sanitize_callback' => 'sanitize_hex_color'
		)); 	

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'auto_store_aside_link_hover_color', array(
		'label' => __('Sidebar Link Hover Color', 'auto-store'),        
		'section' => 'auto_store_sidebar',
		'settings' => 'auto_store_aside_link_hover_color'
		)));
			
	
}
add_action( 'customize_register', 'auto_store_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function auto_store_customize_preview_js() {
	wp_enqueue_script( 'auto_store_customizer', get_template_directory_uri() . '/framework/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'auto_store_customize_preview_js' );


		function auto_store_customize_all_css() {
    ?>
		<style type="text/css">
			<?php if ( (!is_front_page() or !is_home()) and get_theme_mod('custom_header_position') == "home") { ?> .site-header { display: none;} <?php } ?> 
			<?php if ( get_theme_mod('custom_header_position') == "deactivate") { ?> .site-header { display: none;} <?php } ?> 
			<?php if(get_theme_mod('auto_store_aside_background_color')) { ?>#content aside h2 {background:<?php echo esc_attr (get_theme_mod('auto_store_aside_background_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('auto_store_aside_background_color1')) { ?>#content aside ul, #content .widget {background:<?php echo esc_attr (get_theme_mod('auto_store_aside_background_color1')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('auto_store_aside_title_color')) { ?>#content aside h2 {color:<?php echo esc_attr (get_theme_mod('auto_store_aside_title_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('auto_store_aside_link_color')) { ?>#content aside a {color:<?php echo esc_attr (get_theme_mod('auto_store_aside_link_color')); ?>;} <?php } ?> 
			<?php if(get_theme_mod('auto_store_aside_link_hover_color')) { ?>#content aside a:hover {color:<?php echo esc_attr (get_theme_mod('auto_store_aside_link_hover_color')); ?>;} <?php } ?> 
			
			<?php if(get_theme_mod('social_media_color')) { ?> .social .fa-icons i {color:<?php echo esc_attr (get_theme_mod('social_media_color')); ?> !important;} <?php } ?> 
			<?php if(get_theme_mod('social_media_hover_color')) { ?> .social .fa-icons i:hover {color:<?php echo esc_attr (get_theme_mod('social_media_hover_color')); ?> !important;} <?php } ?>

			<?php if(get_theme_mod('auto_store_titles_setting_1')) { ?> .single-title, .sr-no-sidebar .entry-title, .full-p .entry-title { display: none !important;} <?php } ?>

		</style>
		
    <?php	
}
		add_action('wp_head', 'auto_store_customize_all_css');
		
/**************************************
Sidebar Options
**************************************/


	function auto_store_sidebar_width () {
		if(get_theme_mod('auto_store_sidebar_width')) {
	
	$auto_store_content_width = 96;
	$auto_store_sidebar_width = esc_attr(get_theme_mod('auto_store_sidebar_width'));
	$auto_store_sidebar_sum = $auto_store_content_width - $auto_store_sidebar_width;

	?>
		<style>
			#content aside {width: <?php echo esc_attr(get_theme_mod('auto_store_sidebar_width')); ?>% !important;}
			#content main {width: <?php echo esc_attr($auto_store_sidebar_sum); ?>%  !important;}
		</style>
		
	<?php }
}
	add_action('wp_head','auto_store_sidebar_width');
	
/*********************************************************************************************************
* Sidebar Position
**********************************************************************************************************/

	function auto_store_sidebar(){
	$option_sidebar = get_theme_mod( 'auto_store_sidebar_position');		
	if($option_sidebar == '2') { 
			wp_enqueue_style( 'seos-right-sidebar', get_template_directory_uri() . '/css/right-sidebar.css');
		}

	$option_sidebar = get_theme_mod( 'auto_store_sidebar_position');			
		if($option_sidebar == '3') { 
			wp_enqueue_style( 'seos-no-sidebar', get_template_directory_uri() . '/css/no-sidebar.css');
		}
	}
	add_action( 'wp_enqueue_scripts', 'auto_store_sidebar' );
	
		
	
/***********************************************************************************
 * Auto Store Buy
***********************************************************************************/

		function auto_store_support($wp_customize){
			class seos_Customize extends WP_Customize_Control {
				public function render_content() { ?>
				<div class="seos-info"> 
						<a href="<?php echo esc_url( 'https://seosthemes.com/auto-store/' ); ?>" title="<?php esc_attr_e( 'Auto Store Pro', 'auto-store' ); ?>" target="_blank">
						<?php _e( 'Pro Feature', 'auto-store' ); ?>
						</a>
						<br /><br /><a href="<?php echo esc_url( 'https://seosthemes.info/auto-store-wordpress-theme/' ); ?>" title="<?php esc_attr_e( 'Check demo here.', 'auto-store' ); ?>" target="_blank">
						<?php _e( 'Check demo here.', 'auto-store' ); ?>
						</a>						
				</div>
				<?php
				}
			}
		}
		add_action('customize_register', 'auto_store_support');

		function auto_store_auto_store_customize_styles_seos( $input ) { ?>
			<style type="text/css">
				#customize-theme-controls #accordion-panel-auto_store_buy_panel .accordion-section-title,
				#customize-theme-controls #accordion-panel-auto_store_buy_panel > .accordion-section-title {
					background: #555555;
					color: #FFFFFF;
				}

				.seos-info button a {
					color: #FFFFFF;
				}

				#customize-theme-controls   #accordion-section-auto_store_buy_section .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section1 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section2 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section3 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section4 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section5 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section6 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section7 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section8 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section9 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section10 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section11 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section12 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section13 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section14 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section15 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section16 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section17 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section18 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section19 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section20 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section21 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section22 .accordion-section-title:after,
				#customize-theme-controls   #accordion-section-auto_store_buy_section23 .accordion-section-title:after {
					font-size: 13px;
					font-weight: bold;
					content: "Premium";
					float: right;
					right: 40px;
					position: relative;
					color: #FF0000;
				}			
				
				#_customize-input-seos_setting0 {
					display: none;
				}
				
			</style>
		<?php }
		
		add_action( 'customize_controls_print_styles', 'auto_store_auto_store_customize_styles_seos');

		if ( ! function_exists( 'auto_store_buy' ) ) :
			function auto_store_buy( $wp_customize ) {
			$wp_customize->add_panel( 'auto_store_buy_panel', array(
				'title'			=> __('Auto Store', 'auto-store'),
				'description'	=> __('	Learn more about Auto Store Premium. ','auto-store'),
				'priority'		=> 200,
			));
			
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section0', array(
				'title'			=> __('Auto Store Pro Feature', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	<a href="https://seosthemes.com/auto-store" target="_blank">Auto Store Pro Feature</a><br /><br /> <a target="_blank" href="https://seosthemes.info/auto-store-wordpress-theme/">Check demo here.</a> ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting0', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,'seos_setting0', array(
						'section'	=> 'auto_store_buy_section0',
						'settings'	=> 'seos_setting0',
					)
				)
			);

/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section23', array(
				'title'			=> __('Image Slider', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting23', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting23', array(
						'label'		=> __('Image Slider', 'auto-store'),
						'section'	=> 'auto_store_buy_section23',
						'settings'	=> 'seos_setting23',
					)
				)
			);
			
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section22', array(
				'title'			=> __('Cars Gallery', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting22', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting22', array(
						'label'		=> __('Gallery', 'auto-store'),
						'section'	=> 'auto_store_buy_section22',
						'settings'	=> 'seos_setting22',
					)
				)
			);
			
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section', array(
				'title'			=> __('Footer Slider', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting', array(
						'label'		=> __('Menu Slider', 'auto-store'),
						'section'	=> 'auto_store_buy_section',
						'settings'	=> 'seos_setting',
					)
				)
			);
			
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section1', array(
				'title'			=> __('Contacts', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting1', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting1', array(
						'label'		=> __('Contacts', 'auto-store'),
						'section'	=> 'auto_store_buy_section1',
						'settings'	=> 'seos_setting1',
					)
				)
			);
						
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section2', array(
				'title'			=> __('Animations', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting2', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting2', array(
						'label'		=> __('Animations', 'auto-store'),
						'section'	=> 'auto_store_buy_section2',
						'settings'	=> 'seos_setting2',
					)
				)
			);
									
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section3', array(
				'title'			=> __('All Google Fonts', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting3', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting3', array(
						'label'		=> __('All Google Fonts', 'auto-store'),
						'section'	=> 'auto_store_buy_section3',
						'settings'	=> 'seos_setting3',
					)
				)
			);
												
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section4', array(
				'title'			=> __('Banners', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting4', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting4', array(
						'label'		=> __('Banners', 'auto-store'),
						'section'	=> 'auto_store_buy_section4',
						'settings'	=> 'seos_setting4',
					)
				)
			);
															
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section5', array(
				'title'			=> __('Shortcode Scroll Animation', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting5', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting5', array(
						'label'		=> __('Shortcode Scroll Animation', 'auto-store'),
						'section'	=> 'auto_store_buy_section5',
						'settings'	=> 'seos_setting5',
					)
				)
			);
																		
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section6', array(
				'title'			=> __('Home Page Custom Images', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting6', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting6', array(
						'label'		=> __('About US Section', 'auto-store'),
						'section'	=> 'auto_store_buy_section6',
						'settings'	=> 'seos_setting6',
					)
				)
			);
																					
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section7', array(
				'title'			=> __('Disabel all Comments', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting7', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting7', array(
						'label'		=> __('Disabel all Comments', 'auto-store'),
						'section'	=> 'auto_store_buy_section7',
						'settings'	=> 'seos_setting7',
					)
				)
			);
																								
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section8', array(
				'title'			=> __('Entry Meta', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting8', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting8', array(
						'label'		=> __('Entry Meta', 'auto-store'),
						'section'	=> 'auto_store_buy_section8',
						'settings'	=> 'seos_setting8',
					)
				)
			);
			
																											
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section9', array(
				'title'			=> __('Hide Options', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting9', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting9', array(
						'label'		=> __('Hide All Titles', 'auto-store'),
						'section'	=> 'auto_store_buy_section9',
						'settings'	=> 'seos_setting9',
					)
				)
			);
																														
																																	
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section11', array(
				'title'			=> __('Cars Post Type', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting11', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting11', array(
						'label'		=> __('Testimonials Custom Post Type', 'auto-store'),
						'section'	=> 'auto_store_buy_section11',
						'settings'	=> 'seos_setting11',
					)
				)
			);
																																				
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section12', array(
				'title'			=> __('WooCommerce Colors', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting12', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting12', array(
						'label'		=> __('WooCommerce Colors', 'auto-store'),
						'section'	=> 'auto_store_buy_section12',
						'settings'	=> 'seos_setting12',
					)
				)
			);
			
																																							
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section13', array(
				'title'			=> __('WooCommerce Options', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting13', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting13', array(
						'label'		=> __('WooCommerce Options', 'auto-store'),
						'section'	=> 'auto_store_buy_section13',
						'settings'	=> 'seos_setting13',
					)
				)
			);
																																										
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section14', array(
				'title'			=> __('Footer Options', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting14', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting14', array(
						'label'		=> __('Footer Options', 'auto-store'),
						'section'	=> 'auto_store_buy_section14',
						'settings'	=> 'seos_setting14',
					)
				)
			);
																																													
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section15', array(
				'title'			=> __('Font Sizes', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting15', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting15', array(
						'label'		=> __('Font Sizes', 'auto-store'),
						'section'	=> 'auto_store_buy_section15',
						'settings'	=> 'seos_setting15',
					)
				)
			);
																																																
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section16', array(
				'title'			=> __('Under Construction', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting16', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting16', array(
						'label'		=> __('Under Construction', 'auto-store'),
						'section'	=> 'auto_store_buy_section16',
						'settings'	=> 'seos_setting16',
					)
				)
			);
																																																			
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section17', array(
				'title'			=> __('Read More Button Options', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting17', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting17', array(
						'label'		=> __('Read More Button Options', 'auto-store'),
						'section'	=> 'auto_store_buy_section17',
						'settings'	=> 'seos_setting17',
					)
				)
			);

																																																												
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section20', array(
				'title'			=> __('Back To Top Button Options', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting20', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting20', array(
						'label'		=> __('Back To Top Button Options', 'auto-store'),
						'section'	=> 'auto_store_buy_section20',
						'settings'	=> 'seos_setting20',
					)
				)
			);
		
/******************************************************************************/
		
			$wp_customize->add_section( 'auto_store_buy_section21', array(
				'title'			=> __('Copy Protection', 'auto-store'),
				'panel'			=> 'auto_store_buy_panel',
				'description'	=> __('	Learn more about Auto Store. ','auto-store'),
				'priority'		=> 3,
			));			
			
			$wp_customize->add_setting( 'seos_setting21', array(
				'capability'		=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new seos_Customize(
					$wp_customize,'seos_setting21', array(
						'label'		=> __('Copy Protection', 'auto-store'),
						'section'	=> 'auto_store_buy_section21',
						'settings'	=> 'seos_setting21',
					)
				)
			);			
			
		}
		endif;
		 
		add_action('customize_register', 'auto_store_buy');
		
		
		
