<?php
/**
 * Default header for our theme.
 *
 * Contains all the code before the actual content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!-- Wordpress head -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ba-tours-light' ); ?></a>
	
	<?php do_action( 'batourslight_get_panel', 'before-header' ); ?>
	
	<!-- Header -->
	
	<header id="header" class="<?php echo esc_attr(apply_filters( 'batourslight_style', 'site-header', 'header' )); ?>">
    
        <?php get_template_part( 'template-parts/navbar');?>
	
		<?php do_action( 'batourslight_get_panel', 'header' ); ?>
		
	</header><!-- #header -->
	
	<?php do_action( 'batourslight_get_panel', 'before-content' ); ?>
	
	<!-- Content -->
    
    <?php get_template_part( 'template-parts/content-tags/content-tag-post-thumbnail' ); ?>
    
	<div id="content" class="site-content <?php echo esc_attr(apply_filters( 'batourslight_style', 'container', 'content' ));
    if (BAT_Settings::$layout_current != 'frontpage'){ 
       echo apply_filters( 'batourslight_page_option', true, 'header_margin' ) ? ' content-margin' : '';
    } 
    ?>">
    
       <div class="row">
			
			<?php do_action( 'batourslight_get_panel', 'left' ); ?>
			
			<div id="primary" class="content-area <?php echo esc_attr(apply_filters( 'batourslight_column_width', 'col-lg-'.BAT_Settings::$layout_vars['width']['main'], 'primary' )); ?>">
				
				<div id="content-main" class="row">
				
					<!-- Main -->
				
					<main id="main" class="site-main <?php echo esc_attr(apply_filters( 'batourslight_column_width', 'col-lg-12', 'content' )); ?>">

						<?php do_action( 'batourslight_main_before' ); ?>
    
    