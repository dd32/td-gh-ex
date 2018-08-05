<?php
function adviso_customize_register_header_mail( $wp_customize ) {

    $wp_customize->add_section('adviso_contact_info', array(
        'title' => __('Contact Info','adviso'),
        'panel' => 'adviso_header_panel'
    ));

    $wp_customize->add_setting('adviso_contact_info_enable', array(
        'sanitize_callback' => 'adviso_sanitize_text',
    ));

    $wp_customize->add_control(
        new Adviso_Switch_Control(
            $wp_customize,
            'adviso_contact_info_enable',
            array(
                'settings'		=> 'adviso_contact_info_enable',
                'section'		=> 'adviso_contact_info',
                'label'    => __( 'Show Contact Info Options','adviso' ),
                'enable_disable' 	=> array(
                    'enable' => __( 'Enabled', 'adviso' ),
                    'disable' => __( 'Disabled', 'adviso' )
                )
            )
        )
    );

    $wp_customize->add_setting( 'adviso_message' , array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control(
        'adviso_message', array(
        'label' => __('Write your Message','adviso'),
        'section' => 'adviso_contact_info',
        'settings' => 'adviso_message',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'adviso_mail_id' , array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control(
        'adviso_mail_id', array(
        'label' => __('Your Email','adviso'),
        'section' => 'adviso_contact_info',
        'settings' => 'adviso_mail_id',
        'type' => 'text',
    ) );

    $wp_customize->add_setting( 'adviso_phone' , array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control(
        'adviso_phone', array(
        'label' => __('Your Phone No.','adviso'),
        'section' => 'adviso_contact_info',
        'settings' => 'adviso_phone',
        'type' => 'text',
    ) );
}
add_action( 'customize_register', 'adviso_customize_register_header_mail' );