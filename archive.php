<?php
/**
* archive.php
*
* @author    Franchi Design
* @package   Atomy
*/

get_header('cat'); 

if ( false == get_theme_mod('atomy_enable_breadcrumbs_blog',false)) :?>
<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?> at-woocommerce-breadcrumbs">
<?php atomy_custom_breadcrumbs(); ?>
</div>
<?php endif;?>

<div id="primary" class="content-area <?php echo esc_attr( get_theme_mod('atomy_enable_full_width_body','container') )?>">
	  <div class="row">
		<main id="main" class="at-archive site-main <?php if ( false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?>col-md-9 <?php endif; ?>">
		<?php if ( have_posts() ) : ?>
         <header class="page-header">
	       <?php
	       the_archive_title( '<h1 class="page-title">', '</h1>' );
	       the_archive_description( '<div class="archive-description">', '</div>' );
	       ?>
         </header><!-- .page-header -->
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/contentcat', get_post_type() );
			endwhile;
			the_posts_navigation();
		    else :
			get_template_part( 'template-parts/content', 'none' );
		    endif;
		    ?>
		</main><!-- #main -->
		<?php if ( false == get_theme_mod( 'at_layout_sidebar_blog', false) ):?>
		<div class="at-sidebar at-sid-blog col-md-3 pl-0 mt-0">
   <?php get_sidebar(); ?>
</div>
<?php endif; ?>
</div>
</div><!-- #primary -->
<?php
get_footer();
