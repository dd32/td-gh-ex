<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage JATheme
 * @since JATheme 1.0
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="main" >

<header class="site-header" role="banner">
		
        <div class="logo">
		<?php /*?><?php if ( is_home() || is_single() || is_page() || is_category() || is_tag() || is_archive() || is_search ) :
			 ?> <a href=" <?php bloginfo('url') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/jathemelogo.png"</a>
		<?php else : ?><?php */?>
        <hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</hgroup>
<?php /*?><?php endif; ?>
<?php */?></div>

<div class="header-ads-img">
		<?php values_get_ad_180_150(); ?>
</div>

<div class="social">
<ul>

<li><a class="faceb" href="<?php values_get_fb();?>" target="_blank">F</a></li>
<li><a class="twit" href="<?php values_get_tw();?>" target="_blank">T</a></li>
<li><a class="googlep" href="<?php values_get_gp();?>" target="_blank">G</a></li>
<li><a class="linki" href="<?php values_get_li();?>" target="_blank">IN</a></li>
</ul>
</div>
<div class="clear"></div>

		<nav class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'jatheme' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'jatheme' ); ?>"><?php _e( 'Skip to content', 'jatheme' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
            <div class="menu_search"><?php get_search_form(); ?></div>
		</nav><!-- #site-navigation -->
        
<div class="clear"></div>
<div class="head-img">
		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
        	<?php endif; ?>
        </div>
	</header><!-- site-header -->
    <div class="clear"></div>
    
    
<div class="wrapper">

