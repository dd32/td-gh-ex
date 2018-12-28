<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Best Classifieds
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_classifieds_widgets_init() {
    register_sidebar( array(
        'name'                  => esc_html__( 'Sidebar', 'best-classifieds' ),
        'id'                    => 'sidebar-1',
        'romana_description'    => esc_html__( 'Add widgets here to appear in your sidebar.', 'best-classifieds' ),
        'before_widget'         => '<div class="blog-sidebar-area %2$s widget" id="%1$s"> <div class="blog-sidebar-box">',
        'after_widget'          => '</div></div>',
        'before_title'          => '<h2 class="blog-sidebar-title">',
        'after_title'           => '</h2>',
    ) );
    register_sidebar( array(
        'name'                  => __( 'Footer 1', 'best-classifieds' ),
        'id'                    => 'footer-1',
        'romana_description'    => esc_html__( 'Add widgets here to appear in your footer.', 'best-classifieds' ),
        'before_widget'         => '<div id="%1$s" class="%2$s footer-widget">',
        'after_widget'          => '</div>',
        'before_title'          => '<h2 class="footer-title">',
        'after_title'           => '</h2>',
    ) );
    register_sidebar( array(
        'name'                  => esc_html__( 'Footer 2', 'best-classifieds' ),
        'id'                    => 'footer-2',
        'romana_description'    => esc_html__( 'Add widgets here to appear in your footer.', 'best-classifieds' ),
        'before_widget'         => '<div id="%1$s" class="%2$s footer-widget">',
        'after_widget'          => '</div>',
        'before_title'          => '<h2 class="footer-title">',
        'after_title'           => '</h2>',
    ) );
    register_sidebar( array(
        'name'                  => esc_html__( 'Footer 3', 'best-classifieds' ),
        'id'                    => 'footer-3',
        'romana_description'    => esc_html__( 'Add widgets here to appear in your footer.', 'best-classifieds' ),
        'before_widget'         => '<div id="%1$s" class="%2$s footer-widget">',
        'after_widget'          => '</div>',
        'before_title'          => '<h2 class="footer-title">',
        'after_title'           => '</h2>',
    ) );
    register_sidebar( array(
        'name'                  => esc_html__( 'Footer 4', 'best-classifieds' ),
        'id'                    => 'footer-4',
        'romana_description'    => esc_html__( 'Add widgets here to appear in your footer.', 'best-classifieds' ),
        'before_widget'         => '<div id="%1$s" class="%2$s footer-widget">',
        'after_widget'          => '</div>',
        'before_title'          => '<h2 class="footer-title">',
        'after_title'           => '</h2>',
    ) );
}
add_action( 'widgets_init', 'best_classifieds_widgets_init' );

// Menu default 

function best_classifieds_default_menu() {
    $html = '<ul id="menu-main-menu" class="offside nav navbar-nav">';
    $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">';
    $html .= '<a href="' . esc_url(home_url()) . '" title="' . esc_attr('Home', 'best-classifieds') . '">';
    $html .= esc_html('Home', 'best-classifieds');
    $html .= '</a>';
    $html .= '</li>';
    $html .= '</ul>';
    echo $html;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function best_classifieds_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'best_classifieds_pingback_header' );



function best_classifieds_excerpt_length( $length ) {
     if ( is_admin() ) { return $length;  }

    if(is_front_page()){ return 40; }

    return 30;
}
add_filter( 'excerpt_length', 'best_classifieds_excerpt_length', 999 );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 */
function best_classifieds_excerpt_more( $link ) {
    if ( is_admin() ) {
        return $link;
    }
    /*$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        
        esc_html__( 'Read More', 'best-classifieds' )
    );*/
    return $link;
}
add_filter( 'excerpt_more', 'best_classifieds_excerpt_more' );

/**
 * Set up post entry meta.    
 * Meta information for current post: categories, tags, permalink, author, and date.    
 * */
function best_classifieds_entry_meta() {    

    $best_classifieds_year = get_the_time( 'Y');
    $best_classifieds_month = get_the_time( 'm');
    $best_classifieds_day = get_the_time( 'd');
    
    $best_classifieds_category_list = get_the_category_list() ?  '<li><i class="fa fa-folder-open"></i>'.get_the_category_list(', ').'</li>' : '';
    
    $best_classifieds_tag_list = get_the_tag_list() ? '<li><i class="fa fa-tags"></i> '.get_the_tag_list('',', ').'</li>' : '';
    
    $best_classifieds_date = sprintf( '<li><i class="fa fa-calendar"></i><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></li>',
        esc_url( get_day_link( $best_classifieds_year, $best_classifieds_month, $best_classifieds_day)),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date('d M, Y') )
    );
    $best_classifieds_author = sprintf( '<li><i class="fa fa-user"></i><a href="%1$s" title="%2$s" >%3$s</a></li>',
        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
        /* translators: 1: author name */
        esc_attr( sprintf( __( 'View all posts by %s', 'best-classifieds' ), get_the_author() ) ),
        get_the_author()
    );
    if(comments_open()) { 
        if(get_comments_number()>=1)
            $best_classifieds_comments = '<li><i class="fa fa-comment"></i>'.get_comments_number().'</li>';
        else
            $best_classifieds_comments = '';
    } else {
        $best_classifieds_comments = '';
    }
    if(is_front_page()) {
        printf(' %1$s %2$s',
        $best_classifieds_author,     
        $best_classifieds_comments
        );
    } elseif(is_singular()){
        printf('%1$s %3$s %4$s %5$s',
        $best_classifieds_category_list,
        $best_classifieds_date,
        $best_classifieds_author,     
        $best_classifieds_comments,
        $best_classifieds_tag_list
        );    
    }else{
    printf('%1$s %2$s',
        $best_classifieds_author,     
        $best_classifieds_comments        
        ); 
    }

}

add_action('tgmpa_register', 'best_classifieds_required_plugins');

function best_classifieds_required_plugins() {
    if (class_exists('TGM_Plugin_Activation')) {
        $plugins = array(
            array(
                'name' => __('Page Builder by SiteOrigin', 'best-classifieds'),
                'slug' => 'siteorigin-panels',
                'required' => false,
            ),
            array(
                'name' => __('SiteOrigin Widgets Bundle', 'best-classifieds'),
                'slug' => 'so-widgets-bundle',
                'required' => false,
            ),
            array(
                'name' => __('Contact Form 7', 'best-classifieds'),
                'slug' => 'contact-form-7',
                'required' => false,
            ),
        );
        $config = array(
            'default_path' => '',
            'menu' => 'best-classifieds-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
            'strings' => array(
                'page_title' => __('Install Recommended Plugins', 'best-classifieds'),
                'menu_title' => __('Install Plugins', 'best-classifieds'),
                'nag_type' => 'updated'
            )
        );
        tgmpa($plugins, $config);
    }
}
// Theme customizer Font Icon - admin css,js
function best_classifieds_customize_scripts() {
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css');   
  wp_enqueue_style( 'best-classifieds-admin-style',get_template_directory_uri().'/assets/css/admin.css', array(),'', '' );    
  wp_enqueue_script( 'best-classifieds-admin-js', get_template_directory_uri().'/assets/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'best_classifieds_customize_scripts' );