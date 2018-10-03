<?php

    /**
     * For full documentation, please visit: http://docs.reduxframework.com/
     * For a more extensive sample-config file, you may look at:
     * https://github.com/reduxframework/redux-framework/blob/master/sample/sample-config.php
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "bee_news_redux_builder";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        'opt_name' => 'bee_news_redux_builder',
        'dev_mode' => FALSE,
        'use_cdn' => TRUE,
        'display_name' => 'Bee News Theme Options',
        'display_version' => FALSE,
        'page_slug' => 'bee-news-options',
        'page_title' => 'Bee News Options',
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => 'Bee News Options',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'themes.php',
        'page_parent_post_type' => 'your_post_type',
        'customizer' => TRUE,
        'default_mark' => '*',
        'google_api_key' => 'AIzaSyCBEULSqSYCZiz6fY2VvoqaHWWonrQOkPA',
        'hints' => array(
            'icon_position' => 'right',
            'icon_color' => 'lightgray',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'cdn_check_time' => '1440',
        'compiler' => TRUE,
        'page_permissions' => 'manage_options',
        'save_defaults' => TRUE,
        'show_import_export' => false,
        'database' => 'options',
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'show_options_object' => false
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

  

    Redux::setSection( $opt_name, array(
        'title' => __( 'General Setting', 'bee-news' ),
        'id'    => 'general',
        'desc'  => __( 'Basic fields as subsections.', 'bee-news' ),
        'icon'  => 'el el-home'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => __( 'Header Setting', 'bee-news' ),
        'id'         => 'opt-header-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'upload-logo',
                'type'     => 'media',
                'title'    => __( 'Logo Uploder', 'bee-news' ),
                'subtitle' => __( 'Upload Your Logo', 'bee-news' ),
                'desc'     => __( 'Select Your Logo of 500 X 100 Pixels', 'bee-news' ),
                'compiler' => true,
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/logo.png'
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Footer Setting', 'bee-news' ),
        'id'         => 'opt-footer-subsection',
        'subsection' => true,
        'fields'     => array(
            $fields = array(
                'id'       => 'footer-switch',
                'type'     => 'switch', 
                'title'    => __('Footer Social Icon', 'bee-news'),
                'subtitle' => __('Look, it\'s off!', 'bee-news'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer-logo',
                'type'     => 'media',
                'title'    => __( 'Logo Uploder', 'bee-news' ),
                'subtitle' => __( 'Upload Your Logo', 'bee-news' ),
                'desc'     => __( 'Select Your Logo of 375 X 100 Pixels', 'bee-news' ),
                'compiler' => true,
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/logo.png'
                )
            ),
            
            array(
                'id'       => 'footer-address',
                'type'     => 'text',
                'title'    => __( 'Address Information', 'bee-news' ),
                'desc'     => __( 'Enter Your Address Information', 'bee-news' ),
                'default'  => 'Melbourne, Australia',
            ),
            array(
                'id'       => 'footer-phone',
                'type'     => 'text',
                'title'    => __( 'Phone Number Information', 'bee-news' ),
                'desc'     => __( 'Enter Your Phone Number Information', 'bee-news' ),
                'default'  => '+61 491 570 156',
            ),
            array(
                'id'       => 'footer-email',
                'type'     => 'text',
                'title'    => __( 'Email Address Information', 'bee-news' ),
                'desc'     => __( 'Enter Your Email Address Information', 'bee-news' ),
                'default'  => 'beenews@xyz.com',
            ),
            array(
                'id'       => 'footer-about',
                'type'     => 'text',
                'title'    => __( 'About Company Information', 'bee-news' ),
                'desc'     => __( 'Enter Your About Company Information', 'bee-news' ),
                'default'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas reprehenderit quia, vero amet laborum. Omnis reiciendis, vel animi minus, soluta doloribus quae, eligendi at harum recusandae quos. Ex impedit, asperiores!',
            ),
            array(
                'id'       => 'footer-setting',
                'type'     => 'text',
                'title'    => __( 'Copyright Text', 'bee-news' ),
                'desc'     => __( 'Enter Your Footer Information', 'bee-news' ),
                'default'  => 'Copyright Bee News &copy;2018 | All Right Reserve',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Color Setting', 'bee-news' ),
        'id'         => 'opt-color-subsection',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'primary-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Primary Color', 'bee-news' ),
                'subtitle' => __( 'Primary Color', 'bee-news' ),
                'desc'     => __( 'Select Primary Color', 'bee-news' ),
                'default'  => array(
                    'color'     => '#004d91'
                )
            ),
            array(
                'id'       => 'secondary-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Secondary Color', 'bee-news' ),
                'subtitle' => __( 'Secondary Color', 'bee-news' ),
                'desc'     => __( 'Select Secondary Color', 'bee-news' ),
                'default'  => array(
                    'color'     => '#2a3048'
                )
            ),
            array(
                'id'       => 'menu-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Menu Color', 'bee-news' ),
                'subtitle' => __( 'Menu Color', 'bee-news' ),
                'desc'     => __( 'Select Menu Color', 'bee-news' ),
                'default'  => array(
                    'color'     => '#333'
                )
            ),
            array(
                'id'       => 'menu-active-color',
                'type'     => 'color_rgba',
                'title'    => __( 'Menu Active Color', 'bee-news' ),
                'subtitle' => __( 'Menu Active Color', 'bee-news' ),
                'desc'     => __( 'Select Menu Active Color', 'bee-news' ),
                'default'  => array(
                    'color'     => '#000'
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Social Accounts', 'bee-news' ),
        'id'    => 'social-ac',
        'desc'  => __( 'Add Url Of Your Social Accounts', 'bee-news' ),
        'icon'  => 'el el-adjust-alt',
        'fields'     => array(
            array(
                'id'       => 'facebook-url',
                'type'     => 'text',
                'title'    => __( 'Facebook', 'bee-news' ),
                'subtitle' => __( 'Facebook Account', 'bee-news' ),
                'desc'     => __( 'Add Your Facebook Page Url', 'bee-news' ),
            ),
            array(
                'id'       => 'twitter-url',
                'type'     => 'text',
                'title'    => __( 'Twitter', 'bee-news' ),
                'subtitle' => __( 'Twitter Account', 'bee-news' ),
                'desc'     => __( 'Add Your Twitter Page Url', 'bee-news' ),
            ),
            array(
                'id'       => 'googleP-url',
                'type'     => 'text',
                'title'    => __( 'Google Plus', 'bee-news' ),
                'subtitle' => __( 'Google Plus Account', 'bee-news' ),
                'desc'     => __( 'Add Your Google Plus Page Url', 'bee-news' ),
            ),
            array(
                'id'       => 'youtube-url',
                'type'     => 'text',
                'title'    => __( 'Youtube', 'bee-news' ),
                'subtitle' => __( 'Youtube Account', 'bee-news' ),
                'desc'     => __( 'Add Your Youtube Page Url', 'bee-news' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => __( 'Ads Section', 'bee-news' ),
        'id'    => 'ads-section',
        'desc'  => __( 'Place To Upload Advertisement Image', 'bee-news' ),
        'icon'  => 'el el-picture',
        'fields'     => array(
            array(
                'id'       => 'header-ads',
                'type'     => 'media',
                'title'    => __( 'Header Ads', 'bee-news' ),
                'subtitle' => __( 'Top Header Ads', 'bee-news' ),
                'desc'     => __( 'Upload 750 X 80 Pixels Image', 'bee-news' ),
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/adv-full.jpg'
                ),
            ),
            array(
                'id'       => 'header-ads-Link',
                'type'     => 'text',
                'title'    => __( 'Header Ads Link', 'bee-news' ),
                'subtitle' => __( 'Top Header Ads Link', 'bee-news' ),
            ),
            array(
                'id'       => 'center-ads-1',
                'type'     => 'media',
                'title'    => __( 'Center Left Ads', 'bee-news' ),
                'subtitle' => __( 'Left Center Ads', 'bee-news' ),
                'desc'     => __( 'Upload 390 X 114 Pixels Image', 'bee-news' ),
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/adv-half.jpg'
                )
            ),
            array(
                'id'       => 'center-ads-1-Link',
                'type'     => 'text',
                'title'    => __( 'Center Left Ads Link', 'bee-news' ),
                'subtitle' => __( 'Left Center Ads Link', 'bee-news' ),
            ),

            array(
                'id'       => 'center-ads-2',
                'type'     => 'media',
                'title'    => __( 'Center Middel Ads', 'bee-news' ),
                'subtitle' => __( 'Middel Center Ads', 'bee-news' ),
                'desc'     => __( 'Upload 390 X 114 Pixels Image', 'bee-news' ),
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/adv-half.jpg'
                )
            ),
             array(
                'id'       => 'center-ads-2-Link',
                'type'     => 'text',
                'title'    => __( 'Center Middel Ads Link', 'bee-news' ),
                'subtitle' => __( 'Middel Center Ads Link', 'bee-news' ),
            ),
            array(
                'id'       => 'center-ads-3',
                'type'     => 'media',
                'title'    => __( 'Center Right Ads', 'bee-news' ),
                'subtitle' => __( 'Right Center Ads', 'bee-news' ),
                'desc'     => __( 'Upload 390 X 114 Pixels Image', 'bee-news' ),
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/adv-half.jpg'
                )
            ),
            array(
                'id'       => 'center-ads-3-Link',
                'type'     => 'text',
                'title'    => __( 'Center Right Ads Link', 'bee-news' ),
                'subtitle' => __( 'Right Center Ads Link', 'bee-news' ),
            ),
            array(
                'id'       => 'bottom-ads',
                'type'     => 'media',
                'title'    => __( 'Bottom Ads', 'bee-news' ),
                'subtitle' => __( 'Bottom Center Ads', 'bee-news' ),
                'desc'     => __( 'Upload 1140 X 92 Pixels Image', 'bee-news' ),
                'default'  => array(
                    'url' => get_template_directory_uri().'/images/adv-full.jpg'
                )
            ),
            array(
                'id'       => 'bottom-ads-Link',
                'type'     => 'text',
                'title'    => __( 'Bottom Ads Link', 'bee-news' ),
                'subtitle' => __( 'Bottom Center Ads Link', 'bee-news' ),
            ),
        )
    ) );

    /*
     * <--- END SECTIONS
     */
