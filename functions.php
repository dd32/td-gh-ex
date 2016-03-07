<?php
/**
 * Actuate Theme functions and definitions
 * 
 * @package Actuate
 * @since 1.0
 */


/**
 * Actuate Theme Constants
 * 
 * @since 1.0
 */
define('ACTUATE_PRO', FALSE );
define('ACTUATE_GLOBAL_JS_URL', get_template_directory_uri() . '/assets/global/js/');
define('ACTUATE_GLOBAL_IMAGES_URL', get_template_directory_uri() . '/assets/global/images/');
define('ACTUATE_GLOBAL_CSS_URL', get_template_directory_uri() . '/assets/global/css/');
define('ACTUATE_INCLUDES_DIR' , get_template_directory() . '/includes/' );



/**
 * Options framework call
 */
require_once ACTUATE_INCLUDES_DIR . 'customizer.php';



/**
 * Sets up theme defaults and registers support for various theme features
 * 
 * @since 1.0
 */
function actuate_setup() {
    
    global $content_width;
    
    /**
     * Primary content width according to the design and stylesheet.
     */
    if ( ! isset( $content_width ) ) { $content_width = 795; }
    
    /**
     * Makes actuate Theme ready for translation.
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain('actuate', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Adds title automatically.
     */
    add_theme_support( 'title-tag' );
    
    /**
     * Add custom background.
     * @todo Put E7E7E7 in a variable and then change it according to the skin
     */
    add_theme_support('custom-background', array('default-color' => 'FFFFFF'));
    
    /**
     * Adds supports for Theme menu.
     * Actuate uses wp_nav_menu() in a single location to diaplay one single menu.
     */
    register_nav_menu('primary', __('Primary Menu', 'actuate'));

    /**
     * Add support for Post Thumbnails.
     * Defines a custom name and size for Thumbnails to be used in the theme.
     *
     * Note: In order to use the default theme thumbnail, add_image_size() must be removed
     * and 'actuateThumb' value must be removed from the_post_thumbnail in the loop file.
     */
    add_theme_support('post-thumbnails');
    add_image_size('actuateThumb', 190, 130, true);
}
add_action( 'after_setup_theme', 'actuate_setup' );



/**
 * Defines menu values and call the menu itself.
 * The menu is registered using register_nav_menu function in the theme setup.
 * 
 * @since 1.0
 */
function actuate_nav($location) {
    $container_id = '';
    $menu_class = '';
    $menu_id = '';
    $fallback_cb = '';
    
    if ( $location == 'primary' ) {

        $container_id = 'menu';
        $menu_class = 'sf-menu actuate_menu clearfix';
        $menu_id = 'actuate_menu';
        $fallback_cb = 'actuate_nav_fallback';

    } elseif ( $location == 'mobile' ){

        $container_id = 'sidr-menu';
        $fallback_cb = 'actuate_mobile_nav_fallback';

    }

    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => $container_id,
        'menu_class' => $menu_class,
        'menu_id' => $menu_id,
        'fallback_cb' => $fallback_cb // Fallback function in case no menu item is defined.
    ));
}



/**
 * Displays a custom menu in case either no menu is selected or
 * menu does not contains any items or wp_nav_menu() is unavailable.
 * 
 * @since 1.0
 */
function actuate_nav_fallback() {
?>
    <div id="menu">
    	<ul class="sf-menu" id="actuate_menu">
            <?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3') ?>
        </ul>
    </div>
<?php
}



/**
 * Displays a custom menu in case either no menu is selected or
 * menu does not contains any items or wp_nav_menu() is unavailable.
 * 
 * @since 1.0
 */
function actuate_mobile_nav_fallback() {
?>
    <div id="sidr-menu">
    	<ul>
            <?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3') ?>
        </ul>
    </div>
<?php
}



/**
 * Register sidebars one at right and three footer sidebars in a box.
 * 
 * @since 1.0
 */
function actuate_sidebars() {

    // Primary Sidebar
    register_sidebar(array(
        'name' => __('Right Sidebar', 'actuate'),
        'id' => 'right_sidebar',
        'description' => __('Right Sidebar', 'actuate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #1
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #1', 'actuate'),
        'id' => 'footerbox_sidebar_1',
        'description' => __('Footerbox Sidebar #1', 'actuate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #2
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #2', 'actuate'),
        'id' => 'footerbox_sidebar_2',
        'description' => __('Footerbox Sidebar #2', 'actuate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #3
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #3', 'actuate'),
        'id' => 'footerbox_sidebar_3',
        'description' => __('Footerbox Sidebar #3', 'actuate'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
}
add_action( 'widgets_init', 'actuate_sidebars' );



/**
 * Enqueue CSS and JS files
 * 
 * @since 1.0
 */
function actuate_enqueue() {
    
    if(function_exists('wp_get_theme')){
        $theme_version = wp_get_theme()->get('Version');
    }else{
        $theme_version = '1.0.0';
    }

    wp_enqueue_style('google-font-merriweather', '//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,700,400italic,700italic,900,900italic');
    wp_enqueue_style('google-font-oswald', '//fonts.googleapis.com/css?family=Oswald:400,300,700');
    wp_enqueue_style('actuate-font-awesome', ACTUATE_GLOBAL_CSS_URL . 'font-awesome.4.4.0.css', false, '4.4.0', 'all');
    wp_enqueue_style('actuate-stylesheet', get_stylesheet_uri(), false, $theme_version, 'all' );
    
    // Enqueue (comment-reply )Javascript in case of threaded comments.
    if (is_singular() && comments_open() && get_option('thread_comments')) :
        wp_enqueue_script('comment-reply');
    endif;

    wp_enqueue_script('actuate-superfish', ACTUATE_GLOBAL_JS_URL . 'superfish.min.js', array( 'jquery' ), '1.4.8', true);
    wp_enqueue_script('actuate-sidr', ACTUATE_GLOBAL_JS_URL . 'jquery.sidr.js', array( 'jquery' ), '1.2.1', true);
    wp_enqueue_script('jquery-color');
    wp_enqueue_script('actuate-custom', ACTUATE_GLOBAL_JS_URL . 'custom.js', array( 'jquery' ), $theme_version, true);
}
add_action( 'wp_enqueue_scripts', 'actuate_enqueue');



/**
 * Hooks respond.js for IE in the wp_head hook.
 * 
 * @since 1.0
 */
function actuate_enqueue_ie_script() {
    echo "\n";
    ?><!--[if lt IE 9]><script type='text/javascript' src='<?php echo ACTUATE_GLOBAL_JS_URL ?>respond.min.js?ver=1.4.2'></script><![endif]--><?php
    echo "\n";
}
add_action('wp_head', 'actuate_enqueue_ie_script');



/**
 * Defines the number of characters for post excerpts
 * and is added to excerpt_length filter.
 * 
 * @since 1.0
 */
function actuate_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'actuate_excerpt_length' );



/**
 * Defines the text for the (read more) link for post excerpts
 * and is added to excerpt_more filter.
 * 
 * @since 1.0
 */
function actuate_auto_excerpt_more( $more ) {
    return '&#8230;' ;
}
add_filter( 'excerpt_more', 'actuate_auto_excerpt_more' );



/**
 * Used to return body classes
 * 
 * @param array $classes
 * @return array
 * @since 1.0
 */
function actuate_body_class($classes) {

    $classes[] = 'orange';
    $classes[] = 'right_sidebar';
    $classes[] = 'theme-wide';

    return $classes;
}
add_filter('body_class', 'actuate_body_class');



/**
 * Returns social icons individually
 * 
 * @param string $option Name of option in DB
 * @param string $title
 * @param string $icon Name of icon as in mdf-[icon]
 * @return string
 * 
 * @since 1.0.0
 */
function actuate_get_social_section_individual_icon($option, $title, $icon) {
    $output = '';
    
    if(actuate_get_option($option)){
        $output .= '<a href="'.esc_url(actuate_get_option($option)).'" title="'.esc_attr($title).'" target="_blank"><i class="mdf mdf-'.esc_attr($icon).'"></i></a>';
    }
    return $output;
    
}



/**
 * Used to display social section
 * 
 * @since 1.0
 */
function actuate_social_section_show() {
    
    if(!actuate_get_option('disable_social_section')):

    $output = false;
    
    $output .= actuate_get_social_section_individual_icon('facebook', __('Facebook','actuate'), 'facebook');
    $output .= actuate_get_social_section_individual_icon('twitter', __('Twitter','actuate'), 'twitter');
    $output .= actuate_get_social_section_individual_icon('rss', __('RSS feed','actuate'), 'rss');
    
    if($output != false): ?>
        <div id="social-section" class="social-section">
            <?php echo $output ?>
        </div>
    <?php endif ?>
        <div class="socialicons-mi"></div><div class="socialicons-mo"></div>
<?php
    endif;
}



/**
 * Displays the content in case of 404 page, empty search query
 * and any other query which does not output any result.
 * 
 * Both heading and content of the page will be displayed with a
 * search form. Any modification to this module will effect only
 * 404 error or related pages.
 * 
 * @since 1.0
 */
function actuate_404_show(){
?>
    <div class="archive-meta-container">
        <div class="archive-head">
            <?php if (is_404()) : ?>
                <h1><?php _e('Ooops! Nothing Found', 'actuate'); ?></h1>
            <?php elseif (is_search()) : ?>
                <h1><?php printf(__('Nothing found for:', 'actuate').' %s', get_search_query()); ?></h1>
            <?php else : ?>
                <h1><?php printf(__('Nothing found for:', 'actuate').' %s', single_term_title('', false)); ?></h1>
            <?php endif; ?>
        </div>
    </div><!-- Archive Meta Container ends -->
        
    <div class="archive-loop-container archive-empty">
        <div class="archive-excerpt">
            <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'actuate'); ?></p>
            <?php get_search_form(); ?>
        </div>
    </div>
<?php }



/**
 * Decides and returns the accurate 'text' to be displayed.
 * 
 * @return string
 * @since 1.0
 */
function actuate_date_text() {
    if (is_date()):
        if (is_day()):
            $date_text = __('Day', 'actuate');
        elseif (is_month()):
            $date_text = __('Month', 'actuate');
        elseif (is_year()):
            $date_text = __('Year', 'actuate');
        else:
            $date_text = __('Period', 'actuate');
        endif;

        return $date_text;

    endif;
}



/**
 * Displays the navigation links for the archive pages. Is only
 * applicable if the total number of pages is more than 'one'.
 * 
 * @since 1.0
 */
function actuate_archive_nav() {
    
    global $wp_query;

    if ($wp_query->max_num_pages > 1): ?>
        
        <div class="archive-nav grid-col-16 clearfix">
            <div class="nav-next"><?php previous_posts_link('<span class="meta-nav">&larr;</span> '.__('Newer posts', 'actuate')); ?></div>
            <div class="nav-previous"><?php next_posts_link(__('Older posts', 'actuate').' <span class="meta-nav">&rarr;</span>'); ?></div>
        </div>
        
<?php endif;
}



/**
 * Displays the navigation links for the posts and pages.
 * 
 * @since 1.0
 */
function actuate_post_nav() {
?>
    <div class="post-nav clearfix">
        <div class="nav-previous"><?php previous_post_link( '%link', '%title <span class="meta-nav"><i class="mdf mdf-caret-right"></i></span>' ) ?></div>
        <div class="nav-next"><?php next_post_link( '%link', '<span class="meta-nav"><i class="mdf mdf-caret-left"></i></span> %title' ) ?></div>
    </div>
<?php
}



/**
 * Display site title/description or logo
 * 
 * @since 1.0
 */
function actuate_logo() {

    $logo = actuate_get_option('site_logo');
    if( empty($logo)): ?>
        
        <div id="site-title" class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name', 'display' )) ?></a>
        </div>
        <?php if(!actuate_get_option('disable_site_desc')): ?>
            <div id="site-description" class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ) ?></div>
        <?php endif; ?>

    <?php else: ?>
        
        <div id="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) ?>" rel="home"><img src="<?php echo esc_url($logo) ?>"/></a>
        </div>

    <?php endif;
}



/**
 * Template for comments and pingbacks.
 * 
 * @since 1.0
 */
function actuate_comment_callback( $comment, $args, $depth ) {

    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ):

        case '' :
        // Proceed with normal comments. ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <?php if ($comment->comment_approved == '0') : ?><div class="comment-awaiting"><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'actuate'); ?></em></div><?php endif; ?>
                <?php $actuate_get_comment_ID = get_comment_ID() ?>
                <?php $actuate_is_comment_reply = get_comment($actuate_get_comment_ID)->comment_parent ?>
                <?php $actuate_the_comment_author = get_comment_author(get_comment($actuate_get_comment_ID)->comment_parent) ?>

                <div id="comment-<?php comment_ID(); ?>" class="comment-block-container grid-float-left grid-col-16">
                    <div class="comment-info-container grid-col-4 grid-float-left">
                        <div class="comment-author vcard">
                            <div class="comment-author-avatar-container"><?php echo get_avatar($comment, 125); ?></div>
                            <div class="comment-author-info-container">
                                <div class="comment-author-name"><?php printf('%s <span class="says"></span>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link())) ?></div>
                                <div class="comment-meta comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">(<?php printf('%1$s '.__('ago', 'actuate'), human_time_diff(get_comment_time( 'U' ), current_time( 'timestamp' ))); ?>)</a></div>
                            </div>
                        </div><!-- .comment-author .vcard -->
                    </div>

                    <div class="comment-body-container grid-col-12 grid-float-left">
                       <div class="comment-body"><?php comment_text(); ?></div>
                       <div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
                       <?php edit_comment_link(__('(Edit)', 'actuate'), '<div class="comment-edit">', '</div>');?>
                    </div>

                </div><!-- #comment-##  -->

    <?php
            break;

        case 'pingback' :
        case 'trackback' :
        // Display trackbacks differently than normal comments. ?>
            <li class="post pingback">
            <p><?php _e( 'Pingback:', 'actuate' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'actuate' ), ' ' ); ?></p>

            <?php break;

    endswitch;
}



/**
 * Creates multiple selectors using an array of child selectors.
 * 
 * @param string $parent The parent selector
 * @param array $children The array of child selectors
 * @param boolean $prefix Whether to prefix the entire return value with a ',' or not
 * @return string
 * @since 1.0.0
 */
function actuate_multichild_selector_generator($parent, $children = array(), $prefix){
    if (is_array($children)) {
        $selector = '';
        $count = 1;

        // Prefix comma if required
        if ($prefix) {
            $selector .= ',';
        }

        foreach ($children as $child) {

            $selector .= $parent . ' ' . $child;

            // Add comma to the end of every child if not the last
            if ($count != count($children)) {
                $selector .= ',';
            }
            $count++;
        }
        return $selector;
    }
    return;
}



/**
 * Generates CSS based on Theme Options.
 * 
 * @since 1.0.0
 */
function actuate_attach_options_style(){
    $output = ''; $style = '';

    $elements_color = array(
        'color_site_title' => '.wrapper .site-title a',
        'color_site_desc' => '.wrapper .site-description',
        'color_blog_p_title' => '.wrapper .loop-post-title h1 a',
        'color_blog_p_meta' => '.wrapper .loop-post-meta',
        'color_blog_p_content' => '.wrapper .loop-post-excerpt p',
        'color_posts_title' => 'body.single .wrapper .post-title h1',
        'color_posts_meta' => 'body.single .wrapper .post-meta'.actuate_multichild_selector_generator('.single .post-meta', array('.post-meta-comments a'), true),
        'color_posts_content' => 'body.single .wrapper .post-content',
    );

    foreach ($elements_color as $key => $value) {
        if(actuate_get_option($key)) {
            $style .= $value . '{color:'.  wp_filter_nohtml_kses(actuate_get_option($key)).';}';
        }
    }


    $style .= "\n";

    $output .= '<style type="text/css">'. "\n" . $style . "\n" . '</style>' . "\n";
    echo $output;
    
}
add_action('wp_head', 'actuate_attach_options_style');