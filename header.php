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
<?php esc_html_e( 'Skip to content', 'agencyup' ); ?></a>
<div class="wrapper">
 <header class="bs-default">  
    <!--top-bar-->
    <?php $header_contact_info_enable = get_theme_mod('header_contact_info_enable','1');
        $header_social_icon_enable = get_theme_mod('header_social_icon_enable','1'); ?>
    <div class="bs-head-detail hidden-xs hidden-sm">
      <div class="container">
        
        <div class="row align-items-center">
          <div class="col-md-6 col-xs-12">
          <?php 
      		if($header_contact_info_enable == '1')
      		{ ?>
            <ul class="info-left">
                	<?php $agencyup_head_info_icon_one = get_theme_mod('agencyup_head_info_icon_one');
                	$agencyup_head_info_icon_one_text = get_theme_mod('agencyup_head_info_icon_one_text');
                	?>
              		<li><a><i class="fas <?php echo esc_attr($agencyup_head_info_icon_one); ?>"></i> 
              			<?php echo esc_html($agencyup_head_info_icon_one_text);?></a>
              		</li>
              		<?php $agencyup_head_info_icon_two = get_theme_mod('agencyup_head_info_icon_two');
              			$agencyup_head_info_icon_two_text = get_theme_mod('agencyup_head_info_icon_two_text');
              		?>
              		<li><a><i class="fas <?php echo esc_attr($agencyup_head_info_icon_two); ?>"></i>
              			<?php echo esc_html($agencyup_head_info_icon_two_text); ?></a>
              		</li>
            	</ul>
      <?php } ?>

          </div>
          <!--/col-md-6-->
          <div class="col-md-6 col-xs-12">
      <ul class="bs-social info-right">
      <?php if($header_social_icon_enable == 1)
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
           <div class="navbar-header col-12"> 
          <?php the_custom_logo(); 
                     if (display_header_text()) : ?>
                        <div class="site-branding-text navbar-brand">
                          <h1 class="site-title"> 
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                            <?php 
                            echo esc_html(get_bloginfo('name'));
                            ?>
                            </a>
                          </h1>
                              <p class="site-description"><?php bloginfo('description'); ?></p>
                          </div>
                      <?php endif; ?>
            <!-- navbar-toggle --> 
            <!-- /Logo --> 
          <div class="desk-header d-flex pl-3 ml-auto my-2 my-lg-0 position-relative align-items-center">
                <?php $hide_show_nav_menu_btn = get_theme_mod('hide_show_nav_menu_btn','1'); 
                $menu_btn_label = get_theme_mod('menu_btn_label');
                $menu_btn_link = get_theme_mod('menu_btn_link');
                $menu_btn_target = get_theme_mod('menu_btn_target','1');
                if($hide_show_nav_menu_btn == '1') { if($menu_btn_label) { ?>
                <a <?php if($menu_btn_target == '1') { ?> target ="_blank" <?php } ?> href="<?php echo esc_url($menu_btn_link); ?>" class="btn btn-theme"><?php echo esc_html($menu_btn_label); ?></a>
              <?php } } ?>
            <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="close fa fa-times"></span>
              <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
            </button>
            </div>
          </div>
        </div>
        <div class="container desk-menu">  
          <!-- Logo image -->  
           <div class="navbar-header"> 
            <?php the_custom_logo(); 
                  if (display_header_text()) : ?>
                    <div class="site-branding-text navbar-brand">
                      <h1 class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <?php 
                            echo esc_html(get_bloginfo('name'));
                          ?></a></h1>
                      <p class="site-description"><?php bloginfo('description'); ?></p>
                    </div>
            <?php endif; ?>
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
                <?php $hide_show_nav_menu_btn = get_theme_mod('hide_show_nav_menu_btn','1'); 
                $menu_btn_label = get_theme_mod('menu_btn_label');
                $menu_btn_link = get_theme_mod('menu_btn_link');
                $menu_btn_target = get_theme_mod('menu_btn_target','1');
				if($hide_show_nav_menu_btn == '1') { if($menu_btn_label) { ?>
                <a <?php if($menu_btn_target == '1') { ?> target ="_blank" <?php } ?> href="<?php echo esc_url($menu_btn_link); ?>" class="btn btn-theme"><?php echo esc_html($menu_btn_label); ?></a>
            	<?php } } ?>
          </div>
        </div>
      </nav>
    </div>
    <!--/main Menu Area-->
  </header>