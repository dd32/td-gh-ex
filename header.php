<?php
/**
 * @package mwsmall
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<div class="mw-go-top"><i class="fa fa-angle-up fa-2x"></i></div>
<?php
	$hp = get_theme_mod( 'mwsmall_header_position' );
	if ( $hp == 'center' ) {
		$class_header = ' center text-center';
	}else{
		$class_header = '';
	}
?>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header<?php echo $class_header; ?>" role="banner">
		<div class="header-main container">
			<h1 class="site-title">
				<?php 
					$customize_logo = get_theme_mod('logo_mwsmall');
					if ( get_theme_mod('logo_mwsmall')) { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url($customize_logo); ?>" alt="<?php echo esc_attr( get_bloginfo('name', 'display') ); ?>"></a>
					
				<?php
				} else { ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php
				} ?>
			</h1>
			<button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
				<i class="fa fa-bars"></i>
			</button>
		
			<div class="top-icon">
				<?php get_template_part( 'inc/social-icons' ); ?>
	
				<?php 
					$hide_search = get_theme_mod('mwsmall_head_search');
					if ( $hide_search == '' ) { ?>
						<a href="#"><i class="fa fa-search"></i></a>
				<?php } ?>
			</div>

			<div id="navbarCollapse" class="collapse navbar-collapse">
				<nav id="primary-navigation" class="primary-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'sf-menu nav navbar-nav' ) ); ?>
				</nav>
			</div>
			
			<div id="search-container" class="search-box-wrapper h0">
				<div class="search-box">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		
	</header><!-- #masthead -->

	<?php if ( get_header_image() ) : ?>
	<div class="mw_header_image">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo get_bloginfo('name'); ?>" />
		<?php if ( '' !== get_bloginfo( 'description' ) ) : ?>
			<h2 class="site-description col-lg-12 col-xs-12"><?php bloginfo( 'description' ); ?></h2>
		<?php endif; ?>
	</div><!-- .mw_header_image -->
	<?php endif; ?>
	<?php 
		$sid_l_r = get_theme_mod( 'mwsmall_sidebar_position' );
		if( $sid_l_r == 'left' ) {
			$sid_class = 'mw_left_sidebar';
			}else{
			$sid_class = '';
		}
	?>
	<div id="mw_full" class="container <?php echo $sid_class; ?>">