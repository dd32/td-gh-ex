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

		if ( is_front_page() ) :
        
        echo 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
        
            while ( have_posts() ) : the_post();
		
			get_template_part( 'template-parts/contents/content', 'page');
            
            endwhile;
            
        else:

		/* Start the Loop */
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/contents/content', get_post_format());

		endwhile;
        
        do_action( 'batourslight_pagination' );
        
        	
		endif;

	else :

		do_action( 'batourslight_get_content_template', 'none' );

	endif;
	?>

<?php

get_footer();
