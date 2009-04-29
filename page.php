<?php /* Arclite/digitalnature */ ?>
<?php get_header(); ?>



   <div id="main-wrap1">
    <div id="main-wrap2">
     <div id="main" class="block-content">
      <div class="mask-main rightdiv">
       <div class="mask-left">
        <div class="col1">
          <div id="main-content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <?php if (function_exists("post_class")) { ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <?php } else { ?>
    <div class="post" id="post-<?php the_ID(); ?>">
   <?php } ?>
     <?php if (!get_post_meta($post->ID, 'hide_title', true)): ?><h2 class="left"><?php the_title(); ?></h2><?php endif; ?>
     <p class="right"><span class="editlink page"><?php edit_post_link(''); ?></span></p>
     <div class="clear"></div>
     <div class="entry clearfix">
      <?php the_content(__('Read the rest of this page &raquo;', 'arclite')); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
     </div>
    </div>
   <?php endwhile; endif; ?>
   <?php comments_template(); ?>




       </div>

         </div>

<?php get_sidebar(); ?>

  </div>
      </div>
      <div class="clear-content"></div>
     </div>


    </div>
   </div>

  </div>

<?php get_footer(); ?>