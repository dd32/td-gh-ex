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
			<h3 class="page-title"><?php the_title(); ?></h3>
			<h5 class="postmetadata"><?php _e('Posted on ', 'shipyard'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'shipyard'); ?> 
			<?php the_author_posts_link() ?> | <?php printf( _n( '1 response', '%1$s responses', get_comments_number(), 'shipyard' ), number_format_i18n( get_comments_number() ) ); ?></h5>
	
			<?php the_content(); ?>
			<div class="pagelink"><?php wp_link_pages(); ?></div>
			
			<h5 class="postmetadata"><?php _e('Posted in ', 'shipyard'); ?> <?php the_category(', '); ?> | <?php the_tags('Tags: '); ?></h5>
		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php endif; ?>
	
		<h4><?php edit_post_link( __( 'Edit', 'shipyard' ), '<span class="edit-link">', '</span>' ) ?></h4>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>