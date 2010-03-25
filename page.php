<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header(); ?>

<!-- Content ON -->
<div id="content">

	
	<!--Current Content ON-->
    <div id="current-content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">

			<h2 class="center"><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content(__('Read the rest of this entry &raquo;',belle)); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			
		</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2><?php _e('Not Found',belle); ?></h2>
		<p><?php _e('Sorry, but you are looking for something that isn\'t here.',belle); ?></p>

	<?php endif; ?>
        <div style="clear:both;"></div>
	<?php edit_post_link(__('Edit this entry.',belle), '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
	</div>
	<div id="dynamic-content"></div>
	<!--Current Content OFF-->
	
</div>
<!--Content OFF-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>