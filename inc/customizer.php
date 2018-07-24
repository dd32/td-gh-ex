<?php
/**
 * Advance Portfolio Theme Customizer
 *
 * @package advance-portfolio
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function advance_portfolio_customize_register($wp_customize) {

	//add home page setting pannel
	$wp_customize->add_panel('advance_portfolio_panel_id', array(
			'priority'       => 10,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __('Theme Settings', 'advance-portfolio'),
			'description'    => __('Description of what this panel does.', 'advance-portfolio'),
		));

	//Layouts
	$wp_customize->add_section('advance_portfolio_left_right', array(
			'title'    => __('Layout Settings', 'advance-portfolio'),
			'priority' => 30,
			'panel'    => 'advance_portfolio_panel_id',
		));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('advance_portfolio_layout_options', array(
			'default'           => __('Right Sidebar', 'advance-portfolio'),
			'sanitize_callback' => 'advance_portfolio_sanitize_choices',
		)
	);

	$wp_customize->add_control('advance_portfolio_layout_options',
		array(
			'type'           => 'radio',
			'label'          => __('Change Layouts', 'advance-portfolio'),
			'section'        => 'advance_portfolio_left_right',
			'choices'        => array(
				'Left Sidebar'  => __('Left Sidebar', 'advance-portfolio'),
				'Right Sidebar' => __('Right Sidebar', 'advance-portfolio'),
				'One Column'    => __('One Column', 'advance-portfolio'),
				'Three Columns' => __('Three Columns', 'advance-portfolio'),
				'Four Columns'  => __('Four Columns', 'advance-portfolio'),
				'Grid Layout'   => __('Grid Layout', 'advance-portfolio')
			),
		));

	//social icons
	$wp_customize->add_section('advance_portfolio_topbar_header', array(
			'title'       => __('Social Icon link', 'advance-portfolio'),
			'description' => __('Add Top Bar Content here', 'advance-portfolio'),
			'priority'    => null,
			'panel'       => 'advance_portfolio_panel_id',
		));

	$wp_customize->add_setting('advance_portfolio_facebook_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_facebook_url', array(
			'label'   => __('Add Facebook link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_facebook_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('advance_portfolio_twitter_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_twitter_url', array(
			'label'   => __('Add Twitter link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_twitter_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('advance_portfolio_linkedin_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_linkedin_url', array(
			'label'   => __('Add Linkedin link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_linkedin_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('advance_portfolio_insta_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_insta_url', array(
			'label'   => __('Add Instagram link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_insta_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('advance_portfolio_youtube_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_youtube_url', array(
			'label'   => __('Add Youtube link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_youtube_url',
			'type'    => 'url',
		));

	$wp_customize->add_setting('advance_portfolio_behance_url', array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		));

	$wp_customize->add_control('advance_portfolio_behance_url', array(
			'label'   => __('Add Behance link', 'advance-portfolio'),
			'section' => 'advance_portfolio_topbar_header',
			'setting' => 'advance_portfolio_behance_url',
			'type'    => 'url',
		));

	//Banner
	$wp_customize->add_section('advance_portfolio_banner', array(
		'title'       => __('Banner', 'advance-portfolio'),
		'description' => __('This section will appear below the social icons section', 'advance-portfolio'),
		'panel'       => 'advance_portfolio_panel_id',
	));

	for ($count = 0; $count <= 0; $count++) {

		$wp_customize->add_setting('advance_portfolio_page_settings'.$count, array(
			'default'           => '',
			'sanitize_callback' => 'advance_portfolio_sanitize_dropdown_pages',
		));

		$wp_customize->add_control('advance_portfolio_page_settings'.$count, array(
			'label'       => __('Select Banner Page', 'advance-portfolio'),
			'description' => __('Size of image should be 1600x800', 'advance-portfolio'),
			'section'     => 'advance_portfolio_banner',
			'type'        => 'dropdown-pages',
		));

	}

	//AWESOME PORTFOLIO
	$wp_customize->add_section('advance_portfolio_page_awesome', array(
		'title'       => __('Awesome Portfolio', 'advance-portfolio'),
		'description' => __('This section will appear below the banner.', 'advance-portfolio'),
		'panel'       => 'advance_portfolio_panel_id',
	));

	$wp_customize->add_setting('advance_portfolio_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('advance_portfolio_title', array(
		'label'   => __('Section Title', 'advance-portfolio'),
		'section' => 'advance_portfolio_page_awesome',
		'setting' => 'advance_portfolio_title',
		'type'    => 'text',
	));

	$post_list = get_posts();
	$i         = 0;
	foreach ($post_list as $post) {
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_portfolio_awesome_setting', array(
		'sanitize_callback' => 'advance_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('advance_portfolio_awesome_setting', array(
		'type'        => 'select',
		'choices'     => $posts,
		'label'       => __('Select post', 'advance-portfolio'),
		'description' => __('Size of image should be 270x270', 'advance-portfolio'),
		'section'     => 'advance_portfolio_page_awesome',
	));

	$post_list = get_posts();
	$i         = 0;
	foreach ($post_list as $post) {
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_portfolio_awesome_setting1', array(
		'sanitize_callback' => 'advance_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('advance_portfolio_awesome_setting1', array(
		'type'        => 'select',
		'choices'     => $posts,
		'label'       => __('Select post', 'advance-portfolio'),
		'description' => __('Size of image should be 270x270', 'advance-portfolio'),
		'section'     => 'advance_portfolio_page_awesome',
	));

	$post_list = get_posts();
	$i         = 0;
	foreach ($post_list as $post) {
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_portfolio_awesome_setting2', array(
		'sanitize_callback' => 'advance_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('advance_portfolio_awesome_setting2', array(
		'type'        => 'select',
		'choices'     => $posts,
		'label'       => __('Select post', 'advance-portfolio'),
		'description' => __('Size of image should be 570x270', 'advance-portfolio'),
		'section'     => 'advance_portfolio_page_awesome',
	));

	$post_list = get_posts();
	$i         = 0;
	foreach ($post_list as $post) {
		$posts[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('advance_portfolio_awesome_setting3', array(
		'sanitize_callback' => 'advance_portfolio_sanitize_choices',
	));
	$wp_customize->add_control('advance_portfolio_awesome_setting3', array(
		'type'        => 'select',
		'choices'     => $posts,
		'label'       => __('Select post', 'advance-portfolio'),
		'description' => __('Size of image should be 570x570', 'advance-portfolio'),
		'section'     => 'advance_portfolio_page_awesome',
	));

	//footer
	$wp_customize->add_section('advance_portfolio_footer_section', array(
		'title'       => __('Footer Text', 'advance-portfolio'),
		'description' => __('Add some text for footer like copyright etc.', 'advance-portfolio'),
		'priority'    => null,
		'panel'       => 'advance_portfolio_panel_id',
	));

	$wp_customize->add_setting('advance_portfolio_footer_copy', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));

	$wp_customize->add_control('advance_portfolio_footer_copy', array(
		'label'   => __('Copyright Text', 'advance-portfolio'),
		'section' => 'advance_portfolio_footer_section',
		'type'    => 'text',
	));
}
add_action('customize_register', 'advance_portfolio_customize_register');

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Advance_Portfolio_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if (is_null($instance)) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action('customize_register', array($this, 'sections'));

		// Register scripts and styles for the controls.
		add_action('customize_controls_enqueue_scripts', array($this, 'enqueue_control_scripts'), 0);
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections($manager) {

		// Load custom sections.
		load_template(trailingslashit(get_template_directory()).'/inc/section-pro.php');

		// Register custom section types.
		$manager->register_section_type('Advance_Portfolio_Customize_Section_Pro');

		// Register sections.
		$manager->add_section(
			new Advance_Portfolio_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__('Portfolio Pro Theme', 'advance-portfolio'),
					'pro_text' => esc_html__('Go Pro', 'advance-portfolio'),
					'pro_url'  => esc_url('https://www.themeshopy.com/themes/wordpress-portfolio-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script('advance-portfolio-customize-controls', trailingslashit(get_template_directory_uri()).'/js/customize-controls.js', array('customize-controls'));

		wp_enqueue_style('advance-portfolio-customize-controls', trailingslashit(get_template_directory_uri()).'/css/customize-controls.css');
	}
}

// Doing this customizer thang!
Advance_Portfolio_Customize::get_instance();