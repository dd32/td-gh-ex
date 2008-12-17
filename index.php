<?php get_header(); ?>

<div id="content-wrap">
<div id="content" class="front">
<div class="gap">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','ayumi') ?> <?php the_title(); ?>"><?php the_title(); ?></a> &#8226; <span class="date"><?php the_time('m.d.y') ?></span></h2>
	<div class="entry">
      <?php the_content(__('More &rarr;','ayumi') ); ?>
    </div>

  <?php if(function_exists('the_tags')): ?>
  <div class="tags"><?php the_tags(__('Tags: ','ayumi'), ', ', ''); ?></div>
  <?php endif; ?>
    
<p class="meta2"><span class="catr"><?php _e('Posted in','ayumi') ?> <?php the_category(', ') ?></span><?php edit_post_link(__('Edit','ayumi'), ' <span class="editr">', '</span> '); ?><span class="commr"><?php _e('with','ayumi')?> <?php comments_popup_link(__('No Comments &rarr;','ayumi'), __('1 Comment &rarr;','ayumi'), __('% Comments &rarr;','ayumi')); ?></span> 
</p>
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
  <h2 class="center"><?php _e('Not Found','ayumi') ?></h2>
  <p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.','ayumi') ?></p>
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
  <?php endif; ?>

</div>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
