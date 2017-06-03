<?php
/*
 * The template for main blog page.
 */
?>

<?php get_header(); ?>
<?php if(get_theme_mod('gridbulletin_homepage_sidebar') == 0) { ?> 
	<div id="content">
<?php } else { ?>
	<div id="content-full">
<?php } ?>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content-list' ); ?>
		<?php endwhile; ?>

		<div class="post-nav">
			<?php next_posts_link(); ?>
			<?php previous_posts_link(); ?>
		</div>

	<?php else: ?>
		<?php get_template_part( 'content-none' ); ?>

	<?php endif; ?>
</div>
<?php if(get_theme_mod('gridbulletin_homepage_sidebar') == 0) { ?> 
	<?php get_sidebar(); ?>
<?php } ?>
<?php get_footer(); ?>