<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>
		<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'SimplyBlack' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			
			
	<?php while ( have_posts() ) : the_post(); ?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'SimplyBlack'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<h5 class="postmetadata"><?php _e('Posted on ', 'SimplyBlack'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'SimplyBlack'); ?> 
		<?php the_author_posts_link() ?> | <?php printf( _n( '1 response', '%1$s responses', get_comments_number(), 'SimplyBlack' ), number_format_i18n( get_comments_number() ) ); ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
		} ?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
					
	<h3 class="page-title"><?php _e( 'Nothing Found', 'SimplyBlack' ); ?></h3>
		<p><?php _e('Sorry, no posts matched your criteria.', 'SimplyBlack'); ?></p>
		<?php get_search_form(); ?>
			
	<?php endif; ?>

<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'SimplyBlack' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'SimplyBlack' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>