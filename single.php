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
			<h3 class="single-post-title"><?php the_title(); ?></h3>

			<h5 class="postmetadata">
			<?php printf( __( 'Posted on %s', 'bluegray' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
			<?php printf( __( 'By %s', 'bluegray' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
			<?php comments_popup_link( __( 'Leave a response', 'bluegray' ), __( '1 response', 'bluegray' ), __( '% responses', 'bluegray' ) ); ?><?php endif; ?>
			</h5>
	
			<?php the_content(); ?>
			<div class="pagelink"><?php wp_link_pages(); ?></div>
			
			<h5 class="postmetadata">
			<?php _e('Posted in ', 'bluegray'); ?><?php the_category(__(', ', 'bluegray') ); ?><?php if(has_tag() ) : echo '|'; ?>
			<?php the_tags(__('Tags: ', 'bluegray'), __(', ', 'bluegray') ); ?> <?php endif; ?>
			</h5>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php endif; ?>
	
		<h5><?php edit_post_link( __( 'Edit', 'bluegray' ), '<span class="edit-link">', '</span>' ) ?></h5>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>