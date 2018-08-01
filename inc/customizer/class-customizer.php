<?php 


class adbooster_Customizer {

	/**
	 * Theme Slug (Text Domain)
	 * 
	 * @var string
	 */
	protected $them_slug;

	public function __construct() {

		$this->them_slug = Ad_Booster::get_theme_slug();

		$this->config_id = $this->them_slug . '_basic_opts';

		// Include Kirki Helper Class
		$this->includes();

		// Add Field
		add_action( 'init', array( $this, 'init_kirki' ) );
		add_action('customize_controls_print_scripts', array( $this, 'scripts') );
	}

	protected function includes() {
		require_once get_template_directory() . '/inc/helpers/include-kirki.php';
		require_once get_template_directory() . '/inc/helpers/class-kirki.php';
		require_once get_template_directory() . '/inc/customizer/fields/blog.php';
	}

	public function init_kirki() {

		adbooster_Kirki::add_config( $this->config_id, array(
			'capability'    => 'edit_theme_options',
			'option_type'   => 'option',
			'option_name'	=> $this->config_id . '_name'
		) );


		adbooster_Kirki::add_panel( 'adbooster_blog_panel' , array(
		    'priority'    => 100,
		    'title'       => __( 'Blog', 'adbooster' ),
		    'description' => __( 'The basic theme options for free version.', 'adbooster' ),
		) );

		adbooster_Kirki::add_panel( 'adbooster_home_panel' , array(
		    'priority'    => 101,
		    'title'       => __( 'AzonBooster Homepage', 'adbooster' ),
		    'description' => __( 'Homepage control panel.', 'adbooster' ),
		) );

		// Add customize sections and fields
		$this->add_sections_fields();
	}

	private function add_sections_fields() {

		$sections = apply_filters ('adbooster_customize_sections', $this->default_sections() );

		$fields = apply_filters ('adbooster_customize_fields', array() );

		// Generate sections
		foreach( $sections as $key => $section ) {

			adbooster_Kirki::add_section( $key, $section);

		}

		// Generate fields
		foreach ( $fields as $field) {

			adbooster_Kirki::add_field( $this->config_id, $field );
		}

	}

	protected function default_sections() {

		return array(
			'adbooster_blog_layout_section' => array(
			    'title'          => __( 'Blog Layout', 'adbooster' ),
			    'panel'          => 'adbooster_blog_panel',
			    'priority'       => 10,
			),
			'adbooster_blog_post_section' => array(
			    'title'          => __( 'Blog Posts', 'adbooster' ),
			    'panel'          => 'adbooster_blog_panel',
			    'priority'       => 20,
			),
			'adbooster_blog_single_post_section' => array(
			    'title'          => __( 'Single Post', 'adbooster' ),
			    'panel'          => 'adbooster_blog_panel',
			    'priority'       => 30,
			),
			'adbooster_blog_footer_widget_section' => array(
			    'title'          => __( 'Footer Widgets', 'adbooster' ),
			    'panel'          => 'adbooster_blog_panel',
			    'priority'       => 40,
			),
			'adbooster_homepage_general_section' => array (

				'title'          => __( 'General', 'adbooster' ),
			    'panel'          => 'adbooster_home_panel',
			    'priority'       => 10,
			),
			'adbooster_homepage_featured_posts_section' => array (

				'title'          => __( 'Featured Posts', 'adbooster' ),
			    'panel'          => 'adbooster_home_panel',
			    'priority'       => 20,
			),
			'adbooster_homepage_content_section' => array (

				'title'          => __( 'Custom Content', 'adbooster' ),
			    'panel'          => 'adbooster_home_panel',
			    'priority'       => 30,
			)
		);
	}

	public function scripts() {
		
		global $adbooster_version;

		/**
		* Styles
		 */
		wp_enqueue_style( 'adbooster-customizer-style', get_template_directory_uri() . '/assets/sass/admin/customizer/customizer.css', '', $adbooster_version );
	}

	/*
	protected function default_fields() {

		return array(

				array(
					'settings' => 'my_setting',
					'label'    => __( 'My custom control', 'translation_domain' ),
					'section'  => 'section_1',
					'type'     => 'text',
					'priority' => 10,
					'default'  => 'some-default-value',
				),

				array(
					'type'        => 'code',
					'settings'    => 'code_demo',
					'label'       => __( 'Code Control', 'my_textdomain' ),
					'section'     => 'section_2',
					'default'     => 'body { background: #fff; }',
					'priority'    => 10,
					'choices'     => array(
						'language' => 'css',
						'theme'    => 'monokai',
						'height'   => 250,
					)
			)
		);
	}
	*/
}

return new adbooster_Customizer();