<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/breadcrumb.php");?>
    
<?php sidebar_alt(); ?>

	<?php sp_content_div(); ?>
                        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
            <div class="post">
                <div class="entry">            
                	<h1><?php the_title(); ?></h1>
                	<?php the_content(__('Read more', 'studiopress'));?><div class="clear"></div>
                	<?php edit_post_link(__('(Edit)', 'studiopress'), '', ''); ?><div class="clear"></div>
                </div>
            </div>
                
        <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
                                    
	<?php // begin code which disables comments if you select that option on the theme options page ?>    
	<?php if(sp_get_option('comments_pages') == 'No') { ?>
        <div class="comments">
            <?php comments_template('',true); ?>
        </div>
	<?php } else { ?>
	<?php } ?>
	<?php // end code  ?> 
        
    </div>
            		    
<?php get_sidebar(); ?>
			
</div>

<?php get_footer(); ?>