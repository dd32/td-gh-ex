<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <div class="post-thumb">
   <?php abaya_post_thumbnail(); ?>
    </div><!--post-thumb-->
      <div class="entry-header">
        <h3 class="entry-title"><?php abaya_post_title(); ?></h3>
         <div class="entry-meta">
               <ul>
                  <li><?php _e('Posted On','abaya');  the_time( get_option( 'date_format' ) ); ?> , <?php _e('By','abaya') ?></li>
                  <li><?php the_author_posts_link(); ?></li>
                  <li><?php the_tags(); ?></li>
                  <li><?php comments_number(__('No Comments','abaya'), __('One Comment', 'abaya'), __('% Comments', 'abaya') );?></li>
               </ul>
          </div><!--entry-meta-->
               </div><!--entry-header-->
               <div class="entry-content">
               <?php if ( is_single() ) : the_content(); 
			    wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">'.__( 'Pages:', 'abaya').'</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
			   else : ?>
                 <?php the_excerpt(); ?>
                  <a href="<?php the_permalink(); ?>" class="btn" id="blog-btn"><?php _e('Read More','abaya'); ?></a>
                  <?php endif; ?>
               </div><!--entry-content-->
             </div><!--post-->