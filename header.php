<?php
/**
 * Header template Theming Strap
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_theme_option('favicon-upload'); ?>"/>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'themingstrap_wrapper' );?>
<?php do_action( 'themingstrap_container' );?>
<?php do_action( 'themingstrap_header' );?>
<section id="header-wrapper">
<?php do_action( 'header_top' );?>
    <div class="container container-center">
    	<header id="site-header" class="site-header row" role="banner">
            <hgroup class="col-md-4">
					<?php if(get_theme_option('headerlogo-upload')) {?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="headerlogo"><img src ="<?php echo esc_url(get_theme_option('headerlogo-upload')); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
					<?php } else { ?>
			
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php } ?>
            </hgroup>
			
			<?php do_action( 'themingstrap_in_header' );?>
            
        </header><!-- #site header -->
    </div>
	<?php do_action( 'themingstrap_header_bottom' );?>
</section> <!-- #header wrapper -->
<?php do_action( 'themingstrap_header_bottom' );?>
<div class="navbar navbar-inverse" role="navigation" id="main-menu">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>  
    <?php	
            wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 3,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new bootstrap_navwalker())
            );
        ?>
    
  </div><!-- /.container -->
</div><!-- /.navbar -->
<?php do_action( 'themingstrap_header_end' );?>