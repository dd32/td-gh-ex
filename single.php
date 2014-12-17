<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h4 class="post-title"><?php the_title(); ?></h4>

			<h5 class="postmetadata">
			<?php printf( __( 'Posted on %s', 'medical' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
			<?php printf( __( 'By %s', 'medical' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
			<?php comments_popup_link( __( 'Leave a response', 'medical' ), __( '1 response', 'medical' ), __( '% responses', 'medical' ) ); ?><?php endif; ?>
			</h5>
	
			<?php the_content(); ?>
			<div class="pagelink"><?php wp_link_pages(); ?></div>

			<h5 class="postmetadata">
			<?php printf( __( 'Posted in %s', 'medical' ), get_the_category_list( __( ', ', 'medical' ) ) ); ?>
			<?php if(has_tag() ) : echo ' | '; ?><?php printf(__( 'Tags: %s', 'medical' ), get_the_tag_list('', __( ', ', 'medical' ) ) ); ?> <?php endif; ?>
			</h5>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php endif; ?>

	<?php edit_post_link( __( 'Edit', 'medical' ), '<h5><span class="edit-link">', '</span></h5>' ) ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>