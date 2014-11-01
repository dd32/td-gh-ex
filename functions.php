<?php
/* 	Searchlight Theme's Functions
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/

// 	Tell WordPress for wp_title in order to modify document title content
	function searchlight_filter_wp_title( $title ) {
    $site_name = get_bloginfo( 'name' );
    $filtered_title = $site_name . $title;
    return $filtered_title;
	}
	add_filter( 'wp_title', 'searchlight_filter_wp_title' );
	

	function searchlight_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'searchlight', get_template_directory() . '/languages' );

// 	Theme Menus
	register_nav_menus( array( 'main-menu' => __('Main Menu', 'searchlight'), 'top-menu' => __('Top Menu', 'searchlight') ) );

//	Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 584;


// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
	add_editor_style();
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'fpage-thumb', 1000, 500, true ); 
	
		
// 	WordPress 3.4 Custom Background Support	
	$searchlight_custom_background = array( 'default-color' => 'FFFFFF', 'default-image'  => '', );
	add_theme_support( 'custom-background', $searchlight_custom_background );
	
// 	WordPress 3.4 Custom Header Support				
	$searchlight_custom_header = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 300,
	'height'                 => 90,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '03d56b',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback' 		 => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
	);
	add_theme_support( 'custom-header', $searchlight_custom_header );
	}
	add_action( 'after_setup_theme', 'searchlight_setup' );

// 	Functions for adding script
	function searchlight_enqueue_scripts() { 
	wp_enqueue_style('searchlight-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
		wp_enqueue_script( 'comment-reply' ); 
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'searchlight-menu-style', get_template_directory_uri(). '/js/menu.js' );
	wp_register_style('searchlight-gfonts1', '//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800', false );
	wp_enqueue_style('searchlight-gfonts1');
	wp_register_style('searchlight-gfonts2', '//fonts.googleapis.com/css?family=Monda:400,700', false );
	wp_enqueue_style('searchlight-gfonts2');
	wp_enqueue_style('searchlight-responsive', get_template_directory_uri(). '/style-responsive.css' );
	}
	add_action( 'wp_enqueue_scripts', 'searchlight_enqueue_scripts' );
	
function searchlight_creditline () {
	$searchlight_theme_data = wp_get_theme(); $searchlight_author_uri = $searchlight_theme_data->get( 'AuthorURI' );
	echo '&copy; ' . date("Y"). ': ' . get_bloginfo( 'name' ). '<span class="credit"> | Searchlight ' . __('Theme by:', 'searchlight') . ' <a href="'. $searchlight_author_uri .'" target="_blank"> D5 Creation</a> | ' . __('Powered by:', 'searchlight') . ' <a href="http://wordpress.org" target="_blank">WordPress</a>';
    }
	

//	function tied to the excerpt_more filter hook.
	function searchlight_excerpt_length( $length ) {
	global $searchlight_excerpt_length;
	if ($searchlight_excerpt_length) {
    return $searchlight_excerpt_length;
	} else {
    return 50; //default value
    } }
	add_filter( 'excerpt_length', 'searchlight_excerpt_length', 999 );
	
	function searchlight_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '" class="read-more">' . __('Read More', 'searchlight'). '</a>';
	}
	add_filter('excerpt_more', 'searchlight_excerpt_more');
	
	// Content Type Showing
	function searchlight_content() {
	if ( is_page() || is_single() ) : the_content('<span class="read-more">' . __('Read More', 'searchlight'). '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function searchlight_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
	}
	add_filter( 'wp_page_menu_args', 'searchlight_page_menu_args' );
	
// 	Post Meta design
	function searchlight_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link(__('Edit', 'searchlight'),'<span class="genericon-edit">','</span>' ); ?></span> <span class="post-author genericon-user"> <?php the_author_posts_link(); ?> </span> <span class="post-date genericon-time"><?php the_time('F j, Y'); ?></span>	<span class="post-tag genericon-tag"> <?php the_tags('' , ', '); ?> </span> <span class="post-category genericon-category"> <?php the_category(', '); ?> </span> <span class="post-comments genericon-comment"> <?php comments_popup_link('No Comments' . ' &#187;', 'One Comment' . ' &#187;', '% ' . 'Comments' . ' &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
// Post Not Found
	function searchlight_not_found() { ?>
	<br /><br />
        <div class="searchinfo">
        <h1 class="page-title"><?php echo __('SORRY, NOT FOUND ANYTHING', 'searchlight'); ?></h1>
		<h3 class="arc-src"><span><?php echo __('You Can Try Another Search...', 'searchlight'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo home_url(); ?>" ><?php echo __('&laquo; Or Return to the Home Page', 'searchlight'); ?></a></p>
        </div>
        <br />
	
	<?php
	}
	
// Page Navigation
	function searchlight_page_nav() { ?>	
	<div id="page-nav">
			<div class="alignleft"><?php previous_posts_link('<span class="genericon-previous"></span>  ' . __('NEWER ENTRIES', 'searchlight') ); ?></div>
			<div class="alignright"><?php next_posts_link( __('OLDER ENTRIES', 'searchlight') .' <span class="genericon-next"></span>'); ?></div>
	</div>
    <?php
	}
	
//	Registers the Widgets and Sidebars for the site
	function searchlight_widgets_init() {

	register_sidebar( array(
		'name' =>  __('Primary Sidebar', 'searchlight'), 
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' =>  __('Secondary Sidebar', 'searchlight'), 
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	 
	register_sidebar( array(
		'name' => __('Footer Area One', 'searchlight'), 
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' =>  __('Footer Area Two', 'searchlight'), 
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three', 'searchlight'), 
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __('Footer Area Four', 'searchlight'), 
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	}
	add_action( 'widgets_init', 'searchlight_widgets_init' );
	
	
	add_filter('the_title', 'searchlight_title');
	function searchlight_title($title) {
        if ( '' == $title ) {
            return '(Untitled)';
        } else {
            return $title;
        }
    }
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
	require_once get_template_directory() . '/inc/options.php';
	function searchlight_custom_code() { 
?>
	
	<style type="text/css">
	.site-title, 
	.site-title:active, 
	.site-title:hover { color: #<?php echo get_header_textcolor(); ?>; }
	}
			
	<?php 
	if (esc_html(of_get_option('colorcssaccept', '0')) == '1') :
	$color1 = esc_html(of_get_option('color1', '#149755'));
	$color2 = esc_html(of_get_option('color2', '#05D24D'));
	$color3 = esc_html(of_get_option('color3', '#03D56B'));
	
echo ' 

	#header, .bqpcontainer .featured-box, .vidtitle span { border-color: '.$color1.'; }
	#searchlight-top-menu #searchsubmit, .heading2 em, .read-more, .page-link a, .flex-direction-nav li a:hover:before { background-color: '.$color1.'; }
	a, .widget h3, #heading1 em, .heading-desc3, .vidtitle h2, .vidtitle span:before, .statitem  h3, .boxtopicon, .flexslider.main-slider .flex-direction-nav li a:hover:before, .bqpcontainer .featured-box:hover h3.ftitle, .searchinfo h1.page-title { color: '.$color1.';}
	#searchlight-main-menu a{color:'.$color2.';}
	#searchlight-main-menu .menu-item-home a:hover,
	#searchlight-main-menu a:hover,
	#searchlight-main-menu .selected a,
	#searchlight-main-menu .current-menu-item > a,
	#searchlight-main-menu .current-menu-ancestor > a,
	#searchlight-main-menu .current_page_item > a,
	#searchlight-main-menu .current_page_ancestor > a,
	#searchlight-main-menu ul ul,
	.sub-menu, .sub-menu ul ul, .go-top {background-color: '.$color2.';}
	button,
	input[type="reset"],
	input[type="button"],
	input[type="submit"],
	.contactcontainer input[type="submit"]{  background: '.$color2.'; background-image: -webkit-linear-gradient(top, '.$color2.', '.$color3.'); background-image: 	-moz-linear-gradient(top, '.$color2.', '.$color3.');   background-image: -ms-linear-gradient(top, '.$color2.', '.$color3.'); background-image: -o-linear-gradient(top, '.$color2.', '.$color3.'); background-image: linear-gradient(to bottom, '.$color2.', '.$color3.'); }
	button:hover,
	input[type="reset"]:hover,
	input[type="button"]:hover,
	input[type="submit"]:hover,
	.contactcontainer input[type="submit"]:hover { background: '.$color3.'; background-image: -webkit-linear-gradient(top, '.$color3.', '.$color2.'); background-image: 	-moz-linear-gradient(top, '.$color3.', '.$color2.');   background-image: -ms-linear-gradient(top, '.$color3.', '.$color2.'); background-image: -o-linear-gradient(top, '.$color3.', '.$color2.'); background-image: linear-gradient(to bottom, '.$color3.', '.$color2.'); }
	a:hover, h1.page-title, h1.arc-post-title, h3.arc-src, #comments .comment-author cite a, #respond .required,.site-title, .site-title:active, .site-title:hover { color:'.$color3.'; }
	.bqpcontainer .featured-box:hover { border-color: '.$color3.'; }
	.bqpcontainer .featured-box:hover .read-more, .read-more:hover, .flex-direction-nav li a:before {  background-color: '.$color3.'; }
	#right-sidebar .widget-title, h1.page-title { background: ' . $color3 . ';
	background: -webkit-linear-gradient(-45deg, ' . $color1 . ' 50%, ' . $color3 . ' 50%);
	background: -moz-inear-gradient(-45deg, ' . $color1 . ' 50%, ' . $color3 . ' 50%);
	background: -o-linear-gradient(-45deg, ' . $color1 . ' 50%, ' . $color3 . ' 50%);
	background: -ms-linear-gradient(-45deg, ' . $color1 . ' 50%, ' . $color3 . ' 50%);
	background: linear-gradient(-45deg, ' . $color1 . ' 50%, ' . $color3 . ' 50%);
	background-size: 110% 100%;
	}


';
endif;
	
	echo '
	#right-sidebar .widget{ background: -webkit-linear-gradient(-45deg, #EEEEEE 50%, #DDDDDD 50%); background: -moz-inear-gradient(-45deg, #EEEEEE 50%, #DDDDDD 50%); background: -o-linear-gradient(-45deg, #EEEEEE 50%, #DDDDDD 50%); background: -ms-linear-gradient(-45deg, #EEEEEE 50%, #DDDDDD 50%); background: linear-gradient(-45deg, #EEEEEE 50%, #DDDDDD 50%); background-size: 100% 100%; }
	#footer{ background: -webkit-linear-gradient(-45deg, #252525 50%, #373737 50%); background: -moz-inear-gradient(-45deg, #252525 50%, #373737 50%); background: -o-linear-gradient(-45deg, #252525 50%, #373737 50%); background: -ms-linear-gradient(-45deg, #252525 50%, #373737 50%); background: linear-gradient(-45deg, #252525 50%, #373737 50%); background-size: 100% 100%; }
	.social a { background: -webkit-linear-gradient(-45deg, #111111 50%, rgba(0, 0, 0, 0.15) 50%); background: -moz-inear-gradient(-45deg, #111111 50%, rgba(0, 0, 0, 0.15) 50%); 	background: -o-linear-gradient(-45deg, #111111 50%, rgba(0, 0, 0, 0.15) 50%); background: -ms-linear-gradient(-45deg, #111111 50%, rgba(0, 0, 0, 0.15) 50%); background: linear-gradient(-45deg, #111111 50%, rgba(0, 0, 0, 0.15) 50%); background-size: 100% 100%; }
	#right-sidebar .widget-title, h1.page-title { background: #05d24d; background: -webkit-linear-gradient(-45deg, #05d24d 50%, #149755 50%); background: -moz-inear-gradient(-45deg, #05d24d 50%, #149755 50%); background: -o-linear-gradient(-45deg, #05d24d 50%, #149755 50%); background: -ms-linear-gradient(-45deg, #05d24d 50%, #149755 50%); background: linear-gradient(-45deg, #05d24d 50%, #149755 50%); background-size: 110% 100%; }
	';
	
	
	if (esc_html(of_get_option('header-fixed', '1')) != '1') : echo '#header { z-index:99991; position:relative; } .headerheight { display: none; }' ; endif; 
	if (esc_html(of_get_option('site-layout', '2c-r-fixed')) == '1col-fixed') : echo '#content { width: 100%; } #right-sidebar { display: none; } .bqpcontainer .featured-box { width: 29.7%; }' ; endif; 
	if (esc_html(of_get_option('site-layout', '2c-r-fixed')) == '2c-l-fixed') : echo '#content { float: right; } #right-sidebar { float: left; }' ; endif; 
	echo '.heading3container { background-image: url("'. of_get_option('heading3back', get_template_directory_uri() . '/images/heading3back.png') .'"); }' ; 
	if ( 'posts' != get_option( 'show_on_front' )): echo '.f-blog-page h1.page-title { display: none; }'; endif; 
	if ( is_admin_bar_showing() && esc_html(of_get_option('header-fixed', '1')) == '1' ): echo '#header { top: 32px; }'; endif;

	

	?> 
	</style>
	
<?php 
	
	}
	
	add_action('wp_head', 'searchlight_custom_code');
	
	
	
	
	
	
	
	
