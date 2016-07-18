<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bellini
 */
global $bellini;
get_header(); ?>
<div id="primary" class="content-area <?php bellini_blog_sidebar(); ?>">
<main id="main" class="site-main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
<section class="bellini__canvas">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				if ( absint($bellini['bellini_layout_blog']) === 1 ):
					get_template_part( 'template-parts/content' );
				endif;


				if ( absint($bellini['bellini_layout_blog']) === 5 ):
					get_template_part( 'template-parts/content-lb-5');
				endif;
			endwhile;
			bellini_pagination();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
</section>
</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar('blog');
get_footer();
?>