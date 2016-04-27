<?php

/* 	Design Theme's Single Page to display Single Page or Post
	Copyright: 2012-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Design 1.0
*/


get_header(); ?>
<div class="pagenev"><div class="conwidth"><?php design_breadcrumbs(); ?></div></div>

<div id="container">

<div id="content">
          
		  <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
          
            <h1 class="page-title"><?php the_title(); ?></h1>
            <span class="postmetadata"><h3><?php the_time('F j, Y'); ?></h3><div class="content-ver-sep"> </div><h2><?php echo __('By:', 'd5-design'); ?><?php the_author_posts_link() ?></h2><h5> <?php comments_popup_link(__('No Comments &#187;', 'd5-design'), __('1 Comment &#187;', 'd5-design'), __('% Comments &#187;', 'd5-design')); ?></h5><?php echo __('Posted in', 'd5-design'); ?> <?php the_category(', ') ?><?php the_tags('<br />'. __('Tags: ', 'd5-design'), ', ', '<br />'); ?><h5><?php edit_post_link(__('Edit This Post', 'd5-design')); ?></h5></span>
            <div class="entrytext"><div class="thumb"><?php the_post_thumbnail(); ?></div>
			<?php the_content(); ?>
            </div>
            <div class="clear"> </div>
            <div class="up-bottom-border">
            <div class="content-ver-sep"></div><br />
			<?php  wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __('Pages:','d5-design') . '</span>', 'after' => '</div>' ) ); ?>
           <div class="floatleft"><?php previous_post_link('&laquo; %link'); ?></div>
			<div class="floatright"><?php next_post_link('%link &raquo;'); ?></div><br /><br />
            <?php if ( is_attachment() ): ?>
            <div class="floatleft"><?php previous_image_link( false, __('&laquo; Previous Image','d5-design') ); ?></div>
			<div class="floatright"><?php next_image_link( false, __('Next Image &raquo;','d5-design') ); ?></div> 
            <?php endif; ?>
          	</div>
			 <div class="content-ver-sep"></div><br />
			<?php endwhile;?>
          	            
          <!-- End the Loop. -->          
        	
			<?php comments_template(); ?>
            
</div>			
<?php get_sidebar(); ?>
<?php get_footer(); ?>