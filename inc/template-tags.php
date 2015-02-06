<?php
/**
 * Custom template tags for this theme.
 *
 * @package star
 */

if ( ! function_exists( 'the_posts_navigation' ) ) {
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
	function star_paging_nav() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		?>
		<nav class="navigation posts-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'star' ); ?></h1>
			<div class="nav-links">
				<?php if ( get_next_posts_link() ) : ?>
					<div class="nav-previous"><?php next_posts_link( __( 'Older posts', 'star' ) ); ?></div>
				<?php endif; ?>
				<?php if ( get_previous_posts_link() ) : ?>
					<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'star' ) ); ?></div>
				<?php endif; ?>
			</div><!-- .nav-links -->
		</nav><!-- .navigation -->
		<?php
	}
}


if ( ! function_exists( 'the_post_navigation' ) ) {
/**
 * Display navigation to next/previous post when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function star_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'star' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
	}
}



if ( ! function_exists( 'star_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time
 */
function star_posted_on() {
	$time_string = '<time datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	echo $time_string;
}
endif;



if ( ! function_exists( 'star_entry_footer' ) ) :

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function star_entry_footer() {

	if( get_theme_mod('star_hide_meta')=="" ){
		echo '<footer class="entry-footer">';

		// Hide category and tag text for pages.
		if ( 'post' == get_post_type() ) {

		/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', __( ', ', 'star' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . __( 'Tags: %1$s', 'star' ) . '</span>', $tags_list );
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( __( 'Leave a comment', 'star' ), __( '1 Comment', 'star' ), __( '% Comments', 'star' ) );
			echo '</span>';
		}
		
		/* translators: % is the post title */
		edit_post_link( sprintf( __( 'Edit %s', 'star' ), get_the_title() ), '<span class="edit-link">', '</span>' );

		echo '<div class="byline">' . get_avatar( get_the_author_meta( 'ID' ), 60 ) . '<div class="author">' . esc_html( get_the_author() ) .'</div>' .
			 '<div class="author-link"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . __('View more posts by this author', 'star') . '</a></div></div>';


		/* Display jetpack's share if it's active*/
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display jetpack's like  if it's active */
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $star_custom_likes = new Jetpack_Likes;
		    echo $star_custom_likes->post_likes( '' );
		}

		echo '</footer><!-- .entry-footer -->';
	}
}
endif;




if ( ! function_exists( 'star_portfolio_footer' ) ) :

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function star_portfolio_footer() {

	if( get_theme_mod('star_hide_meta')=="" ){
		echo '<footer class="entry-footer">';

		global $post;

		echo '<a href="' . esc_url( home_url('/portfolio/') ) . '"><b>' . __('Portfolio','star') . '</b></a><br/><br/>'; 
		
		//the_terms( $id, $taxonomy, $before, $sep, $after ); 
		echo the_terms($post->ID, 'jetpack-portfolio-type', '<span class="jetpack-portfolio-type">' . __('Project Type: ','star') ,', ', '</span>');

		echo the_terms($post->ID, 'jetpack-portfolio-tag', '<span class="tags-links">' . __( 'Project Tags: ', 'star' ),', ', '</span>');
		
		/* translators: % is the post title */
		edit_post_link( sprintf( __( 'Edit %s', 'star' ), get_the_title() ), '<span class="edit-link">', '</span>' );


		/* Display jetpack's share if it's active*/
		if ( function_exists( 'sharing_display' ) ) {
			echo sharing_display();
		}

		/* Display jetpack's like  if it's active */
		if ( class_exists( 'Jetpack_Likes' ) ) {
		    $star_custom_likes = new Jetpack_Likes;
		    echo $star_custom_likes->post_likes( '' );
		}
		echo '</footer><!-- .entry-footer -->';
	}
}
endif;





/* Excerpts */

function star_excerpt_more( $more ) {
	global $id;
	return '&hellip; '. star_continue_reading( $id );
}
add_filter( 'excerpt_more', 'star_excerpt_more',100 );



function star_custom_excerpt_more( $output ) {
	if ( has_excerpt() && !is_attachment() ) {
		global $id;
		$output .= ' '. star_continue_reading( $id ); // insert a blank space.
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'star_custom_excerpt_more',100 );



function star_continue_reading( $id ) {
    return '<a class="continue" href="'.get_permalink( $id ).'">'. sprintf( __( 'Continue Reading %s', 'star' ), get_the_title( $id ) ) . '</a>';
}



if ( ! function_exists( 'the_archive_title' ) ) :


/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'star' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'star' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'star' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'star' ), get_the_date( _x( 'Y', 'yearly archives date format', 'star' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'star' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'star' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'star' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'star' ) ) );
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'star' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( __( '%1$s: %2$s', 'star' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = __( 'Archives', 'star' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;


if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function star_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'star_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'star_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so star_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so star_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in star_categorized_blog.
 */
function star_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'star_categories' );
}
add_action( 'edit_category', 'star_category_transient_flusher' );
add_action( 'save_post',     'star_category_transient_flusher' );

