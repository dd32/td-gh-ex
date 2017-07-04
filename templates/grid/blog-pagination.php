<?php global $wp_query; ?>

<nav class="blog-pagination clear-fix <?php echo ashe_options( 'blog_page_post_pagination' ); ?>" data-max-pages="<?php echo esc_attr( $wp_query->max_num_pages ); ?>" data-loading="<?php esc_attr_e( 'Loading...', 'ashe' ); ?>" >

<?php

// Default Pagination
if ( ashe_options( 'blog_page_post_pagination' ) === 'default' ) {

	echo '<div class="previous-page">';
		next_posts_link( '<i class="fa fa-long-arrow-left"></i>&nbsp;'.esc_html__( 'Older Posts', 'ashe' )  );
	echo '</div>';

	echo '<div class="next-page">';
		previous_posts_link( esc_html__( 'Newer Posts', 'ashe' ).'&nbsp;<i class="fa fa-long-arrow-right"></i>' );
	echo '</div>';

// Numeric Pagination
} elseif ( ashe_options( 'blog_page_post_pagination' ) === 'numeric' ) {
	the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '<i class="fa fa-long-arrow-left"></i>', 'next_text' => '<i class="fa fa-long-arrow-right"></i>' ) );

// Load More / Infinite Scroll
} else {
	next_posts_link( esc_html__( 'Load More', 'ashe' ) );
}

?>

</nav>