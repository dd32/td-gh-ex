<?php
function adviso_customize_register_layouts( $wp_customize ) {
    $wp_customize->get_section('background_image')->panel = 'adviso_design_panel';
    // Layout and Design
    $wp_customize->add_panel( 'adviso_design_panel', array(
        'priority'       => 20,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Design & Layout','adviso'),
    ) );

    $wp_customize->add_section(
        'adviso_design_options',
        array(
            'title'     => __('Blog Layout','adviso'),
            'priority'  => 0,
            'panel'     => 'adviso_design_panel'
        )
    );


    $wp_customize->add_setting(
        'adviso_blog_layout',
        array(
            'default' => 'grid',
            'sanitize_callback' => 'adviso_sanitize_blog_layout',
        )
    );

    function adviso_sanitize_blog_layout( $input ) {
        if ( in_array($input, array('grid','grid_2_column','adviso') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'adviso_blog_layout',array(
            'label' => __('Select Layout','adviso'),
            'description' => __('Use 3 Column Layouts, only after disabling sidebar for the page.','adviso'),
            'settings' => 'adviso_blog_layout',
            'section'  => 'adviso_design_options',
            'type' => 'select',
            'choices' => array(
                'grid' => __('Standard Blog Layout','adviso'),
                'adviso' => __('Adviso Theme Layout','adviso'),
                'grid_2_column' => __('Grid - 2 Column','adviso'),
            )
        )
    );

    //Sidebar Layout
    $wp_customize->add_section(
        'adviso_sidebar_options',
        array(
            'title'     => __('Sidebar Layout','adviso'),
            'priority'  => 0,
            'panel'     => 'adviso_design_panel'
        )
    );
    
    $wp_customize->add_setting(
        'adviso_disable_sidebar',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar',
            array(
                'settings'		=> 'adviso_disable_sidebar',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar Everywhere.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_disable_sidebar_home',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar_home',
            array(
                'settings'		=> 'adviso_disable_sidebar_home',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Home/Blog.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                ),
                'active_callback' => 'adviso_show_sidebar_options',
            )
        )
    );

    $wp_customize->add_setting(
        'adviso_disable_sidebar_front',
        array(
            'sanitize_callback' => 'adviso_sanitize_text',
            'default' => 'enable'
        )
    );

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_disable_sidebar_front',
            array(
                'settings'		=> 'adviso_disable_sidebar_front',
                'section'		=> 'adviso_sidebar_options',
                'label'    => __( 'Enable/Disable Sidebar on Front Page.','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                ),
                'active_callback' => 'adviso_show_sidebar_options',
            )
        )
    );
    
    $wp_customize->add_setting(
        'adviso_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'adviso_sanitize_positive_number' )
    );

    $wp_customize->add_control(
        'adviso_sidebar_width', array(
            'settings' => 'adviso_sidebar_width',
            'label'    => __( 'Sidebar Width','adviso' ),
            'description' => __('Min: 25%, Default: 33%, Max: 40%','adviso'),
            'section'  => 'adviso_sidebar_options',
            'type'     => 'range',
            'active_callback' => 'adviso_show_sidebar_options',
            'input_attrs' => array(
                'min'   => 3,
                'max'   => 5,
                'step'  => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function adviso_show_sidebar_options($control) {

        $option = $control->manager->get_setting('adviso_disable_sidebar');
        return $option->value() == 'enable' ;

    }

    //Custom Footer Text
    $wp_customize-> add_section(
        'adviso_custom_footer',
        array(
            'title'			=> __('Custom Footer Text','adviso'),
            'description'	=> __('Enter your Own Copyright Text.','adviso'),
            'priority'		=> 11,
            'panel'			=> 'adviso_design_panel'
        )
    );

    $wp_customize->add_setting(
        'adviso_footer_text',
        array(
            'default'		=> '',
            'sanitize_callback'	=> 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'adviso_footer_text',
        array(
            'section' => 'adviso_custom_footer',
            'settings' => 'adviso_footer_text',
            'type' => 'text'
        )
    );

}
add_action('customize_register', 'adviso_customize_register_layouts');