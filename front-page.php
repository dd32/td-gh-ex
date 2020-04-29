<?php
/**
 * The template for displaying the homepage
 *
 * @package Azuma
 */

if ( is_page_template( 'template-blank-canvas.php' ) ) {
	get_template_part( 'template-blank-canvas' );
} elseif ( is_page_template( 'template-landing-page.php' ) ) {
	get_template_part( 'template-landing-page' );
} elseif ( is_page_template( 'template-no-sidebar.php' ) ) {
	get_template_part( 'template-no-sidebar' );
} elseif ( is_page_template( 'template-transparent-header.php' ) ) {
	get_template_part( 'template-transparent-header' );
} else {

	get_header();

	if ( 'page' == get_option( 'show_on_front' ) ) {

		if ( ! is_active_sidebar( 'azuma-sidebar-homepage' ) ) {
			$page_full_width = ' full-width';
		} else {
			$page_full_width = '';
		}
	?>

		<div id="primary" class="content-area<?php echo $page_full_width;?>">
			<main id="main" class="site-main" role="main">

			<?php
			if ( get_theme_mod( 'woo_home_enable' ) ) {
				if ( class_exists( 'WooCommerce' ) ) {
					azuma_home_woo_section();
				} else {
					azuma_home_nonwoo_section();
				}
			} else {
				azuma_homepage_content();
			}
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php get_sidebar( 'homepage' ); ?>

	<?php get_footer(); ?>

	<?php
	} else {

		get_template_part( 'home' );

	}

}
