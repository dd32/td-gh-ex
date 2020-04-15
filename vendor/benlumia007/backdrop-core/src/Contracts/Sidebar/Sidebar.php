<?php
/**
 * Backdrop Core ( src/Contracts/Sidebar/Sidebar.php )
 *
 * @package      Backdrop Core
 * @copyright    Copyright (C) 2019-2020. Benjamin Lu
 * @license      GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author       Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Contracts\Sidebar;

/**
 * Customize
 *
 * @since  1.0.0
 * @access public
 *
 * @link   ( https://developer.wordpress.org/themes/customize-api )
 */
abstract class Sidebar {
	/**
	 * 
	 */
	public $sidebar_id;

	/**
	 * Construct
	 */
	public function __construct( $sidebar_id = [] ) {}

	/**
	 * Register register_panels
	 */
	public function register() {}
	
	/**
	 * Register register_sections
	 */
	public function create( $name, $id, $desc ) {}
}