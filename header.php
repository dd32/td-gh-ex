<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package semplicemente
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;
			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div>
		<?php 
			$hideSearch = get_theme_mod('semplicemente_theme_options_hidesearch', '1');
			$facebookURL = get_theme_mod('semplicemente_theme_options_facebookurl', '#');
			$twitterURL = get_theme_mod('semplicemente_theme_options_twitterurl', '#');
			$googleplusURL = get_theme_mod('semplicemente_theme_options_googleplusurl', '#');
			$linkedinURL = get_theme_mod('semplicemente_theme_options_linkedinurl', '#');
			$instagramURL = get_theme_mod('semplicemente_theme_options_instagramurl', '#');
			$youtubeURL = get_theme_mod('semplicemente_theme_options_youtubeurl', '#');
			$pinterestURL = get_theme_mod('semplicemente_theme_options_pinteresturl', '#');
			$tumblrURL = get_theme_mod('semplicemente_theme_options_tumblrurl', '#');
			$vkURL = get_theme_mod('semplicemente_theme_options_vkurl', '#');
		?>

		<div class="site-social">
			<div class="socialLine">
			
				<?php if (!empty($facebookURL)) : ?>
					<a href="<?php echo esc_url($facebookURL); ?>" title="<?php esc_attr_e( 'Facebook', 'semplicemente' ); ?>"><i class="fa fa-facebook spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Facebook', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($twitterURL)) : ?>
					<a href="<?php echo esc_url($twitterURL); ?>" title="<?php esc_attr_e( 'Twitter', 'semplicemente' ); ?>"><i class="fa fa-twitter spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Twitter', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($googleplusURL)) : ?>
					<a href="<?php echo esc_url($googleplusURL); ?>" title="<?php esc_attr_e( 'Google Plus', 'semplicemente' ); ?>"><i class="fa fa-google-plus spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Google Plus', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($linkedinURL)) : ?>
					<a href="<?php echo esc_url($linkedinURL); ?>" title="<?php esc_attr_e( 'Linkedin', 'semplicemente' ); ?>"><i class="fa fa-linkedin spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Linkedin', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($instagramURL)) : ?>
					<a href="<?php echo esc_url($instagramURL); ?>" title="<?php esc_attr_e( 'Instagram', 'semplicemente' ); ?>"><i class="fa fa-instagram spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Instagram', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($youtubeURL)) : ?>
					<a href="<?php echo esc_url($youtubeURL); ?>" title="<?php esc_attr_e( 'YouTube', 'semplicemente' ); ?>"><i class="fa fa-youtube spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'YouTube', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($pinterestURL)) : ?>
					<a href="<?php echo esc_url($pinterestURL); ?>" title="<?php esc_attr_e( 'Pinterest', 'semplicemente' ); ?>"><i class="fa fa-pinterest spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Pinterest', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if (!empty($tumblrURL)) : ?>
					<a href="<?php echo esc_url($tumblrURL); ?>" title="<?php esc_attr_e( 'Tumblr', 'semplicemente' ); ?>"><i class="fa fa-tumblr spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'Tumblr', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
						
				<?php if (!empty($vkURL)) : ?>
					<a href="<?php echo esc_url($vkURL); ?>" title="<?php esc_attr_e( 'VK', 'semplicemente' ); ?>"><i class="fa fa-vk spaceLeftDouble"><span class="screen-reader-text"><?php esc_html_e( 'VK', 'semplicemente' ); ?></span></i></a>
				<?php endif; ?>
				
				<?php if ( $hideSearch == 1 ) : ?>
					<a href="#" class="top-search"><i class="fa spaceLeftDouble fa-search"></i></a>
				<?php endif; ?>
				
			</div>
				<?php if ( $hideSearch == 1 ) : ?>
				<div class="topSearchForm">
					<?php get_search_form(); ?>
				</div>
				<?php endif; ?>
		</div>
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle"><?php esc_html_e( 'Menu', 'semplicemente' ); ?><i class="fa fa-align-justify"></i></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
