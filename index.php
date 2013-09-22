<?php get_header();?>

<div id="content">
	<?php do_action('ast_hook_before_content'); ?>

	<!-- Widgets: Before Content -->
	<?php if ( is_active_sidebar('widgets_before_content') )  : ?>
		<div id="widgets-wrap-before-content"><?php dynamic_sidebar('widgets_before_content'); ?></div>
	<?php endif ; ?>

	<?php if ( is_archive() ) : ?>
		<div class="archive-info">
			<h4 class="archive-title">
			<?php
				if ( is_category() ) {
				printf(	__( 'Category &ndash; %s', 'asteroid' ), '<span>' . single_cat_title( '', false ) . '</span>' ); }
				elseif ( is_tag() ) {
				printf(	__( 'Tag &ndash; %s', 'asteroid' ), '<span>' . single_cat_title( '', false ) . '</span>' ); }
				elseif ( is_day() ) {
				printf( __( 'Date &ndash; %s', 'asteroid' ), '<span>' . get_the_date() . '</span>' ); }
				elseif ( is_month() ) {
				printf( __( 'Month &ndash; %s', 'asteroid' ), '<span>' . get_the_date( 'F Y' ) . '</span>' ); }
				elseif ( is_year() ) {
				printf( __( 'Year &ndash; %s', 'asteroid' ), '<span>' . get_the_date( 'Y' ) . '</span>' ); }
			?>
			</h4>

			<?php if ( is_category() && category_description() != '' ) : ?>
				<div class="archive-description"><?php echo category_description(); ?> </div>
			<?php elseif ( is_tag() && tag_description() != '' ) : ?>
				<div class="archive-description"><?php echo tag_description(); ?> </div>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php if ( !is_singular() ) : ?>
					<?php get_template_part( 'loop' ); ?>
			<?php else : ?>
					<?php get_template_part( 'loop', 'single' ); ?>
			<?php endif; ?>

	<?php endwhile; else: ?>

		<!-- Post Not Found -->
		<div class="wrap-404-box">
			<h2><?php _e('Search Results: Nothing Found', 'asteroid'); ?></h2>
			<p><?php _e('Try a new keyword.', 'asteroid'); ?></p>
			<?php get_search_form(); ?>
		</div>

	<!-- End Loop -->
	<?php endif; ?>

	<?php do_action('ast_hook_after_content'); ?>

	<!-- Bottom Post Navigation -->
	<?php if ( ( !is_singular() ) && ( (get_post_type() == 'post') || (get_post_type() == 'page') ) ) : ?>

		<div id="bottom-navi">
			<?php if ( function_exists('wp_pagenavi') ):?>
				<?php wp_pagenavi(); ?><!-- wp-pagenavi support -->
			<?php else : ?>
				<div class="previous-link"><?php next_posts_link( __( '&laquo; Older posts', 'asteroid' ) ); ?></div>
				<div class="next-link"><?php previous_posts_link( __( 'Newer posts &raquo;', 'asteroid' ) ); ?></div>
			<?php endif; ?>
		</div>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>