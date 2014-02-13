<?php
/* 	Smartia Theme's General Page to display all Pages
	Copyright: 2012-2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Smartia 2.0
*/

 get_header(); ?>


	<div id="content">
	<div class="pagead"><?php echo of_get_option('adcodesp', ''); ?></div>
    
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<?php if (!is_front_page()): ?><h1 class="page-title"><?php the_title(); ?></h1><?php endif; ?>
			<div class="entrytext">
 	<?php if (of_get_option('tpage', '1') != '1' ): ?><div class="thumb"><?php the_post_thumbnail(); ?></div><?php endif; ?>
 	<?php smartia_content(); ?>

	<?php wp_link_pages(array('before' => '<p><strong>' . of_get_option ('pages', 'Pages'). ': </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
		</div>
        <?php endwhile; ?><div class="clear"> </div>
	<?php edit_post_link('Edit', '<p>', '</p>'); ?>
	<?php comments_template('', true); ?>
	<?php else: ?>
		<p>Sorry, no pages matched your criteria.</p>
	<?php endif; ?>
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>