<?php
/**
 * File aeonblog.
 * @package   AeonBlog
 * @author    Aeon Theme <info@aeontheme.com>
 * @copyright Copyright (c) 2019, Aeon Theme
 * @link      http://www.aeontheme.com/themes/aeonblog
 * @license   http://www.gnu.org/licenses/gpl-2.0.html
 *
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AeonBlog
 */
$GLOBALS['aeonblog_theme_options'] = aeonblog_get_theme_options();
global $aeonblog_theme_options;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	}
	?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'aeonblog' ); ?></a>
	<header id="masthead" class="site-header">
		<div class="container">
			<!-- Start Header Navigation -->
			<div class="navbar-header site-branding">
				<div class="navbar-brand"><?php the_custom_logo(); ?></div>
				<?php
				if ( is_front_page() && is_home() ) :
					?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$aeonblog_description = get_bloginfo( 'description', 'display' );
			if ( $aeonblog_description || is_customize_preview() ) :
				?>
				<p class="site-description"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $aeonblog_description; /* WPCS: xss ok. */ ?></a></p>
			<?php endif; ?>
		</div>
		<!-- End Header Navigation -->
	</div>

	<?php if ( has_nav_menu('primary')) { ?>

	<!-- Main Menu -->
	<nav class="main-menu navbar navbar-default bootsnav">
		<div class="container">
			<div id="navbar-menu" class="collapse navbar-collapse">
				<?php
					wp_nav_menu( array( 
						'theme_location' => 'primary',
						'depth'             => 2, 
						'menu_class' => 'nav navbar-nav',
					));
				?>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
<?php } ?>
</header><!-- #masthead -->	
<?php if(has_header_image() || is_front_page () ){ ?>
	<div class="row">
		<?php aeonblog_header_image(); ?>
	</div>
<?php } ?> 
<div class="row">
	<!-- Slider Section -->
	<?php 
	do_action('aeonblog_slider_hook'); 
	?> 
</div>
<?php if( !is_page_template('elementor_header_footer') ){ ?>
	<div id="content" class="blog-wrapper">
		<div class="container">
			<div class="row">
				<?php
			}