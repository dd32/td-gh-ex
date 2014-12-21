<?php
/**
 *Header template
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
<?php 
		$options = get_option('theme_options');
		$faviconurl = $options['favicon_url']; ?>
<link rel="shortcut icon" href="<?php echo $faviconurl; ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="main" >

<header class="site-header" role="banner">
		
        <div class="logo">
        <?php 
		$options = get_option('theme_options');
		$logourl = $options['logo_url'];
		if(!empty($logourl)){ ?>
			<div class="site-title logo-img"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo $logourl; ?>" alt="<?php bloginfo( 'name' ); ?>"></a></div>
		<?php }
		else{
		?>
        <hgroup>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</hgroup>
<?php } ?>
</div>
<div class="menu_search"><?php get_search_form(); ?></div>
<div class="header-ads-img">
		 
</div>

<div class="clear"></div>

		<nav class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'artikler' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'artikler' ); ?>"><?php _e( 'Skip to content', 'artikler' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
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

