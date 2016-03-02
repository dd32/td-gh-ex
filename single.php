<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			<h3 class="page-title"><?php the_title(); ?></h3>

			<?php get_template_part( 'postmeta' ); ?>

			<?php the_content(); ?>

			<?php if ( $multipage ) { ?>
				<div class="pagelink"><?php wp_link_pages(); ?></div>
			<?php } ?> 

			<div class="postmetadata">
				<?php printf( __( 'Category: %s', 'gridbulletin' ), get_the_category_list( __( ', ', 'gridbulletin' ) ) ); ?>
				<?php if(has_tag() ) : ?>
					<?php echo '|'; ?> <?php printf(__( 'Tag: %s', 'gridbulletin' ), get_the_tag_list('', __( ', ', 'gridbulletin' ) ) ); ?>
				<?php endif; ?>
			</div>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'gridbulletin' ), '<div class="edit-link">', '</div>' ); ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>