<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package fmi
 */

if ( ! function_exists( 'fmi_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function fmi_posted_on() {
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
	
		$byline = '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
	
		echo '<span class="posted-on"><i class="fa fa-calendar"></i> ' . $posted_on . '</span><span class="byline"><i class="fa fa-user"></i> ' . $byline . '</span>';
		
		edit_post_link( __( 'Edit', 'fmi' ), '<span class="edit-link"><i class="fa fa-edit"></i> ', '</span>' );
		
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="fa fa-comments"></i> ';
			comments_popup_link( __( 'Leave a comment', 'fmi' ), __( '1 Comment', 'fmi' ), __( '% Comments', 'fmi' ) );
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'fmi_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function fmi_entry_footer() {
		if ( is_sticky() && is_home() && ! is_paged() ) {printf( '<span class="sticky-post"><i class="fa fa-star"></i> %s</span>', __( 'Featured', 'fmi' ) );}
		
		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'fmi' ) );
			if ( $categories_list && fmi_categorized_blog() ) {
				printf( '<span class="cat-links"><i class="fa fa-list"></i> ' . '%1$s' . '</span>', $categories_list );
			}
	
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'fmi' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links"><i class="fa fa-tags"></i> ' . '%1$s' . '</span>', $tags_list );
			}
		}
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function fmi_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'fmi_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'fmi_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so fmi_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so fmi_categorized_blog should return false.
		return false;
	}
}

function fmi_theme_comment($comment,$args,$depth){
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ){
?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php echo __( 'Pingback:', 'fmi' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'fmi' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

<?php
	}else{
?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="comment-author"><?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?></div>
        
			<div class="comment-meta">
            	<span class="fn"><?php echo get_comment_author_link();?></span>
				<span><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'fmi' ), get_comment_date(), get_comment_time() ); ?></span>
                <?php edit_comment_link( __( 'Edit', 'fmi' ), '<span><i class="fa fa-edit"></i> ', '</span>' ); ?>

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php echo __( 'Your comment is awaiting moderation.', 'fmi' ); ?></p>
				<?php endif; ?>
			</div>

			<div class="mscont comment-content"><?php comment_text();?></div>

			<div class="reply"><?php comment_reply_link( array_merge( $args, array('reply_text' => '<i class="fa fa-retweet"></i>', 'add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div>
            
            <div class="clear"></div>
		</div>
<?php
	}
}


function fmi_post_navigation() {
	global $post;
	$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
	$next = get_adjacent_post( false, '', false );
	if ( ! $next && ! $previous ) return;

	echo '<div role="navigation" id="nav-below" class="navigation-post">';
	previous_post_link( '<div class="nav-previous">%link</div>', '<h3>'.__('Previous Post','fmi').'</h3>%title');
	next_post_link( '<div class="nav-next">%link</div>', '<h3>'.__('Next Post','fmi').'</h3>%title'); 
	echo '<div class="clear"></div>';
	echo '</div>';
}

function fmi_posts_navigation() {
	if(function_exists('wp_pagenavi')) {
		wp_pagenavi();
	}else{
		if(function_exists('the_posts_pagination')){
			the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-arrow-left"></i>',
				'next_text'          => '<i class="fa fa-arrow-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'fmi' ) . ' </span>',
			) );
		}else{
		?>
			<div id="page-nav-below">
				<?php if ( get_next_posts_link() ) : ?>
				<div class="nav-previous"><i class="fa fa-arrow-left"></i> <?php next_posts_link( __( 'Older posts', 'fmi' ) ); ?></div>
				<?php endif; ?>

				<?php if ( get_previous_posts_link() ) : ?>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'fmi' ) ); ?> <i class="fa fa-arrow-right"></i></div>
				<?php endif; ?>
			</div>
		<?php
		}
	}
}