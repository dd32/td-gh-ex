<?php
/**
 * @package Babylog
 */

get_header();
?>

	<div id="content" class="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p class="clear"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				

				<p><?php edit_post_link('Edit This Entry'); ?></p>
				
				<?php the_tags( '<p class="clear">Tags: ', ', ', '</p>'); ?><hr />					
					<?php the_category() ?>
				
					<div class="comments-link"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
					<div class="clear"></div>
			</div>
			
			<div class="navigation">
				<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
				<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			</div>
		</div>

	<?php comments_template(); ?>
	</div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
