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
namespace Benlumia007\Backdrop;

use Benlumia007\Backdrop\Menu;
use Benlumia007\Backdrop\Sidebar;

/**
 * Regiser Menu Class
 */
class Framework {
	/**
	 * Private static instance
	 *
	 * @var string
	 */
	private static $instance = null;

	/**
	 * Private Constructor
	 */
	private function __construct() {
		self::$instance = $this;
		$this->theme_setup();
		$this->load_menu();
		$this->load_sidebar();
	}

	/**
	 * Get new get_instance();
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			new self();
		}
		return self::$instance;
	}

	/**
	 * Loads theme_setup();
	 *
	 * The theme_setup() should be used to add action for theme_support and theme_enqueue.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function theme_setup() {
		add_action( 'wp_enqueue_scripts', array( $this, 'fonts_enqueue' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'fontawesome_enqueue' ) );
	}

	/**
	 * Loads theme_enqueue();
	 *
	 * The theme_enqueue(); is used to define any scripts and styles that's going to be used part of a theme.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function fonts_enqueue() {
		if ( true === apply_filters( 'backrop_cusom_fonts', true ) ) {
			/**
			 * This will load local Google Fonts as part of the theme. Fira Sans and Merriweather. For more information regarding
			 * this feature, please go to the following url. ( https://google-webfonts-helper.herokuapp.com/fonts ). This also will
			 * load font awesome 5.0 into one css file.
			 */
			wp_enqueue_style( 'backdrop-custom-fonts', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/fonts/custom-fonts.css' ), array(), '1.0.0' );
		}
	}

	/**
	 *  Enqueue Font Awesome 5 Free
	 *
	 * @since 1.0.0
	 * @access public
	 * @return void
	 */
	public function fontawesome_enqueue() {
		if ( true === apply_filters( 'backdrop_filter_fontawesome', true ) ) {
			wp_enqueue_style( 'backdrop-fontawesome', get_theme_file_uri( '/vendor/benlumia007/backdrop-core/assets/font-awesome/css/all.css' ), array(), '1.0.0' );
		}
	}

	/**
	 * Loads Default and Register Features
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function load_menu() {
		$this->menu = new Menu\Menu();
	}

	/**
	 * Loads Default and Register Features
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function load_sidebar() {
		$this->sidebar = new Sidebar\Sidebar();
	}
}


