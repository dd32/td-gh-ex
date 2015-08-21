<?php
/**
 *	Customizer
 */
if( !function_exists( 'accountant_customizer' ) ) {
	add_action( 'customize_register', 'accountant_customizer', 50 );
	function accountant_customizer( $wp_customize ) {
		$wp_customize->remove_setting( 'lawyeria_lite_header_logo' );
		$wp_customize->remove_control( 'lawyeria_lite_header_logo' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thecontent_image' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thecontent_image' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thecontent_title' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thecontent_title' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thecontent_content' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thecontent_content' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_subheader_bg' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_subheader_bg' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_firstlybox_icon' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_firstlybox_icon' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_firstlybox_title' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_firstlybox_title' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_firstlybox_content' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_firstlybox_content' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_secondlybox_icon' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_secondlybox_icon' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_secondlybox_title' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_secondlybox_title' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_secondlybox_content' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_secondlybox_content' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thirdlybox_icon' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thirdlybox_icon' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thirdlybox_title' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thirdlybox_title' );
		$wp_customize->remove_setting( 'lawyeria_lite_frontpage_thirdlybox_content' );
		$wp_customize->remove_control( 'lawyeria_lite_frontpage_thirdlybox_content' );

		// Subheader Feat. - Box 1 - Field 1
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box1_field1', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( '1.700+', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box1_field1', array(
		    'label'    => __( 'Subheader Feat. - Box 1 - Field 1:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box1_field1',
			'priority' => '6'
		) );

		// Subheader Feat. - Box 1 - Field 2
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box1_field2', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Trusted clients', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box1_field2', array(
		    'label'    => __( 'Subheader Feat. - Box 1 - Field 2:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box1_field2',
			'priority' => '7'
		) );

		// Subheader Feat. - Box 2 - Field 1
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box2_field1', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( '$180.000.000', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box2_field1', array(
		    'label'    => __( 'Subheader Feat. - Box 2 - Field 1:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box2_field1',
			'priority' => '8'
		) );

		// Subheader Feat. - Box 2 - Field 2
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box2_field2', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Recovered for your clients', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box2_field2', array(
		    'label'    => __( 'Subheader Feat. - Box 2 - Field 2:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box2_field2',
			'priority' => '9'
		) );

		// Subheader Feat. - Box 3 - Field 1
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box3_field1', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( '98%', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box3_field1', array(
		    'label'    => __( 'Subheader Feat. - Box 3 - Field 1:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box3_field1',
			'priority' => '10'
		) );

		// Subheader Feat. - Box 3 - Field 2
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box3_field2', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Succesful cases', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box3_field2', array(
		    'label'    => __( 'Subheader Feat. - Box 3 - Field 2:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box3_field2',
			'priority' => '11'
		) );

		// Subheader Feat. - Box 4 - Field 1
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box4_field1', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( '10.600', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box4_field1', array(
		    'label'    => __( 'Subheader Feat. - Box 4 - Field 1:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box4_field1',
			'priority' => '12'
		) );

		// Subheader Feat. - Box 4 - Field 2
		$wp_customize->add_setting( 'accountantlaw_subheaderfeatures_box4_field2', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Personal injury cases', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_subheaderfeatures_box4_field2', array(
		    'label'    => __( 'Subheader Feat. - Box 4 - Field 2:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_subheaderfeatures_box4_field2',
			'priority' => '13'
		) );

		// Testimonials - Title
		$wp_customize->add_setting( 'accountantlaw_testimonials_title', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Happy clients', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_testimonials_title', array(
		    'label'    => __( 'Testimonials - Title:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_title',
			'priority' => '14'
		) );

		// Testimonials - Subtitle
		$wp_customize->add_setting( 'accountantlaw_testimonials_subtitle', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_testimonials_subtitle', array(
		    'label'    => __( 'Testimonials - Subtitle:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_subtitle',
			'priority' => '15'
		) );

		// Testimonials - Box 1 - Image
		$wp_customize->add_setting( 'accountantlaw_testimonials_box1_image', array('default' => get_stylesheet_directory_uri() . '/images/testimonial-image.png','sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'accountantlaw_testimonials_box1_image', array(
		    'label'    => __( 'Testimonials - Box 1 - Image:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box1_image',
		    'priority' => '16',
		) ) );

		// Testimonials - Box 1 - Name
		$wp_customize->add_setting( 'accountantlaw_testimonials_box1_name', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'John Doe', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_testimonials_box1_name', array(
		    'label'    => __( 'Testimonials - Box 1 - Name:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box1_name',
			'priority' => '17'
		) );

		// Testimonials - Box 1 - Entry
		$wp_customize->add_setting( 'accountantlaw_testimonials_box1_entry', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_testimonials_box1_entry', array(
		            'label' 	=> __( 'Testimonials - Box 1 - Entry:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_testimonials_box1_entry',
		            'priority' 	=> '18'
		        )
		    )
		);

		// Testimonials - Box 2 - Image
		$wp_customize->add_setting( 'accountantlaw_testimonials_box2_image', array('default' => get_stylesheet_directory_uri() . '/images/testimonial-image.png','sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'accountantlaw_testimonials_box2_image', array(
		    'label'    => __( 'Testimonials - Box 2 - Image:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box2_image',
		    'priority' => '19',
		) ) );

		// Testimonials - Box 2 - Name
		$wp_customize->add_setting( 'accountantlaw_testimonials_box2_name', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'John Doe', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_testimonials_box2_name', array(
		    'label'    => __( 'Testimonials - Box 2 - Name:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box2_name',
			'priority' => '20'
		) );

		// Testimonials - Box 2 - Entry
		$wp_customize->add_setting( 'accountantlaw_testimonials_box2_entry', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_testimonials_box2_entry', array(
		            'label' 	=> __( 'Testimonials - Box 2 - Entry:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_testimonials_box2_entry',
		            'priority' 	=> '21'
		        )
		    )
		);

		// Testimonials - Box 3 - Image
		$wp_customize->add_setting( 'accountantlaw_testimonials_box3_image', array('default' => get_stylesheet_directory_uri() . '/images/testimonial-image.png','sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'accountantlaw_testimonials_box3_image', array(
		    'label'    => __( 'Testimonials - Box 3 - Image:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box3_image',
		    'priority' => '22',
		) ) );

		// Testimonials - Box 3 - Name
		$wp_customize->add_setting( 'accountantlaw_testimonials_box3_name', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'John Doe', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_testimonials_box3_name', array(
		    'label'    => __( 'Testimonials - Box 3 - Name:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_testimonials_box3_name',
			'priority' => '23'
		) );

		// Testimonials - Box 3 - Entry
		$wp_customize->add_setting( 'accountantlaw_testimonials_box3_entry', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_testimonials_box3_entry', array(
		            'label' 	=> __( 'Testimonials - Box 3 - Entry:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_testimonials_box3_entry',
		            'priority' 	=> '24'
		        )
		    )
		);

		// About Us - Title
		$wp_customize->add_setting( 'accountantlaw_aboutus_title', array('sanitize_callback' => 'lawyeria_lite_sanitize_text', 'default' => __( 'Who we are?', 'accountantlaw' )));
		$wp_customize->add_control( 'accountantlaw_aboutus_title', array(
		    'label'    => __( 'About Us - Title:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_aboutus_title',
			'priority' => '25'
		) );

		// About Us - Description
		$wp_customize->add_setting( 'accountantlaw_aboutus_description', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'That clients\' success determines our own. So we ensure both by clients\' success determines our collaborating with our clients to achieve their goals.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_aboutus_description', array(
		            'label' 	=> __( 'About Us - Description:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_aboutus_description',
		            'priority' 	=> '26'
		        )
		    )
		);

		// About Us - Left Entry
		$wp_customize->add_setting( 'accountantlaw_aboutus_leftentry', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_aboutus_leftentry', array(
		            'label' 	=> __( 'About Us - Left Entry:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_aboutus_leftentry',
		            'priority' 	=> '27'
		        )
		    )
		);

		// About Us - Right Entry
		$wp_customize->add_setting( 'accountantlaw_aboutus_rightentry', array('sanitize_callback' => 'lawyeria_lite_sanitize_text','default' => __( 'Apart and limply monstrous far much added you oyster bawled lost in hey due so armadillo tpangolin sexual aboard much alas dragonfly be more some fallacious and barbarous a less much more sat before fishily thus somberly or restful flexed best wherever squinted drew much oh sloth as some when scornfully cut involuntarily at audible goodness Apart and limply omberly or best estful flexed wherever squinted drew much oh sloth as some when scornfully.', 'accountantlaw' )));
		$wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'accountantlaw_aboutus_rightentry', array(
		            'label' 	=> __( 'About Us - Right Entry:', 'accountantlaw' ),
		            'section' 	=> 'lawyeria_lite_frontpage_section',
		            'settings' 	=> 'accountantlaw_aboutus_rightentry',
		            'priority' 	=> '28'
		        )
		    )
		);

		// About Us - Image
		$wp_customize->add_setting( 'accountantlaw_aboutus_image', array('default' => get_stylesheet_directory_uri() . '/images/about-us-image.jpg','sanitize_callback' => 'esc_url_raw'));
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'accountantlaw_aboutus_image', array(
		    'label'    => __( 'About Us - Image:', 'accountantlaw' ),
		    'section'  => 'lawyeria_lite_frontpage_section',
		    'settings' => 'accountantlaw_aboutus_image',
		    'priority' => '29',
		) ) );
	}
}
?>