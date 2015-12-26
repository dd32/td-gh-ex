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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

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
			$hideSearch = get_theme_mod('blogghiamo_theme_options_hidesearch', '1');
			$hideRss = get_theme_mod('blogghiamo_theme_options_rss', '1');
			$facebookURL = get_theme_mod('blogghiamo_theme_options_facebookurl', '#');
			$twitterURL = get_theme_mod('blogghiamo_theme_options_twitterurl', '#');
			$googleplusURL = get_theme_mod('blogghiamo_theme_options_googleplusurl', '#');
			$linkedinURL = get_theme_mod('blogghiamo_theme_options_linkedinurl', '#');
			$instagramURL = get_theme_mod('blogghiamo_theme_options_instagramurl', '#');
			$youtubeURL = get_theme_mod('blogghiamo_theme_options_youtubeurl', '#');
			$pinterestURL = get_theme_mod('blogghiamo_theme_options_pinteresturl', '#');
			$vkURL = get_theme_mod('blogghiamo_theme_options_vkurl', '#');
			$tumblrURL = get_theme_mod('blogghiamo_theme_options_tumblrurl', '#');
			$emailURL = get_theme_mod('blogghiamo_theme_options_emailurl', '#');
		?>

			<div class="socialLine" role="navigation">
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'blogghiamo' ); ?>"><i class="fa fa-facebook spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Facebook', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'blogghiamo' ); ?>"><i class="fa fa-twitter spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Twitter', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'blogghiamo' ); ?>"><i class="fa fa-google-plus spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Google Plus', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'blogghiamo' ); ?>"><i class="fa fa-linkedin spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Linkedin', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'blogghiamo' ); ?>"><i class="fa fa-instagram spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Instagram', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'blogghiamo' ); ?>"><i class="fa fa-youtube spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'YouTube', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'blogghiamo' ); ?>"><i class="fa fa-pinterest spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Pinterest', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'blogghiamo' ); ?>"><i class="fa fa-tumblr spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'blogghiamo' ); ?>"><i class="fa fa-vk spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'VK', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if (!empty($emailURL)) : ?>
					<a href="mailto:<?php echo sanitize_email($emailURL); ?>" title="<?php esc_attr_e( 'Email', 'blogghiamo' ); ?>"><i class="fa fa-envelope spaceRightDouble"><span class="screen-reader-text"><?php esc_attr_e( 'Tumblr', 'blogghiamo' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $hideRss == 1 ) : ?>
					<a href="<?php bloginfo( 'rss2_url' ); ?>" title="RSS"><i class="fa spaceRightDouble fa-rss"><span class="screen-reader-text">RSS</span></i></a>
				<?php endif; ?>
				
				<?php if ( $hideSearch == 1 ) : ?>
					<a href="#" class="top-search"><i class="fa spaceRightDouble fa-search"><span class="screen-reader-text">Search</span></i></a>
				<?php endif; ?>
			</div>
			<?php if ( $hideSearch == 1 ) : ?>
				<div class="topSearchForm">
						<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' ) ); ?>">
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
