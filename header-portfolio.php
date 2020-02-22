<?php
/**
* header.php
*
* @author    Franchi Design
* @package   Atomy
* @version   1.0.5
*/

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<!-- Back To Top -->
<?php if ( false == esc_attr( get_theme_mod('atomy_enable_back_to_top', false ))) :?><div class="btn-back-to-top"><i class="fa fa-angle-up"></i></div><?php endif;?>
<body <?php body_class(); ?>>
<?php get_template_part('inc/at-custom','style');?>
<!-- Preloader -->
<?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_preloader', true ) )) : ?>
<div id="preloader" style="background-color:<?php echo esc_attr(get_theme_mod('at_background_preloader','#fff'));?>">
<div id="status" style="background-image: url('<?php if (get_template_directory_uri().get_theme_mod('at_image_preloader')) : 
      echo get_template_directory_uri().get_theme_mod('at_image_preloader'); else: echo get_template_directory_uri().'/images/preloader/at-preloader-1.gif'; endif; ?>');">&nbsp;</div>
</div>
<?php wp_enqueue_script('at-preloader-js', get_template_directory_uri() . '/js/at-preloader.js', array(), 'v1.0.5', true );
 endif; ?>
<div id="page" class="<?php echo esc_attr( get_theme_mod( 'atomy_enable_box_body','site container') )?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'atomy' ); ?></a>
	<?php get_template_part( 'sections/nav-menuMiddle');?>
	<div id="content" class="site-content">

	
