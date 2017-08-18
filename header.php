<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AzonBooster
 */

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
<?php do_action( 'azonbooster_before_site' ); ?>
<div id="page" class="site">
	<?php do_action( 'azonbooster_before_header' ); ?>
	<header id="masthead" class="site-header">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked into azonbooster_header action
			 *
			 * @hooked azonbooster_skip_links                       - 0
			 * @hooked azonbooster_social_icons                     - 10
			 * @hooked azonbooster_site_branding                    - 20
			 * @hooked azonbooster_secondary_navigation             - 30
			 * @hooked azonbooster_product_search                   - 40
			 * @hooked azonbooster_primary_navigation_wrapper       - 42
			 * @hooked azonbooster_primary_navigation               - 50
			 * @hooked azonbooster_header_cart                      - 60
			 * @hooked azonbooster_primary_navigation_wrapper_close - 68
			 */
			do_action( 'azonbooster_header' ); ?>

		</div>
	</header><!-- #masthead -->
	<?php do_action( 'azonbooster_after_header' ); ?>

	<?php
	/**
	 * Functions hooked in to azonbooster_before_content
	 *
	 * @hooked azonbooster_header_widget_region - 10
	 */
	do_action( 'azonbooster_before_content' ); ?>

	<div id="content" class="site-content">
		<div class="col-full">
