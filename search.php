<?php
get_header();
?>

<h4 class="page-title"><?php _e( 'Search results for:', 'northern-web-coders' ); ?> <?php the_search_query(); ?> </h4>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
<h2 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php the_post_thumbnail('thumbnail'); ?>

<div class="meta">
<?php edit_post_link(__('Edit This', 'northern-web-coders')); ?>
</div>

<?php the_content(__('(more...)', 'northern-web-coders')); ?>

<div class="meta">
<ul>
<li><?php _e("Published on:", 'northern-web-coders'); ?> <a href="<?php the_permalink() ?>" rel="bookmark"><?php echo the_time("l - d F Y"); ?></a></li>
<li><?php _e("Categories:", 'northern-web-coders'); ?> <?php the_category(', ') ?> <?php the_tags(__('Tags:&nbsp;', 'northern-web-coders'), ' , ' , ''); ?></li>
</ul>
</div>

<div class="commentlink">
<?php wp_link_pages(); ?>
<?php comments_popup_link(__('No Comments', 'northern-web-coders'), __('1 Comment', 'northern-web-coders'), __('% Comments', 'northern-web-coders'), '', __('Comments are closed.', 'northern-web-coders') ); ?>
</div>

</article>

<?php endwhile; else: ?>

<article class="noresults">
<h2 class="storytitle"><?php _e("Not Found", 'northern-web-coders'); ?></h2>
<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'northern-web-coders' ); ?></p>

</article>

<?php endif; ?>

<div class="pagenav">
<?php northern_pagenavi() ?>
</div>

<?php comments_template( '', true ); ?>

</div>

<?php get_sidebar(''); ?>

<?php get_footer(); ?>
