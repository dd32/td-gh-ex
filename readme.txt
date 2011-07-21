=== Suffusion ===
Author: Kai Ackermann
Tags: white, two-columns, flexible-width 
Tested up to: WP 3.2.1

== Description ==

The whole layout is built up liquid.
On the front page layout has two columns.
If the page is smaller than 480 pixel, the layout is displayed in one column.

To make the theme 100% html5 valid, you have to add the following code to the funktions.php:

// remove invalid links in the <head>
function remove_head_links() {
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
}
add_action('init', 'remove_head_links');
// remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist){
return str_replace('rel="category"', 'rel="tag"', $thelist);
}
add_filter('the_category', 'remove_category_rel_from_category_list');
