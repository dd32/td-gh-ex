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
<title><?php wp_title( '|', true, 'right' ); ?></title>
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
			global $storto_theme_options;
			$se_options = get_option( 'storto_theme_options', $storto_theme_options );
		?>

			<div class="socialLine">
			
				<?php if ( $se_options['facebookurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['facebookurl']); ?>" title="Facebook" target="_blank"><i class="fa spaceRightDouble fa-facebook"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['twitterurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['twitterurl']); ?>" title="Twitter" target="_blank"><i class="fa spaceRightDouble fa-twitter"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['googleplusurl']); ?>" title="Google Plus" target="_blank"><i class="fa spaceRightDouble fa-google-plus"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['linkedinurl']); ?>" title="Linkedin" target="_blank"><i class="fa spaceRightDouble fa-linkedin"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['instagramurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['instagramurl']); ?>" title="Instagram" target="_blank"><i class="fa spaceRightDouble fa-instagram"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['youtubeurl']); ?>" title="YouTube" target="_blank"><i class="fa spaceRightDouble fa-youtube"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['pinteresturl']); ?>" title="Pinterest" target="_blank"><i class="fa spaceRightDouble fa-pinterest"></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['tumblrurl']); ?>" title="Tumblr" target="_blank"><i class="fa spaceRightDouble fa-tumblr"></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa spaceRightDouble fa-rss"></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hidesearch'] ) : ?>
					<a href="#" class="top-search"><i class="fa spaceRightDouble fa-search"></i></a>
				<?php endif; ?>
				
			</div>
				<?php if ( ! $se_options['hidesearch'] ) : ?>
				<div class="topSearchForm">
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>"><input type="search" name="s" class="search" placeholder="<?php _e('Type and hit enter...', 'semplicemente'); ?>"></form>
				</div>
				<?php endif; ?>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Select a page...', 'storto' ); ?><i class="fa fa-align-justify"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<?php get_sidebar(); ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
