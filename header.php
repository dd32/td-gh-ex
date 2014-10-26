<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '&raquo;', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php /* Embeds HTML5shiv to support HTML5 elements in older IE versions plus CSS Backgrounds */ ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Get Theme Options from Database
	$theme_options = rubine_theme_options();
?>

<div id="wrapper" class="hfeed">

	<div id="header-wrap">
	
		<div id="topheader-wrap">
			
			<div id="topheader" class="container clearfix">
			
				<?php // Display Search Form
				if ( isset($theme_options['header_search']) and $theme_options['header_search'] == true ) : ?>

					<div id="header-search">
						<?php get_search_form(true); ?>
					</div>

				<?php endif; ?>
				
				<?php // Display Top Navigation Menu
				if ( has_nav_menu( 'secondary' ) ) : ?>
				
					<nav id="topnav" class="clearfix" role="navigation">
						<?php // Display Top Navigation
							wp_nav_menu(array('theme_location' => 'secondary', 'container' => false, 'menu_id' => 'topnav-menu', 'echo' => true, 'fallback_cb' => '', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 1));
						?>
					</nav>
					
				<?php endif; ?>
				
			</div>
			
		</div>
	
		<header id="header" class="container clearfix" role="banner">

			<div id="logo">
			
				<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<h1 class="site-title"><?php bloginfo('name'); ?></h1>
				</a>
				
			<?php // Display Tagline on header if activated
			if ( isset($theme_options['header_tagline']) and $theme_options['header_tagline'] == true ) : ?>			
				<h2 class="site-description"><?php echo bloginfo('description'); ?></h2>
			<?php endif; ?>
			
			</div>
			
			<div id="header-content" class="clearfix">
			
			<?php // Display Social Icons
			if ( isset($theme_options['header_icons']) and $theme_options['header_icons'] == true ) : ?>

				<div id="header-social-icons" class="social-icons-wrap clearfix">
					<?php rubine_display_social_icons(); ?>
				</div>
				
			<?php endif; ?>
			
			</div>

		</header>
	
	</div>
	
	<div id="mainnav-wrap">
		
		<nav id="mainnav" class="container clearfix" role="navigation">
			
			<?php // Display Main Navigation
				wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_id' => 'mainnav-menu', 'echo' => true, 'fallback_cb' => 'rubine_default_menu', 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 0));
			?>
			
		</nav>
		
	</div>
	
	<?php // Display Custom Header Image
		rubine_display_custom_header(); ?>
		