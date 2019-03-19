<?php
/**
 * Customizer Support for Weaver Xtreme
 *
 * Panel, Section, and control definition structures inspired by Make theme
 * Some custom Customizer control classes inspired by
 */

global $wp_customize;

if ( isset( $wp_customize ) && ! weaverx_getopt( '_disable_customizer' ) ) {

	//weaverx_check_editor_style();		// see if we need an update...

	add_action( 'customize_register', 'weaverx_add_customizer_content' );
	add_action( 'customize_controls_enqueue_scripts', 'weaverx_enqueue_customizer_scripts' );
	add_action( 'customize_preview_init', 'weaverx_customizer_preview_script' );

	add_action( 'customize_register', 'WeaverX_Save_WX_Settings::process_save', 999999 );
	add_action( 'customize_register', 'WeaverX_Restore_WX_Settings::process_restore', 999999 );
	add_action( 'customize_register', 'WeaverX_Load_WX_Subtheme::process_load_theme', 999999 );
	add_action( 'customize_register', 'WeaverX_Set_Customizer_Level::process_set_level', 999999 );


	function weaverx_customizer_loaded_action() {
		return;
	}


	function weaverx_add_customizer_content( $wp_customize ) {

		// Fail safe is safe
		if ( ! isset( $wp_customize ) ) {
			return;
		}

		weaverx_cz_cache_opts();        // we want to get the existing options before filtered.

		$path = trailingslashit( get_template_directory() ) . 'admin/customizer/';

		// Include the Alpha Color Picker control file.
		require_once( $path . 'alpha-color-picker/alpha-color-picker.php' );
		require_once( $path . 'save-restore/customizer-save-restore.php' );
		require_once( $path . 'lib-controls.php' );


		weaverx_customizer_add_panels( $wp_customize );
		weaverx_customizer_add_sections( $wp_customize );
		weaverx_customizer_set_transport( $wp_customize );

		weaverx_clear_opt_cache( 'customizer' );
	}


	add_action( 'customize_register', 'weaverx_cz_customize_order', 20 );

	function weaverx_cz_customize_order( $wp_customize ) {

		// Re-prioritize and rename the site identity panel
		//$section_id = 'title_tagline';
		//$section = $wp_customize->get_section( $section_id );

		// Set Site Title & Tagline section priority
		//$section->priority = 10250;

		// Re-prioritize and rename the Widgets panel
		if ( ! isset( $wp_customize->get_panel( 'widgets' )->priority ) ) {
			$wp_customize->add_panel( 'widgets' );
		}

		$wp_customize->get_panel( 'widgets' )->priority = 11900;
		$wp_customize->get_panel( 'widgets' )->title    = esc_html__( 'Active Widget Areas (WP)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON;

		// Re-prioritize and rename the Menus panel
		if ( ! isset( $wp_customize->get_panel( 'nav_menus' )->priority ) ) {
			$wp_customize->add_panel( 'nav_menus' );
		}

		$wp_customize->get_panel( 'nav_menus' )->priority = 11910;
		$wp_customize->get_panel( 'nav_menus' )->title    = esc_html__( 'Custom Menus Content (WP)', 'weaver-xtreme' ) . WEAVERX_REFRESH_ICON;

		// Move and rename Background Color control to Global section of Color panel
		$wp_customize->get_control( 'background_color' )->section     = 'weaverx_color-wrapping';
		$wp_customize->get_control( 'background_color' )->priority    = 10799;
		$wp_customize->get_control( 'background_color' )->label       = esc_html__( 'Site Background Color - WP Value', 'weaver-xtreme' );
		$wp_customize->get_control( 'background_color' )->description = esc_html__( 'WordPress default Site BG color. This is a legacy option value, and is NOT RECOMMENDED. Please use the Weaver Xtreme Theme Site Background Color on the Layout &rarr; Core Site Layout and Styling menu.', 'weaver-xtreme' );

	}


	function weaverx_customize_preview_js() {

		// @@@ possibly add Loading message....

		WeaverX_Restore_WX_Settings::controls_print_scripts();

		weaverx_check_customizer_memory();

		if ( weaverx_options_level() < 1 ) {        // show if not set
			weaverx_alert( weaverx_filter_text( __( 'Thank you for using Weaver Xtreme 4!\r\n\r\n        IMPORTANT NOTE  -- New Theme Feature\r\n\r\nThis theme has 3 Customizer Option Interface Levels: Basic, Standard, and Full.        If you are just getting started, using the Basic Level can simplify the learning curve.\r\n\r\nAfter the Customizer loads, please open the **General Options / Admin** panel, and then the **Set Options Interface Level** panel, and select an Interface Level.\r\n\r\nThis message will continue to be displayed until you select a level.', 'weaver-xtreme' ) ) );
		}

	}

	add_action( 'customize_controls_print_footer_scripts', 'weaverx_customize_preview_js' );

	/*
	 * Customizer scripts
	 */
	function weaverx_enqueue_customizer_scripts() {

		// Styles
		wp_enqueue_style(
			'weaverx-customizer-jquery-ui',
			get_template_directory_uri() . '/admin/customizer/css/jquery-ui/jquery-ui-1.10.4.custom.css',
			array(),
			'1.10.4'
		);
		wp_enqueue_style(
			'weaverx-customizer-chosen',
			get_template_directory_uri() . '/admin/customizer/css/chosen/chosen.css',
			array(),
			'1.3.0'
		);

		define( 'CUSTOMIZER_MENU', 'customizer-menu' );


		wp_enqueue_style(
			'weaverx-customizer-menu',
			get_template_directory_uri() . "/admin/customizer/css/" . CUSTOMIZER_MENU . WEAVERX_MINIFY . ".css",
			array(),
			WEAVERX_VERSION
		);


		wp_enqueue_style(
			'weaverx-customizer-sections',
			get_template_directory_uri() . "/admin/customizer/css/customizer-sections" . WEAVERX_MINIFY . ".css",
			array( 'weaverx-customizer-jquery-ui', 'weaverx-customizer-chosen' ),
			WEAVERX_VERSION
		);


		// stylesheet for customizer

		wp_enqueue_style( 'dashicons' );

		// Scripts

		wp_enqueue_script(
			'weaverx-customizer-chosen',
			get_template_directory_uri() . '/admin/customizer/js/chosen.jquery.js',
			array( 'jquery', 'customize-controls' ),
			'1.3.0',
			true
		);

		wp_enqueue_script(
			'weaverx-customizer-menu',
			get_template_directory_uri() . '/admin/customizer/js/' . CUSTOMIZER_MENU . WEAVERX_MINIFY . '.js',
			array(),
			WEAVERX_VERSION,
			true
		);

		$cur_vers = weaverx_wp_version();

		if ( version_compare( $cur_vers, '4.4', '<' ) ) {
			$wp_vers = '4.3';
		} else {
			$wp_vers = '4.4';
		}


		$local = array(
			'wp_vers'  => $wp_vers,
			'starting' => esc_html__( 'Start Here', 'weaver-xtreme' ),
			'intro'    => esc_html__( 'Theme Introduction', 'weaver-xtreme' ),
			'subtheme' => esc_html__( 'Select Subthemes', 'weaver-xtreme' ),
			'help'     => esc_html__( 'Theme Help', 'weaver-xtreme' ),

			'general'             => esc_html__( 'General Options, Admin', 'weaver-xtreme' ),
			'tagline'             => esc_html__( 'Site Identity', 'weaver-xtreme' ),
			'front_page'          => esc_html__( 'Static Front Page', 'weaver-xtreme' ),
			'options_level'       => esc_html__( 'Options Interface Level', 'weaver-xtreme' ),
			'general_admin'       => esc_html__( 'Admin', 'weaver-xtreme' ),
			'save_settings'       => esc_html__( 'Save Settings', 'weaver-xtreme' ),
			'restore_settings'    => esc_html__( 'Restore Settings', 'weaver-xtreme' ),
			'general_saverestore' => esc_html__( 'Legacy Xtreme Admin', 'weaver-xtreme' ),


			'site_colors'   => esc_html__( 'Colors', 'weaver-xtreme' ),
			'wrapping'      => esc_html__( 'Wrapping Areas', 'weaver-xtreme' ),
			'links'         => esc_html__( 'Links', 'weaver-xtreme' ),
			'header'        => esc_html__( 'Header Area', 'weaver-xtreme' ),
			'menus'         => esc_html__( 'Menus', 'weaver-xtreme' ),
			'info_bar'      => esc_html__( 'Info Bar', 'weaver-xtreme' ),
			'content'       => esc_html__( 'Content', 'weaver-xtreme' ),
			'post_specific' => esc_html__( 'Post Specific', 'weaver-xtreme' ),
			'sidebars'      => esc_html__( 'Sidebars & Widget Areas', 'weaver-xtreme' ),
			'widgets'       => esc_html__( 'Individual Widgets', 'weaver-xtreme' ),
			'footer'        => esc_html__( 'Footer Area', 'weaver-xtreme' ),

			'spacing'     => esc_html__( 'Spacing, Widths,+', 'weaver-xtreme' ),
			'site_widths' => esc_html__( 'Site Widths', 'weaver-xtreme' ),


			'style'        => esc_html__( 'Style - Borders, etc.', 'weaver-xtreme' ),
			'global_typo'  => esc_html__( 'Global Typography', 'weaver-xtreme' ),
			'global_style' => esc_html__( 'Global Style', 'weaver-xtreme' ),

			'typography' => esc_html__( 'Typography', 'weaver-xtreme' ),

			'visibility' => esc_html__( 'Visibility', 'weaver-xtreme' ),
			'global_vis' => esc_html__( 'Global Visibility', 'weaver-xtreme' ),

			'layout' => esc_html__( 'Layout', 'weaver-xtreme' ),

			'images'           => esc_html__( 'Images', 'weaver-xtreme' ),
			'background'       => esc_html__( 'Background', 'weaver-xtreme' ),
			'header_image'     => esc_html__( 'Header Media', 'weaver-xtreme' ),
			'background_image' => esc_html__( 'WP Background', 'weaver-xtreme' ),

			'added_content' => esc_html__( 'Added Content', 'weaver-xtreme' ),
			'head_sec'      => esc_html__( 'HEAD Section', 'weaver-xtreme' ),
			'injection'     => esc_html__( 'HTML Injection Areas', 'weaver-xtreme' ),

			'custom'      => esc_html__( 'Custom CSS', 'weaver-xtreme' ),
			'help_custom' => esc_html__( 'Custom CSS Help', 'weaver-xtreme' ),
			'global_css'  => esc_html__( 'Global Custom CSS', 'weaver-xtreme' ),

			'what'  => esc_html__( '<em>- WHAT -</em>', 'weaver-xtreme' ),
			'where' => esc_html__( '<em>- WHERE -</em>', 'weaver-xtreme' ),

			'sb_widg_content' => esc_html__( 'Active Widget Areas', 'weaver-xtreme' ),
			'custom_menus'    => esc_html__( 'Custom Menus', 'weaver-xtreme' ),
			'global_spacing'  => esc_html__( 'Global Spacing', 'weaver-xtreme' ),
			'global_admin'    => esc_html__( 'Administration', 'weaver-xtreme' ),
			'global_opts'     => esc_html__( 'Global Options', 'weaver-xtreme' ),
			'wp_settings'     => esc_html__( 'WordPress Settings', 'weaver-xtreme' ),
			'html_inject'     => esc_html__( 'HTML Injection Areas', 'weaver-xtreme' ),

			'loadingMsg' => esc_html__( 'Please wait. Customizer Loading...', 'weaver-xtreme' ),
			'helpURL'    => get_template_directory_uri() . '/help/help.html#get-started',
			'cust_help'  => esc_html__( 'Weaver Xtreme Customizer Help', 'weaver-xtreme' ),
		);

		wp_localize_script( 'weaverx-customizer-menu', 'wvrxCM', $local );


		wp_enqueue_script(
			'weaverx-customizer-sections',
			get_template_directory_uri() . '/admin/customizer/js/customizer-sections' . WEAVERX_MINIFY . '.js',
			array( 'jquery', 'customize-controls', 'weaverx-customizer-chosen' ),
			WEAVERX_VERSION,
			true
		);


		// Save/Restore scripts
		WeaverX_Save_WX_Settings::enqueue_scripts();
		// WeaverX_Restore_WX_Settings::enqueue_scripts();

	}


	add_action( 'customize_save', 'weaverx_cz_save' );

	function weaverx_cz_save( $class ) {
		//weaverx_save_opts( 'customizer', true );	// have to save things - generate css setting and file, for example.
	}

	add_action( 'customize_save_after', 'weaverx_cz_save_after' );

	function weaverx_cz_save_after() {
		weaverx_save_opts( 'customizer', true );    // have to save things - generate css setting and file, for example.
	}

	if ( ! function_exists( 'weaverx_customizer_get_panels' ) ) :
		/**
		 * Return an array of panel definitions.
		 *
		 * @since  1.3.0.
		 * @return array    The array of panel definitions.
		 */
		function weaverx_customizer_get_panels() {
			$panels = array(

				'starting' => array(
					'title'       => esc_html__( 'Weaver Xtreme: Start Here', 'weaver-xtreme' ),
					'priority'    => 10100,
					'description' => esc_html__( "How to get started with Weaver Xtreme.", 'weaver-xtreme' ),
				),

				'general' => array(
					'title'       => esc_html__( 'General Options &amp; Admin', 'weaver-xtreme' ),
					'priority'    => 10200,
					'description' => esc_html__( "General settings: Site Identity, Static Front Page, Admin Options, Help", 'weaver-xtreme' ),
				),

				'layout' => array(
					'title'       => esc_html__( 'Layout', 'weaver-xtreme' ),
					'priority'    => 10300,
					'description' => esc_html__( "Layout controls the overall look of your site. This includes the site width, full width layout option, sidebar layout, and more.", 'weaver-xtreme' ),
				),

				'typography' => array(
					'title'       => esc_html__( 'Typography', 'weaver-xtreme' ),
					'priority'    => 10400,
					'description' => esc_html__( "Typography: font family, font size, bold, italic.", 'weaver-xtreme' ),
				),

				'images' => array(
					'title'       => esc_html__( 'Images', 'weaver-xtreme' ),
					'priority'    => 10500,
					'description' => esc_html__( "Image Options: borders, placement, Featured Images, Header Images, Background Images.", 'weaver-xtreme' ),
				),

				'visibility' => array(
					'title'       => esc_html__( 'Visibility', 'weaver-xtreme' ),
					'priority'    => 10600,
					'description' => esc_html__( "Specify visibility - hide various elements on various devices ( desktop, tablets, phones ).", 'weaver-xtreme' ),
				),

				'site-colors' => array(
					'title'       => esc_html__( 'Colors', 'weaver-xtreme' ),
					'priority'    => 10700,
					'description' => esc_html__( "Specify all colors used on site - both text and background colors. <strong>TIP:</strong> Clicking <em>Default</em> on the color picker will restore the original color set when you loaded the Customizer.", 'weaver-xtreme' ),
				),

				'spacing' => array(
					'title'       => esc_html__( 'Spacing, Widths, Alignment', 'weaver-xtreme' ),
					'priority'    => 10800,
					'description' => esc_html__( "Set margins, padding, spacing, heights, and widths.", 'weaver-xtreme' ),
				),

				'style' => array(
					'title'       => esc_html__( 'Style (borders, etc.)', 'weaver-xtreme' ),
					'priority'    => 10900,
					'description' => esc_html__( "Style: borders, shadows, rounded corners, list bullet style, icons. ( Important note: using rounded corners usually requires specifying a BG color or border. )", 'weaver-xtreme' ),
				),


				'content' => array(
					'title'       => esc_html__( 'Added Content (HTML Areas...)', 'weaver-xtreme' ),
					'priority'    => 11000,
					'description' => esc_html__( "Specify added content: Define added content for HTML areas.", 'weaver-xtreme' ),
				),


				'custom' => array(
					'title'       => esc_html__( 'Custom CSS', 'weaver-xtreme' ),
					'priority'    => 11100,
					'description' => esc_html__( 'Define Custom CSS rules for whole site or specific areas. Add HTML to several "injection areas" - useful for ads or custom third party scripts. <em>Weaver Xtreme Plus</em> also allows you to define PHP code for WP filters or actions.', 'weaver-xtreme' ),
				),

				'page-builder' => array(
					'title'       => esc_html__( 'Page Builders', 'weaver-xtreme' ),
					'priority'    => 11200,
					'description' => esc_html__( 'Options for integration with Page Builders.', 'weaver-xtreme' ),
				),

				// ultimate want to add per page/post options here, but can't do it because can't get current page or post ID to make controls selectively
				// display, or in fact access the custom options on a per page/post basis.

				//'per_page' => apply_filters( 'weaverx_add_per_page_customizer',array() ),

				//'per_post' => apply_filters( 'weaverx_add_per_post_customizer',array() ),

			);

			/**
			 * Filter the array of panel definitions for the Customizer.
			 *
			 * @since 1.3.0.
			 *
			 * @param array $panels The array of panel definitions.
			 */
			return $panels;
		}
	endif;

	if ( ! function_exists( 'weaverx_customizer_add_panels' ) ) :
		/**
		 * Register Customizer panels
		 */
		function weaverx_customizer_add_panels( $wp_customize ) {
			$theme_prefix = 'weaverx_';


			// Get panel definitions
			$panels = weaverx_customizer_get_panels();

			// Add panels
			foreach ( $panels as $panel => $data ) {
				// Add panel
				if ( ! empty( $data ) ) {
					$wp_customize->add_panel( $theme_prefix . $panel, $data );
				}
			}


		}
	endif;

	if ( ! function_exists( 'weaverx_customizer_get_sections' ) ) :
		/**
		 * Return the master array of Customizer sections
		 *
		 * @since  1.3.0.
		 *
		 * @return array    The master array of Customizer sections
		 */
		function weaverx_customizer_get_sections() {
			// Add all the section definitions
			$pb          = weaverx_customizer_define_pagebuilder_sections();
			$content     = weaverx_customizer_define_content_sections();    // get array for each section
			$custom      = weaverx_customizer_define_custom_sections();
			$general     = weaverx_customizer_define_general_sections();
			$image       = weaverx_customizer_define_image_sections();
			$layout      = weaverx_customizer_define_layout_sections();
			$colorscheme = weaverx_customizer_define_colorscheme_sections();
			$spacing     = weaverx_customizer_define_spacing_sections();
			$starting    = weaverx_customizer_define_starting_sections();
			$style       = weaverx_customizer_define_style_sections();
			$typography  = weaverx_customizer_define_typography_sections();
			$visibility  = weaverx_customizer_define_visibility_sections();


			return array_merge( $pb, $content, $custom, $general, $image, $layout, $colorscheme, $spacing, $starting, $style, $typography, $visibility ); // merge the arrays
		}
	endif;

	if ( ! function_exists( 'weaverx_customizer_add_sections' ) ) :
		/**
		 * Add sections and controls to the customizer.
		 *
		 * Hooked to 'customize_register' via weaverx_customizer_init().
		 *
		 * @since  1.0.0.
		 *
		 * @param  WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @return void
		 */
		function weaverx_customizer_add_sections( $wp_customize ) {
			$theme_prefix = 'weaverx_';
			$default_path = get_template_directory() . '/admin/customizer/sections';
			$panels       = weaverx_customizer_get_panels();


			// Load section definition files
			foreach ( $panels as $panel => $data ) {
				$file = trailingslashit( $default_path ) . $panel . '.php';
				if ( file_exists( $file ) ) {
					require_once( $file );
				}
			}

			// Compile the section definitions
			$sections = weaverx_customizer_get_sections();

			// Register each section and add its options
			$priority = array();
			foreach ( $sections as $section => $data ) {
				// Get the non-prefixed ID of the current section's panel
				$panel = ( isset( $data['panel'] ) ) ? str_replace( $theme_prefix, '', $data['panel'] ) : 'none';

				// Store the options
				if ( isset( $data['options'] ) ) {
					$options = $data['options'];
					unset( $data['options'] );
				}

				// Determine the priority
				if ( ! isset( $data['priority'] ) ) {
					$panel_priority = ( 'none' !== $panel && isset( $panels[ $panel ]['priority'] ) ) ? $panels[ $panel ]['priority'] : 1000;

					// Create a separate priority counter for each panel, and one for sections without a panel
					if ( ! isset( $priority[ $panel ] ) ) {
						$priority[ $panel ] = new weaverx_cz_Prioritizer( $panel_priority, 10 );
					}

					$data['priority'] = $priority[ $panel ]->add();
				}

				// Register section
				$wp_customize->add_section( $theme_prefix . $section, $data );

				// Add options to the section
				if ( isset( $options ) ) {
					weaverx_customizer_add_section_options( $theme_prefix . $section, $options );
					unset( $options );
				}
			}
		}
	endif;

	function weaverx_cz_settings_name( $id ) {

		$theme_opts = WEAVER_SETTINGS_NAME; //apply_filters( 'weaverx_options','weaverx_settingszzz' );

		return $theme_opts . '[' . $id . ']';

		//return $id;
	}

	if ( ! function_exists( 'weaverx_customizer_add_section_options' ) ) :
		/**
		 * Register settings and controls for a section.
		 */
		function weaverx_customizer_add_section_options( $section, $args, $initial_priority = 100 ) {
			global $wp_customize;

			$priority     = new weaverx_cz_Prioritizer( $initial_priority, 5 );
			$theme_prefix = 'weaverx_';

			foreach ( $args as $setting_id => $option ) {
				if ( isset( $option['setting'] ) ) {
					$defaults = array(
						'type'                 => WEAVER_CUSTOMIZER_TYPE,        //'option' or 'theme_mod'
						'capability'           => 'edit_theme_options',
						'theme_supports'       => '',
						'default'              => false,
						'transport'            => 'refresh',
						'sanitize_callback'    => WEAVERX_DEFAULT_SANITIZE,
						'sanitize_js_callback' => '',
					);
					$setting  = wp_parse_args( $option['setting'], $defaults );

					// Add the setting arguments in array to add_setting call so Theme Check can verify the presence of sanitize_callback

					$wp_customize->add_setting( new WP_Customize_Setting( $wp_customize, weaverx_cz_settings_name( $setting_id ),
						array(
							'type'                 => $setting['type'],
							'capability'           => $setting['capability'],
							'theme_supports'       => $setting['theme_supports'],
							'default'              => $setting['default'],
							'transport'            => $setting['transport'],
							'sanitize_callback'    => $setting['sanitize_callback'],
							'sanitize_js_callback' => $setting['sanitize_js_callback'],
						) ) );

				}

				// Add control
				if ( isset( $option['control'] ) ) {
					$control_id = $theme_prefix . $setting_id;

					$defaults = array(
						'section'  => $section,
						'priority' => $priority->add(),
						'settings' => weaverx_cz_settings_name( $setting_id ),
					);

					if ( ! isset( $option['setting'] ) ) {
						unset( $defaults['settings'] );
					}

					$control = wp_parse_args( $option['control'], $defaults );

					// Check for a specialized control class - create new instance
					if ( isset( $control['control_type'] ) ) {
						$class = $control['control_type'];
						if ( class_exists( $class ) ) {
							unset( $control['control_type'] );

							// Dynamically generate a new class instance
							$class_instance = new $class( $wp_customize, $control_id, $control );
							$wp_customize->add_control( $class_instance );
						} else {
							if ( WEAVERX_DEV_MODE ) {
								echo '<h2>MISSING CLASS DEFINITON: ' . $class . '</h2>';
							}
						}
					} else {
						$wp_customize->add_control( $control_id, $control );
					}
				}
			}

			return $priority->get();
		}
	endif;

	if ( ! function_exists( 'weaverx_customizer_set_transport' ) ) :
		/**
		 * Add postMessage support for certain built-in settings in the Theme Customizer.
		 *
		 * Allows these settings to update asynchronously in the Preview pane.
		 */
		function weaverx_customizer_set_transport( $wp_customize ) {
			$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		}
	endif;

	if ( ! function_exists( 'weaverx_customizer_preview_script' ) ) :
		/**
		 * Enqueue customizer preview script
		 *
		 * Hooked to 'customize_preview_init' via weaverx_customizer_init()
		 *
		 */
		function weaverx_customizer_preview_script() {

			wp_enqueue_script(
				'weaverx_cz-customizer-preview',
				get_template_directory_uri() . '/admin/customizer/js/customizer-preview' . WEAVERX_MINIFY . '.js',
				array( 'customize-preview' ),
				WEAVERX_VERSION,
				true
			);

			$date = getdate();
			$year = $date['year'];
			$cp   = weaverx_getopt( 'copyright' );        // so can restore default from customizer
			if ( ! $cp ) {
				$cp = '&copy;' . $year . ' - <a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) .
				      '" rel="home">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>';
			}

			$local = array(
				'copyright' => $cp,
				'more_msg'  => esc_html__( 'Continue reading &rarr;', 'weaver-xtreme' ),
			);
			wp_localize_script( 'weaverx_cz-customizer-preview', 'wvrxPRE', $local );
		}
	endif;

// lib

	function weaverx_cz_is_old_plus() {
		if ( function_exists( 'weaverxplus_plugin_installed' ) ) {
			return version_compare( WEAVER_XPLUS_VERSION, '2.90', '<' );
		} else {
			return false;
		}

	}

	function weaverx_cz_is_plus() {
		return function_exists( 'weaverxplus_plugin_installed' );
	}


	function weaverx_cz_cache_opts() {
		if ( ! isset( $GLOBALS['weaverx_cz_cache'] ) ) {
			$GLOBALS['weaverx_cz_cache'] = array();
		}

		$opt_func = WEAVER_GET_OPTION;
		$opts     = $opt_func( WEAVER_SETTINGS_NAME, array() );

		if ( ! isset( $opts['themename'] ) ) {
			$opts = weaverx_cz_getdefaults();
		}

		$GLOBALS['weaverx_cz_cache'] = $opts;
	}

	function weaverx_cz_getdefaults() {

		$filename = apply_filters( 'weaverx_default_subtheme', get_template_directory() . WEAVERX_DEFAULT_THEME_FILE );

		if ( ! weaverx_f_exists( $filename ) ) {
			return array();
		}

		$contents = weaverx_f_get_contents( $filename );    // use either real ( pro ) or file ( standard ) version of function

		if ( empty( $contents ) ) {
			return array();
		}

		if ( substr( $contents, 0, 10 ) != 'WXT-V01.00' && substr( $contents, 0, 10 ) != 'WVA-V01.00' ) {
			return array();
		}

		$restore = unserialize( substr( $contents, 10 ) );

		$ret  = array();
		$opts = $restore['weaverx_base'];    // fetch base opts
		foreach ( $opts as $opt => $val ) {
			$ret[ $opt ] = $val;
		}
		do_action( 'weaverx_force_plus_inline_css', $ret );

		return $ret;
	}

	function weaverx_cz_getopt( $opt ) {
		if ( ! isset( $GLOBALS['weaverx_cz_cache'][ $opt ] ) ) {    // handles changes to data structure
			return '';
		}
		$val = $GLOBALS['weaverx_cz_cache'][ $opt ];

		return $val ? $val : '';
	}

} // disable customizer?

