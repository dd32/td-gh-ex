<?php
/* Theme Name    : Awada
 * Theme Core Functions and Codes
*/
define('HEADER_IMAGE_WIDTH', apply_filters('awada_header_image_width', 1168));
define('HEADER_IMAGE_HEIGHT', apply_filters('awada_header_image_height', 75));
require(get_template_directory() . '/functions/menu/default_menu_walker.php');
require(get_template_directory() . '/functions/menu/awada_nav_walker.php');
require get_template_directory() . '/functions/custom/contact-widgets.php';
require get_template_directory() . '/functions/custom/recent-posts.php';
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
include get_template_directory() . '/inc/welcome-screen/welcome-screen.php';
require_once dirname(__FILE__) . '/default_options.php';

if (!class_exists('Kirki')) {
    include_once(dirname(__FILE__) . '/inc/kirki/kirki.php');
}

function awada_customizer_config()
{
    $args = array(
        'url_path'     => get_template_directory_uri() . '/inc/kirki/',
        'capability'   => 'edit_theme_options',
        'option_type'  => 'option',
        'option_name'  => 'awada_theme_options',
        'compiler'     => array(),
        'color_accent' => '#27bebe',
        'width'        => '23%',
        'description'  => __('Visit our site for more great Products.If you like this theme please rate us 5 star', 'awada'),
    );
    return $args;
}
add_filter('kirki/config', 'awada_customizer_config'); 

require get_template_directory() . '/customizer.php';
add_action('after_setup_theme', 'awada_theme_setup');
$awada_theme_options = awada_theme_options();
function awada_theme_setup()
{
    global $content_width;
    //content width
    if (!isset($content_width)) $content_width = 1068; //px
	//supports featured image
    add_theme_support('post-thumbnails');
    load_theme_textdomain('awada', get_template_directory() . '/lang');
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'awada'));
    register_nav_menu('secondary', __('Secondary Menu', 'awada'));
    // theme support
    $args = array('default-color' => '#ffffff',);
    add_theme_support('custom-background', $args);
    add_theme_support('custom-header');
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 150,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_image_size('awada_home_slider_bg_image', 1600, 499, true);
	add_image_size('awada_blog_full_thumb', 1068, 515, true);
    add_image_size('awada_blog_sidebar_thumb', 688, 350, true);
	add_image_size('awada_blog_two_sidebar_thumb', 403, 205, true);
	add_image_size('awada_blog_home_thumb', 308, 157, true);
	add_image_size('awada_recent_widget_thumb', 120, 77, true);
}
// Read more tag to formatting in blog page
function awada_content_more($read_more)
{
    return '<div class=""><a class="main-button" href="' . get_permalink() . '">' . __('Read More', 'awada') . '<i class="fa fa-angle-right"></i></a></div>';
}
add_filter('the_content_more_link', 'awada_content_more');
// Replaces the excerpt "more" text by a link
function awada_excerpt_more($more)
{	
    return '<a href="' . get_permalink() . '" class="readmore">' . __('Read More...', 'awada') . '</a>';
}
add_filter('excerpt_more', 'awada_excerpt_more');
/*
* Awada widget area
*/
add_action('widgets_init', 'awada_widget');
function awada_widget()
{
    /*sidebar*/
	$awada_theme_options = awada_theme_options();
    $col = 12 / (int)$awada_theme_options['footer_layout'];
	register_sidebar(array(
        'name' => __('Primary Sidebar Widget Area', 'awada'),
        'id' => 'primary-sidebar',
        'description' => __('Primary sidebar widget area', 'awada'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h2>',
        'after_title' => '</h2></div>'
    ));
	register_sidebar(array(
        'name' => __('Secondary Sidebar Widget Area', 'awada'),
        'id' => 'secondary-sidebar',
        'description' => __('Secondary sidebar widget area', 'awada'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>'
    ));
    register_sidebar(array(
        'name' => __('Footer Widget Area', 'awada'),
        'id' => 'footer-widget',
        'description' => __('Footer widget area', 'awada'),
        'before_widget' => '<div class="col-lg-' . $col . ' col-md-' . $col . ' col-sm-6 col-xs-12"><div class="widget">',
        'after_widget' => '</div></div>',
        'before_title' => '<div class="title"><h3>',
        'after_title' => '</h3></div>',
    ));
}
/* Breadcrumbs  */
function awada_breadcrumbs()
{
    $delimiter = '<i class="fa fa-chevron-circle-right breadcrumbs_space"></i>';
    $home = __('Home', 'awada'); // text for the 'Home' link
    $before = ''; // tag before the current crumb
    $after = ''; // tag after the current crumb
    echo '<ul class="breadcrumb pull-right">';
    global $post;
    $homeLink = home_url();
    echo '<li><a href="' . $homeLink . '">' . $home . '</a>' . $delimiter;
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . '</li> '));
        echo $before . _e("Category ", 'awada') . ' ' . single_cat_title($delimiter, false) . '' . $after;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . '</li>';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter;
        echo $before . get_the_time('d') . '</li>';
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter;
        echo $before . get_the_time('F') . '</li>';
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . '</li>';
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $delimiter;
            echo $before . get_the_title() . '</li>';
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . '</li>';
        }

    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
		if($post_type==null){
			echo $before . __('Nothing Found','awada') . $after;
		}else{
			echo $before . $post_type->labels->singular_name . $after;
		}
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter;
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . _e("Search results for ", 'awada') . get_search_query() . '"' . $after;

    } elseif (is_tag()) {
        echo $before . _e('Tag ', 'awada') . single_tag_title($delimiter, false) . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . _e("Articles posted by: ", 'awada') . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . _e("Error 404 ", 'awada') . $after;
    }
    echo '</ul>';
}

/* Blog Pagination */
if (!function_exists('awada_pagination')) {
function awada_pagination() {
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'prev_next' => false,
            'type'  => 'array',
            'prev_next'   => TRUE,
			'prev_text'    => '&#171;',
			'next_text'    => '&#187;',
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo "<div class='pagination_wrapper'><ul class='pagination'>";
            foreach ( $pages as $page ) {
                echo "<li>$page</li>";
            }
           echo "</ul></div>";
		}
	}
}

/*** Post pagination ***/
function awada_pagination_link()
{ ?>
    <div class="next_prev text-center">
		<ul class="pager">
			<li class="previous"><?php previous_post_link('%link', '&laquo; Older'); ?></li>
			<li class="next"><?php next_post_link('%link', 'Newer &raquo;'); ?></li>
		</ul>
	</div><?php
}

// Enqueue Style and Script
add_action('wp_enqueue_scripts', 'awada_enqueue_style');
function awada_enqueue_style()
{
    $awada_theme_options = awada_theme_options();
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('awada', get_stylesheet_uri());
    wp_enqueue_style('color-scheme', get_template_directory_uri() . '/css/default.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css');
	//Slider
	wp_enqueue_style('slider-style', get_template_directory_uri() . '/css/slider/slider-style.css');
	wp_enqueue_style('custom.css', get_template_directory_uri() . '/css/slider/custom.css');
	
	wp_enqueue_script('jquery');
	if (is_singular()) wp_enqueue_script("comment-reply");
	// Google Fonts
	wp_enqueue_style('PT-Sans', 'http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic');
}
add_action('wp_footer', 'awada_enqueue_in_footer');
function awada_enqueue_in_footer()
{	
	$awada_theme_options = awada_theme_options();
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.js');
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js');
	wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.js');
	wp_enqueue_script('wow.min', get_template_directory_uri() . '/js/wow.js');
	//Slider
	wp_enqueue_script('modernizr.custom', get_template_directory_uri() . '/js/slider/modernizr.custom.79639.js');
	wp_enqueue_script('jquery.ba-cond.min', get_template_directory_uri() . '/js/slider/jquery.ba-cond.js');
	wp_enqueue_script('jquery.slitslider', get_template_directory_uri() . '/js/slider/jquery.slitslider.js');
	
	wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	wp_enqueue_script('jquery.fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js');

	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js');
	// Support for HTML5
	//[if lt IE 9]
	wp_enqueue_script('html5-shiv', get_template_directory_uri() . '/js/html5_shiv.js');
    wp_script_add_data( 'html5-shiv', 'conditional', 'lt IE 9' );
	//[endif]
	// Blog Load More Post
	$count_posts = wp_count_posts();
    $published_posts1 = $count_posts->publish;
    $blog_post_count = $awada_theme_options['blog_post_count'];
    wp_enqueue_script('load-posts1', get_template_directory_uri() . '/js/load-more.js');
    wp_localize_script('load-posts1', 'load_more_posts_variable1', array(
        'counts_posts1'    => $published_posts1,
        'blog_post_count' => $blog_post_count,
    )
    );
}

// Comment Function
function awada_comments($comments, $args, $depth)
{
    $GLOBALS['comment'] = $comments;
    extract($args, EXTR_SKIP);
    if ('div' == $args['style']) {
        $add_below = 'comment';
    } else {
        $add_below = 'div-comment';
    }
    ?>  
    <li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
        <article class="comment">
            <?php if ($args['avatar_size'] != 0) echo get_avatar($comments, $args['avatar_size'],null,null,$arrayName = array('class' => 'img-circle comment-avatar' )); ?>
            <div class="comment-content">
            <h4 class="comment-author">
            <?php printf('%s', get_comment_author()); ?><small class="comment-meta"><?php printf(__('%1$s at %2$s', 'awada'), get_comment_date(), get_comment_time()); ?></small>
            <span class="comment-reply"><?php comment_reply_link(array_merge($args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
            </h4><?php
        if ($comments->comment_approved == '0') { ?>
            <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'awada'); ?></em><br/>
        </div><?php } else { comment_text(); } ?>
    </div>
   </article><!-- End .comment -->
<?php
}
add_filter('comment_reply_link', 'awada_replace_reply_link_class');
function awada_replace_reply_link_class($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply btn btn-sm btn-primary", $class);
    return $class;
}

add_filter('get_avatar','awada_change_avatar_css');
function awada_change_avatar_css($class) {
$class = str_replace("class='avatar", "class='img-circle alignleft ", $class) ;
return $class;
}
/* woocommerce support */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'awada_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'awada_theme_wrapper_end', 10);
function awada_theme_wrapper_start()
{
    get_template_part('breadcrumbs');
    echo '<section class="blog-wrapper">
            <div class="container">
               <div class="shop_wrapper col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="general_row">';
}
function awada_theme_wrapper_end()
{
    echo '</div>
			</div>';
    echo '</div>
		</section>';
}

/* TGMPA register */
add_action('tgmpa_register', 'awada_register_required_plugins');
function awada_register_required_plugins()
{
    $plugins = array(
		array(
            'name'     => 'Photo Video Gallery Master', // The plugin name.
            'slug'     => 'photo-video-gallery-master', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
		array(
            'name'     => 'Ultimate Gallery Master', // The plugin name.
            'slug'     => 'ultimate-gallery-master', // The plugin slug (typically the folder name).
            'required' => false, // If false, the plugin is only 'recommended' instead of required.
        ),
    );
    $config = array(
        'id'           => 'awada', // Unique ID for hashing notices for multiple instances of Awada.
        'default_path' => '', // Default absolute path to bundled plugins.
        'menu'         => 'Awada-install-plugins', // Menu slug.
        'parent_slug'  => 'themes.php', // Parent menu slug.
        'capability'   => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
        'has_notices'  => true, // Show admin notices or not.
        'dismissable'  => true, // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '', // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false, // Automatically activate plugins after installation or not.
        'message'      => '', // Message to output right before the plugins table.
    );
    awada($plugins, $config);
}
?>