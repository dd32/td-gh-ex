<?php get_header(); ?>

		<div id="content">

<?php if(have_posts()): ?>

<?php while(have_posts()): the_post(); ?>

			<div class="hentry" id="article-<?php the_ID(); ?>">
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="posted">Posted by <?php sp_author_hcard() ?>
<?php
/* 
 * The displayed date is tricky - had bug with
 * plain ol the_date(). Used get_the_time() on
 * example of tarski theme.
 */
?>
					<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>">on <?php echo get_the_time(get_option('date_format')) ?></abbr>
				</div>
				<br class="clear" />
				<div class="entry-content">
					<?php the_content('<span class="readmore">'.__('More&hellip;', 'simplish').'</span>'); ?>
				</div>
				<ul class="meta">
				<?php if(!in_category('1')): /* Assumes Uncategorized is catID #1 */ ?>
					<li class="categories"><?php _e('Category:', 'simplish') ?> <?php the_category(', ') ?></li>
				<?php endif; ?>
				<?php if(get_the_tags() != ''): ?>
					<li class="tags"><?php the_tags(); ?></li>
				<?php endif; ?>
					<li>Meta:
					<a href="<?php comments_link(); ?>"><?php comments_number('0 Comments','1 Comment','% Comments') ?></a> | 
					<?php comments_rss_link('Feed'); ?> | 
					<a href="<?php the_permalink() ?>" rel="bookmark">Permalink</a>
					</li>
				</ul>
			</div>

<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
				<div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
			</div>

<?php else : ?>

			<h2 class="center">Not Found</h2>
			<p class="center">Sorry, but you are looking for something that isn't here.</p>
			<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
