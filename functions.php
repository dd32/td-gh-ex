<?php 
/**
 ************************************************************************************************************************
 * Silver Quantum - functions.php
 ************************************************************************************************************************
 * The (functions.php) template should only do two jobs is to check to see if the theme's compatibility and require the 
 * autoload.php so that it will load all features from the framework.
 * 
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://benjlu.com)
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 * Table of Content
 ************************************************************************************************************************
 *  1.0 - Compatibility Check
 *  2.0 - Load Theme Text Domain
 *  3.0 - Autoload Backdrop Core
 *  4.0 - Require Additional Features
 ************************************************************************************************************************
 */

/**
 ************************************************************************************************************************
 * 1.0 - Compatibility Check
 ************************************************************************************************************************
 */
function silver_quantum_compatibility_check() {
    if ( version_compare( $GLOBALS[ 'wp_version' ], '4.9.6', '<')) {
        return sprintf(__( 'Silver Quantum requires at least WordPress version %1$s. You are currently running %2$s. Please upgrade and try again.', 'silver-quantum' ),
        '4.9.6',
        $GLOBALS[ 'wp_version' ]
        );
    } elseif ( version_compare( PHP_VERSION, '5.6', '<' ) ) {
        return sprintf(__( 'Silver Quantum requires at least PHP version %1$s. You are currently running %2$s. Please upgrade and try again.', 'silver-quantum' ),
        '5.6',
        PHP_VERSION
        );
    }
    return '';
}

function silver_quantum_switch_theme() {
    if ( version_compare( $GLOBALS[ 'wp_version' ], '4.9.6', '<') || version_compare( PHP_VERSION, '5.6', '<' ) ) {
        switch_theme( get_option( 'theme_switched' ) );
        add_action( 'admin_notices', 'silver_quantum_upgrade_notice' );
    }
    return false;

}
add_action( 'after_switch_theme', 'silver-quantum_switch_theme' );

function silver_quantum_upgrade_notice() {
    printf( '<div class="error"><p>%s</p></div>', esc_html( silver_quantum_compatibility_check() ) );
}

/**
 ************************************************************************************************************************
 *  2.0 - Load Theme Text Domain
 ************************************************************************************************************************
 */
function silver_quantum_load_theme_setup() {
    /**
     ********************************************************************************************************************
     * load_theme_textdomain. This should translate all translation in the theme. if there's a second text domain, it 
     * should ignore since the translation only takes the primary text domain.
     ********************************************************************************************************************
     */
    load_theme_textdomain( 'silver-quantum' );
}
add_action( 'after_setup_theme', 'silver_quantum_load_theme_setup' );

/**
 ************************************************************************************************************************
 *  3.0 - Autoload Backdrop Core
 ************************************************************************************************************************
 */
if ( file_exists( get_parent_theme_file_path( '/vendor/autoload.php' ) ) ) {
    require_once( get_parent_theme_file_path( '/vendor/autoload.php' ) );
}

/**
 ************************************************************************************************************************
 *  4.0 - Require Additional Features
 ************************************************************************************************************************
 */
array_map( function( $features ) {
    require_once( get_parent_theme_file_path( "/inc/{$features}.php" ) );
}, [
    'custom-background',
    'custom-header',
    'custom-logo'
] );