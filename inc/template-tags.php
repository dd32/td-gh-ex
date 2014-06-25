<?php
/**
 * Custom template tags for gump
 *
 * @package gump
 * @since gump 1.0
 */

if ( ! function_exists( 'gump_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function gump_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'gump' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'gump' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'gump' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'gump_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function gump_comment( $comment, $args, $depth ) {
	global $post;
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'gump' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'gump' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body clear<?php if ( '' == get_avatar( $comment ) ) echo ' no-avatar'; ?>">
			<?php if ( '' != get_avatar( $comment ) ) : ?>
			<div class="comment-author vcard">
				<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</div><!-- .comment-author -->
			<?php endif; ?>

			<div class="comment-content">
				<footer class="comment-meta">
					<div>
						<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
					</div>
					<div class="comment-meta-details">
						<span class="comment-meta-time"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'gump' ), get_comment_date(), get_comment_time() ); ?></time></a></span>
						<?php
							if ( $comment->user_id === $post->post_author ) {
								echo '<span class="comment-bypostauthor">' . __( 'Author', 'gump' ) . '</span>';
							}
						?>
						<?php
							comment_reply_link( array_merge( $args, array(
								'add_below'  => 'div-comment',
								'depth'      => $depth,
								'max_depth'  => $args['max_depth'],
								'before'     => '<span class="reply">',
								'after'      => '</span>',
							) ) );
						?>
						<?php edit_comment_link( __( 'Edit', 'gump' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</footer><!-- .comment-meta -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'gump' ); ?></p>
				<?php endif; ?>
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for gump_comment()

if ( ! function_exists( 'gump_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function gump_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'gump' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'gump' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'gump' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'gump_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function gump_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> - %2$s</span>', 'gump' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Flush out the transients used in gump_categorized_blog.
 */
function gump_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'gump_categories' );
}
add_action( 'edit_category', 'gump_category_transient_flusher' );
add_action( 'save_post',     'gump_category_transient_flusher' );
