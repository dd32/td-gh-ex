<?php
/*
Template Name: Full Width Page
Theme: Appeal
*/
?>
<?php get_header(); ?>

<div id="content" class="row">

	<div id="main" class="col-sm-12" role="main">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post();

	        // Include the page content template.
			get_template_part( 'content' ); ?>

		<?php endwhile; ?>

            <?php get_template_part( 'nav', 'content' ); ?>
		<?php else : ?>

		<article id="post-not-found" class="block">
		    <p><?php _e("No pages found.", "appeal"); ?></p>
            <?php get_search_form(); ?>
		</article>

		<?php endif; ?>

	</div>

</div>

<?php get_footer(); ?>