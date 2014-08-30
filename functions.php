<?php
/**
 * Aplos functions and definitions
 *
 * @package Aplos
 * @since Aplos 1.0.1
 */
 
 /**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Aplos 1.0.0
 */
if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */
    
if ( ! function_exists( 'aplos_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Aplos 1.0.0
 */
function aplos_setup() {
 
    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
 
    /**
     * Custom functions that act independently of the theme templates
     */
    require( get_template_directory() . '/inc/tweaks.php' );
 
    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on aplos, use a find and replace
     * to change 'aplos' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'aplos', get_template_directory() . '/languages' );
 
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
 
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
 
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'aplos' ),
    ) );
}
endif; // aplos_setup
add_action( 'after_setup_theme', 'aplos_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Aplos 1.0.0
 */
function aplos_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Primary Widget Area', 'aplos' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
 
    register_sidebar( array(
        'name' => __( 'Secondary Widget Area', 'aplos' ),
        'id' => 'sidebar-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title">',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'aplos_widgets_init' );  

//add color selectors to Appearance menu
function aplos_customize_register($wp_customize) {
	//Layout Section
	$wp_customize->add_section( 'aplos_layout_choice_section' , array(
    		'title'      => __( 'Layout', 'aplos' ),
    		'priority'   => 30,
		'description' => __('Allows you to customize page layout.', 'aplos'),
	) );

	//Layout settings
	$wp_customize->add_setting( 'layout_choices',
         array(
           'default' => 'twocol',
         ) 
      );

	//Color settings
	$wp_customize->add_setting( 'title_color',
         array(
            'default' => '#DC3D24',
            'type' => 'theme_mod',
         ) 
      );

	$wp_customize->add_setting( 'themebg_color',
         array(
            'default' => '#232B2B',
            'type' => 'theme_mod',
         ) 
      );

	$wp_customize->add_setting( 'link_color',
         array(
            'default' => '#8F1E0C',
            'type' => 'theme_mod',
         ) 
      );

	$wp_customize->add_setting( 'link_hover_color',
         array(
            'default' => '#EE6D59',
            'type' => 'theme_mod',
         ) 
      );
	//Layout Controls
	$wp_customize->add_control( 'layout_choices',
         array(
            'type' => 'radio',
            'label' => 'Select Layout',
            'section' => 'aplos_layout_choice_section',
       	    'choices' => array(
            	'twocol' => 'Two Columns',
            	'threecol' => 'Three Columns',
        	),
         ) 
      );

	//Color Controls
	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize, //Pass the $wp_customize object (required)
         'aplos_title_color', //Set a unique ID for the control
         array(
            'label' => __( 'Title Color', 'aplos' ), //Admin-visible name of the control
            'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'title_color', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         ) 
      ) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_themebg_color', //Set a unique ID for the control
         array(
            'label' => __( 'Background Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'themebg_color',
            'priority' => 5,
         ) 
      ) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_color', //Set a unique ID for the control
         array(
            'label' => __( 'Link Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'link_color',
            'priority' => 15,
         ) 
      ) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_hover_color', //Set a unique ID for the control
         array(
            'label' => __( 'Link Hover Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'link_hover_color',
            'priority' => 20,
         ) 
      ) );
}

function aplos_customize_css() {
	$layoutchoice = get_theme_mod('layout_choices');
	switch($layoutchoice){
			case 'twocol': ?>
				<style type="text/css">
                    #primary {
                    	float: left;
                    	margin: 0 -27% 0 0;
                    	padding-top: 1em;
                    	width: 90%;
                    }
                    #content {
                    	margin: 0 19% 0 0;
                    }
                    #secondary,
                    #tertiary {
                    	background: #fff;
                       	float: right;
                       	margin: 0;
                        padding: 2em 2em 0;
                        position: relative;
                        width: 20%;
                    	height: 100%;
                    	margin-top: 1em;
                    	-moz-border-radius: 5px;
                    	-webkit-border-radius: 5px;
                    	border-radius: 5px;
                    }
                    #tertiary {
                    	padding-top: 0;
                    }
				</style> <?php
				break;
			case 'threecol': ?>
				<style type="text/css">
                    #primary {
                    	float: left;
                    	width: 90%;
                    }
                    #content {
                    	margin: 0 25%;
                    }

                    #secondary {
                    	float: left;
                    	overflow: hidden;
                    	width: 15%;
                    	background: #fff;
                    	height: 100%;
                    	padding: 2em 2em 0;
                    	position: relative;
                    	margin: 0 0 0 -90%;
                    	-moz-border-radius: 5px;
                    	-webkit-border-radius: 5px;
                    	border-radius: 5px;
                    }
                    #tertiary {
                    	float: left;
                    	overflow: hidden;
                    	width: 15%;
                    	background: #fff;
                    	height: 100%;
                    	padding: 2em 2em 0;
                    	position: relative;
                    	margin: 0 0 0 -20%;
                    	-moz-border-radius: 5px;
                    	-webkit-border-radius: 5px;
                    	border-radius: 5px;
                    }
				</style> <?php
				break;
                default: ?>
                <style type="text/css">
                    #primary {
                        float: left;
                        margin: 0 -27% 0 0;
                        padding-top: 1em;
                        width: 90%;
                    }
                    #content {
                        margin: 0 19% 0 0;
                    }
                    #secondary,
                    #tertiary {
                        background: #fff;
                        float: right;
                        margin: 0;
                        padding: 2em 2em 0;
                        position: relative;
                        width: 20%;
                        height: 100%;
                        margin-top: 1em;
                        -moz-border-radius: 5px;
                        -webkit-border-radius: 5px;
                        border-radius: 5px;
                    }
                    #tertiary {
                        padding-top: 0;
                    }
                </style> <?php
			}

	?>
      		<style type="text/css">
           		.site-title a, .site-title a:hover, .site-title a:visited, .site-title a:focus, .site-title a:active { color:<?php echo get_theme_mod('title_color'); ?>; }
			.main-navigation li { background:<?php echo get_theme_mod('title_color'); ?>; }
			.widget-title { background:<?php echo get_theme_mod('title_color'); ?>; }
			.site-info a, .site-info a:visited { color:<?php echo get_theme_mod('title_color'); ?>; }

			body { background:<?php echo get_theme_mod('themebg_color'); ?>; }
			.site-header hgroup { background:<?php echo get_theme_mod('themebg_color'); ?>; }

			a, a:visited { color:<?php echo get_theme_mod('link_color'); ?>; }

			a:hover, a:focus, a:active { color:<?php echo get_theme_mod('link_hover_color'); ?>; }
			.site-info { color:<?php echo get_theme_mod('link_hover_color'); ?>; }
			.site-info a:hover, .site-info a:focus, .site-info a:active { color:<?php echo get_theme_mod('link_hover_color'); ?>; }
      		</style> 
      <?php
}

add_action('customize_register', 'aplos_customize_register');
add_action( 'wp_head', 'aplos_customize_css');


/**
 * Enqueue scripts and styles
 */
function aplos_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
 
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
 
    if ( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'aplos_scripts' );