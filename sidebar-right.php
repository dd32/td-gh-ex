<?php
/**
 * Template Name: Right Sidebar Template
 *
 * This is the template that displays page with sidebar
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */
get_header(); ?>

		<div id="main" class="layout-978">
        	<div id="content" class="col8 no-margin-left">
            
			<?php while ( have_posts() ):the_post(); ?>
                
                <div <?php post_class(); ?> >
                
                    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
                    <?php the_content(); ?>
                    
                </div><!-- .post -->
            
           <?php endwhile; ?>
           		
                <div class="row-end"></div>
                    
        		<?php comments_template(); ?> 
        
        	</div><!-- #content -->
            
      	 	<?php get_sidebar(); ?>
            
		</div><!-- #main --> 
        
 		<?php get_footer(); ?> 