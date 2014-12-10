<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package blogghiamo
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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'blogghiamo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="theTop">
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		<?php 
			global $blogghiamo_theme_options;
			$se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options );
		?>

			<div class="socialLine" role="navigation">
				<?php if ( $se_options['facebookurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['facebookurl']); ?>" title="Facebook"><i class="fa spaceRightDouble fa-facebook"><span class="screen-reader-text">Facebook</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['twitterurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['twitterurl']); ?>" title="Twitter"><i class="fa spaceRightDouble fa-twitter"><span class="screen-reader-text">Twitter</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['googleplusurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['googleplusurl']); ?>" title="Google Plus"><i class="fa spaceRightDouble fa-google-plus"><span class="screen-reader-text">Google Plus</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['linkedinurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['linkedinurl']); ?>" title="Linkedin"><i class="fa spaceRightDouble fa-linkedin"><span class="screen-reader-text">Linkedin</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['instagramurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['instagramurl']); ?>" title="Instagram"><i class="fa spaceRightDouble fa-instagram"><span class="screen-reader-text">Instagram</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['youtubeurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['youtubeurl']); ?>" title="YouTube"><i class="fa spaceRightDouble fa-youtube"><span class="screen-reader-text">YouTube</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['pinteresturl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['pinteresturl']); ?>" title="Pinterest"><i class="fa spaceRightDouble fa-pinterest"><span class="screen-reader-text">Pinterest</span></i></a>
				<?php endif; ?>
				
				<?php if ( $se_options['tumblrurl'] != '' ) : ?>
					<a href="<?php echo esc_url($se_options['tumblrurl']); ?>" title="Tumblr"><i class="fa spaceRightDouble fa-tumblr"><span class="screen-reader-text">Tumblr</span></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hiderss'] ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa spaceRightDouble fa-rss"><span class="screen-reader-text">RSS</span></i></a>
				<?php endif; ?>
				
				<?php if ( ! $se_options['hidesearch'] ) : ?>
					<a href="#" class="top-search"><i class="fa spaceRightDouble fa-search"><span class="screen-reader-text">Search</span></i></a>
				<?php endif; ?>
			</div>
			<?php if ( ! $se_options['hidesearch'] ) : ?>
				<div class="topSearchForm">
						<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
							<label>
								<span class="screen-reader-text"><?php _e( 'Search for:', 'blogghiamo' ); ?></span>
								<input type="search" name="s" class="search" placeholder="<?php _e('Type here and hit enter...', 'blogghiamo'); ?>">
							</label>
						</form>
				</div>
			<?php endif; ?>
		</div>
			<nav id="site-navigation" class="main-navigation smallPart" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'blogghiamo' ); ?><i class="fa fa-align-justify"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
