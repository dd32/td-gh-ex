<?php
/**
 * aaron Theme Customizer
 *
 * @package aaron
 */


/**
 * Enqueue the customizer stylesheet for our radio buttons.
 */

function aaron_customizer_stylesheet() {
    wp_register_style( 'aaron-customizer-css', get_template_directory_uri() . '/inc/customizer.css' );
    wp_enqueue_style( 'aaron-customizer-css' );
}
add_action( 'customize_controls_print_styles', 'aaron_customizer_stylesheet' );


function aaron_customize_register( $wp_customize ) {
	/**
	 * Custom control
	 */
	class aaron_icon_Control extends WP_Customize_Control {
		public function render_content() {
			?>
			<div class="aaron-radio-buttons">
				<fieldset>
				<legend class="customize-control-title"><?php echo esc_html( $this->label ); ?></legend>
				<label>
					<input type="radio" value="dashicons-admin-users"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-admin-users' ); ?> />
						<i class="dashicons dashicons-admin-users"></i> User
				</label>
				<label>
					<input type="radio" value="dashicons-admin-generic"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-admin-generic' ); ?> />
					<i class="dashicons dashicons-admin-generic"></i> Admin
				</label>
				<label>
					<input type="radio" value="dashicons-desktop"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-desktop' ); ?> />
					<i class="dashicons dashicons-desktop"></i> Desktop
				</label>
				<label>
					<input type="radio" value="dashicons-tablet"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-tablet' ); ?> />
					<i class="dashicons dashicons-tablet"></i> Tablet
				</label>
				<label>
					<input type="radio" value="dashicons-smartphone"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-smartphone' ); ?> />
					<i class="dashicons dashicons-smartphone"></i> Phone
				</label>
				<label>
					<input type="radio" value="dashicons-heart"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-heart' ); ?> />
					<i class="dashicons dashicons-heart"></i> Heart
				</label>
				<label>
					<input type="radio" value="dashicons-palmtree"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-palmtree' ); ?> />
					<i class="dashicons dashicons-palmtree"></i> Palmtree
				</label>
				<label>
					<input type="radio" value="dashicons-wordpress-alt"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-wordpress-alt' ); ?> />
					<i class="dashicons dashicons-wordpress-alt"></i> WordPress
				</label>
				<label>				
					<input type="radio" value="dashicons-admin-plugins"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-admin-plugins' ); ?> />
					<i class="dashicons dashicons-admin-plugins"></i> Plugins
				</label>
				<label>
					<input type="radio" value="dashicons-visibility"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-visibility' ); ?> />
					<i class="dashicons dashicons-visibility"></i> Visibility
				</label>
				<label>
					<input type="radio" value="dashicons-format-status"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-format-status' ); ?> />
					<i class="dashicons dashicons-format-status"></i> Status
				</label>
				<label>
					<input type="radio" value="dashicons-edit"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-edit' ); ?> />
					<i class="dashicons dashicons-edit"></i> Edit
				</label>
				<label>
					<input type="radio" value="dashicons-cart"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-cart' ); ?> />
					<i class="dashicons dashicons-cart"></i> Cart
				</label>
				<label>
					<input type="radio" value="dashicons-format-image"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-format-image' ); ?> />
					<i class="dashicons dashicons-format-image"></i> Image
				</label>
				<label>
					<input type="radio" value="dashicons-editor-help"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-editor-help' ); ?> />
					<i class="dashicons dashicons-editor-help"></i> Help
				</label>
				<label>
					<input type="radio" value="dashicons-star-filled"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-star-filled' ); ?> />
					<i class="dashicons dashicons-star-filled"></i> Star
				</label>
				<label>
					<input type="radio" value="dashicons-admin-links"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-admin-links' ); ?> />
					<i class="dashicons dashicons-admin-links"></i> Links
				</label>
				<label>
					<input type="radio" value="dashicons-format-audio"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'dashicons-format-audio' ); ?> />
					<i class="dashicons dashicons-format-audio"></i> Audio
				</label>
					<label>
					<input type="radio" value="no-icon"  name="<?php echo esc_attr( $this->id ); ?>" <?php $this->link(); checked( $this->value(), 'no-icon' ); ?> />
					No icon
				</label>
				</fieldset>
			</div>
			<?php
		}
	}

	
	/*Add sections and panels to the WordPress customizer*/
	
	$wp_customize->add_panel( 'aaron_custom_high', array(
		'priority'       => 80,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Frontpage Highlights', 'aaron' ),
		'description'    => __( 'Frontpage Highlights are displayed in the lower part of the header.', 'aaron' ),
	) );
	

	$wp_customize->add_panel( 'aaron_action_panel', array(
		'priority'       => 70,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Call to Action', 'aaron' ),
		'description'    => __( 'The Call to Action is displayed below the site title in the header.', 'aaron' ),
	) );



	$wp_customize->add_section('aaron_section_advanced',      array(
            'title' => __( 'Advanced settings', 'aaron' ),
            'priority' => 100
        )
    );
	
	$wp_customize->add_section('aaron_section_reset',      array(
            'title' => __( 'Reset', 'aaron' ),
            'priority' => 220
        )
    );


	$wp_customize->get_section('header_image')->title = __( 'Header background', 'aaron');

	$wp_customize->add_setting( 'aaron_header_bgcolor', array(
		'default'        => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aaron_header_bgcolor', array(
	'label'        => __( 'Header background color:', 'aaron' ),
	'section' => 'header_image',
	'settings'  => 'aaron_header_bgcolor',
	) ) );


	//Hide meta
	$wp_customize->add_setting( 'aaron_hide_meta',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_meta',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the meta information.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);

	//Hide author
	$wp_customize->add_setting( 'aaron_hide_author',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_author',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the author and post date information.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);

	$wp_customize->add_setting( 'aaron_show_sidebar_on_pages',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_show_sidebar_on_pages',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to show the sidebar on pages.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);


	$wp_customize->add_setting( 'aaron_front_sidebar',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_front_sidebar',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to show the sidebar on the frontpage.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);
	
	$wp_customize->add_setting( 'aaron_breadcrumb',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_breadcrumb',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to show the breadcrumb navigation.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);

	
	/* Frontpage Highlights
	* We have 3 highlight areas, so we need to loop the code.
	*/
	
	$wp_customize->add_section( 'aaron_section_hide', array(
			 'title' => __( 'Hide the highlights', 'aaron' ),
			'panel'  => 'aaron_custom_high',
	) );
		
	$wp_customize->add_setting( 'aaron_hide_highlight',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_highlight',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the highlights.', 'aaron' ),
			'section' => 'aaron_section_hide',
		)
	);

	
	for ($i = 1; $i < 10; $i++) {
	
		$wp_customize->add_section( 'aaron_section_'. $i, array(
			 'title' => __( 'Highlight number', 'aaron' ) . ' ' . $i,
			'panel'  => 'aaron_custom_high',
		) );
	
		$wp_customize->add_setting( 'aaron_highlight' . $i . '_headline',		array(
				'sanitize_callback' => 'aaron_sanitize_text',
			)
		);

		$wp_customize->add_control('aaron_highlight' . $i . '_headline',		array(
				'type' => 'text',
				'label' =>  __( 'Add this headline to your highlight:', 'aaron' ),
				'section' => 'aaron_section_'. $i,
			)
		);	
		
		$wp_customize->add_setting( 'aaron_highlight' . $i . '_text',		array(
				'sanitize_callback' => 'aaron_sanitize_text',
			)
		);

		$wp_customize->add_control('aaron_highlight' . $i . '_text',		array(
				'type' => 'text',
				'label' =>  __( 'Add this text to your highlight:', 'aaron' ),
				'section' => 'aaron_section_'. $i,
			)
		);	
		
		$wp_customize->add_setting( 'aaron_highlight' . $i . '_icon',		array(
				'sanitize_callback' => 'aaron_sanitize_text',
			)
		);
		
		
		$wp_customize->add_control( new aaron_icon_Control( $wp_customize, 'aaron_highlight' . $i . '_icon', array(
				'label' =>  __( 'Chose an icon for your highlight:', 'aaron' ),
				'section'  => 'aaron_section_'. $i,
				'settings' => 'aaron_highlight' . $i . '_icon',
				'priority' => 1,
		) ) );
		
		

		$wp_customize->add_setting( 'aaron_highlight' . $i . '_image',		array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		
 
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aaron_highlight' . $i . '_image', array(
		        'label' => __( 'Upload an image for your highlight:', 'aaron' ),
		        'description'    => __( 'Uploading an image will overwrite your icon settings.', 'aaron' ),
		     	'section'  => 'aaron_section_'. $i,
		 ) ) );



		$wp_customize->add_setting( 'aaron_highlight' . $i . '_link',		array(
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control('aaron_highlight' . $i . '_link',		array(
				'type' => 'text',
				'label' =>  __( 'Add a link to your highlight:', 'aaron' ),
				'section' => 'aaron_section_'. $i,
			)
		);
	
	}//End loop
	
	
	/* Call to action text **/

	$wp_customize->add_section('aaron_section_one',      array(
            'title' => __( 'Call to Action', 'aaron' ),
            'priority' => 100,
            'panel'  => 'aaron_action_panel',
        )
    );

	$wp_customize->add_setting( 'aaron_action_text',		array(
			'sanitize_callback' => 'aaron_sanitize_text',
		)
	);

	$wp_customize->add_control('aaron_action_text',		array(
			'type' => 'text',
			'label' =>  __( 'Add this text to the Call to Action button on the front page:', 'aaron' ),
			'section' => 'aaron_section_one',
		)
	);	

	/* Call to action link **/
	$wp_customize->add_setting( 'aaron_action_link',		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control('aaron_action_link',		array(
			'type' => 'text',
			'label' =>  __( 'Add a link to the Call to action button:', 'aaron' ),
			'section' => 'aaron_section_one',
		)
	);
	
	$wp_customize->add_setting( 'aaron_hide_action',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_action',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the Call to Action button.', 'aaron' ),
			'section' => 'aaron_section_one',
		)
	);


	$wp_customize->add_setting( 'aaron_action_color', array(
		'default'        => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'aaron_action_color', array(
	'label'        => __( 'Call to Action text color:', 'aaron' ),
	'section' => 'aaron_section_one',
	'settings'  => 'aaron_action_color',
	) ) );




	/*Advanced settings*/
	$wp_customize->add_setting( 'aaron_hide_search',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_search',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the search form in the header menu.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);


	$wp_customize->add_setting( 'aaron_hide_title',		array(
			'sanitize_callback' => 'aaron_sanitize_checkbox',
		)
	);
	$wp_customize->add_control('aaron_hide_title',		array(
			'type' => 'checkbox',
			'label' =>  __( 'Check this box to hide the clickable site title in the header menu.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);


	/* if jetpack is installed, add the featured heading to the customizer. */
		$wp_customize->add_setting( 'aaron_featured_headline',		array(
				'sanitize_callback' => 'aaron_sanitize_text',
				'default'        => __( 'Featured', 'aaron' ),
			)
		);
		$wp_customize->add_control('aaron_featured_headline',		array(
				'type' => 'text',
				'label' =>  __( 'Headline above your featured content:', 'aaron' ),
				'section' => 'featured_content',
			)
		);


	/*Add a better screen reader text for the two widget areas depending on your content*/

	$wp_customize->add_setting( 'aaron_footer_screen_reader',		array(
			'sanitize_callback' => 'aaron_sanitize_text',
		)
	);
	$wp_customize->add_control('aaron_footer_screen_reader',		array(
			'type' => 'text',
			'label' =>  __( 'Add a descriptive screen reader text for the footer.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);

	$wp_customize->add_setting( 'aaron_sidebar_screen_reader',		array(
			'sanitize_callback' => 'aaron_sanitize_text',
		)
	);
	$wp_customize->add_control('aaron_sidebar_screen_reader',		array(
			'type' => 'text',
			'label' =>  __( 'Add a descriptive screen reader text for the sidebar.', 'aaron' ),
			'section' => 'aaron_section_advanced',
		)
	);


	/** Reset */
	$wp_customize->add_setting( 'aaron_reset',		array(
			'sanitize_callback' => 'aaron_sanitize_reset',
		)
	);
	$wp_customize->add_control('aaron_reset',		array(
			'type' => 'text',
			'label' =>  __( 'Are you sure that you want to reset your settings? Type YES in the box, save and refresh the page.', 'aaron' ),
			'section' => 'aaron_section_reset',
		)
	);


	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'aaron_hide_search' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'aaron_hide_title' )->transport  = 'postMessage';

	if ( aaron_has_featured_posts( 1 ) ) {
		$wp_customize->get_setting( 'aaron_featured_headline' )->transport  = 'postMessage';
	}

}
add_action( 'customize_register', 'aaron_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aaron_customize_preview_js() {
	wp_enqueue_script( 'aaron_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'aaron_customize_preview_js' );


function aaron_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );  
}

function aaron_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}


//Reset the theme settings
function aaron_sanitize_reset( $input ) {
	$input=sanitize_text_field( $input );

	if($input == 'YES'){
		remove_theme_mods();
	}else{
		return;
	}
}
?>