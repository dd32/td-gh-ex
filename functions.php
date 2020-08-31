<?php



/*  -----------------------------------------------------------------------------------------------

  THEME SUPPORTS

  Default setup.

  --------------------------------------------------------------------------------------------------- */



  function baena_theme_support() {

    // Automatic feed

    add_theme_support( 'automatic-feed-links' );



    // Custom background color

    add_theme_support( 'custom-background', array(

      'default-color' => 'FFFFFF'

    ) );



    // Set content-width

    global $content_width;

    if ( ! isset( $content_width ) ) {

      $content_width = 580;

    }



    // Post thumbnails

    add_theme_support( 'post-thumbnails' );



    // Set post thumbnail size

    $low_res_images = get_theme_mod( 'baena_activate_low_resolution_images', false );

    if ( $low_res_images ) {

      set_post_thumbnail_size( 1120, 9999 );

    } else {

      set_post_thumbnail_size( 2240, 9999 );

    }



    // Add image sizes

    add_image_size( 'baena_preview_image_low_resolution', 540, 9999 );

    add_image_size( 'baena_preview_image_high_resolution', 1080, 9999 );

    add_image_size( 'baena_fullscreen', 1980, 9999 );



    // Custom logo

    add_theme_support( 'custom-logo', 

      array(

      'height'      => 100,

      'width'       => 400,

      'flex-width' => true,

      'header-text' => array( 'site-title', 'site-description' ),

    ) 

    );



    // Title tag

    add_theme_support( 'title-tag' );



    // HTML5 semantic markup

    add_theme_support( 'html5', array(

      'search-form',

      'comment-form',

      'comment-list',

      'gallery',

      'caption',

    ) );



    // Make the theme translation ready

    load_theme_textdomain( 'baena' );



    // Alignwide and alignfull classes in the block editor

    add_theme_support( 'align-wide' );



    }

    add_action( 'after_setup_theme', 'baena_theme_support' );







/*  -----------------------------------------------------------------------------------------------

  REGISTER STYLES & SCRIPTS

  Register and enqueue CSS & JavaScript

  --------------------------------------------------------------------------------------------------- */



  function baena_main_scripts() {

    wp_enqueue_style( 'baena_style', get_stylesheet_uri() );

    wp_enqueue_style( 'baena_main', get_template_directory_uri() . '/assets/css/baena_main.css', array(), '1.1', 'all');

    wp_enqueue_style( 'baena_normalize', get_template_directory_uri() . '/assets/css/baena_normalize.css', array(), '1.1', 'all');

    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Noto+Serif:400,700|Quicksand:400,500,700', array());

        

    wp_enqueue_script( 'baena_main-script', get_template_directory_uri() . '/assets/js/baena_main.js', array( 'jquery' ));

     wp_enqueue_script( 'baena-index-script', get_template_directory_uri() . '/assets/js/index.js', array( 'jquery' ));

    wp_enqueue_script( 'baena_jquery.slides.min', get_template_directory_uri() . '/assets/js/baena_jquery.slides.min.js', array( 'jquery' ));

  

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

      wp_enqueue_script( 'comment-reply' );

    }

  }

  add_action( 'wp_enqueue_scripts', 'baena_main_scripts' );



/* ---------------------------------------------------------------------------------------------

   EDITOR STYLES FOR THE CLASSIC EDITOR

   --------------------------------------------------------------------------------------------- */

function baena_classic_editor_styles() {

  $classic_editor_styles = array(

    '/assets/css/editor-style-classic.css',

  );

  add_editor_style( $classic_editor_styles );

}

add_action( 'init', 'baena_classic_editor_styles' );



/*  -----------------------------------------------------------------------------------------------

  MENUS

  Register navigational menus (wp_nav_menu)

  --------------------------------------------------------------------------------------------------- */



  function baena_menus() {

    register_nav_menus(

      array(     
        'primary'  => __( 'Desktop Horizontal Menu', 'baena' ),
        'expanded' => __( 'Desktop Expanded Menu', 'baena' ),
        'mobile'   => __( 'Mobile Menu', 'baena' ),
        'menubottom' => __( 'Menu foot', 'baena' ),
        'social'   => __( 'Social Menu', 'baena' ),

      )

    );

  }

  add_action( 'init', 'baena_menus' );





/* ------------------------------------------------------------------------------------------------

   REGISTER THEME WIDGETS

   --------------------------------------------------------------------------------------------------- */



   function baena_widgets_baena() {

    register_sidebar( array(

      'name'          => esc_html__( 'widget foot', 'baena' ),

      'id'            => 'widgetsfoot',

      'description'   => esc_html__( 'Add widgets here.', 'baena' ),

      'before_widget' => '<section id="%1$s" class="widget %2$s">',

      'after_widget'  => '</section>',

      'before_title'  => '<h2 class="widget-title">',

      'after_title'   => '</h2>',

    ) );

    register_sidebar( array(

      'name'          => esc_html__( 'widget column', 'baena' ),

      'id'            => 'widgetscolumn',

      'description'   => esc_html__( 'Add widgets here.', 'baena' ),

      'before_widget' => '<section id="%1$s" class="widget %2$s">',

      'after_widget'  => '</section>',

      'before_title'  => '<h2 class="widget-title">',

      'after_title'   => '</h2>',

    ) );

  }

  add_action( 'widgets_init', 'baena_widgets_baena' );







/*  -----------------------------------------------------------------------------------------------

  EXCERPT

  --------------------------------------------------------------------------------------------------- */



  function baena_custom_length_excerpt($word_count_limit) {

    $content = wp_strip_all_tags(get_the_excerpt() , true );

    echo wp_trim_words($content, $word_count_limit);

  }

  add_filter('baena_custom_length_excerpt', 'baena_custom_length_excerpt');

  

  function baena_new_excerpt_more( $more ) {

    if ( is_admin() ) return $more;

  }

  add_filter('excerpt_more', 'baena_new_excerpt_more');







?>