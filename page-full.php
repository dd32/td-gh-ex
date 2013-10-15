<?php
/*
 * Template Name: Full Width template
 * Description: Template without sidebar.
 */
?>

<?php get_header(); ?>
<div id="content-full">

	<?php while ( have_posts() ) : the_post(); ?>
		<h3 class="page-title"><?php the_title(); ?></h3>
		<?php the_content(); ?>
		<div class="pagelink"><?php wp_link_pages(); ?></div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<h4><?php edit_post_link( __( 'Edit', 'shipyard' ), '<span class="edit-link">', '</span>' ) ?></h4>
</div>	
	
<?php get_footer(); ?>