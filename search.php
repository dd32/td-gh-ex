<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php next_posts_link('Next Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php next_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

			<div class="post">
				<h2>No posts matching &#8216;<?php the_search_query(); ?>&#8217; were found.</h2>
				<div class="entry">
				<p>Try a different search?</p>
				
				<h3>Last 5 blog posts:</h3>
					<ol class="postlist">
						<?php (function_exists('ard_get_archives'))? ard_get_archives('limit=5') : wp_get_archives('type=postbypost&limit=5') ; ?>
					</ol>

				</div>
			</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>