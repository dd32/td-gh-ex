<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
			<h4 class="post-title"><?php the_title(); ?></h4>

			<div class="postmetadata">
				<?php printf( __( 'Posted on %s', 'darkelements' ), '<a href="'. esc_url( get_permalink() ) .'">' . esc_html( get_the_date() ). '</a>' ); ?> <?php echo '|'; ?> 
				<?php printf( __( 'By %s', 'darkelements' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
					<?php echo '|'; ?> <?php comments_popup_link( __( 'Leave a response', 'darkelements' ), __( '1 response', 'darkelements' ), __( '% responses', 'darkelements' ) ); ?>
				<?php endif; ?>
			</div>
	
			<?php the_content(); ?>

			<?php if ( $multipage ) { ?>
				<div class="pagelink"><?php wp_link_pages(); ?></div>
			<?php } ?> 

			<div class="postmetadata">
				<?php printf( __( 'Posted in %s', 'darkelements' ), get_the_category_list( __( ', ', 'darkelements' ) ) ); ?>
				<?php if(has_tag() ) : ?>
					<?php echo '|'; ?> <?php printf(__( 'Tags: %s', 'darkelements' ), get_the_tag_list('', __( ', ', 'darkelements' ) ) ); ?>
				<?php endif; ?>
			</div>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'darkelements' ), '<div class="edit-link">', '</div>' ); ?>

</div>
<?php get_footer(); ?>