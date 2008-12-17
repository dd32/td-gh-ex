<?php get_header(); ?>

<div id="content-wrap">
<div id="content">
<div class="gap">
  <?php if (have_posts()) : ?>
  <h2 class="pagetitle"><?php _e('Search Results','ayumi') ?></h2>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','ayumi') ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <p class="meta2"><span class="catr"><?php _e('Posted in','ayumi') ?> <?php the_category(', ') ?></span> <span class="date"><?php _e('on','ayumi') ?> <?php the_time('M d, Y') ?></span> <span class="commr"><?php _e('with','ayumi') ?> <?php comments_popup_link(__('No Comments &rarr;','ayumi'), __('1 Comment &rarr;','ayumi'), __('% Comments &rarr;','ayumi')); ?></span> <?php edit_post_link(__('Edit','ayumi'), '<span class="editr">', '</span>'); ?></span>
</p>
  <div class="entry">
  <?php the_content('<p class="serif">'.__('Read the rest of this entry','ayumi').' &raquo;</p>'); ?>
    <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','ayumi').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>
  <?php if(function_exists('the_tags')): ?>
  <div class="tags"><?php the_tags(__('Tags: ','ayumi'), ', ', ''); ?></div>
  <?php endif; ?>

</div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&larr; '.__('Previous Entries','ayumi')) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Next Entries','ayumi').' &rarr;') ?>
    </div>
  </div>
  <?php else : ?>
    <div class="post">
  <h2><?php _e('No posts found. Try a different search?','ayumi') ?></h2>
  <p><?php include (TEMPLATEPATH . '/searchform.php'); ?></p>
  </div>
  <?php endif; ?>

</div>
</div>
</div>
  
<?php get_sidebar(); ?>
<?php get_footer(); ?>
