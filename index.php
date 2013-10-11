<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="sticky">
			<h4><?php _e( 'Featured post', 'guido' ); ?></h4>
		</div>
		<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'guido'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'guido'); ?><?php echo get_the_date(); ?> | <?php _e('Posted by ', 'guido'); ?> <?php the_author_posts_link() ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} ?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'guido'); ?></p>
		<?php endif; ?>
	
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'guido' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'guido' )) ?></div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
