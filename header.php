<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BeautyTemple
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php 			
	$social_links_fb = get_theme_mod( 'beautytemple_social_links_fb_option', '' );
	$social_links_tw = get_theme_mod( 'beautytemple_social_links_tw_option', '' );
	$social_links_gplus =  get_theme_mod( 'beautytemple_social_links_gplus_option', '' );
	$social_links_instagram = get_theme_mod( 'beautytemple_social_links_instagram_option', '' );
	$social_links_github = get_theme_mod( 'beautytemple_social_links_github_option', '' );
	$social_links_behance = get_theme_mod( 'beautytemple_social_links_behance_option', '' );
?>
<div id="page" class="site">
	<header id="masthead" class="site-header" style="background-image: url('<?php header_image(); ?>');" role="banner">
		<div class="site-branding row">
			<?php
			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url() ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

	</header><!-- #masthead -->
	
	<!-- container to normalize fixed navigation behavior when scrolling -->
	<div class="navcontain">
		<nav class="main-navigation navbar" gumby-fixed="top" id="site-navigation" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#site-navigation > .row > ul" href="#"><i class="icon-menu"></i></a>
				<div class="logo"><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '', 'items_wrap' => '<ul id="%1$s" class="%2$s six columns">%3$s</ul>', 'walker' => new beauty_temple_walker) ); ?>

				<?php if ($social_links_fb || $social_links_tw || $social_links_gplus || $social_links_instagram || $social_links_behance):?>
					<div class="social-links six columns">
						<ul>
							<?php if ($social_links_fb):?><li><a target="blank" href="<?php echo $social_links_fb ; ?>"><i class="icon-facebook-squared"></i></a></li><?php endif;?>
							<?php if ($social_links_tw):?><li><a target="blank" href="<?php echo $social_links_tw ; ?>"><i class="icon-twitter"></i></a></li><?php endif;?>
							<?php if ($social_links_gplus):?><li><a target="blank" href="<?php echo $social_links_gplus ; ?>"><i class="icon-gplus"></i></a></li><?php endif;?>
							<?php if ($social_links_instagram):?><li><a target="blank" href="<?php echo $social_links_instagram ; ?>"><i class="icon-instagram"></i></a></li><?php endif;?>
							<?php if ($social_links_behance):?><li><a target="blank" href="<?php echo $social_links_behance ; ?>"><i class="icon-behance"></i></a></li><?php endif;?>
						</ul>
					</div>
				<?php endif;?>			
			</div>
		</nav>
	</div>