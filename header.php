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
	} else {
		$main_content = '#content';
	} ?>
	<a class="skip-link screen-reader-text" href="<?php echo $main_content; ?>"><?php _e( 'Skip to content', 'bluegray' ); ?></a>
	<div id="header-first">
		<div class="logo">
			<?php if ( get_theme_mod( 'bluegray_logo' ) ) : ?>
				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
				<img src='<?php echo esc_url( get_theme_mod( 'bluegray_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
			<?php else : ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
				<?php if ( get_bloginfo('description') ) : ?>
					<div class="site-tagline"><?php bloginfo('description'); ?></div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
	<div id="header-second">
		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<div class="nav-head-container">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
			</div>
			<div class="mobile-nav-container">
				<button class="mobile-nav-toggle"><?php _e( 'Menu', 'bluegray' ); ?><?php _e( ' +', 'bluegray' ); ?></button>
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
	<div id="main-content">
		<?php if( is_front_page() ) {?>
		<?php if ( is_active_sidebar( 'homepage-right' ) || is_active_sidebar( 'homepage-middle' ) || is_active_sidebar( 'homepage-left' ) ) { ?>
			<div id="homepage-widgets" role="complementary">
				<div class="home-left">
					<?php dynamic_sidebar( 'homepage-left' ); ?>
				</div>
				<div class="home-middle">
					<?php dynamic_sidebar( 'homepage-middle' ); ?>
				</div>
				<div class="home-right">
					<?php dynamic_sidebar( 'homepage-right' ); ?>
				</div>
			</div>
		<?php } ?>
		<?php } ?>
