<?php
/**
 * Custom template tags for Bassist
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */

if ( ! function_exists( 'bassist_custom_logo' ) ) :
/**
 * Prints Bassist's custom logo markup.
 *
 * @since Bassist 1.0.0
 *
 */
function bassist_custom_logo() {
	$html = sprintf( '<a href="%1$s" class="custom-logo-link home-link" rel="home" itemprop="url"><img class="custom-logo" src="%2$s" alt="logo"><div class="title-description"><h1 class="site-title">%3$s</h1><h2 class="site-description">%4$s</h2></div></a>',
		esc_url( home_url( '/' ) ),
		esc_attr(wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') ),
		esc_html( get_bloginfo( 'name') ) ,
		esc_html( get_bloginfo( 'description') ) );

    return $html;
}
endif;
add_filter('get_custom_logo', 'bassist_custom_logo');

if ( ! function_exists( 'bassist_entry_footer' ) ) :
/**
 * Prints the entry footer markup in index pages.
 *
 * @since Bassist 1.0.0
 */
function bassist_entry_footer() { ?>
	<footer class="entry-footer">
		<div class="entry-meta">
		<?php		
			printf( '<a class="entry-date" href="%1$s" rel="bookmark"><span class="screen-reader-text"> %2$s</span><time datetime="%3$s"><i class="fa fa-clock-o" aria-hidden="true"></i>%4$s</time></a>',
			esc_url( get_permalink() ),
			esc_html( get_the_title() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
			);	

			// Translators: used between list items, there is a space after the comma.
			$tag_list = get_the_tag_list( '', __( ', ', 'bassist' ) );
			if ( $tag_list ) {
				echo '<span class="tags-links"><i class="fa fa-tag" aria-hidden="true"></i>' . $tag_list . '</span>';
			}

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
				<span class="comments-link">
					<i class="fa fa-comment" aria-hidden="true"></i>
					<?php bassist_comments_popup_link(); ?>
				</span>
		<?php endif; ?>
			
		</div><!-- .entry-meta -->
	</footer><!-- .entry-footer -->
<?php }
endif;

if ( ! function_exists( 'bassist_entry_title' ) ) :
/**
 * Prints the entry title markup according to the page (single, front page, all others.
 *
 * @since Bassist 1.0.0
 */
function bassist_entry_title() {
	if ( is_single() && ! is_dynamic_sidebar() ) :
		the_title( '<h1 class="entry-title">', '</h1>' );
	elseif ( is_front_page() ) :
		the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
	else :
		the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
	endif;
}
endif;

if ( ! function_exists( 'bassist_comments_popup_link') ):
/**
 * Prints the markup for the navigation between posts and changes the default strings of the_post_navigation().
 *
 * @since Bassist 1.0.4
 */
function bassist_comments_popup_link() {
	comments_popup_link(
		// Translators: there is a space after "on.
		'<span aria-hidden="true">0</span><span class="screen-reader-text">' . __('No comments on ', 'bassist') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">1</span><span class="screen-reader-text">' . __('Only one comment on ', 'bassist') . get_the_title() . '</span>',
		// Translators: there is a space after "on.
		'<span aria-hidden="true">%</span><span class="screen-reader-text">' . __('% comments on ', 'bassist') . get_the_title() . '</span>'
		);
}
endif;


if ( ! function_exists( 'bassist_blog_navigation' ) ) :
/**
 * Applies the user's choice for navigation/pagination and changes the default strings in the_posts_navigation() and the_posts_pagination().
 *
 * @since Bassist 1.0.0
 */
function bassist_blog_navigation() {
	$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
	if ( $bassist_theme_options['blog_navigation'] == 'navigation' ) :
		the_posts_navigation( array(
			'prev_text' => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>' .__( 'Older articles', 'bassist' ),
			'next_text' => __( 'Newer articles', 'bassist' ) . '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
			) );
	else:
		the_posts_pagination( array(
			'prev_text'			 => '<i class="fa fa-long-arrow-left" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Previous page', 'bassist' ) . '</span>',
			'next_text'			 => '<span class="screen-reader-text">' . __( 'Next page', 'bassist' ) . '</span><i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'bassist' ) . ' </span>',
		) );
	endif;
}
endif;

if ( ! function_exists( 'bassist_post_navigation' ) ) :
/**
 * Prints custom html markup for the_post_navigation()
 *
 * @since Bassist 1.0.0
 */
function bassist_post_navigation() {
	the_post_navigation( array(
		'next_text' => 	'<span class="screen-reader-text">' . __( 'Next post:', 'bassist' ) . '</span> ' .
						'<span class="post-title">%title</span>' .
						'<i class="meta-nav fa fa-long-arrow-right" aria-hidden="true"></i>',
		'prev_text' =>  '<i class="meta-nav fa fa-long-arrow-left" aria-hidden="true"></i>' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'bassist' ) . '</span> ' .
						'<span class="post-title">%title</span>',
	) );
}
endif;

if ( ! function_exists( 'bassist_comments_navigation' ) ) :
/**
 * Prints custom html markup for the_comments_navigation()
 *
 * @since Bassist 1.0.0
 */
function bassist_comments_navigation() {
	the_comments_navigation( array(
		'prev_text' => '<i class="fa fa-long-arrow-left"></i> '. __( 'Older', 'bassist' ),
		'next_text' => __( 'Newer', 'bassist' ) . ' <i class="fa fa-long-arrow-right"></i>',
		));
}
endif;

if ( ! function_exists( 'bassist_parallax' ) ) :
/**
 * Creates the markup of a parallax section if an image is loaded.
 * @param int $number The number of the image and the parallax section.
 * @since Bassist 1.0
 */
function bassist_parallax($number) {
	$bassist_theme_options = bassist_get_options( 'bassist_theme_options' );
	$image = $bassist_theme_options['parallax_background_image_'.$number];

		if ( $image !== ''): ?>
			<section id="parallax-front-page" class="parallax" >
				<div class="bg__<?php echo esc_attr($number) ?>">first</div>
			</section>
<?php 	endif;
}
endif;

if ( ! function_exists('bassist_post_format_info')) :
/**
 * Prints HTML with post format information.
 *
 * @since Bassist 1.0
 */
function bassist_post_format_info() {
	$format = get_post_format() ; // Esto lo voy a usar cuando le de un estilo especial a cada formato.
	$format_link = get_post_format_link($format);
	switch ($format) {
		case 'aside':
			printf('<a href="%1$s"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'image':
			printf('<a href="%1$s"><i class="fa fa-camera" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'video':
			printf('<a href="%1$s"><i class="fa fa-film" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'quote':
			printf('<a href="%1$s"><i class="fa fa-quote-right" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'link':
			printf('<a href="%1$s"><i class="fa fa-link" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'gallery':
			printf('<a href="%1$s"><i class="fa fa-picture-o" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'status':
			printf('<a href="%1$s"><i class="fa fa-commenting-o" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'audio':
			printf('<a href="%1$s"><i class="fa fa-music" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;
		case 'chat':
			printf('<a href="%1$s"><i class="fa fa-comments-o" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), esc_html( ucfirst($format) ));
			break;		
		default:
			printf('<a href="%1$s"><i class="fa fa-thumb-tack" aria-hidden="true"></i>%2$s</a>', esc_url( $format_link ), __('Standard', 'bassist'));
			break;
		}
	}
endif;


if ( ! function_exists( 'bassist_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ...
 * and a Continue reading link.
 *
 * @since Bassist 1.0.0
 *
 * @param string $more Default Read More excerpt link.
 * @return string Filtered Read More excerpt link.
 */
function bassist_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
			/* Translators: %s: Name of current post */
			sprintf( __( 'More', 'bassist' ).' %s <span class="meta-nav">&rarr;</span>', '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return ' &hellip; ' . $link;
	}

	else {
		return '. ';
	}
}
add_filter( 'excerpt_more', 'bassist_excerpt_more' );
endif;

/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function bassist_excerpt_length( $length ) {
   return 20;
}

add_filter( 'excerpt_length', 'bassist_excerpt_length', 999 );


/**
 * Filter the edit comment link.
 */
function bassist_edit_comment_link() {
	printf( '<span class="edit-link"><a href="%1$s" class="comment-edit-link"><i class="fa fa-pencil" aria-hidden="true"></i>%2$s</a></span>',
    	esc_url( get_edit_comment_link() ),
    	esc_html( __('Edit', 'bassist') )
    	);
}
add_filter( 'edit_comment_link', 'bassist_edit_comment_link'  );

