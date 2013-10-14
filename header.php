<?php
/*
 * The header for displaying primary menu and header-image.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width" />
<meta charset="utf-8">

<?php
	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>
<body <?php body_class(); ?> >
<div id="container">
<div id="header">
	<div class="logo">
		<h1><a href="<?php echo home_url() ; ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> </h1>
		<h3><?php bloginfo('description'); ?></h3> 
	</div>

	<?php if ( has_nav_menu( 'primary' ) ) : ?> 
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
	<?php endif; ?>

	<?php if( is_home() || is_front_page() ) :?>
		<img src="<?php header_image(); ?>" class="header-img" alt="Header Image" />
	<?php endif;?>
</div>