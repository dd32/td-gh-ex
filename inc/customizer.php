<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 * 
 * AeonBlog Theme Customizer
 *
 * @package AeonBlog
 */
/**
 * AeonBlog Theme Customizer
 *
 * @package AeonBlog
 */
if ( !function_exists('aeonblog_default_theme_options') ) :
    function aeonblog_default_theme_options() {

        $default_theme_options = array(
        	'aeonblog-primary-color'   => '#4ea371',
        	'aeonblog-enable-slider'   => 0, 
        	'aeonblog-slider-category' => 0,
        	'aeonblog-slider-number'   => 2,
        	'aeonblog-sidebar-options' => 'right-sidebar',
        	'aeonblog-sticky-sidebar'  => 1,
        	'aeonblog-read-more-text'  => esc_html__('Read More','aeonblog'), 
        	'aeonblog-blog-meta'       => 1, 
        	'aeonblog-blog-image'      => 1, 
        	'aeonblog-blog-full-image' => 0, 
        	'aeonblog-blog-excerpt'    => 20,
        	'aeonblog-font-url'        => esc_url('//fonts.googleapis.com/css?family=Open+Sans:300', 'aeonblog'),
            'aeonblog-font-family'     => esc_html__('Open+Sans, serif','aeonblog'),
            'aeonblog-font-size'       => 16,
            'aeonblog-font-line-height'=> 2,
            'aeonblog-letter-spacing'  => 0,
            'aeonblog-copyright-text'  => esc_html__('All Right Reserved 2019','aeonblog'),
            'aeonblog-go-to-top'       => 1,
            'aeonblog-breadcrumb-option'=> 1, 
            'aeonblog-social-icons'    => 0,
            'aeonblog-pagination-type' => 'numeric',
            'aeonblog-related-post'    => 1,
        );
        return apply_filters( 'aeonblog_default_theme_options', $default_theme_options );
    }
endif;

/**
 *  Get theme options
 *
 * @since AeonBlog 1.0.0
 *
 * @param null
 * @return array aeonblog_get_theme_options
 *
 */
if ( !function_exists('aeonblog_get_theme_options') ) :
    function aeonblog_get_theme_options() {

        $aeonblog_default_theme_options = aeonblog_default_theme_options();
        
    
        $aeonblog_get_theme_options = get_theme_mod( 'aeonblog_theme_options');
        if( is_array( $aeonblog_get_theme_options )){
            return array_merge( $aeonblog_default_theme_options, $aeonblog_get_theme_options );
        }
        else{
            return $aeonblog_default_theme_options;
        }

    }
endif;


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aeonblog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'aeonblog_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'aeonblog_customize_partial_blogdescription',
		) );
	}


	$default = aeonblog_default_theme_options();

        $wp_customize->add_panel( 'aeonblog_panel', array(
	        'priority' => 10,
	        'capability' => 'edit_theme_options',
	        'title' => __( 'AeonBlog Theme Options', 'aeonblog' ),
	    ) );

	    /* Primary Color Section Inside Core Color Option */
	    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-primary-color]',
	    	    array(
	    	        'default'           => $default['aeonblog-primary-color'],
	    	        'sanitize_callback' => 'sanitize_hex_color',
	    	    )
	    	);
	    	$wp_customize->add_control(
	    	    new WP_Customize_Color_Control(	    	        
	    	        $wp_customize,
	    	        'aeonblog_theme_options[aeonblog-primary-color]',
	    	        array(
	    	            'label'       => esc_html__( 'Primary Color', 'aeonblog' ),
	    	            'description' => esc_html__( 'Applied to main color of site.', 'aeonblog' ),
	    	            'section'     => 'colors',  
	    	        )
	    	    )
	    	);

	    	/*Slider Options*/
	    	$wp_customize->add_section( 'aeonblog_featured_slider_section', array(
	    	    'priority'       => 10,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Slider Options', 'aeonblog' ),
	    	    'panel' 		 => 'aeonblog_panel',
	    	) );

		    	/*callback functions slider*/
				if ( !function_exists('aeonblog_slider_active_callback') ) :
				    function aeonblog_slider_active_callback(){
				        global $aeonblog_theme_options;
						$enable_slider = absint($aeonblog_theme_options['aeonblog-enable-slider']); 
				        if( 1 == $enable_slider ){
				            return true;
				        }
				        else{
				            return false;
				        }
				    }
				endif;

		    	/*Enable Slider*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-enable-slider]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-enable-slider'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-enable-slider]', array(
		    	    'label'     => __( 'Enable Slider', 'aeonblog' ),
		    	    'description' => __('Checked to Enable Slider in Home Page.', 'aeonblog'),
		    	    'section'   => 'aeonblog_featured_slider_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-enable-slider]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );

			    /*Slider Category Selection*/

		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-slider-category]', array(
		            'capability'        => 'edit_theme_options',
		            'transport' => 'refresh',
		            'default'           => $default['aeonblog-slider-category'],
		            'sanitize_callback' => 'absint'
		        ) );

		        $wp_customize->add_control(
		            new AeonBlog_Customize_Category_Dropdown_Control(
		                $wp_customize,
		                'aeonblog_theme_options[aeonblog-slider-category]',
		                array(
		                    'label'     => __( 'Select Category For Slider', 'aeonblog' ),
		                    'description' => __('From the dropdown select the category for the slider. Category having post will display in below dropdown.', 'aeonblog'),
		                    'section'   => 'aeonblog_featured_slider_section',
		                    'settings'  => 'aeonblog_theme_options[aeonblog-slider-category]',
		                    'type'      => 'category_dropdown',

		                    'priority'  => 10,
		                    'active_callback'=> 'aeonblog_slider_active_callback',
		                )
		            )
		        );

		        /*Number of Slider*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-slider-number]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-slider-number'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_number'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-slider-number]', array(
		    	    'label'     => __( 'Number of Slider Item', 'aeonblog' ),
		    	    'description' => __('Select the number for the slider.', 'aeonblog'),
		    	    'section'   => 'aeonblog_featured_slider_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-slider-number]',
		    	    'type'      => 'number',
		    	    'priority'  => 10,
		    	    'input_attrs' => array(
			            'min' => 1,
			            'max' => 5,
			            'step' => 1,
			            ),
		    	    'active_callback'=> 'aeonblog_slider_active_callback',
		    	) );

	    	/*Blog Page Options*/
	    	$wp_customize->add_section( 'aeonblog_blog_section', array(
	    	    'priority'       => 10,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Blog Section Options', 'aeonblog' ),
	    	    'panel' 		 => 'aeonblog_panel',
	    	) );

		    	/*Sidebar Options*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-sidebar-options]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'default'           => $default['aeonblog-sidebar-options'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_select'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-sidebar-options]', array(
		    	    'choices'       => array(
		    	                    'right-sidebar'         => __('Right Sidebar','aeonblog'),
		    	                    'left-sidebar'          => __('Left Sidebar','aeonblog'),
		    	                    'no-sidebar'        => __('No Sidebar','aeonblog'),
		    	                    'middle-column'        => __('Middle Column','aeonblog'),

		    	    ),
		    	    'label'         => __( 'Sidebar Option', 'aeonblog' ),
		    	    'description'   => __( 'You can manage the individual sidebar for single post from Post Template.', 'aeonblog' ),
		    	    'section'       => 'aeonblog_blog_section',
		    	    'settings'      => 'aeonblog_theme_options[aeonblog-sidebar-options]',
		    	    'type'          => 'select'
		    	) );
		    	/*Read More Text*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-read-more-text]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-read-more-text'],
		    	    'sanitize_callback' => 'sanitize_text_field'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-read-more-text]', array(
		    	    'label'     => __( 'Read More Text', 'aeonblog' ),
		    	    'description' => __('Enter Your Custom Read More Text', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-read-more-text]',
		    	    'type'      => 'text',
		    	    'priority'  => 10
		    	) );
		    	/*Meta Fields*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-blog-meta]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-blog-meta'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-blog-meta]', array(
		    	    'label'     => __( 'Meta Options', 'aeonblog' ),
		    	    'description' => __('Check to hide the date, category, tags etc on blog page.', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-blog-meta]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );
		    	/*Featured Image*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-blog-image]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-blog-image'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-blog-image]', array(
		    	    'label'     => __( 'Featured Image', 'aeonblog' ),
		    	    'description' => __('Check to hide the featured Image.', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-blog-image]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );
		    	/*Full Image*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-blog-full-image]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-blog-full-image'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-blog-full-image]', array(
		    	    'label'     => __( 'Large Image', 'aeonblog' ),
		    	    'description' => __('Check to make the image Large.', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-blog-full-image]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );
		    	/*Excerpt Length*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-blog-excerpt]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-blog-excerpt'],
		    	    'sanitize_callback' => 'absint'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-blog-excerpt]', array(
		    	    'label'     => __( 'Enter excerpt length', 'aeonblog' ),
		    	    'description' => __('Enter the lenght of excerpt.', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-blog-excerpt]',
		    	    'type'      => 'number',
		    	    'priority'  => 10,
		    	    'input_attrs' => array(
			            'min' => -1,
			            'max' => 50,
			            'step' => 1,
			        ),
		    	) );
		    	/*Enable Sticky Sidebar*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-sticky-sidebar]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-sticky-sidebar'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-sticky-sidebar]', array(
		    	    'label'     => __( 'Sticky Sidebar', 'aeonblog' ),
		    	    'description' => __('Enable Sidebar Sticky', 'aeonblog'),
		    	    'section'   => 'aeonblog_blog_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-sticky-sidebar]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );
		    /*Typography Options */		        
	        $wp_customize->add_section('aeonblog_typography_section', array(
	        	'title'    => __( 'Typography Options', 'aeonblog' ),
	        	'priority' => 10,
	        	'panel' => 'aeonblog_panel'
	        ));
		    /*Font URL */	
		        $wp_customize->add_setting('aeonblog_theme_options[aeonblog-font-url]', array(
		        	'default' =>  $default['aeonblog-font-url'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'esc_url_raw'
		        ));
		        
		        $wp_customize->add_control('aeonblog_theme_options[aeonblog-font-url]', array(
		        	 'label' => __('Google Font URL', 'aeonblog'),
		        	 'section' => 'aeonblog_typography_section',
		        	 'type'    => 'url',
		        	 'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
		        		__( 'Insert', 'aeonblog' ),
		        		esc_url('https://www.google.com/fonts'),
		        		__('Enter Google Font URL' , 'aeonblog'),
		        		__('to add google Font.' ,'aeonblog')
		        		),
		        	
		        ));
		        /*Font Name */	
		        $wp_customize->add_setting('aeonblog_theme_options[aeonblog-font-family]', array(
		        	'default' => $default['aeonblog-font-family'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'sanitize_text_field',
		        	'settings'=>'aeonblog_theme_options[aeonblog-font-url]'
		        ));
		        
		        $wp_customize->add_control('aeonblog_theme_options[aeonblog-font-family]', array(
		        	 'label' => __('Font Family', 'aeonblog'),
		        	 'section' => 'aeonblog_typography_section',
		        	 'type'    => 'text',
		        	 'description' => __( 'Insert Google Font Family Name.', 'aeonblog' ),
		        	
		        ));
		        /*Font Size*/	
		        $wp_customize->add_setting('aeonblog_theme_options[aeonblog-font-size]', array(
		        	'default' => $default['aeonblog-font-size'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'aeonblog_sanitize_number',
		        	'settings'=>'aeonblog_theme_options[aeonblog-font-size]'
		        ));
		        
		        $wp_customize->add_control('aeonblog_theme_options[aeonblog-font-size]', array(
		        	'label' => __('Font Size', 'aeonblog'),
		        	'section' => 'aeonblog_typography_section',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Font Size.', 'aeonblog' ),
		        	'input_attrs' => array(
		        		'min' => 10,
		        		'max' => 30,
		        		'step' => 1,
		        	),
		        ));
		        
		        /*Line Height */	
		        $wp_customize->add_setting('aeonblog_theme_options[aeonblog-font-line-height]', array(
		        	'default'     => $default['aeonblog-font-line-height'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'aeonblog_sanitize_number',
		        	'settings'=>'aeonblog_theme_options[aeonblog-font-line-height]'
		        ));
		        
		        $wp_customize->add_control('aeonblog_theme_options[aeonblog-font-line-height]', array(
		        	'label' => __('Line Height', 'aeonblog'),
		        	'section' => 'aeonblog_typography_section',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Line Height.', 'aeonblog' ),
		        	'input_attrs' => array(
		        		'min' => '0',
		        		'max' => '4',
		        		'step' => '0.1',
		        	),
		        ));
		        /*Letter Spacing */	
		        $wp_customize->add_setting('aeonblog_theme_options[aeonblog-letter-spacing]', array(
		        	'default' => $default['aeonblog-letter-spacing'],
		        	'transport'   => 'refresh',
		        	'sanitize_callback' => 'aeonblog_sanitize_number',
		        	'settings'=>'aeonblog_theme_options[aeonblog-font-line-height]',
		        ));
		        
		        $wp_customize->add_control('aeonblog_theme_options[aeonblog-letter-spacing]', array(
		        	'label'   => __('Letter Space', 'aeonblog'),
		        	'section' => 'aeonblog_typography_section',
		        	'type'    => 'number',
		        	'description' => __( 'Increase/Decrease Letter Space.', 'aeonblog' ),
		        	'input_attrs' => array(
		        		'min' => '-20',
		        		'max' => '4',
		        		'step' => '1',
		        	),
		        ));

		    /*Footer*/
	    	$wp_customize->add_section( 'aeonblog_footer_section', array(
	    	    'priority'       => 10,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Footer Options', 'aeonblog' ),
	    	    'panel' 		 => 'aeonblog_panel',
	    	) );
		    	/*Copyright Text*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-copyright-text]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-copyright-text'],
		    	    'sanitize_callback' => 'sanitize_text_field'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-copyright-text]', array(
		    	    'label'     => __( 'Copyright Text', 'aeonblog' ),
		    	    'description' => __('Enter your own copyright Text.', 'aeonblog'),
		    	    'section'   => 'aeonblog_footer_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-copyright-text]',
		    	    'type'      => 'text',
		    	    'priority'  => 10
		    	) );

		    	/*Go to Top*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-go-to-top]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-go-to-top'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-go-to-top]', array(
		    	    'label'     => __( 'Go To Top', 'aeonblog' ),
		    	    'description' => __('Enable/Disable go to top on footer.', 'aeonblog'),
		    	    'section'   => 'aeonblog_footer_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-go-to-top]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 11
		    	) );

		    	/*Social Icons*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-social-icons]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-social-icons'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-social-icons]', array(
		    	    'label'     => __( 'Social Icons', 'aeonblog' ),
		    	    'description' => __('Enable Social Icons. Make Social Menu from Appearance > Menus First.', 'aeonblog'),
		    	    'section'   => 'aeonblog_footer_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-social-icons]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 11
		    	) );


		    /*Extras*/
	    	$wp_customize->add_section( 'aeonblog_extra_section', array(
	    	    'priority'       => 10,
	    	    'capability'     => 'edit_theme_options',
	    	    'theme_supports' => '',
	    	    'title'          => __( 'Extra Options', 'aeonblog' ),
	    	    'panel' 		 => 'aeonblog_panel',
	    	) );
		    	/*Breadcrumb Options*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-breadcrumb-option]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-breadcrumb-option'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-breadcrumb-option]', array(
		    	    'label'     => __( 'Breadcrumb Option', 'aeonblog' ),
		    	    'description' => __('Show hide breadcrumb.', 'aeonblog'),
		    	    'section'   => 'aeonblog_extra_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-breadcrumb-option]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );

		    	/*Pagination Options*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-pagination-type]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'default'           => $default['aeonblog-pagination-type'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_select'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-pagination-type]', array(
		    	    'choices' => array(
	                    'default'         => __('Default Pagination','aeonblog'),
	                    'numeric'          => __('Numeric','aeonblog'),
		    	    ),
		    	    'label'         => __( 'Pagination Option', 'aeonblog' ),
		    	    'description'   => __( 'Select the Required Pagination Type.', 'aeonblog' ),
		    	    'section'       => 'aeonblog_extra_section',
		    	    'settings'      => 'aeonblog_theme_options[aeonblog-pagination-type]',
		    	    'type'          => 'select'
		    	) );

		    	/*Related Post Options*/
		    	$wp_customize->add_setting( 'aeonblog_theme_options[aeonblog-related-post]', array(
		    	    'capability'        => 'edit_theme_options',
		    	    'transport' 		=> 'refresh',
		    	    'default'           => $default['aeonblog-related-post'],
		    	    'sanitize_callback' => 'aeonblog_sanitize_checkbox'
		    	) );
		    	$wp_customize->add_control( 'aeonblog_theme_options[aeonblog-related-post]', array(
		    	    'label'     => __( 'Related Post Option', 'aeonblog' ),
		    	    'description' => __('Enable Related Post on Single Post.', 'aeonblog'),
		    	    'section'   => 'aeonblog_extra_section',
		    	    'settings'  => 'aeonblog_theme_options[aeonblog-related-post]',
		    	    'type'      => 'checkbox',
		    	    'priority'  => 10
		    	) );
}
add_action( 'customize_register', 'aeonblog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aeonblog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aeonblog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aeonblog_customize_preview_js() {
	wp_enqueue_script( 'aeonblog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aeonblog_customize_preview_js' );

