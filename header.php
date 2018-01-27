<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package bb wedding bliss
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','bb-wedding-bliss'); ?></a></div>
  <div id="header">
    <div class="top-head">
      <div class="container">
        <div class="social-media col-md-6 col-sm-4 col-xs-12">
           <?php if( get_theme_mod( 'bb_wedding_bliss_youtube_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_youtube_url','' ) ); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_facebook_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_facebook_url','' ) ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_twitter_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_twitter_url','' ) ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_rss_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_rss_url','' ) ); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_insta_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_insta_url','' ) ); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_google_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_google_url','' ) ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'bb_wedding_bliss_pint_url','' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'bb_wedding_bliss_pint_url','' ) ); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
          <?php } ?>
        </div>
        <div class="top-contact col-md-2 col-xs-12 col-sm-4">
          <?php if( get_theme_mod( 'bb_wedding_bliss_contact','' ) != '') { ?>
            <span class="call"><?php echo esc_html( get_theme_mod('bb_wedding_bliss_contact',__('(123) 456 7890','bb-wedding-bliss') )); ?></span>
          <?php } ?>
        </div>   
        <div class="top-contact col-md-3 col-xs-12 col-sm-4">
          <?php if( get_theme_mod( 'bb_wedding_bliss_email','' ) != '') { ?>
            <span class="email"><?php echo esc_html( get_theme_mod('bb_wedding_bliss_email',__('example.com','bb-wedding-bliss')) ); ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="menubox col-md-9 col-sm-9 col-md-push-3">
        <div class="nav">
		      <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
        </div>
      </div>
      <div class="logo col-md-3 col-sm-3 wow  col-md-pull-9 bounceInDown">
	      <?php bb_wedding_bliss_the_custom_logo(); ?>
	      <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php
        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>