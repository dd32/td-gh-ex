<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>

	<?php wp_head(); ?>
</head>
<?php 
	$class='theme-wide';
?>
<body <?php body_class(esc_attr($class)); ?> >
<div id="wrapper">
<?php get_template_part('template-parts/site','header'); ?>
<?php get_template_part('template-parts/site','navbar'); ?>