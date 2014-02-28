<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="main-content">
<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="sticky">
			<h4><?php _e( 'Featured post', 'bluegray' ); ?></h4>
		</div>
	<?php endif; ?>

		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'bluegray'); ?>
		<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'bluegray'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'bluegray'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'bluegray' ), __( '1 response', 'bluegray' ), __( '% responses', 'bluegray' ) ); ?><?php endif; ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} ?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'bluegray'); ?></p>
		<?php endif; ?>

<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'bluegray' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'bluegray' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
