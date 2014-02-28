<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="main-content">
<div id="content">

	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h3 class="single-post-title"><?php the_title(); ?></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'bluegray'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'bluegray'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'bluegray' ), __( '1 response', 'bluegray' ), __( '% responses', 'bluegray' ) ); ?><?php endif; ?></h5>
	
			<?php the_content(); ?>
			<div class="pagelink"><?php wp_link_pages(); ?></div>
			
			<h5 class="postmetadata"><?php _e('Posted in ', 'bluegray'); ?> <?php the_category(', '); ?> <?php if(has_tag() ) : echo '|'; ?> <?php the_tags('Tags: '); ?> <?php endif; ?></h5>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php endif; ?>
	
		<h5><?php edit_post_link( __( 'Edit', 'bluegray' ), '<span class="edit-link">', '</span>' ) ?></h5>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>