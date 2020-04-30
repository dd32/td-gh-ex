<?php
/**
* index.php
*
* @author    Franchi Design
* @package   Atomy
*/

get_header();
?>

	<div id="primary" class="content-area <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?> mt-5 mb-5">
		<div class="row">
		<main id="main" class="site-main <?php if (false == get_theme_mod( 'at_layout_sidebar_blog', false)):?>col-md-9<?php endif; ?>">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
		</main><!-- #main -->
		<?php if ( false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?>
		<div class="at-sidebar col-md-3">
   <?php get_sidebar(); ?>
	</div>
	<?php endif; ?>
	</div>
	</div><!-- #primary -->

<?php
get_footer();
 ?>
