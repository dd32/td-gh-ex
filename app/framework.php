<?php
/**
 * Silver Quantum ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$silver_quantum = Benlumia007\Backdrop\Framework::get_instance();

$silver_quantum->menus = new Benlumia007\Backdrop\Menu\Menu(
	$args = [
		'primary'   => esc_html__( 'Primary Navigation', 'silver-quantum' ),
		'secondary' => esc_html__( 'Secondary Navigation', 'silver-quantum' ),
		'social'    => esc_html__( 'Social Navigation', 'silver-quantum' ),
	]
);

$silver_quantum->sidebars = new Benlumia007\Backdrop\Sidebar\Sidebar(
	$args = [
		'primary' => [
			'name' => esc_html__( 'Primary Sidebar', 'silver-quantum' ),
			'desc' => esc_html__( 'Test', 'silver-quantum' ),
		],
		'secondary' => [
			'name' => esc_html__( 'Secondary Sidebar', 'silver-quantum' ),
			'desc' => esc_html__( 'Test', 'silver-quantum' ),
		],
		'custom' => [
			'name' => esc_html__( 'Custom Sidebar', 'silver-quantum' ),
			'desc' => esc_html__( 'Test', 'silver-quantum' ),
		],
	]
);

$silver_quantum->admin = new SilverQuantum\Component\Admin();
$silver_quantum->customize = new SilverQuantum\Component\ThemeLayouts();