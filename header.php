<?php
/**
 * Default header for our theme.
 *
 * Contains all the code before the actual content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BA Tours
 */

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<!-- Wordpress head -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'bathemos_page' ); 

if ( ! isset( $content_width ) ) $content_width = 900;
?>

<div id="page" class="site">

	<?php do_action( 'bathemos_page_top' ); ?>
	
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ba-tours-light' ); ?></a>
	
	<?php do_action( 'bathemos_get_panel', 'before-header' ); ?>
	
	<!-- Header -->
	
	<header id="header" class="<?php echo esc_attr(apply_filters( 'bathemos_style', 'site-header', 'header' )); ?>">
	
		<?php do_action( 'bathemos_header' ); ?>
		
		<?php do_action( 'bathemos_get_navbar', 'default' ); ?>
		
		<?php do_action( 'bathemos_get_panel', 'header' ); ?>
		
	</header><!-- #header -->
	
	<?php do_action( 'bathemos_get_panel', 'before-content' ); ?>
	
	<!-- Content -->
    
    <?php do_action( 'bathemos_get_content_tag_template', 'post-thumbnail' ); ?>
    
	<div id="content" class="<?php echo esc_attr(apply_filters( 'bathemos_style', 'container site-content', 'content' )); 
    echo apply_filters( 'bathemos_page_option', true, 'header_margin' ) ? ' content-margin' : ''; ?>">

