<?php
/*
 * The header for displaying logo, menu and header-image.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="container">
	<div id="header">
		<div class="logo">
			<?php if ( get_theme_mod( 'shipyard_logo' ) ) : ?>
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'shipyard_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			<?php else : ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php if ( get_bloginfo('description') ) : ?>
					<div class="site-tagline"><?php bloginfo('description'); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
			<div class="mobile-nav-container">
				<div class="mobile-nav-toggle"><?php _e( 'Menu', 'shipyard' ); ?><?php _e( ' +', 'shipyard' ); ?></div>
				<div class="mobile-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		<?php endif; ?>

		<?php if ( is_front_page() ) {?>
			<?php if ( get_header_image() ) {?>
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			<?php } ?>
		<?php } ?>
	</div>
