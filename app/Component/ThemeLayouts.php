<?php
/**
 * Silver Quantum ( Customize.php )
 *
 * @package     Silver Quantum
 * @copyright   Copyright (C) 2014-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Table of Content
 *
 * 1.0 - Create a New Framework
 */
namespace SilverQuantum\Component;

use Benlumia007\Backdrop\Contracts\Customize\Customize as CustomizeAbstract;
use SilverQuantum\Control\ImageRadio;

/**
 * 1.0 - Create a New Framework
 *
 * This will initialize te Backdrop Core Framework and will add all the necessary components and features
 * to the theme, such as Menu, Sidebar, and Global Layout.
 */
class ThemeLayouts extends CustomizeAbstract {
	/**
	 * Register register_panels
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_panels( $manager ) {
		$manager->add_panel( 'theme_options', [
			'title' => esc_html__( 'Theme Options', 'silver-quantum' ),
			'priority' => 5,
		] );
	}

	/**
	 * Register register_sections
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_sections( $manager ) {
		$manager->add_section( 'global_layout', 
		[
			'title'    => esc_html__( 'Global Layout', 'silver-quantum' ),
			'panel'    => 'theme_options',
			'priority' => 5
		] );
	}

	/**
	 * Register register_settings
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_settings( $manager ) {
		$manager->add_setting( 'global_layout', 
		[
			'default' => 'left-sidebar',
			'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::layouts',
		] );
	}

	/**
	 * Register register_controls
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_controls( $manager ) {
		$manager->add_control( new ImageRadio( $manager, 'global_layout',
			[
				'label'       => esc_html__( 'Global Layout', 'silver-quantum' ),
				'description' => esc_html__( 'Global Layout applies to all layouts that supports in blog posts.', 'silver-quantum' ),
				'section'     => 'global_layout',
				'settings'    => 'global_layout',
				'type'        => 'radio-image',
				'choices'     =>
					[
						'left-sidebar'  => get_theme_file_uri( '/public/images/2cl.png' ),
						'right-sidebar' => get_theme_file_uri( '/public/images/2cr.png' ),
						'no-sidebar'    => get_theme_file_uri( '/public/images/1col.png' ),
					],
		] ) );
	}
}
