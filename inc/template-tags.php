<?php
/**
 * Custom template tags for Aguafuerte
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */

if ( ! function_exists( 'aguafuerte_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post"><span class="genericon genericon-pinned" aria-hidden="true"></span>' . __( 'Sticky', 'aguafuerte' ) . '</span>';
	}

	// Set up and print post meta information.
	// Translators: there is a space after "By".
	print(__('By ', 'aguafuerte'));
	printf( '<span class="byline"><a href="%1$s" rel="author">%2$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
	printf( '<span><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);	
}
endif;

if ( ! function_exists( 'aguafuerte_entry_header') ):
/**
 * Print HTML with the entry header
 *
 * @since Aguafuerte 1.0.2
 */
	function aguafuerte_entry_header(){ ?>
		<header class="entry-header">
		<div class="entry-meta">
			<?php
				// Translators: used between list items, there is a space after the comma.
				$categories_list = get_the_category_list( __( ', ', 'aguafuerte' ) );
				if ( $categories_list ) {
					echo '<span class="cat-links"><span class="genericon genericon-category" aria-hidden="true"></span>' . $categories_list . '</span>';
				}
			?>
		</div><!-- .entry-meta -->
	
	<?php
		if ( is_single() && ! is_dynamic_sidebar() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		endif;
	?>
		<div class="entry-meta">
		<?php
			$format = get_post_format(); // Esto lo voy a usar cuando le de un estilo especial a cada formato.
			$format_link = get_post_format_link($format);
			if ($format):			
				printf('<a href="%1$s" class="entry-format"><span class="genericon genericon-%2$s" aria-hidden="true"></span>%2$s</a>', esc_url( $format_link ) , $format );			
			endif;
		?>
			<span class="byline">
			<?php
				if ( 'post' == get_post_type() ) :
					// Translators: there is a space after "By".
					print(__('By ', 'aguafuerte'));
					printf( '<span><a href="%1$s" rel="author"><span class="genericon genericon-user" aria-hidden="true"></span>%2$s</a></span>',
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						get_the_author() );
				endif;
			?>
			</span><!--.byline -->
		<?php edit_post_link('<span class="genericon genericon-edit" aria-hidden="true"></span>'. __('Edit', 'aguafuerte') ) ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

<?php }

endif;

if ( ! function_exists( 'aguafuerte_entry_footer') ):
/**
 * Print HTML with the entry header
 *
 * @since Aguafuerte 1.0.2
 */
	function aguafuerte_entry_footer(){ ?>

		<footer class="entry-footer">
			<div class="entry-meta">

			<?php
			printf( '<a href="%1$s" class="entry-date" rel="bookmark"><span class="screen-reader-text"> %2$s</span><span class="genericon genericon-time" aria-hidden="true"></span><time datetime="%3$s">%4$s</time></a>',
				esc_url( get_permalink() ),
				esc_html( get_the_title() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
				);	

			// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'aguafuerte' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links"><span class="genericon genericon-tag" aria-hidden="true"></span>' . $tag_list . '</span>';
			}

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link">
				<span class="genericon genericon-comment" aria-hidden="true"></span>
				<?php aguafuerte_comments_popup_link(); ?>
			</span>
	<?php 	endif; ?>
			</div><!-- .entry-meta -->

		<?php
			// Author bio.
			if ( is_single() && get_the_author_meta( 'description' ) ) :
				get_template_part( 'author-bio' );
			endif;
		?>
		</footer><!-- .entry-footer -->

<?php }

endif;

if ( ! function_exists( 'aguafuerte_comments_popup_link') ):
/**
 * Prints the markup for the navigation between posts and changes the default strings of the_post_navigation().
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_comments_popup_link() {
	comments_popup_link(
		// Translators: there is a space after "on.
		'<span aria-hidden="true">0</span><span class="screen-reader-text">' . __('No comments on ', 'aguafuerte') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">1</span><span class="screen-reader-text">' . __('Only one comment on ', 'aguafuerte') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">%</span><span class="screen-reader-text">' . __('% comments on ', 'aguafuerte') . get_the_title() . '</span>'
		);
}
endif;

/**
 * Prints Aguafuerte's custom logo markup.
 *
 * @since Aguafuerte 1.0.2
 *
 */
// function aguafuerte_custom_logo() {
// 	$html = sprintf( '<a href="%1$s" class="custom-logo-link home-link" rel="home" itemprop="url"><img class="custom-logo" src="%2$s" alt="logo"><h1 class="site-title">%3$s</h1><h2 class="site-description">%4$s</h2></a>',
// 		esc_url( home_url( '/' ) ),
// 		esc_attr(wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') ),
// 		esc_html( get_bloginfo( 'name') ) ,
// 		esc_html( get_bloginfo( 'description') ) );

// 	return $html;
// }
// add_filter('get_custom_logo', 'aguafuerte_custom_logo');

if ( ! function_exists( 'aguafuerte_post_navigation' ) ) :
/**
 * Prints the markup for the navigation between posts and changes the default strings of the_post_navigation().
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_post_navigation() {
	the_post_navigation( array(
		'prev_text' =>  '<span class="genericon genericon-previous" aria-hidden="true"></span>' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'aguafuerte' ) . '</span> ' .
						'<span class="post-title">%title</span>',
		'next_text' => 	'<span class="post-title">%title</span>' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'aguafuerte' ) . '</span> ' .
						'<span class="genericon genericon-next" aria-hidden="true"></span>',
	) );
}
endif;


if ( ! function_exists( 'aguafuerte_blog_navigation' ) ) :
/**
 * Applies the user's choice for navigation/pagination and changes the default strings in the_posts_navigation() and the_posts_pagination().
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_blog_navigation() {
	$aguafuerte_theme_options = aguafuerte_get_options( 'aguafuerte_theme_options' );
	if ( $aguafuerte_theme_options['blog_navigation'] == 'navigation' ) :
		the_posts_navigation( array(
			'prev_text' => '<span class="genericon genericon-previous" aria-hidden="true"></span> '. __( 'Older articles', 'aguafuerte' ),
			'next_text' => __( 'Newer articles', 'aguafuerte' ).' <span class="genericon genericon-next" aria-hidden="true"></span>',
			) );
	else:
		the_posts_pagination( array(
			'prev_text'	=> '<span class="genericon genericon-previous" aria-hidden="true"></span> <span class="screen-reader-text">' . __( 'Previous page', 'aguafuerte' ) . '</span>',
			'next_text'	=> '<span class="screen-reader-text">' . __( 'Next page', 'aguafuerte' ) . '</span> <span class="genericon genericon-next" aria-hidden="true"></span>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'aguafuerte' ) . ' </span>',
		) );
	endif;
}
endif;

if ( ! function_exists( 'aguafuerte_comments_navigation' ) ) :
/**
 * Prints custom html markup for the_comments_navigation()
 *
 * @since Aguafuerte 1.0.2
 */
function aguafuerte_comments_navigation() {
	the_comments_navigation( array(
		'prev_text' => '<span class="genericon genericon-previous" aria-hidden="true"></span> '. __( 'Older comments', 'aguafuerte' ),
		'next_text' => __( 'Newer comments', 'aguafuerte' ) . ' <span class="genericon genericon-next" aria-hidden="true"></span>',
		));
}
endif;

if ( ! function_exists( 'aguafuerte_archive_title' ) ) :
/**
 * Filters the_archive_title()
 *
 * @since Aguafuerte 1.0.7
 */
function aguafuerte_archive_title( $title ) {
	if ( is_category() ) {
		$title =  __( 'All articles in ', 'aguafuerte' ) . single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = __( 'All articles about ', 'aguafuerte' ). ucfirst( single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = get_template_part( 'template-parts/author-bio' );
		$title .= __( 'All articles by ', 'aguafuerte') . get_the_author();
	}
  
	return $title;
}
add_filter( 'get_the_archive_title', 'aguafuerte_archive_title' );
endif;

if ( ! function_exists( 'aguafuerte_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Aguafuerte 1.0.2
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function aguafuerte_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* Translators: %s: Name of current post */
			sprintf( __( 'More', 'aguafuerte' ).' %s <span class="meta-nav"><span class="genericon genericon-next"></span></span>', '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
	}

	else{
		return '. ';
	}
}
add_filter( 'excerpt_more', 'aguafuerte_excerpt_more' );
endif;


/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function aguafuerte_excerpt_length( $length ) {
   return 50;
}

add_filter( 'excerpt_length', 'aguafuerte_excerpt_length', 999 );

/**
 * Filters the edit comment link.
 */
function aguafuerte_edit_comment_link() {
	$text = __('Edit', 'aguafuerte');
	$link = '<a class="comment-edit-link" href="' . esc_url(get_edit_comment_link()) . '"><span class="genericon genericon-edit" aria-hidden="true"></span>'.esc_html($text).'</a>';

	return $link;
}
add_filter( 'edit_comment_link', 'aguafuerte_edit_comment_link'  );



