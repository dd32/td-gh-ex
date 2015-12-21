<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since acmeblog 1.1.0
 */
if ( ! function_exists( 'acmeblog_reset_db_options' ) ) :
    function acmeblog_reset_db_options( $reset_options ) {
        set_theme_mod( 'acmeblog_theme_options', $reset_options );
    }
endif;

function acmeblog_reset_setting_callback( $input, $setting ){
    // Ensure input is a slug.
    $input = sanitize_text_field( $input );
    if( '0' == $input ){
        return '0';
    }
    $acmeblog_default_theme_options = acmeblog_get_default_theme_options();
    $acmeblog_get_theme_options = get_theme_mod( 'acmeblog_theme_options');

    switch ( $input ) {
        case "reset-color-options":
            $acmeblog_get_theme_options['acmeblog-primary-color'] = $acmeblog_default_theme_options['acmeblog-primary-color'];
            acmeblog_reset_db_options($acmeblog_get_theme_options);
            break;

        case "reset-all":
            acmeblog_reset_db_options($acmeblog_default_theme_options);
            break;

        default:
            break;
    }
    return '0';
}
/*adding sections for Reset Options*/
$wp_customize->add_section( 'acmeblog-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Reset Options', 'acmeblog' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'acmeblog_theme_options[acmeblog-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmeblog-reset-options'],
    'sanitize_callback' => 'acmeblog_reset_setting_callback',
    'transport'			=> 'postMessage'
) );

$choices = acmeblog_reset_options();
$wp_customize->add_control( 'acmeblog_theme_options[acmeblog-reset-options]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Reset Options', 'acmeblog' ),
    'description'   => __( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'acmeblog' ),
    'section'       => 'acmeblog-reset-options',
    'settings'      => 'acmeblog_theme_options[acmeblog-reset-options]',
    'type'	  	    => 'select'
) );