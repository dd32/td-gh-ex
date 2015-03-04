<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package fmi
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if ( ! function_exists( '_wp_render_title_tag' ) ) {?>
<title><?php wp_title('|',true,'right');?></title>
<?php }?>


<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if(fmi_theme_option('vs-favicon')):echo '<link rel="icon" href="'.esc_url(fmi_theme_option('vs-favicon')).'">';endif;?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'fmi' ); ?></a>

	<header id="masthead" class="site-header" role="banner"><div class="inner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<?php if ( fmi_theme_option( 'vs-header-search' )):?>
            <div class="divsearch">
                <?php get_search_form(); ?>
            </div>
            <?php endif;?>		

            <div class="clear"></div>
		</div><!-- .site-branding -->
	</div></header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation" role="navigation"><div class="inner">
        <button class="menu-toggle" aria-controls="menu" aria-expanded="false"><?php _e( 'Menu', 'fmi' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
        
        <div class="clear"></div>
    </div></nav><!-- #site-navigation -->

	<div id="content" class="site-content"><div class="inner">
