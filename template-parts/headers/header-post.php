<header class="entry-header">
	<?php
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'acuarela' ) );
	if ( $categories_list ) {
		echo '<div class="entry-meta"><span class="cat-links"><span class="genericon genericon-category" aria-hidden="true"></span>' . $categories_list . '</span></div>';
	}
	?>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>	
	<span class="byline">
	<?php
	// Translators: there is a space after "By".
	print( __( 'By ', 'acuarela' ) );
	printf('<a href="%1$s" class="entry-author" rel="author">%2$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	); ?>
	</span><!-- .byline -->
	<span class="entry-meta">
	<?php
	printf( '<a href="%1$s" rel="bookmark" class="entry-date"><span class="genericon genericon-time" aria-hidden="true"></span><time datetime="%2$s">%3$s</time></a>',
		esc_url( get_day_link( get_the_date( 'Y', $post->ID ), get_the_date( 'm', $post->ID ),get_the_date( 'd', $post->ID ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	edit_post_link( '<span class="genericon genericon-edit" aria-hidden="true"></span>' . __( 'Edit', 'acuarela' ) );
	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
		<span class="comments-link">
			<span class="genericon genericon-comment" aria-hidden="true"></span>
			<?php comments_popup_link( __( 'Leave a comment', 'acuarela' ), __( '1 Comment', 'acuarela' ), __( '% Comments', 'acuarela' ) ); ?>
		</span>
	<?php
	endif; ?>
	</span><!-- .entry-meta -->
</header><!-- .entry-header -->