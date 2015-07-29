<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Aglee Lite
 */

?><!DOCTYPE html>
<?php
    
    $site_class = null;
    if(($site_layout = get_theme_mod('site_layout_setting')) == 'boxed'){
        $site_class = 'boxed-layout';
    }

    $header_class = '';
    $show_header = get_theme_mod('header_text_image_display', 'show_both');
    switch($show_header){
        case 'header_logo_only' :
            $header_class = 'header-logo-only';
            break;
        case 'header_text_only' :
            $header_class = 'header-text-only';
            break;
        case 'show_both' :
            $header_class = 'header-text-logo';
            break;
    }
?>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php
$favicon = get_theme_mod('aglee_lite_favicon');
 if(!empty($favicon)) : ?>
    <?php
    $activate_favicon = get_theme_mod('favicon_setting');
     if($activate_favicon == 1) : ?>
        <link rel="icon" type="image/png" href="<?php echo esc_url($favicon); ?>">
    <?php endif; ?>
<?php endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class($site_class); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'aglee-lite' ); ?></a>
    <?php
    $header_text = get_theme_mod ('header_text_setting','+1-123-123-45-78');
    $show_social = get_theme_mod ('show_social', '0');
    $show_search = get_theme_mod ('show_search' ,'0');
    if($header_text == '' && $show_search == '1' && $show_social == '1'){
        $show_top_header = 'hide_top_header';
    }else{
        $show_top_header = '';
    }
    ?>
	<header id="masthead" class="site-header <?php echo $header_class.' '.$show_top_header; ?>" role="banner">
        	<div class="ap-container">
            <div class="top-header clearfix">
                
                    <!-- header top content -->
                    <div class="content-top-head">
                       
                        <?php if(($show_search=get_theme_mod('show_search')) == 0) : ?>
                            <div class="search-icon">
                                <i class="fa fa-search"></i>
                                <div class="aglee-search">
                                         <form action="<?php echo site_url(); ?>" class="search-form" method="get" role="search">
                                            <label>
                                                <span class="screen-reader-text"><?php _e('Search for:', 'aglee-lite'); ?></span>
                                                <input type="search" title="Search for:" name="s" value="" placeholder="<?php _e('Search content...', 'aglee-lite'); ?>" class="search-field">
                                            </label>
                                            <input type="submit" value="Search" class="search-submit">
                                         </form>
                                </div>
                            </div> 
                        <?php endif; ?>

                        <?php
                         if(($show_social_links = get_theme_mod('show_social')) == 0 && is_active_sidebar('aglee_header_social_links')) : ?>
                        <div class="social-icons-head">
                            <div class="social-container">
                                <?php dynamic_sidebar('aglee_header_social_links'); ?>                              
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        
                        <?php if(is_active_sidebar('agleelite_header_text')) : ?>
                            <div class="call-us"><?php dynamic_sidebar('agleelite_header_text'); ?></div>
                        <?php else : ?>
                            <?php
                            $header_text = get_theme_mod('header_text_setting','+1-123-123-45-78');
                             if(!empty(  $header_text ) ) : ?>
                                <div class="call-us"><span>Call Us:</span><?php echo esc_attr($header_text); ?></div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <!-- End header top content -->
            </div> <!-- top-header -->
            <div class="bottom-header clearfix">
                <div class="site-branding">
                    <?php if($show_header != 'disable') : ?>
                            
                    <?php if($show_header == 'header_logo_only') : ?>
                        <?php if(get_header_image()) : ?>
                            <div class="header-logo-container">
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo header_image(); ?>" /></a></h1>
                            </div>
                        <?php endif; ?>
                        <?php elseif($show_header == 'header_text_only') : ?>
                            <div class="header-text-container">
                               <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                            </div>
                        <?php else : ?>
                            <?php if(get_header_image()) : ?>
                                <div class="header-logo-container">
                                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo header_image(); ?>" /></a></h1>
                                </div>
                            <?php endif; ?>
                                <div class="header-text-container">
                                  <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                  <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                </div><!-- .site-branding -->
                
                <div class="menu-wrapper"> 
                        <a class="menu-trigger"><span></span><span></span><span></span></a>   
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            <button type="button" class="menu-toggle"><?php _e( 'Menu', 'aglee-lite' ); ?></button>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
                        </nav><!-- #site-navigation -->
                </div>
                </div><!-- container -->
            </div>
            <nav id="site-navigation-responsive" class="main-navigation-responsive">
                <button class="menu-toggle hide" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'aglee-lite' ); ?></button>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </nav><!-- #site-navigation -->
            </div> <!-- ap-container -->
            
	</header><!-- #masthead -->

	<div id="content" class="site-content">
    <?php
        if(($show_slider = get_theme_mod('slider_setting')) == '1') :
            if(($show_slider_in_post = get_theme_mod('slider_show_post')) == 1) :
                 if(is_front_page() || is_home() || is_single()) :
                 ?>
                <div class="aglee-slider-wrapper">
                     <?php 
                        do_action('aglee_lite_slider');
                    ?>
                </div>
                <?php
                 endif;
            else:
                if(is_home() || is_front_page()) :
                ?>
                <div class="aglee-slider-wrapper">
        
                    <?php
                        do_action('aglee_lite_slider');
                    ?>
        
                </div>
                <?php
                endif;
            endif;
        endif;
    ?>
