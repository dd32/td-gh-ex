<?php
/*
 * Template Name: Full Width template
 * Description: Template without sidebar.
 */
?>

<?php get_header(); ?>
<div id="main-content-container">
<div id="main-content">
<div id="content-full">

	<?php while ( have_posts() ) : the_post(); ?>
		<h4 class="page-title"><?php the_title(); ?></h4>

		<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail('single', array('class' => 'single-image')); 
		} ?>

		<?php the_content(); ?>
		<div class="pagelink"><?php wp_link_pages(); ?></div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<h5><?php edit_post_link( __( 'Edit', 'multicolors' ), '<span class="edit-link">', '</span>' ) ?></h5>

</div>
</div>	
</div>	
<?php get_footer(); ?>