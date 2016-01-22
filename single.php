<?php

/* 	Small Business Theme's Single Page to display Single Page or Post
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Small Business 1.0
*/


get_header(); ?>

<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?> <h3 class="subtitle"><?php echo get_post_meta($post->ID, 'sb_subtitle', 'true'); ?></h3>
            <h1 class="page-title"><?php the_title(); ?></h1>
            <p class="postmetadataw"><?php _e('Posted by:', 'small-business'); ?> <?php the_author_posts_link() ?> | on <?php the_time('F j, Y'); ?></p>
                        
            <div class="content-ver-sep"> </div>
            <div class="entrytext"><?php the_post_thumbnail('category-thumb'); ?>
			<?php the_content(); ?>
            
            <div class="clear"> </div>
            <div class="up-bottom-border">
            <p class="postmetadata"><?php _e('Posted in', 'small-business'); ?> <?php the_category(', ') ?> | <?php edit_post_link(__('Edit', 'small-business'), '', ' | '); ?>  <?php comments_popup_link(__('No Comments &#187;', 'small-business'), __('1 Comment &#187;', 'small-business'), __('% Comments &#187;'.'small-business')); ?> <?php the_tags(__('<br />Tags: ','small-business'), ', ', '<br />'); ?></p>
            <?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages:', 'small-business') . '</span>', 'after' => '</div>' ) ); ?>
            <div class="content-ver-sep"> </div>
            <div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br />
             <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, __('&laquo; Previous Image','small-business') ); ?></div>
			<div class="floatright"><?php next_image_link( false, __('Next Image &raquo;','small-business') ); ?></div> 
            <?php endif; ?>
          	</div></div>
			
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php comments_template( '', true ); ?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>