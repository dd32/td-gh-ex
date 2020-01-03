<!doctype html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#f7941e" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>

</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header id="header">
		<a class="skip-link button" href="#content"><?php _e( 'Skip to Content', 'arix' ); ?></a>

		<nav id="nav">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			}
			?>

			<?php
			wp_nav_menu( array(
				'theme_location' => 'main_menu',
				'menu'           => __( 'Main Menu', 'arix' ),
				'depth'          => 2,
				'fallback_cb'    => false,
				'items_wrap'     => '
					<a class="mobile-nav open" href="#nav">
						<svg viewBox="0 0 24 24">
						<rect x="3" y="11" width="18" height="2" />
						<rect x="3" y="16" width="18" height="2" />
						<rect x="3" y="6" width="18" height="2" />
						</svg>
					</a>
					<a class="mobile-nav close" href="#">
						<svg viewBox="0 0 24 24">
						<rect x="11" y="3" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9706 12)" width="2" height="18" />
						<rect x="3" y="11" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -4.9706 12)" width="18" height="2" />
						</svg>
					</a>
					<ul id="%1$s" class="%2$s">%3$s</ul>',
			) );
			?>
		</nav>

		<div class="margin">
			<div id="hero" class="clear">
				<div class="two-thirds">
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<h3><?php bloginfo( 'description' ); ?></h3>
				</div>
			</div>
		</div>
	</header>


	<div class="wrap">
		<div id="content">
