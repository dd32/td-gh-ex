<?php
/**
 * Register widget area.
 */

if ( ! function_exists( 'beam_widgets_init' ) ) :
	/**
	 * Register widget area.
	 *
	 * @see https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function beam_widgets_init() {

		$args = array(
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		);

		/**
		 * Register Sidebar Right
		 */
		register_sidebar(
			apply_filters(
				'beam_widgets_init',
				array(
					'name' => esc_html__( 'Sidebar Right', 'beam' ),
					'id'   => 'sidebar-1',
				)
			) + $args
		);

		/**
		 * Register Sidebar Left
		 */
		register_sidebar(
			apply_filters(
				'beam_widgets_init',
				array(
					'name' => esc_html__( 'Sidebar Left', 'beam' ),
					'id'   => 'sidebar-2',
				)
			) + $args
		);

		/**
		 * Register Sidebar Home
		 */
		register_sidebar(
			apply_filters(
				'beam_widgets_init',
				array(
					'name' => esc_html__( 'Sidebar Home', 'beam' ),
					'id'   => 'sidebar-3',
				)
			) + $args
		);

		/**
		 * Register Footer Widget
		 */
		register_sidebar(
			apply_filters(
				'beam_widgets_init',
				array(
					'name' => esc_html__( 'Footer Widget', 'beam' ),
					'id'   => 'sidebar-4',
				)
			) + $args
		);

	}
	add_action( 'widgets_init', 'beam_widgets_init' );

endif;
