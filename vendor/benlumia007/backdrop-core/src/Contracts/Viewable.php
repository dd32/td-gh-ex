<?php
/**
 * Backdrop Core ( src/Contracts/Viewable.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

namespace Benlumia007\Backdrop\Contracts;

/**
 * Implements Displayable
 */
interface Viewable {
	/**
	 * Displayable
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  array $args display.
	 */
	public static function display( $type, $args = [] );
}