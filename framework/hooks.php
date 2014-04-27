<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Theme's Action Hooks
 *
 *
 * @file           hooks.php
 * @link           http://codex.wordpress.org/Plugin_API/Hooks
 */

/**
 * Just after opening <body> tag
 *
 * @see header.php
 */
function themingstrap_container() {
	if(get_theme_option('themingstrap_inline_js')) { ?>
		<style type="text/css">
			<?php echo get_theme_option('themingstrap_inline_js'); ?>
		</style>
		<?php
	 }	
}
add_action('themingstrap_container', 'themingstrap_container');

/**
 * Just after closing </div><!-- end of #container -->
 *
 * @see footer.php
 */
function themingstrap_container_end() {
	do_action( 'themingstrap_container_end' );
	tha_footer_before();
}

/**
 * Just after opening <div id="container">
 *
 * @see header.php
 */
function themingstrap_header() {
	do_action( 'themingstrap_header' );
	tha_header_before();
}

/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function themingstrap_header_top() { 
	$activehmenu =get_theme_option('headermenu');
		if ( $activehmenu == 1): ?>
		<div class="headermenu">
		<?php wp_nav_menu( array('theme_location' => 'top-menu' )); ?>
		</div>
		<?php
	endif;
}
add_action('header_top', 'themingstrap_header_top');
/**
 * Just after opening <div id="header">
 *
 * @see header.php
 */
function themingstrap_in_header() {?>
	<div class="header-right">
	 <?php dynamic_sidebar( 'Header Right' ); ?>
	</div>
<?php	
}
add_action('themingstrap_in_header', 'themingstrap_in_header');

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function themingstrap_header_bottom() {
	do_action( 'themingstrap_header_bottom' );
	tha_header_bottom();
}

/**
 * Just after closing </div><!-- end of #header -->
 *
 * @see header.php
 */
function themingstrap_header_end() {
	do_action( 'themingstrap_header_end' );
	tha_header_after();
}

/**
 * Just before opening <div id="wrapper">
 *
 * @see header.php
 */
function themingstrap_wrapper() {
	do_action( 'themingstrap_wrapper' );
	tha_content_before();
}




/** Just before <div id="post">
 *
 * @see index.php
 */
function themingstrap_entry_before() {
	do_action( 'themingstrap_entry_before' );
	tha_entry_before();
}

/** Just after <div id="post">
 *
 * @see index.php
 */
function themingstrap_entry_top() {
	do_action( 'themingstrap_entry_top' );
	tha_entry_top();
}

/** Just before </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function themingstrap_entry_bottom() {
	do_action( 'themingstrap_entry_bottom' );
	tha_entry_bottom();
}

/** Just after </div> <!-- end of div#post -->
 *
 * @see index.php
 */
function themingstrap_entry_after() {
	do_action( 'themingstrap_entry_after' );
	tha_entry_after();
}

/** Just before comments_template()
 *
 * @see index.php
 */
function themingstrap_comments_before() {
	do_action( 'themingstrap_comments_before' );
	tha_comments_before();
}

/** Just after comments_template()
 *
 * @see index.php
 */
function themingstrap_comments_after() {
	do_action( 'themingstrap_comments_after' );
	tha_comments_after();
}

/**
 * Just before opening <div id="widgets">
 *
 * @see sidebar.php
 */
function themingstrap_widgets_before() {
	do_action( 'themingstrap_widgets_before' );
	tha_sidebars_before();
}

/**
 * Just after opening <div id="widgets">
 *
 * @see sidebar.php
 */
function themingstrap_widgets() {
	do_action( 'themingstrap_widgets' );
	tha_sidebar_top();
}

/**
 * Just before closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function themingstrap_widgets_end() {
	do_action( 'themingstrap_widgets_end' );
	tha_sidebar_bottom();
}

/**
 * Just after closing </div><!-- end of #widgets -->
 *
 * @see sidebar.php
 */
function themingstrap_widgets_after() {
	do_action( 'themingstrap_widgets_after' );
	tha_sidebars_after();
}

/**
 * Just after opening <div id="footer">
 *
 * @see footer.php
 */
function themingstrap_footer_top() {
	$activefmenu =get_theme_option('footermenu');
		if ( $activefmenu == 1):?>
		<div class="footermenu">
		<?php wp_nav_menu( array('theme_location' => 'footer-menu' )); ?>
		</div>
		<?php
	endif;
	
	$footersocial =get_theme_option('footersocial');
		if ( $footersocial == 1):?>
		<div class="socialshare">
		<?php if(get_theme_option('facebook_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('facebook_uid')); ?>"><i class="fa fa-facebook"></i></a>
			<?php } ?>
			<?php if(get_theme_option('twitter_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('twitter_uid')); ?>"><i class="fa fa-twitter"></i></a>
			<?php } ?>
			<?php if(get_theme_option('google_plus_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('google_plus_uid')); ?>"><i class="fa fa-google-plus"></i></a>
			<?php } ?>
			<?php if(get_theme_option('linkedin_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('linkedin_uid')); ?>"><i class="fa fa-linkedin"></i></a>
			<?php } ?>
			<?php if(get_theme_option('youtube_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('youtube_uid')); ?>"><i class="fa fa-youtube"></i></a>
			<?php } ?>
			<?php if(get_theme_option('pinterest_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('pinterest_uid')); ?>"><i class="fa fa-pinterest"></i> </a>
			<?php } ?>
			<?php if(get_theme_option('rss_uid')) {?>
			<a href="<?php echo esc_url(get_theme_option('rss_uid')); ?>"><i class="fa fa-rss"></i></a>
			<?php } ?>		
		</div>
		<?php
	endif;
	
}
add_action('themingstrap_footer_top', 'themingstrap_footer_top');
/**
 * Just before closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function themingstrap_footer_bottom() {
	do_action( 'themingstrap_footer_bottom' );
	tha_footer_bottom();
}

/**
 * Just after closing </div><!-- end of #footer -->
 *
 * @see footer.php
 */
function themingstrap_footer_after() {	
	 if(get_theme_option('themingstrap_inline_js')) {
		echo get_theme_option('themingstrap_inline_js');
	 }	
}
add_action('themingstrap_footer_after', 'themingstrap_footer_after');

/**
 * Theme Options
 *
 * @see theme-options.php
 */
function themingstrap_theme_options() {
	do_action( 'themingstrap_theme_options' );
}

