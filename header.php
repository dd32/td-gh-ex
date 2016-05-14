<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 */
?>

<!DOCTYPE html >
<html <?php language_attributes();?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset');?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' );?>" />	
<?php endif; ?>
	<?php wp_head();?>

</head>

<body <?php body_class();?> id="top" >
 <?php 
 global $wp_customize;
 $advance_body_preloder = get_theme_mod('advance_body_preloder',1);?>
 
 
<?php if( isset($advance_body_preloder) && $advance_body_preloder == 1 ):?> 
  <!-- Site Preloader -->
    <div id="page-loader">
        <div class="page-loader-inner">
            <div class="loader"><strong><?php echo esc_html__('Loading', 'advance'); ?></strong></div>
        </div>
    </div>
    <?php endif;?> 
    <!-- END Site Preloader -->
<div id="wrapper">