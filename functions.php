<?php
/**
 * Afford Theme functions and definitions
 * 
 * @package Afford
 * @since 1.0
 */


/**
 * Afford Theme Constants
 * 
 * @since 1.0
 */
define('AFFORD_PRO', FALSE );
define('AFFORD_GLOBAL_JS_URL', get_template_directory_uri() . '/assets/global/js/');
define('AFFORD_GLOBAL_IMAGES_URL', get_template_directory_uri() . '/assets/global/images/');
define('AFFORD_GLOBAL_CSS_URL', get_template_directory_uri() . '/assets/global/css/');
define('AFFORD_INCLUDES_DIR' , get_template_directory() . '/includes/' );


/**
 * Include Customizer Options
 */
require_once AFFORD_INCLUDES_DIR . 'customizer.php';



/**
 * Sets up theme defaults and registers support for various theme features
 * 
 * @since 1.0
 */
function afford_setup() {
    
    global $content_width;
    
    /**
     * Primary content width according to the design and stylesheet.
     */
    if ( ! isset( $content_width ) ) { $content_width = 780; }
    
    /**
     * Makes afford Theme ready for translation.
     * Translations can be filed in the /languages/ directory
     */
    load_theme_textdomain('afford', get_template_directory() . '/languages');

    /**
     * Add default posts and comments RSS feed links to head.
     */
    add_theme_support('automatic-feed-links');
    
    /**
     * Add custom background.
     * @todo Put E7E7E7 in a variable and then change it according to the skin
     */
    add_theme_support('custom-background', array('default-color' => 'FFFFFF', 'wp-head-callback' => 'afford_custom_background_cb'));
    
    /**
     * Adds title tag automatically
     */
    add_theme_support( 'title-tag' );
    
    /**
     * Adds supports for Theme menu.
     * Afford uses wp_nav_menu() in a single location to diaplay one single menu.
     */
    register_nav_menu('primary', 'Primary Menu');

    /**
     * Add support for Post Thumbnails.
     * Defines a custom name and size for Thumbnails to be used in the theme.
     *
     * Note: In order to use the default theme thumbnail, add_image_size() must be removed
     * and 'affordThumb' value must be removed from the_post_thumbnail in the loop file.
     */
    add_theme_support('post-thumbnails');
    add_image_size('affordThumb', 190, 130, true);
}
add_action( 'after_setup_theme', 'afford_setup' );



/**
 * Callback for custom background
 * 
 * @see wp-includes/theme.php function _custom_background_cb()
 * @return string Custom CSS
 */
function afford_custom_background_cb() {
    // $background is the saved custom image, or the default image.
    $background = set_url_scheme(get_background_image());

    // $color is the saved custom color.
    // A default has to be specified in style.css. It will not be printed here.
    $color = get_background_color();

    if ($color === get_theme_support('custom-background', 'default-color')) {
        $color = false;
    }

    if (!$background && !$color)
        return;

    $style = $color ? "background-color: #$color;" : '';

    if ($background) {
        $image = " background-image: url('$background');";

        $repeat = get_theme_mod('background_repeat', get_theme_support('custom-background', 'default-repeat'));
        if (!in_array($repeat, array('no-repeat', 'repeat-x', 'repeat-y', 'repeat')))
            $repeat = 'repeat';
        $repeat = " background-repeat: $repeat;";

        $position = get_theme_mod('background_position_x', get_theme_support('custom-background', 'default-position-x'));
        if (!in_array($position, array('center', 'right', 'left')))
            $position = 'left';
        $position = " background-position: top $position;";

        $attachment = get_theme_mod('background_attachment', get_theme_support('custom-background', 'default-attachment'));
        if (!in_array($attachment, array('fixed', 'scroll')))
            $attachment = 'scroll';
        $attachment = " background-attachment: $attachment;";

        $style .= $image . $repeat . $position . $attachment;
    }
?>
<style type="text/css" id="custom-background-css">
#wrapper { <?php echo trim( $style ); ?> }
</style>
<?php
}



/**
 * Defines menu values and call the menu itself.
 * The menu is registered using register_nav_menu function in the theme setup.
 * 
 * @since 1.0
 */
function afford_nav() {
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'container_id' => 'menu',
        'menu_class' => 'sf-menu afford_menu',
        'menu_id' => 'afford_menu',
        'fallback_cb' => 'afford_nav_fallback' // Fallback function in case no menu item is defined.
    ));
}



/**
 * Displays a custom menu in case either no menu is selected or
 * menu does not contains any items or wp_nav_menu() is unavailable.
 * 
 * @since 1.0
 */
function afford_nav_fallback() {
?>
    <div id="menu">
    	<ul class="sf-menu" id="afford_menu">
			<?php
            	wp_list_pages( 'title_li=&sort_column=menu_order&depth=3');
            ?>
        </ul>
    </div>
<?php
}



/**
 * Register sidebars one at right and three footer sidebars in a box.
 * 
 * @since 1.0
 */
function afford_sidebars() {

    // Primary Sidebar
    register_sidebar(array(
        'name' => __('Right Sidebar', 'afford'),
        'id' => 'right_sidebar',
        'description' => __('Right Sidebar', 'afford'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #1
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #1', 'afford'),
        'id' => 'footerbox_sidebar_1',
        'description' => __('Footerbox Sidebar #1', 'afford'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #2
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #2', 'afford'),
        'id' => 'footerbox_sidebar_2',
        'description' => __('Footerbox Sidebar #2', 'afford'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Footerbox Sidebar #3
    register_sidebar(array(
        'name' => __('Footerbox Sidebar #3', 'afford'),
        'id' => 'footerbox_sidebar_3',
        'description' => __('Footerbox Sidebar #3', 'afford'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
    
    // Top Sidebar
    /*
    register_sidebar(array(
        'name' => __('Top Sidebar', 'afford'),
        'id' => 'top_sidebar',
        'description' => __('Top Sidebar', 'afford'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
     */
    
}
add_action( 'widgets_init', 'afford_sidebars' );



/**
 * Enqueue CSS and JS files
 * 
 * @since 1.0
 */
function afford_enqueue() {
    
    wp_enqueue_style('google-font-lato', '//fonts.googleapis.com/css?family=Lato:400,100italic,100,300,300italic,700,700italic,900,900italic');
    wp_enqueue_style('afford-font-awesome', AFFORD_ADMIN_CSS_URL . 'font-awesome.4.1.0.css');
    wp_enqueue_style('afford-stylesheet', get_stylesheet_uri(), false, '1.0.0', 'all' );
    
    // Enqueue (comment-reply )Javascript in case of threaded comments.
    if (is_singular() && comments_open() && get_option('thread_comments')) :
        wp_enqueue_script('comment-reply');
    endif;

    wp_enqueue_script('afford-superfish', AFFORD_GLOBAL_JS_URL . 'superfish.min.js', array( 'jquery' ), '1.4.8', true);
    wp_enqueue_script('jquery-color');
    wp_enqueue_script('afford-custom', AFFORD_GLOBAL_JS_URL . 'custom.js', array( 'jquery' ), '1.0.0', true);
}
add_action( 'wp_enqueue_scripts', 'afford_enqueue');



/**
 * Hooks respond.js for IE in the wp_head hook.
 * 
 * @since 1.0
 */
function afford_enqueue_ie_script() {
    echo "\n";
    ?><!--[if lt IE 9]><script type='text/javascript' src='<?php echo AFFORD_GLOBAL_JS_URL ?>respond.js?ver=1.4.2'></script><![endif]--><?php
    echo "\n";
}
add_action('wp_head', 'afford_enqueue_ie_script');



/**
 * Defines the number of characters for post excerpts
 * and is added to excerpt_length filter.
 * 
 * @since 1.0
 */
function afford_excerpt_length( $length ) {
	return 43;
}
add_filter( 'excerpt_length', 'afford_excerpt_length' );



/**
 * Defines the text for the (read more) link for post excerpts
 * and is added to excerpt_more filter.
 * 
 * @since 1.0
 */
function afford_auto_excerpt_more( $more ) {
	return '&#8230;' ;
}
add_filter( 'excerpt_more', 'afford_auto_excerpt_more' );



/**
 * Used to return body classes
 * 
 * @param array $classes
 * @return array
 * @since 1.0
 */
function afford_body_class($classes) {
    
    if(is_single()):
        
        $classes[] = 'single-template';
        $classes[] = 'post-template';
    
    elseif(is_page()):
        
        $classes[] = 'page-template';
        $classes[] = 'post-template';

    elseif(is_front_page()):
        
        $classes[] = 'home-template';
    
    elseif(is_home()):
        
        $classes[] = 'home-template';
        $classes[] = 'blog-template';
    
    elseif (is_archive()):
        
        $classes[] = 'archive-template';
    
    elseif(is_404()):
        
        $classes[] = 'archive-template';
        $classes[] = 'empty-template';
    
    elseif(is_search()):
        
        $classes[] = 'archive-template';
        $classes[] = 'search-template';
    
    endif;

        $classes[] = 'orange';
        $classes[] = 'right_sidebar';
        $classes[] = 'theme-wide';
        $classes[] = 'thumbnail-left';
        
    return $classes;
}
add_filter('body_class', 'afford_body_class');



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
function afford_get_social_section_individual_icon($option, $title, $icon) {
    $output = '';

    if(afford_get_option($option)){
        $output .= '<a href="'.esc_url(afford_get_option($option)).'" title="'.$title.'" target="_blank"><i class="mdf mdf-'.$icon.'"></i></a>';
    }
    return $output;
    
}



/**
 * Used to display social section
 * 
 * @since 1.0
 */
function afford_social_section_show() {
    
    if(!afford_get_option('disable_social_section')):

    $output = false;
    
    $output .= afford_get_social_section_individual_icon('facebook', 'Facebook', 'facebook');
    $output .= afford_get_social_section_individual_icon('twitter', 'Twitter', 'twitter');
    $output .= afford_get_social_section_individual_icon('rss', 'RSS feed', 'rss');
    
    ?>            
                
                <?php if($output !== false): ?>
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
function afford_404_show(){
?>
        <div class="archive-meta-container">
            <div class="archive-head">
                <?php if (is_404()) : ?>
                    <h1><?php _e('Ooops! Nothing Found', 'afford'); ?></h1>
                <?php elseif (is_search()) : ?>
                    <h1><?php printf(__('Nothing found for:', 'afford').' %s', get_search_query()); ?></h1>
                <?php else : ?>
                    <h1><?php printf(__('Nothing found for:', 'afford').' %s', single_term_title('', false)); ?></h1>
                <?php endif; ?>
            </div>
        </div><!-- Archive Meta Container ends -->
        
        <div class="archive-loop-container archive-empty">
            <div class="archive-excerpt">
                <p><?php _e('Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'afford'); ?></p>
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
function afford_date_text() {
    if (is_date()):
        if (is_day()):
            $date_text = __('Day', 'afford');
        elseif (is_month()):
            $date_text = __('Month', 'afford');
        elseif (is_year()):
            $date_text = __('Year', 'afford');
        else:
            $date_text = __('Period', 'afford');
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
function afford_archive_nav() {
    
    global $wp_query;

    if ($wp_query->max_num_pages > 1): ?>
        
        <div class="archive-nav grid-col-16 clearfix">
            <div class="nav-next"><?php previous_posts_link('<span class="meta-nav">&larr;</span> '.__('Newer posts', 'afford')); ?></div>
            <div class="nav-previous"><?php next_posts_link(__('Older posts', 'afford').' <span class="meta-nav">&rarr;</span>'); ?></div>
        </div>
        
<?php endif;
}



/**
 * Displays the navigation links for the posts and pages.
 * 
 * @since 1.0
 */
function afford_post_nav() {
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
function afford_logo() {
?>
	<?php if(!afford_get_option('site_logo')): ?>
        <div id="site-title" class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name', 'display' )) ?></a>
        </div>
        <?php if(!afford_get_option('disable_site_desc')): ?><div id="site-description" class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ) ?></div><?php endif ?>
	<?php else: ?>
        <div id="site-title" class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ) . ' | ' . esc_attr( get_bloginfo('description') ) ?>" rel="home"><img src="<?php echo esc_url(afford_get_option('site_logo')) ?>" /></a>
        </div>
	<?php endif ?>
<?php
}



/**
 * Template for comments and pingbacks.
 * 
 * @since 1.0
 */
function afford_comment_callback( $comment, $args, $depth ) {

  $GLOBALS['comment'] = $comment;
  switch ( $comment->comment_type ):

         case '' :
		 // Proceed with normal comments.
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <?php if ($comment->comment_approved == '0') : ?><div class="comment-awaiting"><em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'afford'); ?></em></div><?php endif; ?>
        <?php $afford_get_comment_ID = get_comment_ID() ?>
        <?php $afford_is_comment_reply = get_comment($afford_get_comment_ID)->comment_parent ?>
        <?php $afford_the_comment_author = get_comment_author(get_comment($afford_get_comment_ID)->comment_parent) ?>
        <?php // if($afford_is_comment_reply != 0 ) printf('<div class="comment-parent-author"><span>Replied to %s</span></div>', $afford_the_comment_author ) ?>
      <div id="comment-<?php comment_ID(); ?>" class="comment-block-container grid-float-left grid-col-16">
          
          
                     <div class="comment-info-container grid-col-4 grid-float-left">
                          <div class="comment-author vcard">
                              <div class="comment-author-avatar-container"><?php echo get_avatar($comment, 125); ?></div>
                              <div class="comment-author-info-container">
                                  <div class="comment-author-name"><?php printf('%s <span class="says"></span>', sprintf('<cite class="fn">%s</cite>', get_comment_author_link())) ?></div>
                                  <div class="comment-meta comment-date"><a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">(<?php printf('%1$s '.__('ago', 'afford'), human_time_diff(get_comment_time( 'U' ), current_time( 'timestamp' ))); ?>)</a></div>
                              </div>
                          </div><!-- .comment-author .vcard -->
                     </div>
          
                     <div class="comment-body-container grid-col-12 grid-float-left">
                        <div class="comment-body"><?php comment_text(); ?></div>
                        <div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
                        <?php edit_comment_link(__('(Edit)', 'afford'), '<div class="comment-edit">', '</div>');?>
                     </div>

      </div><!-- #comment-##  -->

<?php
         break;

         case 'pingback' :
         case 'trackback' :
		 // Display trackbacks differently than normal comments.
  ?>

  <li class="post pingback">
      <p><?php _e( 'Pingback:', 'afford' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'afford' ), ' ' ); ?></p>

  <?php
         break;

  endswitch;
}



/**
 * Adds text to afford_blog_template_heading_filter used on home.php
 * 
 * @todo Remove this function
 * @return string
 * @since 1.0
 */
function afford_blog_template_heading_text() {
    return '<h1>' . get_bloginfo('name') . ' ' . __('Blog', 'afford') . '</h1>';
}
add_filter('afford_blog_template_heading_filter', 'afford_blog_template_heading_text', 10);



/**
 * Filters and add class to 'loop-section-col' section.
 * 
 * @param NULL $default '' Nothing by default
 * @param integer $loop_count An integer starting from 1,2,3,,,,
 * @return string Name of CSS class
 * @since 1.0
 */
function afford_loop_section_col_class_modifier($default, $loop_count) {

	if($loop_count % 2 == 1):
		return 'grid-float-left';
	else:
		return 'grid-float-right';
	endif;
}
add_filter('afford_loop_section_col_class_filter', 'afford_loop_section_col_class_modifier', 10, 2);



/**
 * 
 * @param type $button
 * @param type $text
 * @return type
 */
function afford_wp_readmore_link($button, $text) {
	$post = get_post();

	return '<div class="read-more"><a href="' . get_permalink() . "#more-{$post->ID}\">Read more</a></div>";
}
add_filter('the_content_more_link', 'afford_wp_readmore_link', 100, 2);



/**
 * Outputs CSS for customizer options
 * 
 * @since 1.0
 */
function afford_customizer_css() {
    $output = '';
    $options_color = array(
        'color_site_title' => '#wrapper .site-title a',
        'color_site_desc' => '#wrapper .site-description',
        'color_blog_p_title' => '#wrapper .loop-post-title h1 a',
        'color_blog_p_meta' => '#wrapper .loop-post-meta, #wrapper .loop-post-meta .loop-meta-comments a',
        'color_blog_p_content' => '#wrapper .loop-post-excerpt',
        'color_p_title' => '#wrapper .post-title h1',
        'color_p_meta' => '#wrapper .post-meta',
        'color_p_content' => '#wrapper .post-content',
    );

    $output .= "\n" . '<style type="text/css">';

    foreach ($options_color as $option => $location) {
        if (afford_get_option($option)) {
            $output .= $location . '{color:' . wp_filter_nohtml_kses(afford_get_option($option)) . ';}';
        }
    }

    $output .= '</style>' . "\n";

    echo $output;
}
add_action('wp_head', 'afford_customizer_css');