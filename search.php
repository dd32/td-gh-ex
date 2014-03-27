<?php
/*
 * The template for displaying search results.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if ( have_posts() ) : ?>
		<h3 class="page-title"><?php printf( __( 'Search Results for: %s', 'privatebusiness' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			
			
	<?php while ( have_posts() ) : the_post(); ?>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'privatebusiness'); ?>
		<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'privatebusiness'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'privatebusiness'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'privatebusiness' ), __( '1 response', 'privatebusiness' ), __( '% responses', 'privatebusiness' ) ); ?><?php endif; ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
		} ?>

	<?php the_excerpt(); ?>
	<div class="more">
		<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'privatebusiness' ); ?></a>
	</div>

		<?php endwhile; else: ?>
					
	<h3 class="page-title"><?php _e( 'Nothing Found', 'privatebusiness' ); ?></h3>
		<p><?php _e('Sorry, no posts matched your criteria.', 'privatebusiness'); ?></p>
		<?php get_search_form(); ?>
			
	<?php endif; ?>

<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'privatebusiness' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'privatebusiness' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>