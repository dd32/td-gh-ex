<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package AccesspressLite
 */
?><!DOCTYPE html> 
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.min.js"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
    <div id="top-header">
		<div class="ak-container">
			<div class="site-branding">
				
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php if ( get_header_image() ) { ?>
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/demo/logo.png" alt="<?php echo bloginfo('name'); ?>">
				<?php }	 ?>
				</a>
				
			</div><!-- .site-branding -->
        

			<div class="right-header clear">
				<?php 
				do_action( 'accesspresslite_header_text' ); 
                ?>
                <div class="clear"></div>
                <?php
				global $accesspresslite_options;
				$accesspresslite_settings = get_option( 'accesspresslite_options', $accesspresslite_options );
				/** 
				* @hooked accesspresslite_social_cb - 10
				*/
				if($accesspresslite_settings['show_social_header'] == 0){
				do_action( 'accesspresslite_social_links' ); 
				}

				if($accesspresslite_settings['show_search'] == 1){ ?>
				<div class="ak-search">
					<?php get_search_form(); ?>
				</div>
				<?php } ?>
			</div><!-- .right-header -->
		</div><!-- .ak-container -->
  </div><!-- #top-header -->

		
		<nav id="site-navigation" class="main-navigation <?php do_action( 'accesspresslite_menu_alignment' ); ?>">
			<div class="ak-container">
				<h1 class="menu-toggle"><?php _e( 'Menu', 'accesspresslite' ); ?></h1>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<section id="slider-banner">
		<?php do_action( 'accesspresslite_bxslider' ); ?>
	</section><!-- #slider-banner -->
	<?php
	if(is_home() || is_front_page() ){
	$accesspresslite_content_id = "home-content";
	}else{
	$accesspresslite_content_id ="content";
	} ?>
	<div id="<?php echo $content; ?>" class="site-content">
