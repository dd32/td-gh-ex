<?php
/**
 * Template Name: Full-width, w/ footer widgets
 * Description: A full-width template with footer widget section
 */
get_header(); ?>

    <div id="content" class="clearfix full-width-content">
        
        <div id="main" class="clearfix" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

        </div>
        
    </div>
    
    <?php get_sidebar('footer'); ?>

<?php get_footer(); ?>