<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
	
		<?php if (function_exists('is_tag')) { is_tag(); } ?>
		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

		<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h3 class="pagetitle">Archives for the &#8216;<?php echo single_cat_title(); ?>&#8217; Category</h3>

		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h3 class="pagetitle">Archives for posts tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>

		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="pagetitle">Archives for the Date <?php the_time('F jS, Y'); ?></h3>

		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="pagetitle">Archives for the Month of <?php the_time('F, Y'); ?></h3>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="pagetitle">Archives for the Year <?php the_time('Y'); ?></h3>

		<?php /* If this is a search */ } elseif (is_search()) { ?>
		<h3 class="pagetitle">Search Results</h3>

		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="pagetitle">Author Archive</h3>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="pagetitle">Archives</h3>

		<?php } ?>


		<div class="navigation">
			<div class="alignright"><?php next_posts_link('Earlier Entries &raquo;') ?></div>
			<div class="alignleft"><?php previous_posts_link('&laquo; Later Entries') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post multipost">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to '<?php the_title_attribute(); ?>'"><?php the_title(); ?></a></h2>
				<p class="postdate"><?php the_time('l, j F Y') ?> <!-- by <?php the_author() ?> --></p>
				
				<div class="entry">
					<?php if (function_exists('the_excerpt_reloaded')) { the_excerpt_reloaded(55, '', 'excerpt', TRUE, '[&#8230;]', FALSE, 2, TRUE, 0, 'span', 'Continue reading this entry', 0);
					} else { echo the_excerpt(); 
					} ?>
				</div>
		
				<p class="postmetadata alt"><?php if (function_exists('the_tags')) the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignright"><?php next_posts_link('Earlier Entries &raquo;') ?></div>
			<div class="alignleft"><?php previous_posts_link('&laquo; Later Entries') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>