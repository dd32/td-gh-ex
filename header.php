<?php
/*
 * The Header template for our theme
 */ ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="profile" href="http://gmpg.org/xfn/11">
   <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
   <?php wp_head(); ?>
</head>
<body <?php body_class();?>> 
    <?php if(get_theme_mod('preloader') != 2) :
        if(get_theme_mod('customPreloader') == '') { ?>
            <div class="preloader">
                <span class="preloader-gif">
                    <svg width='70px' height='70px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ring">
                        <circle id="loader" cx="50" cy="50" r="40" stroke-dasharray="163.36281798666926 87.9645943005142" stroke="<?php echo get_theme_mod('themeColor','#ea8800') ?>" fill="none" stroke-width="5"></circle>
                    </svg>
                </span>
            </div>
        <?php } else{ ?>
            <div class="preloader"><span class="preloader-gif" style="background: url(<?php echo esc_url(get_theme_mod('customPreloader')); ?>) no-repeat;background-size: contain;animation: none;"></span></div>
    <?php } endif; ?>
    <?php   get_template_part('template-parts/header-style/header-style'); ?>