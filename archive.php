<?php
/**
 * Archive pages.
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

	<?php
	if ( have_posts() ) : ?>

		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/contents/content', get_post_format());

		endwhile;
        
        do_action( 'bathemos_pagination' );

	else :

		get_template_part( 'template-parts/contents/content', 'none');

	endif; ?>

<?php

// Get container closing part.
do_action( 'bathemos_get_container', 'after' );

// Get page footer.
do_action( 'bathemos_get_footer' );