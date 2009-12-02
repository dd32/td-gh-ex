<?php get_header(); ?>

<div id="content">
	
<?php include(TEMPLATEPATH."/breadcrumb.php");?>

<?php sidebar_alt(); ?> 

	<?php sp_content_div(); ?>
                                        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
            <div <?php post_class(); ?>>
            
                <div class="category">
                    <p><?php the_category(', ') ?></p>
                </div>
                
           		<div class="entry">
                    <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                    <div class="author">
                        <p><?php _e("Posted by", 'studiopress'); ?> <?php the_author_posts_link(); ?>  &middot; <a rel="nofollow" href="<?php the_permalink(); ?>#respond"><?php comments_number(__('Leave a Comment', 'studiopress'), __('1 Comment', 'studiopress'), __('% Comments', 'studiopress')); ?></a>&nbsp;<?php edit_post_link(__('(Edit)', 'studiopress'), '', ''); ?></p> 
                    </div>
                    <?php the_content(__('Read more of this post', 'studiopress'));?><div class="clear"></div>
                </div>
                                    
                <div class="postmeta">
                    <p><?php the_time('F j, Y'); ?> &middot; <?php _e("Tagged with", 'studiopress'); ?> <?php the_tags('') ?></p>
                </div>
                
            </div>
                
        <?php endwhile; else: ?>
                
        <p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
        
        <div class="navlink">
			<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page', 'studiopress'), __('Next Page &raquo;', 'studiopress')); ?></p>
        </div>
                
	</div>
				
<?php get_sidebar(); ?>
			
</div>

<?php get_footer(); ?>