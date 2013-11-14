<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package B3
 */

get_header(); ?>

	<div id="primary" class="content-area col-md-9 col-sm-8 col-xs-12">
		<main id="main" class="site-main" role="main">
		<div <?php b3_content_wrap_class(); ?>>
			<section class="error-404 not-found  <?php echo b3_option('panel_post') ? 'spacer-all' : ''; ?>">
				<header class="page-header">
					<h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'b3'); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'b3'); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget('WP_Widget_Recent_Posts'); ?>

					<?php if ( b3_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widgettitle"><?php _e('Most Used Categories', 'b3'); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
					/* translators: %1$s: smiley */
					$archive_content = '<p>' . sprintf( __('Try looking in the monthly archives. %1$s', 'b3'), convert_smilies(':)') ) . '</p>';
					the_widget('WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					<?php the_widget('WP_Widget_Tag_Cloud'); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();