<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package BestCorporate
 * @since BestCorporate 1.4
 */
?>
<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'best_corporate' ), max( $paged, $page ) );

	?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<?php global $bc_options;?>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php if ( is_singular()) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if($bc_options['rss_url']!=''){echo $bc_options['rss_url'];} else { bloginfo('rss2_url'); }?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body <?php body_class(); ?>>
<div id="headerimg">
  <header id="branding" role="banner">
    <hgroup>
      <h1 id="site-title">
        <?php if ( get_header_image() != '' ) { ?>
        <a class="logo_img" style="background-image: url(<?php header_image(); ?>)" href="<?php echo home_url(); ?>"  title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        <?php }
			else { ?>
        <a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
        <?php } ?>
      </h1>
      <h2 id="site-description">
        <?php bloginfo( 'description' ); ?>
      </h2>
    </hgroup>
    <nav id="access" role="navigation">
      <h1 class="assistive-text section-heading">
        <?php _e( 'Main menu', 'best_corporate' ); ?>
      </h1>
      <div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'best_corporate' ); ?>">
        <?php _e( 'Skip to content', 'best_corporate' ); ?>
        </a></div>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
    <!-- #access -->
  </header>
</div>
<div id="page" class="hfeed">
<?php do_action( 'before' ); ?>
<!-- #branding -->
<div id="main">
