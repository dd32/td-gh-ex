<?php get_header(); ?>
		<?php get_template_part('navigation'); ?>
    	<!-- BODY -->
    	<div id="body">
        	<div class="container row">
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