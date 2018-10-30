<?php
/**
 * Theme customizer File
 *
 * @package Akarsh Blog
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;






/**
 * Register theme settings through customizer
 *
 * @package Akarsh Blog
 * @since 1.0
 */
function akarsh_blog_register_customizer_settings( $wp_customize ) {
	
	$default_settings = akarsh_blog_default_settings();

	

	// Add custom header and sidebar background color setting and control.
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => $default_settings['header_background_color'],
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'       => __( 'Header Background Color', 'akarsh-blog' ),
		'section'     => 'colors',
	) ) );


	
	// Navigation link color
	$txtcolors[] = array(
		'slug' 		=> 'menu_bar_link_clr',
		'default' 	=> $default_settings['menu_bar_link_clr'],
		'label' 	=> __('Navigation Bar - Link Color', 'akarsh-blog')
	);
	
	// Navigation link hover color
	$txtcolors[] = array(
		'slug' 		=>'menu_bar_linkh_clr', 
		'default' 	=> $default_settings['menu_bar_linkh_clr'],
		'label' 	=> __('Navigation Bar - Link Hover Color', 'akarsh-blog')
	);
	
	// Site heading color
	$txtcolors[] = array(
		'slug' 		=> 'heading_clr',
		'default' 	=> $default_settings['heading_clr'],
		'label' 	=> __('Heading Color', 'akarsh-blog')
	);

	// Site link color
	$txtcolors[] = array(
		'slug' 		=> 'link_clr', 
		'default' 	=> $default_settings['link_clr'],
		'label' 	=> __('Link Color', 'akarsh-blog')
	);

	// Site link hover color
	$txtcolors[] = array(
		'slug' 		=> 'hover_link_clr', 
		'default' 	=> $default_settings['hover_link_clr'],
		'label' 	=> __('Link Hover Color', 'akarsh-blog')
	);

	// Website color settings
	foreach( $txtcolors as $txtcolor ) {
	 
		// SETTINGS
		$wp_customize->add_setting(
			$txtcolor['slug'], array(
				'default' 			=> $txtcolor['default'],
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' 		=> 'edit_theme_options'
			));

		// CONTROLS
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $txtcolor['slug'],
				array(
					'label' 	=> $txtcolor['label'], 
					'section' 	=> 'colors',
					'settings' 	=> $txtcolor['slug']
				))
		);
	} // End of foreach
	

	/* Blog Page Settings */
	$wp_customize->add_section( 'blog-sett' , array(
		'title' =>  __( 'Blog Page', 'akarsh-blog' ),
	));

	
	// Add blog layout  excerpt length
	$wp_customize->add_setting( 'blog_excerpt_length', array(
									'sanitize_callback' => 'absint',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_excerpt_length'],
							));

	$wp_customize->add_control( 'blog_excerpt_length', array(		
		'label'    	=> __( 'Excerpt Length', 'akarsh-blog' ),
		'section'    => 'blog-sett',
		'settings'   => 'blog_excerpt_length',
		'type'       => 'number',		
		'description'	=> __('Enter excerpt length eg 40', 'akarsh-blog')
	));

	
	
	// Show/hide date
	$wp_customize->add_setting( 'blog_show_date', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_date'],
							));

	$wp_customize->add_control( 'blog_show_date', array(
		'label'    		=> __( 'Show Post Date', 'akarsh-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'akarsh-blog')
	));

	// Show/hide author
	$wp_customize->add_setting( 'blog_show_author', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_author'],
							));

	$wp_customize->add_control( 'blog_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'akarsh-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'akarsh-blog')
	));
	
	// Show/hide Category
	$wp_customize->add_setting( 'blog_show_cat', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_cat'],
							));

	$wp_customize->add_control( 'blog_show_cat', array(
		'label'    		=> __( 'Show Post Category', 'akarsh-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'akarsh-blog')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'blog_show_comments', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_comments'],
							));

	$wp_customize->add_control( 'blog_show_comments', array(		
		'label'    		=> __( 'Show Post Comments', 'akarsh-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_comments',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post Comments.', 'akarsh-blog')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'blog_show_tags', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['blog_show_tags'],
							));

	$wp_customize->add_control( 'blog_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'akarsh-blog' ),
		'section'    	=> 'blog-sett',
		'settings'  	=> 'blog_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'akarsh-blog')
	));


	/***** Category Page Settings *****/
	$wp_customize->add_section( 'cat-sett' , array(
		'title' =>  __( 'Category Page', 'akarsh-blog' ),
	));

	
	// Show/hide date
	$wp_customize->add_setting( 'cat_show_date', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_date'],
							));

	$wp_customize->add_control( 'cat_show_date', array(		
		'label'    		=> __( 'Show Post Date', 'akarsh-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_date',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post date.', 'akarsh-blog')
	));

	// Show/hide author
	$wp_customize->add_setting( 'cat_show_author', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_author'],
							));

	$wp_customize->add_control( 'cat_show_author', array(		
		'label'    		=> __( 'Show Post Author', 'akarsh-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_author',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post author.', 'akarsh-blog')
	));

	// Show/hide Category
	$wp_customize->add_setting( 'cat_show_cat', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_cat'],
							));

	$wp_customize->add_control( 'cat_show_cat', array(		
		'label'    		=> __( 'Show Post Category', 'akarsh-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_cat',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post category.', 'akarsh-blog')
	));
	
	// Show/hide Comments
	$wp_customize->add_setting( 'cat_show_comments', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_comments'],
							));

	$wp_customize->add_control( 'cat_show_comments', array(		
		'label'    		=> __( 'Show Post Comments', 'akarsh-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_comments',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post Comments.', 'akarsh-blog')
	));
	
	// Show/hide Tags
	$wp_customize->add_setting( 'cat_show_tags', array(
									'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
									'transport'         => 'refresh',
									'default'           => $default_settings['cat_show_tags'],
							));

	$wp_customize->add_control( 'cat_show_tags', array(		
		'label'    		=> __( 'Show Post Tags', 'akarsh-blog' ),
		'section'    	=> 'cat-sett',
		'settings'  	=> 'cat_show_tags',
		'type'       	=> 'checkbox',
		'description' 	=> __('Check this box if you want to show post tags.', 'akarsh-blog')
	));
	
	
	/***** Social Icons Settings *****/
	$wp_customize->add_section( 'wpostheme_general_socials_section', array(
		'title' => __( 'Social Profile', 'akarsh-blog' ),
	));

	// Socials Icons on Header
	$wp_customize->add_setting( 'header_social', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_checkbox',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['header_social'],
									));

	$wp_customize->add_control( 'header_social', array(
										'label'    		  => __( 'Enable Socials Icons on sidebar', 'akarsh-blog' ),
										'section' 		  => 'wpostheme_general_socials_section',
										'type'       	  => 'checkbox',
									));

	

	// Facebook
	$wp_customize->add_setting( 'facebook', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['facebook'],
									));

	$wp_customize->add_control( 'facebook', array(
										'label'    => __( 'Facebook', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Twitter
	$wp_customize->add_setting( 'twitter', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['twitter'],
									));

	$wp_customize->add_control( 'twitter', array(
										'label'    => __( 'Twitter', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',			
									));

	// Linkedin
	$wp_customize->add_setting( 'linkedin', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['linkedin'],
									));

	$wp_customize->add_control( 'linkedin', array(
										'label'    => __( 'Linkedin', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Instagram
	$wp_customize->add_setting( 'instagram', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['instagram'],
									));

	$wp_customize->add_control( 'instagram', array(
										'label'    => __( 'Instagram', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// YouTube
	$wp_customize->add_setting( 'youtube', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['youtube'],
									));

	$wp_customize->add_control( 'youtube', array(
										'label'    => __( 'YouTube', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Behance
	$wp_customize->add_setting( 'behance', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['behance'],
									));

	$wp_customize->add_control( 'behance', array(
										'label'    => __( 'Behance', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));

	// Dribbble
	$wp_customize->add_setting( 'dribbble', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_url',
										'transport'         => 'refresh',
										'default' 			=> $default_settings['dribbble'],
									));

	$wp_customize->add_control( 'dribbble', array(
										'label'    => __( 'Dribbble', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_socials_section',
									));


	/***** Footer Settings *****/
	$wp_customize->add_section( 'wpostheme_general_footer_section', array(
		'title' => __( 'Footer Content', 'akarsh-blog' ),			
	));

	// Footer Copyright
	$wp_customize->add_setting( 'copyright', array(
										'sanitize_callback' => 'akarsh_blog_sanitize_input',
										'default' 			=> $default_settings['copyright'],
										'transport'         => 'refresh',	
									));

	$wp_customize->add_control( 'copyright', array(
										'label'    => __( 'Footer Copyright', 'akarsh-blog' ),
										'section'  => 'wpostheme_general_footer_section',
									));

	/***** Akarsh Blog Pro *****/
	$wp_customize->add_section(
		'akarsh_blog_pro_section', array(
			'title'    => __( 'View PRO Version', 'akarsh-blog' ),
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'akarsh_blog_pro_control', array(
			'sanitize_callback' => 'esc_html',
		)
	);

	
}
add_action( 'customize_register', 'akarsh_blog_register_customizer_settings' );