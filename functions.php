<?php
/* Theme Name    : Awada
 * Theme Core Functions and Codes
*/
require(get_template_directory() . '/functions/menu/default_menu_walker.php');
require(get_template_directory() . '/functions/menu/awada_nav_walker.php');

add_action('after_setup_theme', 'awada_theme_setup');
function awada_theme_setup()
{
    global $content_width;
    //content width
    if (!isset($content_width)) $content_width = 1068; //px
    //supports featured image
    add_theme_support('post-thumbnails');
	add_image_size('awada_blog_full_thumb', 1068, 515, true);
    add_image_size('awada_blog_sidebar_thumb', 688, 350, true);
	add_image_size('awada_blog_home_thumb', 308, 157, true);
    load_theme_textdomain('awada', get_template_directory() . '/lang');
    // This theme uses wp_nav_menu() in one location.
    register_nav_menu('primary', __('Primary Menu', 'awada'));
    register_nav_menu('secondary', __('Secondary Menu', 'awada'));
    // theme support
    add_editor_style();
    $args = array('default-color' => '#ffffff',);
    add_theme_support('custom-background', $args);
    add_theme_support('custom-header');
    add_theme_support('automatic-feed-links');
    add_theme_support('woocommerce');
    add_theme_support('title-tag');
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
        'name' => __('Footer Widget Area', 'awada'),
        'id' => 'footer-widget',
        'description' => __('Footer widget area', 'awada'),
        'before_widget' => '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"><div class="widget">',
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
    $after = '</li>'; // tag after the current crumb
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
            echo $before . get_the_title() . '</li>';
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        echo $before . $post_type->labels->singular_name . $after;
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

//Blog PAGINATION
function awada_pagination()
{
     
         echo "<div class='pagination_wrapper'><ul class='pagination'>".posts_nav_link()."</ul></div>";
     
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

add_filter('get_avatar','change_avatar_css');
function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='img-circle alignleft ", $class) ;
return $class;
}
add_action('wp_enqueue_scripts', 'enqueue_awada_style');
function enqueue_awada_style()
{
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style('awada', get_stylesheet_uri());
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.min.css');
    wp_enqueue_style('flexslider', get_template_directory_uri() . '/css/flexslider.css');
	wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/css/owl-carousel.css');
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css');
	wp_enqueue_style('royalslider', get_template_directory_uri() . '/royalslider/royalslider.css');
	wp_enqueue_style('rs-default-inverted', get_template_directory_uri() . '/royalslider/skins/default-inverted/rs-default-inverted.css');
	wp_enqueue_style('settings-css', get_template_directory_uri() . '/rs-plugin/css/settings.css');
	
	if (is_singular()) wp_enqueue_script("comment-reply");
	// Google Fonts
	wp_enqueue_style('PT-Sans', 'http://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic');
	wp_enqueue_style('Lato', 'http://fonts.googleapis.com/css?family=Lato:400,300,400italic,300italic,700,700italic,900');
	wp_enqueue_style('Exo', 'http://fonts.googleapis.com/css?family=Exo:400,300,600,500,400italic,700italic,800,900');
}
add_action('wp_footer', 'enqueue_in_footer');
function enqueue_in_footer()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js');
    wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js');
	wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/js/owl.carousel.min.js');
	wp_enqueue_script('jquery.parallax-1.1.3', get_template_directory_uri() . '/js/jquery.parallax-1.1.3.js');
	wp_enqueue_script('jquery.simple-text-rotator', get_template_directory_uri() . '/js/jquery.simple-text-rotator.js');
	wp_enqueue_script('wow.min', get_template_directory_uri() . '/js/wow.min.js');
	// SLIDER REVOLUTION 4.x SCRIPTS
	wp_enqueue_script('jquery.themepunch.plugins.min', get_template_directory_uri() . '/rs-plugin/js/jquery.themepunch.plugins.min.js');
	wp_enqueue_script('jquery.themepunch.revolution.min', get_template_directory_uri() . '/rs-plugin/js/jquery.themepunch.revolution.min.js');
	// Royal Slider script files
	wp_enqueue_script('jquery.easing-1.3', get_template_directory_uri() . '/royalslider/jquery.easing-1.3.js');
	wp_enqueue_script('jquery.royalslider.min', get_template_directory_uri() . '/royalslider/jquery.royalslider.min.js');
	wp_enqueue_script('jquery.prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js');
	wp_enqueue_script('countdown', get_template_directory_uri() . '/js/countdown.js');    
	wp_enqueue_script('jquery.fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js');
    wp_enqueue_script('jquery.flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js',array('jquery'));
	wp_enqueue_script('jquery.jigowatt', get_template_directory_uri() . '/js/jquery.jigowatt.js',array('jquery'));
	wp_enqueue_script('custom-js', get_template_directory_uri() . '/js/custom.js');
	// Support for HTML5
	//[if lt IE 9]
	wp_enqueue_script('html5-shiv', get_template_directory_uri() . '/js/html5_shiv.js');
	//[endif]
	// Enable media queries on older bgeneral_rowsers
	//[if lt IE 9]
	//wp_enqueue_script('respond.min', get_template_directory_uri() . '/js/respond.min.js');
	//[endif]
}
?>