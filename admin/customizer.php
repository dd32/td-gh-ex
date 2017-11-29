<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Classes to create a custom controls
 */
if ( class_exists( 'WP_Customize_Control' ) ) {

	class WP_Customize_Range_Control extends WP_Customize_Control {
		public $type = 'custom_range';

		public function render_content() {
			?>
            <label>
				<?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif; ?>
                <table class="wp_custom_range_table">
                    <tr>
                        <td style="width:80%;">
                            <input data-input-type="range" type="range" <?php $this->input_attrs(); ?>
                                   value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                        </td>
                        <td style="width: 20%">
                            <input class="cs-range-value"
                                   value="<?php echo esc_attr( $this->value() ); ?>" type="number"/>
                        </td>
                    </tr>
                </table>
            </label>
			<?php
		}
	}

	class Layout_Picker_Custom_Control extends WP_Customize_Control {

		public $type = 'layout';

		public function render_content() {
			$imageDir = '/images/layouts/';
			$imguri   = get_template_directory_uri() . $imageDir;
			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <div class="attire-sb-layout">
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>" value="no-sidebar"/>
                    <img src="<?php echo $imguri; ?>no-sidebar.png" alt="Full Width" title="Full Width"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>" value="left-sidebar-1"/>
                    <img src="<?php echo $imguri; ?>left-sidebar.png" alt="Left Sidebar" title="Left Sidebar"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>"
                           value="right-sidebar-1"/>
                    <img src="<?php echo $imguri; ?>right-sidebar.png" alt="Right Sidebar" title="Right Sidebar"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>" value="sidebar-2"/>
                    <img src="<?php echo $imguri; ?>sidebar-2.png" alt="Sidebar | Content | Sidebar"
                         title="Sidebar | Content | Sidebar"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>" value="left-sidebar-2"/>
                    <img src="<?php echo $imguri; ?>left-sidebar-2.png" alt="Two Left Sidebar"
                         title="Two Left Sidebar"/>
                </label>
                <label>
                    <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>"
                           value="right-sidebar-2"/>
                    <img src="<?php echo $imguri; ?>right-sidebar-2.png" alt="Two Right Sidebar"
                         title="Two Right Sidebar"/>
                </label>
            </div>
			<?php
		}
	}

	class Image_Picker_Custom_Control extends WP_Customize_Control {

		public $type = 'image-picker';

		public function render_content() {
			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <div class="attire-image-picker">
				<?php foreach ( $this->choices as $choice ): ?>

                    <label>
                        <input type="radio" <?php $this->link(); ?> name="<?php echo $this->id; ?>"
                               value="<?php echo $choice['value']; ?>"/>
                        <img src="<?php echo $choice['src']; ?>" alt="<?php echo $choice['title']; ?>"
                             title="<?php echo $choice['title']; ?>"/>
                    </label>

				<?php endforeach; ?>
            </div>
			<?php
		}
	}

}

/**
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function attire_customize_register( $wp_customize ) {

	// Temporary initialisation to not show error; In general these variables are acquired from files added bellow

	$attire_panels   = array();
	$attire_sections = array();
	$attire_options  = array();
	$attire_config   = array();
	$choices        = array();
	$input_attrs    = array();
	$taxonomy       = array();
	$type           = '';
	$default        = '';
	$transport      = '';
	$label          = '';
	$section        = '';
	$description    = '';

	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';


	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => function () {
				bloginfo( 'description' );
			}
		) );

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => 'a.site-logo',
			'render_callback' => function () {
				bloginfo( 'name' );
			}
		) );
	}

	/* Load Panels, Sections, Settings, Controls array */
	require_once( dirname( __FILE__ ) . '/customizer-config.php' );


	/* Adding support for Child Themes */
	$attire_panels   = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_panels', $attire_panels );
	$attire_sections = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_sections', $attire_sections );
	$attire_options  = apply_filters( ATTIRE_THEME_PREFIX . 'customizer_options', $attire_options );

	/* Basic Config */
	$theme_option = $attire_config['option_name'];
	$capability   = $attire_config['capability'];
	$option_type  = $attire_config['option_type'];


	/* Add Panels */
	foreach ( $attire_panels as $id => $args ) {
		$wp_customize->add_panel( $id, $args );
	}

	/* Add Sections */
	foreach ( $attire_sections as $id => $args ) {
		$wp_customize->add_section( $id, $args );
	}

	/* Add Settings and Controls */
	foreach ( $attire_options as $id => $args ) {
		extract( $args );

		switch ( $type ) {
			case 'text':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;

			case 'textarea':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'textarea',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;

			case 'email':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_email',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;

			case 'url':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'esc_url_raw',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;

			case 'number':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control( $id, array(
					'label'       => $label,
					'type'        => 'number',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
					'input_attrs' => array(
						'min' => isset( $min ) ? $min : 0,
						'max' => isset( $max ) ? $max : 5,
					)
				) );
				break;

			case 'image':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'esc_url_raw',
				) );

				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;

			case 'select':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'select',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
					'choices'  => $choices,
				) );
				break;

			case 'color':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_hex_color',
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
					'label'    => $label,
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
				) ) );
				break;

			case 'layout':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new Layout_Picker_Custom_Control( $wp_customize, $id, array(
					'label'       => $label,
					'description' => '',
					'type'        => 'layout',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
				) ) );
				break;

			case 'image-picker':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( new Image_Picker_Custom_Control( $wp_customize, $id, array(
					'label'       => $label,
					'description' => '',
					'type'        => 'image-picker',
					'section'     => $section,
					'settings'    => $theme_option . '[' . $id . ']',
					'choices'     => $choices,
				) ) );
				break;

			case 'dropdown-pages':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'capability'        => $capability,
					'default'           => $default,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'section'  => $section,
					'type'     => 'dropdown-pages',
					'settings' => $theme_option . '[' . $id . ']',
				) );
				break;

			case 'dropdown-taxonomy':
				$choices    = array();
				$taxonomies = get_terms( $taxonomy, 'hide_empty=0' );

				if ( count( $taxonomies ) > 0 ) {
					foreach ( $taxonomies as $taxo ) {
						$tid             = isset( $taxo->term_id ) ? $taxo->term_id : null;
						$name            = isset( $taxo->name ) ? $taxo->name : null;
						$choices[ $tid ] = $name;
					}
				}

				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'label'    => $label,
					'type'     => 'select',
					'section'  => $section,
					'settings' => $theme_option . '[' . $id . ']',
					'choices'  => $choices,
				) );
				break;

			case 'typography':
				$fontsdata = AttireOptionFields::GetFonts();

				$fonts     = array();
				$fonts[''] = 'Default';
				foreach ( $fontsdata as $key => $font ) {
					$fonts[ $key ] = $font['name'];
				}
				asort( $fonts );
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );
				$wp_customize->add_control( $id, array(
					'settings' => $theme_option . '[' . $id . ']',
					'label'    => $label,
					'section'  => $section,
					'type'     => 'select',
					'choices'  => $fonts,
				) );
				break;

			case 'range':
				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => $default,
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'attire_sanitize_integer',
				) );

				$wp_customize->add_control(
					new WP_Customize_Range_Control(
						$wp_customize,
						$id,
						array(
							'label'       => $label,
							'section'     => $section,
							'settings'    => $theme_option . '[' . $id . ']',
							'description' => __( 'Measurement is in pixel.','attire' ),
							'input_attrs' => $input_attrs,

						)
					)
				);


				break;

			case 'dropdown-sidebar':
				global $wp_registered_sidebars;
				$sidebars               = array();
				$sidebars['no_sidebar'] = 'Do not apply';
				foreach ( $wp_registered_sidebars as $sidebar ) {
					$sid              = $sidebar['id'];
					$sidebars[ $sid ] = $sidebar['name'];
				}

				$wp_customize->add_setting( $theme_option . '[' . $id . ']', array(
					'default'           => '',
					'capability'        => $capability,
					'type'              => $option_type,
					'transport'         => $transport,
					'sanitize_callback' => 'sanitize_text_field',
				) );

				$wp_customize->add_control( $id, array(
					'settings' => $theme_option . '[' . $id . ']',
					'label'    => $label,
					'section'  => $section,
					'type'     => 'select',
					'choices'  => $sidebars,
				) );
				break;

			default:
				break;
		}

		if ( $id === 'site_logo' ) {
			$wp_customize->selective_refresh->add_partial( 'site_logo_partial', array(
				'settings'            => array( 'attire_options[site_logo]' ),
				'selector'            => '.site-logo',
				'render_callback'     => function () {
					return '<a class="site-logo" href="' . esc_url( home_url( "/" ) ) . '">' . AttireThemeEngine::SiteLogo() . '</a>';
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'site_logo_footer' ) {
			$wp_customize->selective_refresh->add_partial( 'site_logo_footer_partial', array(
				'settings'            => array( 'attire_options[site_logo_footer]' ),
				'selector'            => '.footer-logo',
				'render_callback'     => function () {
					$logourl = esc_url( AttireThemeEngine::NextGetOption( 'site_logo_footer' ) );
					if ( $logourl ) {
						return "<a class='' href='" . esc_url( home_url( '/' ) ) . "'>    <img class='' src='{$logourl}' title='" . get_bloginfo( 'sitename' ) . "' alt='" . get_bloginfo( 'sitename' ) . "' /></a>";
					} else {
						return get_bloginfo( 'sitename' );
					}
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'nav_header' ) {
			$wp_customize->selective_refresh->add_partial( 'nav_header_partial', array(
				'settings'            => array( 'attire_options[nav_header]' ),
				'selector'            => '.header-div',
				'render_callback'     => function () {
					AttireThemeEngine::HeaderStyle();
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'footer_style' ) {
			$wp_customize->selective_refresh->add_partial( 'footer_style_partial', array(
				'settings'            => array( 'attire_options[footer_style]' ),
				'selector'            => '.footer-div',
				'render_callback'     => function () {
					AttireThemeEngine::FooterStyle();
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'copyright_info' ) {
			$wp_customize->selective_refresh->add_partial( 'copyright_info_partial', array(
				'settings'            => array( 'attire_options[copyright_info]' ),
				'selector'            => '.copyright-text',
				'render_callback'     => function () {
					return AttireThemeEngine::NextGetOption( 'copyright_info' );
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'copyright_info_visibility' ) {
			$wp_customize->selective_refresh->add_partial( 'copyright_info_visibility_partial', array(
				'settings'            => array( 'attire_options[copyright_info_visibility]' ),
				'selector'            => '.copyright-outer',
				'render_callback'     => function () {
					$show = AttireThemeEngine::NextGetOption( 'copyright_info_visibility' );
					if ( $show === 'show' ) {
						return '<p class="copyright-text">' . esc_attr( AttireThemeEngine::NextGetOption( 'copyright_info' ) ) . '';
					} else {
						return '';
					}
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,

			) );
		} elseif ( $id === 'attire_archive_page_post_view' ) {
			$wp_customize->selective_refresh->add_partial( 'attire_archive_page_post_view_partial', array(
				'settings'            => array( 'attire_options[attire_archive_page_post_view]' ),
				'selector'            => '.archive-div',
				'render_callback'     => function () {
					get_template_part( 'loop', get_post_type() );
				},
				'fallback_refresh'    => false,
				'container_inclusive' => false,
			) );
		}
	}
}

add_action( 'customize_register', 'attire_customize_register' );


/**
 *
 * Sanitize Input Data
 */
function attire_sanitize_integer( $input ) {
	if ( is_numeric( $input ) ) {
		return intval( $input );
	}
}

function attire_sanitize_email( $input ) {
	if ( is_email( $input ) ) {
		return $input;
	}
}

/**
 *
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function attire_customize_preview_js() {
	wp_enqueue_script( 'attire_customizer', get_template_directory_uri() . '/admin/js/customizer.js', array( 'customize-preview' ), '20171015', true );
}

add_action( 'customize_preview_init', 'attire_customize_preview_js' );

/**
 *
 * Customizing Customizer Controls
 */
function attire_customizer_style() {


	wp_enqueue_style( 'attire-customizer-controls-css', get_template_directory_uri() . '/admin/css/attire-customizer-controls.css' );
	wp_enqueue_script( 'attire-customizer-controls-js', get_template_directory_uri() . '/admin/js/attire-customizer-controls.js', array(
		'jquery',
		'customize-controls'
	), false, true );
}

add_action( 'customize_controls_enqueue_scripts', 'attire_customizer_style' );

