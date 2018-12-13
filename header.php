<?php
/**
 * The Header template for our theme
 */
 $booster_options = get_option( 'faster_theme_options' ); ?>
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
<header>
	<div class="separator"></div>
  <div class="">
    <div class="container no-padding">
    <?php if(get_header_image()){ ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" class="custom-header-img" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="">
	</a>
    <?php } ?>
      <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 text-left-menu">
          <div class="cust_logo">
      		<?php
            if(has_custom_logo() ): 
              the_custom_logo();
            endif; 
            if(display_header_text()){ ?>
              <a href="<?php echo esc_url(get_site_url()); ?>" class="pull-left booster-site-name"><?php echo esc_html(get_bloginfo('name')); ?></a>
              <p class="top-mag-tagline"><?php echo esc_html(get_bloginfo('description')); ?></p>
              
            <?php } ?>
            </div> 
                <div class="navbar-header pull-right">
                	<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle toggle-top" type="button">
                    	<span class="sr-only"><?php esc_html_e('Toggle navigation','booster') ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
					</button>
				</div>
        <div class="clearfix"></div>
</div>
 
      <div class="col-md-7  col-lg-7 col-sm-7 col-xs-12 no-padding text-left-menu">
        <div class="navbar-collapse collapse padding-menu">
        <?php $booster_args = array(
					'theme_location'  => 'primary',
					'menu'            => '',
					'container'       => 'div',
					'container_class' => 'nav navbar-nav menu font-type-roboto',
					'container_id'    => '',
					'menu_class'      => 'nav navbar-nav',
					'menu_id'         => '',
					'echo'            => true,
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',    
					'items_wrap'      => '<ul id="%1$s" class="%2$s booster-menu">%3$s</ul>',
					'depth'           => 0,
					'walker'            => ''
				   );   
				   wp_nav_menu( $booster_args ); ?>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-2  col-lg-2 col-sm-2 col-xs-12 no-padding text-left-menu">
        <div class="">
           <?php $SocialIconDefault = array(
                  array('url'=>isset($booster_options['fburl'])?$booster_options['fburl']:'#','icon'=>'fa-facebook'),
                  array('url'=>isset($booster_options['twitter'])?$booster_options['twitter']:'#','icon'=>'fa-twitter'),
                  array('url'=>isset($booster_options['linkedin'])?$booster_options['linkedin']:'#','icon'=>'fa-linkedin'),  
                );
            $social_links_flag=false; 
            for($i=1; $i<=3; $i++) : 
                if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''):
                 $social_links_flag=true; 
                endif;
            endfor; ?>
           <ul class="social-icon">
             <?php if($social_links_flag):
                    for($i=1; $i<=3; $i++) : 
                        if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''): ?>
                       <li><a href="<?php echo esc_url(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])); ?>" class="icon" title="" target="_blank">
                            <i class="fa <?php echo esc_attr(get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])); ?>"></i>
                        </a></li>
                <?php endif; endfor; endif;?> 
                </ul>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
</header>