<?php

if ( ! isset( $content_width ) ){
	$content_width = 600;
}


$activetab_version = '0.2.4';


if ( ! function_exists( 'activetab_enqueue_scripts_and_styles' ) ) :
	function activetab_enqueue_scripts_and_styles() {
		global $activetab_version;
		
	    wp_enqueue_script( 'jquery' );

	    wp_register_script( 'activetab-script', get_template_directory_uri() . '/js/activetab.js', array('jquery'), $activetab_version );
	    wp_enqueue_script( 'activetab-script' );

	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	        wp_enqueue_script( 'comment-reply' );
	    }

	    wp_register_style( 'activetab-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css', array(), $activetab_version, 'all' );
	    //wp_register_style( 'activetab-bootstrap-responsive', get_template_directory_uri() . '/bootstrap/css/bootstrap-responsive.css', array( 'activetab-bootstrap' ), $activetab_version, 'all' );
		//wp_enqueue_style( 'activetab-bootstrap-responsive' );
		wp_register_style( 'activetab-style', get_stylesheet_directory_uri() . '/style.css', array( 'activetab-bootstrap' ), $activetab_version, 'all' );
	    wp_enqueue_style( 'activetab-style' );
	}
	add_action( 'wp_enqueue_scripts', 'activetab_enqueue_scripts_and_styles' );
endif;



if ( ! function_exists( 'activetab_setup' ) ) :
	function activetab_setup() {

		add_filter( 'widget_text', 'do_shortcode' ); // execute shortcodes in sidebar widgets

		require( get_template_directory() . '/inc/shortcodes.php' ); // register shortcodes
	
		load_theme_textdomain( 'activetab', get_template_directory() . '/languages' ); // make theme available for translation

		add_editor_style(); // visual editor style match the theme style (add editor-style.css)

		//require( get_stylesheet_directory_uri() . '/inc/theme-options.php' ); // options for future

		add_theme_support( 'automatic-feed-links' ); // add RSS feed links to <head> for posts and comments

		//add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat', ) ); // post formats for future

		register_nav_menu( 'primary-nav', __( 'Primary menu', 'activetab' ) ); // main nav menu in header

		add_theme_support( 'custom-background' );

		add_theme_support( 'post-thumbnails' ); // featured images
		set_post_thumbnail_size( 800, 9999 ); // unlimited height, soft crop


		$custom_header_args = array(
			'default-image'          => get_template_directory_uri() . '/img/headers/borabora.jpg',
			'random-default'         => true, // random image rotation
			'header-text'            => false, // disable editing styles for text in header

			// set height and width, with a maximum value for the width
			'width'                  => 800,
			'height'                 => 500,
			'max-width'              => 2000,

			// support flexible height and width
			'flex-height'            => true,
			'flex-width'             => true

		);

		add_theme_support( 'custom-header', $custom_header_args ); // custom header See http://codex.wordpress.org/Custom_Headers

		// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
		register_default_headers( array(
			'borabora' => array(
				'url' => '%s/img/headers/borabora.jpg',
				'thumbnail_url' => '%s/img/headers/borabora-thumbnail.jpg',
				'description' => __( 'Bora Bora', 'activetab' )
			),
			'tropicalresort' => array(
				'url' => '%s/img/headers/tropicalresort.jpg',
				'thumbnail_url' => '%s/img/headers/tropicalresort-thumbnail.jpg',
				'description' => __( 'Tropical resort', 'activetab' )
			),
			'coloredfeathers' => array(
				'url' => '%s/img/headers/coloredfeathers.jpg',
				'thumbnail_url' => '%s/img/headers/coloredfeathers-thumbnail.jpg',
				'description' => __( 'Colored feathers', 'activetab' )
			),
			'starrynight' => array(
				'url' => '%s/img/headers/starrynight.jpg',
				'thumbnail_url' => '%s/img/headers/starrynight-thumbnail.jpg',
				'description' => __( 'Starry Night', 'activetab' )
			),
		) );



		/* ========== thumbnail size options ========== */


		//add_image_size( 'thumb-400', 400, 999, false );
		//add_image_size( 'thumb-200', 200, 999, false );
		//add_image_size( 'thumb-100', 100, 999, false );
		/*
		to add more sizes, simply copy a line from above
		and change the dimensions & name. As long as you
		upload a "featured image" as large as the biggest
		set width or height, all the other sizes will be
		auto-cropped.

		<?php the_post_thumbnail( 'thumb-200' ); ?> - shows the 200x200 sized image
		*/


		add_action( 'admin_menu', 'cozy_add_customize_to_admin_menu' );
		function cozy_add_customize_to_admin_menu() { // add the 'Customize' link to the admin menu
			add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
		}

	}
	add_action( 'after_setup_theme', 'activetab_setup' );
endif;


// register sidebars & footer widgets
if ( ! function_exists( 'activetab_register_widgets' ) ) :
	function activetab_register_widgets() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'activetab' ),
			'id' => 'sidebar',
			//'description' => 'Sidebar widgets description.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
		register_sidebar( array(
			'name' => __( 'Footer', 'activetab' ),
			'id' => 'footer',
			'description' => 'You can use shortcodes: [c] [year] [homelink]',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>',
		) );
	}
	add_action( 'widgets_init', 'activetab_register_widgets' );
endif;


if ( ! function_exists( 'activetab_favicon' ) ) :
	function activetab_favicon() {
		echo "\n".'<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/favicon.ico" />'."\n";
	}
	add_action( 'wp_head', 'activetab_favicon' ); // add favicon to frontend
	add_action( 'admin_head', 'activetab_favicon' ); // add favicon to backend
endif;


if ( ! function_exists( 'activetab_list_pages' ) ) :
	function activetab_list_pages() {
		?>
		<nav class="nav-menu nav clearfix" role="navigation"><ul class="nav"><?php wp_list_pages( 'title_li=' ); ?></ul></nav>
		<?php
	}
endif;


if ( ! function_exists( 'activetab_title' ) ) :
	function activetab_title($title, $sep) {
		global $post, $page, $paged;

		if ( is_feed() )
			return $title;

		// Add the blog name
		$title .= get_bloginfo( 'name' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= ' ' . $sep . ' ' . $site_description;

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			$title .= ' ' . $sep . ' ' . sprintf( __( 'page %s', 'activetab' ), max( $paged, $page ) );

		$title = wptexturize( $title );

		return $title;
	}
	add_filter( 'wp_title', 'activetab_title', 10, 2 );
endif;


if ( ! function_exists( 'activetab_comments' ) ) :
	function activetab_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case 'pingback' :
			case 'trackback' :
				?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'activetab' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( '<i class="icon-pencil"></i>'.__( 'edit', 'activetab' ), '<span class="edit-link comment-edit-link">', '</span>' ); ?></p>
					<?php
				break;
			default :
				?>
				<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
					<article id="comment-<?php comment_ID(); ?>" class="clearfix">
						<header class="comment-header">
							<div class="comment-author vcard clearfix">
								<?php
								$avatar_size = 50;
								if ( '0' != $comment->comment_parent ){
									$avatar_size = 30; // small image for reply
								}
								$comment_author_url = get_comment_author_url();
								if( !empty( $comment_author_url ) ){ // create a link on avatar
									$comment_avatar_url_before = '<a href="'.$comment_author_url.'" title="'.get_comment_author( $comment->comment_ID ).'">';
									$comment_avatar_url_after = '</a>';
								}else{
									$comment_avatar_url_before = '<span title="'.get_comment_author( $comment->comment_ID ).'">';
									$comment_avatar_url_after = '</span>';
								}

								global $post;
								if( $comment->user_id === $post->post_author ) {
									$post_author_label = ' <span class="label label-info">'.__( 'Post author', 'activetab' ).'</span>';
								} else {
									$post_author_label = '';
								}
								echo '<div class="comment-avatar">'.$comment_avatar_url_before.get_avatar( $comment, $avatar_size ).$comment_avatar_url_after.'</div>';

								echo '<div class="comment-meta">';
								echo '<span class="comment-meta-item comment-meta-item-author fn"><i class="icon-user" title="'.__( 'author', 'activetab' ).'"></i> '.get_comment_author_link().$post_author_label.'</span> ';
								echo '<span class="comment-meta-item comment-meta-item-date"><i class="icon-calendar" title="'.__( 'published', 'activetab' ).'"></i> <a href="'.esc_url( get_comment_link( $comment->comment_ID ) ).'"><time pubdate datetime="'.get_comment_time( 'c' ).'" title="'.get_comment_time().'">'.get_comment_date().'</time></a></span>';

								edit_comment_link( __( 'edit', 'activetab' ), '<span class="edit-link comment-edit-link"><i class="icon-pencil"></i> ', '</span>' );

								echo '</div> <!-- /.comment-meta -->';
								?>
							</div> <!-- /.comment-author /.vcard -->

							<?php if ( $comment->comment_approved == '0' ) : ?>
								<p><em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'activetab' ); ?></em></p>
							<?php endif; ?>

						</header><!-- /.comment-meta -->

						<div class="comment-content"><?php comment_text(); ?></div>

						<div class="reply">
							<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="icon-comment"></i>'.__( 'reply', 'activetab' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						</div> <!-- /.reply -->
					</article> <!-- /#comment-<?php comment_ID(); ?> -->

				<?php
				break;
		endswitch;
	}
endif; // activetab_comments


if ( ! function_exists( 'activetab_post_date' ) ) :
	function activetab_post_date() {
		$post_date = '<span class="entry-meta-item entry-meta-date"><i class="icon-calendar" title="'.__( 'published', 'activetab' ).'"></i> '.'<a href="'.get_permalink().'" title="'.get_the_time().'" rel="bookmark"><time class="entry-date" datetime="'.get_the_date( 'c' ).'" pubdate title="'.get_the_time().'">'.get_the_date().'</time></a></span>'."\n";
		return $post_date;
	}
endif; // activetab_post_date


if ( ! function_exists( 'activetab_post_author' ) ) :
	function activetab_post_author() { // author
		global $authordata;
		if ( !is_object( $authordata ) )
			return false;
		$post_author = '<span class="entry-meta-item entry-meta-author"><i class="icon-user" title="'.__( 'author', 'activetab' ).'"></i> <a href="'.get_author_posts_url( $authordata->ID, $authordata->user_nicename ).'" title="'.esc_attr( sprintf( __( 'posts by %s', 'activetab' ), get_the_author() ) ).'" rel="author">'.get_the_author().'</a></span>'."\n";
		return $post_author;
	}
endif; // activetab_post_author


if ( ! function_exists( 'activetab_comments_count' ) ) :
	function activetab_comments_count() {
		$post_comments_count = '';
		if( get_comments_number() != '0' ) {
			$post_comments_count = '<span class="entry-meta-item entry-meta-comments-count"><i class="icon-comment" title="'.__( 'comments', 'activetab' ).'"></i> <a href="'.get_permalink() . '#comments" title="'.__( 'comments', 'activetab' ).'">'.get_comments_number().'</a></span>'."\n";
		}
		return $post_comments_count;
	}
endif; // activetab_comments_count


if ( ! function_exists( 'activetab_post_categories' ) ) :
	function activetab_post_categories() { // list of categories
		$post_categories = get_the_category_list( ', ' );
		if( !empty( $post_categories ) ){
			return '<span class="entry-meta-item entry-meta-categories"><i class="icon-folder-open" title="'.__( 'categories', 'activetab' ).'"></i> '.$post_categories.'</span>'."\n";
		}else{
			return ''; // no categories
		}
	}
endif; // activetab_post_categories


if ( ! function_exists( 'activetab_post_tags' ) ) :
	function activetab_post_tags() { // list of tags
		$post_tags = get_the_tag_list( '', ', ', '' );
		if( !empty( $post_tags ) ){
			return '<span class="entry-meta-item entry-meta-tags"><i class="icon-tag" title="'.__( 'tags', 'activetab' ).'"></i> '.$post_tags.'</span>'."\n";
		}else{
			return ''; // no tags
		}
	}
endif; // activetab_post_tags


if ( ! function_exists( 'activetab_post_meta' ) ) :
	function activetab_post_meta() { // post meta
		$post_meta = '<div class="entry-meta-row">'."\n" . activetab_post_date() . activetab_post_author() . activetab_comments_count() . activetab_post_categories() . '</div>'."\n";
		$post_tags = activetab_post_tags();
		if( !empty( $post_tags ) && is_single() ){
			$post_meta .= '<div class="entry-meta-row">'."\n" . $post_tags . '</div>'."\n";
		}
		return "\n".'<div class="entry-meta">'."\n".$post_meta.'</div> <!-- /.entry-meta -->'."\n";
	}
endif; // activetab_post_meta


if ( ! function_exists( 'activetab_nav' ) ) :
	function activetab_nav( $class='top' ) { // show next/prev navigation links when needed
		global $wp_query;
		$nav = '';
		if ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages
			if ( get_next_posts_link() ) :
				$nav .= '<li class="previous">'.get_next_posts_link( '<i class="icon-arrow-left"></i> '.__( 'previous posts', 'activetab' ) ).'</li>';
			endif;
			if ( get_previous_posts_link() ) :
				$nav .= '<li class="next">'.get_previous_posts_link( __( 'next posts', 'activetab' ).' <i class="icon-arrow-right"></i>' ).'</li>';
			endif;
		endif;
		if( !empty( $nav ) ) { // do not show empty markup
			$nav = "\n".'<nav class="site-posts-navigation site-comments-navigation-'.$class.'" role="navigation"><ul class="pager">'.$nav.'</ul></nav> <!-- /.site-posts-navigation -->'."\n";
		}
		return $nav;
	}
endif; // activetab_nav


if ( ! function_exists( 'activetab_excerpt_more' ) ) :
	function activetab_excerpt_more( $more ) { // "more-link" is bad for seo and for usability - http://web-profile.com.ua/web/web-principles/more-link/
		return '...';
	}
	add_filter('excerpt_more', 'activetab_excerpt_more');
endif; // activetab_excerpt_more


if ( ! function_exists( 'activetab_is_homepage' ) ) :
	function activetab_is_homepage(){ // does not used, simple way was chosen
		// if( is_home() || is_front_page() ){} // simple way
		$show_on_front = get_option('show_on_front'); // page or posts
		$page_on_front = get_option('page_on_front'); // 0 or page_id
		$page_for_posts = get_option('page_for_posts'); // 0 or page_id
		if ( ($show_on_front == 'page') || ($page_on_front != 0) ){
			if( is_front_page() ){
				return true;
			}
		} elseif ( ( $show_on_front == 'posts' ) || ( $page_for_posts == 0 ) ) {
			if( is_home() ){
				return true;
			}
		} else {
			return false;
		}
	}
endif; // activetab_is_homepage


add_filter('widget_text', 'do_shortcode'); // enable shortcodes in widgets


// ===== filtered code up here ============================================================



/****************** password protected post form *****/
if ( ! function_exists( 'activetab_custom_password_form' ) ) :
	add_filter( 'the_password_form', 'activetab_custom_password_form' );
	function activetab_custom_password_form() {
		global $post;
		$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$o = '<div class="clearfix"><form class="protected-post-form" action="' . get_option('siteurl') . '/wp-pass.php" method="post">
		' . __( "<p>This post is password protected. To view it please enter your password below:</p>", 'activetab' ) . '
		<label for="' . $label . '">' . __( 'Password:', 'activetab' ) . ' </label><div class="input"><input name="post_password" id="' . $label . '" type="password" size="20" /><input type="submit" name="Submit" class="btn primary" value="' . esc_attr__( "Submit" ) . '" /></div>
		</form></div>
		';
		return $o;
	}
endif; // activetab_custom_password_form


if ( ! function_exists( 'activetab_remove_more_jump_link' ) ) :
	add_filter('the_content_more_link', 'activetab_remove_more_jump_link');
	function activetab_remove_more_jump_link($link) { // disable jump in 'read more' link
		$offset = strpos($link, '#more-');
		if ($offset) {
			$end = strpos($link, '"',$offset);
		}
		if ($end) {
			$link = substr_replace($link, '', $offset, $end-$offset);
		}
		return $link;
	}
endif; // activetab_remove_more_jump_link


if ( ! function_exists( 'activetab_remove_thumbnail_dimensions' ) ) :
	add_filter( 'post_thumbnail_html', 'activetab_remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'activetab_remove_thumbnail_dimensions', 10 );
	function activetab_remove_thumbnail_dimensions( $html ) { // Remove height/width attributes on images so they can be responsive
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}
endif; // activetab_remove_thumbnail_dimensions
