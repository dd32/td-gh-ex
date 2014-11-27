<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Aileron
 */

if ( ! function_exists( 'aileron_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function aileron_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'aileron' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> Older posts', 'aileron' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'aileron' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'aileron_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @return void
 */
function aileron_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'aileron' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav"><i class="fa fa-chevron-left"></i></span> %title', 'Previous post link', 'aileron' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav"><i class="fa fa-chevron-right"></i></span>', 'Next post link',     'aileron' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'aileron_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function aileron_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'aileron' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'aileron' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
					$avatar_size = 68;
						if ( '0' != $comment->comment_parent ) {
							$avatar_size = 39;
						}

					echo get_avatar( $comment, $avatar_size );
					?>
					<?php printf( __( '%s <span class="says">says:</span>', 'aileron' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'aileron' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __( 'Edit', 'aileron' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'aileron' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for aileron_comment()

if ( ! function_exists( 'aileron_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function aileron_posted_on() {
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

	printf( __( '<span class="posted-on"><span class="posted-on-label">Posted on</span> %1$s</span>', 'aileron' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		)
	);

}
endif;

if ( ! function_exists( 'aileron_posted_by' ) ) :
/**
 * Prints author.
 */
function aileron_posted_by() {

	printf( __( '<span class="byline"> by %1$s</span>', 'aileron' ),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function aileron_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so aileron_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aileron_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in aileron_categorized_blog.
 */
function aileron_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'aileron_category_transient_flusher' );
add_action( 'save_post',     'aileron_category_transient_flusher' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @return void
*/
function aileron_post_thumbnail() {

	// Post password check
	if ( post_password_required() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<figure class="post-thumbnail post-thumbnail-single">
		<?php the_post_thumbnail( 'aileron-featured-image', array( 'class' => 'img-featured img-responsive' ) ); ?>
	</figure><!-- .post-thumbnail -->

	<?php else : ?>

	<figure class="post-thumbnail">
		<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail( 'aileron-featured-image', array( 'class' => 'img-featured img-responsive' ) ); ?>
		</a>
	</figure><!-- .post-thumbnail -->

	<?php endif; // End is_singular()
}

/**
 * Display first category of the post.
 *
 * @return void
*/
function aileron_first_category() {

	// Show the First Category Name Only
	$category = get_the_category();
	if( $category[0] ) :
	?>

	<span class="entry-meta-first-category">
		<a href="<?php echo esc_url( get_category_link( $category[0]->term_id ) ); ?>"><?php echo esc_html( $category[0]->cat_name ); ?></a>
	</span>

	<?php
	endif;
}

/**
 * Retrieve the layout classes.
 *
 * @param string $section - Name of the section to retrieve the classes
 * @return string
 */
function aileron_blog_layout_class( $section = 'content' ) {

	// Blog layout option
	$blog_layout = aileron_option( 'blog_layout' );

	// Blog layouts
	$blog_layout_skeleton = array(

		'content-sidebar' => array(
			'content' => 'col-xs-12 col-sm-12 col-md-8 col-lg-8',
			'sidebar' => 'col-xs-12 col-sm-12 col-md-4 col-lg-4',
		),

		'sidebar-content' => array(
			'content' => 'col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-push-4 col-lg-push-4',
			'sidebar' => 'col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-pull-8 col-lg-pull-8',
		),

	);

	switch( $blog_layout ) {

		case 'sidebar-content':
		$layout_classes = ( 'sidebar' == $section )? $blog_layout_skeleton['sidebar-content']['sidebar'] : $blog_layout_skeleton['sidebar-content']['content'];
		break;

		case 'content-sidebar':
		default:
		$layout_classes = ( 'sidebar' == $section )? $blog_layout_skeleton['content-sidebar']['sidebar'] : $blog_layout_skeleton['content-sidebar']['content'];

	}

	return $layout_classes;

}