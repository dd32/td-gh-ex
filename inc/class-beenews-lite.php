<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class beenews_Lite
 */
class beenews_Lite {
	/**
	 * beenews_Lite constructor.
	 */
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueues' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueues' ) );
		add_action( 'admin_init', array( $this, 'editor_enqueues' ) );
		/**
		 * Customizer enqueues & controls
		 */
		add_action( 'customize_register', array( $this, 'customize_register_init' ) );

		add_action( 'after_setup_theme', array( $this, 'content_width' ), 10 );
		/**
		 * Grab all class methods and initiate automatically
		 */
		$methods = get_class_methods( 'beenews_Lite' );

		foreach ( $methods as $method ) {
			if ( strpos( $method, 'init_' ) !== false ) {
				$this->$method();
			}
		}
	}



	/**
	 * Initiate the setting helper
	 */
	public function customize_register_init() {
		// new beenews_Customizer_Helper();
	}


	/**
	 * Initiate the welcome screen
	 */
	public function init_welcome_screen() {
		// Welcome screen
		if ( is_admin() ) {
			global $beenews_required_actions, $beenews_recommended_plugins;

			$beenews_recommended_plugins = array(
				'redux-framework'        => array( 'recommended' => true, 'plugin-file' => 'redux-framework.php' ),
				'shareaholic' => array( 'recommended' => true, 'plugin-file' => 'shareaholic.php'  ),
			);

			/*
			 * id - unique id; required
			 * title
			 * description
			 * check - check for plugins (if installed)
			 * plugin_slug - the plugin's slug (used for installing the plugin)
			 *
			 */
			$beenews_required_actions = array(
				array(
					"id"          => 'beenews-req-ac-install-wp-import-plugin',
					"title"       => Beenews_Notify_System::wordpress_importer_title(),
					"description" => Beenews_Notify_System::wordpress_importer_description(),
					"check"       => Beenews_Notify_System::has_import_plugin( 'wordpress-importer' ),
					"plugin_slug" => 'wordpress-importer'
				),
				array(
					"id"          => 'beenews-req-ac-install-wp-import-widget-plugin',
					"title"       => Beenews_Notify_System::widget_importer_exporter_title(),
					'description' => Beenews_Notify_System::widget_importer_exporter_description(),
					"check"       => Beenews_Notify_System::has_import_plugin( 'widget-importer-exporter' ),
					"plugin_slug" => 'widget-importer-exporter'
				),
				array(
					"id"          => 'beenews-req-ac-download-data',
					"title"       => esc_html__( 'Download theme sample data', 'bee-news' ),
					"description" => esc_html__( 'Head over to our website and download the sample content data.', 'bee-news' ),
					"help"        => '<a target="_blank"  href="http://www.beetechsolution.com/export-beenews/beenews.wordpress.zip">' . __( 'Posts', 'bee-news' ) . '</a>, 
									   <a target="_blank"  href="http://www.beetechsolution.com/export-beenews/beenews-widgets.zip">' . __( 'Widgets', 'bee-news' ) .'</a>',
					"check"       => Beenews_Notify_System::has_content(),
				),
				array(
					"id"    => 'beenews-req-ac-install-data',
					"title" => esc_html__( 'Import Sample Data', 'bee-news' ),
					"help"  => '<a class="button button-primary" target="_blank"  href="' . self_admin_url( 'admin.php?import=wordpress' ) . '">' . __( 'Import Posts', 'bee-news' ) . '</a> 
									   <a class="button button-primary" target="_blank"  href="' . self_admin_url( 'tools.php?page=widget-importer-exporter' ) . '">' . __( 'Import Widgets', 'bee-news' ) . '</a>',
					"check" => Beenews_Notify_System::has_import_plugins(),
				),
				array(
					"id"          => 'beenews-req-ac-static-latest-news',
					"title"       => esc_html__( 'Set front page to static', 'beenews' ),
					"description" => esc_html__( 'If you just installed beenews, and are not able to see the front-page demo, you need to go to Settings -> Reading , Front page displays and select "Static Page".', 'beenews' ),
					"help"        => 'If you need more help understanding how this works, check out the following <a target="_blank"  href="https://codex.wordpress.org/Creating_a_Static_Front_Page#WordPress_Static_Front_Page_Process">link</a>. <br/><br/> <a class="button button-secondary" target="_blank"  href="' . self_admin_url( 'options-reading.php' ) . '">' . __( 'Set Front Page', 'beenews' ) .'</a>',
					"check"       => Beenews_Notify_System::is_not_template_front_page()
				)
				
			);

			new beenews_Welcome_Screen();
		}
	}

	/**
	 * Register Scripts and Styles for the theme
	 */
	public function enqueues() {
		$beenews = wp_get_theme();

		/**
		 * Load Google Fonts
		 */
		wp_enqueue_style( 'beenews-fonts', '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Poppins:400,500,600,700', array(), $beenews['Version'], 'all' );


		wp_localize_script( 'beenews-functions', 'WPUrls', array(
			'siteurl' => get_option( 'siteurl' ),
			'theme'   => get_template_directory_uri(),
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		) );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}

	/**
	 * Admin enqueues
	 */
	public function admin_enqueues() {
		$beenews = wp_get_theme();
		wp_enqueue_style( 'beenews-fonts', 'https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900|Poppins:400,500,600,700', array(), $beenews['Version'], 'all' );
		wp_enqueue_style( 'beenews-lite-welcome-screen', get_template_directory_uri() . '//inc/library/welcome-screen/assets/css/welcome.css', array(), '123123' );
		wp_enqueue_script( 'beenews-lite-welcome-screen', get_template_directory_uri() . '//inc/library/welcome-screen/assets/js/welcome.js', array( 'jquery', 'jquery-ui-slider' ), '112323123' );
	}

	/**
	 * Editor styles
	 */
	public function editor_enqueues() {
		add_editor_style( 'assets/css/custom-editor-style.css' );
	}

	/**
	 * beenews Theme Setup
	 */
	public function theme_setup() {

		

	}

	/**
	 * Content width
	 */
	public function content_width() {
		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 600;
		}
	}
}
