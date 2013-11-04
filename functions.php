<?php

/* ------------------------------------------------------------------------- *
 *  OptionTree admin panel & framework integration
/* ------------------------------------------------------------------------- */

	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );
	add_filter( 'ot_theme_mode', '__return_true' );
	load_template( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
	load_template( trailingslashit( get_template_directory() ) . 'functions/theme-options.php' );
	load_template( trailingslashit( get_template_directory() ) . 'functions/meta-boxes.php' );

	
/* ------------------------------------------------------------------------- *
 *  Custom functions
/* ------------------------------------------------------------------------- */
	
	// Add your custom functions here


/* ------------------------------------------------------------------------- *
 *  WordPress features
/* ------------------------------------------------------------------------- */

	// Load theme languages
	load_theme_textdomain( 'hueman', get_template_directory().'/languages' );
	
	// Enable automatic feed links
	add_theme_support( 'automatic-feed-links' );
	
	// Enable post format support
	add_theme_support( 'post-formats', array( 'audio', 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
	
	// Enable featured image
	add_theme_support( 'post-thumbnails' );
	
	// Content width
	if ( !isset( $content_width ) ) $content_width = 720;
	
	// Load custom widgets
	include_once( 'functions/widgets/alx-tabs.php' );
	include_once( 'functions/widgets/alx-video.php' );
	include_once( 'functions/widgets/alx-posts.php' );
	
	// Load custom shortcodes
	include_once( 'functions/shortcodes.php' );

	
/*  Image thumbnail sizes
/* ------------------------------------ */
	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'thumb-small', 160, 160, true );
		add_image_size( 'thumb-medium', 520, 245, true );
		add_image_size( 'thumb-large', 720, 340, true );
	}


/*  Register custom menus
/* ------------------------------------ */
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus( array(
			'topbar' => 'Topbar',
			'header' => 'Header',
			'footer' => 'Footer',
		) );
	}

	
/*  Register sidebars
/* ------------------------------------ */
	if ( function_exists( 'register_sidebar' ) ) {		
		register_sidebar(array( 'name' => 'Primary','id' => 'primary','description' => "Normal full width sidebar (300px)", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Secondary','id' => 'secondary','description' => "Normal full width sidebar (220px)", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
		
		register_sidebar(array( 'name' => 'Footer 1','id' => 'footer-1', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 2','id' => 'footer-2', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 3','id' => 'footer-3', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
	    register_sidebar(array( 'name' => 'Footer 4','id' => 'footer-4', 'description' => "Widetized footer", 'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));	
	}


/*  Enqueue javascript
/* ------------------------------------ */	
	function alx_scripts()  
	{
		wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array( 'jquery' ),'', false );
		wp_enqueue_script( 'jplayer', get_template_directory_uri() . '/js/jquery.jplayer.min.js', array( 'jquery' ),'', true );
		wp_enqueue_script( 'sharrre', get_template_directory_uri() . '/js/jquery.sharrre-1.3.4.min.js', array( 'jquery' ),'', true );
        wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ),'', true ); 
		
		if ( is_singular() && get_option( 'thread_comments' ) )	wp_enqueue_script( 'comment-reply' ); 
    }  
    add_action( 'wp_enqueue_scripts', 'alx_scripts' );  

	
/*  Enqueue css
/* ------------------------------------ */	
	function alx_styles() 
	{
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		if ( !ot_get_option('responsive') ) { 
		wp_enqueue_style( 'responsive', get_template_directory_uri().'/responsive.css' ); }
		wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/fonts/font-awesome.min.css' );
	}
	add_action( 'wp_enqueue_scripts', 'alx_styles' ); 


/* ------------------------------------------------------------------------- *
 *  Template functions
/* ------------------------------------------------------------------------- */	

/*  Layout class
/* ------------------------------------ */
	function alx_layout_class() {
		// Default layout
		$layout = 'col-3cm';
		$default = 'col-3cm';

		// Check for page/post specific layout
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_layout',TRUE);
			// Get if set and not set to inherit
			if ( isset($meta) && !empty($meta) && $meta != 'inherit' ) { $layout = $meta; }
			// Else check for page-global / single-global
			elseif ( is_single() && ( ot_get_option('layout-single') !='inherit' ) ) $layout = ot_get_option('layout-single',''.$default.'');
			elseif ( is_page() && ( ot_get_option('layout-page') !='inherit' ) ) $layout = ot_get_option('layout-page',''.$default.'');
			// Else get global option
			else $layout = ot_get_option('layout-global',''.$default.'');
		}
		
		// Set layout based on page
		elseif ( is_home() && ( ot_get_option('layout-home') !='inherit' ) ) $layout = ot_get_option('layout-home',''.$default.'');
		elseif ( is_archive() && ( ot_get_option('layout-archive') !='inherit' ) ) $layout = ot_get_option('layout-archive',''.$default.'');
		elseif ( is_search() && ( ot_get_option('layout-search') !='inherit' ) ) $layout = ot_get_option('layout-search',''.$default.'');
		elseif ( is_404() && ( ot_get_option('layout-404') !='inherit' ) ) $layout = ot_get_option('layout-404',''.$default.'');
		
		// Global option
		else $layout = ot_get_option('layout-global',''.$default.'');
		
		// Return layout
		return $layout;
	}
	

/*  Dual sidebars? Get sidebar-2 template
/* ------------------------------------ */
	function alx_sidebar_dual() {
		if ( 
			( is_home() && ( 
				( ot_get_option('layout-home') =='col-3cm' ) || 
				( ot_get_option('layout-home') =='col-3cl' ) || 
				( ot_get_option('layout-home') =='col-3cr' ) )
			) ||
			( is_single() && ( 
				( ot_get_option('layout-single') =='col-3cm' ) || 
				( ot_get_option('layout-single') =='col-3cl' ) || 
				( ot_get_option('layout-single') =='col-3cr' ) )
			) ||
			( is_archive() && ( 
				( ot_get_option('layout-archive') =='col-3cm' ) || 
				( ot_get_option('layout-archive') =='col-3cl' ) || 
				( ot_get_option('layout-archive') =='col-3cr' ) )
			) ||
			( is_search() && ( 
				( ot_get_option('layout-search') =='col-3cm' ) || 
				( ot_get_option('layout-search') =='col-3cl' ) || 
				( ot_get_option('layout-search') =='col-3cr' ) )
			) ||
			( is_404() && ( 
				( ot_get_option('layout-404') =='col-3cm' ) || 
				( ot_get_option('layout-404') =='col-3cl' ) || 
				( ot_get_option('layout-404') =='col-3cr' ) )
			) ||
			( is_page() && ( 
				( ot_get_option('layout-page') =='col-3cm' ) || 
				( ot_get_option('layout-page') =='col-3cl' ) || 
				( ot_get_option('layout-page') =='col-3cr' ) )
			) 
		)
		{ get_template_part('sidebar-2'); }
		
		elseif (
			( ot_get_option('layout-global') =='col-3cm' ) || 
			( ot_get_option('layout-global') =='col-3cl' ) || 
			( ot_get_option('layout-global') =='col-3cr' )
		)
		{ get_template_part('sidebar-2'); }
	}
	

/*  Dynamic sidebar primary
/* ------------------------------------ */
	function alx_sidebar_primary() {
		// Default sidebar
		$sidebar = 'primary';

		// Set sidebar based on page
		if ( is_home() && ot_get_option('s1-home') ) $sidebar = ot_get_option('s1-home');
		if ( is_single() && ot_get_option('s1-single') ) $sidebar = ot_get_option('s1-single');
		if ( is_archive() && ot_get_option('s1-archive') ) $sidebar = ot_get_option('s1-archive');
		if ( is_category() && ot_get_option('s1-archive-category') ) $sidebar = ot_get_option('s1-archive-category');
		if ( is_search() && ot_get_option('s1-search') ) $sidebar = ot_get_option('s1-search');
		if ( is_404() && ot_get_option('s1-404') ) $sidebar = ot_get_option('s1-404');
		if ( is_page() && ot_get_option('s1-page') ) $sidebar = ot_get_option('s1-page');

		// Check for page/post specific sidebar
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_sidebar_primary',TRUE);
			if ( $meta ) { $sidebar = $meta; }
		}

		// Return sidebar
		return $sidebar;
	}

/*  Dynamic sidebar secondary
/* ------------------------------------ */
	function alx_sidebar_secondary() {
		// Default sidebar
		$sidebar = 'secondary';

		// Set sidebar based on page
		if ( is_home() && ot_get_option('s2-home') ) $sidebar = ot_get_option('s2-home');
		if ( is_single() && ot_get_option('s2-single') ) $sidebar = ot_get_option('s2-single');
		if ( is_archive() && ot_get_option('s2-archive') ) $sidebar = ot_get_option('s2-archive');
		if ( is_category() && ot_get_option('s2-archive-category') ) $sidebar = ot_get_option('s2-archive-category');
		if ( is_search() && ot_get_option('s2-search') ) $sidebar = ot_get_option('s2-search');
		if ( is_404() && ot_get_option('s2-404') ) $sidebar = ot_get_option('s2-404');
		if ( is_page() && ot_get_option('s2-page') ) $sidebar = ot_get_option('s2-page');

		// Check for page/post specific sidebar
		if ( is_page() || is_single() ) {
			// Reset post data
			wp_reset_postdata();
			global $post;
			// Get meta
			$meta = get_post_meta($post->ID,'_sidebar_secondary',TRUE);
			if ( $meta ) { $sidebar = $meta; }
		}

		// Return sidebar
		return $sidebar;
	}


/*  Social links
/* ------------------------------------ */
	function alx_social_links() {
		if ( !ot_get_option('social-links') =='' ) {
			$links = ot_get_option('social-links', array());
				if ( !empty( $links ) ) {
					echo '<ul class="social-links">';	
				foreach( $links as $item ) {
					
					// Build each separate html-section only if set
					if ( isset ($item['title']) && !empty($item['title']) ) 
						{ $title = 'title="' .$item['title']. '"'; } else $title = '';
					if ( isset ($item['social-link']) && !empty($item['social-link']) ) 
						{ $link = 'href="' .$item['social-link']. '"'; } else $link = '';
					if ( isset ($item['social-target']) && !empty($item['social-target']) ) 
						{ $target = 'target="' .$item['social-target']. '"'; } else $target = '';
					if ( isset ($item['social-icon']) && !empty($item['social-icon']) ) 
						{ $icon = 'class="fa ' .$item['social-icon']. '"'; } else $icon = '';
					if ( isset ($item['social-color']) && !empty($item['social-color']) ) 
						{ $color = 'style="color: ' .$item['social-color']. ';"'; } else $color = '';
					
					// Put them together
					echo '<li><a class="social-tooltip '.$item['title'].'" '.$title.' '.$link.' '.$target.'><i '.$icon.' '.$color.'></i></a></li>';
				}
				echo '</ul>';
			}
		}
	}

	
/*  Site name/logo
/* ------------------------------------ */
	function alx_site_title() {
	
		// Text or image?
		if ( ot_get_option('custom-logo') ) {
			$logo = '<img src="'.ot_get_option('custom-logo').'" alt="'.get_bloginfo('name').'">';
		} else {
			$logo = get_bloginfo('name');
		}
		
		$link = '<a href="'.home_url('/').'" rel="home">'.$logo.'</a>';
		
		if ( is_front_page() || is_home() ) {
			$sitename = '<h1 class="site-title">'.$link.'</h1>'."\n";
		} else {
			$sitename = '<p class="site-title">'.$link.'</p>'."\n";
		}
		
		return $sitename;
	}
	
	
/*  Page title
/* ------------------------------------ */
	function alx_page_title() {
		global $post;

		$heading = get_post_meta($post->ID,'_heading',TRUE);
		$subheading = get_post_meta($post->ID,'_subheading',TRUE);
		$title = $heading?$heading:the_title();
		if($subheading) {
			$title = $title.' <span>'.$subheading.'</span>';
		}

		return $title;
	}
	

/*  Blog title
/* ------------------------------------ */
	function alx_blog_title() {
		global $post;
		$heading = ot_get_option('blog-heading');
		$subheading = ot_get_option('blog-subheading');
		if($heading) { 
			$title = $heading;
		} else {
			$title = get_bloginfo('name');
		}
		if($subheading) {
			$title = $title.' <span>'.$subheading.'</span>';
		}

		return $title;
	}

	
/*  Related posts
/* ------------------------------------ */
	function alx_related_posts() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'				=> TRUE,
			'update_post_meta_cache'	=> FALSE,
			'update_post_term_cache'	=> FALSE,
			'ignore_sticky_posts'		=> 1,
			'orderby'					=> 'rand',
			'post__not_in'				=> array($post->ID),
			'posts_per_page'			=> 3
		);
		// Related by categories
		if ( ot_get_option('related-posts') == 'categories' ) {
			
			$cats = get_post_meta($post->ID, 'air-related-cat', TRUE);
			
			if ( !$cats ) {
				$cats = wp_get_post_categories($post->ID, array('fields'=>'ids'));
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( ot_get_option('related-posts') == 'tags' ) {
		
			$tags = get_post_meta($post->ID, 'air-related-tag', TRUE);
			
			if ( !$tags ) {
				$tags = wp_get_post_tags($post->ID, array('fields'=>'ids'));
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode(',', $tags);
			}
			if ( !$tags ) { $break = TRUE; }
		}
		
		$query = !isset($break)?new WP_Query($args):new WP_Query;
		return $query;
	}
	
	
/*  Limit words
/* ------------------------------------ */
	function alx_limit_words($str,$limit,$sep='&#46;&#46;&#46;') {
		$str = strip_tags($str);
		$str = explode(' ', $str);
		$str = implode(' ', array_slice($str,0,$limit));
		return $str.$sep;
	}

	
/*  Limit characters
/* ------------------------------------ */
	function alx_limit_chars($str,$limit,$sep='&#46;&#46;&#46;') {
		if(mb_strlen($str) > $limit ) {
			$str = mb_substr($str,0,($limit - 4));
			$words = explode(' ', $str);
			$cut = - (mb_strlen($words[count($words)-1]));
			$str = ($cut < 0)?mb_substr($str,0,$cut-1):$str;
			return $str.$sep;
		} else {
			return $str;
		}
	}

	
/*  Remove more link scroll
/* ------------------------------------ */
	function alx_remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
	add_filter( 'the_content_more_link', 'alx_remove_more_link_scroll' );
	
	
/*  Get images attached to post
/* ------------------------------------ */
function alx_post_images( $args=array() ) {
	global $post;

	$defaults = array(
		'numberposts'		=> -1,
		'order'				=> 'ASC',
		'orderby'			=> 'menu_order',
		'post_mime_type'	=> 'image',
		'post_parent'		=>  $post->ID,
		'post_type'			=> 'attachment',
	);

	$args = wp_parse_args( $args, $defaults );

	return get_posts( $args );
}

	
/* ------------------------------------------------------------------------- *
 *  Admin panel functions
/* ------------------------------------------------------------------------- */		

/*  Custom sidebars
/* ------------------------------------ */
	function alx_register_sidebars() {
		if ( !ot_get_option('sidebar-areas') =='' ) {
			
			$sidebars = ot_get_option('sidebar-areas', array());
			
			if ( !empty( $sidebars ) ) {
				foreach( $sidebars as $sidebar ) {
					register_sidebar(array('name' => ''.$sidebar['title'].'','id' => ''.$sidebar['id'].'','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3>','after_title' => '</h3>'));
				}
			}
		}	
	}
	add_action( 'init', 'alx_register_sidebars' );
	
	
/*  Get featured post ids
/* ------------------------------------ */
	function alx_get_featured_post_ids() {
		$args = array(
			'category'		=> ot_get_option('featured-category'),
			'numberposts'	=> ot_get_option('featured-posts-count')
		);
		$posts = get_posts($args);
		if ( !$posts ) return FALSE;
		foreach ( $posts as $post )
			$ids[] = $post->ID;
		return $ids;
	}

	
/*  Post formats script
/* ------------------------------------ */
	function alx_post_formats_script( $hook ) {
		// Only load on posts, pages
		if ( !in_array($hook, array('post.php','post-new.php')) )
			return;
		wp_enqueue_script('post-formats', get_template_directory_uri() . '/functions/js/post-formats.js', array( 'jquery' ));
	}
	add_action( 'admin_enqueue_scripts', 'alx_post_formats_script');
	
	
/* ------------------------------------------------------------------------- *
 *  Filters
/* ------------------------------------------------------------------------- */

/*  Site title
/* ------------------------------------ */
	function alx_wp_title( $title ) {
		// Do not filter title if SEO plugin installed
		if ( class_exists('All_in_One_SEO_Pack') )
			return $title;
		if ( is_front_page() ) { 
			$title = bloginfo('name'); echo ' - '; bloginfo('description'); 
		}
		if ( !is_front_page() ) { 
			$title.= ''.' - '.''.get_bloginfo('name'); 
		}
		return $title;
	}
	add_filter( 'wp_title', 'alx_wp_title' );

	
/*  Custom rss feed
/* ------------------------------------ */
	function alx_feed_link( $output, $feed ) {
		// Do not redirect comments feed
		if ( strpos( $output, 'comments' ) )
			return $output;
		// Return feed url
		return ot_get_option('rss-feed',$output);
	}
	add_filter( 'feed_link', 'alx_feed_link', 10, 2 );

	
/*  Custom favicon
/* ------------------------------------ */
	function alx_favicon() {
		if ( ot_get_option('favicon') ) {
			echo '<link rel="shortcut icon" href="'.ot_get_option('favicon').'" />'."\n";
		}
	}
	add_filter( 'wp_head', 'alx_favicon' );

	
/*  Tracking code
/* ------------------------------------ */
	function alx_tracking_code() {
		if ( ot_get_option('tracking-code') ) {
			echo ''.ot_get_option('tracking-code').''."\n";
		}
	}
	add_filter( 'wp_footer', 'alx_tracking_code' );
	
	
/*  Body class
/* ------------------------------------ */
	function alx_body_class( $classes ) {
		if ( ot_get_option('mobile-sidebar-hide') )
			$classes[] = 'mobile-sidebar-hide';
		if ( has_nav_menu('topbar') ) 
			$classes[] = 'topbar-enabled';
		return $classes;
	}
	add_filter( 'body_class', 'alx_body_class' );


/*  Excerpt ending
/* ------------------------------------ */
	function alx_excerpt_more( $more ) {
		return '&#46;&#46;&#46;';
	}
	add_filter( 'excerpt_more', 'alx_excerpt_more' );

	
/*  Excerpt length
/* ------------------------------------ */
	function alx_excerpt_length( $length ) {
		return ot_get_option('excerpt-length',$length);
	}
	add_filter( 'excerpt_length', 'alx_excerpt_length', 999 );
	
	
/*  Add wmode transparent to media embeds
/* ------------------------------------ */		
	function alx_video_wmode_transparent( $html, $url, $attr ) {
		if ( strpos( $html, "<embed src=" ) !== false ) {
			$html = str_replace('</param><embed', '</param><param name="wmode" value="opaque"></param><embed wmode="opaque" ', $html);
		} elseif ( strpos ($html, 'feature=oembed') !== false ) {
			$html = str_replace('feature=oembed', 'feature=oembed&wmode=opaque', $html);
		}
		return $html;
	}
	add_filter( 'embed_oembed_html', 'alx_video_wmode_transparent' , 10, 3 );

	
/*  Add responsive container to embeds
/* ------------------------------------ */	
	function alx_embed_oembed_html( $html, $url, $attr, $post_id ) {
		return '<div class="video-container">' . $html . '</div>';
	}
	add_filter( 'embed_oembed_html', 'alx_embed_oembed_html' , 9999, 4 );

	
/*  Upscale cropped thumbnails
/* ------------------------------------ */	
	function alx_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
		if ( !$crop ) return null; // let the wordpress default function handle this

		$aspect_ratio = $orig_w / $orig_h;
		$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);

		$crop_w = round($new_w / $size_ratio);
		$crop_h = round($new_h / $size_ratio);

		$s_x = floor( ($orig_w - $crop_w) / 2 );
		$s_y = floor( ($orig_h - $crop_h) / 2 );

		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
	add_filter( 'image_resize_dimensions', 'alx_thumbnail_upscale', 10, 6 );


/*  Add shortcode support to text widget
/* ------------------------------------ */
	add_filter( 'widget_text', 'do_shortcode' );
	
	
/* ------------------------------------------------------------------------- *
 *  Actions
/* ------------------------------------------------------------------------- */	

/*  Include or exclude featured articles in loop
/* ------------------------------------ */
	function alx_pre_get_posts( $query ) {
		// Are we on main query ?
		if ( !$query->is_main_query() ) return;
		if ( $query->is_home() ) {

			// Featured posts enabled
			if ( ot_get_option('featured-posts-count') != '0' ) {
				// Get featured post ids
				$featured_post_ids = alx_get_featured_post_ids();
				// Exclude posts
				if ( $featured_post_ids && !ot_get_option('featured-posts-include') )
					$query->set('post__not_in', $featured_post_ids);
			}
		}
	}
	add_action( 'pre_get_posts', 'alx_pre_get_posts' );
	

/*  TGM plugin activation
/* ------------------------------------ */
	require_once dirname( __FILE__ ) . '/functions/class-tgm-plugin-activation.php';
	function alx_plugins() {
		
		// Add the following plugins
		$plugins = array(
			array(
				'name' 				=> 'Regenerate Thumbnails',
				'slug' 				=> 'regenerate-thumbnails',
				'required'			=> false,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			),
			array(
				'name' 				=> 'WP-PageNavi',
				'slug' 				=> 'wp-pagenavi',
				'required'			=> false,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			),
			array(
				'name' 				=> 'Responsive Lightbox',
				'slug' 				=> 'light',
				'source'			=> get_stylesheet_directory() . '/functions/plugins/light.zip',
				'required'			=> false,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			),
			array(
				'name' 				=> 'Contact Form 7',
				'slug' 				=> 'contact-form-7',
				'required'			=> false,
				'force_activation' 	=> false,
				'force_deactivation'=> false,
			)
		);	
		tgmpa( $plugins );
	}
	add_action( 'tgmpa_register', 'alx_plugins' );
