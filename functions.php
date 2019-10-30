<?php
    if(!defined('AXIOHOST_THEME_URI')){
        define('AXIOHOST_THEME_URI', get_template_directory_uri());
    }
    define('AXIOHOST_THEME_DIR', get_template_directory());
    define('AXIOHOST_CSS_URL', get_template_directory_uri() . '/assets/css');
    define('AXIOHOST_JS_URL', get_template_directory_uri() . '/assets/js');
    define('AXIOHOST_IMG_URL', AXIOHOST_THEME_URI . '/assets/images');
    define('AXIOHOST_INC_DIR', AXIOHOST_THEME_DIR . '/inc');
    define('AXIOHOST_THEME', true);
    function axiohost_setup(){
        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        
        /*
    	 * Make theme available for translation.
    	 * Translations can be filed in the /languages/ directory.
    	 * If you're building a theme based on Laundry, use a find and replace
    	 * to change 'laundry' to the name of your theme in all the template files.
    	 */
        load_theme_textdomain( 'axiohost', get_template_directory() . '/languages' );
        
        // Set the default content width.
	       $GLOBALS['content_width'] = 900;

        //Support Automatic Feed Links 
        add_theme_support( 'automatic-feed-links' );
        
        //Support Post-Thumbnails
        add_theme_support('post-thumbnails');
        
        //Support Titile Tag
        add_theme_support('title-tag');
        
        //Add Image Size
        add_image_size( 'axiohost-featured-image', 730, 430, false );

    	// Load regular editor styles into the new block-based editor.
    	add_theme_support( 'editor-styles' );
        
        //enqueue editor style
        add_editor_style('style-editor.css');
        
     	// Load default block styles.
    	add_theme_support( 'wp-block-styles' );
    
    	// Add support for responsive embeds.
    	add_theme_support( 'responsive-embeds' );
    	
    	//Add support for theme logo
    	add_theme_support( 'custom-logo');
    	
    	add_theme_support( "custom-header" );
    	
    	 add_theme_support( "custom-background" );
    
    }
    add_action('after_setup_theme', 'axiohost_setup');
    
    //axiohost Theme Options
    require_once('inc/theme-options.php');
    
    
    //axiohost User Meta Extra Field
    include_once('inc/user-meta-extra-fields.php');
    
    //axiohost comments layout
    include_once('inc/comments-layout.php'); 
    
    //axiohost comments layout
    include_once('inc/admin-page.php'); 
    
    //axiohost TGM Plugin Activation
    require_once('inc/class-tgm-plugin-activation.php');
    
    //axiohost Requiered Plugins
     require_once('inc/theme-plugins.php');
   
    //custom comments form label
    function axiohost_comment_form_text($fields){
        $fields['label_submit'] = esc_html__('Add Comment', 'axiohost');
        $fields['title_reply'] = esc_html__('Leave a Comment', 'axiohost');
        
        return $fields;
    }
    add_filter('comment_form_defaults', 'axiohost_comment_form_text');


    
    //comment field move to bottom
    function axiohost_move_comment_field_to_bottom( $fields ) {
        $comment_field = $fields['comment'];
        unset( $fields['comment'] );
        $fields['comment'] = $comment_field;
        return $fields;
    }     
    add_filter( 'comment_form_fields', 'axiohost_move_comment_field_to_bottom' );
    
    //axiohost Nav Menus
    function axiohost_nav_menus(){
        register_nav_menus(array(
             'primary_menu' =>  esc_html__('Primary Menu', 'axiohost'),
             'footer_menu' =>  esc_html__('Footer Menu', 'axiohost'),
        ));
     }   
     add_action('init', 'axiohost_nav_menus');
     
     //axiohost Sidebar
    function axiohost_sidebar(){
        register_sidebar(array(
            'name' => esc_html__('Axiohost Sidebar', 'axiohost'),
            'id'  => 'axiohost-sidebar',
            'description' =>  esc_html__('Axiohost sidebar', 'axiohost'),
            'before_title' => '<h4 class="sidebar-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
            'after_title' => '</h4>',
            'before_widget' => '<div id="%1$s" class="sidebar-widget widget %2$s">',
            'after_widget' => '</div>'
        ));
        
         register_sidebar(array(
            'name' => esc_html__('Footer One', 'axiohost'),
            'id'  => 'footer1',
            'description' =>  esc_html__('Footer one sidebar', 'axiohost'),
            'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
            'after_title' => '</h4>',
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget' => '</div>'
        ));
        
         register_sidebar(array(
            'name' => esc_html__('Footer Two', 'axiohost'),
            'id'  => 'footer2',
            'description' =>  esc_html__('Footer two sidebar', 'axiohost'),
            'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
            'after_title' => '</h4>',
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget' => '</div>'
        ));
        
         register_sidebar(array(
            'name' => esc_html__('Footer Three', 'axiohost'),
            'id'  => 'footer3',
            'description' =>  esc_html__('Footer three sidebar', 'axiohost'),
            'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
            'after_title' => '</h4>',
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget' => '</div>'
        ));
        
         register_sidebar(array(
            'name' => esc_html__('Footer Four', 'axiohost'),
            'id'  => 'footer4',
            'description' =>  esc_html__('Footer four sidebar', 'axiohost'),
            'before_title' => '<h4 class="footer-title heading-4"><span><i class="fa fa-square"></i> <i class="fa fa-square"></i> </span>',
            'after_title' => '</h4>',
            'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
            'after_widget' => '</div>'
        ));
        
         register_sidebar(array(
            'name' => esc_html__('Footer Links', 'axiohost'),
            'id'  => 'footer-menu',
            'description' =>  esc_html__('Footer links widget', 'axiohost'),
            'before_widget' => '<div id="%1$s"  class="footer-copyright-menu">',
            'after_widget' => '</div>'
        ));
        
    }
    add_action('widgets_init', 'axiohost_sidebar');

    
    //axiohost excerpt
    function axiohost_excerpt($limits = 25){
        $limits = $limits + 1;
        $content = strip_tags(get_the_content());
        $make_index = explode(' ', $content, $limits);
        if(count($make_index) <= $limits){
            array_pop($make_index);
        }
        $excerpt = implode(' ', $make_index);
        return $excerpt;

    }

    

    //Override redux message
    function axiohost_override_redux_message() {
        update_option( 'ReduxFrameworkPlugin_ACTIVATED_NOTICES', []);
    }
    add_action('admin_init', 'axiohost_override_redux_message', 30);
    
    
    
    function axiohost_scripts(){
        
        //Google Fonts
       wp_enqueue_style('google-font-popins', '//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700');
       

       //====================ALL CSS FILE HERE=====================================//
       
       //Bootstrap CSS
       wp_enqueue_style('bootstrap', AXIOHOST_CSS_URL.'/bootstrap.min.css', null, 'v4.1.1', 'all');
       
       //App Full Screen Modal CSS
       wp_enqueue_style('ap-screen-modal', AXIOHOST_CSS_URL.'/ap-fullscreen-modal.min.css', null, 'v4.0', 'all');

       //Nivo Slider CSS
       wp_enqueue_style('nivo-slider', AXIOHOST_CSS_URL.'/nivo-slider.css', null, 'v3.2', 'all');
       
       //Slim Menu CSS
       wp_enqueue_style('slimmenu', AXIOHOST_CSS_URL.'/slimmenu.min.css', null, 'v1.0', 'all');
       
       //Font Awesome CSS
       wp_enqueue_style('font-awesome', AXIOHOST_CSS_URL.'/font-awesome.min.css', null, '4.7.0', 'all');
       
       //Animate CSS
       wp_enqueue_style('animate', AXIOHOST_CSS_URL.'/animate.min.css', null, '3.5.2', 'all');
       
       //Slick CSS
       wp_enqueue_style('slick', AXIOHOST_CSS_URL.'/slick.css', null, 'v1.0', 'all');   
       
       //Slick Theme CSS
       wp_enqueue_style('slick-theme', AXIOHOST_CSS_URL.'/slick-theme.css', null, 'v1.0', 'all');   

       //Owl Carousel CSS
       wp_enqueue_style('owl-carousel', AXIOHOST_CSS_URL.'/owl.carousel.min.css', null, 'v2.3.4', 'all');

       //Main Stylesheet
       wp_enqueue_style('main', AXIOHOST_CSS_URL.'/main.css', null, 'v1.0', 'all');
       
       //Responsive CSS
       wp_enqueue_style('responsive', AXIOHOST_CSS_URL.'/responsive.css', null, 'v1.0', 'all');
       
       //Superfish CSS
       wp_enqueue_style('superfish', AXIOHOST_CSS_URL.'/superfish.css', null, 'v1.0', 'all');
       
       //Theme Stylesheet
       wp_enqueue_style('theme', AXIOHOST_CSS_URL.'/theme.css', null, 'v1.0', 'all');
       
       //Stylesheet CSS
       wp_enqueue_style('style', get_stylesheet_uri());
       

        //-- ====================ALL JS FILE HERE===================================== -//
                         
       
       //Bootstrap
        wp_enqueue_script('bootstrap', AXIOHOST_JS_URL.'/bootstrap.min.js', array('jquery'), 'v4.1.1', true);

        //Nivo slider JS    
        wp_enqueue_script('jquery-nivo-slider', AXIOHOST_JS_URL.'/jquery.nivo.slider.js', array('jquery'), 'v3.2', true);

       //Nivo slider pack JS   
       wp_enqueue_script('jquery-nivo-slider-pack', AXIOHOST_JS_URL.'/jquery.nivo.slider.pack.js', array('jquery'), 'v3.2', true);
       
       //Propper JS    
       wp_enqueue_script('popper', AXIOHOST_JS_URL.'/popper.min.js', array('jquery'), 'v1.0', true);
       
       //App Fullscreen JS    
       wp_enqueue_script('app-fullscreen-modal', AXIOHOST_JS_URL.'/ap-fullscreen-modal.min.js', array('jquery'), 'v1.0', true);
       
       //Nivo slider JS    
       wp_enqueue_script('owl-carousel', AXIOHOST_JS_URL.'/owl.carousel.min.js', array('jquery'), 'v2.3.4', true);

       //Slick JS    
       wp_enqueue_script('slick', AXIOHOST_JS_URL.'/slick.min.js', array('jquery'), 'v1.0', true);

       //Slim menu     
       wp_enqueue_script('jquery-slimmenu', AXIOHOST_JS_URL.'/jquery.slimmenu.min.js', array('jquery'), 'v1.0', true);
       
       //superfish
       wp_enqueue_script('superfish', AXIOHOST_JS_URL.'/superfish.js', array('jquery'), 'v1.7.10', true);
       
       //hoverIntent
       wp_enqueue_script('hoverIntent', AXIOHOST_JS_URL.'/hoverIntent.js', array('jquery'), 'v1.0', true);
       
       //Supersubs
       wp_enqueue_script('supersubs', AXIOHOST_JS_URL.'/supersubs.js', array('jquery'), 'v1.0', true);
       
       //Supposition
       wp_enqueue_script('supposition', AXIOHOST_JS_URL.'/supposition.js', array('jquery'), 'v1.0', true);
       
    
       //WOW JS 
       wp_enqueue_script('wow', AXIOHOST_JS_URL.'/wow.min.js', array('jquery'), 'v1.1.3', true); 
    
    
       //Navigation JS 
       wp_enqueue_script('navigation', AXIOHOST_JS_URL.'/navigation.js', array('jquery'), 'v1.0', true); 
       
       //Main JS
       wp_enqueue_script('custom', AXIOHOST_JS_URL.'/custom.js', array('jquery'), 'v1.0', true);
       
        wp_enqueue_script( "comment-reply" );
   }
   add_action('wp_enqueue_scripts', 'axiohost_scripts');
    
    
    add_filter('wp_list_categories', 'axiohost_add_span');
    function axiohost_add_span($links) {
      $links = str_replace('</a> (', '</a> <span class="cat-count">', $links);
      $links = str_replace(')', '</span>', $links);
      return $links;
    }
    
    add_filter('get_archives_link', 'axiohost_add_span_in_archive');
    function axiohost_add_span_in_archive($links) {
      $links = str_replace('</a>&nbsp;(', '</a> <span class="archive-count">', $links);
      $links = str_replace(')', '</span>', $links);
      return $links;
    }
    
    function axiohost_search_form( $form ) { 
         
         $form = '<form class="search-form-widget" method="get" action="' . home_url( '/' ) . '">
           <div class="input-group">
              <input type="search" value="' . get_search_query() . '" class="form-control" placeholder="Search" name="s" aria-label="Search" >
              <span class="input-group-btn">
              <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
              </span>
           </div>
        </form>';
        
         return $form;
    }
    add_filter( 'get_search_form', 'axiohost_search_form' );
    



//Add custom post class
function axiohost_custom_post_class( $classes ) {
    if(is_single()){ 
        $classes[] = 'single-post';
    }
    else{
        $classes[] = 'blog-post blog-spacing blog-list wow fadeIn';
    }
    return $classes;
}
add_filter( 'post_class', 'axiohost_custom_post_class');

//Axiohost Search Form
function get_axiohost_search_form(){?>
    <form class="formSearch" action="<?php echo esc_url(site_url()); ?>" method="get">
         <div class="input-group">
            <input class="form-control" type="search" name="s" value="" placeholder="<?php esc_attr_e('Search…', 'axiohost'); ?>" autocomplete="off" />
            <div class="input-group-prepend">
               <button class="btn " type="submit">
               <span class="btnSearchText"><?php echo esc_html('Search', 'axiohost'); ?></span>
               </button>
            </div>
         </div>
      </form>
<?php 
}

function AxiohostFontAwesomeForRedux() {
    wp_register_style(
        'redux-font-awesome','//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',array(),time(),'all');  
    wp_enqueue_style( 'redux-font-awesome' );
}
add_action( 'redux/page/axiohost/enqueue', 'AxiohostFontAwesomeForRedux' );    
    
function axiohost_admin_menu_page_removing() {
    remove_menu_page( 'ajax-domain-checker' );
}
add_action( 'admin_menu', 'axiohost_admin_menu_page_removing' );

function axiohost_admin_style() {
  wp_enqueue_style('admin-style', AXIOHOST_CSS_URL.'/admin.css');
}
add_action('admin_enqueue_scripts', 'axiohost_admin_style');


?>