<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="main-content-container">
<div id="main-content">
<div id="content">

	<?php while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			<h4 class="post-title"><?php the_title(); ?></h4>

			<?php get_template_part( 'postmeta' ); ?>
	
			<?php the_content(); ?>

			<?php if ( $multipage ) { ?>
				<div class="pagelink"><?php wp_link_pages(); ?></div>
			<?php } ?> 

			<div class="postmetadata">
				<?php printf( __( 'Category: %s', 'multicolors' ), get_the_category_list( __( ', ', 'multicolors' ) ) ); ?>
				<?php if(has_tag() ) : ?>
					<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'multicolors' ), get_the_tag_list('', __( ', ', 'multicolors' ) ) ); ?>
				<?php endif; ?>
			</div>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'multicolors' ), '<div class="edit-link">', '</div>' ); ?>

</div>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>