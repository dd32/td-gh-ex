<?php
/* 	Writing Board's General Page to display all Pages
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Writing Board 1.0
*/

 get_header(); ?><div id="container">  

	<div id="content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		
        <h1 class="page-title"><?php the_title(); ?></h1>
			<div class="content-ver-sep"> </div>
            <div class="entrytext">
 <?php the_post_thumbnail('writingboard-category-thumb'); writingboard_content(); ?>
 

				<?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ','writing-board'), 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
		<?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link(__('Edit This Entry','writing-board'), '<p>', '</p>'); ?>
	 <?php comments_template('', true); ?>
	<?php else: ?>
		<p><?php _e('Sorry, no pages matched your criteria','writing-board'); ?></p>
	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>