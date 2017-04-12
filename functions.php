<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0
 */

/**
 * Define Constants
 */
define( 'AST_THEME_NAME', 'astra-theme' );
define( 'AST_THEME_VERSION', '1.0.0' );
define( 'AST_THEME_SETTINGS', 'ast-settings' );
define( 'AST_THEME_DIR', get_template_directory() . '/' );
define( 'AST_THEME_URI', get_template_directory_uri() . '/' );

// 'ast-container' has 20px left, right padding. For pixel perfect added ( twice ) 40px padding to the 'ast-container'.
// E.g. If width set 1280px then with padding left ( 20px ) & right ( 20px ) its 1320px for 'ast-container'. But, Actual contents are 1280px.
define( 'AST_THEME_CONTAINER_PADDING', 20 );
define( 'AST_THEME_CONTAINER_PADDING_TWICE', ( 20 * 2 ) );
define( 'AST_THEME_CONTAINER_BOX_PADDED_PADDING', 40 );
define( 'AST_THEME_CONTAINER_BOX_PADDED_PADDING_TWICE', ( 40 * 2 ) );

/**
 * Replacement for print_r & var_dump.
 */
if ( ! function_exists( 'vl' ) ) :

	/**
	 * Replacement for print_r & var_dump.
	 *
	 * @since 1.0
	 * @param  mixed   $var  Variable maybe string, alphanumeric or array.
	 * @param  integer $dump True if show vardump output.
	 * @return void
	 */
	function vl( $var, $dump = 0 ) {
		?>

		<style type="text/css">
			.vl_pre {
				text-align: left;
				margin: 30px 15px;
				padding: 1em;
				border: 0px;
				outline: 0px;
				font-size: 14px;
				font-family: monospace;
				vertical-align: baseline;
				max-width: 100%;
				overflow: auto;
				color: rgb(248,248,242);
				direction: ltr;
				word-spacing: normal;
				line-height: 1.5;
				border-radius: 0.3em;
				word-wrap: normal;
				letter-spacing: 0.266667px;
				background: rgb(61,69,75);
			}
		</style>

		<?php

		echo "<pre class='vl_pre'><xmp>";
		if ( true == $dump ) {
			var_dump( $var );
		} else {

			if ( is_array( $var ) || is_object( $var ) ) {
				print_r( $var );
			} else {
				echo $var;
			}
		}
		echo '</xmp></pre>';
	}
endif;

/**
 * Load theme hooks
 */
require_once AST_THEME_DIR . 'inc/core/class-ast-theme-options.php';
require_once AST_THEME_DIR . 'inc/core/class-theme-strings.php';

/**
 * Fonts Files
 */
if ( is_admin() ) {
	require_once AST_THEME_DIR . 'inc/customizer/class-ast-fonts-data.php';
}

require_once AST_THEME_DIR . 'inc/customizer/class-ast-fonts.php';

require_once AST_THEME_DIR . 'inc/core/common-functions.php';
require_once AST_THEME_DIR . 'inc/core/class-ast-enqueue-scripts.php';
require_once AST_THEME_DIR . 'inc/class-ast-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once AST_THEME_DIR . 'inc/template-tags.php';

require_once AST_THEME_DIR . 'inc/widgets.php';
require_once AST_THEME_DIR . 'inc/core/theme-hooks.php';
require_once AST_THEME_DIR . 'inc/admin-functions.php';
require_once AST_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once AST_THEME_DIR . 'inc/class-ast-walker-page.php';
require_once AST_THEME_DIR . 'inc/class-ast-nav-menu-walker.php';
require_once AST_THEME_DIR . 'inc/extras.php';
require_once AST_THEME_DIR . 'inc/blog/blog-config.php';
require_once AST_THEME_DIR . 'inc/blog/blog.php';
require_once AST_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once AST_THEME_DIR . 'inc/template-parts.php';

/**
 * Functions and definitions.
 */
require_once AST_THEME_DIR . 'inc/class-ast-after-setup-theme.php';

if ( is_admin() ) {

	/**
	 * Child theme generator
	 */
	require_once AST_THEME_DIR . 'inc/core/class-ast-use-child-theme.php';
	require_once AST_THEME_DIR . 'inc/core/use-child-theme-helpers.php';


	/**
	 * Metabox additions.
	 */
	require_once AST_THEME_DIR . 'inc/metabox/class-ast-meta-boxes.php';
}

require_once AST_THEME_DIR . 'inc/metabox/class-ast-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once AST_THEME_DIR . 'inc/customizer/class-ast-customizer.php';
require_once AST_THEME_DIR . 'inc/core/class-ast-theme-update.php';

/**
 * Compatibility
 */
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-jetpack.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-woocommerce.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-cornerstone.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-beaver-builder.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-beaver-themer.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-bb-ultimate-addon.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-contact-form-7.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-visual-composer.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-site-origin.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-elementor.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-gravity-forms.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-bnr-flyout.php';
require_once AST_THEME_DIR . 'inc/compatibility/class-ast-lifter-lms.php';
