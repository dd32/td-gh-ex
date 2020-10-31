<?php
/*
 * The header for displaying logo, menu, header-image and homepage-widgets.
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
	<?php if ( is_page_template( 'page-full.php' ) || is_page_template( 'single-full.php' ) ) {
		$main_content = '#content-full';
	} else if ( is_home() ) {
		$main_content = '#content-full';
	} else {
		$main_content = '#content';
	} ?>
	<a class="skip-link screen-reader-text" href="<?php echo $main_content; ?>"><?php _e( 'Skip to content', 'darkorange' ); ?></a>
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
				<?php if ( get_bloginfo('description') ) : ?>
					<div class="site-tagline"><?php bloginfo('description'); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php if ( has_nav_menu( 'primary' ) ) {?>
			<div class="mobile-nav-container">
				<button class="mobile-nav-toggle"><?php _e( 'Menu', 'darkorange' ); ?><?php _e( ' +', 'darkorange' ); ?></button>
				<div class="mobile-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		<?php } ?>
		<?php if ( is_front_page() ) {?>
		<?php if ( get_header_image() ) {?>
			<div class="image-homepage">
				<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
			</div>
			<?php if ( is_active_sidebar( 'homepage' ) ) {?>
				<div class="sidebar-homepage" role="complementary">
					<?php dynamic_sidebar( 'homepage' ); ?>
				</div>
			<?php } ?>
		<?php } ?>
 		<?php } ?>
	</div>
