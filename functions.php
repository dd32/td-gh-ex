<?php
/**
 * Aplos functions and definitions
 *
 * @package Aplos
 * @since Aplos 1.1.0
 */
 
    
if ( ! function_exists( 'aplos_setup' ) ):

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
     * Translations should be filed in the /languages/ directory
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

    if ( ! isset( $content_width ) ) {
        $content_width = 654;
    }
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

// Filter the wp_title tag
function aplos_wp_title($title, $sep){
    if(is_feed()){
        return $title;
    }

    global $page, $paged;

    // Add blog name
    $title .= get_bloginfo('name','display');

    //Add blog description for home page
    $site_description = get_bloginfo('description','display');
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title .= " $sep $site_description";
    }

    // Add page number
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title .= " $sep " . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter('wp_title','aplos_wp_title',10,2);


//Add color selectors to Appearance menu
function aplos_customize_register($wp_customize) {
	//Layout Section
	$wp_customize->add_section( 'aplos_layout_choice_section' , array(
    		'title'      => __( 'Layout', 'aplos' ),
    		'priority'   => 30,
		'description' => __('Allows you to customize page layout.', 'aplos'),
	) );

    //Fonts Section
    $wp_customize->add_section( 'aplos_fonts_choice_section' , array(
            'title'      => __( 'Fonts', 'aplos' ),
            'priority'   => 30,
        'description' => __('Allows you to change the font of post titles (Verdana is suggested for languagues with characters other than the basic Latin alphabet).', 'aplos'),
    ) );

	//Layout settings
	$wp_customize->add_setting( 'layout_choices',
         array(
           'default' => 'twocol',
         ) 
      );

  //Fonts settings
  $wp_customize->add_setting( 'fonts_choices',
         array(
           'default' => 'bebas',
           'type' => 'theme_mod',
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
            'label' => __('Select Layout', 'aplos'),
            'section' => 'aplos_layout_choice_section',
       	    'choices' => array(
            	'twocol' => __('Two Columns', 'aplos'),
            	'threecol' => __('Three Columns', 'aplos'),
        	),
         ) 
      );

	//Color Controls
	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_title_color', //Set a unique ID for the control
         array(
            'label' => __( 'Title Color', 'aplos' ), //Admin-visible name of the control
            'section' => 'colors', //ID of section
            'settings' => 'title_color', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         ) 
      ) );

    //Fonts Controls
    $wp_customize->add_control( 'fonts_choices',
         array(
            'type' => 'select',
            'label' => __('Select Post Title Font', 'aplos'),
            'section' => 'aplos_fonts_choice_section',
            'choices' => array(
                'bebas' => __('Theme Default', 'aplos'),
                'verdana' => __('Verdana', 'aplos'),
            ),
         ) 
      );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_themebg_color',
         array(
            'label' => __( 'Background Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'themebg_color',
            'priority' => 5,
         ) 
      ) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_color',
         array(
            'label' => __( 'Link Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'link_color',
            'priority' => 15,
         ) 
      ) );

	$wp_customize->add_control( new WP_Customize_Color_Control(
         $wp_customize,
         'aplos_link_hover_color',
         array(
            'label' => __( 'Link Hover Color', 'aplos' ),
            'section' => 'colors',
            'settings' => 'link_hover_color',
            'priority' => 20,
         ) 
      ) );
}

function aplos_customize_css() {
  //Layout choices
	$layoutchoice = get_theme_mod('layout_choices');
	switch($layoutchoice){
			case 'twocol': ?>
				<style type="text/css">
                    #primary {
                    	float: left;
                    	margin: 0;
                    	padding: 1em 0 0 0;
                    	width: 73%;
                    }
                    #content {
                    	margin: 0 2% 0 0;
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
                      clear: right;
                    }
                    #tertiary {
                    	padding-top: 0;
                    }
                    @media only screen and (max-width: 820px) {
                      #primary {
                        width: 55%;
                      }

                      #secondary,
                      #tertiary {
                        width: 35%;
                      }

                      #main {
                        padding: 0.8em;
                      }

                      .site-navigation {
                        padding: 0 0.8em;
                      }
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
                    	margin: 0 26%;
                    }

                    #secondary {
                    	float: left;
                    	overflow: hidden;
                    	width: 15%;
                    	background: #fff;
                    	height: 100%;
                    	padding: 2em 2em 0;
                    	position: relative;
                    	margin: 1em 0 0 -90%;
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
                    	margin: 1em 0 0 -20%;
                    	-moz-border-radius: 5px;
                    	-webkit-border-radius: 5px;
                    	border-radius: 5px;
                    }
                    @media only screen and (max-width: 820px) {
                      #content {
                        margin: 0 22% 0 31%;
                      }

                      #main {
                        padding: 0.8em;
                      }

                      #tertiary {
                        margin: 1em 0 0 -16%;
                      }

                      .site-navigation {
                            padding: 0 0.8em;
                        }
                  }

				</style> <?php
				break;
                default: ?>
                <style type="text/css">
                    #primary {
                        float: left;
                        margin: 0;
                        padding-top: 1em;
                        width: 73%;
                    }
                    #content {
                        margin: 0 2% 0 0;
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
                        clear: right;
                    }
                    #tertiary {
                        padding-top: 0;
                    }
                    @media only screen and (max-width: 820px) {
                      #primary {
                        width: 55%;
                      }

                      #secondary,
                      #tertiary {
                        width: 35%;
                      }

                      #main {
                        padding: 0.8em;
                      }

                      .site-navigation {
                        padding: 0 0.8em;
                      }
                    }
                </style> <?php
			}

      //Fonts choices
      $fontschoice = get_theme_mod('fonts_choices');
      switch($fontschoice){
          case 'bebas': ?>
            <style type="text/css">
                .entry-title,
                .page-title {
                  font-family: 'Conv_BEBAS', Verdana, sans-serif;
                  word-spacing: 2px;
                }
            </style> <?php
            break;
          case 'verdana': ?>
            <style type="text/css">
                .entry-title,
                .page-title {
                  font-family: Verdana, sans-serif;
                  word-spacing: normal;
                  font-weight: bold;
                }
            </style> <?php
            break;
            default: ?>
              <style type="text/css">
                .entry-title,
                .page-title {
                  font-family: 'Conv_BEBAS', Verdana, sans-serif;
                  word-spacing: 2px;
                }
              </style> <?php
      }


      //Color choices
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