<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-business
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-business' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-business'); ?></a></div>

<div id="header"> 
    <div class="container">
      <div class="menu-bar">
      <div class="row">
        <div class="logo col-lg-3 col-md-3">
          <?php if( has_custom_logo() ){ advance_business_the_custom_logo();
           }else{ ?>
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>       
          <?php endif; }?>
        </div>
        <div class="col-lg-8 col-md-8">
           <div class="main-menu">
            <div class="container">
              <div class="nav">
                <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-1 col-md-1">
          <div class="search-box">
          <i class="fas fa-search"></i>
        </div>
        </div>
      </div>
      <div class="serach_outer">
       <div class="closepop"><i class="far fa-window-close"></i></div>
       <div class="serach_inner">
         <?php get_search_form(); ?>
       </div>
     </div>
    </div>
    </div>
</div>