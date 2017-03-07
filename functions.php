<?php
define( 'OPTIONS_SLUG', 'ascend' );
define( 'LANGUAGE_SLUG', 'ascend' );

function ascend_lang_setup() {
	load_theme_textdomain('ascend', get_template_directory() . '/languages');
}
add_action( 'after_setup_theme', 'ascend_lang_setup' );
/*
 * Init Theme Options
 */
require_once locate_template('/themeoptions/redux/framework.php');          		// Options framework
require_once locate_template('/themeoptions/options.php');          				// Options settings
require_once locate_template('/themeoptions/options/ascend_extension.php'); 		// Options framework extension

/*
 * Init Theme Startup/Core utilities/classes
 */
require_once locate_template('/lib/init.php');            						// Initial theme setup and constants
require_once locate_template('/lib/classes/sidebar.php');         				// Sidebar class
require_once locate_template('/lib/classes/kad_nav.php');        				// Nav Options
require_once locate_template('/lib/classes/aq_resizer.php');      				// Resize on the fly
require_once locate_template('/lib/kt-plugins-activate.php');   			// Plugin Activation
require_once locate_template('/lib/classes/cmb/init.php');     				// Custom Gallery metaboxes
require_once locate_template('/lib/classes/kt_cmb_extensions.php');     	// Custom Gallery metaboxes
require_once locate_template('/lib/image_functions.php');     				// Custom Gallery metaboxes
require_once locate_template('/lib/kt_slider.php');     				// Custom Gallery metaboxes
require_once locate_template('/lib/config.php');          					// Configuration
require_once locate_template('/lib/config-pagetitle.php');          					// Configuration

/*
 * Init Custom post type, metaboxes
 */
require_once locate_template('/lib/cleanup.php');        							// Cleanup
require_once locate_template('/lib/nav.php');            							// Custom nav modifications
require_once locate_template('/lib/metaboxes/post-metaboxes.php');     				// Custom metaboxes
require_once locate_template('/lib/metaboxes/sidebar-metaboxes.php');     			// Custom metaboxes
require_once locate_template('/lib/metaboxes/page-template-blog-metaboxes.php');    // Custom metaboxes
require_once locate_template('/lib/metaboxes/portfolio-metaboxes.php');     		// Custom metaboxes

/*
 * Init Widgets
 */
require_once locate_template('/lib/widgets/standard_widgets.php');         				// Standard Widgets
require_once locate_template('/lib/widgets/widget_setup.php');  						// Widget Setup

/*
 * Template Hooks
 */
require_once locate_template('/lib/custom.php');          						// Custom functions
require_once locate_template('/lib/pagebuilder.php');          					// Pagebuilder Extensions
require_once locate_template('/lib/template_hooks/breadcrumbs.php');         	// Breadcrumbs
require_once locate_template('/lib/template_hooks/authorbox.php');         		// Author box
require_once locate_template('/lib/template_hooks/posts.php'); 					// Posts Template Hooks
require_once locate_template('/lib/template_hooks/portfolio.php'); 				// Portfolio Template Hooks
require_once locate_template('/lib/template_hooks/hooks_page.php'); 			// Page Template Hooks
require_once locate_template('/lib/template_hooks/hooks_header.php'); 			// Header Hooks
require_once locate_template('/lib/template_hooks/hooks_mobile_header.php'); 	// Mobile Header Hooks
require_once locate_template('/lib/template_hooks/hooks_topbar_header.php'); 	// Topbar Hooks
require_once locate_template('/lib/template_hooks/hooks_footer.php'); 			// Footer Hooks
require_once locate_template('/lib/template_hooks/posts_list.php'); 			// Post List Hooks
require_once locate_template('/lib/template_hooks/archive.php'); 				// Archive Hooks

/*
* Woomcommerce Support
*/
require_once locate_template('/lib/woocommerce/woo-support.php'); 					// Woocommerce functions
require_once locate_template('/lib/woocommerce/woo-archive-hooks.php'); 			// Woocommerce archive functions
require_once locate_template('/lib/woocommerce/woo-single-product-hooks.php'); 		// Woocommerce Single Product 
require_once locate_template('/lib/woocommerce/woo-account.php'); 					// Woocommerce My Account
require_once locate_template('/lib/woocommerce/woo-cart.php'); 						// Woocommerce Cart

/*
 * Load Scripts
 */
require_once locate_template('/lib/admin_scripts.php');    					// Admin Scripts
require_once locate_template('/lib/scripts.php');        					// Front End Scripts and stylesheets
require_once locate_template('/lib/output_css.php'); 						// Fontend Custom CSS


/**
 * Note: Do not add any custom code here. Please use a custom plugin or child theme so that your customizations aren't lost during updates.
 * https://www.kadencethemes.com/child-themes/
 */

