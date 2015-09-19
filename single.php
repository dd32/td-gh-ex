<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<h4 class="post-title"><?php the_title(); ?></h4>

			<div class="postmetadata">
				<?php printf( __( 'Posted on %s', 'darkorange' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
				<?php printf( __( 'By %s', 'darkorange' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
				<?php comments_popup_link( __( 'Leave a response', 'darkorange' ), __( '1 response', 'darkorange' ), __( '% responses', 'darkorange' ) ); ?><?php endif; ?>
			</div>

			<?php the_content(); ?>

			<?php if ( $multipage ) { ?>
				<div class="pagelink"><?php wp_link_pages(); ?></div>
			<?php } ?> 
			
			<div class="postmetadata">
				<?php printf( __( 'Posted in %s', 'darkorange' ), get_the_category_list( __( ', ', 'darkorange' ) ) ); ?>
				<?php if(has_tag() ) : echo ' | '; ?><?php printf(__( 'Tags: %s', 'darkorange' ), get_the_tag_list('', __( ', ', 'darkorange' ) ) ); ?> <?php endif; ?>
			</div>

		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	
	<?php edit_post_link( __( 'Edit', 'darkorange' ), '<div class="edit-link">', '</div>' ); ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>