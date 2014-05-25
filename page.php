<?php
/*
 * The default template for displaying pages.
 */
?>

<?php get_header(); ?>
<div id="content">
<div class="article">

	<?php while ( have_posts() ) : the_post(); ?>
		<h3 class="page-title"><?php the_title(); ?></h3>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('single', array('class' => 'single-image')); 
		} ?>

		<?php the_content(); ?>
		<div class="pagelink"><?php wp_link_pages(); ?></div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<h5><?php edit_post_link( __( 'Edit', 'gridbulletin' ), '<span class="edit-link">', '</span>' ) ?></h5>

</div>		
</div>		
<?php get_sidebar(); ?>
<?php get_footer(); ?>