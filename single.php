<?php
/*
 * The template for displaying single post.
 */
?>

<?php get_header(); ?>
<div id="content">

<div class="article">

	<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h3 class="page-title"><?php the_title(); ?></h3>

			<?php if ( has_post_thumbnail() ) { 
				the_post_thumbnail(); 
			} ?>

			<?php the_content(); ?>

			<div class="pagelink"><?php wp_link_pages(); ?></div>

		<h5 class="postmetadata"><?php _e('Posted on ', 'gridbulletin'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'gridbulletin'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'gridbulletin' ), __( '1 response', 'gridbulletin' ), __( '% responses', 'gridbulletin' ) ); ?><?php endif; ?> | 
		<?php _e('Posted in ', 'gridbulletin'); ?> <?php the_category(', '); ?> <?php if(has_tag() ) : echo '|'; ?> <?php the_tags('Tags: '); ?> <?php endif; ?></h5>

		</div>

		<?php comments_template(); ?>

	<?php endwhile; ?>
	<?php endif; ?>
	
	<div class="post-nav">
		<div class="nav-prev"><?php previous_post_link(); ?></div>
		<div class="nav-next"><?php next_post_link(); ?></div>
	</div>

		<h5><?php edit_post_link( __( 'Edit', 'gridbulletin' ), '<span class="edit-link">', '</span>' ) ?></h5>

</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>