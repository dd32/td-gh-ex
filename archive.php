<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Beauty Studio
 */
get_header();
global $beauty_studio_customizer_all_values;
?>
<div class="wrapper inner-main-title">
	<?php
	echo beauty_studio_get_header_normal_image();
	?>
	<div class="container">
		<header class="entry-header init-animate">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="taxonomy-description">', '</div>' );
			if( 1 == $beauty_studio_customizer_all_values['beauty-studio-show-breadcrumb'] ){
				beauty_studio_breadcrumbs();
			}
			?>
		</header><!-- .entry-header -->
	</div>
</div>
<div id="content" class="site-content container clearfix">
	<?php
	$sidebar_layout = beauty_studio_sidebar_selection();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '<div id="primary-wrap" class="clearfix">';
	}
	?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			if ( have_posts() ) :
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
				/**
				 * beauty_studio_action_posts_navigation hook
				 * @since Beauty Studio 1.0.0
				 *
				 * @hooked beauty_studio_posts_navigation - 10
				 */
				do_action( 'beauty_studio_action_posts_navigation' );
			else :
				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php
	get_sidebar( 'left' );
	get_sidebar();
	if( 'both-sidebar' == $sidebar_layout ) {
		echo '</div>';
	}
	?>
</div><!-- #content -->
<?php get_footer();