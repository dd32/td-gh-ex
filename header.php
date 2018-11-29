<?php
/**
 * The Header template.
 */
$top_mag_options = get_option( 'topmag_theme_options' );
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js no-svg">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11"> 
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- header -->
<header>
  <div class="container container-magzemine"> 
    <!-- LOGO AND TEXT -->
    <div class="row">
      <div class="col-md-4 header-logo">
      <?php if(has_custom_logo() ): 
        the_custom_logo();
      endif; 
       if(display_header_text()){ ?>
      <h1><?php echo esc_html(get_bloginfo('name')); ?></h1>
      <p class="top-mag-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p>
     <?php } ?>
      </div>
     <div class="col-md-8 header-text"> 
      <?php  if(get_theme_mod('hide_banner_header_section', isset($top_mag_options['display-banner'])?$top_mag_options['display-banner']:'' )!=''){ ?>
          <div class="custom-header-img">
            	<?php 
              $banner_html=get_theme_mod('banner_ad_html_code',$top_mag_options['banner-html']);              
              if(get_theme_mod('banner_ad_image') != "")
              {
                $banner_ads = wp_get_attachment_url(get_theme_mod('banner_ad_image'));  
              }
              else
              {
                $banner_ads = $top_mag_options['banner-ads'];  
              }
            if(empty($banner_html) && !empty($banner_ads)) { 
						if(get_theme_mod('banner_ad_link',isset($top_mag_options['banneradslink'])?$top_mag_options['banneradslink']:'') != "") { ?>
                		<a href="<?php echo esc_url(get_theme_mod('banner_ad_link',$top_mag_options['banneradslink'])); ?>" target="_blank"><img width="860" height="90" src="<?php echo esc_url($banner_ads); ?>" class="img-responsive" /></a>
                <?php } else { ?>
                		<img width="860" height="90" src="<?php echo esc_url($banner_ads); ?>" class="img-responsive" />
    				<?php } 
    				} else { 
					   echo wp_kses_post(get_theme_mod('banner_ad_html_code',$top_mag_options['banner-html'])); 
		        } ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <!-- END LOGO AND TEXT --> 
    <!-- MENU -->
    <div class="col-md-12 no-padding">
      <nav role="navigation" class="navbar navbar-default"> 
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle"> <span class="sr-only">
          <?php esc_html_e('Toggle navigation','top-mag'); ?>
          </span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="<?php echo esc_url(site_url()); ?>" class="home-icon"><i class="fa fa-home"></i></a> </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse menu">
          <?php
				$top_mag_menu_args = array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu-header-menu-container',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="nav navbar-nav top-mag-menu">%3$s</ul>',
							'depth'           => 0,
				);
				
				wp_nav_menu( $top_mag_menu_args );
			
		?>
        </div>
      </nav>
    </div>
    <!-- END MENU --> 
  </div>
</header>
<!-- End header -->
<div class="container container-magzemine no-padding">
<?php top_mag_breaking_news(); ?>