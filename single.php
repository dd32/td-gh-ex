<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			<h1 class="page-title-post"><?php the_title(); ?></h1>

			<?php get_template_part( 'postmeta' ); ?>
		
			<?php the_content(); ?>

			<?php if ( $multipage ) { ?>
				<div class="pagelink"><?php wp_link_pages(); ?></div>
			<?php } ?> 

			<?php get_template_part( 'postmeta-single' ); ?>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'darkelements' ), '<div class="edit-link">', '</div>' ); ?>

</div>
<?php get_footer(); ?>