<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package URVR
 */
global $urvr;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php if( isset( $urvr['ipad-icon-retina'] ) ) : ?>
	<!-- For third-generation iPad with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $urvr['ipad-icon-retina']['url']; ?>">
<?php endif; ?>

<?php if( isset( $urvr['iphone-icon-retina'] ) ) : ?>
	<!-- For iPhone with high-resolution Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $urvr['iphone-icon-retina']['url']; ?>">
<?php endif; ?>

<?php if( isset( $urvr['ipad-icon'] ) ) : ?>
	<!-- For first- and second-generation iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $urvr['ipad-icon']['url']; ?>">
<?php endif; ?>

<?php if( isset( $urvr['iphone-icon'] ) ) : ?>
	<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $urvr['iphone-icon']['url']; ?>">
<?php endif; ?>

<?php if( isset( $urvr['favicon'] ) ) : ?>
	<link rel="icon" href="<?php echo $urvr['favicon']['url']; ?>">
<?php endif; ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<?php if( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" style="position: absolute;" />
	<?php endif; ?>
	<header id="masthead" class="site-header header-wrap" role="banner">
		<div class="container">
			<div class="row">
				<div class="span3">
					<div class="logo site-branding">
						<?php if( isset( $urvr['site-title'] ) && isset( $urvr['custom-logo'] ) && $urvr['site-title'] ) : ?>
							<img src="<?php echo $urvr['custom-logo']['url']; ?>" alt="logo" >
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php if( isset( $urvr['site-description'] ) && $urvr['site-description'] != 0 ) : ?>
								<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
							<?php endif; ?>
						<?php endif; ?>
						<?php if( ! isset( $urvr['site-description'] ) ) : ?>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						<?php endif; ?>
					</div>
				</div>

				<div class="span9">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<h1 class="menu-toggle"><?php _e( 'Menu', TEXTDOMAIN ); ?></h1>
						<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', TEXTDOMAIN ); ?></a>
						<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
<?php	if (! is_front_page() ) : ?>
	<div id="content" class="site-content container">
<?php endif; ?>