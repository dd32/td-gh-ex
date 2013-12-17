<?php get_header();?>

<div id="content">
	<?php do_action('ast_hook_before_content'); ?>

	<!-- Widgets: Before Content -->
	<?php if ( is_active_sidebar('widgets_before_content') )  : ?>
		<div id="widgets-wrap-before-content"><?php dynamic_sidebar('widgets_before_content'); ?></div>
	<?php endif ; ?>

	<?php if ( is_category() || is_tag() || is_date() || is_search() ) : ?>
		<div class="archive-info">
			<h4 class="archive-title">
			<?php
				if ( is_search() )
					printf(	__('Search Results for &ndash; &quot;<span>%s</span>&quot;', 'asteroid'), get_search_query() );
				elseif ( is_day() )
					printf( __('Date &ndash; <span>%s</span>', 'asteroid'), get_the_date() );
				elseif ( is_month() )
					printf( __('Month &ndash; <span>%s</span>', 'asteroid'), get_the_date( 'F Y' ) );
				elseif ( is_year() )
					printf( __('Year &ndash; <span>%s</span>', 'asteroid'), get_the_date( 'Y' ) );
				elseif ( is_category() || is_tag() )
					echo '<span>' . single_cat_title( '', false ) . '</span>';
			?>			
			</h4>

			<?php if ( category_description() != '' ) : ?>
				<div class="archive-description"><?php echo category_description(); ?></div>
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

		<div class="wrap-404-box">
			<h2><?php _e('Search Results: Nothing Found', 'asteroid'); ?></h2>
			<p><?php _e('Try a new keyword.', 'asteroid'); ?></p>
			<?php get_search_form(); ?>
		</div>

	<!-- End Loop -->
	<?php endif; ?>

	<?php do_action('ast_hook_after_content'); ?>

	<!-- Bottom Post Navigation -->
	<?php if ( !is_singular() ) : ?>

		<div id="bottom-navi">
			<?php if ( function_exists('wp_pagenavi') ):?>
				<?php wp_pagenavi(); ?>
			<?php else : ?>
				<div class="previous-link"><?php next_posts_link( __( '&laquo; Older posts', 'asteroid' ) ); ?></div>
				<div class="next-link"><?php previous_posts_link( __( 'Newer posts &raquo;', 'asteroid' ) ); ?></div>
			<?php endif; ?>
		</div>

	<?php endif; ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>