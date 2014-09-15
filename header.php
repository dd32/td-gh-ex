<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale = 1.0, user-scalable=0" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
global $cx_framework_options; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
<?php if ( $cx_framework_options[ 'cx-options-site-type' ] == 'site-layout-boxed' ) : ?>
<div class="site-boxed">
<?php endif; ?>

<?php get_template_part( '/includes/headers/header' ); ?>

<?php if ( is_front_page() ) : ?>
    
    <?php if ( $cx_framework_options[ 'cx-options-home-slider-enable' ] == 1 ) : ?>
    
        <?php get_template_part( '/includes/headers/homepage-slider' ); ?>
        
    <?php endif; ?>
    
<?php endif; ?>