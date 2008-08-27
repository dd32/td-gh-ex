<?php get_header(); ?>
	<div id="container">
		<div id="content-container">
			<div id="content">
				<?php global $more; $more = 0; ?>  
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="post" id="post-<?php the_ID(); ?>">
							<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							<small><?php the_time('jS F  Y') ?> by <?php the_author() ?> <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?><?php edit_post_link('Edit', ' | ', ''); ?></small>
							<div class="entry">
								<?php the_content("Continue reading..."); ?>
							</div>
							<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br/>'); ?> Categories: <?php the_category(', ') ?><br />Stay Updated: <a href="<?php bloginfo('rss2_url'); ?>" title="Stay updated via RSS"><img src="<?php bloginfo('template_directory'); ?>/images/rss.gif" height="15px" width="15px" alt="" /></a></p>
							<?php if(function_exists('wp_related_posts')) { ?>
								<?php wp_related_posts(); ?>
							<?php } ?>
							<?php comments_template(); ?>
						</div><!--end post-->
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
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>	
			</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>