<?php //phpcs:ignore
/**
 * Backdrop Core ( framework.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019-2020. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Menu;

use Benlumia007\Backdrop\Contracts\Menu\Menu as MenuContracts;

/**
 * Regiser Menu Class
 */
class Menu extends MenuContracts {
	/**
	 * Menu
	 *
	 * @var string
	 */
	public $menu_id;

	/**
	 * Construct
	 *
	 * @param string $menu_id string.
	 */
	public function __construct( $menu_id = [] ) {
		$this->menu_id = array_merge( $menu_id );

		add_action( 'after_setup_theme', [ $this, 'register' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
	}

	/**
	 * Register Custom Menus
	 */
	public function register() {
		foreach ( $this->menu_id as $key => $value ) {
			$this->create( $value, $key );
		}
	}

	/**
	 * Create Menus
	 *
	 * @param string $name outputs name.
	 * @param string $id output id.
	 */
	public function create( $name, $id ) {
		$args = [
			$id => $name,
		];
		register_nav_menus( $args );
	}

	public function enqueue() {
		/**
		 * We will be enqueue the app.js file, which mainly be for the navigation only.
		 */
		wp_enqueue_script( 'backdrop-core-navigation', get_theme_file_uri( 'vendor/benlumia007/backdrop-core/assets/js/navigation.js' ), array('jquery'), '1.0.0', true );
		wp_localize_script( 'backdrop-core-navigation', 'backdropCoreScreenReaderText', array(
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'backdrop-core' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'backdrop-core' ) . '</span>',
		) );
	}
}
