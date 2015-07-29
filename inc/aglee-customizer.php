<?php

/** customizer start ***/

function aglee_lite_customizer( $wp_customize ) {
    $wp_customize->add_panel( 
        'aglee_lite_general_panel',
         array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'General Panel', 'textdomain' ),
            'description' => __( 'Default section provided by wordpress customizer.', 'textdomain' ),
        ) 
    );  
    
    $wp_customize->get_section( 'colors' )->panel         = 'aglee_lite_general_panel';
    $wp_customize->get_section( 'background_image' )->panel         = 'aglee_lite_general_panel';
    $wp_customize->get_section( 'nav' )->panel         = 'aglee_lite_general_panel';
    $wp_customize->get_section( 'static_front_page' )->panel         = 'aglee_lite_general_panel';  
    

/**
 * 
 * Adding Heading Setting Panel in customizer
 * 
 */
    $wp_customize->add_panel( 
        'header_setting',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Header Setting', 'textdomain' ),
        ) 
    );
    
    $wp_customize->get_section( 'title_tagline' )->panel         = 'header_setting';
    $wp_customize->get_section( 'header_image' )->panel         = 'header_setting';

    
    $wp_customize->add_section(
        'header_text_disp_option',
        array(
            'title' => 'Header Display Option',
            'priority' => 60,
            'panel' => 'header_setting'
        )
    );
    
    $wp_customize->add_setting(
        'header_text_image_display',
        array(
            'default' => 'show_both',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_header_part_option',
        )
    );    
    
    // function to get webpage sanitize
        function sanitize_header_part_option($input) {
    		$valid_keys = array(
    			'header_logo_only' => __('header_logo_only', 'aglee-lite'),
    			'header_text_only' => __('header_text_only', 'aglee-lite'),
                'show_both' => __('show_both', 'aglee-lite'),
                'disable' => __('disable', 'aglee-lite')
    			);
    		if ( array_key_exists( $input, $valid_keys)) {
    			return $input;
    		} else {
    			return '';
    		}
	   }
    
    $wp_customize->add_control(
        'header_text_image_display',
        array(
            'section' => 'header_text_disp_option',
            'label' => 'Show',
            'type' => 'radio',
            'choices' => array(
                            'header_logo_only' => 'Header Logo Only',
                            'header_text_only' => 'Header Text Only',
                            'show_both' => 'Show Both',
                            'disable' => 'Hide Both'
                        )
        )
    );
    
    //Favicon selection
    $wp_customize->add_section( 
        'favicon' , 
        array(
            'title'       => 'Upload Favicon',
            'priority'    => 60,
            'description' => 'Upload favicon(.png) with size of 16px X 16px',
            'panel' => 'header_setting',
        ) 
    );
    
    $wp_customize->add_setting(
        'aglee_lite_favicon',
        array(
            'sanitize_callback' => 'esc_url_raw',   
        )
    );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aglee_lite_favicon', array(
        'label'    => 'Upload Image',
        'section'  => 'favicon',
        'settings' => 'aglee_lite_favicon',
        ) 
    ));
    
    // to display or hide favicon
    $wp_customize->add_section(
      'favicon_setting_section',
      array(
        'title'=>'Favicon Display Option',
        'priority'=>60,
        'panel'=>'header_setting'
      )  
    );
    
    $wp_customize->add_setting(
      'favicon_setting',
      array(
        'default'=>'',
        'sanitize_callback' => 'sanitize_checkbox'
      )  
    );
    
    $wp_customize->add_control(
        'favicon_setting',
        array(
            'label'=>'Activate the favicon to display it in your site',
            'section'=>'favicon_setting_section',
            'type'=>'checkbox'
        )
    );   
    
// Top header text
    $wp_customize->add_section(
        'header_text_display_section',
        array(
            'title' => 'Top Header Content Options',
            'priorty' => 60,
            'panel' => 'header_setting'
        )
    );
    
    $wp_customize->add_setting(
        'header_text_setting',
        array(
            'default' => 'Call Us: +1-123-123-45-78',
            'sanitize_callback' => 'sanitize_text', 
        )
    );
    
    $wp_customize->add_control(
        'header_text_setting',
        array(
            'section' => 'header_text_display_section',
            'label' => 'Header Right Text',
            'type' => 'textarea'
        )
    );
    
    $wp_customize->add_setting(
        'show_social',
        array(
            'default' => '',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'show_social',
            array(
                'label'=>'Hide Social Icons in Header',
                'section'=>'header_text_display_section',
                'type'=>'checkbox'
            )
    );
    
    $wp_customize->add_setting(
        'show_search',
        array(
            'default'=>'',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'show_search',
        array(
            'label'=>'Hide Search in Header',
            'section'=>'header_text_display_section',
            'type'=>'checkbox'
        )
    );
/** End of header text option section **/        
 
 
    // Footer text
    $wp_customize->add_section(
        'aglee_lite_footertext_section',
        array(
            'title' => 'Footer Text',
            'priority' => 60,
            'panel' => 'header_setting'
        )
    );
    
    $wp_customize->add_setting(
        'aglee_lite_footertext',
        array(
            'default'=>'AgleeLite',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text' 
        )
    );
    
    $wp_customize->add_control(
        'aglee_lite_footertext',
        array(
            'label' => 'Footer Text',
            'section'=>'aglee_lite_footertext_section',
            'type'=>'text'
        )
    ); 
    
/** third pannel design setting **/

/**
 * 
 * Adding Basic Setting Panel in customizer
 * 
 */
    $wp_customize->add_panel( 
        'design_setting',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Design Setting', 'textdomain' ),
        ) 
    );
    
    // Responsive setting checkbox
    $wp_customize->add_section(
        'site_layout_section',
        array(
            'title' => 'Site Layout',
            'description' => 'Site Layout Option',
            'priority' => 10,
            'panel' => 'design_setting',
        )
    );
    
    $wp_customize->add_setting(
        'site_layout_setting',
        array(
            'default' => 'full_width',
            'sanitize_callback' => 'webpage_layout_radio_sanitize',
            )
    );
    
    $wp_customize -> add_control(
        'site_layout_setting',
        array(
            'label' => 'Site Layout',
            'section' => 'site_layout_section',
            'type' => 'radio',
            'choices' => array(
                            'full_width' => 'Fullwidth',
                            'boxed' => 'Boxed',
                        )
        )
    );
    
        // function to get webpage sanitize
        function webpage_layout_radio_sanitize($input) {
    		$valid_keys = array(
    			'fullwidth' => __('fullwidth', 'aglee-lite'),
    			'boxed' => __('boxed', 'aglee-lite')
    			);
    		if ( array_key_exists( $input, $valid_keys)) {
    			return $input;
    		} else {
    			return '';
    		}
	   }
       
    // pattern selection for box layout
        $wp_customize->add_section(
        'site_pattern_section',
        array(
            'title' => 'Background Image',
            'description' => 'Select Box layout above to use this functionality
                              <ul>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/pattern0.png"/><span>None</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/pattern1.png"/><span>Pattern 1</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/pattern3.png"/><span>Pattern 2</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/pattern4.png"/><span>Pattern 3</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/pattern5.png"/><span>Pattern 4</span></li>
                              </ul>
                            ',
            'priority' => 10,
            'panel' => 'design_setting',
        )
    );
    
    $wp_customize->add_setting(
        'site_pattern_setting',
        array(
            'default' => 'pattern0',
            'sanitize_callback' => 'webpage_pattern_radio_sanitize',
            )
    );
    
    $wp_customize -> add_control(
        'site_pattern_setting',
        array(
            'label' => 'Site Layout',
            'section' => 'site_pattern_section',
            'type' => 'radio',
            'choices' => array(
                            'pattern0' => 'None',
                            'pattern1' => 'Pattern 1',
                            'pattern3' => 'Pattern 2',
                            'pattern4' => 'Pattern 3',
                            'pattern5' => 'Pattern 4',
                        )
        )
    );
    
        // function to get webpage sanitize
        function webpage_pattern_radio_sanitize($input) {
    		$valid_keys = array(
    			'pattern0' => __('pattern0', 'aglee-lite'),
    			'pattern1' => __('pattern1', 'aglee-lite'),
                'pattern3' => __('pattern3', 'aglee-lite'),
    			'pattern4' => __('pattern4', 'aglee-lite'),
                'pattern5' => __('pattern5', 'aglee-lite'),
    			);
    		if ( array_key_exists( $input, $valid_keys)) {
    			return $input;
    		} else {
    			return '';
    		}
	   }
    
    
    
    //Layout of category/blog
    $wp_customize -> add_section(
        'layout_category_blog_section',
        array(
            'title' => 'Default Layout (Category/Blog)',
            'description' => '<ul>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/left-sidebar.png"/><span>Left Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/right-sidebar.png"/><span>Right Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/both-sidebar.png"/><span>Both Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-wide.png"/><span>No Sidebar Wide</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-narrow.png"/><span>No Sidebar Narrow</span></li>
                              </ul>',
            'priority' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize -> add_setting(
        'layout_category_blog',
        array(
            'default' => 'no_sidebar_wide',
            'transport' => 'refresh',
            'sanitize_callback' => 'webpage_sanitize_category_blog'
        )
    );
    
    $wp_customize -> add_control(
        'layout_category_blog',
        array(
            'label' => 'Default Layout (Category/Blog)',
            'section' => 'layout_category_blog_section',
            'type' => 'radio',
            'choices' => array(
                            'left_sidebar' => 'Left Sidebar',
                            'right_sidebar' => 'Right Sidebar',
                            'both_sidebar' => 'Both Sidebar',
                            'no_sidebar_wide' => 'No Sidebar Wide',
                            'no_sidebar_narrow' => 'No Sidebar Narrow'
                        )
        )
    );
    
 
     //Layout of Default Layout page only
    $wp_customize -> add_section(
        'layout_default_page_section',
        array(
            'title' => 'Default Layout (Pages Only)',
            'description' => '<ul>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/left-sidebar.png"/><span>Left Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/right-sidebar.png"/><span>Right Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/both-sidebar.png"/><span>Both Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-wide.png"/><span>No Sidebar Wide</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-narrow.png"/><span>No Sidebar Narrow</span></li>
                              </ul>',
            'priority' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize -> add_setting(
        'layout_default_page',
        array(
            'default' => 'no_sidebar_wide',
            'transport' => 'refresh',
            'sanitize_callback' => 'webpage_sanitize_category_blog'
        )
    );
    
    $wp_customize -> add_control(
        'layout_default_page',
        array(
            'label' => 'Default Layout (Pages Only)',
            'section' => 'layout_default_page_section',
            'type' => 'radio',
            'choices' => array(
                            'left_sidebar' => 'Left Sidebar',
                            'right_sidebar' => 'Right Sidebar',
                            'both_sidebar' => 'Both Sidebar',
                            'no_sidebar_wide' => 'No Sidebar Wide',
                            'no_sidebar_narrow' => 'No Sidebar Narrow'
                        )
        )
    );
    
     //Layout of Default Layout post
    $wp_customize -> add_section(
        'layout_default_post_section',
        array(
            'title' => 'Default Layout (Post Only)',
            'description' => '<ul>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/left-sidebar.png"/><span>Left Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/right-sidebar.png"/><span>Right Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/both-sidebar.png"/><span>Both Sidebar</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-wide.png"/><span>No Sidebar Wide</span></li>
                                <li><img src="'. get_template_directory_uri(). '/inc/admin-panel/images/no-sidebar-narrow.png"/><span>No Sidebar Narrow</span></li>
                              </ul>',
            'priority' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize -> add_setting(
        'layout_default_post',
        array(
            'default' => 'no_sidebar_wide',
            'transport' => 'refresh',
            'sanitize_callback' => 'webpage_sanitize_category_blog'
        )
    );
    
    $wp_customize -> add_control(
        'layout_default_post',
        array(
            'label' => 'Default Layout (Post Only)',
            'section' => 'layout_default_post_section',
            'type' => 'radio',
            'choices' => array(
                            'left_sidebar' => 'Left Sidebar',
                            'right_sidebar' => 'Right Sidebar',
                            'both_sidebar' => 'Both Sidebar',
                            'no_sidebar_wide' => 'No Sidebar Wide',
                            'no_sidebar_narrow' => 'No Sidebar Narrow'
                        )
        )
    );   
    
        // function to get webpage sanitize
        function webpage_sanitize_category_blog($input) {
    		$valid_keys = array(
    			'no_sidebar_wide' => __('no_sidebar_wide', 'ap-basic'),
    			'left_sidebar' => __('left_sidebar', 'ap-basic'),
                'right_sidebar' => __('right_sidebar', 'ap-basic'),
                'both_sidebar' => __('both_sidebar', 'ap-basic'),
                'no_sidebar_narrow' => __('no_sidebar_narrow', 'ap-basic'),
    			);
    		if ( array_key_exists( $input, $valid_keys)) {
    			return $input;
    		} else {
    			return '';
    		}
	   }

       
    /* to enable and disable footer featured widget */

    $wp_customize->add_section(
        'footer_widget_section',
        array(
            'title' => 'Enable/Disable (Footer Featured Widgets)',
            'priorty' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize->add_setting(
        'footer_widget',
        array(
            'default' => '',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'footer_widget',
            array(
                'label'=>'Show Footer Featured Widget Section',
                'section'=>'footer_widget_section',
                'type'=>'checkbox'
            )
    );
    
    /* to enable and disable page comment */

    $wp_customize->add_section(
        'page_comment_section',
        array(
            'title' => 'Enable/Disable (Page Comments)',
            'priorty' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize->add_setting(
        'page_comment',
        array(
            'default' => '',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'page_comment',
            array(
                'label'=>'Show Comments in Page',
                'section'=>'page_comment_section',
                'type'=>'checkbox'
            )
    );
    
    /* to enable and disable post comment */

    $wp_customize->add_section(
        'post_comment_section',
        array(
            'title' => 'Enable/Disable (Post Comments)',
            'priorty' => 10,
            'panel' => 'design_setting'
        )
    );
    
    $wp_customize->add_setting(
        'post_comment',
        array(
            'default' => '',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'post_comment',
            array(
                'label'=>'Show Comments in Post',
                'section'=>'post_comment_section',
                'type'=>'checkbox'
            )
    );
    
/**
 * 
 * Adding Slider Setting Panel in customizer
 * 
 */
    $wp_customize->add_panel( 
        'slider_setting_pannel',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Slider Settings', 'textdomain' ),
        ) 
    );
    
    // Slider type option post as a slider or category as a slider ..........................
    $wp_customize->add_section(
        'slider_type',
        array(
            'title' => 'Slider Settings',
            'priority' => 20,
            'panel' => 'slider_setting_pannel',
        )
    );
    
    $wp_customize->add_setting(
        'slider_type_choose',
        array(
            'default' => 'option1',
            'sanitize_callback' => 'slider_choose_radio_sanitize'
            )
    );
    
    $wp_customize->add_control(
        'slider_type_choose',
        array(
            'label' => 'Choose Slider Type',
            'section' => 'slider_type',
            'type' => 'radio',
            'choices' => array(
                             'option1' => 'Single Posts as a Slider',
                             'option2' => 'Category Posts as a Slider'
                             )
        )
    );
    
    function slider_choose_radio_sanitize($input) {
		$valid_keys = array(
			'option1' => __('option1', 'aglee-lite'),
			'option2' => __('option2', 'aglee-lite')
			);
		if ( array_key_exists( $input, $valid_keys)) {
			return $input;
		} else {
			return 'option1';
		}
	}
    
    
    //Slider Post Choose options ..................
    $wp_customize->add_section(
        'slider_page_choose_section',
        array(
            'title' => 'Slider Selection(Posts)',
            'priority' => 20,
            'description' => 'Enable single post as slider in slider setting section.',
            'panel' => 'slider_setting_pannel',
        )
    );
    
    $wp_customize->add_setting(
        'slider_one',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general',
            )
    );
    $wp_customize->add_control( new Post_Dropdown( $wp_customize, 'slider_one',
        array(
            'label' => 'Choose Slider 1',
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    $wp_customize->add_setting(
        'slider_two',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general',
            )
    );
    $wp_customize->add_control( new Post_Dropdown( $wp_customize, 'slider_two',
        array(
            'label' => 'Choose Slider 2',
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    $wp_customize->add_setting(
        'slider_three',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general',
            )
    );
    $wp_customize->add_control( new Post_Dropdown( $wp_customize, 'slider_three',
        array(
            'label' => 'Choose Slider 3',
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    $wp_customize->add_setting(
        'slider_four',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general',
            )
    );
    $wp_customize->add_control( new Post_Dropdown( $wp_customize, 'slider_four',
        array(
            'label' => 'Choose Slider 4',
            'section' => 'slider_page_choose_section',
            'type' => 'select',
        )
    ) );
    
    //slider category choose
    $wp_customize->add_section(
        'slider_category_choose_section',
        array(
            'title' => 'Slider Selection(Category)',
            'priority' => 20,
            'description' => 'Enable category as slider in slider setting section.',
            'panel' => 'slider_setting_pannel',
        )
    );
    
    $wp_customize->add_setting(
        'slider_category',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general'
            )
    );
    
    $wp_customize->add_control( new Category_Dropdown( $wp_customize, 'slider_category',
        array(
            'label' => '',
            'section' => 'slider_category_choose_section',
            'type' => 'select',
        )
    ) );   
    
    
    // slider display option
    $wp_customize->add_section(
        'slider_show_option',
        array(
            'title' => 'Show Slider',
            'priorty' => 20,
            'panel' => 'slider_setting_pannel'
        )
    );
    
    $wp_customize->add_setting(
        'slider_setting',
        array(
            'default' => '',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'slider_setting',
            array(
                'label'=>'Show Slider',
                'section'=>'slider_show_option',
                'type'=>'checkbox'
            )
    );
    

    
    // slider display setting in single page
    $wp_customize -> add_section(
        'slider_show_post_section',
        array(
            'title' => 'Enable/Disable slider (Post Page)',
            'priority' => 30,
            'panel' => 'slider_setting_pannel'
        )
    );
    
    $wp_customize -> add_setting(
        'slider_show_post',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize -> add_control(
        'slider_show_post',
        array(
            'label' => 'Enable Slider in Post',
            'section' => 'slider_show_post_section',
            'type' =>'checkbox',
        )
    );
    
    // for slider mode change
    $wp_customize -> add_section(
        'slider_mode_section',
        array(
            'title' => 'Slider Mode',
            'priority' => 30,
            'panel' => 'slider_setting_pannel'
        )
    );
    
    $wp_customize -> add_setting(
        'slider_mode_setting',
        array(
            'default' => 'horizontal',
            'transport' => 'refresh',
            'sanitize_callback' => 'aglee_lite_san_slidermode'
            
        )
    );
    
    
        function aglee_lite_san_slidermode ($input){
        		$valid_keys = array(
        			'horizontal' => __('horizontal', 'ap-basic'),
        			'fade' => __('fade', 'ap-basic'),
        			);
        		if ( array_key_exists( $input, $valid_keys)) {
        			return $input;
        		} else {
        			return '';
        		}
        }
    $wp_customize -> add_control(
        'slider_mode_setting',
        array(
            'label' => 'Slider Mode',
            'section' => 'slider_mode_section',
            'type' => 'radio',
            'choices' => array(
                            'horizontal' => 'Horizontal',
                            'fade' => 'Fade'
                        )
        )
    );
    
    
    // Hide readmore in home slider
    $wp_customize->add_section(
        'homeslider_readmore_show_option',
        array(
            'title' => 'Readmore Display Option',
            'priorty' => 20,
            'panel' => 'slider_setting_pannel'
        )
    );
    
    $wp_customize->add_setting(
        'readmore_slider_setting',
        array(
            'default' => '0',
            'transport'=>'refresh',
            'sanitize_callback' => 'sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'readmore_slider_setting',
            array(
                'label'=>'Click To Hide Readmore In Slider',
                'section'=>'homeslider_readmore_show_option',
                'type'=>'checkbox'
            )
    );
    
    
    /** Testimonial panel **/
       $wp_customize -> add_panel(
        'testimonial_select_panel',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __('Testimonial Slider', 'textdomain')
        )
       ); 
    
    // choose category of slider   
    $wp_customize->add_section(
        'testimonial_category_choose_section',
        array(
            'title' => 'Slider Selection(Category)',
            'priority' => 20,
            'description' => 'Choose Category for testimonial slider',
            'panel' => 'testimonial_select_panel',
        )
    );
    
    $wp_customize->add_setting(
        'slider_testimonial_category',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general'
            )
    );
    
    $wp_customize->add_control( new Category_Dropdown( $wp_customize, 'slider_testimonial_category',
        array(
            'label' => '',
            'section' => 'testimonial_category_choose_section',
            'type' => 'select',
        )
    ) ); 
    /**  end of testimonial panel **/       
      
       
    /** For Blog page selection **/
    
    $wp_customize -> add_panel( 
        'blogpage_setting_pannel',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Blog Page Option', 'textdomain' ),
        ) 
      );
      
      $wp_customize -> add_section(
        'blog_category_select_section',
        array(
            'title' => 'Choose Category To Use As Blog',
            'priority' => 30,
            'panel' => 'blogpage_setting_pannel'
        )        
      );
      
      $wp_customize -> add_setting(
        'blog_category_select_setting',
        array(
            'sanitize_callback' => 'aglee_sanitize_dropdown_general'
        )
      );
      
      $wp_customize -> add_control(new Category_Dropdown( $wp_customize, 'blog_category_select_setting',
        array(
            'label' => '',
            'section' => 'blog_category_select_section',
            'type' => 'select',
        )
    ));      
    
    
      // Blog Post display Layout
    $wp_customize -> add_section(
        'blog_post_layout_section',
        array(
            'title' => 'Blog Post Display Layout',
            'description' => '',
            'priority' => 10,
            'panel' => 'blogpage_setting_pannel'
        )
    );
    
    $wp_customize -> add_setting(
        'blog_post_layout',
        array(
            'default' => 'blog_image_large',
            'sanitize_callback' => 'webpage_sanitize_blog_layout',
            'transport' => 'refresh'
        )
    );
    
    $wp_customize -> add_control(
        'blog_post_layout',
        array(
            'label' => 'Blog Posts Display Layout',
            'section' => 'blog_post_layout_section',
            'type' => 'radio',
            'choices' => array(
                            'blog_image_large' => 'Blog Image Large',
                            'blog_image_medium' => 'Blog Image Medium',
                            'blog_image_alternate_medium' => 'Blog Image Alternate Medium',
                            'blog_full_content' => 'Blog Full Content'
                        )            
        )
    );
    
    
        // function to get webpage sanitize
        function webpage_sanitize_blog_layout($input) {
    		$valid_keys = array(
    			'blog_image_large' => __('blog_image_large', 'ap-basic'),
    			'blog_image_medium' => __('blog_image_medium', 'ap-basic'),
                'blog_image_alternate_medium' => __('blog_image_alternate_medium', 'ap-basic'),
                'blog_full_content' => __('blog_full_content', 'ap-basic')
    			);
    		if ( array_key_exists( $input, $valid_keys)) {
    			return $input;
    		} else {
    			return '';
    		}
	   }
    /** End of Blog Page selection **/

      
     /** Translation panel **/
     
     $wp_customize -> add_panel( 
        'translation_setting_pannel',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Translations', 'textdomain' ),
        ) 
      );
      
      $wp_customize -> add_section(
        'home_page_translation_section',
        array(
            'title' => 'Home Page',
            'priority' => 30,
            'panel' => 'translation_setting_pannel'
        )
      );
      $wp_customize -> add_setting(
        'home_page_translation',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'home_page_translation',
        array(
            'label' => 'Read More... (Features)',
            'section' => 'home_page_translation_section',
            'type' => 'text'
        )
      );
      
      $wp_customize -> add_setting(
        'home_page_moreinfo',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'home_page_moreinfo',
        array(
            'label' => 'More Info... (Services)',
            'section' => 'home_page_translation_section',
            'type' => 'text'
        )
      );
      
      // blog page readmore text change
      $wp_customize -> add_section(
        'blog_page_translation_section',
        array(
            'title' => 'Blog/Archive',
            'priority' => 30,
            'panel' => 'translation_setting_pannel'
        )
      );
      $wp_customize -> add_setting(
        'blog_page_translation',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'blog_page_translation',
        array(
            'label' => 'Read More... ',
            'section' => 'blog_page_translation_section',
            'type' => 'text'
        )
      );
      
      // Single Post Page
      $wp_customize -> add_section(
        'single_post_page_section',
        array(
            'title' => 'Single Post Page',
            'priority' => 30,
            'panel' => 'translation_setting_pannel'
        )
      );
      
      $wp_customize -> add_setting(
        'tagged_post_page',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      
      
      
      
      
      
      
      $wp_customize -> add_control(
        'tagged_post_page',
        array(
            'label' => 'Tagged',
            'section' => 'single_post_page_section',
            'type' => 'text'
        )
      );
      
      $wp_customize -> add_setting(
        'postedon_post_page',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'postedon_post_page',
        array(
            'label' => 'Posted On .. by ..',
            'section' => 'single_post_page_section',
            'type' => 'text'
        )
      );
      
      $wp_customize -> add_setting(
        'by_post_page',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'by_post_page',
        array(
            'label' => ' ',
            'section' => 'single_post_page_section',
            'type' => 'text',
            'placeholder' => 'by'
        )
      );
      
      $wp_customize -> add_setting(
        'in_post_page',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'in_post_page',
        array(
            'label' => 'Posted In',
            'section' => 'single_post_page_section',
            'type' => 'text'
        )
      );
      
      // Search result for 
      $wp_customize -> add_section(
        'search_page_section',
        array(
            'title' => 'Search Page',
            'priority' => 30,
            'panel' => 'translation_setting_pannel'
        )
      );
      $wp_customize -> add_setting(
        'search_page_setting',
        array(
            'default' => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text'
        )
      );
      $wp_customize -> add_control(
        'search_page_setting',
        array(
            'label' => 'Search Results For',
            'section' => 'search_page_section',
            'type' => 'text'
        )
      );
      
      
      /*
      $wp_customize -> add_panel( 
        'about_aglee_lite',
         array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'About Aglee Lite', 'textdomain' ),
        ) 
      );
      
    $wp_customize->add_section(
        'about_us_section',
        array(
            'title' => 'KNOW MORE ABOUT 8 Degree Themes',
            'description' => '<p>Aglee Lite - is a FREE WordPress theme by <a href="http://8degreethemes.com/" target="_blank">8 Degree Themes</a> - Developed by a tem of Wordpress Developers - has developed more than 350 WordPress websites for its clients.
            We want to give "a little beautiful thing" - back to the community.
            With our experience, we are creating "Aglee Lite", a free WordPress theme, which includes the most useful features for a generic business website!</p>
            <p>For documentation, <a href="">click here</a></p>
            <p>For Video tutorials, <a href="">click here</a></p>
            ',
            'priority' => 1000,
            'panel' => 'about_aglee_lite'
        )
    ); 
    
    $wp_customize->add_setting(
        'about_us',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text'
            )
    );
    
    $wp_customize->add_control(
        'about_us',
        array(
            'section' => 'about_us_section',
            'type' => 'select',
        )
    );
    
    
    $wp_customize->add_section(
        'about_other_product_section',
        array(
            'title' => 'Our other Products',
            'description' => '<p>Themes - <a href="https://8degreethemes.com/" target="_blank">https://8degreethemes.com/</a></p>
                              <p>Plugins - <a href="https://8degreethemes.com/" target="_blank">https://8degreethemes.com/</a></p>',
            'priority' => 1000,
            'panel' => 'about_aglee_lite'
        )
    ); 
    
    $wp_customize->add_setting(
        'about_other_products',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text'
            )
    );
    
    $wp_customize->add_control(
        'about_other_products',
        array(
            'section' => 'about_other_product_section',
            'type' => 'select',
        )
    );
    
    $wp_customize->add_section(
        'about_get_in_touch_section',
        array(
            'title' => 'Get In Touch',
            'description' => '<p>If you have any question/feedback regarding theme, please post in our forum <br/></br>
                                Forum:<a href="https://8degreethemes.com/support/" target="_blank">https://8degreethemes.com/support/</a> 
                                </p>
                                <p>For Queries Regading Themes <br/>Support: <a href="support@8degreethemes.com" href="_blank">support@8degreethemes.com</a></p>',
            'priority' => 1000,
            'panel' => 'about_aglee_lite'
        )
    ); 
    
    $wp_customize->add_setting(
        'about_get_in',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text'
            )
    );
    
    $wp_customize->add_control(
        'about_get_in',
        array(
            'section' => 'about_get_in_touch_section',
            'type' => 'select',
        )
    );       
    */
    
    //General dropdown sanitize for integer value
    function aglee_sanitize_dropdown_general( $input ) {
        return absint( $input );
    }
    
    //Sanitize input text general
    function sanitize_text( $input ){
        return wp_kses_post( force_balance_tags( $input ) );
    } 
    
    //Checkbox sanitization customizer
    function sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }
    
    }
    add_action( 'customize_register', 'aglee_lite_customizer' );

?>