<?php //phpcs:ignore
/**
 * Backdrop Core ( Sidebar.php )
 *
 * @package     Backdrop Core
 * @copyright   Copyright (C) 2019-2020. Benjamin Lu
 * @license     GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Sidebar;

use Benlumia007\Backdrop\Contracts\Sidebar\Sidebar as SidebarContract;

/**
 * Register Sidebar
 */
class Sidebar extends SidebarContract {
	/**
	 * $post post.
	 *
	 * @var string
	 */
	public $sidebar_id;

	/**
	 * Construct
	 *
	 * @param array $sidebar_id array.
	 */
	public function __construct( $sidebar_id = [] ) {
		$this->sidebar_id = array_merge( $sidebar_id );

		add_action( 'widgets_init', [ $this, 'register' ] );
	}

	/**
	 * Register Custom Sidebar
	 */
	public function register() {
		foreach ( $this->sidebar_id as $key => $value ) {
			$this->create( $value['name'], $key, $value['desc'] );
		}
	}

	/**
	 * Create Sidebar
	 *
	 * @param string $name outputs name.
	 * @param string $id displays id for sidebar.
	 * @param string $desc displays description.
	 */
	public function create( $name, $id, $desc ) {
		$args = [
			'name'          => $name,
			'id'            => $id,
			'description'   => $desc,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		];
		register_sidebar( $args );
	}
}
