<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

    // This gets the theme name from the stylesheet
    $themename = wp_get_theme();
    $themename = preg_replace("/\W/", "_", strtolower($themename) );

    $optionsframework_settings = get_option( 'optionsframework' );
    $optionsframework_settings['id'] = $themename;
    update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {


    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories();
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }
    // Pull all tags into an array
    $options_tags = array();
    $options_tags_obj = get_tags();
    foreach ( $options_tags_obj as $tag ) {
        $options_tags[$tag->term_id] = $tag->name;
    }
    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }
    // If using image radio buttons, define a directory path
    $imagepath =  get_template_directory_uri() . '/inc/images/';
    $set_year = date('Y');
    $options = array();


    /* General Settings */

    $options[] = array(
        'name' => __('General Settings', 'options_framework_theme'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Header Logo Image', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'logo_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Favicon', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'fav_icon',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Home Page', 'options_framework_theme'),
        'type' => 'heading');

    $options[] = array(
        'name' => __('Banner Image', 'options_framework_theme'),
        'desc' => __('Recommended image sizes 1920X412', 'options_framework_theme'),
        'id' => 'banner',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top Box 1 Image', 'options_framework_theme'),
        'desc' => __('Recommended image sizes 254X147', 'options_framework_theme'),
        'id' => 'top_box_1_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top Box 1 Title', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_1_title',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 1 Link', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_1_link',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 1 Content', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_1_content',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Top Box 2 Image', 'options_framework_theme'),
        'desc' => __('Recommended image sizes 270X180', 'options_framework_theme'),
        'id' => 'top_box_2_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top Box 2 Title', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_2_title',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 2 Link', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_2_link',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 2 Content', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_2_content',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Top Box 3 Image', 'options_framework_theme'),
        'desc' => __('Recommended image sizes 270X180', 'options_framework_theme'),
        'id' => 'top_box_3_image',
        'type' => 'upload');

    $options[] = array(
        'name' => __('Top Box 3 Title', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_3_title',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 3 Link', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_3_link',
        'type' => 'text');

    $options[] = array(
        'name' => __('Top Box 3 Content', 'options_framework_theme'),
        'desc' => __('', 'options_framework_theme'),
        'id' => 'top_box_3_content',
        'type' => 'textarea');

    $options[] = array(
        'name' => __('Show Home Page Content', 'options_framework_theme'),
        'desc' => __('Choose this option if you want to show  home page content', 'options_framework_theme'),
        'id' => 'home_content',
        'std' => '1',
        'type' => 'checkbox');

    $options[] = array(
        'name' => __('Show Latest Posts', 'options_framework_theme'),
        'desc' => __('Choose this option if you want to show latest posts on home page', 'options_framework_theme'),
        'id' => 'example_checkbox',
        'std' => '1',
        'type' => 'checkbox');


    $options[] = array( 'name' => 'Fonts Settings',
        'type' => 'heading');

    // Available Options for Header Font
    $typography_options_headers = array(
        'sizes' => array( '18','23','27','31' ),
        'faces' => array(
            '"Helvetica Neue", Helvetica, sans-serif' => 'Helvetica Neue',
            '"Arial Black", arial, sans-serif' => 'Arial Black',
            '"Avant Garde", sans-serif' => 'Avant Garde' ),
        'styles' => array( 'normal' => 'Normal','bold' => 'Bold' )
    );

    $typography_mixed_fonts = array_merge( options_typography_get_os_fonts() , options_typography_get_google_fonts() );
    asort($typography_mixed_fonts);

    $options[] = array(
        'name' => __('Use Custom Fonts', 'options_framework_theme'),
        'desc' => __('Choose this option if you want to use custom fonts settings', 'options_framework_theme'),
        'id' => 'custom_font',
        'std' => '0',
        'type' => 'checkbox');

    $options[] = array( 'name' => 'Logo Font',
        'id' => 'logo_text',
        'std' => array('size' => '35px', 'face' => 'oswald', 'color' => '#ffffff'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Logo Description',
        'id' => 'logo_desc',
        'std' => array('size' => '12px', 'face' => 'oswald', 'color' => '#ffffff'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Menu Elements',
        'id' => 'menu_font',
        'std' => array('size' => '12px', 'face' => 'oswald', 'color' => '#ffffff'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Body Text',
        'id' => 'body_font',
        'std' => array('size' => '14px', 'face' => 'oswald', 'color' => '#004487'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Page/Post Title',
        'id' => 'title_font',
        'std' => array('size' => '16px', 'face' => 'oswald', 'color' => '#ff7f00'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Sidebar Title, Home Page Recent News',
        'id' => 'sidebar_title_font',
        'std' => array('size' => '14px','color' => '#ff7f00', 'font-family' => 'Oswald'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Sidebar Links',
        'id' => 'sidebar_link_font',
        'std' => array('size' => '14px','color' => '#414558', 'font-family' => 'Arial'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Site Links',
        'id' => 'links_font',
        'std' => array('size' => '14px','color' => '#8098a6', 'font-family' => 'Arial'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Footer Titles Font',
        'id' => 'footer_titles_font',
        'std' => array('size' => '14px','color' => '#bfd6e4', 'font-family' => 'Arial'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Footer Links',
        'id' => 'footer_links_font',
        'std' => array('size' => '14px','color' => '#ffffff', 'font-family' => 'Arial'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array( 'name' => 'Footer Text',
        'id' => 'footer_text_font',
        'std' => array('size' => '14px','color' => '#ffffff', 'font-family' => 'Arial'),
        'type' => 'typography',
        'options' => array(
            'faces' => $typography_mixed_fonts,
            'styles' => false )
    );

    $options[] = array(
        "name" => "Color Palettes",
        "type" => "heading");

    $options[] = array(
        "name" => "General Color",
        "id" => "general",
        "std" => "#1a8cff",
        "type" => "color" );

    $options[] = array(
        "name" => "Second(orange) Color",
        "id" => "second",
        "std" => "#ff7f00",
        "type" => "color");

    $options[] = array(
        "name" => "Background Color",
        "id" => "bg",
        "std" => "#ffffff",
        "type" => "color");

    return $options;
}