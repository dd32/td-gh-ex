<?php
global $bluesky_options_settings;
$bs_options = $bluesky_options_settings;
// showpre($bs_options);
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Blue Sky
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php  if( !empty( $bs_options['custom_favicon']  ) ) :?>
<link rel="shortcut icon"
href="<?php echo $bs_options['custom_favicon']; ?>" />
<?php  endif;?>

 <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
          <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
        <![endif]-->
 <style>
/*
ul.nav li.dropdown:hover > ul.dropdown-menu{
    display: block;
}*/
 </style>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    //
    do_action( 'bluesky_after_body_open' );
    //
    ?>
    <div class="container">
    <div class="container-open-wrapper">
    <?php
    //
    do_action( 'bluesky_after_container_open' );
    //
    ?>
    </div>

    <div id="page" class="hfeed site">

    <?php
    //
    do_action( 'bluesky_after_page_open' );
    //
    ?>

	<header id="masthead" class="site-header" role="banner">

    <?php
    //
    do_action( 'bluesky_after_masthead_open' );
    //
    ?>

    <?php
    //
    do_action( 'bluesky_before_masthead_close' );
    //
    ?>
	</header><!-- #masthead -->
    <?php
    //
    do_action( 'bluesky_after_masthead_close' );
    //
    ?>
    <nav role="navigation" class="bluesky-nav" id="site-navigation">
        <a title="Skip to content" href="#content" class="assistive-text">Skip to content</a>

        <?php if ( ! dynamic_sidebar( 'sidebar-top-menu' ) ) :?>

        <?php
        wp_nav_menu( array(
            'menu'              => 'primary',
            'theme_location'    => 'primary',
            'depth'             => 0,
                                // 'container'         => 'div',
                                // 'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
            'menu_class'        => 'nav-menu',
            'menu_id'         => 'menu-top',
            )
        );
        ?>

        <?php endif; ?>

    </nav>

<div class="clear"></div>

    <div id="content" class="site-content"  style="margin-top:10px;">
    <?php
    //
    do_action( 'bluesky_after_content_open' );
    //
    ?>


