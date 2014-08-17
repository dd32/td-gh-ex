<?php get_header(); ?>
<div id="content" class="container">
<div class="row breadcrumb-container">
	<?php wp_fanzone_breadcrumb(); ?>
</div>
	<div class="row">
		<article class="col-md-9">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <div id="page-heading">
                <h1><?php the_title(); ?></h1>		
            </div>
            <!-- END page-heading -->
            
            <div class="post clearfix">
            
                <div class="entry clearfix">	
                <?php the_content(); ?>
                <?php comments_template(); ?>  
                </div>
                <!-- END entry -->
                
            </div>
            <!-- END post -->
            
            <?php endwhile; ?>
            <?php endif; ?>
        </article>	  
	    <aside class="col-md-3">         
			<?php get_sidebar(); ?>
        </aside>
	</div>
</div>
<?php get_footer(); ?>