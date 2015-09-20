<?php get_header(); ?>

<div id="content" class="narrowcolumn">
<main>
<section>
 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
					<?php wp_link_pages(array(
		'before' => '<div class="page-links"><span class="page-links-title">' . __( '<b>Pages:</b>', 'quickpic' ) . '</span>', 
		'after' => '</div>',
		'link_before' => '<span>', 
		'link_after'  => '</span>',
		'next_or_number' => 'number'
		)); 
		?>
	
		<p><?php the_tags( __( 'Tags: ', 'quickpic' ), ', ', ''); ?></p> 
		</div>
		
	<?php comments_template(); ?>
	</article>

	<?php endwhile; ?>
	<?php else: ?>
		<article>
		<h2><?php _e( 'Content Not Found', 'quickpic'); ?></h2>
		</article>
		<?php endif; ?>

<?php edit_post_link(); ?>

</section>
</main>
</div>
 
<?php get_footer(); ?>