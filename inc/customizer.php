<?php
/**
 * optimize Theme Customizer
 *
 * @package optimize
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function optimize_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_optimize ) ) {
		$wp_customize->selective_optimize->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'optimize_customize_partial_blogname',
		) );
		$wp_customize->selective_optimize->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'optimize_customize_partial_blogdescription',
		) );
	}
	
	// Theme important links started
   class optimize_Important_Links extends WP_Customize_Control {

      public $type = "optimize-important-links";

      public function render_content() {
      
		 echo '<ul><b>
			<li>' . esc_attr__( '* Fully Mobile Responsive', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Dedicated Option Panel', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Customize Theme Color', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* WooCommerce & bbPress Support', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* SEO Optimized', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Control Individual Meta Option like: Category, date, Author, Tags etc. ', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Full Support', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Google Fonts', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Theme Color Customization', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Custom CSS', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Website Layout', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Select Number of Columns', 'optimize' ) . '</li>
			<li>' . esc_attr__( '* Website Width Control', 'optimize' ) . '</li>
			</b></ul>
		 ';
         $important_links = array(
		 
            'theme-info' => array(
               'link' => esc_url('https://www.insertcart.com/product/optimize-wp-theme/'),
               'text' => __('Optimize Pro', 'optimize'),
            ),
            'support' => array(
               'link' => esc_url('https://www.insertcart.com/contact-us/'),
               'text' => __('Contact us', 'optimize'),
            ),         
			'Documentation' => array(
               'link' => esc_url('https://www.insertcart.com/optimize-theme-documentation-setup-guide/'),
               'text' => __('Documentation', 'optimize'),
            ),			 
         );
         foreach ($important_links as $important_link) {
            echo '<p><a target="_blank" href="' . $important_link['link'] . '" >' . esc_attr($important_link['text']) . ' </a></p>';
         }
               }

   }
      $wp_customize->add_section('optimize_important_links', array(
      'priority' => 1,
      'title' => __('Upgrade to Pro', 'optimize'),
   ));

   $wp_customize->add_setting('optimize_important_links', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'optimize_links_sanitize'
   ));

   $wp_customize->add_control(new optimize_Important_Links($wp_customize, 'important_links', array(
      'section' => 'optimize_important_links',
      'settings' => 'optimize_important_links'
   )));
	
/**************************************************
* Social
***************************************************/
	// Social Icons
	$wp_customize->add_section('optimize_social_section', array(
			'title' => __('Social Icons','optimize'),
			'priority' => 4,
			//	'panel'	=> 'optimize_panel_advance'
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','optimize'),
					'facebook' => __('Facebook','optimize'),
					'twitter' => __('Twitter','optimize'),
					'instagram' => __('Instagram','optimize'),
					'linkedin' => __('Linkedin','optimize'),
					'vine' => __('Vine','optimize'),
					'vimeo' => __('Vimeo','optimize'),
					'youtube' => __('Youtube','optimize'),
					'snapchat' => __('Snapchat','optimize'),
					'pinterest' => __('Pinterest','optimize'),
					'reddit' => __('Reddit','optimize'),
					'vk' => __('VK','optimize'),
					'tumblr' => __('Tumblr','optimize'),
					'flickr' => __('Flickr','optimize'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'optimize_social_'.$x, array(
				'sanitize_callback' => 'optimize_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'optimize_social_'.$x, array(
					'settings' => 'optimize_social_'.$x,
					'label' => __('Icon ','optimize').$x,
					'section' => 'optimize_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'optimize_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'optimize_social_url'.$x, array(
					'settings' => 'optimize_social_url'.$x,
					'description' => __('Icon ','optimize').$x.__(' Url','optimize'),
					'section' => 'optimize_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function optimize_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'instagram',
					'linkedin',
					'vine',
					'vimeo',
					'youtube',
					'snapchat',
					'pinterest',
					'reddit',
					'vk',
					'tumblr',
					'flickr'
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}	
	
	
	
}
add_action( 'customize_register', 'optimize_customize_register' );

/**
 * Render the site title for the selective optimize partial.
 *
 * @return void
 */
function optimize_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective optimize partial.
 *
 * @return void
 */
function optimize_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function optimize_customize_preview_js() {
	wp_enqueue_script( 'optimize-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'optimize_customize_preview_js' );
