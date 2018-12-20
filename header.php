<?php
/**
 * The Header template for our theme
 */
 $medics_options = get_option( 'medics_theme_options' ); ?>
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
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- header -->
<header> 
  <!-- TOP HEADER -->
  <?php 
  $SocialIconDefault = array(
              array('url'=>isset($medics_options['fburl'])?$medics_options['fburl']:'','icon'=>'fa-facebook'),
              array('url'=>isset($medics_options['twitter'])?$medics_options['twitter']:'','icon'=>'fa-twitter'),
              array('url'=>isset($medics_options['googleplus'])?$medics_options['googleplus']:'','icon'=>'fa-google-plus'),  
            );
  $social_links_flag=""; 
  for($i=1; $i<=3; $i++) : 
      if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''):
       $social_links_flag=true; 
      endif;
  endfor;
  if((get_theme_mod('phone_title',isset($medics_options['helpline'])?$medics_options['helpline']:'') != '') || (get_theme_mod('email',isset($medics_options['email'])?$medics_options['email']:'') != '') || $social_links_flag !='' ) {  ?>
  <div class="col-md-12 top-header no-padding ">
    <div class="container container-medics">
      <div class="col-md-6 help-line">
        <?php if(get_theme_mod('phone_title',isset($medics_options['helpline'])?$medics_options['helpline']:'') != '') { ?>
        <span><?php echo esc_attr(get_theme_mod('phone_title',isset($medics_options['helpline'])?$medics_options['helpline']:'')).' : '.esc_attr(get_theme_mod('phone',isset($medics_options['phone'])?$medics_options['phone']:''));?> </span>
        <?php } ?>
      </div>
      <div class="col-md-6 top-email-id">
      <?php if($social_links_flag ==''){ $col_cls="2 email-cls";}else{$col_cls="1";} {
        # code...
      } ?>
        <div class="header-col-<?php echo esc_attr($col_cls); ?> no-padding">
          <?php if(get_theme_mod('email',isset($medics_options['email'])?$medics_options['email']:'') != '') { ?>
          <span> E-mail : <a href="mailto:<?php echo esc_attr(is_email(get_theme_mod('email',isset($medics_options['email'])?$medics_options['email']:'')));?>"><?php echo esc_attr(is_email(get_theme_mod('email',isset($medics_options['email'])?$medics_options['email']:'')));?></a></span>
          <?php } ?>
        </div>
        <?php if($social_links_flag !=''){ ?>
        <div class="header-col-2 social-icons no-padding">
          <ul class="list-inline no-padding">
            <?php for($i=1; $i<=3; $i++) : 
                        if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''): ?>
                       <li><a href="<?php echo esc_url(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
                            <i class="fa <?php echo esc_attr(get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])); ?>"></i>
                        </a></li>
            <?php endif; endfor;?> 
          </ul>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php } ?>
  <!-- END TOP HEADER -->
  <div class="container container-medics">
    <div class="col-md-12 logo-menu">
      <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 logo-icon no-padding">
      <?php
          if(has_custom_logo() ): 
            the_custom_logo();
          endif; 
          if(display_header_text()){ ?>
            <h1 class="medics-site-name"><a href="<?php echo esc_url(get_site_url()); ?>"><?php echo esc_html(get_bloginfo('name')); ?></h1>
            <p class="medics-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p></a>
          <?php } ?> 
      </div> 
      <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 no-padding clearfix">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle navbar-toggle-top sort-menu-icon" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only"></span> <span class="icon-bar icon-color"></span> <span class="icon-bar icon-color"></span> <span class="icon-bar icon-color"></span> </button>
        </div>
        <?php $medics_defaults = array(
							'theme_location'  => 'primary',
							'container'       => 'div',
							'container_class' => 'navbar-collapse collapse pull-right no-padding',
							'container_id'    => '',
							'menu_class'      => 'navbar-collapse pull-right collapse no-padding',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="nav navbar-nav medics-menu">%3$s</ul>',
							'depth'           => 0,
							'walker'          => ''
						);
			wp_nav_menu($medics_defaults); ?>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
</header>
<!-- END HEADER -->