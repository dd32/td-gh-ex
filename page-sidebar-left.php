<?php
/*
 * Template Name: Left Sidebar Template
 * Description: Template with left sidebar.
 */
?>

<?php get_header(); ?>
<div id="content-right">
	<?php while ( have_posts() ) : the_post(); ?>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('single', array('class' => 'single-image-right')); 
		} ?>

		<?php the_content(); ?>

		<?php if ( $multipage ) { ?>
			<div class="pagelink"><?php wp_link_pages(); ?></div>
		<?php } ?> 

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'myknowledgebase' ), '<div class="edit-link">', '</div>' ); ?>
</div>		
<?php get_sidebar('left'); ?>
<?php get_footer(); ?>