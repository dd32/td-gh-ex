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

			<h5 class="postmetadata">
				<?php printf( __( 'Posted on %s', 'leftside' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
				<?php printf( __( 'By %s', 'leftside' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
				<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
				<?php comments_popup_link( __( 'Leave a response', 'leftside' ), __( '1 response', 'leftside' ), __( '% responses', 'leftside' ) ); ?><?php endif; ?>
			</h5>
	
			<?php the_content(); ?>

			<div class="pagelink"><?php wp_link_pages(); ?></div>
			
			<h5 class="postmetadata">
				<?php printf( __( 'Posted in %s', 'leftside' ), get_the_category_list( __( ', ', 'leftside' ) ) ); ?>
				<?php if(has_tag() ) : echo ' | '; ?><?php printf(__( 'Tags: %s', 'leftside' ), get_the_tag_list('', __( ', ', 'leftside' ) ) ); ?> <?php endif; ?>
			</h5>

		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>

	<?php edit_post_link( __( 'Edit', 'leftside' ), '<div class="edit-link">', '</div>' ) ?>

</div>
<?php get_footer(); ?>