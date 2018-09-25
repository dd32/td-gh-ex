<?php
/**
 * Default template file.
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
	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
		
			?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php
			
		endif;

		/* Start the Loop */
		while ( have_posts() ) :
		
			the_post();

			get_template_part( 'template-parts/contents/content', get_post_format());

		endwhile;
        
        if ( !is_author() ):
        
        do_action( 'bathemos_pagination' );
        
        endif;

	else :

		get_template_part( 'template-parts/contents/content', 'none');

	endif;
	?>

<?php

// Get container closing part.
do_action( 'bathemos_get_container', 'after' );

// Get page footer.
do_action( 'bathemos_get_footer' );