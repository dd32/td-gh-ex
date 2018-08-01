<?php
/**
 * Blog Fields
 *
 * @since 1.0.0
 * @return array
 */
add_filter( 'adbooster_customize_fields', 'adbooster_blog_fields', 10);

function adbooster_blog_fields( $fields ) {

	$custom_fields = array(
			
			array(
				'settings'          => 'blog_layout',
				'label'             => __('Blog Layout', 'adbooster'),
				'section'           => 'adbooster_blog_layout_section',
				'type'              => 'radio-image',
				'default'           => 'right',
				'priority'          => 1,
				'choices'     => array(
					'none'   => get_template_directory_uri() . '/assets/img/category-no-sidebar.svg',
					'left' => get_template_directory_uri() . '/assets/img/category-left-sidebar.svg',
					'right'  => get_template_directory_uri() . '/assets/img/category-right-sidebar.svg',
				),
				
			),
			array(
				'settings'          => 'blog_layout_thumbnail_pos',
				'label'             => __('Thumbnail Position', 'adbooster'),
				'section'           => 'adbooster_blog_layout_section',
				'type'              => 'radio-buttonset',
				'default'           => 'left',
				'priority'          => 2,
				'choices'     => array(
					'left'				=> __('Left', 'adbooster'),
					'top'				=> __('Top', 'adbooster'),
					'right'				=> __('Right', 'adbooster')
				),
				
			),

			// adbooster_blog_post_section
			array(
				'settings'          => 'blog_post_show_excerpt',
				'label'             => __('Show Excerpt', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 3,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_post_excerpt_length',
				'label'             => __('Excerpt Length', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'slider',
				'default'           => 20,
				'priority'          => 4,
				'choices'     => array(
					'min'  => '10',
					'max'  => '80',
					'step' => '1',
				),
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => true,
					)
				)
				
			),

			array(
				'settings'          => 'blog_post_show_excerpt_more',
				'label'             => __('Excerpt More String', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'text',
				'default'           => '[...]',
				'priority'          => 5,
				
				'active_callback' => array(
					array(
						'setting'  => 'blog_post_show_excerpt',
						'operator' => '==',
						'value'    => true,
					)
				)
				
			),

			

			array(
				'settings'          => 'blog_post_show_readmore',
				'label'             => __('Show Read More', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 8,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
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
				'label'             => __('Read More Label', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'text',
				'default'           => __('View Detail', 'adbooster'),
				'priority'          => 9,
				
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
				'label'             => __('Show Post Thumbnail', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 10,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),

			// Post meta data

			array(
				'settings'          => 'blog_posts_metadata',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Shop/Hide Post Meta Data', 'adbooster') ),
				'description'		=> __( 'Check them to show post meta data.', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'multicheck',
				'default'           => array('date', 'category', 'tag', 'author'),
				'priority'          => 11,
				'choices'     		=> array(
					'date'					=> esc_attr__( 'Date', 'adbooster' ),
					'category'				=> esc_attr__( 'Category', 'adbooster' ),
					'tag'					=> esc_attr__( 'Tag', 'adbooster' ),
					'author'				=> esc_attr__( 'Author', 'adbooster' ),
					'comment'				=> esc_attr__( 'Comment', 'adbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_posts_modified_date',
				'label'             => __('Show Modified Date', 'adbooster'),
				'section'           => 'adbooster_blog_post_section',
				'type'              => 'switch',
				'default'           => 'off',
				'priority'          => 12,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),

			array(
				'type'     => 'text',
				'settings' => 'blog_posts_date_prefix',
				'label'    => __( 'Date Prefix', 'adbooster' ),
				'section'  => 'adbooster_blog_post_section',
				'description'  => esc_attr__( 'Prefix before date archive. It will show for all archive and single post.', 'adbooster' ),
				'priority' => 13,
			),

			
			/**
			 * adbooster_blog_single_post_section
			 */
			// Post thumbnail
			array(
				'settings'          => 'blog_single_post_show_thumbnail',
				'label'             => __('Show Post Thumbnail', 'adbooster'),
				'section'           => 'adbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 1,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),
			// Post navigation
			array(
				'settings'          => 'blog_single_post_show_nav',
				'label'             => __('Show Post Navigation', 'adbooster'),
				'section'           => 'adbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 1,
				'priority'          => 2,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),

			// Post meta data

			array(
				'settings'          => 'blog_single_post_metadata',
				'label'             => sprintf('<h3 class="azb-customize-title">%s</h3>', __('Shop/Hide Post Meta Data', 'adbooster') ),
				'description'		=> __( 'Check them to show post meta data.', 'adbooster'),
				'section'           => 'adbooster_blog_single_post_section',
				'type'              => 'multicheck',
				'default'           => array('date', 'category', 'tag', 'author'),
				'priority'          => 3,
				'choices'     		=> array(
					'date'					=> esc_attr__( 'Date', 'adbooster' ),
					'category'				=> esc_attr__( 'Category', 'adbooster' ),
					'tag'					=> esc_attr__( 'Tag', 'adbooster' ),
					'author'				=> esc_attr__( 'Author', 'adbooster' ),
				),
				
			),

			array(
				'settings'          => 'blog_single_post_modified_date',
				'label'             => __('Show Modified Date', 'adbooster'),
				'section'           => 'adbooster_blog_single_post_section',
				'type'              => 'switch',
				'default'           => 'off',
				'priority'          => 4,
				'choices'     		=> array(
					'on'				=> esc_attr__( 'On', 'adbooster' ),
					'off'				=> esc_attr__( 'Off', 'adbooster' ),
				),
				
			),

			// adbooster_blog_footer_widget_section
			array(
				'settings'          => 'blog_footer_widget_cols',
				'label'             => __('Footer Widget Columns', 'adbooster'),
				'section'           => 'adbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '4',
				'priority'          => 10,
				'choices'     => array(
					'0'				=> __('0', 'adbooster'),
					'1'				=> __('1', 'adbooster'),
					'2'				=> __('2', 'adbooster'),
					'3'				=> __('3', 'adbooster'),
					'4'				=> __('4', 'adbooster')
				),
				
			),
			array(
				'settings'          => 'blog_footer_widget_rows',
				'label'             => __('Footer Widget Rows', 'adbooster'),
				'section'           => 'adbooster_blog_footer_widget_section',
				'type'              => 'radio-buttonset',
				'default'           => '2',
				'priority'          => 11,
				'choices'     => array(
					'1'				=> __('1', 'adbooster'),
					'2'				=> __('2', 'adbooster'),
					'3'				=> __('3', 'adbooster'),
					'4'				=> __('4', 'adbooster')
				),
				
			),
	);

	return wp_parse_args( $custom_fields, $fields );
}

add_filter( 'adbooster_customize_fields', 'adbooster_homepage_fields', 10);

/**
 * Homepage Fileds
 *
 * @since 1.2.0
 * @param  array $fields
 * @return array
 */
function adbooster_homepage_fields( $fields ) {

	$custom_fields = array(

		array(
				'settings'          => 'homepage_show_page_content_setting',
				'label'             => __('Show Page Content', 'adbooster'),
				'section'           => 'adbooster_homepage_general_section',
				'type'              => 'switch',
				'description'		=> __( 'Switch ON/OFF to show default page content on homepage.', 'adbooster' ),
				'default'           => '1',
				'priority'          => 5,
				'choices'     => array(
					'on'				=> esc_attr__('ON', 'adbooster'),
					'off'				=> esc_attr__('OFF', 'adbooster'),
				),
				
			),
			/**
			 * Featured Posts
			 */
			array(
				'settings'          => 'homepage_featured_posts_cat_setting',
				'label'             => __('Featured Posts', 'adbooster'),
				'section'           => 'adbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'description'		=> __( 'Choose category to show it\'s post. Keep [All categories] to show from all categoies.', 'adbooster' ),
				'priority'          => 10,
				'choices'		=> adbooster_category_list()
				
			),
			array(
				'type'			=> 'number',
				'settings'     => 'homepage_featured_posts_num_setting',
				'default'		=> 5,
				'priority'    => 20,
				'label'			=> esc_attr__( 'Number of Posts', 'adbooster' ),
				'section'     => 'adbooster_homepage_featured_posts_section',
			),
			array(
				'type'			=> 'checkbox',
				'settings'     => 'homepage_fp_ignore_sticky_posts_setting',
				'default'		=> true,
				'priority'    => 30,
				'label'			=> esc_attr__( 'Ignore Sticky Posts', 'adbooster' ),
				'section'     => 'adbooster_homepage_featured_posts_section',
			),
			array(
				'settings'          => 'homepage_featured_posts_order_setting',
				'label'             => __('Order', 'adbooster'),
				'section'           => 'adbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'priority'          => 40,
				'choices'		=> array('DESC' => __('Descending', 'adbooster'), 'ASC' => __( 'Ascending', 'adbooster' ) )
				
			),
			array(
				'settings'          => 'homepage_featured_posts_orderby_setting',
				'label'             => __('Order By', 'adbooster'),
				'section'           => 'adbooster_homepage_featured_posts_section',
				'type'              => 'select',
				'priority'          => 40,
				'default'			=> 'date',
				'choices'			=> array(

							'none' 		=> __('No order', 'adbooster'),
							'ID'		=> __('ID', 'adbooster'),
							'author'		=> __('Author', 'adbooster'),
							'date'		=> __('Date', 'adbooster'),
							'modified'		=> __('Modified', 'adbooster'),
							'parent'		=> __('Parent', 'adbooster'),
							'rand'		=> __('Random', 'adbooster'),
							'comment_count'		=> __('Comment Count', 'adbooster'),
					)
				
			),

		/**
		 * Custom Content
		 */
		array(
			'type'			=> 'select',
			'settings'     => 'homepage_content_col_setting',
			'default'		=> 2,
			'priority'    => 5,
			'label'			=> esc_attr__( 'Number of Columns', 'adbooster' ),
			'choices'		=> array( 1 => 1, 2 => 2, 3 => 3, 4 => 4),
			'section'     => 'adbooster_homepage_content_section',
			),
		array(
			'type'        => 'repeater',
			'label'       => esc_attr__( 'Homepage Content', 'adbooster' ),
			'section'     => 'adbooster_homepage_content_section',
			'priority'    => 10,
			'row_label' => array(
				'type'  => 'field',
				'value' => esc_attr__('Custom Content', 'adbooster' ),
				'field' => 'cat',
			),
			'button_label' => esc_attr__('Add New', 'adbooster' ),
			'settings'     => 'homepage_content_setting',
			'fields' => adbooster_homepage_content_fields()
		)
	);

	return wp_parse_args( $custom_fields, $fields );
}

function adbooster_homepage_content_fields() {

	return array(
			'cat' 	=> array(
					'type'        	=> 'select',
					'label'       	=> esc_attr__( 'Category', 'adbooster' ),
					'description' 	=> esc_attr__( 'Choose any category', 'adbooster' ),
					'choices'		=> adbooster_category_list()
			),
			'cat_img' => array(
					'type'        => 'image',
					'label'       => esc_attr__( 'Image Category', 'adbooster' ),
					'description' => esc_attr__( 'Category Image Thumbnail', 'adbooster' ),
					'default'     => '',
			),
			'post_per_page'	=> array(
				'type'			=> 'number',
				'label'			=> esc_attr__( 'Number of Posts', 'adbooster' ),
				'default'		=> 5
			),
			'render_style'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Render Style', 'adbooster' ),
				'default'		=> 'grid',
				'choices'		=> array( 'list' => esc_attr__( 'List', 'adbooster' ), 'grid' => esc_attr__( 'Grid', 'adbooster' ))
			),
			'num_cols'	=> array(
				'type'			=> 'select',
				'description'	=> esc_attr__( 'Choose column for Grid style.', 'adbooster' ),
				'default'		=> 'col-2',
				'label'			=> esc_attr__( 'Number of Columns', 'adbooster' ),
				'choices'		=> array( 'col-1' => 1, 'col-2' => 2, 'col-3' => 3, 'col-4' => 4)
			),
			'image_section' => array(
				'type'			=> 'custom',
				'label'			=> '<h2>' . esc_attr__( 'Post Thumbnail', 'adbooster') . '</h2>',
			),
			'image_show' => array(
				'type'			=> 'checkbox',
				'label'			=> esc_attr__( 'Show Thumbnail', 'adbooster' ),
				'default'		=> true
			),
			'image_alignment'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Image Alignment', 'adbooster' ),
				'default'		=> 'center',
				'choices'		=> array(
						'left'		=> esc_attr__('Left', 'adbooster'),
						'center'	=> esc_attr__('Center', 'adbooster'),
						'right'		=> esc_attr__('Right', 'adbooster'),
				)
			),
			'image_pos'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Image Postion', 'adbooster' ),
				'default'		=> 'after_title',
				'choices'		=> array(
						'befor_title'		=> esc_attr__('Before Title', 'adbooster'),
						'after_title'	=> esc_attr__('After Title', 'adbooster'),

				)
			),
			'post_content_section' => array(
				'type'			=> 'custom',
				'label'			=> '<h2>' . esc_attr__( 'Post Content', 'adbooster') . '</h2>',
			),
			'post_content_type'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Content Type', 'adbooster' ),
				'default'		=> 'excerpt',
				'priority'		=> 20,
				'choices'		=> array(
						'excerpt'		=> esc_attr__('Excerpt', 'adbooster'),
						'none'		=> esc_attr__('None', 'adbooster'),
				)
			),
			'post_excerpt_length'	=> array(
				'type'			=> 'number',
				'priority'		=> 2,
				'label'			=> esc_attr__( 'Excerpt Length (words)', 'adbooster' ),
				'default'		=> 30
			),
			'post_content_title_el'	=> array(
				'type'			=> 'select',
				'label'			=> esc_attr__( 'Title Element', 'adbooster' ),
				'default'		=> 'h2',
				'choices'		=> array(
						'p'		=> 'p',
						'span'	=> 'span',
						'h1'	=> 'h1',
						'h2'	=> 'h2',
						'h3'	=> 'h3',
						'h4'	=> 'h4',
						'h5'	=> 'h5',
				)
			),
		);
}