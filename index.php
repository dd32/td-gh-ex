<?php
/**
 * Default template file.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();

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
        
        do_action( 'batourslight_pagination' );
        
        endif;

	else :

		get_template_part( 'template-parts/contents/content', 'none');

	endif;
	?>

<?php

get_footer();
