
                <?php if( get_theme_mod( 'social_section_facebook_url' ) ) : ?>
                    <a href="<?php echo esc_url( get_theme_mod( 'social_section_facebook_url' ) ); ?>"><i class="ti-facebook"></i></a>
                <?php endif; ?>
         

if ( ! function_exists( 'atlas_concern_customize_register' ) ) :

function atlas_concern_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    $wp_customize->add_section( 'social_section', array(
        'title' => __( 'Social Layout', 'atlas_concern' )
    ));

    $wp_customize->add_setting( 'social_section_facebook_url', array(
        'type' => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'social_section_facebook_url', array(
        'label' => __( 'Facebook Url', 'atlas_concern' ),
        'type' => 'url',
        'section' => 'social_section'
    ));

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'atlas_concern_customize_register' );
endif;// atlas_concern_customize_register