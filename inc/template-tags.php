<?php
/**
 * Custom template tags for this theme.
 *
 * @package Adagio Lite
 */
 
 if ( ! function_exists( 'adagio_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @return void
 */
function adagio_paging_nav( $max_num_pages = '' ) {
	// Get max_num_pages if not provided
	if ( '' == $max_num_pages )
		$max_num_pages = $GLOBALS['wp_query']->max_num_pages;

	// Don't print empty markup if there's only one page.
	if ( $max_num_pages < 2 ) {
		return;
	}
	?>

	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text">
    		<?php esc_html_e( 'Posts navigation', 'adagio-lite' ); ?>
  		</h1>
  		<div class="nav-links">
    		<?php if ( get_next_posts_link( '', $max_num_pages ) ) : ?>
    			<div class="nav-previous">
      				<?php next_posts_link( esc_html__( '', 'adagio-lite' ), $max_num_pages ); ?>
    			</div>
    		<?php endif; ?>
    		<?php if ( get_previous_posts_link( '', $max_num_pages ) ) : ?>
    			<div class="nav-next">
      				<?php previous_posts_link( esc_html__( '', 'adagio-lite' ), $max_num_pages ); ?>
    			</div>
    		<?php endif; ?>
  		</div>
  <!-- .nav-links --> 
	</nav>
<!-- .navigation -->
<?php
}
endif;