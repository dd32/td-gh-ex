<?php

/*------------------------------------------------------------------------------------*/

/**
 * Retrieve footer image for custom footer.
 *
 * @since 2.1.0
 * @uses FOOTER_IMAGE_DEFAULT
 *
 * @return string
 */
function get_footer_image($fdi) {
		$default = defined('FOOTER_IMAGE_DEFAULT') ? FOOTER_IMAGE_DEFAULT : '';

	return get_theme_mod('footer_image'.$fdi, $default);
}

/**
 * Display footer image path.
 *
 * @since 2.1.0
 */
function footer_image($fdi) {
	echo get_footer_image($fdi);
}

/**
 * Add callbacks for image footer display.
 */
function add_custom_image_footer() 
{

	add_theme_support( 'custom-footer' );

	if ( ! is_admin() )
		return;
	get_template_part('custom','footer');
	$GLOBALS['custom_image_footer'] =& new Custom_Image_Footer();
	add_action('admin_menu', array(&$GLOBALS['custom_image_footer'], 'init'));
}

/**
 * Register a selection of default footers to be displayed by the custom footer admin UI.
 *
 * @since 3.0.0
 *
 * @param array $footers Array of footers keyed by a string id. The ids point to arrays containing 'url', 'thumbnail_url', and 'description' keys.
 */
function register_default_footers( $footers ) {
	global $_wp_default_footers;

	$_wp_default_footers = array_merge( (array) $_wp_default_footers, (array) $footers );
}

/**
 * Unregister default footers.
 *
 * This function must be called after register_default_footers() has already added the
 * footer you want to remove.
 *
 * @see register_default_footers()
 * @since 3.0.0
 *
 * @param string|array The footer string id (key of array) to remove, or an array thereof.
 * @return True on success, false on failure.
 */
function unregister_default_footers( $footer ) {
	global $_wp_default_footers;
	if ( is_array( $footer ) ) {
		array_map( 'unregister_default_footers', $footer );
	} elseif ( isset( $_wp_default_footers[ $footer ] ) ) {
		unset( $_wp_default_footers[ $footer ] );
		return true;
	} else {
		return false;
	}
}

/*-------------------------------------------------------------------------------------*/

function footer_category_link($categ)
{
	$categ_id = get_theme_mod('cat'.$categ, '0');
	if ($categ_id <= 0)
	{
		echo "<div class=\"footer-button\" style=\"color: white;\">" . CATEGORY_NOT_SET . "</div>";
		return;
	}
	echo "<div class=\"footer-button\"><a href=\"" . get_category_link($categ_id) . "\">" .
		get_cat_name($categ_id). "</a></div>";
}
?>