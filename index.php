<?php get_header(); ?>


	
<div id="content">

<h2 class="title">Latest Ramblings</h2>

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
				
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small>by <?php the_author() ?> ~ <?php the_time('F jS, Y') ?> <?php edit_post_link('(edit)'); ?></small>
				
			<div class="entry">
				<?php the_content('Continue reading &raquo;'); ?>
			</div>
		
			<p class="postmetadata">Filed under: <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&larr; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &rarr;') ?></div>
			</div>
		
		<?php else : ?>

		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
	
</div>

<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>


<?php get_footer(); ?>