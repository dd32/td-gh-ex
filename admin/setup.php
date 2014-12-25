<?php
//register setting
function blue_planet_register_settings(){
    register_setting('blue-planet-options-group', 'blueplanet_options', 'blue_planet_validate_options' );
    //
    // General Section
    add_settings_section('blue_planet_general_settings', __( 'General', 'blue-planet' ) , '__return_false', 'blue-planet-general');
    add_settings_field(
        'blue_planet_field_custom_favicon',
        __( 'Custom Favicon', 'blue-planet' ),
        'blue_planet_field_upload_common_callback',
        'blue-planet-general',
        'blue_planet_general_settings',
        array(
            'id'          => 'custom_favicon',
            'description' => __( 'Upload your favicon. Recommended size 16px X 16px', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_custom_css',
        __( 'Custom CSS', 'blue-planet' ),
        'blue_planet_field_textarea_common_callback',
        'blue-planet-general',
        'blue_planet_general_settings',
        array(
            'id'          => 'custom_css',
            'description' => __( 'Enter your Custom CSS here.', 'blue-planet' ),
        )
    );

    add_settings_field(
        'blue_planet_field_feedburner_url',
        __( 'Feedburner URL', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-general',
        'blue_planet_general_settings',
        array(
            'id'          => 'feedburner_url',
            'description' => __( 'Enter FeedbBurner URL.', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_search_placeholder',
        __( 'Default text in Search box', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-general',
        'blue_planet_general_settings',
        array(
            'id'          => 'search_placeholder',
            'description' => __( 'Enter default text in Search box', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_flg_enable_goto_top',
        __( 'Enable Goto Top', 'blue-planet' ),
        'blue_planet_field_checkbox_common_callback',
        'blue-planet-general',
        'blue_planet_general_settings',
        array(
            'id'          => 'flg_enable_goto_top',
            'description' => __( 'Check to enable', 'blue-planet' ),
        )
    );
    //
    // Header Section
    add_settings_section('blue_planet_header_settings', __( 'Header', 'blue-planet' ) , '__return_false', 'blue-planet-header');
    add_settings_field(
        'blue_planet_field_banner_background_color',
        __( 'Banner background color', 'blue-planet' ),
        'blue_planet_field_color_common_callback',
        'blue-planet-header',
        'blue_planet_header_settings',
        array(
            'id'      => 'banner_background_color',
            'default' => '#00ADB3',
        )
    );
    add_settings_field(
        'blue_planet_field_flg_hide_social_icons',
        __( 'Hide Social icons', 'blue-planet' ),
        'blue_planet_field_checkbox_common_callback',
        'blue-planet-header',
        'blue_planet_header_settings',
        array(
            'id'          => 'flg_hide_social_icons',
            'description' => __( 'Check to hide', 'blue-planet' ),
        )
    );
    //
    // Footer Section
    add_settings_section('blue_planet_footer_settings', __( 'Footer', 'blue-planet' ) , '__return_false', 'blue-planet-footer');
    add_settings_field(
        'blue_planet_field_flg_enable_footer_widgets',
        __( 'Enable Footer Widgets', 'blue-planet' ),
        'blue_planet_field_checkbox_common_callback',
        'blue-planet-footer',
        'blue_planet_footer_settings',
        array(
            'id'          => 'flg_enable_footer_widgets',
            'description' => __( 'Check to enable', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_number_of_footer_widgets',
        __( 'Number of Footer widgets', 'blue-planet' ),
        'blue_planet_field_select_common_callback',
        'blue-planet-footer',
        'blue_planet_footer_settings',
        array(
            'id'          => 'number_of_footer_widgets',
            'options' => array(
                '1' => __( '1', 'blue-planet' ),
                '2' => __( '2', 'blue-planet' ),
                '3' => __( '3', 'blue-planet' ),
                '4' => __( '4', 'blue-planet' ),
                '6' => __( '6', 'blue-planet' ),
              ),
        )
    );
    add_settings_field(
        'blue_planet_field_copyright_text',
        __( 'Copyright text', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-footer',
        'blue_planet_footer_settings',
        array(
            'id'          => 'copyright_text',
            'description' => __( 'Enter copyright text.', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_flg_hide_powered_by',
        __( 'Hide Powered By', 'blue-planet' ),
        'blue_planet_field_checkbox_common_callback',
        'blue-planet-footer',
        'blue_planet_footer_settings',
        array(
            'id'          => 'flg_hide_powered_by',
            'description' => __( 'Check to hide', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_flg_hide_footer_social_icons',
        __( 'Hide Social icons in footer', 'blue-planet' ),
        'blue_planet_field_checkbox_common_callback',
        'blue-planet-footer',
        'blue_planet_footer_settings',
        array(
            'id'          => 'flg_hide_footer_social_icons',
            'description' => __( 'Check to hide', 'blue-planet' ),
        )
    );
    //
    // Layout Section
    add_settings_section('blue_planet_layout_settings', __( 'Layout', 'blue-planet' ) , '__return_false', 'blue-planet-layout');
    add_settings_field(
        'blue_planet_field_default_layout',
        __( 'Default Layout', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-layout',
        'blue_planet_layout_settings',
        array(
            'id'      => 'default_layout',
            'options' => array(
                'right-sidebar' => __( 'Right Sidebar', 'blue-planet' ),
                'left-sidebar'  => __( 'Left Sidebar', 'blue-planet' ),
              ),
        )
    );
    add_settings_field(
        'blue_planet_field_content_layout',
        __( 'Content Layout', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-layout',
        'blue_planet_layout_settings',
        array(
            'id'      => 'content_layout',
            'options' => array(
                'full'          => __( 'Full', 'blue-planet' ),
                'excerpt'       => __( 'Excerpt', 'blue-planet' ),
                'excerpt-thumb' => __( 'Excerpt with thumbnail', 'blue-planet' ),
              ),
        )
    );
    //
    // Blog Section
    add_settings_section('blue_planet_blog_settings', __( 'Blog', 'blue-planet' ) , '__return_false', 'blue-planet-blog');
    add_settings_field(
        'blue_planet_field_read_more_text',
        __( 'Read more text', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-blog',
        'blue_planet_blog_settings',
        array(
            'id'          => 'read_more_text',
            'description' => __( "Enter text to replace 'Read more'", 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_excerpt_length',
        __( 'Excerpt length', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-blog',
        'blue_planet_blog_settings',
        array(
            'id'          => 'excerpt_length',
            'description' => __( "Enter excerpt length", 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_post_per_page',
        __( 'Post per page', 'blue-planet' ),
        'blue_planet_field_link_common_callback',
        'blue-planet-blog',
        'blue_planet_blog_settings',
        array(
            'url'  => admin_url( 'options-reading.php' ),
            'text' => __( "Change Post per page", 'blue-planet' ),
        )
    );
    //
    // Slider Section
    add_settings_section('blue_planet_slider_settings', __( 'Slider', 'blue-planet' ) , '__return_false', 'blue-planet-slider');
    add_settings_field(
        'blue_planet_field_message_main_slider',
        '',
        'blue_planet_field_subheading_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'description' => __( 'Main Slider', 'blue-planet' ),
          )
    );
    add_settings_field(
        'blue_planet_field_message_slide_size_recommendation',
        '',
        'blue_planet_field_message_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'description' => __( 'Recommended image size for banner slider : 1140px X 250px', 'blue-planet' ),
          )
    );

    add_settings_field(
        'blue_planet_field_slider_status',
        __( 'Show slider in', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'slider_status',
            'options' => array(
                'home' => __( 'Home page Only', 'blue-planet' ),
                'all'  => __( 'All pages', 'blue-planet' ),
                'none' => __( 'Disable', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_transition_effect',
        __( 'Transition Effect', 'blue-planet' ),
        'blue_planet_field_select_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'transition_effect',
            'options' => array(
                'boxRain'            => __( 'boxRain', 'blue-planet' ),
                'boxRainGrow'        => __( 'boxRainGrow', 'blue-planet' ),
                'boxRainReverse'     => __( 'boxRainReverse', 'blue-planet' ),
                'boxRainGrowReverse' => __( 'boxRainGrowReverse', 'blue-planet' ),
                'boxRandom'          => __( 'boxRandom', 'blue-planet' ),
                'fade'               => __( 'fade', 'blue-planet' ),
                'fold'               => __( 'fold', 'blue-planet' ),
                'random'             => __( 'random', 'blue-planet' ),
                'sliceDown'          => __( 'sliceDown', 'blue-planet' ),
                'sliceDownLeft'      => __( 'sliceDownLeft', 'blue-planet' ),
                'sliceUp'            => __( 'sliceUp', 'blue-planet' ),
                'sliceUpDown'        => __( 'sliceUpDown', 'blue-planet' ),
                'sliceUpDownLeft'    => __( 'sliceUpDownLeft', 'blue-planet' ),
                'slideInRight'       => __( 'slideInRight', 'blue-planet' ),
                'slideInLeft'        => __( 'slideInLeft', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_direction_nav',
        __( 'Direction Nav', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'direction_nav',
            'description' => __( 'Next Previous buttons', 'blue-planet' ),
            'options'     => array(
                '1' => __( 'Show', 'blue-planet' ),
                '0' => __( 'Hide', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_slider_autoplay',
        __( 'Auto Play', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'slider_autoplay',
            'options' => array(
                '1' => __( 'On', 'blue-planet' ),
                '0' => __( 'Off', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_transition_delay',
        __( 'Transition Delay', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'transition_delay',
            'description' => __( 'in seconds', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_transition_length',
        __( 'Transition Length', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'transition_length',
            'description' => __( 'in seconds', 'blue-planet' ),
        )
    );

    for( $i=0 ; $i < 5; $i++ ) {

      add_settings_field(
          'blue_planet_field_message_slider_count'.$i,
          '',
          'blue_planet_field_message_common_callback',
          'blue-planet-slider',
          'blue_planet_slider_settings',
          array(
              'count'          => $i,
              'description' => __( 'Slide', 'blue-planet' ) . ' - ' . ( $i + 1 ),
            )
      );

      add_settings_field(
          'blue_planet_field_main_slider_image'.$i,
          __( 'Slider Image', 'blue-planet' ),
          'blue_planet_field_upload_repeatable_common_callback',
          'blue-planet-slider',
          'blue_planet_slider_settings',
          array(
              'id'          => 'main_slider_image',
              'count'       => $i,
          )
      );
      add_settings_field(
          'blue_planet_field_main_slider_caption'.$i,
          __( 'Slider Caption', 'blue-planet' ),
          'blue_planet_field_textarea_repeatable_common_callback',
          'blue-planet-slider',
          'blue_planet_slider_settings',
          array(
              'id'          => 'main_slider_caption',
              'count'       => $i,
          )
      );

      add_settings_field(
          'blue_planet_field_main_slider_url'.$i,
          __( 'Slider URL', 'blue-planet' ),
          'blue_planet_field_url_repeatable_common_callback',
          'blue-planet-slider',
          'blue_planet_slider_settings',
          array(
              'id'          => 'main_slider_url',
              'count'       => $i,
          )
      );
      add_settings_field(
          'blue_planet_field_main_slider_new_tab'.$i,
          __( 'Open in new tab', 'blue-planet' ),
          'blue_planet_field_select_repeatable_common_callback',
          'blue-planet-slider',
          'blue_planet_slider_settings',
          array(
              'id'          => 'main_slider_new_tab',
              'count'       => $i,
              'options' => array(
                  '1' => __( 'Yes', 'blue-planet' ),
                  '0' => __( 'No', 'blue-planet' ),
                  ),

          )
      );



    }
    add_settings_field(
        'blue_planet_field_message_secondary_slider',
        '',
        'blue_planet_field_subheading_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'description' => __( 'Secondary Slider', 'blue-planet' ),
          )
    );
    add_settings_field(
        'blue_planet_field_slider_status_2',
        __( 'Show slider in', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'slider_status_2',
            'options' => array(
                'home' => __( 'Home page Only', 'blue-planet' ),
                'none' => __( 'Disable', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_number_of_slides_2',
        __( 'Number of slides', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'number_of_slides_2',
        )
    );
    add_settings_field(
        'blue_planet_field_slider_category_2',
        __( 'Show slides from', 'blue-planet' ),
        'blue_planet_field_category_select_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'slider_category_2',
        )
    );
    add_settings_field(
        'blue_planet_field_transition_effect_2',
        __( 'Transition Effect', 'blue-planet' ),
        'blue_planet_field_select_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'transition_effect_2',
            'options' => array(
                'boxRain'            => __( 'boxRain', 'blue-planet' ),
                'boxRainGrow'        => __( 'boxRainGrow', 'blue-planet' ),
                'boxRainReverse'     => __( 'boxRainReverse', 'blue-planet' ),
                'boxRainGrowReverse' => __( 'boxRainGrowReverse', 'blue-planet' ),
                'boxRandom'          => __( 'boxRandom', 'blue-planet' ),
                'fade'               => __( 'fade', 'blue-planet' ),
                'fold'               => __( 'fold', 'blue-planet' ),
                'random'             => __( 'random', 'blue-planet' ),
                'sliceDown'          => __( 'sliceDown', 'blue-planet' ),
                'sliceDownLeft'      => __( 'sliceDownLeft', 'blue-planet' ),
                'sliceUp'            => __( 'sliceUp', 'blue-planet' ),
                'sliceUpDown'        => __( 'sliceUpDown', 'blue-planet' ),
                'sliceUpDownLeft'    => __( 'sliceUpDownLeft', 'blue-planet' ),
                'slideInRight'       => __( 'slideInRight', 'blue-planet' ),
                'slideInLeft'        => __( 'slideInLeft', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_control_nav_2',
        __( 'Control Nav', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'control_nav_2',
            'description' => __( 'Control navigation of slider', 'blue-planet' ),
            'options'     => array(
                '1' => __( 'Show', 'blue-planet' ),
                '0' => __( 'Hide', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_direction_nav_2',
        __( 'Direction Nav', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'direction_nav_2',
            'description' => __( 'Next Previous buttons', 'blue-planet' ),
            'options'     => array(
                '1' => __( 'Show', 'blue-planet' ),
                '0' => __( 'Hide', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_slider_autoplay_2',
        __( 'Auto Play', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'slider_autoplay_2',
            'options' => array(
                '1' => __( 'On', 'blue-planet' ),
                '0' => __( 'Off', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_slider_caption_2',
        __( 'Caption', 'blue-planet' ),
        'blue_planet_field_radio_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'      => 'slider_caption_2',
            'options' => array(
                '1' => __( 'On', 'blue-planet' ),
                '0' => __( 'Off', 'blue-planet' ),
                ),
        )
    );
    add_settings_field(
        'blue_planet_field_transition_delay_2',
        __( 'Transition Delay', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'transition_delay_2',
            'description' => __( 'in seconds', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_transition_length_2',
        __( 'Transition Length', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-slider',
        'blue_planet_slider_settings',
        array(
            'id'          => 'transition_length_2',
            'description' => __( 'in seconds', 'blue-planet' ),
        )
    );






    //
    // Administration Section
    add_settings_section('blue_planet_administration_settings', __( 'Administration', 'blue-planet' ) , '__return_false', 'blue-planet-administration');
    add_settings_field(
        'blue_planet_field_javascript_header',
        __( 'Javascript in Header', 'blue-planet' ),
        'blue_planet_field_textarea_common_callback',
        'blue-planet-administration',
        'blue_planet_administration_settings',
        array(
            'id'          => 'javascript_header',
            'description' => __( 'Enter your Javascript script code to put in HEADER', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_javascript_footer',
        __( 'Javascript in Footer', 'blue-planet' ),
        'blue_planet_field_textarea_common_callback',
        'blue-planet-administration',
        'blue_planet_administration_settings',
        array(
            'id'          => 'javascript_footer',
            'description' => __( 'Enter your Javascript script code to put in FOOTER', 'blue-planet' ),
        )
    );
    //
    // Navigation Section
    add_settings_section('blue_planet_navigation_settings', __( 'Navigation', 'blue-planet' ) , '__return_false', 'blue-planet-navigation');
    add_settings_field(
        'blue_planet_field_create_menu',
        __( 'Create Menu', 'blue-planet' ),
        'blue_planet_field_link_common_callback',
        'blue-planet-navigation',
        'blue_planet_navigation_settings',
        array(
            'url'  => add_query_arg( array('action'=>'edit','menu'=>0), admin_url( 'nav-menus.php' ) ),
            'text' => __( 'New Menu', 'blue-planet' ),
        )
    );

    $assign_menu_link = add_query_arg( array('action'=>'locations'), admin_url( 'nav-menus.php' ) );
    if ( function_exists('the_archive_title') ) {
        // WP 4.1 >=
        $assign_menu_link = add_query_arg( array('autofocus[section]'=>'nav'), admin_url( 'customize.php' ) );
    }
    add_settings_field(
        'blue_planet_field_assign_menu',
        __( 'Assign Menu', 'blue-planet' ),
        'blue_planet_field_link_common_callback',
        'blue-planet-navigation',
        'blue_planet_navigation_settings',
        array(
            'url'  => $assign_menu_link,
            'text' => __( 'Assign Menu', 'blue-planet' ),
        )
    );
    //
    // Color Section
    add_settings_section('blue_planet_color_settings', __( 'Color', 'blue-planet' ) , '__return_false', 'blue-planet-color');
    $background_change_url = add_query_arg( array('page'=>'custom-background'), admin_url( 'themes.php' ) );
    if ( function_exists('the_archive_title')) {
        // WP 4.1 >=
        $background_change_url = add_query_arg( array('autofocus[control]'=>'background_color'), admin_url( 'customize.php' ) );
    }
    add_settings_field(
        'blue_planet_field_main_background_color',
        __( 'Main Background Color', 'blue-planet' ),
        'blue_planet_field_link_common_callback',
        'blue-planet-color',
        'blue_planet_color_settings',
        array(
            'url'  => $background_change_url,
            'text' => __( 'Change Background', 'blue-planet' ),
        )
    );
    $site_title_color_change = add_query_arg( array('page'=>'custom-header'), admin_url( 'themes.php' ) );
    if ( function_exists('the_archive_title')) {
        // WP 4.1 >=
        $site_title_color_change = add_query_arg( array('autofocus[control]'=>'header_textcolor'), admin_url( 'customize.php' ) );
    }

    add_settings_field(
        'blue_planet_field_site_title_color',
        __( 'Site Title Color', 'blue-planet' ),
        'blue_planet_field_link_common_callback',
        'blue-planet-color',
        'blue_planet_color_settings',
        array(
            'url'  => $site_title_color_change,
            'text' => __( 'Change Color', 'blue-planet' ),
        )
    );
    //
    // Social Section
    add_settings_section('blue_planet_social_settings', __( 'Social', 'blue-planet' ) , '__return_false', 'blue-planet-social');
    add_settings_field(
        'blue_planet_field_social_facebook',
        __( 'Facebook', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_facebook',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_twitter',
        __( 'Twitter', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_twitter',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_googleplus',
        __( 'Google Plus', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_googleplus',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_youtube',
        __( 'Youtube', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_youtube',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_pinterest',
        __( 'Pinterest', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_pinterest',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_linkedin',
        __( 'Linkedin', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_linkedin',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_vimeo',
        __( 'Vimeo', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_vimeo',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_flickr',
        __( 'Flickr', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_flickr',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_tumblr',
        __( 'Tumblr', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_tumblr',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_dribbble',
        __( 'Dribbble', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_dribbble',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_deviantart',
        __( 'deviantART', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_deviantart',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_rss',
        __( 'RSS', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_rss',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_instagram',
        __( 'Instagram', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_instagram',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_skype',
        __( 'Skype', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_skype',
            'description' => __( 'Please enter Skype ID', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_digg',
        __( 'Digg', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_digg',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_stumbleupon',
        __( 'Stumbleupon', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_stumbleupon',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_forrst',
        __( 'Forrst', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_forrst',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_500px',
        __( '500px', 'blue-planet' ),
        'blue_planet_field_url_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_500px',
            'description' => __( 'Please enter Full URL', 'blue-planet' ),
        )
    );
    add_settings_field(
        'blue_planet_field_social_email',
        __( 'Email', 'blue-planet' ),
        'blue_planet_field_text_common_callback',
        'blue-planet-social',
        'blue_planet_social_settings',
        array(
            'id'          => 'social_email',
            'description' => __( 'Please enter email address', 'blue-planet' ),
        )
    );




    //
}
add_action('admin_init', 'blue_planet_register_settings' );
//////

function blue_planet_field_upload_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <input type="text" class="upload-url regular-text" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="<?php echo esc_url( $value ); ?>" />
    <input id="bp_upload_button" class="bp_upload_button button button-primary" type="button"
           value="<?php esc_attr_e('Upload', 'blue-planet'); ?>" />
    <?php if ( ! empty( $value ) ): ?>
      <div class="image-preview">
        <?php echo '<img src="' . esc_url( $value ) . '" alt="" style="max-width:150px;"/>'; ?>
      </div><!-- .image-preview -->
    <?php endif ?>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_upload_repeatable_common_callback($args){
    if ( ! isset( $args['id'] ) || ! isset( $args['count'] ) ) {
        return;
    }
    $value_arr = blueplanet_get_option( $args['id'] );
    $value = '';
    if ( isset($value_arr[$args['count']]) ) {
      $value = $value_arr[$args['count']];
    }

    ?>
    <input type="text" class="upload-url regular-text" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].'][]' ); ?>" value="<?php echo esc_url( $value ); ?>" />
    <input id="bp_upload_button" class="bp_upload_button button button-primary" type="button"
           value="<?php esc_attr_e('Upload', 'blue-planet'); ?>" />
    <?php if ( ! empty( $value ) ): ?>
      <div class="image-preview">
        <?php echo '<img src="' . esc_url( $value ) . '" alt="" style="max-width:150px;"/>'; ?>
      </div><!-- .image-preview -->
    <?php endif ?>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_link_common_callback($args){
    if ( ! isset( $args['url'] ) || ! isset( $args['text'] ) ) {
        return;
    }
    ?>
    <a href="<?php echo esc_attr( $args['url'] ); ?>" class="button" target="_blank" ><?php echo $args['text']; ?></a>


    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}


function blue_planet_field_text_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <input type="text" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="<?php echo esc_attr( $value ); ?>" class="regular-text" />
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_subheading_common_callback($args){
    ?>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <h3><?php echo $args['description']; ?></h3>
    <?php endif ?>
    <?php
}

function blue_planet_field_message_common_callback($args){
    ?>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <h4><?php echo $args['description']; ?></h4>
    <?php endif ?>
    <?php
}


function blue_planet_field_category_select_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    $args= array(
      'orderby'    => 'name',
      'hide_empty' => true,
      'name'       => esc_attr( 'blueplanet_options['.$args['id'].']' ),
      'selected'   => $value,
    );
    wp_dropdown_categories( $args );
    ?>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_textarea_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    if ( ! isset( $args['row'] ) || absint( $args['row'] ) < 1  ) {
      $args['row'] = 5;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <textarea id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" rows="<?php echo esc_attr($args['row']); ?>" class="large-text"><?php echo esc_textarea( $value ); ?></textarea>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_textarea_repeatable_common_callback($args){

    if ( ! isset( $args['id'] ) || ! isset( $args['count'] ) ) {
        return;
    }
    if ( ! isset( $args['row'] ) || absint( $args['row'] ) < 1  ) {
      $args['row'] = 5;
    }
    $value_arr = blueplanet_get_option( $args['id'] );
    $value = '';
    if ( isset($value_arr[$args['count']]) ) {
      $value = $value_arr[$args['count']];
    }

    ?>
    <textarea id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].'][]' ); ?>" rows="<?php echo esc_attr($args['row']); ?>" class="large-text"><?php echo esc_textarea( $value ); ?></textarea>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_radio_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    if ( ! isset( $args['options'] ) || empty( $args['options'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>

      <?php foreach ($args['options'] as $key => $opt): ?>
      <input type="radio" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php checked( $key, $value ); ?>/>
        <span class="radio-text"><?php echo esc_html( $opt ); ?></span>
      <?php endforeach ?>

    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}
function blue_planet_field_select_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    if ( ! isset( $args['options'] ) || empty( $args['options'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <select id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>">

      <?php foreach ($args['options'] as $key => $opt): ?>
        <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $value ); ?>><?php echo esc_html( $opt ); ?></option>
      <?php endforeach ?>

    </select>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_select_repeatable_common_callback($args){

    if ( ! isset( $args['id'] ) || ! isset( $args['count'] ) ) {
        return;
    }
    if ( ! isset( $args['options'] ) || empty( $args['options'] ) ) {
        return;
    }
    $value_arr = blueplanet_get_option( $args['id'] );
    $value = '';
    if ( isset($value_arr[$args['count']]) ) {
      $value = $value_arr[$args['count']];
    }

    ?>
    <select id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].'][]' ); ?>">

      <?php foreach ($args['options'] as $key => $opt): ?>
        <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, $value ); ?>><?php echo esc_html( $opt ); ?></option>
      <?php endforeach ?>

    </select>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_url_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <input type="url" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="<?php echo esc_url( $value ); ?>" class="regular-text"/>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}

function blue_planet_field_url_repeatable_common_callback($args){
    if ( ! isset( $args['id'] ) || ! isset( $args['count'] ) ) {
        return;
    }
    $value_arr = blueplanet_get_option( $args['id'] );
    $value = '';
    if ( isset($value_arr[$args['count']]) ) {
      $value = $value_arr[$args['count']];
    }
    ?>
    <input type="url" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].'][]' ); ?>" value="<?php echo esc_url( $value ); ?>" class="regular-text"/>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <p class="description"><?php echo $args['description']; ?></p>
    <?php endif ?>
    <?php
}
function blue_planet_field_checkbox_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <input type="checkbox" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="1" <?php checked( '1', $value ); ?>/>
    <?php if ( isset( $args['description'] ) && '' != $args['description'] ): ?>
        <span class="description"><?php echo $args['description']; ?></span>
    <?php endif ?>
    <?php
}

function blue_planet_field_color_common_callback($args){
    if ( ! isset( $args['id'] ) ) {
        return;
    }
    $value = blueplanet_get_option( $args['id'] );
    ?>
    <input type="text" id="<?php echo esc_attr( $args['id'] ); ?>" name="<?php echo esc_attr( 'blueplanet_options['.$args['id'].']' ); ?>" value="<?php echo esc_attr( $value ); ?>" class="bp-color-field"
        <?php if (isset($args['default']) && ! empty($args['default'])): ?>
            <?php echo ' data-default-color="'.esc_attr($args['default']).'" '; ?>
        <?php endif ?>
        />
    <?php
}

//Add theme option menu in sidebar
function blue_planet_theme_options_start() {
    add_theme_page( __('Blue Planet Theme Options','blue-planet'), __('Blue Planet Theme Options','blue-planet'), 'edit_theme_options', 'theme_options', 'blue_planet_theme_options_page' );
}

add_action( 'admin_menu', 'blue_planet_theme_options_start' );
////
function blue_planet_theme_options_page(){
  //   if (!isset($_REQUEST['settings-updated']))
		// $_REQUEST['settings-updated'] = false;

    require get_template_directory() . '/admin/view.php';

    // global $blueplanet_options_settings;
    // $bp_options = $blueplanet_options_settings;

}

//option validation
function blue_planet_validate_options($input){
    //validate here

    //General settings validation
    $input['custom_favicon'] = esc_url_raw($input['custom_favicon']);
    $input['feedburner_url'] = esc_url_raw($input['feedburner_url']);
    $input['custom_css']     = blue_planet_dumb_css_sanitize($input['custom_css']);

    //Header settings validation
    $input['banner_background_color'] = blue_planet_sanitize_hex_color($input['banner_background_color']);
    $input['banner_background_color'] = (!empty($input['banner_background_color']))?$input['banner_background_color']:'#00adb3';
    $input['search_placeholder']      = sanitize_text_field($input['search_placeholder']);

    //Footer settings validation
    $input['number_of_footer_widgets'] = (absint($input['number_of_footer_widgets'])) ? absint($input['number_of_footer_widgets']) : 3 ;
    $input['copyright_text']           = sanitize_text_field($input['copyright_text']);

    //Blog settings validation
    $input['read_more_text'] = htmlentities( sanitize_text_field ( $input[ 'read_more_text' ] ), ENT_QUOTES, 'UTF-8' );
    $input['excerpt_length'] = (absint($input['excerpt_length']))? absint($input['excerpt_length']):40;


    //Social URl validation
    $input['social_facebook']    = esc_url_raw($input['social_facebook']);
    $input['social_twitter']     = esc_url_raw($input['social_twitter']);
    $input['social_googleplus']  = esc_url_raw($input['social_googleplus']);
    $input['social_youtube']     = esc_url_raw($input['social_youtube']);
    $input['social_pinterest']   = esc_url_raw($input['social_pinterest']);
    $input['social_linkedin']    = esc_url_raw($input['social_linkedin']);
    $input['social_vimeo']       = esc_url_raw($input['social_vimeo']);
    $input['social_flickr']      = esc_url_raw($input['social_flickr']);
    $input['social_tumblr']      = esc_url_raw($input['social_tumblr']);
    $input['social_dribbble']    = esc_url_raw($input['social_dribbble']);
    $input['social_deviantart']  = esc_url_raw($input['social_deviantart']);
    $input['social_rss']         = esc_url_raw($input['social_rss']);
    $input['social_instagram']   = esc_url_raw($input['social_instagram']);
    $input['social_skype']       = esc_attr($input['social_skype']);
    $input['social_500px']       = esc_url_raw($input['social_500px']);
    $input['social_email']       = sanitize_email($input['social_email']);
    $input['social_forrst']      = esc_url_raw($input['social_forrst']);
    $input['social_stumbleupon'] = esc_url_raw($input['social_stumbleupon']);
    $input['social_digg']        = esc_url_raw($input['social_digg']);

    //Administration settings validation
    $input['javascript_header'] = esc_js($input['javascript_header']);
    $input['javascript_footer'] = esc_js($input['javascript_footer']);

    //Slider settings validation
    $input['slider_status']     = esc_attr($input['slider_status']);
    $input['transition_effect'] = wp_filter_nohtml_kses( $input['transition_effect'] ) ;
    $input['direction_nav']     = absint( $input['direction_nav'] );
    $input['slider_autoplay']   = absint( $input['slider_autoplay'] );
    $input['transition_delay']  = ( absint($input['transition_delay'] ) ) ? absint( $input['transition_delay'] ) : 4 ;
    $input['transition_length'] = ( absint($input['transition_length'] ) ) ? absint( $input['transition_length'] ) : 1 ;
    for( $i=0 ; $i < 5 ; $i++ ) {
        $input['main_slider_image'][$i]   = esc_url_raw($input['main_slider_image'][$i]);
        $input['main_slider_caption'][$i] = sanitize_text_field($input['main_slider_caption'][$i]);
        $input['main_slider_url'][$i]     = esc_url_raw($input['main_slider_url'][$i]);
        $input['main_slider_new_tab'][$i] = absint($input['main_slider_new_tab'][$i]);
    }

    $input['slider_status_2']     = esc_attr($input['slider_status_2']);
    $input['number_of_slides_2']  = ( absint($input['number_of_slides_2'] ) ) ? absint( $input['number_of_slides_2'] ) : 3 ;
    $input['slider_category_2']   = ( absint($input['slider_category_2'] ) ) ? absint( $input['slider_category_2'] ) : 1 ;
    $input['transition_effect_2'] = wp_filter_nohtml_kses( $input['transition_effect_2'] ) ;
    $input['control_nav_2']       = absint( $input['control_nav_2'] );
    $input['direction_nav_2']     = absint( $input['direction_nav_2'] );
    $input['slider_autoplay_2']   = absint( $input['slider_autoplay_2'] );
    $input['slider_caption_2']    = absint( $input['slider_caption_2'] );
    $input['transition_delay_2']  = ( absint($input['transition_delay_2'] ) ) ? absint( $input['transition_delay_2'] ) : 4 ;
    $input['transition_length_2'] = ( absint($input['transition_length_2'] ) ) ? absint( $input['transition_length_2'] ) : 1 ;

    return $input;
}


add_action('admin_head-appearance_page_theme_options', 'blue_planet_theme_option_head');
function blue_planet_theme_option_head() {
    ?>
    <style>
    .tab-item-wrap > h3{display:none;}
    .image-preview{margin-top:5px;}
    </style>
    <?php
}
