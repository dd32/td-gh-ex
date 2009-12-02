<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/breadcrumb.php");?>

<?php sidebar_alt(); ?>

	<?php sp_content_div(); ?>
                            
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
            <div class="post">
            
                <div class="category">
                    <p><?php the_category(', ') ?></p>
                </div>
                
           		<div class="entry">
                                                
                    <h1><?php the_title(); ?></h1>
                        
                    <div class="author">
                        <p><?php _e("Posted by", 'studiopress'); ?> <?php the_author_posts_link(); ?>  &middot; <a rel="nofollow" href="<?php the_permalink(); ?>#respond"><?php comments_number(__('Leave a Comment', 'studiopress'), __('1 Comment', 'studiopress'), __('% Comments', 'studiopress')); ?></a>&nbsp;<?php edit_post_link(__('(Edit)', 'studiopress'), '', ''); ?></p> 
                    </div>
               
                    <?php the_content(__('Read more', 'studiopress'));?><div class="clear"></div>
                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                
                    <!--
                    <?php trackback_rdf(); ?>
                    -->
                
                </div>
                    
                <div class="postmeta">
                    <p><?php the_time('F j, Y'); ?> &middot; <?php _e("Tagged with", 'studiopress'); ?> <?php the_tags('') ?></p>
                </div>
                                
            </div>
            
            <div class="authorbox">
                <p><?php echo get_avatar( get_the_author_email(), '70' ); ?><strong><?php _e("About", 'studiopress'); ?> <?php the_author(); ?></strong><br /><?php the_author_meta( 'description' ); ?></p>
                <div class="clear"></div>
            </div>
                                            
            <?php endwhile; else: ?>
                
            <p><?php _e('Sorry, no posts matched your criteria.', 'studiopress'); ?></p><?php endif; ?>
            <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page', 'studiopress'), __('Next Page &raquo;', 'studiopress')); ?></p>
                        
		<?php // begin code which disables comments if you select that option on the theme options page ?>    
		<?php if(sp_get_option('comments_posts') == 'No') { ?>
            <div class="comments">
                <div class="comments-headline">
					<?php _e("Comments", 'studiopress'); ?>
                </div>                
            	<?php comments_template('',true); ?>
            </div>
		<?php } else { ?>
		<?php } ?>
		<?php // end code  ?>               
                                    
    </div>
		
<?php get_sidebar(); ?>
			
</div>

<?php get_footer(); ?>