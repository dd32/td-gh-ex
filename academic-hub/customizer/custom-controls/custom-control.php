<?php
/**
 * Register Custom Controls
*/
function academic_hub_controls( $wp_customize ){

    
//Customizer Settings
require_once trailingslashit( get_template_directory() ). 'academic-hub/customizer/custom-controls/toggle/class-toggle-control.php';
require_once trailingslashit( get_template_directory() ). 'academic-hub/customizer/custom-controls/sortable/class-sortable-control.php';
require_once trailingslashit( get_template_directory() ). 'academic-hub/customizer/custom-controls/multicheck/class-multicheck-control.php';


//Repeater Section
require_once trailingslashit( get_template_directory() ). 'academic-hub/customizer/custom-controls/repeater/class-repeater-setting.php';
require_once trailingslashit( get_template_directory() ). 'academic-hub/customizer/custom-controls/repeater/class-control-repeater.php';

    
    $wp_customize->register_control_type( 'Academic_Hub_MultiCheck_Control' );
    $wp_customize->register_control_type( 'Academic_Hub_Toggle_Control' );
    $wp_customize->register_control_type( 'Academic_Hub_Drag_Section_Control' );
}
add_action( 'customize_register', 'academic_hub_controls' );