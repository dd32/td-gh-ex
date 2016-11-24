<?php
/*Template for function code for theme.
*
*@package -> Wordpress
*@sub-package -> afia
*@since -> V 1.0.0
*/  
 
/**
 * Enqueue scripts and styles.
 */
function afia_enqueue_scripts()
  {
  wp_enqueue_style('font-awesome',get_template_directory_uri() .'/assets/css/font-awesome.min.css');
  wp_enqueue_style('bootstrap',get_template_directory_uri() .'/assets/css/bootstrap.css');
  wp_enqueue_style( 'afia-style', get_stylesheet_uri() ,array (), false, 'all');
  wp_enqueue_style('afia-handheld',get_template_directory_uri() .'/assets/css/handheld.css',array (), false, 'all and (max-width:768px)');
  wp_enqueue_script( 'jquery');

  wp_enqueue_script( 'afia-functions',get_template_directory_uri().'/lib/js/functions.js');
  wp_enqueue_script( 'html5',get_template_directory_uri().'/lib/js/html5.js');
  wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
  }
add_action( 'wp_enqueue_scripts', 'afia_enqueue_scripts' );

$site_layout = array('pull-right' =>  esc_html__('Left Sidebar','afia'), 'side-right' => esc_html__('Right Sidebar','afia'), 'no-sidebar' => esc_html__('No Sidebar','afia'),'full-width' => esc_html__('Full Width', 'afia'));


if ( ! function_exists( 'afia_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since afia 1.0.0
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function afia_excerpt_more( $more )
 {
  $link = sprintf( '<a href="%1$s" class="more-link linkb">%2$s</a>',esc_url( get_permalink( get_the_ID() ) ),/* translators: %s: Name of current post */
  sprintf( __( 'Continue reading %s ', 'afia' ), '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' ));
  return ' &hellip; ' . $link;
 }
add_filter( 'excerpt_more', 'afia_excerpt_more' );
endif;


/*
*Function to write the top bar content.
*/
if(! function_exists('afia_top_bar')):
function afia_top_bar()
{
  if(!is_home()):
    $home = '<span class = "idle"><a href = "'.esc_url( home_url( '/' ) ).'" title = "'.__('HOME','afia').'"><i class= "fa fa-home"></i>  '.__('HOME','afia').'</a></span> ';
    $single = afia_title();
    $fin = $home.''.$single;
   echo $fin;
   else:
   $fin = '';
  endif;
  
}
//End of afia top bar.
endif;

/*
*Function to return the title of a page.
*/
if(! function_exists('afia_title')):
function afia_title()
{
  if (is_archive()) 
  {
     $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
     if ($term) 
   {
      return '<span class = "active"><i class= "fa fa-sticky-note"></i> '.apply_filters('single_term_title', $term->name).'</span>';
     } 
   elseif (is_post_type_archive()) 
   {
      return '<span class = "active"><i class= "fa fa-sticky-note"></i> '.apply_filters('the_title', get_queried_object()->labels->name).'</span>';
     }
   elseif (is_day()) 
   {
      return '<span class = "active"><i class= "fa fa-calendar"></i> '.sprintf(__('Daily Archives: %s', 'afia'), get_the_date()).'</span>';
     } 
   elseif (is_month()) 
   {
      return '<span class = "active"><i class= "fa fa-calendar"></i> '.sprintf(__('Monthly Archives: %s', 'afia'), get_the_date('F Y')).'</span>';
     }
   elseif (is_year()) 
   {
      return '<span class = "active"><i class= "fa fa-calendar"></i> '.sprintf(__('Yearly Archives: %s', 'afia'), get_the_date('Y')).'</span>';
     }
   elseif (is_author()) 
   {
      $author = get_queried_object();
      return '<span class = "active"><i class= "fa fa-user"></i> '.sprintf(__('Author Archives: %s', 'afia'), $author->display_name).'</span>';
     }
   else 
   {     
      return '<span class = "active"> <i class= "fa fa-sticky-note"></i> '.single_cat_title('', false).'</span>';
     }
   } 
   elseif (is_search()) 
   {
    return '<span class = "active"> <i class= "fa fa-search"></i> '.sprintf(__('Search Results for %s', 'afia'), get_search_query()).'</span>';
   }
   elseif (is_404()) 
   {
    return '<span class = "active"><i class= "fa fa-warning"></i> '.__('Not Found', 'afia').'</span>';
   }
   else 
   {
    $c = get_the_category();
    $cat_name = $c[0]->name;
    $cat_id = get_cat_ID($cat_name);
    $cat_link = get_category_link($cat_id);
    $lk = '<span class="idle"><a href = "'.$cat_link.'" title = "'.__('Category ','afia').'->'.$cat_name.'"><i class= "fa fa-folder"></i> '.$cat_name.'</a></span>'.'<span class = "active"><i class= "fa fa-sticky-note"></i> '.get_the_title().'</span>';
   return $lk;
   }
}
endif;



function afia_set_up()
{
 add_theme_support( 'post-thumbnails' ); 
/**
*Add support for background info.
*/
 $background_args = array('default-color'  => '#f2f2f2','default-repeat' => 'fixed');
 add_theme_support( 'custom-background', $background_args );
 
/**
*Register menus.
*/
 register_nav_menus( array('primary' => 'Primary Navigation'));

/**
*Add support for logo image.
*/
add_theme_support( 'custom-logo', array(
  'height'      => 50,
  'width'       => 50,
  'flex-height' => true,
  'flex-width'  => true,
) );

/**
*Add support for header image.
*/
  $defaults = array(
  'default-image'          => esc_url(get_template_directory_uri() . '/assets/img/header.jpeg'),
  'width'                  => 1920,
  'height'                 => 1280,
  'flex-height'            => false,
  'flex-width'             => false,
  'uploads'                => true,
  'random-default'         => false,
  'header-text'            => false,
   );
 add_theme_support( 'custom-header', $defaults );

/**
*Add support for feed.
*/
 add_theme_support( 'automatic-feed-links' );

/**
*Add support for title to avoid hard coding.
*/
 add_theme_support( 'title-tag' );
 
// editor style
 add_editor_style('/assets/css/editor-style.css');

// Content width
  global $content_width;
  if (!isset($content_width)) { $content_width = 657; }
}
 add_action('after_setup_theme', 'afia_set_up');

function afia_setup_cus($wp_customize ) 
{
    $wp_customize->add_panel('afia_main_options', array(
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Afia Options', 'afia'),
        'description' => __('Panel to update afia theme options', 'afia'), 
        'priority' => 10 
    ));

            $wp_customize->add_section('afia_layout_section', array(
            'title' => __('Layout options', 'afia'),
            'priority' => 31,
            'panel' => 'afia_main_options'
        ));
    // Layout options
            global $site_layout;
            $wp_customize->add_setting('afia_sidebar_position', array(
                 'default' => 'side-right',
                 'sanitize_callback' => 'afia_sanitize_layout'
            ));
            $wp_customize->add_control('afia_sidebar_position', array(
                 'label' => __('Website Layout Options', 'afia'),
                 'section' => 'afia_layout_section',
                 'type'    => 'select',
                 'description' => __('Choose between different layout options to be used as default', "afia"),
                 'choices'    => $site_layout
            ));

            $wp_customize->add_section('afia_front_section', array(
            'title' => __('Header options', 'afia'),
            'priority' => 32,
            'panel' => 'afia_main_options'
            ));

            $wp_customize->add_setting('afia_header_title', array(
                 'default' => 'Afia',
                 'sanitize_callback' => 'afia_sanitize_strip_slashes'
            ));
            $wp_customize->add_control('afia_header_title', array(
                 'label' => __('Header Title', 'afia'),
                 'section' => 'afia_front_section',
                 'type'    => 'text',
                 'description' => __('Header title in the front page', "afia")
            ));

            $wp_customize->add_setting('afia_header_description', array(
                 'default' => 'Clean & minimal Theme',
                 'sanitize_callback' => 'afia_sanitize_strip_slashes'
            ));
            $wp_customize->add_control('afia_header_description', array(
                 'label' => __('Header Description', 'afia'),
                 'section' => 'afia_front_section',
                 'type'    => 'text',
                 'description' => __('Header Description for the front page', "afia")
            ));

            //url link
            $wp_customize->add_setting('afia_header_url', array(
                 'default' => '#',
                 'sanitize_callback' => 'esc_url'
            ));
            $wp_customize->add_control('afia_header_url', array(
                 'label' => __('Url link', 'afia'),
                 'section' => 'afia_front_section',
                 'type'    => 'text',
                 'description' => __('Link to the content shown.', "afia")
            ));

            //url text.
            $wp_customize->add_setting('afia_text_url', array(
                 'default' => 'Check it out',
                 'sanitize_callback' => 'esc_url'
            ));
            $wp_customize->add_control('afia_text_url', array(
                 'label' => __('Url Text', 'afia'),
                 'section' => 'afia_front_section',
                 'type'    => 'text',
                 'description' => __('Button text.', "afia")
            ));
            //url text.
            $wp_customize->add_setting('afia_show_header', array(
                 'default' => 0,
                 'sanitize_callback' => 'afia_sanitize_checkbox'
            ));
            $wp_customize->add_control('afia_show_header', array(
                 'label' => __('Show header section in other pages.', 'afia'),
                 'section' => 'afia_front_section',
                 'type'    => 'checkbox',
                 'description' => __('Check this to display the header sections in all pages.', "afia")
            ));
            //Text Color.
            $wp_customize->add_setting( 'afia_mheade_color', 
              array(
          'default' => '#ffffff', 
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'afia_sanitize_hex',
            ));
          $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'afia_mheade_color',array(
                'section' => 'afia_front_section',
                'label' => __( 'Header Section Text Color','afia' ),
                'description' => __( 'Set the color for Text in the Header Section.','afia' ),
                ) ));
    //Color Section
          $wp_customize->add_section('afia_color', array(
            'title' => __('Color options', 'afia'),
            'priority' => 33,
            'panel' => 'afia_main_options'
            ));

        //Main post Background Setting.
              $wp_customize->add_setting( 'afia_main_back', 
                   array(
                      'default' => '#ffffff', 
                      'type' => 'theme_mod', 
                      'capability' => 'edit_theme_options', 
                      'sanitize_callback' => 'afia_sanitize_hex',
                   ) 
                );
              $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'afia_main_back',array(
                'section' => 'afia_color',
                'label' => __( 'Main content Background Color','afia' ),
                'description' => __( 'Set the Background color for main post content.','afia' ),
                ) ));

                  //Main body content.
            $wp_customize->add_setting( 'afia_main_color', 
                 array(
                    'default' => '#000000', 
                    'type' => 'theme_mod', 
                    'capability' => 'edit_theme_options', 
                    'sanitize_callback' => 'afia_sanitize_hex',
                 ));
            $wp_customize->add_control(new WP_Customize_Color_Control( $wp_customize, 'afia_main_color',array(
              'section' => 'afia_color',
              'label' => __( 'Main content Text Color','afia' ),
              'description' => __( 'Set the color for main post content.','afia' ),
              ) ));
    
  
  
}
add_action( 'customize_register', 'afia_setup_cus' );

/**
 * Adds sanitization callback function: Sidebar Layout
 * @package Afia
 */
function afia_sanitize_layout( $input ) {
    global $site_layout;
    if ( array_key_exists( $input, $site_layout ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Sanitzie checkbox for WordPress customizer
 */
function afia_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

/**
 * Adds sanitization callback function: colors
 * @package sfia
 */
function afia_sanitize_hex($color) {
    //if ($unhashed = sanitize_hex_color_no_hash($color))
        //return '#' . $unhashed;
    return sanitize_hex_color($color);
}

/**
 * Adds sanitization callback function: Strip Slashes
 * @package Afia
 */
function afia_sanitize_strip_slashes($input) {
    return wp_kses_stripslashes($input);
}

/**
 * Register our sidebars and widgetized areas.
 *
 */

function afia_widgets_init() {

  register_sidebar( array(
    'name'          => __('right sidebar','afia'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="rounded">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'afia_widgets_init' );


function afia_customze_css()
{
?>

<style>
 #leftContent,#sideba>div{background:<?php echo esc_html(get_theme_mod('afia_main_back','#ffffff'));?>;}

 .content-post{ color:<?php echo esc_html(get_theme_mod('afia_main_color','#000000')); ?>;}
 <?php 
 if(get_theme_mod( 'custom_logo' )):
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?>
#logo
{
background:url(<?php echo $image[0];?>) no-repeat center center;
background-size:cover;
border-radius:50%;
display:inline-block;
height:50px;
width:50px;
}
<?php
endif;
if(is_home() || is_front_page()):?>
 .top-bar{display:none;}
  <?php
endif;
 $z  = get_header_image();
if(! $z):
?>
 #header-img{display:none;}
<?php
endif; 
$layout = afia_sanitize_layout(get_theme_mod('afia_sidebar_position','side-right'));
if($layout == 'pull-right'):
?>
#leftContent{float:right;}
<?php endif;?>
<?php 
if(get_header_image() != ''){?>
#header-img{
  height:100%;
    color: <?php echo afia_sanitize_hex(get_theme_mod('afia_mheade_color', '#ffffff') );?>;
  background:url("<?php header_image();?>") no-repeat center center;
  background-size: cover;
  text-align: center;
  min-height:400px;
}
<?php }?>
  </style>
   
<?php 
    
}
add_action( 'wp_head', 'afia_customze_css');



?>