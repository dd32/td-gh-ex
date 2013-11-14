<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package B3
 */

if ( !function_exists('b3_content_nav') ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function b3_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>"><ul class="pager">


	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link('<li class="previous">%link</li>', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'b3') . '</span> %title'); ?>
		<?php next_post_link('<li class="next">%link</li>', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'b3') . '</span>'); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<li class="previous"><?php next_posts_link( __('<span class="meta-nav">&larr;</span> Older posts', 'b3') ); ?></li>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<li class="next"><?php previous_posts_link( __('Newer posts <span class="meta-nav">&rarr;</span>', 'b3') ); ?></li>
		<?php endif; ?>

	<?php endif; ?>
	</ul></nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // b3_content_nav

if ( ! function_exists('b3_comment') ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function b3_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e('Pingback:', 'b3'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __('Edit', 'b3'), '<span class="edit-link">', '</span>'); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent'); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __('%s <span class="says">says:</span>', 'b3'), sprintf('<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time('c'); ?>">
							<?php printf( _x('%1$s at %2$s', '1: date, 2: time', 'b3'), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
					<?php edit_comment_link( __('Edit', 'b3'), '<span class="edit-link">', '</span>'); ?>
				</div><!-- .comment-metadata -->

				<?php if ('0' == $comment->comment_approved ) : ?>
				<div class="comment-awaiting-moderation alert alert-warning"><?php _e('Your comment is awaiting moderation.', 'b3'); ?></div>
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
endif; // ends check for b3_comment()

if ( ! function_exists('b3_the_attached_image') ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function b3_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters('b3_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();

	/**
	 * Grab the IDs of all the image attachments in a gallery so we can get the
	 * URL of the next adjacent image in a gallery, or the first image (if
	 * we're looking at the last image in a gallery), or, in a gallery of one,
	 * just the link to that image file.
	 */
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery...
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment...
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf('<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists('b3_posted_on') ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function b3_posted_on() {
	if ('Y'==b3_option('post_date')) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_updated = '';
		if (get_the_time('Ymd') !== get_the_modified_time('Ymd')) {
			$time_updated = ' &nbsp;<span class="glyphicon glyphicon-refresh"></span> <time class="updated" datetime="%1$s">%2$s</time>';
			$time_updated = sprintf( $time_updated,
				esc_attr( get_the_modified_date('c') ),
				esc_html( get_the_modified_date() )
			);
		}

		$time_string = sprintf($time_string, esc_attr(get_the_date('c') ),esc_html(get_the_date())  );

		printf('<span class="posted-on"><span class="glyphicon glyphicon-calendar"></span> %1$s</span>',
			sprintf('<a href="%1$s" rel="bookmark">%2$s</a>',
				esc_url( get_day_link(get_the_date('Y'), get_the_date('m'), get_the_date('d')) ), $time_string ));

		echo $time_updated;
	}
	if ('Y'==b3_option('post_author')) {
		printf(' &nbsp;<span class="byline glyphicon glyphicon-user"></span> <span class=">author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta('ID') ) ),
				esc_html( get_the_author() ) );
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function b3_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient('all_the_cool_cats') ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient('all_the_cool_cats', $all_the_cool_cats);
	}

	if ('1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so b3_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so b3_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in b3_categorized_blog
 */
function b3_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient('all_the_cool_cats');
}
add_action('edit_category', 'b3_category_transient_flusher');
add_action('save_post', 'b3_category_transient_flusher');
