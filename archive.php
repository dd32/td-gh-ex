<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">
<div class="article">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="page-title"><?php _e('Archive', 'gridbulletin'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="page-title"><?php _e('Daily Archives', 'gridbulletin'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="page-title"><?php _e('Monthly Archives', 'gridbulletin'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="page-title"><?php _e('Yearly Archives', 'gridbulletin'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="page-title"><?php _e('Author Archives', 'gridbulletin'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="page-title"><?php _e('Tag Archives', 'gridbulletin'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>


	<div class="post-archive<?php if( $wp_query->current_post%3 == 0 ) echo ' left'; elseif ( $wp_query->current_post%3 == 2 ) echo ' right'; ?>">


		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<div class="sticky">
				<h4><?php _e( 'Featured post', 'gridbulletin' ); ?></h4>
			</div>
		<?php endif; ?>

		<h5 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'gridbulletin'); ?><?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail('homepage'); 
		} ?>

		<?php the_excerpt(); ?>

		<h5 class="postmetadata"><?php _e('Posted on ', 'gridbulletin'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a> | <?php _e('By ', 'gridbulletin'); ?> 
		<?php the_author_posts_link(); ?> <?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
		<?php comments_popup_link( __( 'Leave a response', 'gridbulletin' ), __( '1 response', 'gridbulletin' ), __( '% responses', 'gridbulletin' ) ); ?><?php endif; ?></h5>

	</div>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'gridbulletin'); ?></p>
		<?php endif; ?>
				
<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'gridbulletin' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'gridbulletin' )) ?></div>
</div>

</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>