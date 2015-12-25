<?php
/*
 * The header for displaying menu and header-image.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?> >
<div id="container">

<div id="header">
	<div class="logo"> 
		<?php if ( get_theme_mod( 'darkelements_logo' ) ) : ?> 
			<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
			<img src='<?php echo esc_url( get_theme_mod( 'darkelements_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a> 
		<?php else : ?> 
			<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> </h1>
			<h4><?php bloginfo('description'); ?></h4> 
		<?php endif; ?>
	</div>

	<?php if ( has_nav_menu( 'primary' ) ) : ?> 
		<h4 class="nav-widgettitle">
			<?php _e('Navigation', 'darkelements'); ?>
		</h4>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
	<?php endif; ?>

	<?php if ( is_home() || is_front_page() ) {?> 
	<?php if ( get_header_image() ) {?> 
		<div id="header-image-mobile">
			<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
		</div>
	<?php } ?> 
	<?php } ?>

	<?php get_sidebar(); ?>
</div>

<?php if ( is_home() || is_front_page() ) {?> 
<?php if ( get_header_image() ) {?> 
	<div id="header-image">
		<img src="<?php echo get_header_image(); ?>" class="header-img" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
	</div>
<?php } ?> 
<?php } ?>