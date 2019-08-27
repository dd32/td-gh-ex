<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package appdetail
 */
get_header();
global $appdetail_theme_options; ?>
<section class="pb-160 blog-inner-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
				<?php if ( have_posts() ) :
					/* Start the Loop */
					while ( have_posts() ) : the_post();
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					do_action('appdetail_action_navigation');

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif; ?>
				</div><!-- #primary -->
					<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
<?php
get_footer();