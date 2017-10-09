<?php
/**
 * The Header for our theme.
 *
 *
 * @package Adagio Lite
 */
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<?php if ( is_front_page ()) : ?>
<div class="slogan">
  <h2 class="site-description"> <span>
    <?php bloginfo( 'description' ); ?>
    </span> </h2>
</div>
<div id="line-arrow"></div>
<?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'div',
							'container_id'    => 'menu-social',
							'container_class' => 'top-social-menu',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
	} ?>
<?php endif ?>
<div id="header">
  <div id="headerin">
    <div id="headerline">
      <div id="logo">
        <?php the_custom_logo(); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        <h1 class="site-title">
          <?php bloginfo( 'name' ); ?>
        </h1>
        </a> </div>
      <?php if ( has_nav_menu( 'main-menu' ) || has_nav_menu( 'secondary-menu' ) || is_active_sidebar( 'sidebar-1' ) ) : ?>
      <div class="menu-button"> <a class="btn-open" href="#a">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        </a> </div>
      <div class="overlay">
        <div class="inner-overlay">
          <?php if ( has_nav_menu( 'main-menu' ) ) {
    				wp_nav_menu( 
						array( 
							'theme_location' => 'main-menu', 
							'container_class'   => 'mainmenu',
							'menu_class' 	 => '',
							'fallback_cb'	 => false
						)
					);
  					} ?>
          <?php if ( has_nav_menu( 'secondary-menu' ) ) {
    				wp_nav_menu( 
						array( 
							'theme_location' => 'secondary-menu', 
							'container_class'   => 'secondary-menu',
							'menu_class' 	 => '',
							'fallback_cb'	 => false
						)
					);
  					} ?>
          <?php get_sidebar(); ?>
        </div>
      </div>
      <?php endif ?>
    </div>
  </div>
</div>
<div id="wrapper">
<?php if (is_front_page() && ( has_header_image() || is_active_sidebar( 'sidebar-2' ) )) {
  			get_template_part( 'topsection' );
		} ?>
