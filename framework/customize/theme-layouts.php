<?php
/*
============================================================================================================================
Silver Quantum - framework/customize/theme-layouts.php
============================================================================================================================
This theme-layouts.php template file gives you couple of options to change the layouts from left sidebar to right sidebar.
It also includes full width template if necessary if you need a page to set to full width. 

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Control Radio Image (Class)
 2.0 - Control Radio Image (Layout)
 3.0 - Control Radio Image (Validation)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Control Radio Image (Class)
============================================================================================================================
*/
function silver_quantum_control_radio_image_class_setup() {
    class Silver_Quantum_Control_Radio_Image extends WP_Customize_Control {
        public $type = 'radio-image';
        
        public function enqueue() {
            wp_enqueue_script('silver-quantum-customize-controls', get_theme_file_uri('/framework/dist/js/control-radio-image.js'), array('jquery'), '09012018', true);
            wp_enqueue_style('silver-quantum-customize-controls', get_theme_file_uri('/framework/dist/css/control-radio-image.css'), '09012018', true);
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
============================================================================================================================
 2.0 - Control Radio Image (Layout)
============================================================================================================================
*/
function silver_quantum_Control_Radio_Image_layout_setup($wp_customize) {
    $wp_customize->add_panel('general_layouts', array(
        'title'     => esc_html__('General Layouts', 'silver-quantum'),
        'priority'  => 10,
    ));
    
    /*
    ========================================================================================================================
    Enable and activate General Layouts for silver-quantum. The General Layout should only be used
    under Posts, Pages, and Archives.
    ========================================================================================================================
    */    
    $wp_customize->add_section('global_layout', array(
        'title'     => esc_html__('General Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5,
    ));
    
    $wp_customize->add_setting('global_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
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
			'left-sidebar'  => get_theme_file_uri('/framework/assets/images/2cl.png'),
            'right-sidebar' => get_theme_file_uri('/framework/assets/images/2cr.png'),
			'no-sidebar'    => get_theme_file_uri('/framework/assets/images/1col.png'),
        ),
    )));
    
    /*
    ========================================================================================================================
    Enable and activate Custom Layout for silver-quantum. The Custom Layout should only be used
    under Custom Templates that is registered as part of the theme.
        ========================================================================================================================
    */
    $wp_customize->add_section('custom_layout', array(
        'title'     => esc_html__('Custom Layout', 'silver-quantum'),
        'panel'     => 'general_layouts',
        'priority'  => 5,
    ));
    
    $wp_customize->add_setting('custom_layout', array(
        'default'           => 'left-sidebar',
        'sanitize_callback' => 'silver_quantum_sanitize_layout',
        'transport'         => 'refresh',
        'type'              => 'theme_mod',
    ));
    
    $wp_customize->add_control(new Silver_Quantum_Control_Radio_Image($wp_customize, 'custom_layout', array(
        'label'         => esc_html__('Custom Layout', 'silver-quantum'),
        'description'   => esc_html__('Custom Layout applies to all layouts that supports in this theme.', 'silver-quantum'),
        'section'       => 'custom_layout',
        'settings'      => 'custom_layout',
        'type'          => 'radio-image',
        'choices'       => array(
			'left-sidebar'  => get_theme_file_uri('/framework/assets/images/2cl.png'),
            'right-sidebar' => get_theme_file_uri('/framework/assets/images/2cr.png'),
			'no-sidebar'    => get_theme_file_uri('/framework/assets/images/1col.png'),
        ),
    )));
}
add_action('customize_register', 'silver_quantum_Control_Radio_Image_layout_setup');
/*
============================================================================================================================
 3.0 - Control Radio Image (Validation)
============================================================================================================================
*/
function silver_quantum_sanitize_layout($value) {
    if (!in_array($value, array('left-sidebar', 'right-sidebar', 'no-sidebar'))) {
        $value = 'left-sidebar';
    }
    return $value;
}