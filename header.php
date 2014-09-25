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

<?php
global $cx_framework_options; ?>

<?php if ( !empty( $cx_framework_options['cx-options-favicon'] ) ) :
    echo '<link rel="icon" href="' . esc_url( $cx_framework_options[ 'cx-options-favicon' ][ 'url' ] ) . '">';
endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(  ); ?>>
    
<header id="masthead" class="site-header" role="banner">
    <?php if ( $cx_framework_options['cx-options-search'] ) : ?>
    <div class="search-button">
        <i class="fa fa-search search-btn"></i>
        <div class="search-block">
            <div class="search-block-arrow"></div>
            <?php get_search_form(); ?>
        </div>
    </div>
    <?php endif; ?>
    
    <div class="site-header-inner">
    	<div class="site-branding">
            <?php if ( get_header_image() ) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php esc_url(header_image()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')) ?>" /></a>
                <?php if ( $cx_framework_options['cx-options-slogan'] ) : ?>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
            <?php else : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php if ( $cx_framework_options['cx-options-slogan'] ) : ?>
                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php endif; ?>
            <?php endif; ?>
    	</div>
        
    	<nav id="site-navigation" class="main-navigation" role="navigation">
    		<button class="menu-toggle"><?php _e( 'Menu', 'electa' ); ?></button>
    		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    	</nav><!-- #site-navigation -->
        
        <?php get_template_part( '/inc/social-links' ); ?>
    </div>
    <div class="site-info">
        <?php echo wp_kses_post( 'Built with the <a href="http://wordpress.org/themes/electa" target="_blank">Electa Theme</a>' ) ?>
    </div>
</header><!-- #masthead -->

<div id="content" class="site-content">