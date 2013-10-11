<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="page-title"><?php _e('Archive', 'guido'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="page-title"><?php _e('Daily Archives', 'guido'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="page-title"><?php _e('Monthly Archives', 'guido'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="page-title"><?php _e('Yearly Archives', 'guido'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="page-title"><?php _e('Author Archives', 'guido'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="page-title"><?php _e('Tag Archives', 'guido'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'guido'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<h5 class="postmetadata"><?php _e('Posted on ', 'guido'); ?><?php echo get_the_date(); ?> | <?php _e('Posted by ', 'guido'); ?> <?php the_author_posts_link() ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 	?>

	<?php the_excerpt(); ?>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'guido'); ?></p>
		<?php endif; ?>
				

	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'guido' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'guido' )) ?></div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>