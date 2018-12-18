<?php
/**
 * The Header template for our theme
 */
 $besty_options = get_option( 'besty_theme_options' ); ?>
 <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="content">
	<div class="menu-sidebar">
    	<div class="logo">
            <?php
            if(has_custom_logo()): 
              the_custom_logo();
            endif; 
            if(display_header_text()){ ?>
                <h1 class="besty-site-name"><a href="<?php echo esc_url( get_site_url() ); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h1>
            <?php 
			if(get_bloginfo ( 'description' ) != '') { ?>
                <h2><?php esc_html(bloginfo( 'description' )); ?></h2>
            <?php } } ?>
        </div>
        <?php if(get_header_image()){ ?>
        <div class="custom-header-img">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
        	<!-- <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt=""> -->
        </a>
        </div>
    <?php } ?> 
        <div class="navbar-header">
          	<button type="button" class="navbar-toggle navbar-toggle-top" data-toggle="collapse" data-target=".navbar-collapse"> 
                <span class="sr-only"></span> 
                <span class="icon-bar icon-color"></span> 
                <span class="icon-bar icon-color"></span> 
                <span class="icon-bar icon-color"></span> 
            </button>
        </div>
        <?php $besty_defaults = array(
				'theme_location'  => 'primary',
				'container'       => 'nav',
				'container_class' => 'besty-menu navbar-collapse collapse',
				'container_id'    => '',
				'menu_class'      => 'besty-menu navbar-collapse collapse',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul>%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);
			wp_nav_menu($besty_defaults); ?>
        <div class="footer">
             <?php $SocialIconDefault = array(
                  array('url'=>isset($besty_options['fburl'])?$besty_options['fburl']:'#','icon'=>'fa-facebook'),
                  array('url'=>isset($besty_options['twitter'])?$besty_options['twitter']:'#','icon'=>'fa-twitter'),
                  array('url'=>isset($besty_options['linkedin'])?$besty_options['linkedin']:'#','icon'=>'fa-linkedin'),  
                );
            $social_links_flag=false; 
            for($i=1; $i<=3; $i++) : 
                if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''):
                 $social_links_flag=true; 
                endif;
            endfor; ?>
           <ul class="social">
             <?php if($social_links_flag):
                    for($i=1; $i<=3; $i++) : 
                        if(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])!='' && get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])!=''): ?>
                       <li><a href="<?php echo esc_url(get_theme_mod('SocialIconLink'.$i,$SocialIconDefault[$i-1]['url'])); ?>" class="sprite besty-tooltip" title="" data-toggle="tooltip" target="_blank">
                            <i class="fa <?php echo esc_attr(get_theme_mod('SocialIcon'.$i,$SocialIconDefault[$i-1]['icon'])); ?>"></i>
                        </a></li>
                <?php endif; endfor; endif;?> 
                </ul>
            <div class="copyright"><?php 
            if(get_theme_mod('footerCopyright',isset($besty_options['footertext'])?$besty_options['footertext']:'') != '') {
                echo wp_kses_post(get_theme_mod('footerCopyright',isset($besty_options['footertext'])?$besty_options['footertext']:'')).' '; 
            }
            esc_html_e('Powered by ','besty'); ?><a href='https://fasterthemes.com/wordpress-themes/besty' target='_blank'><?php esc_html_e('Besty WordPress Theme','besty'); ?></a>
            </div>
        </div>
    </div>