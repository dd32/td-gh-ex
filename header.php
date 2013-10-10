<?php
/**
 * @subpackage Avedon
 * @since Avedon 1.08
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php get_template_part('helper/styling'); ?>
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>/js/lte-ie7.js" /><![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="navbar navbar-inverse <?php echo of_get_option('navbar_attachment'); ?>">
<div class="navbar-inner row-fluid">
<div class="span10 offset1">

<button type="button" class="btn btn-navbar avedonicon-reorder" data-toggle="collapse" data-target=".nav-collapse"></button>

<!-- MOBILE HEADER BUTTONS -->
<?php if ( of_get_option('emailicon') ) { ?>
<a href='mailto:<?php echo of_get_option('emailicon'); ?>' class="btn btn-navbar avedonicon-envelope-alt" title="Email"><img src="<?php echo get_template_directory_uri(); ?>/images/nothing.gif" alt="mail" /></a><?php } ?>
<?php if ( of_get_option('mapicon') ) { ?>
<a href='<?php echo of_get_option('mapicon'); ?>' class="btn btn-navbar avedonicon-map-marker" title="Map"><img src="<?php echo get_template_directory_uri(); ?>/images/nothing.gif" alt="map" /></a><?php } ?>
<?php if ( of_get_option('phoneicon') ) { ?>
<a href='tel:<?php echo of_get_option('phoneicon'); ?>' class="btn btn-navbar avedonicon-phone" title="Call Now."><img src="<?php echo get_template_directory_uri(); ?>/images/nothing.gif" alt="phone" /></a><?php } ?>

<a class="brand" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
<?php if ( of_get_option('primary_logo') ) { echo '<img src=' . of_get_option('primary_logo') . ' alt="home" />'; } else { echo bloginfo( 'name' ); } ?></a>

<?php wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 2, 'container_class' => 'nav-collapse collapse', 'menu_class' => 'nav', 'fallback_cb' => '', 'menu_id' => 'main-menu', 'walker' => new Avedon_Walker_Nav_Menu() ) ); ?>

</div>
</div>
</div>