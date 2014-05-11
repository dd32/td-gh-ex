<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<a href="#wrapper" class="keyboard-shortcut"><?php _e('Skip to content', 'bunny' );?></a>

<div id="header" role="banner">
		<?php wp_nav_menu( array( 'theme_location' => 'header', 'container' => 'div', 'container_id' => 'header-menu' ) ); ?>

		<!-- mobile menu -->
		<a href="#" id="mobile-menu" title="<?php esc_attr_e( 'Show and hide menu', 'bunny' ); ?>"></a>
		<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_class' => 'nav-menu' ) ); ?>
		<!-- End mobile menu -->

	<div class="logo">
	<?php
	if( get_theme_mod( 'bunny_logo' ) ) {
		echo '<img src="' . get_theme_mod( 'bunny_logo' ) . '">';
	}else{
	?>
		<img src="<?php echo get_template_directory_uri()?>/images/cloud-large.png" height="146px" width="316px"/>
	<?php
	}
	?>
	</div>
	<h1 class="site-title" id="headline"><?php bloginfo( 'name' ); ?></h1>
	<h2 class="site-description" id="tagline"><?php bloginfo( 'description' ); ?></h2>
</div>

<div id="sol" class="sol"></div>
<div id="far-clouds" class="far-clouds stage"></div>
<div id="near-clouds" class="near-clouds stage"></div>

<div id="kaninf" class="kaninf"></div>
<div id="grass" class="grass"></div>
<div id="wrapper" role="main">