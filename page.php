<?php
 /* Arclite/digitalnature */
 get_header();
?>

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
        <div id="post-<?php the_ID(); ?>" <?php if (function_exists("post_class")) post_class(); else print 'class="post"'; ?>>
         <?php if (!get_post_meta($post->ID, 'hide_title', true)): ?><h2 class="post-title"><?php the_title(); ?></h2><?php endif; ?>
        <div class="post-content clearfix">
         <?php the_content(__('Read the rest of this page &raquo;', 'arclite')); ?>
         <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
         <?php edit_post_link(__('Edit this entry', 'arclite')); ?>
        </div>
        </div>
       <?php endwhile; endif; ?>

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

      </div>
     </div>
     <!-- /first column -->
     <?php
       if(!is_page_template('page-nosidebar.php')):
        get_sidebar();
        include(TEMPLATEPATH . '/sidebar-secondary.php');
       endif;
     ?>

    </div>
   </div>
   <div class="clear-content"></div>
  </div>
  <!-- /main page block -->

 </div>
</div>
<!-- /main wrappers -->

<?php get_footer(); ?>