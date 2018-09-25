<?php
/**
 * Front-end constructor.
 *
 * @package BA Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	
	exit;
}



//////////////////////////////////////////////////
/**
 * Calling to setup class.
 */
Bathemos_Constructor::init();



//////////////////////////////////////////////////
/**
 * Front-end constructor.
 *
 * @since 1.0.0
 */
class Bathemos_Constructor {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 *
	 */
	private static $data = array();
	
	

	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		//////////////////////////////////////////////////
		/**
		 * Page initialization.
		 */
		// Get layout from the template.
		add_action( 'bathemos_get_layout', array( __CLASS__, 'get_layout' ), 10, 2 );
		// Init page layout and components.
		add_action( 'bathemos_init_page', array( __CLASS__, 'init_layout' ), 10, 1 );
		add_action( 'bathemos_init_page', array( __CLASS__, 'init_styles' ), 20, 1 );
		// Init modules.
		//add_action( 'after_setup_theme', array( __CLASS__, 'init_shortcodes' ), 30, 1 );
		//add_action( 'after_setup_theme', array( __CLASS__, 'init_sliders' ), 30, 1 );
		
		//////////////////////////////////////////////////
		/**
		 * Page construction.
		 */
		// Get page parts.
		add_action( 'bathemos_get_page_part', array( __CLASS__, 'get_page_part' ), 10, 1 );
		add_action( 'bathemos_get_header', array( __CLASS__, 'get_page_part' ), 10, 1 );
		add_action( 'bathemos_get_footer', array( __CLASS__, 'get_page_part' ), 10, 1 );
		add_action( 'bathemos_get_navbar', array( __CLASS__, 'get_navbar' ), 10, 1 );
		add_action( 'bathemos_get_container', array( __CLASS__, 'get_container' ), 10, 2 );
		add_action( 'bathemos_get_nav_menu', array( __CLASS__, 'get_nav_menu' ), 10, 2 );
		
		// Get content template parts.
		add_action( 'bathemos_get_content_template', array( __CLASS__, 'get_content_template' ), 10, 2 );
		add_action( 'bathemos_get_content_tag_template', array( __CLASS__, 'get_content_tag_template' ), 10, 2 );
		
		// Get search form.
		add_action( 'get_search_form', array( __CLASS__, 'get_search_form' ), 10, 2 );		
		
		// Get panels.
		add_action( 'bathemos_get_panel', array( __CLASS__, 'get_panel' ), 10, 2 );
        
		
		//////////////////////////////////////////////////
		/**
		 * Support functions.
		 */
		// Get part' style.
		add_filter( 'bathemos_style', array( __CLASS__, 'get_style' ), 10, 2 );
		// Get columns width for the active grid.
		add_filter( 'bathemos_column_width', array( __CLASS__, 'get_column_width' ), 10, 3 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Page initialization.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Initializes active layout.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function init_layout() {
		
		self::$data = apply_filters( 'bathemos_layout', self::$data );
		//echo '<pre>'; print_r( self::$data ); echo '</pre>'; exit();
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Initializes active shortcodes.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function init_shortcodes() {
		
		$shortcodes = apply_filters( 'bathemos_shortcodes', null );
		
		foreach ( $shortcodes as $source ) {
			
			// Create hook.
			do_action( "bathemos_init_shortcodes_{$source['id']}" );
			
			// Include source.
			do_action( 'bathemos_get_source', $source );
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Initializes active sliders.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function init_sliders() {
		
		$sliders = apply_filters( 'bathemos_sliders', null );
		
		foreach ( $sliders as $source ) {
			
			// Create hook.
			do_action( "bathemos_init_slider_{$source['id']}" );
			
			// Include source.
			do_action( 'bathemos_get_source', $source );
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Initializes page components styles.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function init_styles() {
		
		do_action( 'bathemos_set_styles', self::$data['styles'] );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Layout altering.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets announced layout from the sources.
	 *
	 * Priority: post settings > template announces > theme settings > theme defaults.
	 *
	 * @since 1.0.0
	 *
	 * @param string $layout_id Layout file slug.
	 *
	 * @return null
	 */
	static function get_layout( $layout_id = 'default' ) {
		
		$default = apply_filters( 'bathemos_component', '', 'layout' );
		
		$source = $default;
		
		$alternatives = array(
			'post_option' => apply_filters( 'bathemos_page_option', '', 'layout' ),
			'template_announce' => apply_filters( 'bathemos_core_input', $layout_id ),
			'theme_option' => apply_filters( 'bathemos_option', '', 'layout' ),
		);
		
		
		foreach ( $alternatives as $alt => $id ) {
			
			if ( ( ! $id ) || ( $id == 'default' ) || ( $id == 'none' ) ) {
				
				continue;
			}
			
			$source = $default;
			
			$source['id'] = $id;
			
			$source = apply_filters( 'bathemos_source', $source, $use_default = false );
			
			if ( $source['path'] ) {
				
				break;
			}
		}
		
		
		if ( ! $source['path'] ) {
			
			$source = $default;
		}
		
		
		// Create hook.
		do_action( "bathemos_get_layout_{$source['id']}" );
		
		
		// Get source.
		if ( $source['file_ext'] != 'php' ) {
				
			// Get data from non-executable file.
			$data = apply_filters( 'bathemos_source_content', null, $source, $decode_json = true );
			
			do_action( 'bathemos_collect_data', $data, 'layout' );
			
		} else {
		
			// Include layout source.
			do_action( 'bathemos_get_source', $source );
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Page construction.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Gets page part such as header, footer, navbar, etc.
	 *
	 * @since 1.0.0
	 *
	 * @param string $source_tag Optional page part name.
	 *
	 * @return null
	 */
	static function get_page_part( $source_tag = '' ) {
		
		// Get page part name.
		$source_tag = apply_filters( 'bathemos_template_input', $source_tag );
		
		if ( ! $source_tag ) {
		
			// Get page part name from the active hook.
			$source_tag = substr( current_filter(), strlen( BATHEMOS_SLUG . '_get_' ) );
		}
		
		if ( ( ! $source_tag ) || ( ! isset( self::$data['components'][ $source_tag ] ) ) ) {
			
			return null;
		}
		
		
		// Get source.
		$source = self::$data['components'][ $source_tag ];
		
		
		// Create WP or Bathemos hook.
		$root_sources = (array) apply_filters( 'bathemos_root_sources', null );
		
		if ( in_array( $source['tag'], $root_sources ) ) {
			
			do_action( "get_{$source_tag}" );
			
		} else {
			
			do_action( "bathemos_get_{$source['tag']}_{$source['id']}" );
		}
		
		
		// Include page part source.
		do_action( 'bathemos_get_source', $source );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets specific navigation bar.
	 *
	 * @since 1.0.0
	 *
	 * @param string $navbar_id Navigation bar ID.
	 *
	 * @return null
	 */
	static function get_navbar( $navbar_id = 'default' ) {
		
		// Get navbar ID.
		$navbar_id = apply_filters( 'bathemos_template_input', $navbar_id );
		
		if ( ! $navbar_id ) {
			
			$navbar_id = 'default';
		}
		
		
		// Get source.
		if ( $navbar_id == 'default' ) {
			
			$source = self::$data['components']['navbar'];
			
		} else {
			
			$component = apply_filters( 'bathemos_component', '', 'navbar' );
			
			$source = array();
			$source['tag'] = 'navbar';
			$source['file_ext'] = $component['file_ext'];
			$source['id'] = $navbar_id;
			
			$source = apply_filters( 'bathemos_source', $source );
			
			if ( ! $source['path'] ) {
				
				$source = self::$data['components']['navbar'];
			}
		}
		
		
		// Create WP hook.
		do_action( 'get_sidebar', $navbar_id );
		
		
		// Include source.
		do_action( 'bathemos_get_source', $source );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets container for the site content with sidebars/panels.
	 *
	 * @since 1.0.0
	 *
	 * @param string $container_part Before/after container part flag.
	 *
	 * @return null
	 */
	static function get_container( $container_part ) {
		
		$container_part = apply_filters( 'bathemos_template_input', $container_part );
		
		// Get only specific part of the container.
		if ( ( $container_part == 'before' ) || ( $container_part == 'after' ) ) {
			
			do_action( 'bathemos_set_flag', 'container', $container_part );
			
			do_action( 'bathemos_get_page_part', 'container' );
			
			do_action( 'bathemos_set_flag', 'container', null );
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets panel/sidebar if its presents in the layout list.
	 *
	 * @since 1.0.0
	 *
	 * @param string $panel_id Panel name.
	 *
	 * @return null
	 */
	static function get_panel( $panel_id ) {
		
		// Get panel ID.
		$panel_id = apply_filters( 'bathemos_template_input', $panel_id );
		
		if ( ( ! $panel_id ) || ( ! isset( self::$data['panels'][ $panel_id ] ) ) ) {
			
			return null;
		}
		
		
		// Get source.
		$source = self::$data['panels'][ $panel_id ];
		
		
		// Create WP hook.
		do_action( 'get_sidebar', $panel_id );
		
		
		// Include panel source.
		do_action( 'bathemos_set_flag', 'current_panel', $panel_id );
		
		do_action( 'bathemos_get_source', $source );
		
		do_action( 'bathemos_set_flag', 'current_panel', null );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets navigation menu output.
	 *
	 * @since 1.0.0
	 *
	 * @param array $menu Menu display parameters.
	 * @see wp_nav_menu()
	 *
	 * @return null
	 */
	static function get_nav_menu( $menu ) {
		
		$menu = apply_filters( 'bathemos_template_input', $menu );
		
		// Get location.
		if ( ! isset( $menu['theme_location'] ) ) {
			
			$menu['theme_location'] = '';
		}
		
		$menu['theme_location'] = apply_filters( 'bathemos_menu_location', $menu['theme_location'] );
		
		
		// Get walker and fallback function.
		if ( ( ! isset( $menu['walker'] ) ) || ( ! $menu['walker'] ) ) {
			
			$menu['walker'] = apply_filters( 'bathemos_nav_menu_walker', null );
		}
		
		if ( ( ! isset( $menu['fallback_cb'] ) ) || ( ! $menu['fallback_cb'] ) ) {
			
			$menu['fallback_cb'] = apply_filters( 'bathemos_nav_menu_fallback', null );
		}
		
		
		if ( $menu['walker'] ) {
			
			$menu['walker'] = new $menu['walker'];
		}
		
		
		// Get menu output.
		wp_nav_menu( $menu );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets page content template parts.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template_id Content template ID.
	 *
	 * @return null
	 */
	static function get_content_template( $template_id = '' ) {
		
		$template_id = apply_filters( 'bathemos_template_input', $template_id );
		
		
		// Find source.
		$source = array();
		$source['tag'] = 'content';
		$source['id'] = $template_id;
		
		$source = apply_filters( 'bathemos_source', $source, $use_default = true );
		
		
		// Get source.
		if ( $source['path'] ) {
			
			// Create WP hook.
			do_action( 'get_template_part_content', 'content', $template_id );
			
			// Get source file.
			do_action( 'bathemos_get_source', $source );
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Gets page content tag template parts.
	 *
	 * @since 1.0.0
	 *
	 * @param string $template_id Content tag template ID.
	 *
	 * @return null
	 */
	static function get_content_tag_template( $template_id = '' ) {
		
		$template_id = apply_filters( 'bathemos_template_input', $template_id );
		
		
		// Find source.
		$source = array();
		$source['tag'] = 'content-tag';
		$source['id'] = $template_id;
		
		$source = apply_filters( 'bathemos_source', $source, $use_default = false );
		
		
		// Get source.
		if ( $source['path'] ) {
			
			do_action( 'bathemos_get_source', $source );
		}
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns search form.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 *
	 * @return null
	 */
	static function get_search_form( $content = null ) {
		
		// Find source.
		$source = array();
		$source['tag'] = 'searchform';
		$source['id'] = 'default';
		
		$source = apply_filters( 'bathemos_source', $source, $use_default = true );
		
		
		// Get source.
		if ( $source['path'] ) {
			
			$content = apply_filters( 'bathemos_source_content', null, $source, $decode_json = false );
		}
		
		
		return $content;
	}
	
	////////////////////////////////////////////////////////////
	//// Support functions.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Returns current object' style.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param string $part_name Template part name.
	 *
	 * @return string
	 */
	static function get_style( $content, $part_name ) {
		
		$part_name = apply_filters( 'bathemos_template_input', $part_name );
		
		// Get style from the layout.
		if ( isset( self::$data['styles'][ $part_name ] ) ) {
			
			$content = self::$data['styles'][ $part_name ];
		}
		
		return $content;
	}

	
	
	//////////////////////////////////////////////////
	/**
	 * Returns width for the current column.
	 *
	 * @since 1.0.0
	 *
	 * @param string $content Content to filter.
	 * @param string $group Group name for the current row.
	 * @param string $column Current column ID.
	 *
	 * @return string
	 */
	static function get_column_width( $content, $group, $column ) {
		
		$group = apply_filters( 'bathemos_template_input', $group );
		$column = apply_filters( 'bathemos_template_input', $column );
		
		// Return if the group name is not registered in layout.
		if ( ! isset( self::$data['grid'][ $group ] ) ) {
			
			return $content;
		}
		
		// Get grid data for the group.
		$grid_group_data = self::$data['grid'][ $group ];
		
		// Clean input.
		$content = '';
		
		// Create full set of classes based on actual grid.
		$grid_classes = apply_filters( 'bathemos_grid_classes', null );
		
		foreach ( $grid_classes as $grid_class ) {
			
			$group_class_data = $grid_group_data[ $grid_class ];
			
			$width = ( isset( $group_class_data[ $column ] ) ) ? $group_class_data[ $column ] : $group_class_data['rest'];
			
			if ( $width != 0 ) {
				
				$content .= ' col-' . $grid_class . '-' . $width;
			}
		}
		
		$content = trim( $content );
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}