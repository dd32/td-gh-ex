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

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   =>  esc_html__( 'Theme Information 1', 'axiohost' ),
            'content' =>  esc_html__( 'This is the tab content, HTML is allowed.', 'axiohost' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   =>  esc_html__( 'Theme Information 2', 'axiohost' ),
            'content' =>  esc_html__( 'This is the tab content, HTML is allowed.', 'axiohost' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

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
                    'id'       => 'page-layout',
                    'type'     => 'image_select',
                    'title'    =>  esc_html__('Page Layout', 'axiohost'), 
                    'options'  => array(
                        '1'      => array(
                            'alt'   =>  esc_html__('1 Column', 'axiohost'), 
                            'img'   => ReduxFramework::$_url.'assets/img/1col.png'
                        ),
                        '2'      => array(
                            'alt'   =>  esc_html__('2 Column Left', 'axiohost'), 
                            'img'   => ReduxFramework::$_url.'assets/img/2cl.png'
                        ),
                        '3'      => array(
                            'alt'   =>  esc_html__('2 Column Right', 'axiohost'), 
                            'img'  => ReduxFramework::$_url.'assets/img/2cr.png'
                        ),
                    ),
                    'default' => '3'
                ),
                array(
                    'id'            => 'preloader',
                    'type'          => 'switch',
                    'title'         =>  esc_html__( 'Enable/Disable Preloader', 'axiohost' ),
                    'on'            => 'Enable',
                    'off'           => 'Disable',
                    'default'       =>  true,
                    'subtitle'      =>  esc_html__('Enable or disable your theme preloader', 'axiohost' ),
                ),
                array(
                    'id'            => 'breadcumb',
                    'type'          => 'switch',
                    'title'         =>  esc_html__( 'Enable/Disable Breadcumb', 'axiohost' ),
                    'on'            => 'Enable',
                    'off'           => 'Disable',
                    'default'       =>  true,
                    'subtitle'      =>  esc_html__('Enable or disable your theme breadcumb', 'axiohost' ),
                ),
                array(
                    'id'            => 'scroll-back-to-top',
                    'type'          => 'switch',
                    'title'         =>  esc_html__( 'Enable/Disable Scroll Back to Top', 'axiohost' ),
                    'on'            => 'Enable',
                    'off'           => 'Disable',
                    'default'       =>  true,
                ),
                array(
                    'id'       => 'blog_style',
                    'type'     => 'select',
                    'title'    => esc_html__('Blog Style', 'axiohost'), 
                    'subtitle' => esc_html__('Select blog style ', 'axiohost'),
                    'desc'     => esc_html__('Select your blog post view style', 'axiohost'),
                    'options'  => array(
                        '1' =>  esc_html__('List View', 'axiohost'),
                        '2' =>  esc_html__('Grid View', 'axiohost'),
                    ),
                    'default'  => '1',
                ),
                array(
                    'id'            => 'reade_more_label',
                    'type'          => 'text',
                    'title'         =>  esc_html__( 'Read More Label', 'axiohost' ),
                    'desc'           => esc_html__('Input your blog post read more label text', 'axiohost'),         
                    'default'       => 'Read More...'
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
                array(
                    'id'            => 'text_logo_color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'Text Logo Color', 'axiohost' ),
                    'desc'          => esc_html__('Pic your text logo color', 'axiohost'),
                    'default'       => '#fff',
                    'output'      => array('h1.site-title a'), 
                                  
                ),
               
                array(
                    'id'            => 'text_logo_typo',
                    'type'          => 'typography',
                    'title'         =>  esc_html__( 'Text Logo Typography', 'axiohost' ),
                    'desc'          => esc_html__('Setup your text logo typography', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('h1.site-title a'),
                ),
                array(
                    'id'            => 'logo_tagline_color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'Logo tagline Color', 'axiohost' ),
                    'desc'          => esc_html__('Pic your text logo tagline color', 'axiohost'),
                    'default'       => '#fff',
                    'output'      => array('p.site-description'), 
                                  
                ),
               
                array(
                    'id'            => 'logo_tagline_typo',
                    'type'          => 'typography',
                    'title'         =>  esc_html__( 'Logo Tagline Typography', 'axiohost' ),
                    'desc'          => esc_html__('Setup your text logo tagline typography', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('p.site-description'),
                ),

                
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Page Options', 'axiohost' ),
            'id'    => 'page-options',
            'desc'  =>  esc_html__( 'Configure your page options setting', 'axiohost' ),
            'icon'  => 'fa fa-file-text-o ',
        ) );
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Page', 'axiohost' ),
            'id'    => 'page_options',
            'subsection'       => true,
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
            'title' =>  esc_html__( 'Blog Page', 'axiohost' ),
            'id'    => 'blog-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'blog-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Blog Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your blog page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'blog-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your blog page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('blog-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'blog-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'Tag Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your blog page header bg color.','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('blog-page','=','color')              
                ),
                
                array(
                    'id'            => 'author-meta',
                    'type'          => 'switch',
                    'on'            => 'Show',
                    'off'           => 'Hide' ,
                    'title'         =>  esc_html__( 'Meta Data', 'axiohost' ),
                    'desc'          => esc_html__('Show/Hide author meta data','axiohost'),
                    'default'       => true,          
                ),
                array(
                    'id'            => 'calendar-meta',
                    'type'          => 'switch',
                    'on'            => 'Show',
                    'off'           => 'Hide', 
                    'title'         =>  esc_html__( 'Calendar Meta', 'axiohost' ),
                    'desc'          => esc_html__('Show/Hide calenadr meta data','axiohost'),
                    'default'       => true,          
                ),
               
                
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Archive Page', 'axiohost' ),
            'id'    => 'archive-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'archive-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Archive Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your archive page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'archive-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your archive page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('archive-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'archive-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( ' Archive Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your archive page header bg color','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('archive-page','=','color')              
                ),


               
                
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Category Page', 'axiohost' ),
            'id'    => 'category-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'category-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Category Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your category page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'category-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your category page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('category-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'category-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( ' Category Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your category page header bg color','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('category-page','=','color')              
                ),

               
                
            )
        ) );

        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Tag Page', 'axiohost' ),
            'id'    => 'tag-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'tag-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Tag Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your tag page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'tag-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your tag page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('tag-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'tag-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( ' Tag Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your tag page header bg color','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('tag-page','=','color')              
                ),

               
                
            )
        ) );
        
        
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Author Page', 'axiohost' ),
            'id'    => 'author-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'author-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Author Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your author page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'author-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your author page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('author-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'author-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( ' Author Page Header BG Color ', 'axiohost' ),
                    'desc'          => esc_html__('Pick your author page header bg color','axiohost'),
                    'default'       => '#0085ba',
                    'required'     => array('author-page','=','color')              
                ),
                

               
                
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( 'Search Page', 'axiohost' ),
            'id'    => 'search-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'search-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'search Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your search page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'search-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your search page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('search-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'search-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'BG Color', 'axiohost' ),
                    'desc'          => esc_html__('Pick your search page header bg color', 'axiohost'),
                    'url'           => true,
                    'default'       => '#0085ba',
                    'required'     => array('search-page','equals','color')
                                  
                ),
                array(
                    'id'            => 'search-for-text',
                    'type'          => 'text',
                    'title'         =>  esc_html__( ' Search For: Text', 'axiohost' ),
                    'desc'          => esc_html__('Input your search for: text ', 'axiohost'),
                    'default'       => 'Search results for : '
                ),
                array(
                    'id'            => 'nothing-found-text',
                    'type'          => 'text',
                    'title'         =>  esc_html__( ' Nothing Found Text', 'axiohost' ),
                    'desc'          => esc_html__('Input your search page nothing found text ', 'axiohost'),
                    'default'       => 'Nothing Found'
                ),
                array(
                    'id'            => 'nothing-found-desc',
                    'type'          => 'textarea',
                    'title'         =>  esc_html__( ' Nothing Found Description', 'axiohost' ),
                    'desc'          => esc_html__('Input your search page nothing found description ', 'axiohost'),
                    'default'       => 'Sorry, nothing matched your search terms. Please try again with some different keywords.'
                ),
                array(
                    'id'            => 'show-hide-search-form',
                    'type'          => 'switch',
                    'title'         =>  esc_html__( 'Show/Hide Search Form', 'axiohost' ),
                    'desc'          => esc_html__('Show/hide your search form when nothing found.', 'axiohost'),
                    'default'       => true,
                    'on'            => esc_html__('Show', 'axiohost'),
                    'off'            => esc_html__('Hide', 'axiohost'),
                ),
            )
        ) );
        
        Redux::setSection( $opt_name, array(
            'title' =>  esc_html__( '404 Page', 'axiohost' ),
            'id'    => 'error-page-options',
            'subsection'       => true,
            'fields'     => array(
                array(
                    'id'            => 'error-page',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( '404 Page Options', 'axiohost' ),
                    'desc'          =>  esc_html__( 'Chose your 404 page header background.','axiohost'),
                    'options' => array(
                        'image' => esc_html__( 'Image','axiohost'),
                        'color' => esc_html__('Color','axiohost'),
                     ), 
                    'default'       => 'image',                
                ),
               
                array(
                    'id'            => 'error-header-bg-image',
                    'type'          => 'media',
                    'title'         =>  esc_html__( 'BG Image', 'axiohost' ),
                    'desc'          => esc_html__('Upload your 404 page header bg image', 'axiohost'),
                    'url'           => true,
                    'default'       => array(
                        'url'   => AXIOHOST_IMG_URL.'/page-title-img.png',
                    ),
                    'required'     => array('error-page','equals','image')
                                  
                ),
                array(
                    'id'            => 'error-header-bg-color',
                    'type'          => 'color',
                    'title'         =>  esc_html__( 'BG Color', 'axiohost' ),
                    'desc'          => esc_html__('Pick your error page header bg color', 'axiohost'),
                    'url'           => true,
                    'default'       => '#0085ba',
                    'required'     => array('error-page','equals','color')
                                  
                ),
                array(
                    'id'            => 'error-text',
                    'type'          => 'textarea',
                    'title'         =>  esc_html__( ' 404 Error Text', 'axiohost' ),
                    'desc'          => esc_html__('Input your 404 error text ', 'axiohost'),
                    'default'       => 'It looks like nothing was found at this location. Maybe try a search..?'
                ),
                array(
                    'id'            => 'search-style',
                    'type'          => 'button_set',
                    'title'         =>  esc_html__( 'Search Form Style', 'axiohost' ),
                    'desc'          => esc_html__('Chose your search form style', 'axiohost'),
                    'options'       => array(
                		'1'     => 'Style-1',
                		'2'     => 'Style-2'
                	),
                    'default'       => '1'
                ),
                
            )
        ) );

        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Footer Layout', 'axiohost' ),
            'id'    => 'footer-layout',
            'desc'  =>  esc_html__( 'Footer widget layout opitons', 'axiohost' ),
            'icon'  => 'fa fa-columns',
            'fields'     => array(
                array(
                    'id'       => 'widget-layout',
                    'type'     => 'select',
                    'title'    =>  esc_html__( 'Layout Options', 'axiohost' ),
                    'options'  => array(
                        '1' => 'col-4 | col-4 | col-4',
                        '2' => 'col-3 | col-3 | col-3 | col-3',
                        '3' => 'col-4 | col-2 | col-3 | col-3',
                        '4' => 'col-3 | col-3 | col-2 | col-4',
                        '5' => 'col-6 | col-6',
                        '6' => 'col-4 | col-2 | col-4 | col-2',
                    ),
                    'default'  => '3',
                    'desc' => esc_html__('Select your footer widget layout options', 'axiohost')
                ),
                        
            )
        ) );
        Redux::setSection( $opt_name, array(     
            'title' =>  esc_html__( 'Copyright', 'axiohost' ),
            'id'    => 'footer_section',
            'desc'  =>  esc_html__( 'Copyright text opitons', 'axiohost' ),
            'icon'  => 'fa fa-copyright',
            'fields'     => array(
               
                array(
                    'id'       => 'copyright_text',
                    'type'     => 'editor',
                    'title'    =>  esc_html__( 'Copyright Text', 'axiohost' ),
                    'default'  => '<p> '.esc_html__('© Copyright 2019 axiohost - Designed by ', 'axiohost').'<a href="'.esc_url('https://themeix.com').'">'.esc_html__('Themeix', 'axiohost').'</a></p>'
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
                array(
                    'id'          => 'primary-menu-item',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Primary Menu Item', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.navigation-main .sf-menu li a'),
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'page-title',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Page Title', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.post-title-content h1'), 
                    'units'       =>'px',
                ),
                
                array(
                    'id'          => 'post-title',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Post Title', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.post-title-content.post h1'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'post-excerpt',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Post Excerpt', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('article .blog-content p'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'sidebar-widget-title',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Sidebar Widget Title', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.sidebar-title'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'sidebar-widget-link',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Sidebar Widget link', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.widget li a'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'sidebar-widget-text',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Sidebar Widget Text', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.widget p'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'footer-widget-title',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Footer Widget Title', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.footer-widget .footer-title'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'footer-widget-link',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Footer Widget Link', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.footer-widget a'), 
                    'units'       =>'px',
                ),
                array(
                    'id'          => 'footer-widget-text',
                    'type'        => 'typography', 
                    'title'       =>  esc_html__('Footer Widget Text', 'axiohost'),
                    'google'      => true, 
                    'font-backup' => true,
                    'output'      => array('.footer-widget p'), 
                    'units'       =>'px',
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
                    'id'          => 'loader-wrapper',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Preloader Background Color', 'axiohost'),
                    'default'     => '#fff'
                    
                ),
                array(
                    'id'          => 'primary-menu-item-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Responsive Menu Item Color', 'axiohost'),
                    'output'      => array('.navigation-wrapper #navigation-menu li a'),
                    'default'     => '#8d8992'
                ),
                
                array(
                    'id'          => 'modal-search-btn-bg',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Modal Search Button BG Color', 'axiohost'), 
                    'default'     => '#8066dc'
                ),
                array(
                    'id'          => 'modal-search-btn-text-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Moda Search Button Text Color', 'axiohost'),
                    'output'      => array('.btnSearchText'), 
                    'default'    => '#fff'
                ),
               
                array(
                    'id'          => 'sidebar-search-btn-icon-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Sidebar Search Button icon Color', 'axiohost'),
                    'output'      => array('.search-form-widget button[type="submit"]'), 
                    'default'     => '#8d8992'
                ),
                
                array(
                    'id'          => 'sidebar-widget-link-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Sidebar Widget Link Color', 'axiohost'),
                    'output'      => array('.sidebar-widget a'), 
                    'default'     => '#8d8992'
                ),
                array(
                    'id'          => 'sidebar-widget-text-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Sidebar Widget Tex Color', 'axiohost'),
                    'output'      => array('.sidebar-widget p'),
                    'default'     => '#8d8992'
                ),
                array(
                    'id'       => 'bg-color',
                    'type'     => 'color',
                    'title'    =>  esc_html__( 'Footer bg color', 'axiohost' ),
                    'default'  => '#fbfbfb'
                ),
                
                array(
                    'id'          => 'footer-widget-link-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Footer Widget Link Color', 'axiohost'),
                    'output'      => array('.footer-widget a'),
                    'default'     => '#8d8992'
                ),
                array(
                    'id'          => 'footer-widget-text-color',
                    'type'        => 'color', 
                    'title'       =>  esc_html__('Footer Widget Text Color', 'axiohost'),
                    'output'      => array('.footer-widget p'), 
                    'default'     => '#8d8992'
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
   