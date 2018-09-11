<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Absolutte
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<!-- WP_Head -->
<?php wp_head(); ?>
<!-- End WP_Head -->

</head>

<body <?php body_class(); ?>>
<div class="absolutte-preloader"><div class="absolutte-spinner"><div class="absolutte-double-bounce1"></div><div class="absolutte-double-bounce2"></div></div></div>
    <?php 
    $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
    if ( isset( $_GET[ 'site_layout' ] ) ) {
        $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
    }
    ?>
    
    <?php
    $absolutte_topbar_enable = get_theme_mod( 'absolutte_topbar_enable', false );
    if ( $absolutte_topbar_enable || is_customize_preview() || isset( $_GET[ 'top_bar' ] ) ) :

        get_template_part( 'template-parts/top-bar', 'header' );
    
    endif;
    ?>

    <div class="absolutte-site-wrap">
 
        <?php 
        if( 'sidenav' == $absolutte_site_layout || 'default' == $absolutte_site_layout ): 
            get_template_part( 'template-parts/header-component', 'header' );
        endif;
        ?>


    
    <?php 
    if ( ! is_singular( array( 'product' ) ) ) {
    
        if( 'sidenav' == $absolutte_site_layout ){
            echo '<div class="absolutte-main-wrap">';
        }

    ?>
    <main id="main" class="site-main ">

        <div id="container" class="<?php echo esc_attr( absolutte_container_css_class() ); ?>">

            <div class="<?php echo esc_attr( absolutte_main_css_class() ); ?>">
    <?php
    }
