<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage i-transform
 * @since i-transform 1.0
 */
?><!DOCTYPE html>
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
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
    	
        <?php if ( of_get_option('top_bar_phone') || itransform_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="socialicons">
                <?php echo itransform_social_icons(); ?>
            </div>
            <?php if ( of_get_option('top_bar_phone') ) : ?>
        	<div class="topphone">
            	<i class="topbarico genericon-phone"></i>
                <?php if ( of_get_option('top_bar_phone') ) : ?>
					<?php _e('Call us : ','itransform'); ?> <?php echo of_get_option('top_bar_phone'); ?>
                <?php endif; ?>
            </div>
            <?php endif; ?>            
        </div>
        <?php endif; ?>
        
        <div class="headerwrap">
            <header id="masthead" class="site-header" role="banner">
         		<div class="headerinnerwrap">
					<?php if (of_get_option('itrans_logo_image')) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span><img src="<?php echo of_get_option('itrans_logo_image'); ?>" alt="<?php bloginfo( 'name' ); ?>" /></span>
                        </a>
                    <?php else : ?>
                        <span id="site-titlendesc">
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
                            </a>
                        </span>
                    <?php endif; ?>	
        
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php _e( 'Menu', 'itransform' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'itransform' ); ?>"><?php _e( 'Skip to content', 'itransform' ); ?></a>
                            <?php 
								if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									}
									else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								?>
							
                        </nav><!-- #site-navigation -->
                        <div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
        
        <!-- #Banner -->
        <?php if ( is_home() && ! is_paged() ) : ?>
			<?php itransform_ibanner_slider(); ?>
        <?php elseif ( ! is_front_page() ) : ?>
        <div class="iheader">
        	<div class="titlebar">
            	<h1>
					<?php if ( is_page() || is_single() ) : ?>
						<?php echo get_the_title(); ?>
                    <?php elseif ( is_category() ) : ?>
                    	<?php printf( __( 'Category Archives: %s', 'itransform' ), single_cat_title( '', false ) ); ?>
                    <?php elseif ( is_archive() ) : ?>
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'itransform' ), get_the_date() );
						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'itransform' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'itransform' ) ) );
						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'itransform' ), get_the_date( _x( 'Y', 'yearly archives date format', 'itransform' ) ) );
						else :
							_e( 'Archives', 'itransform' );
						endif;
					?>
                    <?php elseif ( is_search() ) : ?>  
                    	<?php printf( __( 'Search Results for: %s', 'itransform' ), get_search_query() ); ?>
                    <?php endif; ?>
                </h1>
            </div>
        </div>
        
		<?php endif; ?>
		<div id="main" class="site-main">
