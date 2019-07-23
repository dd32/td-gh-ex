<?php
/**
 * astral: Customizer
 *
 * @package WordPress
 * @subpackage astral
 * @since 0.1
 */

class astral_Customizer extends astral_Abstract_Main {

	public function __construct() {

		add_action( 'customize_register', array( $this, 'astral_customize_register' ) );

	}

	public function init() {
	}


	function astral_customize_register( $wp_customize ) {

		wp_enqueue_style( 'astral-customizer-style', get_template_directory_uri() . '/css/customizr.css' );

		//All our sections, settings, and controls will be added here
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		/* create panel */

		$wp_customize->add_panel( 'astral_theme_option', array(
			'title'    => __( 'Theme Settings', 'astral' ),
			'priority' => 1, // Mixed with top-level-section hierarchy.
		) );

		/* social icon section */
		$wp_customize->add_section( 'astral_social_icon', array(
			'title'      => __( 'Social Links', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );

		$wp_customize->add_setting( 'facebook_link', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'facebook_link', array(
			'label'    => __( 'Facebook Link', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_social_icon',
			'settings' => 'facebook_link',
		) );

		$wp_customize->add_setting( 'twitter_link', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'twitter_link', array(
			'label'    => __( 'Twitter Link', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_social_icon',
			'settings' => 'twitter_link',
		) );

		$wp_customize->add_setting( 'googleplus_link', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'googleplus_link', array(
			'label'    => __( 'Google+ Link', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_social_icon',
			'settings' => 'googleplus_link',
		) );

		$wp_customize->add_setting( 'linkedin_link', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'linkedin_link', array(
			'label'    => __( 'LinkedIn Link', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_social_icon',
			'settings' => 'linkedin_link',
		) );

		/* footer section */
		$wp_customize->add_section( 'astral_footer', array(
			'title'      => __( 'Footer Options', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );

		$wp_customize->add_setting( 'footer_text', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'footer_text', array(
			'label'    => __( 'Footer Text', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_footer',
			'settings' => 'footer_text',
		) );

		$wp_customize->add_setting( 'footer_copyright', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'footer_copyright', array(
			'label'    => __( 'Footer Copyright', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_footer',
			'settings' => 'footer_copyright',
		) );

		$wp_customize->add_setting( 'footer_link', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'footer_link', array(
			'label'    => __( 'Footer Link', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_footer',
			'settings' => 'footer_link',
		) );

		/* inner header image */
		$wp_customize->add_section( 'astral_inner_banner', array(
			'title'      => __( 'Inner banner', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );
		$wp_customize->add_setting( 'inner_header_image', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'inner_header_image', array(
			'label'    => __( 'Inner banner Image', 'astral' ),
			'section'  => 'astral_inner_banner',
			'settings' => 'inner_header_image'
		) ) );

		/* Slider options */
		$wp_customize->add_section(
			'slider_section',
			array(
				'title'           => __( 'Slider Options', 'astral' ),
				'panel'           => 'astral_theme_option',
				'description'     => 'Here you can add slider images',
				'capability'      => 'edit_theme_options',
				'priority'        => 35,
				'active_callback' => 'is_front_page',
			)
		);

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_setting(
				'slide_image_' . $i,
				array(
					'type'              => 'theme_mod',
					'default'           => '',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slide_image_' . $i, array(
				'label'    => esc_attr( 'Slider Image ' . $i ),
				'section'  => 'slider_section',
				'settings' => 'slide_image_' . $i
			) ) );
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_setting(
				'slide_title_' . $i,
				array(
					'type'              => 'theme_mod',
					'default'           => '',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'wp_filter_nohtml_kses',

				)
			);
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_control( 'slide_title_' . $i, array(
				'label'    => esc_attr( 'Slider title ' . $i ),
				'type'     => 'text',
				'section'  => 'slider_section',
				'settings' => 'slide_title_' . $i
			) );
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_setting(
				'slide_desc_' . $i,
				array(
					'default'           => '',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'wp_filter_nohtml_kses',

				)
			);
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_control( 'slide_desc_' . $i, array(
				'label'    => esc_attr( 'Slider dsecription ' . $i ),
				'type'     => 'text',
				'section'  => 'slider_section',
				'settings' => 'slide_desc_' . $i
			) );
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_setting(
				'slide_btn_link_' . $i,
				array(
					'type'              => 'theme_mod',
					'default'           => '',
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'esc_url_raw',

				)
			);
		}

		for ( $i = 1; $i <= 3; $i ++ ) {
			$wp_customize->add_control( 'slide_btn_link_' . $i, array(
				'label'    => esc_attr( 'Slider Button Link ' . $i ),
				'type'     => 'url',
				'section'  => 'slider_section',
				'settings' => 'slide_btn_link_' . $i
			) );
		}

		/* callout section */
		$wp_customize->add_section( 'astral_callout', array(
			'title'      => __( 'Callout Settings', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );

		$wp_customize->add_setting( 'astral_callout_show', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'astral_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_callout_show', array(
			'label'    => __( 'Callout Section On/Off', 'astral' ),
			'type'     => 'checkbox',
			'section'  => 'astral_callout',
			'settings' => 'astral_callout_show',
		) );

		$wp_customize->add_setting( 'callout_title', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'callout_title', array(
			'label'    => __( 'Callout Title', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_callout',
			'settings' => 'callout_title',
		) );

		$wp_customize->add_setting( 'callout_desc', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'callout_desc', array(
			'label'    => __( 'callout description', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_callout',
			'settings' => 'callout_desc',
		) );

		$wp_customize->add_setting( 'callout_link_1', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'callout_link_1', array(
			'label'    => __( 'Callout Link 1', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_callout',
			'settings' => 'callout_link_1',
		) );

		$wp_customize->add_setting( 'callout_link_2', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'callout_link_2', array(
			'label'    => __( 'Callout Link 2', 'astral' ),
			'type'     => 'url',
			'section'  => 'astral_callout',
			'settings' => 'callout_link_2',
		) );


		/* service section */
		$wp_customize->add_section( 'astral_service', array(
			'title'      => __( 'Service Settings', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );


		$wp_customize->add_setting( 'astral_service_show', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'astral_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_service_show', array(
			'label'    => __( 'Service Section On/Off', 'astral' ),
			'type'     => 'checkbox',
			'section'  => 'astral_service',
			'settings' => 'astral_service_show',
		) );


		$wp_customize->add_setting( 'astral_service_title', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_service_title', array(
			'label'    => __( 'Service Title ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_service',
			'settings' => 'astral_service_title',
		) );

		$wp_customize->add_setting( 'astral_service_desc', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'astral_service_desc', array(
			'label'    => __( 'Service description ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_service',
			'settings' => 'astral_service_desc',
		) );

		for ( $i = 1; $i < 4; $i ++ ) {
			$wp_customize->add_setting( 'service_title_' . $i, array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			) );

			$wp_customize->add_control( 'service_title_' . $i, array(
				'label'    => esc_attr( 'Service Title ' . $i ),
				'type'     => 'text',
				'section'  => 'astral_service',
				'settings' => 'service_title_' . $i,
			) );

			$wp_customize->add_setting( 'service_desc_' . $i, array(
					'type'              => 'theme_mod',
					'default'           => '',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control( 'service_desc_' . $i, array(
				'label'    => esc_attr( 'Service description ' . $i ),
				'type'     => 'text',
				'section'  => 'astral_service',
				'settings' => 'service_desc_' . $i,
			) );

			$wp_customize->add_setting( 'service_icon_' . $i, array(
					'type'              => 'theme_mod',
					'default'           => '',
					'sanitize_callback' => 'wp_filter_nohtml_kses',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control( 'service_icon_' . $i, array(
				'label'    => esc_attr( 'Service icon ' . $i ),
				'type'     => 'text',
				'section'  => 'astral_service',
				'settings' => 'service_icon_' . $i,
			) );

			$wp_customize->add_setting( 'service_link_' . $i, array(
					'type'              => 'theme_mod',
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control( 'service_link_' . $i, array(
				'label'    => esc_attr( 'Service Link ' . $i ),
				'type'     => 'url',
				'section'  => 'astral_service',
				'settings' => 'service_link_' . $i,
			) );
		}

		/* blog section */
		$wp_customize->add_section( 'astral_blog', array(
			'title'      => __( 'Blog Settings', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );

		$wp_customize->add_setting( 'astral_blog_title', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_blog_title', array(
			'label'    => __( 'Blog Title ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_blog',
			'settings' => 'astral_blog_title',
		) );

		$wp_customize->add_setting( 'astral_blog_desc', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'astral_blog_desc', array(
			'label'    => __( 'Blog description ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_blog',
			'settings' => 'astral_blog_desc',
		) );

		/* contact section */
		$wp_customize->add_section( 'astral_contact', array(
			'title'      => __( 'Contact Settings', 'astral' ),
			'panel'      => 'astral_theme_option',
			'capability' => 'edit_theme_options',
			'priority'   => 35,
		) );

		$wp_customize->add_setting( 'astral_contact_show', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'astral_sanitize_checkbox',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_contact_show', array(
			'label'    => __( 'Contact Section On/Off', 'astral' ),
			'type'     => 'checkbox',
			'section'  => 'astral_contact',
			'settings' => 'astral_contact_show',
		) );

		$wp_customize->add_setting( 'astral_contact_title', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses',
			'capability'        => 'edit_theme_options',
		) );

		$wp_customize->add_control( 'astral_contact_title', array(
			'label'    => __( 'Contact Title ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_contact',
			'settings' => 'astral_contact_title',
		) );

		$wp_customize->add_setting( 'contact_image', array(
			'type'              => 'theme_mod',
			'default'           => '',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'contact_image', array(
			'label'    => __( 'Contact Background Image', 'astral' ),
			'section'  => 'astral_contact',
			'settings' => 'contact_image'
		) ) );

		$wp_customize->add_setting( 'astral_phoneno', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'astral_phoneno', array(
			'label'    => __( 'Phone no. ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_contact',
			'settings' => 'astral_phoneno',
		) );

		$wp_customize->add_setting( 'astral_address', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'astral_address', array(
			'label'    => __( 'Address ', 'astral' ),
			'type'     => 'text',
			'section'  => 'astral_contact',
			'settings' => 'astral_address',
		) );

		$wp_customize->add_setting( 'astral_email', array(
				'type'              => 'theme_mod',
				'default'           => '',
				'sanitize_callback' => 'wp_filter_nohtml_kses',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control( 'astral_email', array(
			'label'    => __( 'Email ', 'astral' ),
			'type'     => 'email',
			'section'  => 'astral_contact',
			'settings' => 'astral_email',
		) );

		function astral_sanitize_checkbox( $input ) {
			return $input;
		}
	}

}

new astral_Customizer();



