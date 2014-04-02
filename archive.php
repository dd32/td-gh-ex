<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="page-title"><?php _e('Archive', 'privatebusiness'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="page-title"><?php _e('Daily Archives', 'privatebusiness'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="page-title"><?php _e('Monthly Archives', 'privatebusiness'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="page-title"><?php _e('Yearly Archives', 'privatebusiness'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="page-title"><?php _e('Author Archives', 'privatebusiness'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="page-title"><?php _e('Tag Archives', 'privatebusiness'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php _e('Permalink to ', 'privatebusiness'); ?><?php the_title_attribute(); ?>" rel="bookmark">
		<?php the_title(); ?></a></h3>

			<h5 class="postmetadata">
			<?php printf( __( 'Posted on %s', 'privatebusiness' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
			<?php printf( __( 'By %s', 'privatebusiness' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
			<?php comments_popup_link( __( 'Leave a response', 'privatebusiness' ), __( '1 response', 'privatebusiness' ), __( '% responses', 'privatebusiness' ) ); ?><?php endif; ?></h5>
			</h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} 	?>

	<?php the_excerpt(); ?>
	<div class="more">
		<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'privatebusiness' ); ?></a>
	</div>

		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'privatebusiness'); ?></p>
		<?php endif; ?>
				
<div class="post-nav">
	<div class="nav-prev"><?php next_posts_link(__( '&laquo; Older posts', 'privatebusiness' )) ?></div>
	<div class="nav-next"><?php previous_posts_link(__( 'Newer posts &raquo;', 'privatebusiness' )) ?></div>
</div>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>