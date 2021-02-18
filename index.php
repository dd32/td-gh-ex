<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="sticky">
			<h4><?php _e( 'Featured post', 'shipyard' ); ?></h4>
		</div>
		<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'shipyard'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'shipyard'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('Posted by ', 'shipyard'); ?> <?php the_author_posts_link() ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} ?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'shipyard'); ?></p>
		<?php endif; ?>

<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'shipyard' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'shipyard' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
