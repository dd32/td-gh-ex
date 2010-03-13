<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header(); ?>

<div id="content">

	
	<!--Corrent Content ON-->
    <div id="current-content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

		<div class="post">

			<h2 class="center"><?php the_title(); ?></h2>

			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
			
		</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
	<?php comments_template(); ?>
	</div>
	<div id="dynamic-content"></div>
	<!--Corrent Content OFF-->
	
</div>
<!--/content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>