<?php
/**
 * Template Name: Full-width, no sidebar
 * Description: A full-width template with no sidebar
 */
 ?>
<?php get_header(); ?>
<div id="content">
	<div class="row">
    	
		<article class="col-md-12">
        	<div class="row breadcrumb-container">
				<?php wp_newsstream_breadcrumb(); ?>
            </div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
                <div id="page-heading">
                    <h1><?php the_title(); ?></h1>		
                </div>
                <!-- END page-heading -->
                <div class="post_box" >
                <div class="post clearfix">
                
                    <div class="entry clearfix">	
                    <?php the_content(); ?>
                    <?php comments_template(); ?>  
                    </div>
                    <!-- END entry -->
                    
                </div>
            <!-- END post -->
            	</div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </article>	  
	</div>
</div>
<?php get_footer(); ?>