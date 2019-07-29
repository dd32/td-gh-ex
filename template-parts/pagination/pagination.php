<?php
	/**
	 * Pagination for blog.
	 */

	global $wp_query;
	$apex_business_big = 999999999; // need an unlikely integer

	if ( $wp_query->max_num_pages <= 1 ) {
	    return;
	}
?>
<div class="container">
	<div class="row">
		<div class="nine columns">
			<div class="navigation post-pagination" role="navigation">
			    <div class="nav-links">
			        <?php
						the_posts_pagination( array(
							'base' => str_replace( $apex_business_big, '%#%', esc_url(get_pagenum_link( $apex_business_big ) ) ),
							'format' => '?paged=%#%',
							'add_args' => false,
							'current' => max( 1, get_query_var( 'paged' ) ),
							'total' => $wp_query->max_num_pages,
							'mid_size' => 4,
							'prev_text' => esc_html__( 'Prev', 'apex-business' ),
							'next_text' => esc_html__( 'Next', 'apex-business' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'apex-business' ) . ' </span>',
						) );
			        ?>
			    </div>
			</div>
		</div><!-- /.nine columns -->
	</div>
</div><!-- /.container -->

