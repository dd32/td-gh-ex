<?php
/**
 * Template Name: Full-width Page
 *
 * @package mwsmall
 */

 get_header();?>

<section id="primary" class="container content-area col-md-12 col-sm-12">

		<main id="main" class="site-main" role="main">
		
		<?php while ( have_posts()) : the_post(); 
		
			get_template_part( 'content', 'page' ); 
		
		?>
	
		<?php comments_template('', true); ?>
		
		<?php endwhile; ?>
		
		</main><!-- #main -->
	
</section><!--/.primary -->

<?php get_footer(); ?>