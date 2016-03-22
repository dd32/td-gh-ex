<?php
/**
 *
 * @package Barletta
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="author" content="">
		<link rel="icon" href="favicon.ico">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<header class="header">
			<?php if ( get_theme_mod( 'barletta_logo' ) ) : ?>
				<div class='site-logo'>
					<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( get_theme_mod( 'barletta_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				</div>
			<?php else : ?>
				<hgroup>
					<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
					<div class="description"><?php bloginfo('description'); ?></div>
				</hgroup>
			<?php endif; ?>
		</header>

		<!-- Navigation -->
		<nav class="navbar" role="navigation">
			<div class="container">
		<!-- Brand and toggle get grouped for better mobile display --> 
		  <div class="navbar-header"> 
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
			  <span class="sr-only">Toggle navigation</span> 
			  <span class="icon-bar"></span> 
			  <span class="icon-bar"></span> 
			  <span class="icon-bar"></span> 
			</button> 
		  </div> 

		<?php barletta_header_menu(); // main navigation ?>

		</div>
		</nav>
		<!-- End: Navigation -->

		<?php barletta_slider(); ?>

	<?php
		global $post;
		if( is_singular() && get_post_meta($post->ID, 'site_layout', true) ){
			$layout_class = get_post_meta($post->ID, 'site_layout', true);
		}
		else{
			$layout_class = get_theme_mod( 'barletta_sidebar_position' );
		}
		if ($layout_class == '') $layout_class = "mz-sidebar-right";
	?>

		<div class="container">
		<section>
			<div class="row">
				<div class="<?php echo barletta_content_bootstrap_classes(); ?> <?php echo $layout_class; ?>">
