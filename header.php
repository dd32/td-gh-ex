<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package adbooster
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
<?php do_action( 'adbooster_before_site' ); ?>
<div id="page" class="site">
	<?php do_action( 'adbooster_before_header' ); ?>
	<header id="masthead" class="site-header">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked into adbooster_header action
			 */
			do_action( 'adbooster_header' ); ?>

		</div>
	</header><!-- #masthead -->
	<?php do_action( 'adbooster_after_header' ); ?>

	<?php
	/**
	 * Functions hooked in to adbooster_before_content
	 *
	 * @hooked adbooster_header_widget_region - 10
	 */
	do_action( 'adbooster_before_content' ); ?>

	<div id="content" class="site-content">
		<div class="col-full">
