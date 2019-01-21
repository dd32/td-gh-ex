<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Academic_Hub
 * @since 1.0.0
 */

get_header();
?>
<?php academic_hub_before_mainsec(); ?>
	<div class="container">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<?php academic_hub_content_top(); ?>
						<section class="error-404 not-found">
							<header class="page-header">
								<h1 class="page-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'academic-hub' ); ?></h1>
							</header><!-- .page-header -->

							<div class="page-content">
								<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'academic-hub' ); ?></p>

								<?php
								get_search_form();

								the_widget( 'WP_Widget_Recent_Posts' );
								?>

								<div class="widget widget_categories">
									<h2 class="widget-title"><?php echo esc_html__( 'Most Used Categories', 'academic-hub' ); ?></h2>
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

								<?php
								/* translators: %1$s: smiley */
								$academic_hub_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'academic-hub' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$academic_hub_archive_content" );

								the_widget( 'WP_Widget_Tag_Cloud' );
								?>

							</div><!-- .page-content -->
						</section><!-- .error-404 -->
				<?php academic_hub_content_bottom(); ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<?php academic_hub_after_mainsec(); ?>
<?php
get_footer();
