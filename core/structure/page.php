<?php
/**
 * Template functions used for the site pages.
 */
//PAGE HEADER
if ( ! function_exists( 'igthemes_page_header' ) ) {
    function igthemes_page_header() { ?>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
    <?php  }
}
//PAGE CONTENT
if ( ! function_exists( 'igthemes_page_content' ) ) {
    function igthemes_page_content() { ?>
    <?php if ( has_post_thumbnail() ) :
        the_post_thumbnail('large');
    endif; ?>
	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'basic-shop' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
    <?php  }
}
//PAGE FOOTER
if ( ! function_exists( 'igthemes_page_footer' ) ) {
    function igthemes_page_footer() { ?>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'basic-shop' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
    <?php  }
}