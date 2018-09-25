<?php
/**
 * Page template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BA Tours
 */

$page_custom_layout = apply_filters( 'bathemos_page_option', '', 'layout' );

$page_custom_layout = $page_custom_layout == 'default' || !$page_custom_layout ? 'no-sidebars-wide' : $page_custom_layout;

// Set layout for this template.
do_action( 'bathemos_get_layout', $page_custom_layout );

// Init page layout and parts.
do_action( 'bathemos_init_page' );

// Get page header.
do_action( 'bathemos_get_header' );

// Get container opening part.
do_action( 'bathemos_get_container', 'before' );

?>

	<?php
	while ( have_posts() ) :
	
		the_post();

		get_template_part( 'template-parts/contents/content', 'to_book');

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
		
			comments_template('/comments-to_book.php');
			
		endif;

	endwhile; // End of the loop.
	?>

<?php

// Get container closing part.
do_action( 'bathemos_get_container', 'after' );

// Get page footer.
do_action( 'bathemos_get_footer' );