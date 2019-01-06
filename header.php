<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-ts">
 *
 * @package advance-education
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'advance-education' ) ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  
<div id="header-top">
  <div class="container">
    <div class="top-header">
      <div class="row m-0">
        <div class="col-lg-3 col-md-3 time">
          <?php if( get_theme_mod('advance_education_time') != ''){ ?>
            <span><?php echo esc_html( get_theme_mod('advance_education_time','')); ?></span>
          <?php } ?>
        </div>
        <div class="col-lg-2 col-md-3">
          <div class="phone">
            <?php if( get_theme_mod('advance_education_phone1') != ''){ ?>
              <i class="fas fa-phone"></i><span><?php echo esc_html( get_theme_mod('advance_education_phone1','' )); ?></span>
            <?php } ?>
          </div> 
        </div>
        <div class="col-lg-3 col-md-3 p-0">
          <div class="mail">
            <?php if( get_theme_mod('advance_education_mail1') != ''){ ?>
              <i class="fas fa-envelope"></i><span><?php echo esc_html( get_theme_mod('advance_education_mail1','')); ?></span>
            <?php } ?>
          </div>  
        </div>
        <div class="col-lg-4 col-md-3">
          <div class="account-btn">
            <a href="<?php the_permalink((get_option('woocommerce_myaccount_page_id'))); ?>"><?php echo esc_html_e('MY ACCOUNT','advance-education'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>  
</div>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','advance-education'); ?></a></div>

<?php get_template_part( 'template-parts/header/header-navigation' ); ?> 
