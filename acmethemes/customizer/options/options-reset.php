<?php
/**
 * Reset options
 * Its outside options panel
 *
 * @param  array $reset_options
 * @return void
 *
 * @since AcmePhoto 1.0.0
 */
if ( ! function_exists( 'acmephoto_reset_db_options' ) ) :
    function acmephoto_reset_db_options( $reset_options ) {
        set_theme_mod( 'acmephoto_theme_options', $reset_options );
    }
endif;

/*sanitize callback for reset setting*/
if ( ! function_exists( 'acmephoto_reset_setting_callback' ) ) :
    function acmephoto_reset_setting_callback( $input, $setting ){
        // Ensure input is a slug.
        $input = sanitize_text_field( $input );
        if( '0' == $input ){
            return '0';
        }
        $acmephoto_default_theme_options = acmephoto_get_default_theme_options();
        $acmephoto_get_theme_options = get_theme_mod( 'acmephoto_theme_options');

        switch ( $input ) {
            case "reset-color-options":
                $acmephoto_get_theme_options['acmephoto-primary-color'] = $acmephoto_default_theme_options['acmephoto-primary-color'];
                acmephoto_reset_db_options($acmephoto_get_theme_options);
                break;

            case "reset-all":
                acmephoto_reset_db_options($acmephoto_default_theme_options);
                break;

            default:
                break;
        }
    }
endif;


/*adding sections for Reset Options*/
$wp_customize->add_section( 'acmephoto-reset-options', array(
    'priority'       => 220,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Reset Options', 'acmephoto' )
) );

/*Reset Options*/
$wp_customize->add_setting( 'acmephoto_theme_options[acmephoto-reset-options]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['acmephoto-reset-options'],
    'sanitize_callback' => 'acmephoto_reset_setting_callback',
    'transport'			=> 'postMessage'
) );

$choices = acmephoto_reset_options();
$wp_customize->add_control( 'acmephoto_theme_options[acmephoto-reset-options]', array(
    'choices'  	    => $choices,
    'label'		    => __( 'Reset Options', 'acmephoto' ),
    'description'   => __( 'Caution: Reset theme settings according to the given options. Refresh the page after saving to view the effects. ', 'acmephoto' ),
    'section'       => 'acmephoto-reset-options',
    'settings'      => 'acmephoto_theme_options[acmephoto-reset-options]',
    'type'	  	    => 'select'
) );