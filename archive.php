<?php get_header(); ?>

<div id="content-wrap">
<div id="content">
<div class="gap">

  <?php if (have_posts()) : ?>
  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
  <?php /* If this is a category archive */ if (is_category()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for the','ayumi') ?> &#8216;<?php echo single_cat_title(); ?>&#8217;</h2>
  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for','ayumi') ?>
    <?php the_time('F jS, Y'); ?>
  </h2>
  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for','ayumi') ?>
    <?php the_time('F, Y'); ?>
  </h2>
  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
  <h2 class="pagetitle"><?php _e('Archive for','ayumi') ?>
    <?php the_time('Y'); ?>
  </h2>
  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
  <h2 class="pagetitle"><?php _e('Author Archive','ayumi') ?></h2>
  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
    <h2 class="pagetitle"><?php _e('Blog Archives','ayumi') ?></h2>
    <?php } ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&larr; '.__('Previous Entries','ayumi')) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link( __('Next Entries','ayumi').' &rarr;') ?>
    </div>
  </div>
  <?php while (have_posts()) : the_post(); ?>
  <div class="post">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','ayumi') ?> <?php the_title(); ?>"><?php the_title(); ?></a> &#8226; <span class="date"><?php the_time('m.d.y') ?></span></h2>
    <div class="entry">
      <?php the_content() ?>
    </div>
    
	<?php if(function_exists('the_tags')): ?>
	<div class="tags"><?php the_tags('Tags: ', ', ', ''); ?></div>
	<?php endif; ?>

	<p class="meta2"><span class="catr"><?php _e('Posted in','ayumi') ?> <?php the_category(', ') ?></span><?php edit_post_link(__('Edit','ayumi'), ' <span class="editr">', '</span> '); ?><span class="commr"><?php _e('with','ayumi') ?> <?php comments_popup_link(__('No Comments','ayumi').' &rarr;', __('1 Comment','ayumi').' &rarr;', '% '.__('Comments','ayumi').' &rarr;'); ?></span> 
</p>
	</div>
  <?php endwhile; ?>
  <div class="navigation">
    <div class="alignleft">
      <?php next_posts_link('&laquo; '.__('Previous Entries','ayumi')) ?>
    </div>
    <div class="alignright">
      <?php previous_posts_link(__('Next Entries','ayumi').' &raquo;') ?>
    </div>
  </div>
  <?php else : ?>
  <h2 class="center"><?php _e('Not Found','ayumi') ?></h2>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <?php endif; ?>

</div>
</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
