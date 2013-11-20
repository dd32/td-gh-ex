<?php
/*
 * The default template for displaying pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while ( have_posts() ) : the_post(); ?>
		<h4 class="page-title"><?php the_title(); ?></h4>
		<?php the_content(); ?>
		<div class="pagelink"><?php wp_link_pages(); ?></div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<h4><?php edit_post_link( __( 'Edit', 'darkorange' ), '<span class="edit-link">', '</span>' ) ?></h4>
</div>		
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>