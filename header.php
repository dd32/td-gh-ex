<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Accesspress Mag
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'accesspress-mag' ); ?></a>
    <?php 
        $apmag_transparent_header = of_get_option( 'logo_upload' );
        $apmag_logo = of_get_option( 'logo_upload' );
        $apmag_logo_setting = of_get_option( 'logo_setting' );
        $apmag_top_menu_switch = of_get_option( 'top_menu_switch' );
        $apmag_top_menu = of_get_option( 'top_menu_select' );
        $apmag_top_menu_right = of_get_option( 'top_right_menu_select' );
        $apmag_logo_alt = of_get_option( 'logo_alt' );
        $apmag_logo_title = of_get_option( 'logo_title' );
        switch($apmag_logo_setting){
            case 'image':
            $branding_class = 'logo_only';
            break;
            
            case 'text':
            $branding_class = 'text_only';
            break;
            
            case 'image_text':
            $branding_class = "logo_with_text";
            break;
        }
        //var_dump($apmag_top_menu); 
    ?>  
	
    <header id="masthead" class="site-header" role="banner">
    
            <?php if ($apmag_top_menu_switch=='1'):?> 
            <?php if(empty($apmag_top_menu)):?>
                <div class="top-header-menu"> 
                <div class="apmag-container">
                    <ul class="">
                        <li class="menu-item-first">
                            <a href="<?php echo home_url();?>/wp-admin/nav-menus.php?action=locations">Click here - to select or create a menu</a>
                        </li>
                    </ul>
                </div>
                </div>
            <?php else: ?>  
            <div class="top-menu-wrapper clearfix">
                <div class="apmag-container">     
                    <nav id="top-navigation" class="top-main-navigation" role="navigation">
                                <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu', 'accesspress-mag' ); ?></button>
                                <?php wp_nav_menu( array( 'menu' => $apmag_top_menu ) ); ?>
                    </nav><!-- #site-navigation -->
                <?php endif;?> 
                <?php if(!empty($apmag_top_menu_right)): ?>
                    <nav id="top-right-navigation" class="top-right-main-navigation" role="navigation">
                                <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu Right', 'accesspress-mag' ); ?></button>
                                <?php wp_nav_menu( array( 'menu' => $apmag_top_menu_right ) ); ?>
                    </nav><!-- #site-navigation -->
                <?php endif ;?>           
                <?php endif ;?>
                </div>
            </div>
        <div class="logo-ad-wrapper clearfix">
            <div class="apmag-container">
        		<div class="site-branding <?php echo $branding_class ;?>">
                            <?php 
                                if( $apmag_logo_setting == 'image' || $apmag_logo_setting == 'image_text') :
                                if (!empty($apmag_logo)): ?>
                                  <div class="sitelogo-wrap">  
                                    <a itemprop="url" href="<?php echo home_url(); ?>"><img src="<?php echo $apmag_logo?>" alt="<?php echo $apmag_logo_alt ?>" title="<?php echo $apmag_logo_title ?>" /></a>
                                    <meta itemprop="name" content="<?php bloginfo( 'name' )?>" />
                                  </div>
                            <?php endif; endif;
                                if( $apmag_logo_setting == 'text' || $apmag_logo_setting == 'image_text' ):
                            ?> 
                                 <div class="sitetext-wrap">  
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        			<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                        			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                    </a>
                                </div>
                            <?php endif;?>
                 </div><!-- .site-branding -->
        		
                
                <div class="header-ad">
                    <?php 
                        $apmag_header_ad = of_get_option( 'value_header_ad' );
                        if(!empty($apmag_header_ad)){
                            echo $apmag_header_ad;
                        } else {
                            echo '<img src="http://placehold.it/728x90&text=Advertisement 728x90" />';
                        } 
                    ?>
                </div><!--header ad-->
            </div>
        </div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="apmag-container">
                <div class="nav-wrapper">
                    <div class="nav-toggle hide">
                        <span> </span>
                        <span> </span>
                        <span> </span>
                    </div>
        			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </div>

                <div class="search-icon">
                    <i class="fa fa-search"></i>
                    <div class="ak-search">
                        <div class="close">&times;</div>
                     <form action="<?php echo site_url(); ?>" class="search-form" method="get" role="search">
                        <label>
                            <span class="screen-reader-text">Search for:</span>
                            <input type="search" title="Search for:" name="s" value="" placeholder="Search content..." class="search-field">
                        </label>
                        <input type="submit" value="Search" class="search-submit">
                     </form>
                     <div class="overlay-search"> </div> 
                    </div>
                </div> 
            </div>
		</nav><!-- #site-navigation -->
        
	</header><!-- #masthead -->

	<div id="content" class="site-content">