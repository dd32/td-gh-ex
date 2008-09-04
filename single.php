<?php get_header(); ?>

		<div id="content">

<?php if(have_posts()): while(have_posts()): the_post(); ?>

			<div class="hentry" id="article-<?php the_ID(); ?>">
				<h2 class="entry-title"><?php the_title(); ?></h2>

				<div class="posted">Posted by <?php sp_author_hcard() ?>
					<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>">on <?php echo get_the_time(get_option('date_format')) ?></abbr>
				</div>
				<br class="clear" />	
				<div class="entry-content">
					<?php the_content(); ?>
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
<?php edit_post_link(__('Edit&hellip;', 'simplish'),'<p class="admin-edit">&#91; ',' &#93;</p>') ?>
				<ul class="meta">
				<?php if(!in_category('1')): /* Assumes Uncategorized is catID #1 */ ?>
					<li class="categories"><?php _e('Category:', 'simplish') ?> <?php the_category(', ') ?></li>
				<?php endif; ?>
				<?php if(get_the_tags() != ''): ?>
					<li class="tags"><?php the_tags(); ?></li>
				<?php endif; ?>
					<li>Meta:
					<a href="#comments"><?php comments_number('0 Comments', '1 Comment', '% Comments'); ?></a> | 
					<?php comments_rss_link('Feed'); ?> | 
					<a href="<?php the_permalink() ?>" rel="bookmark">Permalink</a>
					</li>
				</ul>
				<!-- <?php trackback_rdf(); ?> -->
			</div>

		<?php comments_template(); ?>

<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
				<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			</div>

<?php else: ?>

			<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>

		</div><!-- #content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
