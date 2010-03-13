<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header();
?>

<div id="content" class="widecolumn" role="main">

	<!--Corrent Content ON-->
    <div id="current-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
		    <div class="post-title">
			    <div class="post-date"><span class="post-day"><?php the_time('j'); ?></span><span class="post-month"><?php the_time('M'); ?></span></div>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-info">Posted by <?php the_author() ?> | Category: <span class="entry-categories"><?php the_category(', ') ?></span> | <span class="entry-comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> </span></div>
				<div style="clear:both;"></div>
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
	<!--Current Content OFF-->
	<div id="dynamic-content"></div>
	

</div>
<!-- /Content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
