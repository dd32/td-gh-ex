<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions plus CSS Backgrounds */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Get Theme Options from Database
	$theme_options = courage_theme_options();
?>
	
	<div id="topheader-wrap">
		<?php locate_template('/inc/top-header.php', true); ?>
	</div>

	<div id="wrapper" class="hfeed">
		
		<div id="header-wrap">
		
			<header id="header" class="clearfix" role="banner">

				<div id="logo" class="clearfix">
				
				<?php do_action('courage_site_title'); ?>

				<?php // Display Tagline on header if activated
				if ( isset($theme_options['header_tagline']) and $theme_options['header_tagline'] == true ) : ?>			
					<h2 class="site-description"><?php echo bloginfo('description'); ?></h2>
				<?php endif; ?>
				
				</div>
				
				<div id="header-content" class="clearfix">
					<?php get_template_part('inc/header-content'); ?>
				</div>

			</header>
		
		</div>
		
		<div id="navi-wrap">
			<nav id="mainnav" class="clearfix" role="navigation">
				<?php 
				// Display Main Navigation
				wp_nav_menu( array(
					'theme_location' => 'primary', 
					'container' => false, 
					'menu_id' => 'mainnav-menu', 
					'echo' => true, 
					'fallback_cb' => 'courage_default_menu')
				);
			?>
			</nav>
		</div>
		
		<?php // Display Custom Header Image
			courage_display_custom_header(); ?>