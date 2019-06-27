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
namespace Benlumia007\Backdrop\Sidebar;

/**
 * Register Sidebar
 */
class Sidebar {
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
	public function __construct( $sidebar_id = array() ) {
		$this->sidebar_id = array_merge(
			$sidebar_id,
			$this->default_sidebar()
		);
		$this->register_custom_sidebar_init();
	}

	/**
	 * Default Sidebar
	 */
	public function default_sidebar() {
		return array(
			'primary' => array(
				'name' => esc_html__( 'Primary Sidebar', 'backdrop-core' ),
				'desc' => esc_html__( 'All widgets will be on all of the pages and posts.', 'backdrop-core' ),
			),
		);
	}

	/**
	 * Register Custom Sidebar Initialize
	 */
	public function register_custom_sidebar_init() {
		add_action( 'widgets_init', array( $this, 'register_custom_sidebar' ) );
	}

	/**
	 * Register Custom Sidebar
	 */
	public function register_custom_sidebar() {
		foreach ( $this->sidebar_id as $key => $value ) {
			$this->create_sidebar( $value['name'], $key, $value['desc'] );
		}
	}

	/**
	 * Create Sidebar
	 *
	 * @param string $name outputs name.
	 * @param string $id displays id for sidebar.
	 * @param string $desc displays description.
	 */
	public function create_sidebar( $name, $id, $desc ) {
		$args = array(
			'name'          => $name,
			'id'            => $id,
			'description'   => $desc,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);
		register_sidebar( $args );
	}
}
