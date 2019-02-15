<?php
/**
 * Backdrop core (framework.php)
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2018-2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

/**
 * Table of Content
 *
 * 1.0 - array_map ( $config )
 * 2.0 - array_map ( $scripts )
 * 3.0 - array_map ( $core )
 * 4.0 - array_map ( $customize )
 * 5.0 - array_map ( $general )
 * 6.0 - array_map ( $loop )
 * 7.0 - array_map ( $menu )
 * 8.0 - array_map ( $misc )
 * 9.0 - array_map ( $sidebar )
 */

/**
 * 1.0 - array_map ( $config )
 */
array_map(
	function( $config ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/config/{$config}.php" );
	},
	[
		'functions-setup',
		'functions-sidebars',
	]
);

/**
 * 2.0 - array_map ( $scripts )
 */
array_map(
	function ( $scripts ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/scripts/{$scripts}.php" );
	},
	[
		'functions-scripts',
	]
);

/**
 * 3.0 - array_map ( $core )
 */
array_map(
	function( $core ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/core/{$core}.php" );
	},
	[
		'custom-background',
		'custom-header',
	]
);

/**
 * 4.0 - array_map ( $customize )
 */
array_map(
	function ( $customize ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/customize/{$customize}.php" );
	},
	[
		'class-control-radio-image',
	]
);

/**
 * 5.0 - array_map ( $general )
 */
array_map(
	function ( $general ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/general/{$general}.php" );
	},
	[
		'functions-entry',
		'functions-site',
	]
);

/**
 * 6.0 - array_map ( $loop )
 */
array_map(
	function ( $loop ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/loop/{$loop}.php" );
	},
	[
		'custom-query',
		'main-query',
	]
);

/**
 * 7.0 - array_map ( $menu )
 */
array_map(
	function( $menu ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/menu/{$menu}.php" );
	},
	[
		'default',
	]
);

/**
 * 8.0 - array_map ( $misc )
 */
array_map(
	function( $misc ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/misc/{$misc}.php" );
	},
	[
		'functions-filters',
		'functions-head',
	]
);

/**
 * 9.0 - array_map ( $sidebar )
 */
array_map(
	function ( $sidebar ) {
		require_once get_parent_theme_file_path( "/vendor/benlumia007/backdrop-core/src/sidebar/{$sidebar}.php" );
	},
	[
		'default',
	]
);
