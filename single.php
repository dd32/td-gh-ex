<?php /* Arclite/digitalnature */ ?>
<?php get_header(); ?>

<!-- main wrappers -->
<div id="main-wrap1">
 <div id="main-wrap2">

  <!-- main page block -->
  <div id="main" class="block-content">
   <div class="mask-main rightdiv">
    <div class="mask-left">

     <!-- first column -->
     <div class="col1">
      <div id="main-content">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="navigation">
          <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
          <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
          <div class="clear"></div>
        </div>


        <!-- post -->
        <div id="post-<?php the_ID(); ?>" <?php if (function_exists("post_class")) post_class(); else print 'class="post"'; ?>>
           <?php if (!get_post_meta($post->ID, 'hide_title', true)): ?><h2 class="post-title"><?php the_title(); ?></h2><?php endif; ?>

              <div class="post-content clearfix">
    	       <?php the_content(__('Read the rest of this entry &raquo;', 'arclite')); ?>
              </div>
              <?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
              <?php
              $posttags = get_the_tags();
              if ($posttags) { ?>
              <p class="tags"> <?php the_tags(__('Tags:','arclite').' ', ', ', ''); ?></p>
              <div class="clear"></div>
              <?php } ?>
              <p class="post-metadata">
                    <?php
                      printf(__('This entry was posted on %s and is filed under %s. You can follow any responses to this entry through %s.', 'arclite'), get_the_time(get_option('date_format').', '.get_option('time_format')), get_the_category_list(', '), '<a href="'.get_post_comments_feed_link($post->ID).'" title="RSS 2.0">RSS 2.0</a>');  ?>

                    <?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
            		  // Both Comments and Pings are open
                      printf(__('You can <a href="#respond">leave a response</a>, or <a href="%s" rel="trackback">trackback</a> from your own site.', 'arclite'), trackback_url('',false));

            		 } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
            		  // Only Pings are Open
                      printf(__('Responses are currently closed, but you can <a href="%s" rel="trackback">trackback</a> from your own site.', 'arclite'), trackback_url('',false));

            		 } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
            		  // Comments are open, Pings are not
            		  _e('You can skip to the end and leave a response. Pinging is currently not allowed.','arclite');

            		 } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
            		  // Neither Comments, nor Pings are open
            		  _e('Both comments and pings are currently closed.','arclite');
            		} ?>
                    <?php edit_post_link(__('Edit this entry', 'arclite')); ?>
    		  </p>

        </div>
        <!-- /post -->

       <?php
        $post_count=get_post_meta($post->ID, 'post_count', true);
        $post_categories=get_post_meta($post->ID, 'show_posts_from_category', true);
        $post_tags=get_post_meta($post->ID, 'show_posts_with_tags', true);
        if (($post_categories) || ($post_tags)):
         $customfield_query = new WP_Query('postcount'.$post_count.'&cat='.$post_categories.'&tag='.$post_tags);
         while ($customfield_query->have_posts()) : $customfield_query->the_post(); ?>
          <!-- post -->
          <div id="post-<?php the_ID(); ?>" <?php if (function_exists("post_class")) post_class(); else print 'class="post"'; ?>>

            <div class="post-header">
             <h3 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link:','arclite'); echo ' '; the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
             <p class="post-date">
              <span class="month"><?php the_time(__('M','arclite')); ?></span>
              <span class="day"><?php the_time(__('j','arclite')); ?></span>
             </p>
             <p class="post-author">
              <span class="info"><?php printf(__('Posted by %s in %s','arclite'),'<a href="'. get_author_posts_url(get_the_author_ID()) .'" title="'. sprintf(__("Posts by %s","arclite"), attribute_escape(get_the_author())).' ">'. get_the_author() .'</a>',get_the_category_list(', '));
              ?> | <?php comments_popup_link(__('No Comments', 'arclite'), __('1 Comment', 'arclite'), __('% Comments', 'arclite'), 'comments', __('Comments off', 'arclite')); ?>  <?php edit_post_link(__('Edit','arclite'),' | '); ?>
              </span>
             </p>
            </div>

            <div class="post-content clearfix">
            <?php if(get_option('arclite_indexposts')=='excerpt') the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'arclite')); ?>

            <?php
             $posttags = get_the_tags();
             if ($posttags) { ?>
              <p class="tags"> <?php the_tags(__('Tags:','arclite').' ', ', ', ''); ?></p>
            <?php } ?>
            </div>

          </div>
          <!-- /post -->
        <?php
        endwhile;
       endif;
       ?>

    	<?php comments_template(); ?>
      <?php endwhile; else: ?>
        <p><?php _e("Sorry, no posts matched your criteria.","arclite"); ?></p>
      <?php endif; ?>
      </div>
     </div>
     <!-- /first column -->
     <?php get_sidebar(); ?>
     <?php include(TEMPLATEPATH . '/sidebar-secondary.php'); ?>

    </div>
   </div>
   <div class="clear-content"></div>
  </div>
  <!-- /main page block -->

 </div>
</div>
<!-- /main wrappers -->

<?php get_footer(); ?>
