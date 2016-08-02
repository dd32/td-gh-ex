<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aquarella
 */

get_header(); ?>

<?php //Layout Variables
$layout_style = get_theme_mod( 'layout_custom', 'sidebar_right' );

if ( $layout_style == 'sidebar_right' ) : 
	$layout_content_class = 'col-sm-8';
	$layout_sidebar_class = 'col-sm-4';

elseif ( $layout_style == 'sidebar_left' ) :
	$layout_content_class = 'col-sm-8 col-sm-push-4';
	$layout_sidebar_class = 'col-sm-4 col-sm-pull-8';

elseif ( $layout_style == 'no_sidebar' ) :
	$layout_content_class = '';
	$layout_sidebar_class = 'no-sidebar';

endif; ?>

	<!-- == CONTENT AREA == -->
	<div id="primary" class="content-area">
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- col -->
				<div class="<?php echo $layout_content_class; ?>">
					<!-- main -->
					<main id="main" class="site-main" role="main">
						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<div class="post-element post-element-header">
									<h1 class="page-title"><?php printf( esc_html__( 'Showing Results for: %s', 'aquarella-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
								</div>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</main>
					<!-- /main -->
				</div>
				<!-- /col -->
				<!-- col -->
				<div class="<?php echo $layout_sidebar_class; ?>">
					<?php get_sidebar(); ?>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>		
	</div>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>