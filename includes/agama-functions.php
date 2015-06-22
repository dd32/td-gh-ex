<?php
// Include sanitization file
get_template_part('includes/agama-sanitize');

// Include framework init file
get_template_part('framework/framework-init');

// Include WooCommerce class file
get_template_part('includes/woocommerce');

// Custom header support
get_template_part('includes/custom-header');

if ( ! isset( $content_width ) ) 
	$content_width = 1200;

/**
 * Agama setup
 *
 * @since Agama 1.0
 */
function agama_setup() {
	/*
	 * Makes Agama available for translation.
	 */
	load_theme_textdomain( 'agama', AGAMA_DIR.'languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Adds support for title tag
	add_theme_support( 'title-tag' );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// If sticky header enabled name menu as 'Sticky Header Menu' otherwise 'Top Menu'
	if( get_theme_mod( 'sticky_header', '1' ) ) {
		register_nav_menu( 'top', __( 'Sticky Header Menu', 'agama' ) );
	}else{
		register_nav_menu( 'top', __( 'Top Menu', 'agama' ) );
	}
	
	// Register primary menu only if sticky header is not enabled.
	if( ! get_theme_mod( 'sticky_header', '1' ) ) {
		register_nav_menu( 'primary', __( 'Primary Menu', 'agama' ) );
	}

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 9999 ); // Unlimited height, soft crop
	
	// Register custom image sizes
	add_image_size( 'agama-blog-large', 776, 310, true );
    add_image_size( 'agama-blog-medium', 320, 202, true );
    add_image_size( 'agama-related-img', 180, 138, true );
    add_image_size( 'agama-recent-posts', 700, 441, true );
	
	/*
	 * Declare WooCommerce Support
	 */
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'agama_setup' );

/**
 * Backwards Compatibility for Title Tag
 *
 * @since Agama 1.0
 */
if ( ! function_exists( '_wp_render_title_tag' ) ) {
function agama_slug_render_title() {
?>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php
	}
	add_action( 'wp_head', 'agama_slug_render_title' );
}

/**
 * Excerpt Lenght
 *
 * @since Agama v1.0
 */
function agama_excerpt_length( $length ) {
	return get_theme_mod('blog_excerpt', '60');
}
add_filter( 'excerpt_length', 'agama_excerpt_length', 999 );

/**
 * Agama Thumb Title
 * Get post-page article title and separates it on two halfs
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_thumb_title() {
	$title = get_the_title();
	$findme   = ' ';
	$pos = strpos($title, $findme);
	if( $pos === false ) {
			$output = '<h2>'.$title.'</h2>';
		} else {
			// isolate part 1 and part 2.
			$title_part_one = strstr($title, ' ', true); // As of PHP 5.3.0
			$title_part_two = strstr($title, ' ');
			$output = '<h2>'.$title_part_one.'<span>'.$title_part_two.'</span></h2>';
		}
	echo $output;
}

/**
 * Get Attachment Image Src
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_return_image_src( $thumb_size ) {
	$att_id	 = get_post_thumbnail_id();
	$att_src = wp_get_attachment_image_src( $att_id, $thumb_size );
	return esc_url($att_src[0]);
}

/**
 * Check if $page is template page
 *
 * @since Agama v1.0.1
 * @return string
 */
function agama_is_page_template( $page ) {
	if( is_page_template( 'page-templates/'.$page ) ) {
		return true;
	}
	return false;
}

/**
 * Filter the page menu arguments.
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Agama 1.0
 */
function agama_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'agama_page_menu_args' );

if ( ! function_exists( 'agama_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Agama 1.0
 */
function agama_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation clearfix" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'agama' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'agama' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'agama' ) ); ?></div>
		</nav><!-- .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'agama_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own agama_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Agama 1.0
 */
function agama_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'agama' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'agama' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'agama' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'agama' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'agama' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'agama' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'agama' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'agama_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own agama_entry_meta() to override in a child theme.
 *
 * @since Agama 1.0
 */
function agama_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'agama' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'agama' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'agama' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'agama' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'agama' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'agama' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * @since Agama 1.0
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function agama_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();
	
	if( get_theme_mod( 'sticky_header', '1' ) ) {
		$classes[] = 'sticky_header';
	}

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';
	
	if( is_page_template( 'page-templates/portfolio-one-column.php' ) ) {
		$classes[] = 'portfolio-one-column';
	}
	
	if( is_page_template( 'page-templates/portfolio-two-columns.php' ) ) {
		$classes[] = 'portfolio-two-columns';
	}
	
	if( is_page_template( 'page-templates/portfolio-three-columns.php' ) ) {
		$classes[] = 'portfolio-three-columns';
	}
	
	if( is_page_template( 'page-templates/portfolio-four-columns.php' ) ) {
		$classes[] = 'portfolio-four-columns';
	}

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'PTSans', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'agama_body_class' );

/**
 * .article-wrapper Grid, List - Style
 *
 * @since Agama v1.0.1
 */
function agama_article_wrapper_class() {
	if( get_theme_mod('blog_layout', 'list') == 'list' ) {
		echo 'list-style';
	}
	else
	if( get_theme_mod('blog_layout', 'list') == 'grid' ) {
		echo 'grid-style';
	} else {
		echo 'list-style';
	}
}

/**
 * Agama Social Icons
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_social_icons' ) ) {
	function agama_social_icons( $tip_position = '' ) {
		$_target = esc_attr( get_theme_mod('social_url_target', '_self') ); // URL target
		$social  = array(
			'Facebook'	=> esc_url( get_theme_mod('social_facebook', '') ),
			'Twitter'	=> esc_url( get_theme_mod('social_twitter', '') ),
			'Flickr'	=> esc_url( get_theme_mod('social_flickr', '') ),
			'RSS'		=> esc_url( get_theme_mod('social_rss', '') ),
			'Vimeo'		=> esc_url( get_theme_mod('social_vimeo', '') ),
			'Youtube'	=> esc_url( get_theme_mod('social_youtube', '') ),
			'Instagram'	=> esc_url( get_theme_mod('social_instagram', '') ),
			'Pinterest'	=> esc_url( get_theme_mod('social_pinterest', '') ),
			'Tumblr'	=> esc_url( get_theme_mod('social_tumblr', '') ),
			'Google'	=> esc_url( get_theme_mod('social_google', '') ),
			'Dribbble'	=> esc_url( get_theme_mod('social_dribbble', '') ),
			'Digg'		=> esc_url( get_theme_mod('social_digg', '') ),
			'Linkedin'	=> esc_url( get_theme_mod('social_linkedin', '') ),
			'Blogger'	=> esc_url( get_theme_mod('social_blogger', '') ),
			'Skype'		=> esc_url( get_theme_mod('social_skype', '') ),
			'Forrst'	=> esc_url( get_theme_mod('social_forrst', '') ),
			'Myspace'	=> esc_url( get_theme_mod('social_myspace', '') ),
			'Deviantart'=> esc_url( get_theme_mod('social_deviantart', '') ),
			'Yahoo'		=> esc_url( get_theme_mod('social_yahoo', '') ),
			'Reddit'	=> esc_url( get_theme_mod('social_reddit', '') ),
			'PayPal'	=> esc_url( get_theme_mod('social_paypal', '') ),
			'Dropbox'	=> esc_url( get_theme_mod('social_dropbox', '') ),
			'Soundcloud'=> esc_url( get_theme_mod('social_soundcloud', '') ),
			'VK'		=> esc_url( get_theme_mod('social_vk', '') ),
			'Email'		=> esc_url( get_theme_mod('social_email', '') )
		);
		// Output icons
		foreach( $social as $name => $url ) {
			if( ! empty( $url ) ) {
				echo sprintf( '<a class="social-icons %s" href="%s" target="%s" data-toggle="tooltip" data-placement="%s" title="%s"></a>', strtolower($name), $url, $_target, $tip_position, $name );
			}
		}
	}
}

/**
 * Render HTML for blog post date / post format
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_blog_post_date' ) ) {
	function agama_render_blog_post_date() {
		global $post;
		
		// Get post format
		$format = get_post_format( $post->ID );
		
		switch( $format ):
			case 'aside':
				$fa_class = 'fa fa-2x fa-outdent';
			break;
			case 'image':
				$fa_class = 'fa fa-2x fa-picture-o';
			break;
			case 'link':
				$fa_class = 'fa fa-2x fa-link';
			break;
			case 'quote':
				$fa_class = 'fa fa-2x fa-quote-left';
			break;
			case 'status':
				$fa_class = 'fa fa-2x fa-comment';
			break;
			default: $fa_class = 'fa fa-2x fa-file-text';
		endswitch;
		
		// If not single post
		if( !is_single() ) {
			echo '<div class="entry-date">';
			echo '<div class="date-box updated">';
			echo sprintf( '<span class="date">%s</span>', get_the_time('d') ); // Get day
			echo sprintf( '<span class="month-year">%s</span>', get_the_time('m, Y') ); // Get month, year
			echo '</div>';
			echo '<div class="format-box">';
			echo sprintf( '<i class="%s"></i>', $fa_class );
			echo '</div>';
			echo '</div><!-- .entry-date -->';
		}
	}
}
add_action( 'agama_blog_post_date_and_format', 'agama_render_blog_post_date', 10 );

/**
 * Render HTML blog post meta details
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_blog_post_meta' ) ) {
	function agama_render_blog_post_meta() {
		_e( 'By', 'agama' );
		echo '<span class="vcard">';
		echo '<span class="fn">';
		echo ' '.get_the_author_link();
		echo '</span>';
		echo '</span>';
		echo '<span class="inline-sep">|</span>';
		echo sprintf( '<span>%s</span>', get_the_time('F j, Y') );
		
		// Output next details only on list blog layout or on single post page
		if( get_theme_mod('blog_layout', 'list') == 'list' || is_single() ) {
			echo '<span class="inline-sep">|</span>';
			
			// Get category
			$categories = get_the_category();
			$separator = ',';
			$output = '';
			if( $categories ):
				foreach($categories as $category) {
					$output .= '<a href="'.esc_url( get_category_link( $category->term_id ) ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'agama' ), $category->name ) ) . '">'.esc_html( $category->cat_name ).'</a>'.$separator;
					echo trim( $output, $separator );
				}
			endif;
			
			echo '<span class="inline-sep">|</span>';
			
			// Comments number
			if( comments_open() ) {
				echo sprintf( '<a href="%s">%s</a>', get_comments_link(), get_comments_number().__( ' comments', 'agama' ) );
			}
		}
	}
}
add_action( 'agama_blog_post_meta', 'agama_render_blog_post_meta', 10 );

/**
 * Infinite Scroll Init
 * 
 * @since 1.0.3
 */
function agama_infinite_scroll_init() { ?>
<script>
jQuery(function($){
	<?php if( get_theme_mod('blog_layout', 'list') == 'grid' ): ?>
	var $container = $('#content').imagesLoaded(function(){
	
		$container.isotope({
			itemSelector : '.article-wrapper'
		});
	  
		$container.infinitescroll({
			navSelector  : '.navigation',
			nextSelector : '.nav-previous a',
			itemSelector : '.article-wrapper',
			loading: {
				finishedMsg: '<?php _e( 'No more posts to load.', 'agama' ); ?>',
				img: '<?php echo AGAMA_IMG .'loader.gif'; ?>'
			  },
			errorCallback: function(){
				$('#infscr-loading').replaceWith(
					"<div id='infscr-loading'><?php _e( 'No more posts to load.', 'agama' ); ?></div>"
				);
			  },
			},
			// call Isotope as a callback
			function( newElements ) {
				$container.isotope( 'appended', $( newElements ) ); 
			}
		);
	});
	<?php else: ?>
	jQuery('#content').infinitescroll({
		navSelector  : '.navigation',
		nextSelector : '.navigation .nav-previous a',
		itemSelector : '.article-wrapper',
		loading: {
			finishedMsg: '<?php _e( 'No more posts to load.', 'agama' ); ?>',
			img: '<?php echo AGAMA_IMG .'loader.gif'; ?>'
		},
	});
	<?php endif; ?>
});
</script>
<?php }

/**
 * Agama Credits
 *
 * @since Agama v1.0.1
 */
if( ! function_exists( 'agama_render_credits' ) ) {
	function agama_render_credits() {
		echo html_entity_decode( get_theme_mod( 'footer_copyright', __( '2015 &copy; Powered by <a href="http://www.theme-vision.com" target="_blank">Theme-Vision</a>.', 'agama' ) ) );
	}
}
add_action( 'agama_credits', 'agama_render_credits' );