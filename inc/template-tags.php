<?php

//----------------------------------------------------------------------
//  Posted on
//----------------------------------------------------------------------

if ( ! function_exists( 'aster_post_tag_list' ) ) {
	function aster_post_tag_list() {
		$tags_list = get_the_tag_list( '', __( ', ', 'aster' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'aster' ) . '</span>', $tags_list );
		}

	}
}


if ( ! function_exists( 'aster_posted_on' ) ) {
	function aster_posted_on() {
		?>
		<ul class="list-inline">
			<?php if ( ! get_theme_mod( 'aster_post_author_name' ) ): ?>
				<li>
                    <span class="author vcard">
                        <?php _e( 'By ', 'aster' );
                        printf( '<a class="url fn n" href="%1$s">%2$s</a>',
	                        esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	                        esc_html( get_the_author() )
                        ) ?>
                    </span>
				</li>

				<li>/</li>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'aster_post_date' ) ): ?>
				<li>
					<span class="posted-on"><?php the_time( 'M d, Y' ) ?></span>
				</li>

				<li>/</li>
			<?php endif; ?>

			<?php if ( ! get_theme_mod( 'aster_post_cat' ) ): ?>
				<?php if ( get_the_category_list() ): ?>
					<li>
                        <span class="posted-in">
                            <?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'aster' ) );
                            ?>
                        </span>
					</li>
				<?php endif; ?>
			<?php endif; ?>


		</ul>
		<?php
	}
}


//----------------------------------------------------------------------
//  Single Post navigation link. <- Previous post  |   Next Post ->
//----------------------------------------------------------------------

if ( ! function_exists( 'aster_post_navigation' ) ) {

	function aster_post_navigation() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
		<nav class="next-previous-post clearfix" role="navigation">
			<!-- Previous Post -->
			<div class="previous-post pull-left">
				<?php previous_post_link( '<div class="nav-previous">%link</div>', __( '<i class="fa fa-angle-left"></i> Previous Post', 'aster' ) ); ?>
			</div>

			<!-- Next Post -->
			<div class="next-post pull-right text-right">
				<?php next_post_link( '<div class="nav-next">%link</div>', __( 'Next Post <i class="fa fa-angle-right"></i>', 'aster' ) ); ?>
			</div>
		</nav><!-- .navigation -->
		<?php
	}
}


//----------------------------------------------------------------------
// Archive title
//----------------------------------------------------------------------

if ( ! function_exists( 'aster_archive_title' ) ) :

	function aster_archive_title( $before = '', $after = '' ) {
		if ( is_category() ) {
			$title = sprintf( __( 'Browse Category: <span>%s</span>', 'aster' ), single_cat_title( '', false ) );
		} elseif ( is_tag() ) {
			$title = sprintf( __( 'Browse Tag: <span>%s</span>', 'aster' ), single_tag_title( '', false ) );
		} elseif ( is_author() ) {
			$title = sprintf( __( 'Browse Author: <span>%s</span>', 'aster' ), '<span class="vcard">' . get_the_author() . '</span>' );
		} elseif ( is_year() ) {
			$title = sprintf( __( 'Browse Year: <span>%s</span>', 'aster' ), get_the_date( _x( 'Y', 'yearly archives date format', 'aster' ) ) );
		} elseif ( is_month() ) {
			$title = sprintf( __( 'Browse Month: <span>%s</span>', 'aster' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'aster' ) ) );
		} elseif ( is_day() ) {
			$title = sprintf( __( 'Browse Day: <span>%s</span>', 'aster' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'aster' ) ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'aster' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'aster' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = sprintf( __( 'Browse Archives: <span>%s</span>', 'aster' ), post_type_archive_title( '', false ) );
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
			$title = sprintf( __( '%1$s: %2$s', 'aster' ), $tax->labels->singular_name, single_term_title( '', false
			) );
		} else {
			$title = __( 'Archives', 'aster' );
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
	 * @param string $after Optional. Content to append to the description. Default empty.
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
function aster_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'aster_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'aster_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so aster_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so aster_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in aster_categorized_blog.
 */
function aster_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'aster_categories' );
}

add_action( 'edit_category', 'aster_category_transient_flusher' );
add_action( 'save_post', 'aster_category_transient_flusher' );
