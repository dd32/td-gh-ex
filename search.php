<?php get_header(); ?>

		<div id="content" class="hfeed search-results">

		<?php if (have_posts()) : ?>

			<h1 class="archive-title">Results for <span class="archive-subtitle"><?php the_search_query() ?></span></h1>
		
			<?php while (have_posts()) : the_post(); ?>
				
			<div class="hentry" id="article-<?php the_ID(); ?>">
					<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="entry-content">
					<?php the_excerpt() ?>
				</div>
			</div>

			<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>
	
		<?php else : ?>

			<h1 class="archive-title">No results for <span class="archive-subtitle"><?php the_search_query() ?></span></h1>
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>

		<?php endif; ?>
		
		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
