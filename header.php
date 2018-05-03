<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Simple
 */

?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'best-simple' ); ?></a>
	<?php if ( is_home() && is_front_page() && has_custom_header() ) : ?>
		<header id="masthead" class="site-header custom-header">
	<?php else : ?>
		<header id="masthead" class="site-header">
	<?php endif ?>
		<div class="wrap">
			<div class="site-branding">
				<?php
					$best_simple_logo_control = get_theme_mod( 'custom_logo' );
					$best_simple_logo         = wp_get_attachment_image_src( $best_simple_logo_control, 'full' );
					$best_simple_site_title   = get_bloginfo( 'name' );
					$best_simple_site_url     = home_url();

				if ( is_front_page() && is_home() ) {
					if ( has_custom_logo() ) {
						echo '<a class="logo-is-here" href="' . esc_url( $best_simple_site_url ) . '" rel="home"><img src="' . esc_url( $best_simple_logo[0] ) . '"></a>';
					} elseif ( display_header_text() === false ) {
						echo '<h1 class="site-title-hidden"><a href="' . esc_url( $best_simple_site_url ) . '" rel="home"> ' . esc_attr( $best_simple_site_title ) . ' </a></h1>';
					} else {
						echo '<h1 class="site-title"><a href="' . esc_url( $best_simple_site_url ) . '" rel="home"> ' . esc_attr( $best_simple_site_title ) . ' </a></h1>';
					}
				} else {

					if ( has_custom_logo() ) {
						echo '<a href="' . esc_url( $best_simple_site_url ) . '" rel="home"><img src="' . esc_url( $best_simple_logo[0] ) . '"></a>';
					} elseif ( display_header_text() === false ) {
						echo '<h1 class="site-title-hidden"><a href="' . esc_url( $best_simple_site_url ) . '" rel="home"> ' . esc_attr( $best_simple_site_title ) . ' </a></h1>';
					} else {
						echo '<p class="site-title"><a href="' . esc_url( $best_simple_site_url ) . '" rel="home"> ' . esc_attr( $best_simple_site_title ) . ' </a></p>';
					}
				}
				?>
				<?php
					$best_simple_description = get_bloginfo( 'description', 'display' );
				if ( display_header_text() === true ) {
					echo '<p class="site-description">' . esc_attr( $best_simple_description ) . '</p>';
				} else {
					echo '<p class="site-description-hidden">' . esc_attr( $best_simple_description ) . '</p>';
				}
				?>

			</div><!-- .site-branding -->

			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'best-simple' ); ?></button>

			<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-menu',
						'menu_id'        => 'primary-menu',
					)
				);
			?>
			</nav>
		</div>
	</header><!-- #masthead -->
	<?php if ( get_header_image() ) : ?>
		<?php if ( is_home() || is_front_page() ) : ?>
			<div class="hero">
				<?php
					$best_simple_custom_header_width  = get_custom_header()->width;
					$best_simple_custom_header_height = get_custom_header()->height;
				?>
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( $best_simple_custom_header_width ); ?>" height="<?php echo esc_attr( $best_simple_custom_header_height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">

				<?php
				if ( is_active_sidebar( 'home-hero' ) ) {
					dynamic_sidebar( 'home-hero' );
				}
				?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( is_single() ) : ?>
		<div class="bcrumb">
			<div class="wrap">
				<div class="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
						<?php best_simple_breadcrumb(); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( is_single() || is_singular( 'page' ) ) : ?>
		<div id="content" class="site-content">
	<?php else : ?>

		<?php
			$best_simple_customizer_authorbio = get_theme_mod( 'best_simple_homepage_layout_settings', 'grid' );

		if ( 'grid' === $best_simple_customizer_authorbio ) {
			echo '<div id="content" class="site-content bs-grid-layout">';
		} elseif ( 'left-sidebar' === $best_simple_customizer_authorbio ) {
			echo '<div id="content" class="site-content bs-left-sidebar">';
		} elseif ( 'right-sidebar' === $best_simple_customizer_authorbio ) {
			echo '<div id="content" class="site-content bs-right-sidebar">';
		}
		?>

	<?php endif; ?>
		<div class="wrap">
