<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package a-portfolio
 */

get_header();
?>
<section id="blog" class="single section page">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="blog">
					<div class="blog-head">
						<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'a-portfolio' ); ?></h1>
					</div>
					<div class="blog-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'a-portfolio' ); ?></p>

					<?php
					get_search_form();

					the_widget( 'WP_Widget_Recent_Posts' );
					?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'a-portfolio' ); ?></h2>
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
					$a_portfolio_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'a-portfolio' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$a_portfolio_archive_content" );

					the_widget( 'WP_Widget_Tag_Cloud' );
					?>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<!-- Blog Sidebar -->
				<div class="blog-sidebar">
					<?php get_sidebar();?>
				</div>
				<!--/ End Blog Sidebar -->
			</div>
		</div>
	</div>
</section>


	

<?php
get_footer();
