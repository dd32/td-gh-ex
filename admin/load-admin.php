<?php

if (current_user_can('edit_posts')) {

	add_action('admin_menu', 'weaverx_add_admin',5);
	weaverx_load_admin_aux();


function weaverx_add_admin() {	// action definition
	/* adds our admin panel  (add_action: admin_menu) */
	// 'edit_theme_options' works for both single and multisite
	$page = add_theme_page('WeaverX',  __('Theme Options', 'weaver-xtreme' /*adm*/), 'edit_theme_options', 'WeaverX', 'weaverx_admin_theme_page');
	/* using registered $page handle to hook stylesheet loading for this admin page */
	add_action('admin_print_styles-'.$page, 'weaverx_admin_scripts');
}

// callback for add_theme_page
function weaverx_admin_theme_page() {
	$wp_vers = $GLOBALS['wp_version'];
	$cur_vers = $wp_vers;
	$beta = strpos($cur_vers, '-');
	if ( $beta > 0 ) {
		$cur_vers = substr($cur_vers,0,$beta);	// strip the beta part if there
	}
	if (version_compare($cur_vers, WEAVERX_MIN_WPVERSION, '<')) {
		echo '<br><br><h2 style="padding:4px;background:pink;">' .  __('ERROR: You are using WordPress Version ', 'weaver-xtreme' /*adm*/) . $GLOBALS['wp_version'] .
		__(' Weaver Xtreme requires <em>WordPress Version ', 'weaver-xtreme' /*adm*/) . WEAVERX_MIN_WPVERSION .
		__('</em> or above. You should always upgrade to the latest version of WordPress for maximum site performance and security.', 'weaver-xtreme' /*adm*/) .
		'</h2>';	// admin message
		return;
	}

	require_once(get_template_directory() . WEAVERX_ADMIN_DIR . '/admin-top.php'); // NOW - load the admin stuff
	do_action('weaverxplus_add_admin');
	weaverx_do_admin();
}

// callback for admin_print_styles in add_admin above
function weaverx_admin_scripts() {
	/* called only on the admin page, enqueue our special style sheet here (for tabbed pages) */
	wp_enqueue_style('wvrxaStylesheet', get_template_directory_uri().WEAVERX_ADMIN_DIR.'/assets/css/admin-style.css');
	if ( is_rtl() )
		wp_enqueue_style('wvrxartlStylesheet', get_template_directory_uri().WEAVERX_ADMIN_DIR.'/assets/css/admin-style-rtl.css');

	wp_enqueue_style ("thickbox");
	wp_enqueue_script ("thickbox");

	// @@@@@@@@@@@@@@@@ jscolor needs fixing - won't find it with WEAVERX_ADMIN_DIR

	wp_enqueue_script('wvrxJscolor', get_template_directory_uri().'/assets/js/jscolor/jscolor.js',WEAVERX_VERSION); // .min fails
	wp_enqueue_script('wvrxYetii', get_template_directory_uri().WEAVERX_ADMIN_DIR.'/assets/js/yetii/yetii'.WEAVERX_MINIFY.'.js',WEAVERX_VERSION);
	wp_enqueue_script('wvrxHide', get_template_directory_uri().WEAVERX_ADMIN_DIR.'/assets/js/theme/hide-css'.WEAVERX_MINIFY.'.js',WEAVERX_VERSION);
	wp_enqueue_script('wvrxMediaLib', get_template_directory_uri().WEAVERX_ADMIN_DIR.'/assets/js/theme/media-lib'.WEAVERX_MINIFY.'.js',WEAVERX_VERSION);
}
//--

add_action('admin_init', 'weaverx_admin_init_cb');

function weaverx_admin_init_cb() {	// action definition
	require_once( get_template_directory().WEAVERX_ADMIN_DIR.'/lib-admin.php' );
	require_once( get_template_directory().WEAVERX_ADMIN_DIR.'/lib-admin-part2.php' );

	weaverx_sapi_options_init(); // This must come first as it hooks update_option used elsewhere
	return;
} //ttt
//--


add_action('admin_head', 'weaverx_admin_head');

function weaverx_admin_head() {	// action definition
}
}	// END IF CAN EDIT POSTS ---------------------------------------------------------------------

function weaverx_load_admin_aux() {

	if (current_user_can('edit_posts')) { // allows only admin to see, also avoids loading at runtime
		require_once(get_template_directory() . WEAVERX_ADMIN_DIR . '/admin-page-posts.php');	// per page-posts admin
	}

	if (current_user_can('activate_plugins')) { // allows only admin to see, also avoids loading at runtime
		require_once(get_template_directory() . WEAVERX_ADMIN_DIR . '/addon-plugins.php');      // the tgm plugin checker
	}
}
?>
