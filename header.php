<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Agencyup
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php esc_url(bloginfo( 'pingback_url' )); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'agencyup' ); ?></a>
<div class="wrapper">
 <header class="bs-default">  
    <!--top-bar-->
    <div class="bs-head-detail hidden-xs hidden-sm">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 col-xs-12">
            <?php $agencyup_head_info_one = get_theme_mod('agencyup_head_info_one');
                $agencyup_head_info_two = get_theme_mod('agencyup_head_info_two');
                if(($agencyup_head_info_one || $agencyup_head_info_two)) { ?>
                <ul class="info-left">
                <?php echo esc_html($agencyup_head_info_one);
                      echo esc_html($agencyup_head_info_two);
                ?> 
                </ul>
              <?php } ?>
          </div>
          <!--/col-md-6-->
          <div class="col-md-6 col-xs-12">
      <ul class="bs-social info-right">
      <?php 
      $header_social_icon_enable = get_theme_mod('header_social_icon_enable','on');
      if($header_social_icon_enable !='off')
      {
      $agencyup_header_fb_link = get_theme_mod('agencyup_header_fb_link');
      $agencyup_header_fb_target = get_theme_mod('agencyup_header_fb_target',1);
      $agencyup_header_twt_link = get_theme_mod('agencyup_header_twt_link');
      $agencyup_header_twt_target = get_theme_mod('agencyup_header_twt_target',1);
      $agencyup_header_lnkd_link = get_theme_mod('agencyup_header_lnkd_link');
      $agencyup_twitter_lnkd_target = get_theme_mod('agencyup_twitter_lnkd_target',1);
      $agencyup_header_insta_link = get_theme_mod('agencyup_header_insta_link');
      $agencyup_insta_lnkd_target = get_theme_mod('agencyup_insta_lnkd_target',1);
      ?>
      
      <?php if($agencyup_header_fb_link !=''){?>
      <li><span class="icon-soci"><a <?php if($agencyup_header_fb_target) { ?> target="_blank" <?php } ?>
      href="<?php echo esc_url($agencyup_header_fb_link); ?>"><i class="fab fa-facebook-f"></i></a></span> </li>
      <?php } if($agencyup_header_twt_link !=''){ ?>
      <li><span class="icon-soci"><a <?php if($agencyup_header_twt_target) { ?>target="_blank" <?php } ?>
      href="<?php echo esc_url($agencyup_header_twt_link);?>"><i class="fab fa-twitter"></i></a></span></li>
      <?php } if($agencyup_header_lnkd_link !=''){ ?>
      <li><span class="icon-soci"><a <?php if($agencyup_twitter_lnkd_target) { ?>target="_blank" <?php } ?> 
      href="<?php echo esc_url($agencyup_header_lnkd_link); ?>"><i class="fab fa-linkedin"></i></a></span></li>
      <?php } 
      if($agencyup_header_insta_link !=''){ ?>
      <li><span class="icon-soci"><a <?php if($agencyup_insta_lnkd_target) { ?>target="_blank" <?php } ?> 
      href="<?php echo esc_url($agencyup_header_insta_link); ?>"><i class="fab fa-instagram"></i></a></span></li>
      <?php } ?>
      </ul>
      <?php } ?>
    </div>
          <!--/col-md-6--> 
        </div>
      </div>
    </div>
    <!--/top-bar-->
    <div class="clearfix"></div>
    <!-- Main Menu Area-->
    <div class="bs-main-nav">
      <nav class="navbar navbar-expand-md navbar-wp">
          <div class="container mobi-menu"> 
           <!-- Logo image --> 
           <div class="navbar-header col"> 
        <?php if(has_custom_logo()) {
        // Display the Custom Logo
        the_custom_logo();
        } else { ?>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
        <span> <?php bloginfo('name'); ?> </span> <br>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <span class="site-description"><?php echo $description; ?></span> 
        <?php endif;?></a><?php }?>
            <!-- navbar-toggle --> 
            <!-- /Logo --> 
            <div class="desk-header ml-auto position-relative align-items-center">
                        <div class="dropdown show mg-search-box">
                            <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fa fa-search"></i>
                            </a>
                            <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                                <form method="get" id="searchform" action="#" class="navbar-form mg-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="s" id="s" placeholder="<?phph echo esc_attr_e('Search','agencyup'); ?>">
                                        <span class="input-group-btn">
                                            <button class="btn" type="submit"> 
                                            <span class="fa fa-search"></span>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="close fa fa-times"></span>
              <span class="navbar-toggler-icon"><i class="fas fa-bars" s></i></span>
            </button>
          </div>
        </div>
        <div class="container desk-menu">  
          <!-- Logo image -->  
           <div class="navbar-header"> 
        <?php if(has_custom_logo()) {
        // Display the Custom Logo
        the_custom_logo();
        } else { ?>
        <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"> 
        <span> <?php bloginfo('name'); ?> </span> <br>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <span class="site-description"><?php echo $description; ?></span> 
        <?php endif;?></a><?php }?>
            <!-- navbar-toggle -->
            
          </div>
          <!-- /Logo -->
          <!-- /navbar-toggle --> 
          <!-- Navigation -->
           <div class="collapse navbar-collapse">
           <?php wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'  => 'collapse navbar-collapse',
                'menu_class' => 'nav navbar-nav ml-auto',
                'fallback_cb' => 'agencyup_fallback_page_menu',
                'walker' => new agencyup_nav_walker()
              ) ); 
      ?>
          </div>
          <div class="desk-header d-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                <div class="dropdown show mg-search-box">
                    <a class="dropdown-toggle msearch ml-auto" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fa fa-search"></i>
                    </a>
                    <div class="dropdown-menu searchinner" aria-labelledby="dropdownMenuLink">
                        <form method="get" id="searchform" action="#" class="navbar-form mg-search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e('Search','agencyup'); ?>">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit"> 
                                    <span class="fa fa-search"></span>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <a href="#" class="btn btn-theme ml-1">Get Quote</a>
          </div>
        </div>
      </nav>
    </div>
    <!--/main Menu Area-->
  </header>