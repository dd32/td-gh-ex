<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page">

<div id="header">
<div class="searchform header-search" >
<!-- Search --> 
<?php get_search_form(); ?>
</div>
<div class="blog-top">
<?php if (is_home()) { ?><h1><?php } ?>
<a class="blogtitle" href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a><?php if (is_home()) { ?></h1><?php } ?><div class="description"><?php bloginfo('description'); ?></div>
</div>	
</div>

<nav id="menu-header">
  <!-- Widgetized Nav -->  
 <?php if ( is_active_sidebar( 'nav-menu' ) ) : ?>
 <?php dynamic_sidebar( 'nav-menu' ); ?>
<?php endif; ?> 
</nav>