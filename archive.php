<?php get_header(); ?>

	<div id="content">

<?php the_post() ?>
<?php if(is_day()): ?>
				<h1 class="archive-title"><?php _e('Day:', 'simplish') ?> <span class="archive-subtitle"><?php the_time(__('l, F d\, Y', 'simplish')) ?></span></h1>
<?php elseif(is_month()): ?>
				<h1 class="archive-title"><?php _e('Month:', 'simplish') ?> <span class="archive-subtitle"><?php the_time(__('F Y', 'simplish')) ?></span></h1>
<?php elseif(is_year()): ?>
				<h1 class="archive-title"><?php _e('Year:', 'simplish') ?> <span class="archive-subtitle"><?php the_time(__('Y', 'simplish')) ?></span></h1>
<?php elseif(is_author()): ?>
				<h1 class="archive-title"><?php _e('Author:', 'simplish') ?></h1>
				<div class="archive-meta"><?php sp_author_ext_hcard("64") ?></div>
				<br class="clear downpad" />
<?php elseif(is_category()): ?>
				<h1 class="archive-title"><?php _e('Category:', 'simplish') ?> <span class="archive-subtitle"><?php echo single_cat_title(); ?></span></h1>
<?php elseif(is_tag()): ?>
				<h1 class="archive-title"><?php _e('Tag:', 'simplish') ?> <span class="archive-subtitle"><?php single_tag_title(); ?></span></h1>
<?php elseif(isset($_GET['paged']) && !empty($_GET['paged'])): ?>
				<h1 class="archive-title"><?php _e('Archives', 'simplish') ?> <?php printf(__('%1$s Archives', 'simplish'), wp_specialchars(get_the_title(), 'double') ) ?></h1>
<?php endif; ?>
<?php rewind_posts() ?>

<?php if(have_posts()): ?>
	<?php while(have_posts()): the_post(); ?>

		<div class="hentry" id="article-<?php the_ID(); ?>">
			<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<div class="posted">
				Posted by <?php sp_author_hcard() ?>
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
	
<?php else: ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>
		
	</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
