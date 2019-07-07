<?php
/**
 * File aeonblog.
 *
 * @package   AeonBlog
 * @author    AeonWP <info@aeonwp.com>
 * @copyright Copyright (c) 2019, AeonWP
 * @link      https://aeonwp.com/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

$GLOBALS['aeonblog_theme_options'] = aeonblog_get_theme_options();
global $aeonblog_theme_options;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aeonblog' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<!-- Start Header Branding -->
			<div class="navbar-header site-branding">
				<?php
				the_custom_logo();

				if ( is_front_page() && is_home() ) {
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				} else {
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				}
				$aeonblog_description = get_bloginfo( 'description', 'display' );
				if ( $aeonblog_description || is_customize_preview() ) {
					?>
					<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $aeonblog_description; /* WPCS: xss ok. */ ?></a></p>
					<?php
				}
				?>
		</div>
		<!-- End Header Branding -->
	</div>
	<?php
	if ( has_nav_menu( 'primary' ) ) {
		?>
		<!-- Main Menu -->
		<nav id="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Header menu', 'aeonblog' ); ?>" class="main-navigation" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
		<button id="mobile-menu-toggle" aria-controls="main-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'aeonblog' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'main-menu',
				'depth'          => 2,
				'container'      => false,
			)
		);
		?>
		</nav><!-- #site-navigation -->
		<?php
	}
	?>
</header><!-- #masthead -->
<?php
if ( has_header_image() || is_front_page() ) {
	?>
	<div class="row">
		<?php aeonblog_header_image(); ?>
	</div>
	<?php
}

if ( ! is_page_template( 'elementor_header_footer' ) ) {
	?>
	<div id="content" class="blog-wrapper">
		<div class="container">
			<div class="row">
	<?php
}
