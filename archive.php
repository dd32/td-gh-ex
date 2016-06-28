<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
get_header(); ?>
<div class="container">
	<div id="primary" class="content-area <?php bellini_blog_sidebar(); ?>">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				if ( esc_attr(get_option('bellini_layout_blog', 'layout-1')) == 'layout-1' ):
					get_template_part( 'template-parts/content' );
				endif;

				if ( esc_attr(get_option('bellini_layout_blog', 'layout-1')) == 'layout-5' ):
					get_template_part( 'template-parts/content-lb-5');
				endif;
				
			endwhile;
			bellini_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_sidebar('blog');?>
</div>
<?php get_footer(); ?>