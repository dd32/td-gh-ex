<?php get_header(); ?>
		<?php get_template_part('navigation'); ?>
    	<!-- BODY -->
    	<div id="body">
        	<div class="container row">
            	<!-- HEADING -->
            	<?php if(is_category()) : ?>
					<h1 class="large category-archive-results"><?php single_cat_title(); ?></h1>
				<?php elseif(is_month()) : ?>
					<h1 class="large date-archive-results"><?php the_time('F, Y'); ?></h1>
				<?php elseif(is_author()) : ?>
					<h1 class="large author-archive-results"><?php the_author(); ?></h1>
				<?php endif; ?>
                <!-- HEADING END -->
            	<!-- CONTENT -->
            	<div id="content" class="col width-75">
					<?php if (have_posts()) :
                        while (have_posts()) : the_post();
							get_template_part('content', get_post_format());                        
                        	comments_template();
                        endwhile;
						autoadjust_pagination();
					else :
						get_template_part('not-found');
					endif; ?>
                </div>
                <!-- CONTENT END -->
				<?php get_sidebar(); ?>
            </div>
        </div>
        <!-- BODY END --> 
<?php get_footer(); ?>