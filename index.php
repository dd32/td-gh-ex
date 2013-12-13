<?php
/*
 * The template for homepage.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="sticky">
			<h4><?php _e( 'Featured post', 'SimplyBlack' ); ?></h4>
		</div>
		<?php endif; ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'SimplyBlack'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?> </a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'SimplyBlack'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'SimplyBlack'); ?> 
		<?php the_author_posts_link() ?> | <?php printf( _n( '1 response', '%1$s responses', get_comments_number(), 'SimplyBlack' ), number_format_i18n( get_comments_number() ) ); ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} ?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'SimplyBlack'); ?></p>
		<?php endif; ?>

<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'SimplyBlack' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'SimplyBlack' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
