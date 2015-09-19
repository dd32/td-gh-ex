<?php
/*
 * The template for displaying archive pages.
 */
?>

<?php get_header(); ?>
<div id="content">

	<?php if (have_posts()) : $count = 0; ?>
		<?php if (is_category()) { ?>
			<h3 class="page-title"><?php _e('Archive', 'onecolumn'); ?> | <?php echo single_cat_title(); ?></h3> 
		<?php } elseif (is_day()) { ?>
			<h3 class="page-title"><?php _e('Daily Archives', 'onecolumn'); ?> | <?php echo get_the_date(); ?></h3>
		<?php } elseif (is_month()) { ?>
			<h3 class="page-title"><?php _e('Monthly Archives', 'onecolumn'); ?> | <?php echo get_the_date('F Y'); ?></h3>
		<?php } elseif (is_year()) { ?>
			<h3 class="page-title"><?php _e('Yearly Archives', 'onecolumn'); ?> | <?php echo get_the_date('Y'); ?></h3>
		<?php } elseif (is_author()) { ?>
			<h3 class="page-title"><?php _e('Author Archives', 'onecolumn'); ?></h3>
		<?php } elseif (is_tag()) { ?>
			<h3 class="page-title"><?php _e('Tag Archives', 'onecolumn'); ?> | <?php echo single_tag_title('', true); ?></h3>
	<?php } ?>

            
	<?php while (have_posts()) : the_post(); $count++; ?>

		<h3 class="post-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permalink to %s', 'onecolumn'), the_title_attribute('echo=0')); ?>"> <?php the_title(); ?></a> 
		</h3>

		<div class="postmetadata">
			<?php printf( __( 'Posted on %s', 'onecolumn' ), '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_date() ). '</a>' ); ?> | 
			<?php printf( __( 'By %s', 'onecolumn' ), sprintf( '<a href="%1$s">%2$s</a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) ) ); ?>
			<?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) : echo '|'; ?>
			<?php comments_popup_link( __( 'Leave a response', 'onecolumn' ), __( '1 response', 'onecolumn' ), __( '% responses', 'onecolumn' ) ); ?><?php endif; ?>
		</div>

		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail(); 
		} ?>

		<?php the_excerpt(); ?>

		<div class="more">
			<a class="readmore" href="<?php the_permalink() ?>" rel="bookmark"><?php _e( 'Read More &raquo;', 'onecolumn' ); ?></a>
		</div>

	<?php endwhile; ?>

	<div class="post-nav">
		<?php next_posts_link(__( '&laquo; Older posts', 'onecolumn' )); ?>
		<?php previous_posts_link(__( 'Newer posts &raquo;', 'onecolumn' )); ?>
	</div>

	<?php else: ?>
		<h3 class="page-title"><?php _e( 'Nothing Found', 'onecolumn' ); ?></h3>
		<p><?php _e('Sorry, no posts matched your criteria.', 'onecolumn'); ?></p>
	<?php endif; ?>
				
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>