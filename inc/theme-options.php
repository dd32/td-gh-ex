<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "axiohost";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => false,
        // Show the sections below the admin menu item or not
        'menu_title'           =>  esc_html__( 'Axiohost Options', 'axiohost' ),
        'page_title'           =>  esc_html__( 'Axiohost Options', 'axiohost' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'fa fa-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

   

    // Set the help sidebar
    $content =  esc_html__( 'This is the sidebar content, HTML is allowed.', 'axiohost' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    
        
        
        Redux::setSection( $opt_name, array(
            'title'      =>  esc_html__( 'General Options', 'axiohost' ),
            'id'         => 'general_options',
            'icon'         => 'fa fa-cog',
            'fields'     => array(
                
               
                array(
                    'id'            => 'scroll-back-to-top',
                    'type'          => 'switch',
                    'title'         =>  esc_html__( 'Enable/Disable Scroll Back to Top', 'axiohost' ),
                    'on'            => 'Enable',
                    'off'           => 'Disable',
                    'default'       =>  true,
                ),
             
                array(
                    'id'            => 'reade_more_label',
                    'type'          => 'text',
                    'title'         =>  esc_html__( 'Read More Label', 'axiohost' ),
                    'desc'           => esc_html__('Input your blog post read more label text', 'axiohost'),         
                    'default'       => esc_html__('Read More...', 'axiohost')
                ),
                array(
                    'id'            => 'except_limit',
                    'type'          => 'text',
                    'title'         =>  esc_html__( 'Blog Post Excerpt Limit', 'axiohost' ),
                    'default'       => '30'
                ),

                
                
    
            )
        ) );
    
    
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Header Options', 'axiohost' ),
            'id'    => 'header_area',
            'desc'  =>  esc_html__( 'Header Area options', 'axiohost' ),
            'icon'  => 'fa fa-window-maximize',
            'fields'     => array(
                array(
                    'id'            => 'brand_width',
                    'type'          => 'slider',
                    'title'         =>  esc_html__( 'Logo Brand Width(px)', 'axiohost' ),
                    'default'       => 115,
                    'min'           => 0,
                    'step'          => 1,
                    'max'           => 200,
                    'display_value' => 'label', 
                ),

                
            )
        ) );
       
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Page', 'axiohost' ),
            'id'    => 'page_options',
            'icon'  => 'fa fa-file-text-o ',
            'fields'     => array(
                array(
                    'id'            => '_page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('_page','equals','image')
                                  
                ),
                array(
                    'id'            => 'header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your page header bg color','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('_page','=','color')              
                ),
            )
        ) );

        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Typography', 'axiohost' ),
            'id'    => 'typography_option',
            'desc'  =>  esc_html__( 'Typography opitons', 'axiohost' ),
            'icon'  => 'fa fa-font',
            'fields'     => array(
                
                array(
                    'id'          => 'body-typography',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('body', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('body'),
                    'units'       =>'px',
                    'default'     => array(
                        'font-family' => 'Poppins', 
                        'google'      => true,
                    ),
                ),      
            )
        ) );
        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Color', 'axiohost' ),
            'id'    => 'color_option',
            'desc'  =>  esc_html__( 'Color opitons', 'axiohost' ),
            'icon'  => 'fa fa-paint-brush',
            'fields'     => array(
                
            
                
                array(
                    'id'          => 'modal-search-btn-bg',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Modal Search Button BG Color', 'axiohost'), 
                    'default'     => '#8066dc'
                ),
               
                array(
                    'id'       => 'bg-color',
                    'type'     => 'color',
                    'title'    =>  esc_html__( 'Footer bg color', 'axiohost' ),
                    'default'  => '#fbfbfb'
                ),
                        
            )
        ) );
        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Facebook Pixel', 'axiohost' ),
            'id'    => 'facebook-pexels',
            'desc'  =>  esc_html__( 'Input your facebook pixel', 'axiohost' ),
            'icon'  => 'fa fa-bar-chart',
            'fields'     => array(
               
                array(
                    'id'       => 'fb-pexel-code',
                    'type'     => 'textarea',
                    'title'    =>  esc_html__( 'Facebook Pixel Code', 'axiohost' ),
                    'desc'  => esc_html__('Input your fb pixel code', 'axiohost')
                ),
                        
            )
        ) );
        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Google Analytics', 'axiohost' ),
            'id'    => 'google-analytics',
            'desc'  =>  esc_html__( 'Input your google analytics code', 'axiohost' ),
            'icon'  => 'fa fa-line-chart',
            'fields'     => array(
               
                array(
                    'id'       => 'google-analytics-code',
                    'type'     => 'textarea',
                    'title'    =>  esc_html__( 'Google Analytics Code', 'axiohost' ),
                    'desc'  => esc_html__('Input your google analytics code', 'axiohost')
                ),
                        
            )
        ) );
        
               
    /*
     * <--- END SECTIONS
     */
   