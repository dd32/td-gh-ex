<?php get_header(); ?>
	<div id="container">
		<div id="content-container">
			<div id="content">		
				<?php if (have_posts()) : ?>
 	  				<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  				<?php /* If this is a category archive */ if (is_category()) { ?>
						<h2 class="pagetitle">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
 	  				<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
						<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  				<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
						<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
 	  				<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
						<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
 	  				<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
	  				<?php /* If this is an author archive */ } elseif (is_author()) { ?>
						<h2 class="pagetitle">Author Archive</h2>
 	  				<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
					<h2 class="pagetitle">Blog Archives</h2>
 	  				<?php } ?>
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
				<h2 class="center">Not Found</h2>
			<?php endif; ?>
		</div><!--end content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
