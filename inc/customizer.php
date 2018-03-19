<?php

if ( ! function_exists( 'artgallery_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function artgallery_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // artgallery_sanitize_checkbox

if ( ! function_exists( 'artgallery_customize_register' ) ) :
	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 */
	function artgallery_customize_register( $wp_customize ) {

		/**
	     * Add Animations Section
	     */
	    $wp_customize->add_section(
	        'artgallery_animations_display',
	        array(
	            'title'       => __( 'Animations', 'artgallery' ),
	            'capability'  => 'edit_theme_options',
	        )
	    );

	    // Add display Animations option
	    $wp_customize->add_setting(
	            'artgallery_animations_display',
	            array(
	                    'default'           => 1,
	                    'sanitize_callback' => 'artgallery_sanitize_checkbox',
	            )
	    );

	    $wp_customize->add_control( new WP_Customize_Control( $wp_customize,
	                        'artgallery_animations_display',
	                            array(
	                                'label'          => __( 'Enable Animations', 'artgallery' ),
	                                'section'        => 'artgallery_animations_display',
	                                'settings'       => 'artgallery_animations_display',
	                                'type'           => 'checkbox',
	                            )
	                        )
	    );

		/**
		 * Add Footer Section
		 */
		$wp_customize->add_section(
			'artgallery_footer_section',
			array(
				'title'       => __( 'Footer', 'artgallery' ),
				'capability'  => 'edit_theme_options',
			)
		);
		
		// Add Footer Copyright Text
		$wp_customize->add_setting(
			'artgallery_footer_copyright',
			array(
			    'default'           => '',
			    'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'artgallery_footer_copyright',
	        array(
	            'label'          => __( 'Copyright Text', 'artgallery' ),
	            'section'        => 'artgallery_footer_section',
	            'settings'       => 'artgallery_footer_copyright',
	            'type'           => 'text',
	            )
	        )
		);
	}
endif; // artgallery_customize_register
add_action( 'customize_register', 'artgallery_customize_register' );
