<?php
/**
 * Aplos functions and definitions
 *
 * @package Aplos
 * @since Aplos 1.2.0
 */
define( 'NO_HEADER_TEXT', true ); // Do not use default header text color select.

if (! function_exists('aplos_setup')):

function aplos_setup()
{

    /**
     * Custom template tags for this theme.
     */
    require(get_template_directory() . '/inc/template-tags.php');

    /**
     * Custom functions that act independently of the theme templates
     */
    require(get_template_directory() . '/inc/tweaks.php');

    /**
     * Custom sanitization functions.
     */
    require(get_template_directory() . '/inc/sanitization.php');

    /**
     * Make theme available for translation
     * Translations should be filed in the /languages/ directory
     */
    load_theme_textdomain('aplos', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support('automatic-feed-links');

    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );

    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support('post-formats', array( 'aside' ));

    /**
     * Enable support for title tags
     */
    add_theme_support( 'title-tag' );

    /**
     * Enable support for a custom header
     */
    add_theme_support('custom-header', array(
        'flex-width' => true,
        'flex-height' => true,
        'width' => 1050,
        'height' => 200,
        'default-image' => '',
    ));

    /**
     * Enable support for a custom background
     */
    add_theme_support('custom-background', array(
        'default-color' => '#232B2B',
    ));

    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'aplos'),
    ));

    if (! isset($content_width)) {
        $content_width = 654;
    }
}
endif; // aplos_setup
add_action('after_setup_theme', 'aplos_setup');

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Aplos 1.2.0
 */
function aplos_widgets_init()
{
    register_sidebar(array(
        'name' => __('Primary Widget Area', 'aplos'),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));

    register_sidebar(array(
        'name' => __('Secondary Widget Area', 'aplos'),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ));
}
add_action('widgets_init', 'aplos_widgets_init');

/**
 * Filter the wp_title tag
 *
 * @since Aplos 1.2.0
 */
function aplos_wp_title($title, $sep)
{
    if (is_feed()) {
        return $title;
    }

    global $page, $paged;

    // Add blog name
    $title .= get_bloginfo('name', 'display');

    //Add blog description for home page
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && (is_home() || is_front_page())) {
        $title .= " $sep $site_description";
    }

    // Add page number
    if (($paged >= 2 || $page >= 2) && ! is_404()) {
        $title .= " $sep " . sprintf(__('Page %s', 'aplos'), max($paged, $page));
    }

    return $title;
}
add_filter('wp_title', 'aplos_wp_title', 10, 2);

/**
 * Get default customization options
 *
 * @since Aplos 1.2.0
 */
function aplos_get_defaults()
{
    return array(
        'colors' => array(
            'title' => '#DC3D24',
            'background' => '#232B2B',
            'content_background' => '#FFF',
            'site_description' => '#FFF',
            'text_color' => '#000',
            'link' => '#8F1E0C',
            'link_hover' => '#EE6D59',
            'button_border' => '#5E0D00',
            'button_text' => '#FFF',
        )
    );
}

/**
 * Add editor styling theme support
 *
 * @since Aplos 1.2.0
 */
function aplos_theme_editor_add_styles()
{
    add_editor_style();
}
add_action('admin_init', 'aplos_theme_editor_add_styles');

/**
 * Add customization settings to Appearance menu
 *
 * @since Aplos 1.2.0
 */
function aplos_customize_register($wp_customize)
{
    // Layout Section
    $wp_customize->add_section('aplos_layout_choice_section', array(
        'title'      => __('Layout', 'aplos'),
        'priority'   => 30,
        'description' => __('Allows you to customize page layout.', 'aplos'),
    ));

    // Fonts Section
    $wp_customize->add_section('aplos_fonts_choice_section', array(
        'title'      => __('Fonts', 'aplos'),
        'priority'   => 30,
        'description' => __('Change the font of the site title, post titles, and headings.<br><br><b>Theme Default:</b> Suggested. Supports most special characters in the Latin alphabet.<br><br><b>Roboto Condensed:</b> Wide language support. Supports special Latin characters, Greek, Cyrillic, and Vietnamese.<br><br><b>Verdana:</b> Not suggested. Only use this is a fallback font if the other included fonts do not contain the characters required by your language.', 'aplos'),
    ));

    // Site Text Section
    $wp_customize->add_section('aplos_site_text_section', array(
        'title'      => __('Site Text', 'aplos'),
        'priority'   => 30,
        'description' => __('Customize text within the theme.', 'aplos'),
    ));

    //Layout settings
    $wp_customize->add_setting('layout_choices',
        array(
            'default' => 'twocol',
            'sanitize_callback' => 'aplos_sanitize_columns',
        )
    );

    $wp_customize->add_setting('collapsible_nav',
         array(
            'default' => true,
            'sanitize_callback' => 'aplos_sanitize_boolean',
         )
      );

  //Fonts settings
  $wp_customize->add_setting('fonts_choices',
         array(
            'default' => 'bebas',
            'type' => 'theme_mod',
            'sanitize_callback' => 'aplos_sanitize_font',
        )
      );

    //Color settings
    $wp_customize->add_setting('title_color',
         array(
            'default' => '#DC3D24',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('themebg_color',
         array(
            'default' => '#232B2B',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('content_bg_color',
         array(
            'default' => '#FFF',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('site_description',
         array(
            'default' => '#FFF',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('text_color',
         array(
            'default' => '#000',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('link_color',
         array(
            'default' => '#8F1E0C',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('link_hover_color',
         array(
            'default' => '#EE6D59',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('button_border_color',
         array(
            'default' => '#5E0D00',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    $wp_customize->add_setting('button_text_color',
         array(
            'default' => '#FFF',
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_hex_color',
         )
      );

    // Site Text settings
    $wp_customize->add_setting('read_more_text',
         array(
            'default' => __('Read More', 'aplos'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

    $wp_customize->add_setting('post_date_text',
         array(
            'default' => __('Posted on', 'aplos'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

    $wp_customize->add_setting('categories_text',
         array(
            'default' => __('Filed Under:', 'aplos'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

    $wp_customize->add_setting('tags_text',
         array(
            'default' => __('Tagged:', 'aplos'),
            'type' => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field',
         )
      );

    //Layout Controls
    $wp_customize->add_control('layout_choices',
         array(
            'type' => 'radio',
            'label' => __('Select Layout', 'aplos'),
            'section' => 'aplos_layout_choice_section',
               'choices' => array(
                'twocol' => __('Two Columns', 'aplos'),
                'threecol' => __('Three Columns', 'aplos'),
            ),
         )
      );

    $wp_customize->add_control('collapsible_nav',
         array(
            'type' => 'checkbox',
            'label' => __('Use collapsible menu on small screens', 'aplos'),
            'section' => 'aplos_layout_choice_section',
         )
      );

    //Fonts Controls
    $wp_customize->add_control('fonts_choices',
         array(
            'type' => 'select',
            'label' => __('Select Title Font', 'aplos'),
            'section' => 'aplos_fonts_choice_section',
            'choices' => array(
                'BebasNeue' => __('Theme Default', 'aplos'),
                '\'Roboto Condensed\'' => __('Roboto Condensed', 'aplos'),
                'Verdana' => __('Verdana', 'aplos'),
            ),
         )
      );

    //Color Controls
    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_themebg_color',
         array(
            'label' => __('Background Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'themebg_color',
            'priority' => 5,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_title_color', //Set a unique ID for the control
         array(
            'label' => __('Title Color', 'aplos'), //Admin-visible name of the control
            'section' => 'colors', //ID of section
            'settings' => 'title_color', //Which setting to load and manipulate (serialized is okay)
            'priority' => 6, //Determines the order this control appears in for the specified section
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_site_description',
         array(
            'label' => __('Site Description Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'site_description',
            'priority' => 7,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_content_bg_color',
         array(
            'label' => __('Content Background Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'content_bg_color',
            'priority' => 10,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_text_color',
         array(
            'label' => __('Text Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'text_color',
            'priority' => 11,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_color',
         array(
            'label' => __('Link Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'link_color',
            'priority' => 15,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_hover_color',
         array(
            'label' => __('Link Hover Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'link_hover_color',
            'priority' => 20,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_button_border_color',
         array(
            'label' => __('Button Border Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'button_border_color',
            'priority' => 25,
         )
      ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_button_text_color',
         array(
            'label' => __('Button Text Color', 'aplos'),
            'section' => 'colors',
            'settings' => 'button_text_color',
            'priority' => 30,
         )
      ));

    // Site Text Controls
    $wp_customize->add_control('read_more_text',
         array(
            'type' => 'input',
            'label' => __('Read More link', 'aplos'),
            'section' => 'aplos_site_text_section',
         )
      );

    $wp_customize->add_control('post_date_text',
         array(
            'type' => 'input',
            'label' => __('Post date text', 'aplos'),
            'section' => 'aplos_site_text_section',
         )
      );

    $wp_customize->add_control('categories_text',
         array(
            'type' => 'input',
            'label' => __('Categories text', 'aplos'),
            'section' => 'aplos_site_text_section',
         )
      );

    $wp_customize->add_control('tags_text',
         array(
            'type' => 'input',
            'label' => __('Tags text', 'aplos'),
            'section' => 'aplos_site_text_section',
         )
      );
}

/**
 * Add styles to the page based on customization options
 *
 * @since Aplos 1.2.0
 */
function aplos_customize_css()
{
    // Theme defaults
    $defaults = aplos_get_defaults();

    //Fonts choices
    $fontsChoice = get_theme_mod('fonts_choices', "BebasNeue");
    $fontStart = $fontsChoice === 'verdana' ? '' : $fontsChoice.', ';
    $fontEnding = "Verdana, sans-serif";
    $font = $fontStart.$fontEnding;
    ?>
    <style type="text/css">
        h1,h2,h3,h4,h5,h6,
        .site-title,
        .site-description,
        .entry-title,
        .page-title,
        .widget-title,
        .main-navigation li,
        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"],
        button:hover,
        html input[type="button"]:hover,
        input[type="reset"]:hover,
        input[type="submit"]:hover,
        button:focus,
        html input[type="button"]:focus,
        input[type="reset"]:focus,
        input[type="submit"]:focus,
        button:active,
        html input[type="button"]:active,
        input[type="reset"]:active,
        input[type="submit"]:active {
            font-family: <?php echo $font; ?>;
        }
    </style> <?php

    //Color choices
    ?>
    <style type="text/css">
        .site-title a,
        .site-title a:hover,
        .site-title a:visited,
        .site-title a:focus,
        .site-title a:active,
        .site-info a,
        .site-info a:visited {
            color: <?php echo get_theme_mod('title_color', $defaults['colors']['title']);?>;
        }
        .main-navigation li,
        .widget-title,
        button,
        html input[type="button"],
        input[type="reset"],
        input[type="submit"],
        button:hover,
        html input[type="button"]:hover,
        input[type="reset"]:hover,
        input[type="submit"]:hover,
        button:focus,
        html input[type="button"]:focus,
        input[type="reset"]:focus,
        input[type="submit"]:focus,
        button:active,
        html input[type="button"]:active,
        input[type="reset"]:active,
        input[type="submit"]:active {
            background: <?php echo get_theme_mod('title_color', $defaults['colors']['title']);?>;
            color: <?php echo get_theme_mod('button_text_color', $defaults['colors']['button_text']);?>;
            border: <?php printf('1px solid %1$s', get_theme_mod('button_border_color', $defaults['colors']['button_border']));?>;
        }
        .site-description {
            color: <?php echo get_theme_mod('site_description', $defaults['colors']['site_description']);?>;
        }
        .main-navigation a,
        .main-navigation a:hover,
        .main-navigation a:visited,
        .main-navigation a:focus,
        .main-navigation a:active {
            color: <?php echo get_theme_mod('button_text_color', $defaults['colors']['button_text']);?>;
        }
        body,
        .site-header hgroup {
            background: <?php echo get_theme_mod('themebg_color', $defaults['colors']['background'])?>;
        }
        article,
        #secondary,
        #tertiary,
        #comments,
        .page-header {
            background: <?php echo get_theme_mod('content_bg_color', $defaults['colors']['content_background'])?>;
        }
        .entry-title a,
        .entry-title a:visited,
        .entry-title a:hover,
        .entry-title a:active,
        .entry-title a:focus,
         h1,h2,h3,h4,h5,h6 {
            color: <?php echo get_theme_mod('themebg_color', $defaults['colors']['background'])?>;
        }
        body,
        p {
            color: <?php echo get_theme_mod('text_color', $defaults['colors']['text_color'])?>;
        }
        a,
        a:visited {
            color: <?php echo get_theme_mod('link_color', $defaults['colors']['link']);?>;
        }
        a:hover,
        a:focus,
        a:active,
        .site-info,
        .site-info a:hover,
        .site-info a:focus,
        .site-info a:active {
            color: <?php echo get_theme_mod('link_hover_color', $defaults['colors']['link_hover']);?>;
        }
    </style>
      <?php

    // Collapisble menu on small screens
    $useCollapsibleNav = get_theme_mod('collapsible_nav', true);

    if ($useCollapsibleNav) : ?>
    <style type="text/css">
        @media only screen and (max-width: 580px) {
            .menu-toggle {
                display: block;
            }
            .site-navigation li {
                display: none;
            }

            .site-navigation.toggled li,
            .site-navigation.toggled button {
                float: none;
                display: block;
            }
        }
    </style>
<?php endif;

}

add_action('customize_register', 'aplos_customize_register');
add_action('wp_head', 'aplos_customize_css');

/**
 * Enqueue scripts and styles
 *
 * @since Aplos 1.2.0
 */
function aplos_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202');
    }

    if (get_theme_mod('fonts_choices') === "'Roboto Condensed'") {
        wp_enqueue_style('roboto-condensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:700&subset=latin,greek,latin-ext,cyrillic,vietnamese');
    }
}
add_action('wp_enqueue_scripts', 'aplos_scripts');

