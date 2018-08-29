<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package storefront
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'azauthority_before_site' ); ?>
<div id="page" class="hfeed site">
	<?php 
		/**
		 * Functions hooked into azauthority_before_header action
		 * 
		 * @hooked azauthority_skip_links - 0
		 */
		do_action( 'azauthority_before_header' ); 
	?>

	<header id="masthead" class="site-header" role="banner" style="<?php azauthority_header_styles(); ?>">
		<div class="main-header">
			<div class="col-full">
				<div class="header-inner clearfix">				
					<?php
					/**
					 * Functions hooked into azauthority_header action
					 *
					 * @hooked azauthority_menu_toggle                     - 10
					 */
					do_action( 'azauthority_header' ); ?>
				</div>
			</div>
		</div><!-- .  -->
	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to azauthority_before_content
	 *
	 * @hooked azauthority_primary_nav - 10
	 * @hooked azauthority_search_form - 20
	 */
	do_action( 'azauthority_before_content' ); ?>

	<div id="content" class="site-content" tabindex="-1">

		<?php
		/**
		 * Functions hooked in to azauthority_single_post_title
		 *
		 * 
		 */
		do_action( 'azauthority_single_post_title' );
		?>

		<?php
		/**
		 * Functions hooked in to azauthority_col_full_wrapper
		 *
		 * 
		 */		
		do_action( 'azauthority_col_full_wrapper' );

		?>

		<?php
		/**
		 * Functions hooked in to azauthority_content_top
		 *
		 * 
		 */
		do_action( 'azauthority_content_top' );