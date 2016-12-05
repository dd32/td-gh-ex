<?php

function antonine_setup() {

	load_theme_textdomain( 'antonine', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );	
	add_theme_support( 'post-thumbnails' );	
	
	set_post_thumbnail_size( 825, 510, true );

	if ( ! isset( $content_width ) ) $content_width = 900;

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'antonine' ),
	) );
	
	add_theme_support( 'html5', array(
										'comment-form', 'comment-list', 'gallery', 'caption'
									) 
	);
	
	add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

}
add_action( 'after_setup_theme', 'antonine_setup' );

function antonine_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'antonine' ),
		'id'            => 'sidebar-one',
		'description'   => __( 'Add widgets here to appear in your side menu.', 'antonine' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'antonine_widgets_init' );
  
function antonine_scripts() {

	if(defined("SUBDOMAIN_INSTALL")){
		$ajax_base = site_url();
	}else{
		$ajax_base = network_site_url();
	}

	wp_enqueue_style( 'antonine-style', get_template_directory_uri() . '/css/main.css' );
	wp_enqueue_style( 'antonine-style-extra', admin_url('admin-ajax.php').'?action=antonine_custom_css');
	wp_enqueue_style( 'antonine-core-style', get_template_directory_uri() . '/css/wp_core.css' );
	wp_enqueue_style( 'antonine-style-mobile-768', get_template_directory_uri() . '/css/mobile768.css' );
	wp_enqueue_style( 'antonine-main-menu-style', get_template_directory_uri() . '/css/menu/main-menu.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome/font-awesome.min.css'); 
	
	wp_enqueue_style( 'google_font_dosis', '//fonts.googleapis.com/css?family=Dosis:300italic,400italic,600italic,700italic,800italic,400,800,700,600,300&subset=latin,cyrillic-ext,latin-ext,cyrillic,greek-ext,vietnamese', FALSE);
	wp_enqueue_style( 'google_font_josefin', '//fonts.googleapis.com/css?family=Josefin+Sans:400', FALSE);

	if ( is_singular() ) wp_enqueue_script( "comment-reply" );

	wp_enqueue_script( 'antonine-youtube', get_template_directory_uri() . '/js/display/youtube-fix.js', array( 'jquery' ), "", true );
	wp_enqueue_script( 'antonine-search', get_template_directory_uri() . '/js/search/search-form.js', array( 'jquery' ), "", true );
	wp_enqueue_script( 'antonine-info', get_template_directory_uri() . '/js/display/front-page-info.js', array( 'jquery'), "", true );
	
	wp_enqueue_script( 'antonine-widgets', get_template_directory_uri() . '/js/display/front-page-widgets.js', array( 'jquery' ), "", true );
	wp_enqueue_script( 'antonine-comments', get_template_directory_uri() . '/js/display/front-page-comments.js', array( 'jquery' ), "", true );
	wp_localize_script( 'antonine-comments', 'antonine_comments', 
																			array( 
																					'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																					'nonce' => wp_create_nonce("antonine_comments")
																				)
					);
					
	wp_enqueue_script( 'antonine-files', get_template_directory_uri() . '/js/display/front-page-files.js', array( 'jquery' ), "", true );
	wp_localize_script( 'antonine-files', 'antonine_files', 
																			array( 
																					'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																					'nonce' => wp_create_nonce("antonine_files")
																				)
					);	

	wp_enqueue_script( 'antonine-main-menu', get_template_directory_uri() . '/js/menus/main-menu.js', array( 'jquery' ), "", true );
	
	wp_enqueue_script( 'antonine-library', get_template_directory_uri() . '/js/display/antonine-library.js', array( 'jquery' ), "", true );
	wp_localize_script( 'antonine-library', 'antonine_library', 
																			array( 
																					'noMorePosts' => __("No More Posts", "antonine"),
																				)
					);
	
	
	
	if(!is_single() && !is_search()){
		wp_enqueue_script( 'antonine-page-layout', get_template_directory_uri() . '/js/display/page-layout.js', array( 'jquery' ), "", true );
	}
	if(is_search()){
		wp_enqueue_script( 'antonine-search-page-layout', get_template_directory_uri() . '/js/display/search-page-layout.js', array( 'jquery' ), "", true );
	}
	wp_enqueue_script( 'antonine-front-page-menu', get_template_directory_uri() . '/js/display/front-page-menu.js', array( 'jquery' ), "", true );
	
	wp_enqueue_script( 'antonine-front-page-search', get_template_directory_uri() . '/js/display/front-page-search.js', array( 'jquery' ), "", true );
	wp_enqueue_script( 'antonine-front-page-filter', get_template_directory_uri() . '/js/display/front-page-filter.js', array( 'jquery' ), "", true );
	wp_enqueue_script( 'antonine-front-page-filter-change', get_template_directory_uri() . '/js/display/front-page-filter-change.js', array( 'jquery' ), "", true );
	wp_localize_script( 'antonine-front-page-filter-change', 'antonine_filter', 
																			array( 
																					'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																					'siteURL' => site_url(),
																					'resetFilter' => __("Reset the filter", "antonine"),
																					'nonce' => wp_create_nonce("antonine_filter")
																				)
					);
		
	if(!is_single()){
		wp_enqueue_script( 'antonine-front-page-resize', get_template_directory_uri() . '/js/display/front-page-resize.js', array( 'jquery' ), "", true );
		
		if(!is_search()){
		wp_enqueue_script( 'antonine-front-page-scroll', get_template_directory_uri() . '/js/display/front-page-scroll.js', array( 'jquery' ), "", true );
		wp_localize_script( 'antonine-front-page-scroll', 'antonine_scroll', 
																				array( 
																						'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																						'nonce' => wp_create_nonce("antonine_scroll")
																					)
						);
		}				
		wp_enqueue_script( 'antonine-front-page-preview', get_template_directory_uri() . '/js/display/front-page-preview.js', array( 'jquery' ), "", true );
		wp_localize_script( 'antonine-front-page-preview', 'antonine_preview', 
																				array( 
																						'ajaxURL' => $ajax_base . "/wp-admin/admin-ajax.php",
																						'nonce' => wp_create_nonce("antonine_preview")
																					)
						);
 
	}
	
	if(get_theme_mod("antonine_scroll","on")=="on"){
		wp_enqueue_script( 'antonine-scroll-top', get_template_directory_uri() . '/js/display/front-page-scroll-top.js', array( 'jquery' ), "", true );
	}
	
}
add_action( 'wp_enqueue_scripts', 'antonine_scripts' );

function antonine_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return $rgb;
}

function antonine_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'antonine_excerpt_length', 999 );

function antonine_add_editor_styles() {
    add_editor_style( get_template_directory_uri() . '/css/main.css' );
}
add_action( 'admin_init', 'antonine_add_editor_styles' );

function antonine_custom_css() {
		header("Content-type: text/css;");
		?>
		html,
		#shareForm{
			background-color: <?PHP echo esc_html(get_theme_mod('antonine_site_allsite_background_colour', '#fefefe')); ?>;
			color: <?PHP echo esc_html(get_theme_mod('antonine_site_alltext_colour'), '#000000'); ?>;
		}
		
		.site-navigation ul li a{
			color :  <?PHP echo esc_html(get_theme_mod('antonine_site_menu_text_colour'),'#000000'); ?>;
		}

		li.sub-menu{
			background-color :  <?PHP echo esc_html(get_theme_mod('antonine_site_submenu_background_colour','#000000')); ?>;
		}
		
		.site-navigation li a:hover, 
		.site-navigation li a:focus {
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('antonine_site_menu_text_hover_colour','#ff0000')); ?>;
		}
		
		.site-navigation li:hover, 
		.site-navigation li:focus {
			transition: background-color 0.5s ease;
			background-color: <?PHP echo esc_html(get_theme_mod('antonine_site_menu_background_hover_colour','#aaaaaa')); ?>;
		}
		
		.site-navigation ul li .current-menu-item a{
			background: <?PHP echo esc_html(get_theme_mod('antonine_site_menu_background_current_colour','#aaaaaa')); ?>;  
			background-color: <?PHP echo esc_html(get_theme_mod('antonine_site_menu_background_current_colour','#aaaaaa')); ?>;  
		}
		
		<?PHP
			$hex = antonine_hex2rgb(esc_html(get_theme_mod('antonine_pagination_background_colour','#000000')));
		?>
		
		.pagination a{
			background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 0.9); 
			color: <?PHP echo esc_html(get_theme_mod('antonine_pagination_link_colour','#ffffff')); ?>; 
		}
		
		<?PHP
			$hex = antonine_hex2rgb(esc_html(get_theme_mod('antonine_site_post_background_colour','#ffffff')));
		?>
	
		article,
		.content-holder,
		.read-more-holder{
			background-color: rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>, 1.0); 
		}

		.page article,		
		.single article,
		.links .linkprevious,
		.links .linknext,
		.single .links,
		.page .links,
		#gradient{
			background-color: <?PHP echo esc_html(get_theme_mod("antonine_site_single_post_background_colour",'#ffffff')); ?>;
		}

		#gradient{		
			background: <?PHP echo esc_html(get_theme_mod('antonine_site_allsite_background_colour','#ffffff')); ?>;
			background: -webkit-linear-gradient(<?PHP echo esc_html(get_theme_mod('antonine_site_single_post_background_colour','#ffffff')); ?>, <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>); 
			background: -o-linear-gradient(<?PHP echo esc_html(get_theme_mod('antonine_site_single_post_background_colour','#ffffff')); ?>, <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>); 
			background: -moz-linear-gradient(<?PHP echo esc_html(get_theme_mod('antonine_site_single_post_background_colour','#ffffff')); ?>, <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>); 
			background: linear-gradient(<?PHP echo esc_html(get_theme_mod('antonine_site_single_post_background_colour','#ffffff')); ?>, <?PHP echo get_theme_mod('site_allsite_background_colour'); ?>); 
		}

		a{
			color: <?PHP echo esc_html(get_theme_mod('antonine_site_alllink_colour','#550000')); ?>;
		}
		
		html a:hover,
		html a:focus{
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('antonine_site_alllink_hover_colour','#ff0000')); ?>;
		}
		
		header#masthead h1 a,
		header#masthead p a{
			color: <?PHP echo esc_html(get_theme_mod("antonine_site_title_colour",'#555555')); ?>;
		}
		
		header#masthead h1 a:hover,
		header#masthead p a:hover{
			transition: background-color 0.5s ease;
			color: <?PHP echo esc_html(get_theme_mod('antonine_site_alllink_hover_colour','#ff0000')); ?>;
		}
		
		button,
		input[type=submit]{
			background-color:  <?PHP echo esc_html(get_theme_mod("antonine_site_button_colour",'#000000')); ?>;
			color:  <?PHP echo esc_html(get_theme_mod("antonine_site_button_text_colour",'#ffffff')); ?>;
		}
		
		article .entry-title{
			color:  <?PHP echo esc_html(get_theme_mod("antonine_site_title_colour",'#555555')); ?>;
		}
		
		.home article .content-holder,
		.search article .content-holder,
		.archive article .content-holder{
			border-right: 1px solid  <?PHP echo esc_html(get_theme_mod("antonine_border_colour",'#0000FF')); ?>;
			border-left: 1px solid  <?PHP echo esc_html(get_theme_mod("antonine_border_colour",'#0000FF')); ?>;
		}
		
		<?PHP
			$hex = antonine_hex2rgb(esc_html(get_theme_mod('antonine_shadow_colour')));
		?>
		
		#shareForm{
			border: 1px solid  <?PHP echo esc_html(get_theme_mod("antonine_site_alltext_colour",'#000000')); ?>;
			-webkit-box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
			-moz-box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
			box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
		}
		
		.single #content,
		.page #content,
		.home #main article, 
		.search #main article, 
		.archive #main article{
			-webkit-box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
			-moz-box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
			box-shadow: 10px 10px 40px 0px rgba(<?PHP echo $hex[0] . "," . $hex[1] . "," . $hex[2]; ?>,0.55);
		}	

		.page #main article .aside,
		.single #main article .aside{
			border:1px solid <?PHP echo esc_html(get_theme_mod('antonine_shadow_colour')); ?>;
			-webkit-border-radius: 20px;
			-moz-border-radius: 20px;
			border-radius: 20px;
		}
		
		<?PHP
}
add_action('wp_ajax_antonine_custom_css', 'antonine_custom_css');
add_action('wp_ajax_nopriv_antonine_custom_css', 'antonine_custom_css');

function antonine_search_extend($query){
	if(is_search()){
		$query->query_vars['posts_per_page']=-1;
	}
	return $query;
}
add_action("pre_get_posts","antonine_search_extend");

function antonine_comment_template( $comment_template ) {
     return dirname(__FILE__) . '/parts/comments/comments.php';
}
add_filter( "comments_template", "antonine_comment_template" );

require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/infinite_scroll.php';
require get_template_directory() . '/inc/comments.php';
require get_template_directory() . '/inc/files.php';
require get_template_directory() . '/inc/antonine_filter.php';
require get_template_directory() . '/inc/page_preview.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/menus/Walker_Menu_Antonine.php';
