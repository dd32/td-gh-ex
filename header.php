<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package altitude-lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'altitude-lite' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<div class="container">
				<div class="row align-items-center">
					<div class="site-logo">
		<?php
		the_custom_logo();
		if ( is_front_page() && is_home() ) :
			?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php
						else :
							?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;

						$altitude_lite_description = get_bloginfo( 'description', 'display' );
						if ( $altitude_lite_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $altitude_lite_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
					<div class="contact-details">
		<?php
		altitude_lite_address();
		altitude_lite_phone();
		altitude_lite_email();
		?>
					</div>
				</div>
			</div>
		</div><!-- .site-branding -->

	<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
			<div class="header-menu">
				<div class="container">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
							<i class="icon-menu"> </i>
							<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'altitude-lite' ); ?></span>
						</button>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			)
		);
		?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
	<?php endif; ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
