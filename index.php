<?php
/**
 * @package Babylog
 */

get_header();

?>

	<div id="content" class="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="post_header">
				<h2 class="page_title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				<span class="post_date">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
				</span>
			</div>
				

				<div class="entry">
					<small>by <?php the_author() ?></small>
					
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					
					<?php wp_link_pages(array('before' => '<p class="clear"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					
					<p><?php edit_post_link('Edit This Entry'); ?></p><hr />					
					<?php the_category() ?>
				
					<div class="comments-link"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
					<div class="clear"></div>
				</div>
				
				
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="page_title">Not Found</h2>
		<p class="aligncenter">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
