<?php
    global $apbasic_options;
    
    $apbasic_options = array(
        //Header Options
        'header_logo' => '',
        'show_header' => 'header_text_only',
        'activate_favicon' => 0,
        'favicon' => '',
        'show_search' => 1,
        'show_social_links' => 1,
        'header_text' => 'Call Us: +1-123-123-45-78',
        'footer_text' => '',
        
        //Design Options
        'site_layout' => 'full_width',
        'template_color' => '#dc3522',
        'background_image' => 'pattern0',
        'default_layout' => 'no_sidebar_wide',
        'default_page_layout' => 'no_sidebar_wide',
        'default_post_layout' => 'no_sidebar_wide',
        'blog_post_display_type' => 'blog_image_large',
        'show_footer_featured_section' => '',
        'enable_comments_page' => '',
        'enable_comments_post' => '',
        'open_slider_link_in_new_tab' => 1,
        
        //Slider Settings
        'show_slider' => 'no',
        'slider_type' => 'default',
        'show_slider_in_post' => 1,
        'slider_mode' => 'horizontal',
        'slide1' => '',
        'slide1_title' => '',
        'slide1_description' => '',
        'slide1_readmore_text' => '',
        'slide1_readmore_link' => '',
        'slide1_readmore_button_icon' => '',
        'slide2' => '',
        'slide2_title' => '',
        'slide2_description' => '',
        'slide2_readmore_text' => '',
        'slide2_readmore_link' => '',
        'slide2_readmore_button_icon' => '',
        'slide3' => '',
        'slide3_title' => '',
        'slide3_description' => '',
        'slide3_readmore_text' => '',
        'slide3_readmore_link' => '',
        'slide3_readmore_button_icon' => '',
        'slide4' => '',
        'slide4_title' => '',
        'slide4_description' => '',
        'slide4_readmore_text' => '',
        'slide4_readmore_link' => '',
        'slide4_readmore_button_icon' => '',
        
        // Translation Settings
        'features_readmore_text' => '',
        'services_readmore_text' => '',
        'blog_readmore_text' => '',
        'search_results_for_text' => '',
        'tagged_text' => '',
        'posted_on_text' => '',
        'by_text' => '',
        'posted_in_text' => ''        
    );
    
    if(is_admin()) :
    
    function accesspress_basic_admin_scripts(){
        wp_enqueue_media();
        wp_enqueue_script('media-upload');
        wp_enqueue_script('accesspress_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array('jquery','wp-color-picker'));
        wp_enqueue_script('of-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array('jquery'));
        
        wp_enqueue_style('font-awesome-css', get_template_directory_uri().'/css/fawesome/css/font-awesome.css');
        wp_enqueue_style('admin-styles', get_template_directory_uri().'/inc/admin-panel/css/admin-styles.css');
        wp_enqueue_style('wp-color-picker');
    }
    
    add_action('admin_print_styles-appearance_page_theme_options','accesspress_basic_admin_scripts');
    
    function accesspress_basic_other_admin_scripts(){
        wp_enqueue_style('other-admin-styles', get_template_directory_uri().'/inc/admin-panel/css/admin.css');
    }
    
    add_action('admin_enqueue_scripts','accesspress_basic_other_admin_scripts');
    
    add_action( 'admin_init', 'accesspress_basic_register_settings');
    add_action( 'admin_menu', 'accesspress_basic_theme_options');
    
    function accesspress_basic_register_settings(){
        register_setting( 'apbasic_theme_options', 'apbasic_options', 'accesspress_basic_validate_options');
    }
    
    function accesspress_basic_theme_options(){
        add_theme_page( __('Theme Options','accesspress-basic'), __('Theme Options','accesspress-basic'), 'edit_theme_options','theme_options','accesspress_basic_theme_options_page');
    }
    
    function accesspress_basic_theme_options_page(){
        global $apbasic_options;

        if(!isset($_REQUEST['settings-updated'])){
            $_REQUEST['settings-updated'] = false;
        }
        ?>
            <div class="wrap" id="optionsframework-wrap">
                <div class="apbasic-header clearfix">
                    <div class="accesspress_pro-logo">
                  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/logo.png" alt="<?php esc_html_e( 'AccessPress Basic', 'accesspress-basic' ); ?>" />
                     
                      <div class="theme-name">
                        <?php 
                        $theme = wp_get_theme();
                        echo esc_html($theme->get( 'Name' ))." V". esc_html($theme->get( 'Version' )) . esc_html__(' - Theme Option Panel','accesspress-basic'); ?>
                      </div>
                    </div>
                
                	<div class="ak-socials">
                        <h3>Need Support</h3>
                        <p>
                          <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/accesspress-basic-documentation/'); ?>"><?php esc_html_e('Online Documentation', 'accesspress-basic'); ?></a> | 
                          <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/support/forum/theme-accesspress-basic/'); ?>"><?php esc_html_e('Support Forum', 'accesspress-basic'); ?></a>
                        </p>
                    </div>
                    
                	<div class="clear"></div>
                </div>
                <?php if(false !== $_REQUEST['settings-updated']) : ?>
                    <div class="updated fade"><p><strong><?php esc_html_e( 'Options Saved','accesspress-basic'); ?></strong></p></div>
                <?php endif; ?>
                
                <div class="nav-tab-wrapper">
                    <a id="options-group-1-tab" class="nav-tab nav-tab-active" disp="#options-group-1" href="#"><?php esc_html_e('Header Settings','accesspress-basic'); ?>
                        <i class="fa fa-header"></i>
                    </a>                 
                    <a id="options-group-2-tab" class="nav-tab" disp="#options-group-2" href="#"><?php esc_html_e('Design Settings','accesspress-basic'); ?>
                        <i class="fa fa-cogs"></i>
                    </a>
                    <a id="options-group-3-tab" class="nav-tab" disp="#options-group-3" href="#"><?php esc_html_e('Slider Settings','accesspress-basic'); ?>
                        <i class="fa fa-file-image-o"></i>
                    </a>
                    <a id="options-group-4-tab" class="nav-tab" disp="#options-group-4" href="#"><?php esc_html_e('Translation','accesspress-basic'); ?>
                        <i class="fa fa-language"></i>
                    </a>
                    <a id="options-group-5-tab" class="nav-tab" disp="#options-group-5" href="#"><?php esc_html_e('About Accesspress Basic','accesspress-basic'); ?>
                        <i class="fa fa-info"></i>
                    </a>
                    <div class="banner-container">
                        <div class='update-banner'>
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/banner2.png">
                        </div>
                        <div class='any-question'>
                            <p>Any question!! <a href="<?php echo esc_url('https://accesspressthemes.com/contact/'); ?>">Click</a></p>
                        </div>
                        <div class='pro-adver clearfix'>
                            <a target="_blank" href="<?php echo esc_url('http://demo.accesspressthemes.com/accesspress-basic-pro/'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/demo-btn.png"></a>
                            <a target="_blank" href="<?php echo esc_url('https://accesspressthemes.com/wordpress-themes/accesspress-basic-pro/'); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/upgrade-btn.png"></a>
                        </div>
                        <h3 style="font-size: 16px; padding-left: 6px; padding-right: 4px; cursor: pointer" class='view-features'><?php esc_html_e('Pro Features', 'accesspress-basic'); ?><span>&#8250;</span></h3>
                        <div class='pro-banner' style="display: none">
                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin-panel/images/banner.png">
                        </div>
                    </div>
                </div>
                <div id="optionsframework-metabox" class="metabox-holder clearfix">
                    <form id="form_options" method="POST" action="options.php" enctype="multipart/form-data">
                        <?php $old_settings = get_option('apbasic_options', $apbasic_options); ?>
                        <?php $settings = wp_parse_args( $old_settings, $apbasic_options ); ?>
                        <?php settings_fields('apbasic_theme_options'); ?>
                        
                        <!-- Header Settings -->
                        <div id="options-group-1" class="group">
                            <h3><?php esc_html_e('Header Settings','accesspress-basic'); ?></h3>
                            <table class="form-table">
                                <tr>
                                    <th><label for="header_logo"><?php esc_html_e('Header Logo','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="header-logo-upload-section">
                                            <input id="header_logo" type="text" name="apbasic_options[header_logo]" value="<?php echo esc_url(get_header_image()); ?>" />
                                            <a href="<?php echo esc_url(admin_url('/themes.php?page=custom-header')); ?>"><input class="button" type="button" name="header_logo_upload_button" id="header_logo_upload_button" value="<?php esc_html_e('Upload','accesspress-basic'); ?>" /></a>
                                            <?php $logo_preview = $settings['header_logo']; ?>
                                            <div class="logo-preview" style="<?php if(empty($logo_preview)){echo "display: none;";} ?>">
                                                <img src="<?php echo esc_url($logo_preview); ?>" />
                                                <span class="remove_logo_preview"><?php echo esc_html__( 'Remove', 'accesspress-basic' ); ?></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $show_headers = array(
                                            array(
                                                'label' => __('Header Logo Only','accesspress-basic'),
                                                'value' => 'header_logo_only'
                                            ),
                                            array(
                                                'label' => __('Header Text Only','accesspress-basic'),
                                                'value' => 'header_text_only'
                                            ),
                                            array(
                                                'label' => __('Show Both','accesspress-basic'),
                                                'value' => 'show_both'
                                            ),
                                            array(
                                                'label' => __('Disable','accesspress-basic'),
                                                'value' => 'disable'
                                            ),
                                        );
                                    ?>
                                    <th><label for="show_header"><?php esc_html_e('Show','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($show_headers as $show_header) : ?>
                                            <div class="radio">
                                                <input type="radio" name="apbasic_options[show_header]" id="<?php echo esc_attr($show_header['value']); ?>" value="<?php echo esc_attr($show_header['value']); ?>" <?php checked($show_header['value'],$settings['show_header']); ?> />
                                                <label for="<?php echo esc_attr($show_header['value']); ?>"><?php echo esc_html($show_header['label']); ?></label><br />
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="header_text"><?php esc_html_e('Header Text','accesspress-basic'); ?></label></th>
                                    <td>
                                        <textarea name="apbasic_options[header_text]"><?php echo esc_attr($settings['header_text']); ?></textarea><br />
                                        <p><?php echo esc_html__('Use Contents From Instead','accesspress-basic').'<a target="_blank" href="'.esc_url(admin_url('widgets.php')).'">'.esc_html__(' Header Text Widget ','accesspress-basic').'</a>'.esc_html__('Instead','accesspress-basic'); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="favicon"><?php esc_html_e('Favicon','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[favicon]" id="favicon" value="<?php echo esc_url($settings['favicon']); ?>" />
                                        <input type="button" id="favicon_upload_btn" name="favicon_upload_btn" class="button" value="<?php esc_html_e('Upload','accesspress-basic'); ?>" />
                                        <?php $favicon = $settings['favicon']; ?>
                                        <div class="favicon_preview" style="<?php if(empty($favicon)){echo "display: none;";} ?>">
                                            <img src="<?php echo esc_url($favicon); ?>" />
                                            <span class="remove_favicon_preview" ><?php esc_html_e( 'Remove', 'accesspress-basic' ); ?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="ap_footer_text"><?php esc_html_e('Footer Text','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[footer_text]" id="ap_footer_text" value="<?php echo esc_attr($settings['footer_text']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="activate_favicon"><?php esc_html_e('Activate Favicon','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" name="apbasic_options[activate_favicon]" id="activate_favicon" value="1" <?php checked(true,$settings['activate_favicon']); ?> />
                                            <label for="activate_favicon"><?php esc_html_e('Activate the favicon to display it in your site','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="show_search"><?php esc_html_e('Show Search','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" name="apbasic_options[show_search]" value="1" id="show_search" <?php checked(true,$settings['show_search']); ?> />
                                            <label for="show_search"><?php esc_html_e('Show Search in Header','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="show_social_links"><?php esc_html_e('Show Social Links','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" name="apbasic_options[show_social_links]" value="1" id="show_social_links" <?php checked(true,$settings['show_social_links']); ?> />
                                            <label for="show_social_links"><?php esc_html_e('show Social Icons in Header','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <!-- Design Settings -->
                        <div id="options-group-2" class="group">
                            <h3><?php esc_html_e('Design Settings','accesspress-basic'); ?></h3>
                            <table class="form-table">
                                <?php
                                    $site_layouts = array(
                                        array(
                                            'label' => __('Boxed','accesspress-basic'),
                                            'value' => 'boxed'
                                        ),
                                        array(
                                            'label' => __('Full Width','accesspress-basic'),
                                            'value' => 'full_width'
                                        ),
                                    );
                                ?>
                                <tr>
                                    <th><label><?php esc_html_e('Site Layout','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($site_layouts as $site_layout) : ?>
                                            <div class="radio">
                                                <input class="sel_site_layout" type="radio" id="<?php echo esc_attr($site_layout['value']); ?>" name="apbasic_options[site_layout]" value="<?php echo esc_attr($site_layout['value']); ?>" <?php checked($site_layout['value'],$settings['site_layout']); ?> />
                                                <label for="<?php echo esc_attr($site_layout['value']); ?>"><?php echo esc_html($site_layout['label']); ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>

                                <tr>
                                    <th><label><?php esc_html_e('Template Color','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[template_color]" class="apbasic-color" id="ap_template_color" value="<?php echo esc_attr($settings['template_color']); ?>" />
                                        <i><?php esc_html_e( 'Set the template color for the site', 'accesspress-basic' ); ?></i>
                                    </td>
                                </tr>

                                <tr id="bk_pattern_tr">
                                    <?php
                                        $background_image = array('pattern0','pattern1','pattern3','pattern4','pattern5');
                                    ?>
                                    <th><label for="background_image"><?php esc_html_e('Background Image','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($background_image as $pat) : ?>
                                            <div class="pattern-img hide-radio">
                                                <input type="radio" id="<?php echo esc_attr($pat); ?>" value="<?php echo esc_attr($pat); ?>" name="apbasic_options[background_image]" <?php checked($pat,$settings['background_image']); ?> />
                                                <label class="inline-block" for="<?php echo esc_attr($pat); ?>">
                                                    <img src="<?php echo esc_url(get_template_directory_uri().'/inc/admin-panel/images/'.$pat.'.png'); ?>" />
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $default_layouts = array(
                                            array(
                                                'label' => __('Left Sidebar','accesspress-basic'),
                                                'value' => 'left_sidebar',
                                                'id' => 'left_sidebar_def',
                                                'image' => 'left-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Right Sidebar','accesspress-basic'),
                                                'value' => 'right_sidebar',
                                                'id' => 'right_sidebar_def',
                                                'image' => 'right-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Both Sidebar','accesspress-basic'),
                                                'value' => 'both_sidebar',
                                                'id' => 'both_sidebar_def',
                                                'image' => 'both-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Wide','accesspress-basic'),
                                                'value' => 'no_sidebar_wide',
                                                'id' => 'no_sidebar_wide_def',
                                                'image' => 'no-sidebar-wide.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Narrow','accesspress-basic'),
                                                'value' => 'no_sidebar_narrow',
                                                'id' => 'no_sidebar_narrow_def',
                                                'image' => 'no-sidebar-narrow.png'
                                            ),                 
                                        );
                                    ?>
                                    <th><label><?php esc_html_e('Default Layout (Category/Blog)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($default_layouts as $ap_layout) : ?>
                                            <div class="layout-image">
                                                <label for="<?php echo esc_attr($ap_layout['value']); ?>">
                                                    <img src="<?php echo esc_url(get_template_directory_uri().'/inc/admin-panel/images/'.$ap_layout['image']); ?>" />
                                                    <div>
                                                        <input type="radio" name="apbasic_options[default_layout]" id="<?php echo esc_attr($ap_layout['value']); ?>" value="<?php echo esc_attr($ap_layout['value']); ?>" <?php checked($ap_layout['value'],$settings['default_layout']); ?> />
                                                        <label><?php echo esc_html($ap_layout['label']); ?></label>
                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $page_layouts = array(
                                            array(
                                                'label' => __('Left Sidebar','accesspress-basic'),
                                                'value' => 'left_sidebar',
                                                'id' => 'left_sidebar_page',
                                                'image' => 'left-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Right Sidebar','accesspress-basic'),
                                                'value' => 'right_sidebar',
                                                'id' => 'right_sidebar_page',
                                                'image' => 'right-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Both Sidebar','accesspress-basic'),
                                                'value' => 'both_sidebar',
                                                'id' => 'both_sidebar_def',
                                                'image' => 'both-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Wide','accesspress-basic'),
                                                'value' => 'no_sidebar_wide',
                                                'id' => 'no_sidebar_wide_page',
                                                'image' => 'no-sidebar-wide.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Narrow','accesspress-basic'),
                                                'value' => 'no_sidebar_narrow',
                                                'id' => 'no_sidebar_narrow_page',
                                                'image' => 'no-sidebar-narrow.png'
                                            ),                 
                                        );
                                    ?>
                                    <th><label><?php esc_html_e('Default Layout (Pages Only)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($default_layouts as $ap_layout) : ?>
                                            <div class="layout-image">
                                                <label>
                                                    <img src="<?php echo esc_url(get_template_directory_uri().'/inc/admin-panel/images/'.$ap_layout['image']); ?>" />
                                                    <div>
                                                        <input type="radio" id="<?php echo esc_attr($ap_layout['id']); ?>" name="apbasic_options[default_page_layout]" value="<?php echo esc_attr($ap_layout['value']); ?>" <?php checked($ap_layout['value'],$settings['default_page_layout']); ?> />
                                                        <label for="<?php echo esc_attr($ap_layout['id']); ?>"><?php echo esc_html($ap_layout['label']); ?></label>
                                                    </div> 
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $post_layouts = array(
                                            array(
                                                'label' => __('Left Sidebar','accesspress-basic'),
                                                'value' => 'left_sidebar',
                                                'id' => 'left_sidebar_post',
                                                'image' => 'left-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Right Sidebar','accesspress-basic'),
                                                'value' => 'right_sidebar',
                                                'id' => 'right_sidebar_post',
                                                'image' => 'right-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('Both Sidebar','accesspress-basic'),
                                                'value' => 'both_sidebar',
                                                'id' => 'both_sidebar_def',
                                                'image' => 'both-sidebar.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Wide','accesspress-basic'),
                                                'value' => 'no_sidebar_wide',
                                                'id' => 'no_sidebar_wide_post',
                                                'image' => 'no-sidebar-wide.png'
                                            ),
                                            array(
                                                'label' => __('No Sidebar Narrow','accesspress-basic'),
                                                'value' => 'no_sidebar_narrow',
                                                'id' => 'no_sidebar_narrow_post',
                                                'image' => 'no-sidebar-narrow.png'
                                            ),                 
                                        );
                                    ?>
                                    <th><label><?php esc_html_e('Default Layout (Posts Only)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($post_layouts as $ap_layout) : ?>
                                            <div class="layout-image">
                                                <label>
                                                    <img src="<?php echo esc_url(get_template_directory_uri().'/inc/admin-panel/images/'.$ap_layout['image']); ?>" />
                                                    <div>
                                                        <input type="radio" name="apbasic_options[default_post_layout]" id="<?php echo esc_attr($ap_layout['id']); ?>" value="<?php echo esc_attr($ap_layout['value']); ?>" <?php checked($ap_layout['value'],$settings['default_post_layout']); ?> />
                                                        <label for="<?php $ap_layout['id']; ?>"><?php echo esc_html($ap_layout['label']); ?></label>
                                                    </div>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $blog_displays = array(
                                            array(
                                                'label' => __('Blog Image Large','accesspress-basic'),
                                                'value' => 'blog_image_large'
                                            ),
                                            array(
                                                'label' => __('Blog Image Medium','accesspress-basic'),
                                                'value' => 'blog_image_medium'
                                            ),
                                            array(
                                                'label' => __('Blog Image Alternate Medium','accesspress-basic'),
                                                'value' => 'blog_image_alternate_medium'
                                            ),
                                            array(
                                                'label' => __('Blog Full Content','accesspress-basic'),
                                                'value' => 'blog_full_content'
                                            ),                                            
                                        );
                                     ?>
                                    <th><label><?php esc_html_e('Blog Posts Display Layout','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($blog_displays as $display) : ?>
                                            <div class="radio">
                                                <input type="radio" name="apbasic_options[blog_post_display_type]" id="<?php echo esc_attr($display['value']); ?>" value="<?php echo esc_attr($display['value']); ?>" <?php checked($display['value'],$settings['blog_post_display_type']); ?> />
                                                <label for="<?php echo esc_attr($display['value']); ?>"><?php echo esc_html($display['label']); ?></label><br />
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="show_footer_featured_section"><?php esc_html_e('Enable/Disable (Footer Featured Widgets)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="show_footer_featured_section" name="apbasic_options[show_footer_featured_section]" value="1" <?php checked(true,$settings['show_footer_featured_section']); ?> />
                                            <label for="show_footer_featured_section">Show Footer Featured Widget Section</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="enable_comments_page"><?php esc_html_e('Enable/Disable (Page Comments)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="enable_comments_page" name="apbasic_options[enable_comments_page]" value="1" <?php checked(true,$settings['enable_comments_page']); ?> />
                                            <label for="enable_comments_page"><?php esc_html_e('Show Comments in Page','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="enable_comments_post"><?php esc_html_e('Enable/Disable (Post Comments)','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="enable_comments_post" name="apbasic_options[enable_comments_post]" value="1" <?php checked(true,$settings['enable_comments_post']); ?> />
                                            <label for="enable_comments_post"><?php esc_html_e('Show Comments in Post','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        
                        <!-- Slider Settings -->
                        <div id="options-group-3" class="group">
                            <h3><?php esc_html_e('Slider Settings','accesspress-basic'); ?></h3>
                            <table class="form-table">
                                <?php
                                    $show_sliders = array(
                                        array(
                                            'label' => __('Yes','accesspress-basic'),
                                            'value' => 'yes'
                                        ),
                                        array(
                                            'label' => __('No','accesspress-basic'),
                                            'value' => 'no'
                                        ),
                                    );
                                ?>
                                <tr>
                                    <th><label><?php esc_html_e('Show Slider','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($show_sliders as $show_slider) : ?>
                                            <div class="radio">
                                                <input id="<?php echo esc_attr($show_slider['value']); ?>" type="radio" name="apbasic_options[show_slider]" value="<?php echo esc_attr($show_slider['value']); ?>" <?php checked($show_slider['value'],$settings['show_slider']); ?> />
                                                <label for="<?php echo esc_attr($show_slider['value']); ?>"><?php echo esc_html($show_slider['label']); ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <?php
                                    $slider_type = array(
                                        'default' => __('Default', 'accesspress-basic'),
                                        'fullwidth' => __('Full Width Slider', 'accesspress-basic'),
                                    );
                                ?>
                                <tr>
                                    <th><label><?php esc_html_e('Slider Type','accesspress-basic'); ?></label></th>
                                    <td>
                                        <?php foreach($slider_type as $val => $label) : ?>
                                            <div class="radio">
                                                <input id="<?php echo esc_attr($val); ?>" type="radio" name="apbasic_options[slider_type]" value="<?php echo esc_attr($val); ?>" <?php checked($val, $settings['slider_type']); ?> />
                                                <label for="<?php echo esc_attr($val); ?>"><?php echo esc_html($label); ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="enable_slider_in_post"><?php esc_html_e('Enable/Disable','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="enable_slider_in_post" name="apbasic_options[show_slider_in_post]" value="1" <?php checked(true,$settings['show_slider_in_post']); ?> />
                                            <label for="enable_slider_in_post"><?php esc_html_e('Enable Slider in Post','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <?php
                                        $modes = array(
                                            array(
                                                'label' => 'Horizontal',
                                                'value' => 'horizontal',
                                            ),
                                            array(
                                                'label' => 'Fade',
                                                'value' => 'fade',
                                            ),
                                        );
                                    ?>
                                    <th><label for="slider_mode"><?php esc_html_e('Mode','accesspress-basic'); ?></label>
                                    <td>
                                        <?php foreach($modes as $mode) : ?>
                                            <div class="radio">
                                                <input id="<?php echo esc_attr($mode['value']); ?>" type="radio" name="apbasic_options[slider_mode]" value="<?php echo esc_attr($mode['value']); ?>" <?php checked($mode['value'],$settings['slider_mode']); ?> />
                                                <label for="<?php echo esc_attr($mode['value']); ?>"><?php echo esc_html($mode['label']); ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><label><?php esc_html_e('Slider Links Option','accesspress-basic'); ?></label></th>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" id="open_slider_link_in_new_tab" name="apbasic_options[open_slider_link_in_new_tab]" value="1" <?php checked(true,$settings['open_slider_link_in_new_tab']); ?> />
                                            <label for="open_slider_link_in_new_tab"><?php esc_html_e('Open Slider Links in new Tab','accesspress-basic'); ?></label>
                                        </div>
                                    </td>
                                </tr>
                                <?php for($i = 1; $i <= 4; $i++) : ?>
                                <tr>
                                    <th><label for="<?php echo 'slide'.esc_attr($i); ?>"><?php echo 'Slide-'.esc_attr($i); ?></label></th>
                                    <td>
                                        <input class="slide-image-url" id="<?php echo 'slide'.esc_attr($i); ?>" type="text" name="apbasic_options[slide<?php echo esc_attr($i); ?>]" value="<?php echo esc_url($settings['slide'.$i]); ?>" />
                                        <input type="button" class="button slide-upload-button" id="slide<?php echo esc_attr($i); ?>_upload_btn" name="slide<?php echo esc_attr($i); ?>_upload_btn" value="<?php esc_html_e('Upload','accesspress-basic'); ?>" />
                                        <?php $slide_preview = $settings['slide'.$i]; ?>
                                        
                                        <div class="slide_preview" style="<?php if(empty($slide_preview)){echo "display: none";} ?>" >
                                            <img src="<?php echo esc_url($slide_preview) ?>" width="400px" height="200px" />
                                            <span class="remove_slide_preview">Remove</span>
                                        </div>
                                        <p style="font-size: 11px; font-weight: bold; color: #939393;">
                                        <?php esc_html_e('The Recommended Slider Image size is 676X444px for Default Slider & 1350X530px for fullwidth slider.', 'accesspress-basic'); ?><br />
                                        <?php esc_html_e('Try using Transparent image for better result.', 'accesspress-basic'); ?>
                                        </p>
                                    </td> 
                                </tr>
                                <tr>
                                    <th><label for="<?php echo 'slide' .esc_attr($i).'_title'; ?>"><?php echo 'Slide-' .esc_attr($i).esc_html__(' Title','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[slide<?php echo esc_attr($i); ?>_title]" id="<?php echo 'slide' .esc_attr($i).'_title'; ?>" value="<?php echo esc_attr($settings['slide' .esc_attr($i).'_title']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="<?php echo 'slide' .esc_attr($i).'_description'; ?>"><?php echo 'Slide-' .esc_attr($i).esc_html__(' Description','accesspress-basic'); ?></label></th>
                                    <td>
                                        <textarea name="apbasic_options[<?php echo 'slide' .esc_attr($i).'_description'; ?>]" id="<?php echo 'slide' .esc_attr($i).'_description'; ?>" rows="6" cols="35"><?php if(isset($settings['slide' .esc_attr($i).'_description'])){echo esc_textarea($settings['slide' .esc_attr($i).'_description']);} ?></textarea>
                                    </td>
                                </tr>    
                                <tr>
                                    <th><label for="<?php echo 'slide' .esc_attr($i).'_readmore_text'; ?>"><?php echo 'Slide-' .esc_attr($i).esc_html__(' Read More Text','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[slide<?php echo esc_attr($i); ?>_readmore_text]" id="<?php echo 'slide' .esc_attr($i).'_readmore_text'; ?>" value="<?php echo esc_attr($settings['slide' .esc_attr($i).'_readmore_text']); ?>" />
                                    </td> 
                                </tr>
                                <tr>
                                    <th><label for="<?php echo 'slide' .esc_attr($i).'_readmore_link'; ?>"><?php echo 'Slide-' .esc_attr($i).esc_html__(' Read More Link','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[slide<?php echo esc_attr($i); ?>_readmore_link]" id="<?php echo 'slide' .esc_attr($i).'_readmore_link'; ?>" value="<?php echo esc_url($settings['slide' .esc_attr($i).'_readmore_link']); ?>" />
                                    </td>
                                </tr>
                                <tr>
                                    <th><label for="<?php echo 'slide' .esc_attr($i).'_readmore_button_icon'; ?>"><?php echo 'Slide-' .esc_attr($i).esc_html__(' Read More Button Icon','accesspress-basic'); ?></label></th>
                                    <td>
                                        <input type="text" name="apbasic_options[slide<?php echo esc_attr($i); ?>_readmore_button_icon]" id="<?php echo 'slide' .esc_attr($i).'_readmore_button_icon'; ?>" value="<?php echo esc_attr($settings['slide' .esc_attr($i).'_readmore_button_icon']); ?>" />
                                        <em>e.g. fa-train ref link: <a href="<?php echo esc_url('http://fortawesome.github.io/Font-Awesome/icons/'); ?>" target="_blank"><?php esc_html_e('Get Fa-Icon','accesspress-basic'); ?></a></em>
                                    </td>
                                </tr>    
                                <?php endfor; ?>
                            </table> 
                        </div>
                        
                        <div id="options-group-4" class="group">
                            <h3><?php esc_html_e('Translations','accesspress-basic'); ?></h3>
                            <table class="form-table">
                                <tr>
                                    <th>
                                        <label>Home Page</label>
                                    </th>
                                    <td>
                                        <div class="trans-row">
                                            <label><?php esc_html_e('Read More... (Features)','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[features_readmore_text]" value="<?php echo esc_attr($settings['features_readmore_text']); ?>" /></span>
                                        </div>
                                        <div class="trans-row">
                                            <label><?php esc_html_e('More Info... (Services)','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[services_readmore_text]" value="<?php echo esc_attr($settings['services_readmore_text']); ?>" /></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Blog/Archive</label>
                                    </th>
                                    <td>
                                        <div class="trans-row">
                                            <label><?php esc_html_e('Read More...','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[blog_readmore_text]" value="<?php echo esc_attr($settings['blog_readmore_text']); ?>" /></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Single Post Page</label>
                                    </th>
                                    <td class="single-post-page clearfix">
                                        <div class="trans-row clearfix">
                                            <label><?php esc_html_e('Tagged','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[tagged_text]" value="<?php echo esc_attr($settings['tagged_text']); ?>" /></span>
                                        </div>
                                        <div class="trans-row clearfix">
                                            <label><?php esc_html_e('Posted On .. by ..','accesspress-basic'); ?></label>
                                            <span>
                                                <input class="posted_on_text" type="text" name="apbasic_options[posted_on_text]" value="<?php echo esc_attr($settings['posted_on_text']); ?>" placeholder="Posted On" />
                                                <em><?php esc_html_e('Jan, 1, 2015','accesspress-basic'); ?></em>
                                                <input class="by_text" type="text" name="apbasic_options[by_text]" value="<?php echo esc_attr($settings['by_text']); ?>" placeholder="by" />
                                                <em><?php esc_html_e('Dummy User','accesspress-basic'); ?></em>
                                            </span>
                                        </div>
                                        <div class="trans-row clearfix">
                                            <label><?php esc_html_e('Posted In','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[posted_in_text]" value="<?php echo esc_attr($settings['posted_in_text']); ?>" /></span>
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <th>
                                        <label>Search Page</label>
                                    </th>
                                    <td>       
                                        <div class="trans-row">
                                            <label><?php esc_html_e('Search Results For','accesspress-basic'); ?></label>
                                            <span><input type="text" name="apbasic_options[search_results_for_text]" value="<?php echo esc_attr($settings['search_results_for_text']); ?>" /></span>
                                        </div>
                                        
                                    </td>
                                </tr>
                            </table>
                        </div>
                            
                        <!-- About Accesspress Lite -->
            			<div id="options-group-5" class="group">
            			<h3><?php esc_html_e('Know more about AccessPress Themes','accesspress-basic'); ?></h3>
            				<table class="form-table">
            					<tr>
            					<td colspan="2">
            						<p><?php esc_html_e('AccessPress Basic - is a FREE WordPress theme by','accesspress-basic'); ?> <a target="_blank" href="<?php echo esc_url('http://www.accesspressthemes.com/'); ?>">AccessPress Themes</a> <?php esc_html_e('- A WordPress Division of Access Keys.','accesspress-basic'); ?>
            						<?php esc_html_e(' Access Keys - has developed more than 350 WordPress websites for its clients.','accesspress-basic'); ?></p>
            
            						<p><?php esc_html_e('We want to give "a little beautiful thing" - back to the community.<br />With our experience, we are creating "AccessPress Basic", a free WordPress theme, which includes the most useful features for a generic business website!','accesspress-basic'); ?></p>
            						<hr />
            						
            						<p><?php esc_html_e('For documentation, click','accesspress-basic'); ?> <a target="_blank" href="<?php echo esc_url('http://accesspressthemes.com/accesspress-basic-documentation/'); ?>"><?php esc_html_e('here','accesspress-basic'); ?></a></p>
            						<p><?php esc_html_e('For Video tutorials, click','accesspress-basic'); ?> <a target="_blank" href="<?php echo esc_url('https://www.youtube.com/watch?v=Mi60ORm_VMI&list=PLdSqn2S_qFxEzeboBioXZdAg5P4l32Hm3'); ?>"><?php esc_html_e('here','accesspress-basic'); ?></a></p>
            						<hr />
            						
                                    <div>
            						<h4><?php esc_html_e('Our other Products','accesspress-basic'); ?></h4>
            						<p><?php esc_html_e('Themes - ','accesspress-basic'); ?><a target="_blank" href="<?php echo esc_url('http://accesspressthemes.com/themes'); ?>"><?php echo esc_url('http://accesspressthemes.com/themes'); ?></a></p>
            						<p><?php esc_html_e('Plugins - ','accesspress-basic'); ?><a target="_blank" href="<?php echo esc_url('http://accesspressthemes.com/plugins'); ?>"><?php echo esc_url('http://accesspressthemes.com/plugins'); ?></a></p>
                                    </div>
            						
                                    <div>
            						<h4><?php esc_html_e('Get in touch','accesspress-basic'); ?></h4>
            						<p>
            						<?php esc_html_e('If you have any question/feedback regarding theme, please post in our forum','accesspress-basic'); ?><br/>
            						<?php esc_html_e('Forum:','accesspress-basic'); ?> <a target="_blank" href="<?php echo esc_url('http://accesspressthemes.com/support/'); ?>"><?php echo esc_url('http://accesspressthemes.com/support/'); ?></a><br/>
            						
            						<br />
            
            						<?php esc_html_e('For Queries Regading Themes','accesspress-basic'); ?><br/>
            						<?php esc_html_e('Support:','accesspress-basic'); ?> <a href="mailto:<?php echo esc_url('support@accesspressthemes.com'); ?>">support@accesspressthemes.com</a><br/>
            						</p>
            						</div>
            						</td>
            					</tr>
            				</table>
            			</div>
                            
                        <div id="optionsframework-submit">
                            <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Options','accesspress-basic'); ?>" />
                        </div>
                    </form> 
                </div> <!-- optionsframework-metabox -->
            </div>
        <?php
    }
    
    function accesspress_basic_validate_options($input){
        global $allowedtags;
        $cus_allowed_tags = array(
            'h2' => array(),
            'p' => array(),
            'span' => array()
        );
        $al_tags = array_merge($allowedtags,$cus_allowed_tags);
        
        $header_text_al_tags = array(
            'b' => array(),
            'em' => array(),
            'strong' => array(),
            'i' => array(
                'class' => array(),
            ),
            'a' => array(
                'href' => array(),
            )
        );
        
        $apbasic_inputs = array();
        
        // BASIC SETTINGS
        if(isset($input['header_logo'])){
            $apbasic_inputs['header_logo'] = esc_url_raw($input['header_logo']);
        }
        
        $apbasic_inputs['show_header'] = sanitize_text_field($input['show_header']);
        
        if(!isset($input['show_search'])){
            $apbasic_inputs['show_search'] = null; 
        }else{
            $apbasic_inputs['show_search'] = 1;
        }
        
        if(!isset($input['show_social_links'])){
            $apbasic_inputs['show_social_links'] = null; 
        }else{
            $apbasic_inputs['show_social_links'] = 1;
        }
        
        $apbasic_inputs['header_text'] = wp_kses($input['header_text'],$header_text_al_tags);
        
        if(!isset($input['activate_favicon'])){
            $apbasic_inputs['activate_favicon'] = null;
        }else{
            $apbasic_inputs['activate_favicon'] = 1;
        }
        
        if(isset($input['favicon'])){
            $apbasic_inputs['favicon'] = esc_url_raw($input['favicon']);
        }
        
        $apbasic_inputs['site_layout'] = sanitize_text_field($input['site_layout']);
        
        $apbasic_inputs['template_color'] = sanitize_hex_color($input['template_color']);
        
        $apbasic_inputs['footer_text'] = sanitize_text_field($input['footer_text']);
        
        //Design Options
        $apbasic_inputs['background_image'] = sanitize_text_field($input['background_image']);
        $apbasic_inputs['default_layout'] = sanitize_text_field($input['default_layout']);
        $apbasic_inputs['default_page_layout'] = sanitize_text_field($input['default_page_layout']);
        $apbasic_inputs['default_post_layout'] = sanitize_text_field($input['default_post_layout']);
        $apbasic_inputs['blog_post_display_type'] = sanitize_text_field($input['blog_post_display_type']);
        
        if(!isset($input['show_footer_featured_section'])){
            $apbasic_inputs['show_footer_featured_section'] = null;
        }else{
            $apbasic_inputs['show_footer_featured_section'] = 1;
        }
        
        if(!isset($input['enable_comments_page'])){
            $apbasic_inputs['enable_comments_page'] = null;
        }else{
            $apbasic_inputs['enable_comments_page'] = 1;
        }
        
        if(!isset($input['enable_comments_post'])){
            $apbasic_inputs['enable_comments_post'] = null;
        }else{
            $apbasic_inputs['enable_comments_post'] = 1;
        }          
        
        //Slider Settings
        $apbasic_inputs['show_slider'] = sanitize_text_field($input['show_slider']);
        $apbasic_inputs['slider_type'] = sanitize_text_field($input['slider_type']);
        
        if(!isset($input['show_slider_in_post'])){
            $apbasic_inputs['show_slider_in_post'] = null;
        }else{
            $apbasic_inputs['show_slider_in_post'] = 1;
        }
        
        $apbasic_inputs['slider_mode'] = sanitize_text_field($input['slider_mode']);

        if(!isset($input['open_slider_link_in_new_tab'])){
            $apbasic_inputs['open_slider_link_in_new_tab'] = null;
        }else{
            $apbasic_inputs['open_slider_link_in_new_tab'] = 1;
        }
        
        if(isset($input['slide1'])){
            $apbasic_inputs['slide1'] = esc_url_raw($input['slide1']);
        }
        if(isset($input['slide2'])){
            $apbasic_inputs['slide2'] = esc_url_raw($input['slide2']);
        }
        if(isset($input['slide3'])){
            $apbasic_inputs['slide3'] = esc_url_raw($input['slide3']);
        }
        if(isset($input['slide4'])){
            $apbasic_inputs['slide4'] = esc_url_raw($input['slide4']);
        }
        
        if(!isset($input['show_slider_in_post'])){
            $apbasic_inputs['show_silder_in_post'] = null;
        }else{
            $apbasic_inputs['show_silder_in_post'] = 1;
        }
        
        $apbasic_inputs['slide1_title'] = wp_kses_post($input['slide1_title']);
        $apbasic_inputs['slide2_title'] = wp_kses_post($input['slide2_title']);
        $apbasic_inputs['slide3_title'] = wp_kses_post($input['slide3_title']);
        $apbasic_inputs['slide4_title'] = wp_kses_post($input['slide4_title']);
        
        $apbasic_inputs['slide1_description'] = wp_kses_post($input['slide1_description'],$al_tags);
        $apbasic_inputs['slide2_description'] = wp_kses_post($input['slide2_description'],$al_tags);
        $apbasic_inputs['slide3_description'] = wp_kses_post($input['slide3_description'],$al_tags);
        $apbasic_inputs['slide4_description'] = wp_kses_post($input['slide4_description'],$al_tags);
        
        $apbasic_inputs['slide1_readmore_text'] = sanitize_text_field($input['slide1_readmore_text']);
        $apbasic_inputs['slide2_readmore_text'] = sanitize_text_field($input['slide2_readmore_text']);
        $apbasic_inputs['slide3_readmore_text'] = sanitize_text_field($input['slide3_readmore_text']);
        $apbasic_inputs['slide4_readmore_text'] = sanitize_text_field($input['slide4_readmore_text']);
        
        $apbasic_inputs['slide1_readmore_button_icon'] = sanitize_text_field($input['slide1_readmore_button_icon']);
        $apbasic_inputs['slide2_readmore_button_icon'] = sanitize_text_field($input['slide2_readmore_button_icon']);
        $apbasic_inputs['slide3_readmore_button_icon'] = sanitize_text_field($input['slide3_readmore_button_icon']);
        $apbasic_inputs['slide4_readmore_button_icon'] = sanitize_text_field($input['slide4_readmore_button_icon']);
        
        if(isset($input['slide1_readmore_link'])){
            $apbasic_inputs['slide1_readmore_link'] = esc_url_raw($input['slide1_readmore_link']);
        }
        if(isset($input['slide2_readmore_link'])){
            $apbasic_inputs['slide2_readmore_link'] = esc_url_raw($input['slide2_readmore_link']);
        }
        if(isset($input['slide3_readmore_link'])){
            $apbasic_inputs['slide3_readmore_link'] = esc_url_raw($input['slide3_readmore_link']);
        }
        if(isset($input['slide4_readmore_link'])){
            $apbasic_inputs['slide4_readmore_link'] = esc_url_raw($input['slide4_readmore_link']);
        }
        
        // Translation Settings
        $apbasic_inputs['features_readmore_text'] = sanitize_text_field($input['features_readmore_text']); 
        $apbasic_inputs['services_readmore_text'] = sanitize_text_field($input['services_readmore_text']);
        $apbasic_inputs['blog_readmore_text'] = sanitize_text_field($input['blog_readmore_text']); 
        $apbasic_inputs['search_results_for_text'] = sanitize_text_field($input['search_results_for_text']);
        $apbasic_inputs['tagged_text'] = sanitize_text_field($input['tagged_text']); 
        $apbasic_inputs['posted_on_text'] = sanitize_text_field($input['posted_on_text']);
        $apbasic_inputs['by_text'] = sanitize_text_field($input['by_text']); 
        $apbasic_inputs['posted_in_text'] = sanitize_text_field($input['posted_in_text']);
        
        return $apbasic_inputs;
    }
     
    endif;