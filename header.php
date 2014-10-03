<?php
/**

* The Header for our theme

*

* Displays all of the <head> section and everything up till <div id="main">

*

* @package WordPress

* @subpackage Twenty_Fourteen

* @since Twenty Fourteen 1.0

*/

?><!DOCTYPE html>
<!--[if IE 7]>

<html class="ie ie7" <?php language_attributes(); ?>>

<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php require_once( get_stylesheet_directory() . '/stylearray.php' ); ?>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>
<?php
global $badeyes_options;

					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );

				?>

<?php if( $badeyes_settings['header_style'] != '' ) : ?>
<?php 
echo "<style type=\"text/css\">";
echo $badeyes_settings['header_style']; 
echo "</style>";
?>
<?php endif; ?>

</head>
<body <?php body_class(); ?>>
<div class="center;" role="navigation" aria-label="Page">
<ul class="navlist">

<li id="top"><a href="#content">Main Content</a></li>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>

<li><a href="#mainmenu">Main Menu</a></li>

	<?php endif; ?>
<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
<li><a href="#custommenu">Main Menu</a></li>
<?php endif; ?>

<?php if ( has_nav_menu( 'secondary' ) ) : ?>

<li><a href="#secondary"><?php
global $badeyes_options;

					$badeyes_settings = get_option( 'badeyes_options', $badeyes_options );
?><?php if( $badeyes_settings['side_nav'] != '' ) : ?>
<?php echo $badeyes_settings['side_nav']; ?>
<?php endif; ?></a></li>
<?php endif; ?>
<li id="default"><a href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/styleswitcher.php?SETSTYLE=0" title="Click here to set Style 0"><span class="white">Default colours</span></a></li>
<li id="high"><a href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/styleswitcher.php?SETSTYLE=1" title="Click here to set Style 1"><span class="black">High Contrast</span></a></li></ul>
</div>


<div id="page" class="hfeed site">

<div class="site-header">
<?php if ( get_header_image() ) : ?>
<div class="center">
<?php $header_image_URL = get_header_image();
$header_image_att = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $wpdb->posts WHERE post_content = '%s'",$header_image_URL ) );
$header_image_att_id = $header_image_att->ID;
$header_image_alt = get_post_meta($header_image_att_id, '_wp_attachment_image_alt', true); ?>
<img src="<?php header_image(); ?>" alt="<?php echo $header_image_alt; ?>"/>
</div>
<?php endif; ?>
<div class="center" style="margin-top: 5px; margin-bottom: 5px;" role="banner">

<span class="logo"><?php bloginfo( 'name' ); ?></span>
	<?php
		$description = get_bloginfo( 'description', 'display' );
		if ( ! empty ( $description ) ) :
	?>
<br />
<span class="slogan"><?php echo esc_html( $description ); ?></span>
	<?php endif; ?>
</div>
</div>
<div class="center">
<?php if ( is_active_sidebar( 'sidebar-4' ) ) : ?>
<div id="custommenu" role="navigation" aria-label="Global">
<?php dynamic_sidebar( 'sidebar-4' ); ?>
</div>
<?php endif; ?>
</div>
<div class="center"><?php if ( has_nav_menu( 'primary' ) ) : ?>

<div id="mainmenu" role="navigation" aria-label="Global" class="navlist">
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</div>
<?php endif; ?>
</div>
<div id="main" class="site-main">



