<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>

	<!DOCTYPE html>
	<html <?php language_attributes();?>>

	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset');?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' );?>" />
		<?php endif; ?>
		<?php wp_head();?>
	</head>

	<body <?php body_class();?> >
		<?php /* start site warp */?>
		<?php $site_layout = get_theme_mod( 'site_layout', 'fluid' ); ?>
		<div id="site-wrapper" class=" site_layout <?php  echo $site_layout; ?> grid-container ">
			<div class="header-wrap">
				<?php get_template_part( 'template-parts/header/header', 'mobile' ); ?>
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				<?php get_template_part( 'template-parts/header/main', 'menu' ); ?>
			</div>
			<?php $topbg_gradient = get_theme_mod( 'topbg_gradient', '14' ); ?>
			<div id="content" class="site-mask  <?php echo $topbg_gradient ?>" id="sticky-anchor">
