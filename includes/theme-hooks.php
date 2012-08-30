<?php 
/*
 * Theme hooks
 *
 * @package mantra
 * @subpackage Functions
 */
 
/**
 * HEADER.PHP HOOKS
*/

// Before wp_head hook
function cryout_header_hook() {
    do_action('cryout_header_hook');
}
// SEO hook
function cryout_seo_hook() {
    do_action('cryout_seo_hook');
}

// Before wrapper
function cryout_body_hook() {
    do_action('cryout_body_hook');
}

// Inside wrapper
function cryout_wrapper_hook() {
    do_action('cryout_wrapper_hook');
}

// Inside branding
function cryout_branding_hook() {
    do_action('cryout_branding_hook');
}

// Inside access
function cryout_access_hook() {
    do_action('cryout_access_hook');
}

// Inside forbottom
function cryout_forbottom_hook() {
    do_action('cryout_forbottom_hook');
}

// Breadcrumbs
function cryout_breadcrumbs_hook() {
    do_action('cryout_breadcrumbs_hook');
}

/**
 * FOOTER.PHP HOOKS
*/

// Footer hook
function cryout_footer_hook() {
    do_action('cryout_footer_hook');
}

?>
