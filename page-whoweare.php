<?php
/*
Template Name: Page-whoweare
*/
/**
 *
 * @author    Denis Franchi
 * @package   Avik
 * @version   1.1.0
 */

if(is_page()) { get_header('post'); } else { get_header(); } ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">      
		       <?php
		         while ( have_posts() ) :
			             the_post();
			             get_template_part( 'template-parts/content', 'page-whoweare' );
			     // If comments are open or we have at least one comment, load up the comment template.
			     if ( comments_open() || get_comments_number() ) :
				      comments_template();
			     endif;
		         endwhile; // End of the loop.
					 ?>      
		</main>
<?php
get_footer();
