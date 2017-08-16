<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fmi
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fmi' ); ?></a>

	<header id="masthead" class="site-header"><div class="inner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<?php if ( get_theme_mod( 'header_search','1')=='1'){?>
            <div class="divsearch">
                <?php get_search_form(); ?>
            </div>
            <?php }?>		

            <div class="clear"></div>
		</div><!-- .site-branding -->
	</div></header><!-- #masthead -->
    
    <nav id="site-navigation" class="main-navigation"><div class="inner">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
        <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
        ?>
        <div class="clear"></div>
    </div></nav><!-- #site-navigation -->

<?php
if( get_theme_mod( 'activate_slider', '0' ) == '1' ) {
	if ( is_front_page() ) {
?>
		<div class="site-slider"><div class="inner">
<?php
		fmi_slider();
?>
		<div class="clear"></div></div></div>
<?php
	}
}
?>

	<div id="content" class="site-content"><div class="inner">
