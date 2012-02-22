<?php
/**
 * The Header for our theme.
 *
 * @subpackage AKYUZ
 * @since AKYUZ 1.0
 */
?><!DOCTYPE html>
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
<title><?php
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
		echo ' | ' . sprintf( __( 'Page %s', AKYUZ_TEXT_DOMAIN ), max( $paged, $page ) );

	?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	?>

	<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php
		// Has the text been hidden?
		if ( 'blank' != get_header_textcolor() ) :
		// If the user has set a custom color for the text use that
	?>
	<style type="text/css">
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
		#sa_branding {background:url(<?php echo header_image(); ?>) top left no-repeat;background-position:center;}
	</style>
	<?php endif; ?>

	<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_tracking_header');?>

	<?php wp_head();?>
</head>

<body <?php body_class(); ?>>
<header role="banner">
	<section id="sa_header_top">
		<div class="container" >
			<div id="sa_hdr_tmenu" class="span-20" >
				<?php wp_nav_menu( array( 'container_class' => 'menu-top-header', 'theme_location' => 'secondary' ) ); ?>
			</div>
			<div id="header_top_social_bar" class="span-4 last">
				<?php akyuz_get_social_bar();?>
			</div>
		</div>
	</section>
	<section id="sa_branding">
		<div class="container">
			<hgroup class="span-12">
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
			<div id="sa_branding_ads" class="span-12 last" style="">
				<div style="height:60px;width:468px;">
					<?php echo akyuz_get_options_value(AKYUZ_SHORTNAME.'_advertising_ads_top');?>
				</div>
			</div>
		</div>

	</section>

	<section id="sa_main_menu_bar" >
		<nav role="navigation" class="navi">
			<h3 class="assistive-text"><?php _e( 'Main menu', AKYUZ_TEXT_DOMAIN ); ?></h3>
			<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
			<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', AKYUZ_TEXT_DOMAIN ); ?>"><?php _e( 'Skip to primary content', AKYUZ_TEXT_DOMAIN ); ?></a></div>
			<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', AKYUZ_TEXT_DOMAIN ); ?>"><?php _e( 'Skip to secondary content', AKYUZ_TEXT_DOMAIN ); ?></a></div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_id'=>'sa_main_menu', 'container_class'=>'jqueryslidemenu' ) ); ?>
			<div class="clear"></div>
		</nav>
	</section>

</header>

<div class="container" id="main-wrap" >

	<div id="main">