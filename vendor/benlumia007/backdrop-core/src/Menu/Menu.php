<?php //phpcs:ignore
/**
 * Backdrop Core ( framework.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Menu;

/**
 * Regiser Menu Class
 */
class Menu {
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
	public function __construct( $menu_id = array() ) {
		$this->menu_id = array_merge(
			$menu_id,
			$this->default_menus()
		);
		$this->register_nav_menus_init();
	}

	/**
	 * Default Menus
	 */
	public function default_menus() {
		return array(
			'primary' => esc_html__( 'Primary Navigation', 'backdrop-core' ),
			'social'  => esc_html__( 'Social Navigation', 'backdrop-core' ),
		);
	}

	/**
	 * Register Custom Menus Initialize
	 */
	public function register_nav_menus_init() {
		add_action( 'after_setup_theme', array( $this, 'register_nav_menus' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'load_nav_menus_scripts' ) );
	}

	/**
	 * Register Custom Menus
	 */
	public function register_nav_menus() {
		foreach ( $this->menu_id as $key => $value ) {
			$this->create_menus( $value, $key );
		}
	}

	/**
	 * Create Menus
	 *
	 * @param string $name outputs name.
	 * @param string $id output id.
	 */
	public function create_menus( $name, $id ) {
		$args = array(
			$id => $name,
		);
		register_nav_menus( $args );
	}

	/**
	 * Loads Navigation.js
	 */
	public function load_nav_menus_scripts() {
		/**
		 *  This mainly for the primary navigation. THis allows to use click the dropdown for multiple depths.
		 */
		wp_enqueue_script( 'backdrop-navigation', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/js/navigation.js' ), array( 'jquery' ), '1.0.0', true );
		wp_localize_script(
			'backdrop-navigation',
			'backdropScreenReaderText',
			array(
				'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'backdrop-core' ) . '</span>',
				'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'backdrop-core' ) . '</span>',
			)
		);
	}
}
