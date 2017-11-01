<?php
add_filter( 'azonbooster_customize_fields', 'azonbooster_blog_fields', 10);

function azonbooster_blog_fields( $fields ) {

	$custom_fields = array(
			/*array(
				'settings' 			=> 'blog_layout_title',
				'label'    			=> '',
				'section'  			=> 'azonbooster_blog_layout_section',
				'type'     			=> 'custom',
				'default'			=> sprintf('<h2 class="azonbooster-customizer-title">%s</h2>', __( 'Blog Sidebar', 'azonbooster' ) ),
				'priority' 			=> 5,

			),*/
			array(
				'settings'          => 'blog_layout',
				'label'             => __('Blog Layout', 'azonbooster'),
				'section'           => 'azonbooster_blog_layout_section',
				'type'              => 'radio-image',
				'default'           => 'right',
				'priority'          => 6,
				'choices'     => array(
					'none'   => get_template_directory_uri() . '/assets/img/category-no-sidebar.svg',
					'left' => get_template_directory_uri() . '/assets/img/category-left-sidebar.svg',
					'right'  => get_template_directory_uri() . '/assets/img/category-right-sidebar.svg',
				),
				
			),
			array(
				'settings'          => 'blog_layout_thumbnail_pos',
				'label'             => __('Thumbnail Position', 'azonbooster'),
				'section'           => 'azonbooster_blog_layout_section',
				'type'              => 'radio-buttonset',
				'default'           => 'left',
				'priority'          => 8,
				'choices'     => array(
					'left'				=> __('Left', 'azonbooster'),
					'top'				=> __('Top', 'azonbooster'),
					'right'				=> __('Right', 'azonbooster')
				),
				
			),

			// azonbooster_blog_post_section
			array(
				'settings'          => 'blog_post_show_excerpt',
				'label'             => __('Show Excerpt', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 9,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_post_excerpt_length',
				'label'             => __('Excerpt Length', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'slider',
				'default'           => 20,
				'priority'          => 10,
				'choices'     => array(
					'min'  => '10',
					'max'  => '80',
					'step' => '1',
				),
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
			),
			array(
				'settings'          => 'blog_post_show_excerpt_more',
				'label'             => __('Excerpt More String', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'text',
				'default'           => '[...]',
				'priority'          => 11,
				
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
			),

			array(
				'settings'          => 'blog_post_show_readmore',
				'label'             => __('Show Read More', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 12,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),

				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
				
			),

			array(
				'settings'          => 'blog_post_show_readmore_label',
				'label'             => __('Read More Label', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'text',
				'default'           => __('View Detail', 'azonbooster'),
				'priority'          => 13,
				
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_readmore',
						'operator' => '==',
						'value'    => 'on',
					)
				)
				
			),


			array(
				'settings'          => 'blog_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'azonbooster'),
				'section'           => 'azonbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 14,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			
			// azonbooster_blog_single_post_section
			array(
				'settings'          => 'blog_single_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 12,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_single_post_show_nav',
				'label'             => __('Show Post Navigation', 'azonbooster'),
				'section'           => 'azonbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 13,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'azonbooster' ),
					'off'				=> esc_attr__( 'Off', 'azonbooster' ),
				),
				
			),

			// azonbooster_blog_footer_widget_section
			array(
				'settings'          => 'blog_footer_widget_cols',
				'label'             => __('Footer Widget Columns', 'azonbooster'),
				'section'           => 'azonbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '4',
				'priority'          => 10,
				'choices'     => array(
					'0'				=> __('0', 'azonbooster'),
					'1'				=> __('1', 'azonbooster'),
					'2'				=> __('2', 'azonbooster'),
					'3'				=> __('3', 'azonbooster'),
					'4'				=> __('4', 'azonbooster')
				),
				
			),
			array(
				'settings'          => 'blog_footer_widget_rows',
				'label'             => __('Footer Widget Rows', 'azonbooster'),
				'section'           => 'azonbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '2',
				'priority'          => 11,
				'choices'     => array(
					'1'				=> __('1', 'azonbooster'),
					'2'				=> __('2', 'azonbooster'),
					'3'				=> __('3', 'azonbooster'),
					'4'				=> __('4', 'azonbooster')
				),
				
			),
	);

	return wp_parse_args( $custom_fields, $fields );
}