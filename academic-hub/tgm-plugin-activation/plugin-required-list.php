<?php
/**
 * Academic Hub Plugin required
 *
 *
 * @package Academic_Hub
 */
function academic_hub_register_required_plugins() {
    /*
    * The list of Plugin Requird List
    */
    $plugins = array(
        array(
            'name' => esc_html__( 'Easy Google Fonts', 'academic-hub'),
            'slug' => 'easy-google-fonts',
            'required' => false,
        ),
        array(
            'name' => esc_html__( 'Contact Form 7', 'academic-hub'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => esc_html__( 'Elementor Page Builder', 'academic-hub'),
            'slug' => 'elementor',
            'required' => false,
        ),
        array(
            'name' => esc_html__( 'One Click Demo Import', 'academic-hub'),
            'slug' => 'one-click-demo-import',
            'required' => false,
        ),
        array(
            'name' => esc_html__( 'Contact Form  Everest Forms', 'academic-hub'),
            'slug' => 'everest-forms',
            'required' => false,
        ),

        
    );

    /*
        * Array of configuration settings. Amend each line as needed. 
    */
    $config = array(
        'id'           => 'academic-hub',                 
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,                    
        'dismissable'  => true,                    
        'dismiss_msg'  => '',                       
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register','academic_hub_register_required_plugins' );//Register
