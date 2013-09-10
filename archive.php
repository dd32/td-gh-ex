<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
get_header();
	get_template_part('navigation'); ?>
	<!-- Body -->
    <div id="body">
    	<div class="row">
        	<div id="content" class="col width-75">
            	<?php if(have_posts()) :
					if(is_category()) : ?>
						<h1 class="archive-title"><?php single_cat_title(); ?></h1>
                    <?php elseif(is_month()) : ?>
                    	<h1 class="archive-title"><?php the_time('F, Y'); ?></h1>
                    	<?php
                    endif;
					while(have_posts()) : the_post();   
						get_template_part('content', get_post_format()); 
					endwhile;
                    get_pagination();
            	else :
                    get_template_part('not-found');
                endif; ?>
            </div>
            <div id="sidebar" class="col width-25 last">
				<?php get_sidebar(); ?>
            </div>
        </div>
    </div>
	<!-- Body end -->
<?php get_footer(); ?>