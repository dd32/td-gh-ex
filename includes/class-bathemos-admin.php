<?php
/**
 * Theme administration.
 *
 * @package BA Tours
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists( 'ReduxFramework' ) && file_exists( BATHEMOS_DIR . '/admin/ReduxCore/framework.php' ) ) {
    require_once BATHEMOS_DIR . '/admin/ReduxCore/framework.php';
}

// Redux Framefork is required.
if ( ! class_exists( 'Redux' ) ) {
	return;
}



//////////////////////////////////////////////////
/**
 * Calling to setup class.
 */
Bathemos_Admin::init();



//////////////////////////////////////////////////
/**
 * Theme administration.
 *
 * @since 1.0.0
 */
class Bathemos_Admin {

	////////////////////////////////////////////////////////////
	//// Setup section.
	////////////////////////////////////////////////////////////

	//////////////////////////////////////////////////
	/**
	 * Internal variables.
	 */
	private static $option = BATHEMOS_SETTINGS;

	
	//////////////////////////////////////////////////
	/**
	 * Setup function.
	 *
	 * @since 1.0.0
	 * 
	 * @return null
	 */
	static function init() {
		
		// Setup settings.
		add_action( 'after_setup_theme', array( __CLASS__, 'set_redux' ), 30, 1 );
		add_action( 'after_setup_theme', array( __CLASS__, 'set_help' ), 33, 1 );
		add_action( 'after_setup_theme', array( __CLASS__, 'set_settings' ), 36, 1 );
        
        //add_action( 'admin_menu', array( __CLASS__, 'remove_redux_page'), 99 );
        
        add_filter( 'redux/options/' . self::$option . '/sections', array( __CLASS__, 'sections_altering' ) );
        
		// Save WP site options.
		add_filter( 'redux/options/' . self::$option . '/ajax_save/response', array( __CLASS__, 'after_ajax_save_redux' ), 10, 1 );
        
		// Look through Redux data.
		// add_action( 'redux/options/' . self::$option . '/validate', array( __CLASS__, 'validate_redux' ), 10, 1 );
		
		// Cleaning.
		add_action( 'redux/extensions/before', array( __CLASS__, 'remove_dev_mode' ), 100, 1 );
	}
	
	
	////////////////////////////////////////////////////////////
	//// Setup settings.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Redux validation.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data Redux array.
	 *
	 * @return
	 */
	static function validate_redux( $data ) {
		
		error_log( '$data validation array: ' . print_r( $data, 1 ) );
	}
	
	//////////////////////////////////////////////////
	/**
	 * Fills Redux options array with WP site data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $return_array Redux array.
	 *
	 * @return array
	 */
	static function after_ajax_save_redux( $return_array ) {
		
		$attachment_id = isset( $return_array['options']['logo']['id'] ) ? $return_array['options']['logo']['id'] : '';
		
		set_theme_mod( 'custom_logo', $attachment_id );
		
		
		if ( isset( $return_array['options']['blogname'] ) ) {
			
			$blogname = get_option( 'blogname' );
			
			if ( $blogname != $return_array['options']['blogname'] ) {
				
			    update_option( 'blogname', $return_array['options']['blogname'] );
			}
		}
		
		
		if ( isset( $return_array['options']['blogdescription'] ) ) {
			
			$blogdescription = get_option( 'blogdescription' );
			
			if ( $blogdescription != $return_array['options']['blogdescription'] ) {
				
			    update_option( 'blogdescription', $return_array['options']['blogdescription'] );
			}
		}
		
		return $return_array;
	}
    
	
	//////////////////////////////////////////////////
	/**
	 * Sets all the Redux arguments.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_redux() {
		
		/**
		 * All the possible arguments for Redux.
		 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
		 */

		$theme = wp_get_theme(); // For use with some settings. Not necessary.
		$theme_name = $theme->get( 'Name' );
		$theme_version = $theme->get( 'Version' );
		$promo = '<a href="' . BATHEMOS_AUTHOR_URL . '" target="_blank"><img src="' . apply_filters( 'bathemos_admin_image_url', '', 'ba-logo.png' ) . '" title="' . BATHEMOS_AUTHOR . '" alt="' . BATHEMOS_AUTHOR . '" /></a>';

		$args = array(
			// TYPICAL -> Change these values as you need/desire
			'opt_name'             => self::$option,
			// This is where your data is stored in the database and also becomes your global variable name.
			'display_name'         => sprintf( __( 'BA Tours Light options %1$sTheme Documentation%2$s', 'ba-tours-light' ),'<a href="https://ba-booking.com/ba-tours/documentation/introduction/" target="_blank">','</a>'),
			// Name that appears at the top of your panel
			'display_version'      => $theme_version,
			// Version that appears at the top of your panel
			'menu_type'            => 'menu',
			//Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
			'allow_sub_menu'       => true,
			// Show the sections below the admin menu item or not
			'menu_title'           => __( 'Theme Options', 'ba-tours-light' ),
			'page_title'           => __( 'BA Tours Light options', 'ba-tours-light' ),
			// You will need to generate a Google API key to use this feature.
			// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
			'google_api_key'       => '',
			// Set it you want google fonts to update weekly. A google_api_key value is required.
			'google_update_weekly' => false,
			// Must be defined to add google fonts to the typography module
			'async_typography'     => true,
			// Use a asynchronous font on the front end or font string
			//'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
			'admin_bar'            => true,
			// Show the panel pages on the admin bar
			'admin_bar_icon'       => 'dashicons-admin-generic',
			// Choose an icon for the admin bar menu
			'admin_bar_priority'   => 50,
			// Choose an priority for the admin bar menu
			'global_variable'      => '',
			// Set a different name for your global variable other than the opt_name
			'dev_mode'             => false,
			// Show the time the page took to load, etc
			'update_notice'        => false,
			// If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
			'customizer'           => false,
			// Enable basic customizer support
			//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
			//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

			// OPTIONAL -> Give you extra features
			'page_priority'        => 56,
			// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
			'page_parent'          => 'themes.php',
			// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
			'page_permissions'     => 'manage_options',
			// Permissions needed to access the options panel.
			'menu_icon'            => '',
			// Specify a custom URL to an icon
			'last_tab'             => '',
			// Force your panel to always open to a specific tab (by id)
			'page_icon'            => 'icon-themes',
			// Icon displayed in the admin panel next to your menu_title
			'page_slug'            => '_options',
			// Page slug used to denote the panel
			'save_defaults'        => true,
			// On load save the defaults to DB before user clicks save or not
			'default_show'         => false,
			// If true, shows the default value next to each field that is not the default value.
			'default_mark'         => '',
			// What to print by the field's title if the value shown is default. Suggested: *
			'show_import_export'   => true,
			// Shows the Import/Export panel when not used as a field.

			// CAREFUL -> These options are for advanced use only
			'transient_time'       => 60 * MINUTE_IN_SECONDS,
			'output'               => true,
			// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
			'output_tag'           => true,
			// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
			// 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

			// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
			'database'             => '',
			// possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

			'use_cdn'              => true,
			// If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

			//'compiler'             => true,

			// HINTS
			'hints'                => array(
				'icon'          => 'el el-question-sign',
				'icon_position' => 'right',
				'icon_color'    => 'lightgray',
				'icon_size'     => 'normal',
				'tip_style'     => array(
					'color'   => 'light',
					'shadow'  => true,
					'rounded' => false,
					'style'   => '',
				),
				'tip_position'  => array(
					'my' => 'top left',
					'at' => 'bottom right',
				),
				'tip_effect'    => array(
					'show' => array(
						'effect'   => 'slide',
						'duration' => '500',
						'event'    => 'mouseover',
					),
					'hide' => array(
						'effect'   => 'slide',
						'duration' => '500',
						'event'    => 'click mouseleave',
					),
				),
			)
		);

		
		// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
		$args['admin_bar_links'][] = array(
			'id'    => 'bathemos-docs',
			'href'  => 'https://ba-booking.com/ba-tours/documentation/introduction/',
			'title' => __( 'Documentation', 'ba-tours-light' ),
		);

		
		// Panel Intro text -> before the form
		//$args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'ba-tours-light' );

		// Add content after the form.
		//$args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'ba-tours-light' );

		
		Redux::setArgs( self::$option, $args );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Sets help panels.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_help() {
		
		// Help tabs.
		/*$tabs = array(
			array(
				'id'      => 'bathemos-help-tab-1',
				'title'   => __( 'Theme Information 1', 'ba-tours-light' ),
				'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'ba-tours-light' )
			),
		);*/
		$tabs = array();
		
		Redux::setHelpTab( self::$option, $tabs );

		
		// Help sidebar.
		//$content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'ba-tours-light' );
		$content = '';
		
		Redux::setHelpSidebar( self::$option, $content );
	}
	
	
	
	//////////////////////////////////////////////////
	/**
	 * Sets theme settings set.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function set_settings() {
		
		$sections = array();
		
		
		//////////////////////////////////////////////////
		/**
		 * Site identity.
		 */
		$flag_update_options = false;
		
		$options = get_option( self::$option ); 
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$logo_wp = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		$logo_wp_thumbnail = wp_get_attachment_image_src( $custom_logo_id , 'thumbnail' );   
		
		if ( isset( $options['logo']['id'] ) && $options['logo']['id'] != $custom_logo_id ) {
			$options['logo']['url'] = isset( $logo_wp[0] ) ? $logo_wp[0] : '';
			$options['logo']['width'] = isset( $logo_wp[1] ) ? $logo_wp[1] : '';
			$options['logo']['height'] = isset( $logo_wp[2] ) ? $logo_wp[2] : '';
			$options['logo']['thumbnail'] = isset( $logo_wp_thumbnail[0] ) ? $logo_wp_thumbnail[0] : '';
			$options['logo']['title'] = '';
			$options['logo']['caption'] = '';
			$options['logo']['alt'] = '';
			$options['logo']['description'] = '';
			$options['logo']['id'] = $custom_logo_id;
			$flag_update_options = true; 
		}
		
		
		// Logo field.
		$field_logo = array(
			'id'         => 'logo',
			'type'       => 'media',
			'full_width' => true,
			'title'      => __( 'Logo', 'ba-tours-light' ),
		);
		
		if ( isset( $logo_wp[0] ) ) {
			
			$field_logo['default'] = array( 'url' => $logo_wp[0] );
		}
		
		
		// Blog name.
		$blogname = get_option( 'blogname' );
		
		$field_blogname = array(
			'id'         => 'blogname',
			'type'       => 'text',
			'full_width' => true,
			'title'      => __( 'Site Title', 'ba-tours-light' ),
			'default'    => $blogname,
		);
		
		if ( ! isset( $options['blogname'] ) || ( isset( $options['blogname'] ) && $options['blogname'] != $blogname ) ) {
			
			$options['blogname'] = $blogname;
			$flag_update_options = true;
		}    
		
		
		/// Blog description.
		$blogdescription = get_option( 'blogdescription' );
		
		$field_blogdescription = array(
			'id'         => 'blogdescription',
			'type'       => 'text',
			'full_width' => true,
			'title'      => __( 'Tagline', 'ba-tours-light' ),
			'default'    => $blogdescription,
		);
		
		if ( ! isset( $options['blogdescription'] ) || ( isset( $options['blogdescription'] ) && $options['blogdescription'] != $blogdescription ) ) {
			
			$options['blogdescription'] = $blogdescription;
			$flag_update_options = true;
		}
		
		
		// Update option from WP data.
		if ( $flag_update_options ) {
			
			$result = update_option( self::$option, $options );
		}
		
		$sections[] = array(
			'title'  => __( 'Site Identity', 'ba-tours-light' ),
			'id'     => 'site_identity',
			'desc'   => '',
			'icon'   => 'el el-star',
			'fields' => array(
				$field_logo,
				$field_blogname,
				$field_blogdescription,
			),
		);
		
		//////////////////////////////////////////////////
        /**
		 * Header.
		 */
		$sections[] = array(
			'title'  => __( 'Header', 'ba-tours-light' ),
			'id'     => 'header',
			'desc'   => __( 'Add your contacts to the site header.', 'ba-tours-light' ),
			'icon'   => 'far fa-edit',
			'fields' => array(
				array(
					'id'         => 'header-phone',
					'type'       => 'editor',
					'full_width' => true,
					'title'      => __( 'Contact phone', 'ba-tours-light' ),
					'args'       => array(
						'wpautop'       => false,
						'media_buttons' => false,
						'textarea_rows' => 2,
					),
				),
				array(
					'id'         => 'header-address',
					'type'       => 'editor',
					'full_width' => true,
					'title'      => __( 'Address line', 'ba-tours-light' ),
					'args'       => array(
						'wpautop'       => false,
						'media_buttons' => false,
						'textarea_rows' => 2,
					),
				),
                array(
					'id'         => 'header-times',
					'type'       => 'editor',
					'full_width' => true,
					'title'      => __( 'Working hours', 'ba-tours-light' ),
					'args'       => array(
						'wpautop'       => false,
						'media_buttons' => false,
						'textarea_rows' => 2,
					),
				),
			),
		);
		
		//////////////////////////////////////////////////
		/**
		 * Front Page.
		 */
		$fields = array();
		
		$sections[] = array(
			'title'  => __( 'Front Page', 'ba-tours-light' ),
			'id'     => 'front-page',
			'desc'   => '',
			'icon'   => 'el el-home',
			'fields' => array(
                array(
					'id'          => 'front_info',
					'type'        => 'info',
                    'style' => 'warning',
                    'icon'  => 'el-icon-info-sign',
					'title'       => sprintf(__( 'To use slideshow and shortcodes like on %1$sDemo site%2$s, you need to download from theme\'s site and install our free plugin: %3$sBA Tours light posts%4$s.', 'ba-tours-light' ), '<a href="https://ba-booking.com/ba-tours-light-demo/">', '</a>', '<a href="https://ba-booking.com/ba-tours/wp-content/uploads/sites/5/2018/09/ba-tours-light-posts.zip">', '</a>'),
					'description' => '',
				),
				array(
					'id'         => 'front-header-slideshow',
					'type'       => 'switch',
					'full_width' => true,
					'title'      => __( 'Use slideshow', 'ba-tours-light' ),
                    'description' => __( 'If it\'s enabled, Slides posts will be used to get images and titles for slideshow. Otherwise, the page featured image will be displayed.', 'ba-tours-light' ),
					'default'    => true,
				),
			),
		);
		
		
		//////////////////////////////////////////////////
		/**
		 * Search form.
		 */
		$fields = array();
		
		$sections[] = array(
			'title'  => __( 'Search Form', 'ba-tours-light' ),
			'id'     => 'search-form',
			'desc'   => '',
			'icon'   => 'el el-search',
			'fields' => $fields,
		);
		
		//////////////////////////////////////////////////
		/**
		 * Search Results.
		 */
		$fields = array();
		
		$sections[] = array(
			'title'  => __( 'Search Results', 'ba-tours-light' ),
			'id'     => 'search-results',
			'desc'   => '',
			'icon'   => 'el el-th-list',
			'fields' => $fields,
		);
		
		
		//////////////////////////////////////////////////
		/**
		 * Footer.
		 */
		$sections[] = array(
			'title'  => __( 'Footer', 'ba-tours-light' ),
			'id'     => 'footer',
			'desc'   => '',
			'icon'   => 'far fa-copyright',
			'fields' => array(
				array(
					'id'         => 'copyright-section-start',
					'type'       => 'section',
					'full_width' => true,
					'title'      => __( 'Copyrights', 'ba-tours-light' ),
					'indent'     => true,
				),
				array(
					'id'         => 'copyrights',
					'type'       => 'editor',
					'full_width' => true,
					'title'      => __( 'Copyrights text', 'ba-tours-light' ),
					'default'    => __( 'Copyright &copy; {year}, {sitename}', 'ba-tours-light' ),
					'args'       => array(
						'wpautop'       => false,
						'media_buttons' => false,
						'textarea_rows' => 5,
					),
				),
				array(
					'id'         => 'copyrigh-section-end',
					'type'       => 'section',
					'full_width' => true,
					'indent'     => false,
				),
			)
		);		
		
		//////////////////////////////////////////////////
		/**
		 * Layout.
		 */
		
        $sections[] = array(
			'title'  => __( 'Layouts', 'ba-tours-light' ),
			'id'     => 'layouts',
			'desc'   => '',
			'icon'   => 'el el-website',
			'fields' => array(
				array(
					'id'          => 'layout_info',
					'type'        => 'info',
                    'style' => 'warning',
                    'icon'  => 'el-icon-info-sign',
					'title'       => sprintf(__( 'Default page/post layout. This options are available in %1$sBA Tours theme%2$s only.', 'ba-tours-light' ), '<a href="https://ba-booking.com/ba-tours/">', '</a>'),
					'description' => '',
				),
			),
		);
		
		
		
		//////////////////////////////////////////////////
		/**
		 * Font set.
		 */
		$fields = array();
		
		$sets_list = apply_filters( 'bathemos_custom_sets_list', array(), 'font-set' );
		
		
		// Font set data.
		$options = array();
		
		foreach ( $sets_list as $set_id => $set_data ) {
			
			$options[ $set_id ] = $set_data['meta']['name'];
		}
		
		$fields[] = array(
			'id'          => 'font-set',
			'type'        => 'radio',
			'title'       => __( 'Font set', 'ba-tours-light' ),
			'description' => __( 'You can modify this fonts as you wish.', 'ba-tours-light' ),
			'options'     => $options,
			'default'     => apply_filters( 'bathemos_option', '', 'font-set' ),
		);
		
		
		// Default font arguments.
		$default_args = array(
			'font-family'    => true,
			'font-style'     => true,
			'font-weight'    => true,
			'google'         => false,
			'subsets'        => false,
			'font-backup'    => false,
			'font-size'      => false,
			'line-height'    => false,
			'word-spacing'   => false,
			'letter-spacing' => false,
			'text-align'     => false,
			'text-transform' => false,
			'color'          => false,
			'preview'        => true,
			'units'          => 'rem',
		);
		
		
		// Fonts data.
		foreach ( $sets_list as $set_id => $set_data ) {
			
			$prefix = $set_data['meta']['prefix'];
			
			foreach ( $set_data as $item_id => $item_data ) {
				
				if ( $item_id == 'meta' ) {
					
					continue;
				}
				
				$args = array(
					'id'         => $prefix . $item_id,
					'required'   => array( 'font-set', '=', $set_id ),
					'type'       => 'typography',
					'full_width' => true,
					'title'      => $item_data['name'],
					'subtitle'   => (isset($item_data['desc']) ? $item_data['desc'] : ''),
					'default'    => $item_data['values'],
				);
				
				foreach ( $item_data['values'] as $id => $value ) {
					
					$args[ $id ] = true;
				}
				
				$args = wp_parse_args( $args, $default_args );
				
				$fields[] = $args;
			}
		}
		
		
		$sections[] = array(
			'title'  => __( 'Fonts', 'ba-tours-light' ),
			'id'     => 'custom-fonts',
			'desc'   => '',
			'icon'   => 'el el-fontsize',
			'fields' => $fields,
		);
		
		
		
		//////////////////////////////////////////////////
		/**
		 * Color set.
		 */
		
        $sections[] = array(
			'title'  => __( 'Colors', 'ba-tours-light' ),
			'id'     => 'custom-colors',
			'desc'   => '',
			'icon'   => 'el el-tint',
			'fields' => array(
				array(
					'id'          => 'color_info',
					'type'        => 'info',
                    'style' => 'warning',
                    'icon'  => 'el-icon-info-sign',
					'title'       => sprintf(__( 'This options are available in %1$sBA Tours theme%2$s only.', 'ba-tours-light' ), '<a href="https://ba-booking.com/ba-tours/">', '</a>'),
					'description' => '',
				),
			),
		);
		
		
		
		//////////////////////////////////////////////////
		/**
		 * Custom CSS.
		 */
		
		$sections[] = array(
			'title'  => __( 'Custom CSS', 'ba-tours-light' ),
			'id'     => 'custom-css',
			'icon'   => 'el el-css',
			'fields' => array(
				array(
					'id'         => 'custom_css_info',
					'type'        => 'info',
                    'style' => 'warning',
                    'icon'  => 'el-icon-info-sign',
					'title'       => sprintf(__( 'This options are available in %1$sBA Tours theme%2$s only.', 'ba-tours-light' ), '<a href="https://ba-booking.com/ba-tours/">', '</a>'),
					'description' => '',
				)
			)
		);
		
		////////////////////////////
		//////////////////////////////////////////////////
		/**
		 * Register sections.
		 */
		$sections = apply_filters( 'bathemos_theme_settings_sections', $sections );
        
		foreach ( $sections as $section ) {
			
			Redux::setSection( self::$option, $section );
		}
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// BA Book Everything integration.
	////////////////////////////////////////////////////////////
	
    ////////////////////////////////////////////////////////////
	/**
	 * Returns theme settings set filled with BABE data.
	 *
	 * @since 1.0.0
	 *
	 * @param array $sections Redux sections array.
	 *
	 * @return array
	 */
	static function sections_altering( $sections ) {
		
		//////////////////////////////////////////////////
		/**
		 * BABE plugin taxonomies list.
		 */
		$babe_taxonomies = array();
		
		if ( ( class_exists( 'BABE_Post_types' ) ) && ( ! empty( BABE_Post_types::$taxonomies_list ) ) ) {
			
			foreach( BABE_Post_types::$taxonomies_list as $taxonomy_id => $taxonomy ) {
				
				$babe_taxonomies[ $taxonomy['slug'] ] = $taxonomy['name'];
			}
			
		} else {
			
			return $sections;
		}
		
		
		//////////////////////////////////////////////////
		/**
		 * Options array altering.
		 */
		foreach( $sections as $section_key => $section_arr ) {
			
			switch ( $section_arr['id'] ) {
				
				//////////////////////////////////////////////////
				/**
				 * Search Form.
				 */
				case 'search-form':
					
					$fields = $sections[ $section_key ]['fields'];
					
					$fields[] = array(
						'id'          => 'search_form_add_input_field',
						'type'        => 'callback',
						'full_width'  => true,
						'title'       => __( 'Additional select field', 'ba-tours-light' ),
						'description' => __( 'Add terms from selected taxonomy to the search form filters.', 'ba-tours-light' ),
                        'callback'    => array( __CLASS__, 'callback_radio_taxonomies' ),
					);
					
					$sections[ $section_key ]['fields'] = $fields;
					
					break;
				
				
				//////////////////////////////////////////////////
				/**
				 * Search Results.
				 */
				case 'search-results':
					
					$fields = $sections[ $section_key ]['fields'];
					
					$fields[] = array(
						'id'          => 'tour_preview_taxonomies',
						'type'        => 'checkbox',
						'full_width'  => true,
						'title'       => __( 'Icons line', 'ba-tours-light' ),
						'description' => __( 'Show term icons in the tour preview from selected taxonomies.', 'ba-tours-light' ),
						'options'     => $babe_taxonomies,
					);
					
					$sections[ $section_key ]['fields'] = $fields;
					
					break;
				
				
				//////////////////////////////////////////////////
				/**
				 * Tour Page.
				 */
				case 'tour-page':
				
					$fields = $sections[ $section_key ]['fields'];
					
					$fields[] = array(
						'id'          => 'taxonomies_on_tour_page',
						'type'        => 'checkbox',
						'full_width'  => true,
						'title'       => __( 'Icons line', 'ba-tours-light' ),
						'description' => __( 'Show term icons in the tour page header from selected taxonomies.', 'ba-tours-light' ),
						'options'     => $babe_taxonomies,
					);
					
					$sections[ $section_key ]['fields'] = $fields;
					
					break;
				
				
				//////////////////////////////////////////////////
				/**
				 * General Pages.
				 */
				case 'general-pages':
					
					$fields = $sections[ $section_key ]['fields'];
					
					$fields[] = array(
						'id'          => 'add_taxonomies_to_pages',
						'type'        => 'checkbox',
						'full_width'  => true,
						'title'       => __( 'Taxonomies support', 'ba-tours-light' ),
						'description' => __( 'Assign selected taxonomies to pages', 'ba-tours-light' ),
						'options'     => $babe_taxonomies,
					);
					
					$sections[ $section_key ]['fields'] = $fields;
					
					break;
				
				
				default:
			}
		}
        
		
		//////////////////////////////////////////////////
		/**
		 * Return.
		 */
        return $sections;
	}
    
	
	
    ///////////////////////////////////////////////////////////
	/**
	 * Outputs radio field for the BABE options.
	 *
	 * @since 1.0.0
	 *
	 * @param $args Redux field arguments.
	 *
	 * @return null
	 */
	static function callback_radio_taxonomies( $args ) {
		
		$babe_taxonomies = array();
		
		if ( ( class_exists( 'BABE_Post_types' ) ) && ( ! empty( BABE_Post_types::$taxonomies_list ) ) ) {
			
			$babe_taxonomies[0] = __( 'None', 'ba-tours-light' );
			
			foreach( BABE_Post_types::$taxonomies_list as $taxonomy_id => $taxonomy ) {
				
				$babe_taxonomies[ $taxonomy['slug'] ] = $taxonomy['name'];
			}
			
		} else {
			
			return null;
		}
		
		
        $current_checked = apply_filters( 'bathemos_option', null, $args['id'] );
		
        $options_html = '
			<fieldset id="bathemos_settings-' . $args['id'] . '" class="redux-field-container redux-field redux-field-init redux-container-radio redux_remove_th ' . $args['class'] . '" data-id="' . $args['id'] . '" data-type="radio">
				<ul class="data-full">
		';
		
		foreach ( $babe_taxonomies as $key => $title ) {
			
			$options_html .= '<li><label for="' . $args['id'] . '_' . $key . '"><input type="radio" class="radio" id="' . $args['id'] . '_' . $key . '" name="' . $args['name'] . '" value="' . $key . '" ' . checked( $key, $current_checked, false ) . '><span>' . $title . '</span></label></li>';
		}
		
		$options_html .= '
			</ul>
            <div class="description field-desc">'.__( 'Add terms from selected taxonomy to the search form filters.', 'ba-tours-light' ).'</div>
        </fieldset>
		';
        
        $options_html = apply_filters( 'bathemos_option_callback_radio_taxonomies', $options_html, $args );
		
		echo $options_html;
		
		return;
	}
	
	
	
	////////////////////////////////////////////////////////////
	//// Cleaning.
	////////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////
	/**
	 * Clears developer mode notifications.
	 *
	 * @since 1.0.0
	 *
	 * @param object $redux_instance Redux instance.
	 *
	 * @return object
	 */
	static function remove_dev_mode( $redux_instance ) {
		
		$redux_instance->args['dev_mode'] = false;
		
		$GLOBALS['redux_notice_check'] = 1;
		
		return $redux_instance;	
	}
	
	
	//////////////////////////////////////////////////
	/**
	 * Remove redux framework admin page to avoid confusion of our users and unnecesarry support questions.
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	static function remove_redux_page() {
		
		remove_submenu_page( 'tools.php', 'redux-about' );
	}
	
	////////////////////////////////////////////////////////////
	//// End of our class.
	////////////////////////////////////////////////////////////
}