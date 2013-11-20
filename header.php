<?php
/*
 * The header for displaying primary menu and header-image.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<div id="pre-header">
	<?php if ( has_nav_menu( 'primary' ) ) : ?> 
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-head' ) ); ?>
	<?php endif; ?>

</div>

<div id="header">

	<div class="logo">
		<h1><a href="<?php echo home_url() ; ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> </h1>
		<h4><?php bloginfo('description'); ?></h4> 
	</div>


	<?php if ( is_home() || is_front_page() ) {?> 
		<?php if ( get_header_image() ) {?> 
			<img src="<?php echo get_header_image(); ?>" class="header-img" alt="" /> 
		<?php } ?> 
	<?php } ?> 


	<div class="homepage"> 
	<?php if ( is_home() || is_front_page() ) {?> 
		<?php if ( is_active_sidebar( 'homepage' ) ) {?> 
	
		<?php dynamic_sidebar( 'homepage' ); ?>

	<?php } ?> 
	<?php } ?> 

	</div>

</div>