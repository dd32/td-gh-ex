<?php
/**
 * Prints HTML with meta information for the categories, tags and comments.
 *
 */


// Hide category and tag text for pages.
if ( 'post' === get_post_type() ) {

	$categories_list = get_the_category_list( esc_html__( ', ', 'ba-tours-light' ) );

	if ( $categories_list ) {
		/* translators: %1$s: category list. */
		printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'ba-tours-light' ) . '</span>', wp_kses_post($categories_list) );
	}

	$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ba-tours-light' ) );
	
	if ( $tags_list ) {
		/* translators: %1$s: tag list. */
		printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'ba-tours-light' ) . '</span>', wp_kses_post( $tags_list ) );
	}
}


if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
	
	echo '<span class="comments-link">';
	
	comments_popup_link(
		sprintf(
			wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'ba-tours-light' ),
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
			__( 'Edit <span class="screen-reader-text">%s</span>', 'ba-tours-light' ),
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