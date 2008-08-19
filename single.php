<?php get_header(); ?>

		<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<div class="hentry" id="article-<?php the_ID(); ?>">
				<h2 class="entry-title"><?php the_title(); ?></h2>

				<div class="posted">Posted by <?php sp_author_hcard() ?>
					<abbr class="published posted_date" title="<?php the_time('Y-m-d\TH:i:sP') ?>">on <?php the_time('F d, Y') ?></abbr>
				</div>
				<br class="clear" />	
				<div class="entry-content">
					<?php the_content(); ?>
					<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
<?php edit_post_link(__('Edit&hellip;', 'simplish'),'<p class="admin-edit"> [ ',' ]</p>') ?>
				<ul class="meta">
					<li class="categories">Category: <?php the_category(', ') ?></li>
					<li class="tags"><?php the_tags(); ?></li>
					<li>Meta:
						<a href="#comments"><?php comments_number('no comments', '1 comment', '% comments'); ?></a>,
						<a href="<?php the_permalink() ?>" rel="bookmark">permalink</a>,
						<?php comments_rss_link('rss'); ?>
					</li>
				</ul>
				<!-- <?php trackback_rdf(); ?> -->
			</div>

			<h5><a name="trackbacks">Trackbacks</a></h5>
		<?php if ('open' == $post->ping_status) : //trackbacks open ?>
			<p>Use <a href="<?php trackback_url(true); ?>" rel="trackback">this link</a> to trackback from your own site.</p>
		<?php else : // trackbacks closed ?>
			<p class="nopings">Trackbacks are closed.</p>
		<?php endif; ?>

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
