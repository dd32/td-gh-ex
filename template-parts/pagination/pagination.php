<?php
/**
 * Script to show pagination.
 *
 * @package Academib Hub
 */

global $wp_query;
$big = 9999999999;

// if only have one page don't show pagination.
if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<nav class="navigation pagination">
	<span class="screen-reader-text"><?php echo esc_html__( 'Posts Navigation', 'academic-hub' ); ?></span>
	<!-- /.screen-reader-text -->
	<div class="nav-links">
		<?php
		$args = array(
			'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'             => '?paged=%#%',
			'current'            => max( 1, get_query_var( 'paged' ) ),
			'total'              => $wp_query->max_num_pages,
			'before_page_number' => '<span class="screen-reader-text">' . esc_html__( 'Page', 'academic-hub' ) . '</span>',
			'next_text'          => esc_html__( 'Next', 'academic-hub' ),
			'prev_text'          => esc_html__( 'Previous', 'academic-hub' ),
			'mid_size'           => 4,
		);

		//pagantion
		echo paginate_links( $args ); // WPCS xss ok.
		?>
	</div>
	<!-- /.nav-links -->
</nav>
<!-- /.navigation pagination -->