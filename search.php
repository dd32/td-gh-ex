<?php
/**
 * Search results page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BA Tours
 */


// Set layout for this template.
do_action( 'bathemos_get_layout', 'default' );

// Init page layout and parts.
do_action( 'bathemos_init_page' );

// Get page header.
do_action( 'bathemos_get_header' );

// Get container opening part.
do_action( 'bathemos_get_container', 'before' );

?>

	<?php if ( have_posts() ) : ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: search query. */
				printf( esc_html__( 'Search results for: %s', 'ba-tours-light' ), '<span>' . get_search_query() . '</span>' );
				?>
			</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) :
		
			the_post();
                       
            get_template_part( 'template-parts/contents/content', 'search');

		endwhile;

		the_posts_navigation();

	else :
    
        get_template_part( 'template-parts/contents/content', 'none');

	endif;
	?>

<?php

// Get container closing part.
do_action( 'bathemos_get_container', 'after' );

// Get page footer.
do_action( 'bathemos_get_footer' );