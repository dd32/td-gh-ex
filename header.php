<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storto
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div>
		<?php 
			$hideSearch = get_theme_mod('storto_theme_options_hidesearch', '1');
			$facebookURL = get_theme_mod('storto_theme_options_facebookurl', '#');
			$twitterURL = get_theme_mod('storto_theme_options_twitterurl', '#');
			$googleplusURL = get_theme_mod('storto_theme_options_googleplusurl', '#');
			$linkedinURL = get_theme_mod('storto_theme_options_linkedinurl', '#');
			$instagramURL = get_theme_mod('storto_theme_options_instagramurl', '#');
			$youtubeURL = get_theme_mod('storto_theme_options_youtubeurl', '#');
			$pinterestURL = get_theme_mod('storto_theme_options_pinteresturl', '#');
			$tumblrURL = get_theme_mod('storto_theme_options_tumblrurl', '#');
			$vkURL = get_theme_mod('storto_theme_options_vkurl', '#');
		?>

			<div class="socialLine smallPart">
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'storto' ); ?>"><i class="fa spaceRightDouble fa-facebook"><span class="screen-reader-text"><?php esc_attr_e( 'Facebook', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'storto' ); ?>"><i class="fa spaceRightDouble fa-twitter"><span class="screen-reader-text"><?php esc_attr_e( 'Twitter', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'storto' ); ?>"><i class="fa spaceRightDouble fa-google-plus"><span class="screen-reader-text"><?php esc_attr_e( 'Google Plus', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'storto' ); ?>"><i class="fa spaceRightDouble fa-linkedin"><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'storto' ); ?>"><i class="fa spaceRightDouble fa-instagram"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'storto' ); ?>"><i class="fa spaceRightDouble fa-youtube"><span class="screen-reader-text"><?php esc_attr_e( 'YouTube', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'storto' ); ?>"><i class="fa spaceRightDouble fa-pinterest"><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'storto' ); ?>"><i class="fa spaceRightDouble fa-tumblr"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'storto' ); ?>"><i class="fa spaceRightDouble fa-vk"><span class="screen-reader-text"><?php esc_attr_e( 'VK', 'storto' ); ?></span></i></a>
				<?php endif; ?>
				<?php if ($hideSearch == 1 ) : ?>
					<a href="#" class="top-search"><i class="fa spaceRightDouble fa-search"></i></a>
				<?php endif; ?>
				
			</div>
				<?php if ($hideSearch == 1 ) : ?>
				<div class="topSearchForm">
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>"><input type="search" name="s" class="search" placeholder="<?php _e('Type and hit enter...', 'storto'); ?>"></form>
				</div>
				<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Select a page...', 'storto' ); ?><i class="fa fa-align-justify"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<?php get_sidebar(); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
