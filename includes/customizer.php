<?php
/*
================================================================================================
Silver Quantum - customizer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other style.css). The index.php template file is flexible. It can be used to 
include all references to the header, content, widget, footer and any other pages created in 
WordPress. Or it can be divided into modular template files, each taking on part of the workload. 
If you do not provide other template files, WordPress may have default files or functions to 
perform their jobs.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.lumiathemes.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Customize Custom Classes (Setup)
 2.0 - Customize Register (Setup)
 3.0 - Customize Register (Validation)
 4.0 - Customize Register (Preview)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Custom Classes (Setup)
================================================================================================
*/
function silver_quantum_custom_classes_setup($wp_customize) {
    class Silver_Quantum_Control_Radio_Image extends WP_Customize_Control {
        public $type = 'radio-image';

        public function enqueue() {
            wp_enqueue_script('silver-quantum-customize-controls', get_template_directory_uri() . '/js/customize-controls.js', array('jquery'));
            wp_enqueue_style('silver-quantum-customize-controls', get_template_directory_uri() . '/css/customize-controls.css');
        }

		public function render_content() {
			if ( empty( $this->choices ) ) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr( $this->label ); ?>
			</span>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<div id="input_<?php echo esc_attr( $this->id ); ?>" class="image">
				<?php foreach ( $this->choices as $value => $label ) : ?>
						<label for="<?php echo esc_attr( $this->id . $value ); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr( $value ); ?>" id="<?php echo esc_attr( $this->id . $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php esc_attr( $this->link() ); checked( $this->value(), esc_attr( $value ) ); ?>>
							<img src="<?php echo esc_url( $label ); ?>" alt="<?php echo esc_attr( $value ); ?>" title="<?php echo esc_attr( $value ); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
    }
}
add_action('customize_register', 'silver_quantum_custom_classes_setup');


/*
================================================================================================
 2.0 - Customize Register (Setup)
================================================================================================
*/
function silver_quantum_customize_register_setup($wp_customize) {
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    // Enable and activate Post Layout for Silver Quantum.
    $wp_customize->add_panel('general_layouts', array(
        'title' => esc_html__('General Layouts', 'silver-quantum'),
        'priority'  => 5
    ));
    
    $wp_customize->add_section('global_layout', array(
        'title'     => esc_html__('Global Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('global_layout', array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'global_layout', array(
        'label'     => __('General Layout', 'silver-quantum'),
        'description'   => __('General Layout applies to all layouts that supports in this theme.', 'silver-quantum'),
        'section'   => 'global_layout',
        'settings'  => 'global_layout',
        'type'      => 'radio-image',
        'choices'  => array(
			'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
			'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
			'no-sidebar'    => get_template_directory_uri() . '/images/1col.png',
        ),
    )));
    
    // Enable and activate Custom Layout for Silver Quantum.
    $wp_customize->add_section('custom_layout', array(
        'title'     => esc_html__('Custom Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('custom_layout', array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'custom_layout', array(
        'label'     => __('Custom Layout', 'silver-quantum'),
        'description'   => __('Custom Layout applies to all layouts that supports in this theme.', 'silver-quantum'),
        'section'   => 'custom_layout',
        'settings'  => 'custom_layout',
        'type'      => 'radio-image',
        'choices'  => array(
			'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
			'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
			'no-sidebar'    => get_template_directory_uri() . '/images/1col.png',
        ),
    )));
    
    // Enable and activate extra colors for Silver Quantum.
    $wp_customize->add_setting('body_text_color', array(
        'default'           => '#000000',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text_color', array(
        'label'        => __( 'Body Color', 'silver-quantum' ),
        'section'    => 'colors',
        'settings'   => 'body_text_color',
    )));
    
    // Enable and activate extra colors for Silver Quantum.
    $wp_customize->add_setting('body_link_color', array(
        'default'           => '#1d1d1d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link_color', array(
        'label'        => __( 'Body Link Color', 'silver-quantum' ),
        'section'    => 'colors',
        'settings'   => 'body_link_color',
    )));
    
    // Enable and activate extra colors for Silver Quantum.
    $wp_customize->add_setting('body_link_color_hover', array(
        'default'           => '#1d1d1d',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_link_color_hover', array(
        'label'        => __( 'Body Link Color Hover', 'silver-quantum' ),
        'section'    => 'colors',
        'settings'   => 'body_link_color_hover',
    )));
    
}
add_action('customize_register', 'silver_quantum_customize_register_setup');

/*
================================================================================================
 3.0 - Customize Register (Validation)
================================================================================================
*/
function silver_quantum_sanitize_checkbox($checked) {
    return((isset($checked) && true == $checked) ? true : false);
}

function silver_quantum_sanitize_layout($value) {
    if (!in_array($value, array('right-sidebar','left-sidebar', 'no-sidebar'))) {
        $value = 'right-sidebar';
    }
    return $value;
}

function silver_quantum_custom_colors_css() { ?>
    <style type="text/css">
        body {
            color: <?php echo esc_html(get_theme_mod('body_text_color', '#1d1d1d')); ?>;
        }

        a {
            color: <?php echo esc_html(get_theme_mod('body_link_color', '#1a1a1a')); ?>;
        }

        a:hover {
            color: <?php echo esc_html(get_theme_mod('body_link_color_hover', '#1d1d1d')); ?>
        }
    </style>
<?php
}
add_action('wp_head', 'silver_quantum_custom_colors_css');

/*
================================================================================================
 4.0 - Customize Register (Preview)
================================================================================================
*/
function silver_quantum_customize_preview_js() {
    // Enable and activate Customize Preview JavaScript for Silver Quantum.
    wp_enqueue_script('silver-quantum-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array('jquery','customize-preview'), '11172014', true);
}
add_action('customize_preview_init', 'silver_quantum_customize_preview_js');