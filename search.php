<?php get_header(); ?>
	<div id="container">
		<div id="content-container">
			<div id="content">
				<?php if (have_posts()) : ?>
					<h2 class="pagetitle">Search Results</h2>
					<?php while (have_posts()) : the_post(); ?>
						<div class="post">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<small><?php the_time('jS F  Y') ?> by <?php the_author() ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php edit_post_link('Edit', ' | ', ''); ?></small>
							<div class="entry">
								<?php the_excerpt(); ?>
							</div>
						</div>
					<?php endwhile; ?>
					<?php if(function_exists('wp_pagenavi')) { // if PageNavi is activated ?>
						<div class="navigation">
							<?php wp_pagenavi(); // Use PageNavi ?>
						</div>
					<?php } else { // Otherwise, use traditional Navigation ?>
						<div class="navigation">
							<div class="navigation-left"><?php next_posts_link('&laquo;&laquo; Older Entries') ?></div>
							<div class="navigation-right"><?php previous_posts_link('Newer Entries &raquo;&raquo;') ?></div>
						</div><!--end navigation-->
					<?php } // End if-else statement ?>
				<?php else : ?>
					<h2>Search Results</h2>
					<p>Sorry, but you are looking for something that isn't here. Please try a new search or browse the sidebars to find what you are looking for.</p>
				<?php endif; ?>
			</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>