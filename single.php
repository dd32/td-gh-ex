<?php get_header(); ?>
<div id="content-wrap">
<div id="content">
<div class="gap">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','ayumi') ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <p class="meta2"><span class="catr"><?php _e('Posted in','ayumi') ?> <?php the_category(', ') ?></span> <span class="date"><?php _e('on','ayumi') ?> <?php the_time('M d, Y') ?></span> <?php edit_post_link(__('Edit','ayumi'), '<span class="editr">', '</span>'); ?></span>
</p>
	<div class="entry">
      <?php the_content('<p class="serif">'.__('Read the rest of this entry','ayumi').' &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:','ayumi').' </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
      <?php if(function_exists('the_tags')): ?>
  <div class="tags"><?php the_tags(__('Tags: ','ayumi'), ', ', ''); ?></div>
  <?php endif; ?>

</div>

	<?php comments_template('', true); ?>

  <?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.','ayumi') ?></p>
  <?php endif; ?>

  <div class="navigation">
    <div class="alignleft">
      <?php previous_post_link('&larr; %link') ?>
    </div>
    <div class="alignright">
      <?php next_post_link('%link &rarr;') ?>
    </div>
  </div>
 
</div>
</div>
<br class="clear" />  
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
