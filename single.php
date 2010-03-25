<?php
/**
 * @package WordPress
 * @subpackage Belle
 */

get_header();
?>

<!-- Content ON -->
<div id="content" class="widecolumn" role="main">

	<!--Current Content ON-->
    <div id="current-content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
		    <div class="post-title">
			    <div class="post-date"><span class="post-day"><?php the_time('j'); ?></span><span class="post-month"><?php the_time('M'); ?></span></div>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="post-info">Posted by <?php the_author() ?> | Category: <span class="entry-categories"><?php the_category(', ') ?></span> | <span class="entry-comments"><?php comments_popup_link(__('No Comments',belle), __('1 Comment',belle), __('% Comments',belle)); ?> </span></div>
				<div style="clear:both;"></div>
			</div>
			<div class="entry">
				<?php the_content(__('Read the rest of this entry &raquo;',belle)); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			
			<?php comments_template(); ?>
		
		</div>

	<?php endwhile;?>
	
        <div class="navigation"> 
			<span class="previous-entries"><?php previous_post_link(__('&laquo; %link',belle)) ?></span>
			<span class="next-entries"><?php next_post_link(__('%link &raquo;',belle)) ?></span> 
		</div>

	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.',belle); ?></p>

    <?php endif; ?>
    
	</div>
	<!--Current Content OFF-->
	<div id="dynamic-content"></div>
	

</div>
<!-- Content OFF -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
