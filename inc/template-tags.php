<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package akarsh_blog
 */

/**
 * Auto add more links.
 *
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_content_more() {
	
	/* translators: link read more. */
	$text = wp_kses_post( sprintf( __( 'Continue reading &#10142; %s', 'akarsh-blog' ), '<span class="screen-reader-text">' . get_the_title() . '</span>' ) );
	$more = sprintf( '<div class="link-more"><a href="%s#more-%d" class="more-link">%s</a></div>', esc_url( get_permalink() ), get_the_ID(), $text );

	return $more;
}
add_filter( 'the_content_more_link', 'akarsh_blog_content_more' );

/**
 * Auto add more links.
 * 
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_excerpt_more_link( $excerpt ) {
    $excerpt 	.= akarsh_blog_content_more();
    return $excerpt;
}
add_filter( 'the_excerpt', 'akarsh_blog_excerpt_more_link', 21 );

/**
 * Change the archive title for category page.
 *
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_category_title( $title ) {
	
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	}

	return $title;
}
add_filter( 'get_the_archive_title', 'akarsh_blog_category_title' );

/**
 * Prints HTML with meta information for the current post-date/time and categories, tags..
 */
function akarsh_blog_posted_on( $meta = array() ) {

	$default_meta = array(
							'post_date' => 1,
							'author' 	=> 1,							
							'tag'		=> 1,
							'comment'	=> 1,
						);
	if( !empty($meta) && is_array($meta) ) {
		foreach ($default_meta as $meta_key => $meta_val) {
			$val = in_array($meta_key, $meta) ? 1 : 0;

			$result_meta[$meta_key] = $val;
		}
	}

	$result_meta = !empty($result_meta) ? $result_meta : $default_meta;
	extract( $result_meta, EXTR_SKIP );
	
	
	if( is_home()) {

		$post_date 	= akarsh_blog_get_theme_mod( 'blog_show_date' );
		$author 	= akarsh_blog_get_theme_mod( 'blog_show_author' );	
		$comments 	= akarsh_blog_get_theme_mod( 'blog_show_comments' );	
		$tag 		= akarsh_blog_get_theme_mod( 'blog_show_tags' );

	} elseif( is_category() ) {

		$post_date 	= akarsh_blog_get_theme_mod( 'cat_show_date' );
		$author 	= akarsh_blog_get_theme_mod( 'cat_show_author' );
		$comments 	= akarsh_blog_get_theme_mod( 'cat_show_comments' );	
		$tag 		= akarsh_blog_get_theme_mod( 'cat_show_tags' );
		
	} 

	// Post Date
	if( $post_date ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		echo '<span class="posted-on"><i class="fa fa-clock-o"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.
	}

	// Post Author
	if( $author ) {
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';	
		echo '<span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>';
	}

	// Hide category and tag text for pages.
	if ( $tag && 'post' === get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'akarsh-blog' ) );
		if ( $tags_list ) {
			echo '<span class="tags-links"><i class="fa fa-tags"></i>' . $tags_list . '</span>'; // WPCS: XSS OK.
		}
	}

	if ( $comment && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comments-o"></i>';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'akarsh-blog' ), array(
			'span' => array(
				'class' => array(),
			),
		) ), get_the_title() ) );
		echo '</span>';
	}
}

/**
 * Prints HTML with meta information for the current post-date/time and categories, tags..
 */
function akarsh_blog_posted_on_cat() {	
	
	$category = '';
	
	if( is_home() ) {
		$category 	= akarsh_blog_get_theme_mod( 'blog_show_cat' );

	} elseif( is_category() ) {
		$category 	= akarsh_blog_get_theme_mod( 'cat_show_cat' );
	} 
	
// Post Category
	if( $category || is_single() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ' ', 'akarsh-blog' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links">%2$s</span>', esc_html__( 'Categories', 'akarsh-blog' ), $categories_list ); // WPCS: XSS OK.
		}
	} 
}	


/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function akarsh_blog_entry_footer() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'akarsh-blog' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Change the tag could args
 *
 * @param array $args Widget parameters.
 *
 * @return mixed
 */
function akarsh_blog_tag_cloud_args( $args ) {
	$args['largest']  = 1; // Largest tag.
	$args['smallest'] = 1; // Smallest tag.
	$args['unit']     = 'rem'; // Tag font unit.

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'akarsh_blog_tag_cloud_args' );


if ( ! function_exists( 'akarsh_blog_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 *
 * @since Twenty Fifteen 1.0
 */
function akarsh_blog_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<nav class="navigation comment-navigation" role="navigation">
		<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'akarsh-blog' ); ?></h2>
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( __( 'Older Comments', 'akarsh-blog' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( __( 'Newer Comments', 'akarsh-blog' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}
endif;


// Remove Wocommerce Wrapper
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
 * Function to start WooCommece wrapper
 * 
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_theme_wrapper_start() {
  echo '<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">';
}
add_action('woocommerce_before_main_content', 'akarsh_blog_theme_wrapper_start', 10);

/**
 * Function to end WooCommece wrapper
 * 
 * @package akarsh_blog
 * @since 1.0
 */
function akarsh_blog_theme_wrapper_end() {
	echo '</main></div>';
}
add_action('woocommerce_after_main_content', 'akarsh_blog_theme_wrapper_end', 10);