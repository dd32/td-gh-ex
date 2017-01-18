<?php $post_class=array('post','hentry'); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
   <div class="post-thumb">
   <?php abaya_post_thumbnail(); ?>
    </div><!--post-thumb-->
      <div class="entry-header">
        <h3 class="entry-title"><?php abaya_post_title(); ?></h3>
         <div class="entry-meta">
               <ul>
                  <li><?php _e('Posted On','abaya'); the_time('F j, Y') ?> , <?php _e('By','abaya') ?></li>
                  <li><?php the_author_posts_link(); ?></li>
                  <li><?php the_tags(); ?></li>
                  <li><?php comments_number(__('No Comments','abaya'), __('One Comment', 'abaya'), __('% Comments', 'abaya') );?></li>
               </ul>
          </div><!--entry-meta-->
               </div><!--entry-header-->
               <div class="entry-content">
               <?php if ( is_single() ) : the_content(); else : ?>
                 <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>" class="btn" id="blog-btn"><?php _e('Read More','abaya'); ?></a>
                  <?php endif; ?>
               </div><!--entry-content-->
             </div><!--post-->