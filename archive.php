<?php
get_header();
?>

<?php if (have_posts()) : ?>

 	 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php printf(__('Archive for the &#8216;%s&#8217; Category', 'artsavius'), single_cat_title('', false)); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php printf(__('Posts Tagged &#8216;%s&#8217;', 'artsavius'), single_tag_title('', false) ); ?></h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Daily archive page', 'artsavius'), get_the_time(__('F jS, Y', 'artsavius'))); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Monthly archive page', 'artsavius'), get_the_time(__('F, Y', 'artsavius'))); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php printf(_c('Archive for %s|Yearly archive page', 'artsavius'), get_the_time(__('Y', 'artsavius'))); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e('Author Archive', 'artsavius'); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e('Blog Archives', 'artsavius'); ?></h2>
 	  <?php } ?>


		<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post_<?php the_ID(); ?>">
	 <h3 class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	<div id="meta"><div class="date"><?php the_time('d.m.Y') ?></div><div class="time"><?php the_time('H:i') ?></div><?php if(function_exists('the_views')) { ?><div class="views"><?php the_views(); ?></div><?php } ?><div class="comments"><?php comments_popup_link(__('0'), __('1'), __('%')); ?></div></div>
<div id="category"><?php the_category(' ') ?></div>
	<div class="story_content">
		<?php the_content(__('Read more...', 'artsavius')); ?>
	</div>
	<?php wp_link_pages(); ?>
	<?php edit_post_link(__('Edit This', 'artsavius')); ?>
	<?php the_tags('<div id="tags">',' ','</div>'); ?>

</div>

<?php comments_template(); // Get wp-comments.php template ?>

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.', 'artsavius'); ?></p>
<?php endif; ?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
<span class="previous-entries"><?php next_posts_link(__('&laquo; Older Entries', 'artsavius')) ?></span>
 <span class="next-entries"><?php previous_posts_link(__('Newer Entries &raquo;', 'artsavius')) ?></span>
<?php }; ?>
<?php get_footer(); ?>
