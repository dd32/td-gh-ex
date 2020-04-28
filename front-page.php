<?php

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
?>