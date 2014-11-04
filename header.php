<?php
/**
 * @package electa
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( kaira_theme_option( 'kra-favicon' ) ) :
    echo '<link rel="icon" href="' . esc_url( kaira_theme_option( 'kra-favicon' ) ) . '">';
endif; ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(  ); ?>>
    
<header id="masthead" class="site-header<?php echo ( get_header_image() ) ? '' : ' header-nologo'; ?>" role="banner">
    <?php if ( kaira_theme_option( 'kra-header-search' ) ) : ?>
    <div class="search-button">
        <div class="search-block">
            <div class="search-block-arrow"></div>
            <?php get_search_form(); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="site-header-inner">
    	<div class="site-branding">
            <?php if ( get_header_image() ) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>" rel="home"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" /></a>
                <?php if ( kaira_theme_option( 'kra-header-slogan' ) ) : ?>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
            <?php else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php if ( kaira_theme_option( 'kra-header-slogan' ) ) : ?>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
            <?php endif; ?>
    	</div>
        
    	<nav id="site-navigation" class="main-navigation" role="navigation">
    		<button class="menu-toggle"><?php _e( 'Menu', 'electa' ); ?></button>
    		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    	</nav><!-- #site-navigation -->
        
        <?php if( kaira_theme_option( 'kra-header-search' ) ) : ?>
        <div class="header-social">
            <?php echo '<i class="fa fa-search search-btn"></i>'; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php echo apply_filters( 'electa_footer_attribution', '<div class="site-info">' . sprintf( __('A <a href="%s">Kaira</a> Theme', 'electa'), 'http://www.kairaweb.com') . '</div>' ) ?>
</header><!-- #masthead -->

<div id="content" class="site-content">