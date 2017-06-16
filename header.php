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
	<?php if ( has_nav_menu( 'primary' ) ) {?> 
	<div id="header-first">
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
	</div>
	<?php } ?> 

	<div id="header-second">
		<div class="logo"> 
			<?php if ( get_theme_mod( 'darkorange_logo' ) ) : ?> 
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'darkorange_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a> 
			<?php else : ?> 
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<h2><?php bloginfo('description'); ?></h2> 
			<?php endif; ?>
		</div>

		<?php if ( has_nav_menu( 'primary' ) ) {?>
			<div class="mobile-nav-toggle"><?php _e( 'Menu', 'darkorange' ); ?><?php _e( ' +', 'darkorange' ); ?></div>
			<div class="mobile-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div> 
		<?php } ?> 

		<?php if ( is_front_page() ) {?> 
		<?php if ( get_header_image() ) {?> 
			<div class="image-homepage"> 
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</div>
	
			<?php if ( is_active_sidebar( 'homepage' ) ) {?> 
			<div class="sidebar-homepage"> 
				<?php dynamic_sidebar( 'homepage' ); ?>
			</div>
			<?php } ?>
		<?php } ?>
 		<?php } ?> 
	</div>