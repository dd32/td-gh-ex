<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
   
<?php if ( get_theme_mod( 'conica-site-layout' ) == 'conica-site-boxed' ) : ?>
<div class="site-boxed">
<?php endif; ?>

<?php get_template_part( '/templates/header/header' ); ?>

<?php if ( is_front_page() ) : ?>
    
    <?php get_template_part( '/templates/homepage-slider' ); ?>
    
<?php endif; ?>