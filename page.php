<?php
/**
* page.php
*
* @author    Franchi Design
* @package   Atomy
*/
get_header('portfolio');
if ( false == get_theme_mod('atomy_enable_breadcrumbs_page',false)) :?>
<div class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_header','container'))?> at-woocommerce-breadcrumbs">
<?php atomy_custom_breadcrumbs(); ?>
</div>
<?php endif;?>
	
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	
<?php
get_footer();
