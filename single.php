<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<main id="main" class="site-main" role="main">			
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_format() );

							the_post_navigation();

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>							
					</main>
				</div>
				<!-- /col -->
				<!-- col -->
				<div class="<?php echo $layout_sidebar_class; ?>">
					<?php get_sidebar(); ?>
				</div>
				<!-- /col -->
			</div>
			<!-- / row -->
		</div>		
	</div>
	<!-- == /CONTENT AREA == -->

<?php get_footer(); ?>
