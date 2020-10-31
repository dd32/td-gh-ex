<?php
/*
 * The header for displaying logo, menu, sidebar and header-image.
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'leftside' ); ?></a>
	<div id="sidebar">
		<div class="logo">
			<?php if ( get_theme_mod( 'leftside_logo' ) ) : ?>
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				<img src='<?php echo esc_url( get_theme_mod( 'leftside_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			<?php else : ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php if ( get_bloginfo('description') ) : ?>
					<div class="site-tagline"><?php bloginfo('description'); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<?php if ( get_theme_mod( 'leftside_show_menu_title' ) != "no" ) : ?>
				<?php if ( get_theme_mod( 'leftside_menu_title' ) ) {
					$menu_title = esc_attr( get_theme_mod( 'leftside_menu_title' ) );
				} else {
					$menu_title = esc_attr__( 'Menu', 'leftside' );
				} ?>
				<h3 class="nav-primary-title"><?php echo $menu_title; ?></h3>
			<?php endif; ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-primary' ) ); ?>
			<div class="mobile-nav-container">
				<button class="mobile-nav-toggle"><?php _e( 'Menu', 'leftside' ); ?><?php _e( ' +', 'leftside' ); ?></button>
				<div class="mobile-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if ( is_front_page() ) {?>
		<?php if ( get_header_image() ) {?>
			<div id="header-image-mobile">
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</div>
		<?php } ?>
		<?php } ?>
		<?php get_sidebar(); ?>
	</div>
	<?php if ( is_front_page() ) {?>
	<?php if ( get_header_image() ) {?>
		<div id="header-image">
			<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
		</div>
	<?php } ?>
	<?php } ?>
