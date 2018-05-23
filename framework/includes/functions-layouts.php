<?php
/*
===========================================================================================================
Silver Quantum - functions-layouts.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme. This framework.php template file allows you to add features and functionality that has been preset 
to be use in this WordPress theme which is stored in the theme's framework directory in the theme folder.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Control Radio Image (Class)
 2.0 - Control Radio Image (Layouts)
 3.0 - Control Radio Image (Validation)
===========================================================================================================
*/

/*
===========================================================================================================
1.0 - Control Radio Image (Class)
===========================================================================================================
*/
function silver_quantum_control_radio_image_class_setup() {
    class Silver_Quantum_Control_Radio_Image extends WP_Customize_Control {
        public $type = 'radio-image';
        
        public function enqueue() {
            wp_enqueue_script('silver-quantum-customize-controls', get_template_directory_uri() . '/js/control-radio-image.js', array('jquery'));
            wp_enqueue_style('silver-quantum-customize-controls', get_template_directory_uri() . '/css/control-radio-image.css');
        }
        
		public function render_content() {
			if (empty($this->choices)) {
				return;
			}			
			
			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title">
				<?php echo esc_attr($this->label); ?>
			</span>
			<?php if (!empty($this->description)) : ?>
				<span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
			<?php endif; ?>

			<div id="input_<?php echo esc_attr($this->id); ?>" class="image">
				<?php foreach ($this->choices as $value => $label) : ?>
						<label for="<?php echo esc_attr($this->id . $value); ?>">
							<input class="image-select" type="radio" value="<?php echo esc_attr($value); ?>" id="<?php echo esc_attr($this->id . $value); ?>" name="<?php echo esc_attr($name); ?>" <?php esc_attr($this->link()); checked($this->value(), esc_attr($value)); ?>>
							<img src="<?php echo esc_url($label); ?>" alt="<?php echo esc_attr($value); ?>" title="<?php echo esc_attr($value); ?>">
						</label>
					</input>
				<?php endforeach; ?>
			</div>
			<?php
		}
    }
}
add_action('customize_register', 'silver_quantum_control_radio_image_class_setup');
/*
===========================================================================================================
 2.0 - Control Radio Image (Layouts)
===========================================================================================================
*/
function silver_quantum_control_radio_image_layout_setup($wp_customize) {
    $wp_customize->add_panel('general_layouts', array(
        'title'     => esc_html__('General Layouts', 'silver-quantum'),
        'priority'  => 5,
    ));
    
    /*
    =======================================================================================================
    Enable and activate General Layouts for Silver Quantum. The General Layout should only be used under 
    Posts, Pages, and Archives.
    =======================================================================================================
    */    
    $wp_customize->add_section('global_layout', array(
        'title'     => esc_html__('General Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5,
    ));
    
    $wp_customize->add_setting('global_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'silver_quantum_sanitize_layout_setup',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'global_layout', array(
        'label'         => esc_html__('General Layout', 'silver-quantum'),
        'description'   => esc_html__('General Layout applies to all layouts that supports in this theme.', 'silver-quantum'),
        'section'       => 'global_layout',
        'settings'      => 'global_layout',
        'type'          => 'radio-image',
        'choices'       => array(
			'left-sidebar'  => get_template_directory_uri() . '/images/2cl.png',
            'right-sidebar' => get_template_directory_uri() . '/images/2cr.png',
			'no-sidebar'    => get_template_directory_uri() . '/images/1col.png',
        ),
    )));
}
add_action('customize_register', 'silver_quantum_control_radio_image_layout_setup');
/*
===========================================================================================================
 3.0 - Control Radio Image (Validation)
===========================================================================================================
*/
function silver_quantum_sanitize_layout_setup($value) {
    if (!in_array($value, array('left-sidebar', 'right-sidebar', 'no-sidebar'))) {
        $value = 'left-sidebar';
    }
    return $value;
}