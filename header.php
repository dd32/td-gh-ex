<?php
/*
 * The header for displaying logo, menu, header-image and homepage-widgets.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >
<div id="container">
	<div id="header-first">
		<div class="logo"> 
			<?php if ( get_theme_mod( 'privatebusiness_logo' ) ) : ?> 
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				<img src='<?php echo esc_url( get_theme_mod( 'privatebusiness_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a> 
			<?php else : ?> 
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2><?php bloginfo('description'); ?></h2> 
			<?php endif; ?>
		</div>
		<?php if ( has_nav_menu( 'secondary' ) ) : ?> 
			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container_class' => 'nav-head-secondary' ) ); ?>
			<div class="mobile-nav-secondary-toggle"><?php _e( 'Menu', 'privatebusiness' ); ?><?php _e( ' +', 'privatebusiness' ); ?></div>
			<div class="mobile-nav-secondary">
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			</div>
		<?php endif; ?>
	</div>

	<div id="header-second">
		<?php if ( has_nav_menu( 'primary' ) ) : ?> 
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head-primary' ) ); ?>
			<div class="mobile-nav-primary-toggle"><?php _e( 'Menu', 'privatebusiness' ); ?><?php _e( ' +', 'privatebusiness' ); ?></div>
			<div class="mobile-nav-primary">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_front_page() ) {?> 
			<?php if ( get_header_image() ) {?> 
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			<?php } ?> 
		<?php } ?> 
	</div>

	<?php if( is_front_page() ) { ?>
	<?php if ( is_active_sidebar( 'homepage-right' ) || is_active_sidebar( 'homepage-left' ) ) { ?>
		<div id="homepage-widgets">
			<div class="home-right"> 
				<?php dynamic_sidebar( 'homepage-right' ); ?>
			</div>
		
			<div class="home-left"> 
				<?php dynamic_sidebar( 'homepage-left' ); ?>
			</div>
		</div>
	<?php } ?> 
	<?php } ?> 