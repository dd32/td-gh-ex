<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="archive-title"><?php _e('Archive', 'bluegray'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="archive-title"><?php _e('Daily Archives', 'bluegray'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="archive-title"><?php _e('Monthly Archives', 'bluegray'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="archive-title"><?php _e('Yearly Archives', 'bluegray'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="archive-title"><?php _e('Author Archives', 'bluegray'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="archive-title"><?php _e('Tag Archives', 'bluegray'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'bluegray'); ?><?php the_title_attribute(); ?>" rel="bookmark">
		<?php the_title(); ?></a></h3>

		<h5 class="postmetadata"><?php _e('Posted on ', 'bluegray'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'bluegray'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'bluegray' ), __( '1 response', 'bluegray' ), __( '% responses', 'bluegray' ) ); ?><?php endif; ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 	?>

	<?php the_excerpt(); ?>
	<div class="more">
		<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'bluegray' ); ?></a>
	</div>

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