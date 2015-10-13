<?php
//the id of the options
$igthemes_option='base-wp';

//start class
class IGthemes_Customizer {

// add some settings
public static function igthemes_customize($wp_customize) {

/** The short name gives a unique element to each options id. */
global $igthemes_option;
//upgrade message
$upgrade_message = '<a class="upgrade-tag" href="http://www.iograficathemes.com/downloads/base-wp-premium/" target="_blank">' . esc_html__(' - only premium', 'base-wp') . '</a>';

// slect categories
$categories = get_categories();
    $cats = array();
    $i = 0;
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cats[$category->slug] = $category->name;
    }

//01 PREMIUM
$wp_customize->add_section('upgrade-premium', array(
        'title' => esc_html__('UPGRADE TO PREMIUM', 'base-wp'),
        'priority' => 1,
    ) );

//03 GENERAL
    $wp_customize->get_section('title_tagline')->title = esc_html__('General', 'base-wp');
    $wp_customize->get_section('title_tagline')->priority = 3;

//04 LAYOUT
    $wp_customize->add_panel('layout-settings', array(
        'title' => esc_html__('Layout', 'base-wp'),
        'priority' => 4,
    ));
    $wp_customize->add_section('main-layout', array(
        'title' => esc_html__('Main Layout', 'base-wp'),
        'panel'  => 'layout-settings',
    ));
    $wp_customize->add_section('single-layout', array(
        'title' => esc_html__('Single Layout', 'base-wp'),
        'panel'  => 'layout-settings',
    ));
    $wp_customize->add_section('shop-layout', array(
        'title' => esc_html__('Shop Layout', 'base-wp'),
        'panel'  => 'layout-settings',
    ));

// 05 STYLE
    $wp_customize->get_section('colors')->title = esc_html__('Style', 'base-wp');
    $wp_customize->get_section('colors')->priority = 5;

// 06 FOOTER
    $wp_customize->add_section('footer-settings', array(
        'title' => esc_html__('Footer', 'base-wp'),
        'priority' => 6,
    ));

// 06 SOCIAL
    $wp_customize->add_section('social-settings', array(
        'title' => esc_html__('Social', 'base-wp'),
        'priority' => 7,
    ));

// 07 ADVANCED
    $wp_customize->add_section('advanced-settings', array(
        'title' => esc_html__('Advanced', 'base-wp'),
        'priority' => 7,
    ));

/*****************************************************************
* PREMIUM
******************************************************************/
$wp_customize->add_setting($igthemes_option . '[upgrade_box]', array(
    'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ) );

$wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'upgrade_box', array(
    'label' => esc_html__('', 'base-wp'),
    'description' => '<p style="font-style: normal;">' . esc_html__('If you like this theme, considering supporting development by purchasing the premium version.', 'base-wp'). '</p>'
    . '<ul class="premium" style="font-style: normal;"> '. '<li><strong>'. esc_html__('Main premium features:', 'base-wp'). '</strong></li>'
    . '<li>' . esc_html__('- All options enabled', 'base-wp') . '</li>'
    . '<li>' .  esc_html__('- Premium shortcodes included', 'base-wp') . '</li>'
    . '<li>' . esc_html__('- Priority support', 'base-wp'). '</li>'
    . '<li>' .  esc_html__('- Money back guarantee', 'base-wp') . '</li>'
    . '<li>' . '<a class="upgrade-button" href="http://www.iograficathemes.com/downloads/base-wp-premium/" rel="nofollow">' . esc_html__('upgrade to premium', 'base-wp') . '</a></li>'
    . '</ul>',    'type' => 'custom',
    'section' => 'upgrade-premium',
    'settings' => $igthemes_option . '[upgrade_box]',
    )));

/*****************************************************************
* GENERAL SETTINGS
******************************************************************/
//blog name
    $wp_customize->add_setting('blogname', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogname', array(
        'label' => esc_html__('Site Title', 'base-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogname',
        'priority' => 1,
    ));
//blog description
    $wp_customize->add_setting('blogdescription', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_text',
        'transport'=>'postMessage'
    ));
    $wp_customize->add_control('blogdescription', array(
        'label' => esc_html__('Tagline', 'base-wp'),
        'section' => 'title_tagline',
        'settings' => 'blogdescription',
        'priority' => 2,
    ));
//logo
    $wp_customize->add_setting($igthemes_option . '[logo]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_upload',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'logo', array(
        'label' => esc_html__('Site Logo', 'base-wp'),
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[logo]',
        'priority' => 3,
    )));
//lightbox
    $wp_customize->add_setting($igthemes_option . '[lightbox]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('lightbox', array(
        'label' => esc_html__('Lightbox', 'base-wp'),
        'description' => esc_html__('Enable image lightbox', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[lightbox]',
        'priority' => 99,
    ));
//breadcrumb
    $wp_customize->add_setting($igthemes_option . '[breadcrumb]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('breadcrumb', array(
        'label' => esc_html__('Breadcrumb', 'base-wp'),
        'description' => esc_html__('Enable breadcrumb (it will use WordPress SEO breadcrumb if available)', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[breadcrumb]',
        'priority' => 99,
    ));
//shortcodes
    $wp_customize->add_setting($igthemes_option . '[shortcodes]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,$igthemes_option . '[shortcodes', array(
        'label' => esc_html__('Shortcodes', 'base-wp'),
        'description' => esc_html__('Enable theme shortcodes', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'title_tagline',
        'settings' => $igthemes_option . '[shortcodes]',
        'priority' => 99,
    )));
/*****************************************************************
* LAYOUT SETTINGS
******************************************************************/
//sidebar main
    $wp_customize->add_setting($igthemes_option . '[sidebar_main]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_main', array(
        'label' => esc_html__('Main Layout', 'base-wp'),
        'description' =>  esc_html__('Select the index page layout', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[sidebar_main]',
    )));
//post slide
    $wp_customize->add_setting($igthemes_option . '[post_slide]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_carousel',
    ));
    $wp_customize->add_control('post_slide', array(
        'label' => esc_html__('Carousel', 'base-wp'),
        'description' => esc_html__('To display projects and testimonials install ', 'base-wp').'<a href="https://wordpress.org/plugins/ml-slider/" target="_blank">IG Portolio</a>'.  esc_html__(' and ', 'base-wp') .'<a href="https://wordpress.org/plugins/ml-slider/" target="_blank">IG Testimonials</a>',
        'type'       => 'radio',
        'choices'    => array(
            'none' => 'None',
            'post' => 'Posts',
            'project' => 'Projects',
            'testimonial' => 'Testimonials',
        ),
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[post_slide]',
    ));
//main post content
    $wp_customize->add_setting($igthemes_option . '[main_post_content]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_post_content', array(
        'label' => esc_html__('Show excerpt', 'base-wp'),
        'description' => esc_html__('Show posts content as excerpt', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_post_content]',
    ));
//main featured images
    $wp_customize->add_setting($igthemes_option . '[main_featured_images]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_featured_images', array(
        'label' => esc_html__('Featured images', 'base-wp'),
        'description' => esc_html__('Show featured images in index page', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_featured_images]',
    ));
//main numeric pagination
    $wp_customize->add_setting($igthemes_option . '[main_numeric_pagination]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('main_numeric_pagination', array(
        'label' => esc_html__('Numeric pagination', 'base-wp'),
        'description' => esc_html__('Use numeric pagination in index page', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'main-layout',
        'settings' => $igthemes_option . '[main_numeric_pagination]',
    ));
//sidebar single
    $wp_customize->add_setting($igthemes_option . '[sidebar_single]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_single', array(
        'label' => esc_html__('Single Layout', 'base-wp'),
        'description' => esc_html__('Select the single post layout', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[sidebar_single]',
    )));
//post featured image
    $wp_customize->add_setting($igthemes_option . '[post_featured_image]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('post_featured_image', array(
        'label' => esc_html__('Post featured image', 'base-wp'),
        'description' => esc_html__('Show featured image in post page', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[post_featured_image]',
    ));
//post meta
    $wp_customize->add_setting($igthemes_option . '[post_meta]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'post_meta', array(
        'label' => esc_html__('Meta Data', 'base-wp'),
        'description' => esc_html__('Hide post meta data', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'single-layout',
        'settings' => $igthemes_option . '[post_meta]',
    )));
//sidebar shop
    $wp_customize->add_setting($igthemes_option . '[sidebar_shop]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'sidebar_shop', array(
        'label' => esc_html__('Shop Layout', 'base-wp'),
        'description' => esc_html__('Select the shop page layout', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[sidebar_shop]',
    )));
//Number of products displayed
    $wp_customize->add_setting($igthemes_option . '[shop_products_number]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'shop_products_number', array(
        'label' => esc_html__('Products number', 'base-wp'),
        'description' => esc_html__('Change the number of products displayed per page', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[shop_products_number]',
    )));
//shop product slider
    $wp_customize->add_setting($igthemes_option . '[shop_slide]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_checkbox',
    ));
    $wp_customize->add_control('shop_slide', array(
        'label' => esc_html__('Products Slide', 'base-wp'),
        'description' => esc_html__('', 'base-wp'),
        'type' => 'checkbox',
        'section' => 'shop-layout',
        'settings' => $igthemes_option . '[shop_slide]',
    ));
/*****************************************************************
* STYLE SETTINGS
******************************************************************/
//header style
    $wp_customize->add_setting($igthemes_option . '[header_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'header_style', array(
        'label' => esc_html__('Header Style', 'base-wp'),
        'description' => esc_html__('Header custom colors', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[header_style]',
    )));
//menu style
    $wp_customize->add_setting($igthemes_option . '[menu_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'menu_style', array(
        'label' => esc_html__('Menu Style', 'base-wp'),
        'description' => esc_html__('Menu custom colors', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[menu_style]',
    )));
//link style
    $wp_customize->add_setting($igthemes_option . '[link_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'link_style', array(
        'label' => esc_html__('Links Style', 'base-wp'),
        'description' => esc_html__('Links custom colors', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[link_style]',
    )));
//button style
    $wp_customize->add_setting($igthemes_option . '[button_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'button_style', array(
        'label' => esc_html__('Buttons Style', 'base-wp'),
        'description' => esc_html__('Buttons custom colors', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[button_style]',
    )));
//footer style
    $wp_customize->add_setting($igthemes_option . '[footer_style]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize,'footer_style', array(
        'label' => esc_html__('Footer Style', 'base-wp'),
        'description' => esc_html__('Footer custom colors', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'colors',
        'settings' => $igthemes_option . '[footer_style]',
    )));
/*****************************************************************
* FOOTER SETTINGS
******************************************************************/
//footer text
    $wp_customize->add_setting($igthemes_option . '[footer_text]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_text', array(
        'label' => esc_html__('Footer Text', 'base-wp'),
        'description' => '<span class="description customize-control-description">' . esc_html__('Footer custom text', 'base-wp') . $upgrade_message . '</div>',
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_text]',
    )));
//footer credits
    $wp_customize->add_setting($igthemes_option . '[footer_credits]', array(
        'sanitize_callback' => 'igthemes_sanitize_allowedtags',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'footer_credits', array(
        'label' => esc_html__('Credits Link', 'base-wp'),
        'description' => esc_html__('Remove author credits', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'footer-settings',
        'settings' => $igthemes_option . '[footer_credits]',
    )));

/*****************************************************************
* SOCIAL SETTINGS
******************************************************************/
//facebook
    $wp_customize->add_setting($igthemes_option . '[facebook_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',

    ));
    $wp_customize->add_control('facebook_url', array(
        'label' => esc_html__('Facebook url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[facebook_url]',
    ));
//twitter
    $wp_customize->add_setting($igthemes_option . '[twitter_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label' => esc_html__('Twitter url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[twitter_url]',
    ));
//google
    $wp_customize->add_setting($igthemes_option . '[google_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('google_url', array(
        'label' => esc_html__('Google plus url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[google_url]',
    ));
//pinterest
    $wp_customize->add_setting($igthemes_option . '[pinterest_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('pinterest_url', array(
        'label' => esc_html__('Pinterest url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[pinterest_url]',
    ));
//tumblr
    $wp_customize->add_setting($igthemes_option . '[tumblr_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('tumblr_url', array(
        'label' => esc_html__('Tumblr url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[tumblr_url]',
    ));
//instagram
    $wp_customize->add_setting($igthemes_option . '[instagram_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label' => esc_html__('Instagram url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[instagram_url]',
    ));
//linkedin
    $wp_customize->add_setting($igthemes_option . '[linkedin_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label' => esc_html__('Linkedin url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[linkedin_url]',
    ));
//dribbble
    $wp_customize->add_setting($igthemes_option . '[dribbble_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('dribbble_url', array(
        'label' => esc_html__('Dribble url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[dribbble_url]',
    ));
//vimeo
    $wp_customize->add_setting($igthemes_option . '[vimeo_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('vimeo_url', array(
        'label' => esc_html__('Vimeo url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[vimeo_url]',
    ));
//youtube
    $wp_customize->add_setting($igthemes_option . '[youtube_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('youtube_url', array(
        'label' => esc_html__('Youtube url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[youtube_url]',
    ));
//rss
    $wp_customize->add_setting($igthemes_option . '[rss_url]', array(
        'type' => 'option',
        'sanitize_callback' => 'igthemes_sanitize_url',
    ));
    $wp_customize->add_control('rss_url', array(
        'label' => esc_html__('RSS url', 'base-wp'),
        'type' => 'url',
        'section' => 'social-settings',
        'settings' => $igthemes_option . '[rss_url]',
    ));

/*****************************************************************
* ADVANCED SETTINGS
******************************************************************/
//custom css
    $wp_customize->add_setting($igthemes_option . '[custom_css]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_css', array(
        'label' => esc_html__('Custom CSS', 'base-wp'),
        'description' => esc_html__('Add your custom css code', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_css]',
    )));
//custom js
    $wp_customize->add_setting($igthemes_option . '[custom_js]', array(
        'sanitize_callback' => 'igthemes_allowed_tag',
    ));
    $wp_customize->add_control( new Html_Custom_Control( $wp_customize, 'custom_js', array(
        'label' => esc_html__('Custom Javascript', 'base-wp'),
        'description' => esc_html__('Add your custom js code', 'base-wp') . $upgrade_message,
        'type' => 'custom',
        'section' => 'advanced-settings',
        'settings' => $igthemes_option . '[custom_js]',
    )));
    //END
    }
}
// Setup the Theme Customizer settings and controls...
add_action('customize_register' , array('IGthemes_Customizer' , 'igthemes_customize') );
//END OF CLASS
