<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package altitude-lite
 */

if ( ! function_exists( 'altitude_lite_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function altitude_lite_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' / %s ', 'post date', 'altitude-lite' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'altitude_lite_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function altitude_lite_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s ', 'post author', 'altitude-lite' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
	}
endif;

if ( ! function_exists( 'altitude_lite_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function altitude_lite_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'altitude-lite' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'altitude-lite' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'altitude-lite' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'altitude-lite' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'altitude-lite' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'altitude-lite' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'altitude_lite_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function altitude_lite_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

	<?php else : ?>

		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
	<?php
			the_post_thumbnail(
				'post-thumbnail',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
	?>
		</a>

	<?php
	endif; // End is_singular().
	}
endif;


/**
 * Replaces "[...]" with Read More
 *
 * @param string $excerpt Read more value for excerpt.
 */
function altitude_lite_excerpt_read_more( $excerpt ) {
	$post     = get_post();
	$excerpt .= '<a class="excerpt-more" href="' . get_permalink( $post->ID ) . '">' . esc_html( 'Read More', 'sentient' ) . '<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>';
	return $excerpt;
}
add_filter( 'the_excerpt', 'altitude_lite_excerpt_read_more' );

/**
 * Replaces "[...]"
 */
function altitude_lite_excerpt_more() {
	 return '';
}
add_filter( 'excerpt_more', 'altitude_lite_excerpt_more' );

/**
 * Excerpt length for blog page
 *
 * @param array $length Excerpt length.
 */
function altitude_lite_blog_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'altitude_lite_blog_excerpt_length' );


function altitude_lite_address() {
	$altitude_lite_header_address = get_theme_mod( 'header_address' );
	if ( ! empty( $altitude_lite_header_address ) ) {
		?>
		<a href="https://maps.google.com/?q=<?php echo esc_html( $altitude_lite_header_address, 'altitude-lite' ); ?>">
		<span class="address"> <i class="icon-location" id="header-icon-location"> </i> <?php echo esc_html( $altitude_lite_header_address, 'altitude-lite' ); ?> </span>
	</a>
		<?php
	}
}

function altitude_lite_phone() {
	$altitude_lite_header_phone = get_theme_mod( 'header_phone' );
	if ( ! empty( $altitude_lite_header_phone ) ) {
		?>
		<a href="tel:<?php echo esc_html( $altitude_lite_header_phone, 'altitude-lite' ); ?>">
		<span class="phone"> <i class="icon-phone" id="header-icon-phone"></i> <?php echo esc_html( $altitude_lite_header_phone, 'altitude-lite' ); ?> </span>
	</a>
		<?php
	}
}

function altitude_lite_email() {
	$altitude_lite_header_email = get_theme_mod( 'header_email' );
	if ( ! empty( $altitude_lite_header_email ) ) {
		?>
		<a href="mailto:<?php echo esc_html( $altitude_lite_header_email, 'altitude-lite' ); ?>">
		<span class="email"> <i class="icon-mail" id="header-icon-mail"></i>
		<?php echo esc_html( $altitude_lite_header_email, 'altitude-lite' ); ?> </span>
	</a>
		<?php
	}
}

function altitude_lite_custom_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
   <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
	<?php
	if ( 'div' != $args['style'] ) {
		?>
		<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<?php
	}
	?>
	<div class="row">
		<div class="comment-author vcard altitude-lite-cmt-author-img">
	<?php
	if ( $args['avatar_size'] != 0 ) {
		echo get_avatar( $comment, $args['avatar_size'] );
	}
	?>
		</div>
		<div class="comment-content">

			<div class="comment-author vcard altitude-lite-cmt-author-meta">
				<?php
				printf( __( '<p class=" altitude-lite-author-name"><strong class="fn">%s</strong></p>', 'altitude-lite' ), get_comment_author_link() );
				?>
				<em class="comment-meta commentmetadata altitude-lite-cmt-date"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s - %2$s', 'altitude-lite' ), get_comment_date(), get_comment_time() );
					?>
				</a><?php edit_comment_link( __( '(Edit)', 'altitude-lite' ), '  ', '' ); ?>
				</em>
			</div>
	<?php
	if ( $comment->comment_approved == '0' ) {
		?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'altitude-lite' ); ?></em><br/>
		<?php
	}
	?>
			<div class="altitude-lite-comment-text">
				<?php comment_text(); ?>
			</div>

			<div class="reply altitude-lite-cmt-reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>
			</div>
		</div>
	</div>
	<?php
	if ( 'div' != $args['style'] ) :
		?>
	</div>
		<?php
	endif;
}
