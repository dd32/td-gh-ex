<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h4 class="page-title"><?php _e('Archive', 'medical'); ?> | <?php echo single_cat_title(); ?></h4> 
		<?php } elseif (is_day()) { ?>
			<h4 class="page-title"><?php _e('Daily Archives', 'medical'); ?> | <?php echo get_the_date(); ?></h4>
		<?php } elseif (is_month()) { ?>
			<h4 class="page-title"><?php _e('Monthly Archives', 'medical'); ?> | <?php echo get_the_date('F Y'); ?></h4>
		<?php } elseif (is_year()) { ?>
			<h4 class="page-title"><?php _e('Yearly Archives', 'medical'); ?> | <?php echo get_the_date('Y'); ?></h4>
		<?php } elseif (is_author()) { ?>
			<h4 class="page-title"><?php _e('Author Archives', 'medical'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h4 class="page-title"><?php _e('Tag Archives', 'medical'); ?> | <?php echo single_tag_title('', true); ?></h4>
	<?php } ?>
            
	<?php while (have_posts()) : the_post(); $count++; ?>

		<h4 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'medical'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h4>

		<h5 class="postmetadata">
			<?php printf( __( 'Posted on %s', 'medical' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
			<?php printf( __( 'By %s', 'medical' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
			<?php comments_popup_link( __( 'Leave a response', 'medical' ), __( '1 response', 'medical' ), __( '% responses', 'medical' ) ); ?><?php endif; ?>
		</h5>

	<?php if ( has_post_thumbnail() ) { 
		the_post_thumbnail(); 
	} ?>

	<?php the_excerpt(); ?>

	<div class="more">
		<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'medical' ); ?></a>
	</div>

	<?php endwhile; ?>

	<div class="post-nav">
		<?php next_posts_link(__( '&laquo; Older posts', 'medical' )); ?>
		<?php previous_posts_link(__( 'Newer posts &raquo;', 'medical' )); ?>
	</div>

	<?php else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.', 'medical'); ?></p>
	<?php endif; ?>
				
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>