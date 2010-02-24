<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header();
?>

	<div id="content" class="widecolumn" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
		    <div class="post-title">
			    <h2><?php the_title(); ?></h2>
				<span class="post-info">Posted by <?php the_author() ?> | Category: <?php the_category(', ') ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> </span>
			</div>
			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			
			<?php comments_template(); ?>
		
		</div>

	<?php endwhile;?>
	
        <div class="navigation"> 
			<span class="previous-entries"><?php previous_post_link('&laquo; %link') ?></span>
			<span class="next-entries"><?php next_post_link('%link &raquo;') ?></span> 
		</div>

	<?php else: ?>
		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
