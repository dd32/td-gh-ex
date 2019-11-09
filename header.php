<?php
/**
 * The header for this theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Aari
 * @version 1.0.2
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aari' ); ?></a>

<!-- Nav Sidebar -->
<aside id="topSidebar">
	<div class="sidebar">

		<button class="icon">
			<span></span>
			<span></span>
			<span></span>
		</button>

		<!-- Logo -->
		<?php
		if ( aari_custom_logo_dark() !== false ) {
			echo wp_kses_post( aari_custom_logo_dark() );
		} else {
			echo wp_kses_post( aari_text_logo_display() );
		}
		?>
		<!-- End Logo -->

		<!-- Navbar -->
		<nav class="navbar">
			<div class="navbar-collapse">
			</div>
		</nav>
		<!-- End Navbar -->

	</div>
</aside>
<!-- End Nav Sidebar
================================================== -->


<!-- Main Content
================================================== -->
<main id="mainContent">
	<div class="sidebar-overlay"></div>

	<!-- Nav Bar
	================================================== -->
	<div id="masthead" class="header-controller text-center <?php echo ( is_front_page() && is_home() ) ? '' : 'header-overlay'; ?>">
		<div class="container">
			<nav id="nav" class="navbar navbar-expand-lg <?php echo ( is_front_page() && is_home() ) ? 'nav-overlay' : ''; ?>">

				<?php
				if ( aari_custom_logo_dark() !== false ) {
					echo wp_kses_post( aari_custom_logo_dark() );
				} else {
					echo wp_kses_post( aari_text_logo_display() );
				}
				?>


				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="site-navigation" class="collapse navbar-collapse main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'menu_id'         => 'primary-menu',
								'depth'           => 5,
								'container'       => 'ul',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'bs-example-navbar-collapse-1',
								'menu_class'      => 'nav-menu navbar-nav ml-auto',
								'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
								'walker'          => new WP_Bootstrap_Navwalker(),
							)
						);
						?>
					</nav>
				<?php endif; ?>

				<div class="search_trigger">

					<?php
					echo ( get_theme_mod( 'aari_search' ) && has_nav_menu( 'primary' ) ) ? '<a class="nav-search search-trigger" href="#"><span class="jam jam-search"></span></a>' : '';
					?>

					<button class="icon" aria-controls="primary-menu" aria-expanded="false">
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>

			</nav>
		</div>
	</div>

	<!-- search form -->
	<?php
	( get_theme_mod( 'aari_search' ) && has_nav_menu( 'primary' ) ) ? aari_search_form() : '';

	?>
	<!-- search form -->











