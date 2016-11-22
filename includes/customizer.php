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
@copyright      Copyright (C) 2014. Benjamin Lu
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

        public function to_json() {
            parent::to_json();

            // We need to make sure we have the correct image URL.
            foreach ( $this->choices as $value => $args )
                $this->choices[ $value ]['url'] = esc_url( sprintf( $args['url'], get_template_directory_uri(), get_stylesheet_directory_uri() ) );

            $this->json['choices'] = $this->choices;
            $this->json['link']    = $this->get_link();
            $this->json['value']   = $this->value();
            $this->json['id']      = $this->id;
        }

        public function content_template() { ?>

            <# if ( ! data.choices ) {
                return;
            } #>

            <# if ( data.label ) { #>
                <span class="customize-control-title">{{ data.label }}</span>
            <# } #>

            <# if ( data.description ) { #>
                <span class="description customize-control-description">{{{ data.description }}}</span>
            <# } #>

            <# _.each( data.choices, function( args, choice ) { #>
                <label>
                    <input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

                    <span class="screen-reader-text">{{ args.label }}</span>

                    <img src="{{ args.url }}" alt="{{ args.label }}" />
                </label>
            <# } ) #>
        <?php }
    }
    
    $wp_customize->register_control_type('Silver_Quantum_Control_Radio_Image');
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
    
    $wp_customize->add_section('post_layout', array(
        'title'     => esc_html__('Post Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('post_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'post_layout', array(
        'label'     => __('Post Layout', 'silver-quantum'),
        'section'   => 'post_layout',
        'settings'  => 'post_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'default' => array(
                'label' => esc_html__('Default (No Sidebar)', 'silver-quantum'),
                'url'   => '%s/images/1col.png',
            ),
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cl.png',
            ),
        ),
    )));
    
    // Enable and activate Page Layout for Silver Quantum.
    $wp_customize->add_section('page_layout', array(
        'title'     => esc_html__('Page Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('page_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'page_layout', array(
        'label'     => __('Page Layout', 'silver-quantum'),
        'section'   => 'page_layout',
        'settings'  => 'page_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'default' => array(
                'label' => esc_html__('Default (No Sidebar)', 'silver-quantum'),
                'url'   => '%s/images/1col.png',
            ),
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cl.png',
            ),
        ),
    )));
    
    // Enable and activate Custom Layout for Silver Quantum.
    $wp_customize->add_section('custom_layout', array(
        'title'     => esc_html__('Custom Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5
    ));
    
    $wp_customize->add_setting('custom_layout', array(
        'default'           => 'default',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh'
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'custom_layout', array(
        'label'     => __('Custom Layout', 'silver-quantum'),
        'section'   => 'custom_layout',
        'settings'  => 'custom_layout',
        'type'      => 'radio-image',
        'choices'  => array(
            'default' => array(
                'label' => esc_html__('Default (No Sidebar)', 'silver-quantum'),
                'url'   => '%s/images/1col.png',
            ),
            'sidebar-right' => array(
                'label' => esc_html__('Right Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cr.png',
            ),
            'sidebar-left' => array(
                'label' => esc_html__('Left Sidebar', 'silver-quantum'),
                'url'   => '%s/images/2cl.png',
            ),
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
    if (!in_array($value, array('default','sidebar-right', 'sidebar-left'))) {
        $value = 'default';
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