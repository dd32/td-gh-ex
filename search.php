<?php get_header(); ?>


	
	<div id="content">
	<?php if (have_posts()) : ?>

		<h2 class="title">Search Results</h2>
		<div class="recentposts">
		<?php while (have_posts()) : the_post(); ?>	
		<div class="repost" id="post-<?php the_ID(); ?>">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<h3><?php the_time('F jS, Y') ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></h3>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		</div>
	
	<?php else : ?>

		<h2>Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</div>
	
<?php include(TEMPLATEPATH."/left.php");?>
<?php include(TEMPLATEPATH."/right.php");?>


<?php get_footer(); ?>