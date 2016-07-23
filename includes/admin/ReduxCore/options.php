<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
    // This is your option name where all the Redux data is stored.
    $opt_name = "abaya_option";
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters('redux_demo/opt_name', $opt_name );
    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */
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
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Abaya Options','abaya'),
        'page_title'           => esc_html__( 'Abaya Options','abaya'),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 21,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,

        'forced_dev_mode_off' => true ,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 8,
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
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
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

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
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

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
   /* $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation','abaya'),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support','abaya'),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions','abaya'),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );
*/
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>','abaya'), $v );
    } else {
        $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>','abaya');
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>','abaya');

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1','abaya'),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','abaya')
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2','abaya'),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>','abaya')
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>','abaya');
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */


        // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General','abaya'),
        'id'               => 'general',
        'desc'             => esc_html__( 'These are really basic fields!','abaya'),
        'customizer_width' => '400px',
        'icon'             => 'el el-home'
    ) );

        Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Logo','abaya'),
        'id'               => 'general-logo',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'=>array(
                         array(
                        'id'       => 'logo',
                        'type'     => 'media', 
                        'url'      => true,
                        'title'    => esc_html__('Logo', 'abaya'),
                        'desc'     => esc_html__('Upload your site logo here', 'abaya'),
                        'subtitle' => esc_html__('Upload Logo', 'abaya'),
                        'default'  =>''),
                        array(
                        'id'       => 'header_text',
                        'type'     => 'text',
                        'title'    => esc_html__('Header Text', 'abaya'), 
                        'subtitle' => esc_html__('If you dont want to use header text below header top menu then put text here ', 'abaya'),
                        'default'=>'',
                    ),

        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Home Page Slider','abaya'),
        'id'               => 'header',
        'customizer_width' => '450px','fields'           => array(
             array(
              'id'=>'switch-slider',
            'type'     => 'select',
            'title'    => esc_html__('Select Option', 'abaya'), 
            'subtitle' => esc_html__('No validation can be done on this field type', 'abaya'),
            'desc'     => esc_html__('This is the description field, again good for additional info.', 'abaya'),
            // Must provide key => value pairs for select options
            'options'  => array(
                '1' => 'Text Slider',
                '2' => 'Video BackGround',
              
            ),
            'default'  => '1',
        ),  
      
          array(
            'id'       => 'abaya_slider',
            'type'     => 'slides',
            'title'       => esc_html__('Slides Options', 'abaya'),
            'subtitle'    => esc_html__('Unlimited slides with drag and drop sortings.', 'abaya'),
             'required' => array('switch-slider', '=' , '1'),
            'desc'        => esc_html__('This field will store all slides values into a multidimensional array to use into a foreach loop.', 'abaya'),
            'placeholder' => array(
                'title'           => esc_html__('This is a title', 'abaya'),
                'description'     => esc_html__('Description Here', 'abaya'),
                'subtitle'             => esc_html__('Give us a link!', 'abaya'),
            ), ),

            array(
            'id'       => 'videoiframe',
            'type'     => 'textarea',
            'title'    => esc_html__('Put video iframe code here', 'abaya'), 
             'required' => array('switch-slider', '=' , '2'),
            'subtitle' => esc_html__('Video Iframe', 'abaya'),
            'default'  => '',
        )
        
        )
    ) );



    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Footer','abaya'),
        'id'               => 'footer',
        'desc'             => esc_html__( 'These are really basic fields!','abaya'),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
         'fields'           => array(
            array(
                'id'       => 'copyright',
                'type'     => 'textarea',
                'title'    => esc_html__( 'Copy Right','abaya'),
                'subtitle' => esc_html__( '','abaya'),
                'desc'     => esc_html__( '','abaya'),
                'default'  => '',
            )
            )
    ) );
	
Redux::setSection( $opt_name, array(
    'icon' => 'el el-shopping-cart',
    'id' => 'shop_settings',
    'icon_class' => 'icon-large',
    'title' => __('Shop Settings', 'abaya'),
    'desc' => "<div class='redux-info-field'><h3>".__('Shop Archive Page Settings (Woocommerce plugin required)', 'abaya')."</h3></div>",
    'fields' => array(
    	array(
            'id'=>'shop_sidebar',
            'type' => 'select',
            'title' => __('Choose a Sidebar for your shop page', 'abaya'), 
            'customizer' => true,
            'options'  => array(
                '1' => 'Product Page With Right Sidebar',
                '2' => 'Product Page With Left Sidebar',
                '3' => 'Product Page Without Sidebar',
            ),
            'default'  => '1',
            'width' => 'width:60%',
            )           
        ),
    )
);
  