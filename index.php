<?php
/**
 * @package WordPress
 * @subpackage Apricot
 */

get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post multipost" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent link to '<?php the_title_attribute(); ?>'"><?php the_title(); ?></a></h2>
				<p class="postdate"><?php the_time('l, j F Y') ?> <!-- by <?php the_author() ?> --></p>
				
				<div class="entry">
					<?php the_content(); ?>
				</div>
		
				<p class="postmetadata alt"><?php if (function_exists('the_tags')) the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
