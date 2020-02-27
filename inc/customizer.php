<?php
/**
 * appdetail Theme Customizer.
 *
 * @package appdetail
 */
/**
 * Sidebar layout options
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return array $appdetail_sidebar_layout
 *
 */
/**
 * Pagination options
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return array $appdetail_pagination_option
 *
 */
if ( !function_exists('appdetail_pagination_option') ) :
   
    function appdetail_pagination_option() {
      
        $appdetail_pagination_option =  array(
            'default'  => __( 'Default Pagination', 'appdetail'),
            'numeric'  => __( 'Numeric Pagination' , 'appdetail')
        );
      
        return apply_filters( 'appdetail_pagination_option', $appdetail_pagination_option );
    }
endif;

/**
 *  Default Theme options
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return array $appdetail_theme_layout
 *
 */
if ( !function_exists('appdetail_default_theme_options') ) :
    function appdetail_default_theme_options() {

        $default_theme_options = array(
            
            'appdetail-feature-cat'                  => 0,
            'appdetail-service-cat'                  => 0,
            'appdetail-screenshot-cat'               => 0,
            'appdetail-testimonial-cat'              => 0,
            'appdetail-blog-cat'                     => 1,
            'appdetail-promo-cat'                    => 0,
            /***********************************Slider Section Setting**********************************/
            'appdetail-slider-background-image'      => esc_url('http://localhost/consulton/wp-content/uploads/2019/04/business_professional_teamwork_corporate_meeting_businessman_business_people_group-649367-1.jpg','appdetail'),
            'appdetail-slider-title'                 => esc_html__('Slider Title','appdetail'), 
            'appdetail-slider-description'           => esc_html__('Slider Description','appdetail'),
            'appdetail-slider-video-url'             => esc_url('//www.youtube.com/watch?v=XSGBVzeBUbk','appdetail'), 
            'appdetail-slider-read-more'             => esc_html__('Watch Now','appdetail'),
            /***********************************Service Section Setting********************************/
            'appdetail-service-title'                 => esc_html__('Service Title','appdetail'), 
            'appdetail-service-description'           => esc_html__('Service Description','appdetail'),
            /***********************************Screenshot Section Setting*****************************/
            'appdetail-screenshot-title'                 => esc_html__('Screenshot Title','appdetail'), 
            'appdetail-screenshot-description'           => esc_html__('Screenshot Description','appdetail'),
            /***********************************testimonial Section Setting****************************/
            'appdetail-testimonial-title'                 => esc_html__('Testimonial Title','appdetail'), 
            'appdetail-testimonial-description'           => esc_html__('Testimonial Description','appdetail'),
            /***********************************blog Section Setting****************************/
            'appdetail-blog-title'                 => esc_html__('Blog Title','appdetail'), 
            'appdetail-blog-description'           => esc_html__('Blog Description','appdetail'),
            /***********************************Footer Section Setting****************************/
            'appdetail-footer-copyright'             => esc_html__('&copy; All Right Reserved','appdetail'),
            'appdetail-layout'                       => 'right-sidebar',
            'appdetail-font-family-url'              => esc_url('//fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500', 'appdetail'),
            'appdetail-font-family-name'             => esc_html__('Montserrat, sans-serif','appdetail'),           
            'appdetail-read-more-text'               => esc_html__('read more','appdetail'),
            'appdetail-blog-pagination-type-options' => 'default',
            'appdetail-default-color'                => '#5424bf', 
            'appdetail-header-disable'               => 0,
            'appdetail-title-tagline-color'          => '#fff',
            'appdetail-tagline-color'                => '#fff', 
);
        return apply_filters( 'appdetail_default_theme_options', $default_theme_options );
    }
endif;

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function appdetail_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'refresh';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'refresh';
    $wp_customize->get_setting( 'custom_logo' )->transport      = 'refresh';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';

    /*defaults options*/
    $appdetail_defaults = appdetail_get_theme_options();

    $wp_customize->add_panel( 'appdetail_panel', array(
        'priority' => 30,
        'capability' => 'edit_theme_options',
        'title' => __( 'appdetail Theme Settings', 'appdetail' ),
    ) );

    /**
     * Load customizer custom-controls

     */
    get_template_part('/inc/customizer/custom-controls');
    // die;
    // require get_template_directory() . '/inc/customizer/custom-controls.php';
    /**
     * Load customizer Slider
     */
    get_template_part('/inc/customizer/section-feature');
    /**
     * Load customizer Service   
     */
    get_template_part('/inc/customizer/section-service' );
    /**
     * Load customizer Video
     */
    get_template_part('/inc/customizer/section-video');
    /**
         * Load customizer Screenshot
         */
    get_template_part('/inc/customizer/section-screenshot');
    /**
     * Load customizer Screenshot
     */
    get_template_part('/inc/customizer/section-testimonial');
    /**
     * Load customizer Screenshot
     */
    get_template_part('/inc/customizer/section-blog');

    /**
     * Load customizer Typography
     */
    get_template_part('/inc/customizer/section-typography');
    /**
     * Load customizer Color
     */
    get_template_part('/inc/customizer/section-color');
    /**
     * Load customizer custom-controls
     */
    get_template_part('/inc/customizer/section-footer');

}
add_action( 'customize_register', 'appdetail_customize_register' );

/**
 * Load dynamic css file
*/
get_template_part('/inc/dynamic-css');


/**
 *  Get theme options
 *
 * @since appdetail 1.0.0
 *
 * @param null
 * @return array appdetail_theme_options
 *
 */
if ( !function_exists('appdetail_get_theme_options') ) :
    function appdetail_get_theme_options() {

        $appdetail_default_theme_options = appdetail_default_theme_options();
        

     $appdetail_get_theme_options     = get_theme_mod( 'appdetail_theme_options');
        
        if( is_array( $appdetail_get_theme_options ))
        {
            return array_merge( $appdetail_default_theme_options, $appdetail_get_theme_options );
        }

        else
        {
            
            return $appdetail_default_theme_options;
        }

    }
endif;

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function appdetail_customize_preview_js() {
	
    wp_enqueue_script( 'appdetail-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151216', true );
}
add_action( 'customize_preview_init', 'appdetail_customize_preview_js' );
