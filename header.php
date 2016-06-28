<!DOCTYPE html>
<!-- Microdata markup added by Google Structured Data Markup Helper. -->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
<div id="page" class="hfeed site website-width">

<?php 

	do_action( 'bellini_before_header' );

	$header_orientation = esc_attr(get_option('bellini_header_orientation', 'header__general')); ?>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bellini' ); ?></a>
	<header id="masthead" class="site-header <?php echo $header_orientation; ?>" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader" <?php if ( get_header_image() != '' ) { echo 'style="background-image: url(' . esc_url( get_header_image() ) . ');"'; } ?>>
	<div class="header-inner bellini__canvas">
	<div class="row">

		<?php do_action( 'bellini_header' ); ?>
		
	</div>
	</div>
	</header>

<?php do_action( 'bellini_after_header' ); ?>
<div id="content" class="site-content">