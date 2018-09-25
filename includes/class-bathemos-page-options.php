<?php
/**
 * Individual page template options handeling.
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
Bathemos_Page_Options::init();



//////////////////////////////////////////////////
/**
 * Individual page template options handeling.
 *
 * @since 1.0.0
 */
class Bathemos_Page_Options {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	private static $data = array(
			'settings_id'  => 'bathemos_page_options',
			'support_id'   => 'bathemos_page_options',
			'nonce_id'     => '_bathemos_page_options_nonce',
			'nonce_action' => 'save_page_options',
	);

	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Setup page options.
		add_action( 'init', array( __CLASS__, 'set_data' ), 10, 1 );
		add_action( 'init', array( __CLASS__, 'add_page_options_support' ), 10, 1 );
		
		// Handle meta boxes.
		add_action( 'add_meta_boxes', array( __CLASS__, 'add_meta_box' ), 10, 1 );
		add_action( 'save_post', array( __CLASS__, 'save_post' ), 10, 1 );
		
		
		// Provide data.
		add_filter( 'bathemos_page_option', array( __CLASS__, 'get_page_option' ), 10, 2 );
		add_filter( 'bathemos_page_options_set', array( __CLASS__, 'get_page_options_set' ), 10, 1 );
		add_filter( 'bathemos_page_options_defaults', array( __CLASS__, 'get_page_options_defaults' ), 10, 1 );
		add_filter( 'bathemos_page_options_values', array( __CLASS__, 'get_page_options_defaults' ), 5, 2 );
		add_filter( 'bathemos_page_options_values', array( __CLASS__, 'get_page_options_values' ), 10, 2 );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Setup page options.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Sets default data.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_data() {
		
		// Meta box data.
		self::$data['meta_box_title'] = __( 'Page template options', 'ba-tours-light' );
		
		
		// Options set.
		self::$data['options_set'] = array(
			'layout' => array(
				'type'        => 'select',
				'label'       => __( 'Page layout', 'ba-tours-light' ),
				'description' => __( 'Specific layout for this page.', 'ba-tours-light' ),
			),
			'page_title' => array(
				'type'           => 'checkbox',
				'label'          => __( 'Page title', 'ba-tours-light' ),
				'checkbox_label' => __( 'Enable', 'ba-tours-light' ),
				'description'    => __( 'Display page title.', 'ba-tours-light' ),
			),
			'header_margin' => array(
				'type'           => 'checkbox',
				'label'          => __( 'Header bottom margin', 'ba-tours-light' ),
				'checkbox_label' => __( 'Enable', 'ba-tours-light' ),
				'description'    => __( 'Display the margin below the header.', 'ba-tours-light' ),
			),
		);
		
		
		// Default values.
		self::$data['options_defaults'] = array(
			'layout' => '',
			'page_title' => 1,
			'header_margin' => 1,
		);
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Add page settings support for the post types.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function add_page_options_support() {
		
		// Get builtin post types.
		$post_types = array(
			'page' => 'page',
			'post' => 'post',
		);
		
		// Get custom post types.
		$custom_post_types = get_post_types( array(
			'public' => true,
			'_builtin' => false,
		) );
		
		// Merge lists.
		$post_types = wp_parse_args( $post_types, $custom_post_types );
        
		// Register support.
		foreach ( $post_types as $post_type ) {
			add_post_type_support( $post_type, self::$data['support_id'] );
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Provide data.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Returns current page specific option.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $option_id Option ID.
	 * 
	 * @return array
	 */
	static function get_page_option( $content = '', $option_id ) {
		
		$option_id = apply_filters( 'bathemos_core_input', $option_id );
		
		$post_id = get_the_ID();
		
		if ( ! $post_id ) {
			return $content;
		}
		
		$options = apply_filters( 'bathemos_page_options_values', '', $post_id );
        
		$content = isset( $options[ $option_id ] ) ? $options[ $option_id ] : $content;
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns settings set filled with options data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function get_page_options_set( $content = null ) {
		
		// Basic settings set.
		$content = self::$data['options_set'];
		
		
		// Layout options.
		$options = array();
		
		$sets_list = apply_filters( 'bathemos_custom_sets_list', array(), 'layout' );
		
		$options['none'] = array(
			'id' => '',
			'name'=> __( 'Theme default', 'ba-tours-light' ),
		);
		
		foreach ( $sets_list as $set_id => $set_data ) {
			
			$options[ $set_id ] = array(
				'id' => $set_id,
				'name' => $set_data['meta']['name'],
			);
		}
		
		$content['layout']['options'] = $options;
		
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns page options filled with default data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * 
	 * @return array
	 */
	static function get_page_options_defaults( $content = null ) {
		
		$content = wp_parse_args( (array) $content, self::$data['options_defaults'] );
		
		return $content;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Returns page options values.
	 *
	 * @since 1.0.0
	 *
	 * @param array $content Content to filter.
	 * @param string $post_id Post ID.
	 * 
	 * @return array
	 */
	static function get_page_options_values( $content = null, $post_id ) {
		
		$content = get_post_meta( $post_id, self::$data['settings_id'], true );		
		
		return $content;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Handle meta boxes.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Add meta box for the page settings.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_type Post type ID.
	 *
	 * @return null
	 */
	static function add_meta_box( $post_type ) {
		
		if ( ! empty( $post_type ) && post_type_supports( $post_type, self::$data['support_id'] ) ) {
			
			add_meta_box(
				self::$data['settings_id'],
				self::$data['meta_box_title'],
				array( __CLASS__, 'show_meta_box' ),
				$post_type,
				'side'
			);
		}
		
		return null;
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Shows meta box for the page settings.
	 *
	 * @since 1.0.0
	 *
     * @param WP_Post $post
	 *
	 * @return null
	 */
	static function show_meta_box( $post ) {
		
		$options_set = apply_filters( 'bathemos_page_options_set', null );
		
		$values = apply_filters( 'bathemos_page_options_values', null, $post->ID );
		
		$settings_id = self::$data['settings_id'];
		
		do_action( 'bathemos_page_options_before_meta_box', $post );		

		// Output settings form.
		foreach( $options_set as $id => $field ) {
			
			if ( !isset( $values[ $id ] ) ) {
				$values[ $id ] = self::$data['options_defaults'][ $id ];
			}

			?>
			<p><label for="<?php echo esc_html( $settings_id ); ?>_<?php echo esc_attr( $id ); ?>"><strong><?php echo esc_html( $field['label'] ); ?></strong></label></p>
			<?php

			switch( $field['type'] ) {

				case 'select':
					?>
					<select name="<?php echo esc_html( $settings_id ); ?>[<?php echo esc_attr( $id ) ?>]" id="<?php echo esc_html( $settings_id ); ?>_<?php echo esc_attr( $id ) ?>">
						<?php foreach( $field['options'] as $field_option ) : ?>
							<option value="<?php echo esc_attr( $field_option['id'] ); ?>" <?php selected( $values[ $id ], $field_option['id'] ); ?>><?php echo esc_html( $field_option['name'] ); ?></option>
						<?php endforeach; ?>
					</select>
					<?php

					break;

					
				case 'checkbox':
					?>
					<label><input type="checkbox" name="<?php echo esc_html( $settings_id ); ?>[<?php echo esc_attr( $id ); ?>]" <?php checked( $values[ $id ], 1 ); ?> value="1" /><?php echo esc_html( $field['checkbox_label'] ); ?></label>
					<?php
					break;

					
				case 'text':
				default :
					?><input type="text" name="<?php echo esc_html( $settings_id ); ?>[<?php echo esc_attr( $id ); ?>]" id="<?php echo esc_html( $settings_id ); ?>_<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $values[ $id ] ); ?>" /><?php
					break;

			}

			if ( ! empty( $field['description'] ) ) {
				
				?><p class="description"><?php echo esc_html( $field['description'] ); ?></p>
				<?php
			}
		}

		// Add nounce.
		wp_nonce_field( self::$data['nonce_action'], self::$data['nonce_id'] );

		
		do_action( 'bathemos_page_options_after_meta_box', $post );
	}
	
	
	//////////////////////////////////////////////////
	/**
	 * Save page options from meta boxes.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_id Post ID.
	 *
	 * @return array
	 */
	static function save_post( $post_id ) {
		
		$settings_id = self::$data['settings_id'];
		$nonce_id = self::$data['nonce_id'];
		$nonce_action = self::$data['nonce_action'];
        
        if (
			( ! current_user_can( 'edit_post', $post_id ) ) ||
			( empty( $_POST[ $nonce_id ] ) ) ||
			( ! wp_verify_nonce( wp_unslash($_POST[ $nonce_id ]), $nonce_action ) ) ||
			( empty( $_POST[ $settings_id ] ) )
		) {
			
			return;
		}
		
		$settings = wp_unslash( $_POST[ $settings_id ] );
		
		$options_set = apply_filters( 'bathemos_page_options_set', null );

		foreach( $options_set as $id => $field ) {
			
			switch( $field['type'] ) {
				
				case 'select' :
					if ( ! in_array( $settings[ $id ], array_keys( $field['options'] ) ) ) {
						$settings[ $id ] = isset( $field['default'] ) ? $field['default'] : null;
					}
					break;

				case 'checkbox' :
					$settings[ $id ] = isset($settings[ $id ]) && $settings[ $id ] ? 1 : 0;
					break;

				case 'text' :
				default :
					$settings[ $id ] = sanitize_text_field( $settings[ $id ] );
					break;
			}
		}
		
		update_post_meta( $post_id, $settings_id, $settings );
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}