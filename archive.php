<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="page-title"><?php _e('Archive', 'SimplyBlack'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="page-title"><?php _e('Daily Archives', 'SimplyBlack'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="page-title"><?php _e('Monthly Archives', 'SimplyBlack'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="page-title"><?php _e('Yearly Archives', 'SimplyBlack'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="page-title"><?php _e('Author Archives', 'SimplyBlack'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="page-title"><?php _e('Tag Archives', 'SimplyBlack'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'SimplyBlack'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
		<h5 class="postmetadata"><?php _e('Posted on ', 'SimplyBlack'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'SimplyBlack'); ?> 
		<?php the_author_posts_link() ?> | <?php printf( _n( '1 response', '%1$s responses', get_comments_number(), 'SimplyBlack' ), number_format_i18n( get_comments_number() ) ); ?></h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 	?>

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