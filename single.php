<?php
/**
 * Single post template file.
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
	while ( have_posts() ) :

		the_post();

		get_template_part( 'template-parts/contents/content', get_post_type());

		the_post_navigation( array(
			'prev_text'          => __( 'Previous post: %title', 'ba-tours-light' ),
			'next_text'          => __( 'Next post: %title', 'ba-tours-light' ),
			'in_same_term'       => false,
			'screen_reader_text' => __( 'Continue reading', 'ba-tours-light' ),
        ) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
		
			comments_template();
			
		endif;

	endwhile; // End of the loop.
	?>

<?php
// Get container closing part.
do_action( 'bathemos_get_container', 'after' );

// Get page footer.
do_action( 'bathemos_get_footer' );