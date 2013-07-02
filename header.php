<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<title>
<?php
global $page, $paged;
wp_title( '|', true, 'right' );
bloginfo( 'name' );
?>
</title>
<?php
wp_head();
?>
</head>
<body <?php body_class();?> style="background: url(<?php header_image() ?>) no-repeat; ">
<div class="bg"> 
<div class="wrapper">
	<div id="header">
		<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		<div id="featured">
		<?php
		//Add the Slider
		get_template_part('slider');
		 ?>
		 </div>
	</div>
	<div id="main">
		<div id="header-menu"><?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?></div>