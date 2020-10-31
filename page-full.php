<?php
/*
 * Template Name: Full Width Template
 * Description: Template without sidebar
 * Template Post Type: page
 */
?>

<?php get_header(); ?>
<div id="content-full" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail('post-thumbnail', array('class' => 'single-image'));
		} ?>

		<?php the_content(); ?>

		<?php wp_link_pages( array(
			'before' => '<div class="pagelink">' . __( 'Pages:', 'privatebusiness' ),
			'after'  => '</div>',
		) ); ?>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'privatebusiness' ), '<div class="edit-link">', '</div>' ); ?>
</div>
<?php get_footer(); ?>
