<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/breadcrumb.php");?>

	<div id="contentfull">
    				
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <div class="post">
            	<h1><?php the_title(); ?></h1>
           		<div class="entry">
                	<?php the_content(__('Read more', 'studiopress'));?><div class="clear"></div>
                	<?php edit_post_link(__('(Edit)', 'studiopress'), '', ''); ?><div class="clear"></div>
            	</div>
            </div>
            
        <?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
                		
	</div>
 		    	
</div>

<?php get_footer(); ?>