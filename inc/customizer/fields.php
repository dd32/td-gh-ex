<?php
Kirki::add_config( 'best_blog', array(
	'capability'  => 'edit_theme_options',
	'option_type' => 'theme_mod',
) );

$socialarray = array(
		'' => esc_attr__('Please Select', 'best-blog'),
		'facebook' =>esc_attr__('Facebook', 'best-blog'),
		'dribbble' => esc_attr__('Dribbble', 'best-blog'),
		'twitter' => esc_attr__('Twitter', 'best-blog'),
		'google' => esc_attr__('google plus', 'best-blog'),
		'skype' => esc_attr__('skype', 'best-blog'),
		'youtube' => esc_attr__('Youtube', 'best-blog'),
		'flickr' => esc_attr__('Flickr', 'best-blog'),
		'pinterest' => esc_attr__('Pinterest', 'best-blog'),
		'vk' => esc_attr__('vk', 'best-blog'),
		'rss' => esc_attr__('RSS', 'best-blog'),
		'tumblr' => esc_attr__('Tumblr', 'best-blog'),
		'instagram' => esc_attr__('Instagram', 'best-blog'),
		'xing' => esc_attr__('Xing', 'best-blog')
);
//**** newspapers upsell pro */
Kirki::add_field( 'best_blog', array(
	'type'        => 'custom',
	'settings'    => 'best_blog_view_link_pro',
	'section'     => 'bestblog_upgradepro_options',
	'default'     => '<a class="button-error  button-upsell" target="_blank" href="' . esc_url( 'https://www.imonthemes.com/best-blog-wordpress-theme/#panel-3392-13-0-1' ) . '">'.esc_html__( 'Upgrade To Pro', 'best-blog' ).'</a>',
	'priority'    => 10,
) );


Kirki::add_field( 'best_blog', array(
	'type'        => 'custom',
	'settings'    => 'best_blog_view_link2',
	'section'     => 'bestblog_upgradepro_options',
	'default'     => '<a class="button-blue  button-upsell" target="_blank" href="' . esc_url( 'https://wordpress.org/support/theme/best-blog' ) . '">'.esc_html__( 'Support', 'best-blog' ).'</a>',
	'priority'    => 30,
) );


Kirki::add_field( 'best_blog', array(
	'type'        => 'custom',
	'settings'    => 'best_blog_view_link3',
	'section'     => 'bestblog_upgradepro_options',
	'default'     => '<a class="button-warning  button-upsell" target="_blank" href="' . esc_url( 'http://imonthemes.com/bestblog-demo/documentation-usage/' ) . '">'.esc_html__( 'Read the documentation', 'best-blog' ).'</a>',
	'priority'    => 50,
) );


Kirki::add_field( 'best_blog', array(
	'type'        => 'color-palette',
	'settings'    => 'topbg_gradient',
	'label'       => esc_attr__( 'Select gradient ', 'best-blog' ),
	'section'     => 'bestblog_appearance_options',
	'default'     => 'gradient_2',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'gradient' ),
		'size'   => 50,
    'style'  => 'round',
	),
) );

Kirki::add_field( 'best_blog', array(
	'type'        => 'select',
	'settings'    => 'site_layout',
	'label'       => __( 'select site layout', 'best-blog' ),
	'section'     => 'bestblog_appearance_options',
	'default'     => 'fluid main-raised',
	'priority'    => 10,
	'transport' => 'postMessage',
	'choices'     => array(
		'fluid main-raised' => esc_attr__( 'Material Layout', 'best-blog' ),
		'box_wbb z-depth-2' => esc_attr__( 'Box Layout', 'best-blog' ),
		'full' => esc_attr__( 'Full Layout', 'best-blog' ),
	),
) );

Kirki::add_field('best_blog', array(
    'type' => 'color',
    'settings' => 'bestblog_flavor_color',
    'label' => esc_attr__('Primary Color', 'best-blog'),
    'section' => 'bestblog_appearance_options',
    'default' => '#ffc2ca',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#sub_banner .breadcrumbs a,.post-wrap-layout-2 .card .category.text-info a,.button.hollow.secondary,.single-header-warp .post-meta a,.comment-title h2,h2.comment-reply-title,.logged-in-as a,.author-title a,.woocommerce ul.products li.product a, .woocommerce ul.products li.product .woocommerce-loop-category__title, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product h3, .woocommerce ul.products li.product .price, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.woocommerce .star-rating span::before,.card .card-footer .right .button.add_to_cart_button,.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a,.woocommerce-product-rating a',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => '.sidebar-inner .widget_wrap ul li,.comment-list .comment-reply-link,.navigation .nav-links .current,.single-cats.button-group .button,.bestblog-author-bttom .button,.comment-form .form-submit input#submit, a.box-comment-btn, .comment-form .form-submit input[type="submit"],.scroll_to_top.floating-action.button,.button.secondary,.block-content-none .search-submit,h1.entry-title::after,.woocommerce div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button',
						'property' => 'background',
            'units' => ''
        ),
				array(
						'element' => '.multilevel-offcanvas.off-canvas.is-transition-overlap.is-open,.button.hollow.secondary,.sidebar-inner .widget_wrap ul li,.sidebar-inner .widget_wrap,.single-header-warp,.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a',
						'property' => 'border-color',
						'units' => ''
				),
    )
));

Kirki::add_field('best_blog', array(
    'type' => 'color',
    'settings' => 'bestblog_hover_color',
    'label' => esc_attr__('Hover Color', 'best-blog'),
    'section' => 'bestblog_appearance_options',
    'default' => '#767676',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
		'output' => array(
        array(
            'element' => '.card .card-footer .right .button.add_to_cart_button:hover,.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li a:hover',
            'property' => 'color',
            'units' => ''
        ),
        array(
            'element' => '.block-content-none .search-submit:hover,.main-menu-wrap .is-dropdown-submenu-parent .submenu li a:hover,.button.secondary:not(.hollow):hover,.woocommerce div.product form.cart .button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover',
						'property' => 'background',
            'units' => ''
        ),
				array(
						'element' => '.button.hollow.secondary:hover,.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li.active a:hover,.woocommerce div.product .woocommerce-tabs ul.tabs.wc-tabs li a:hover',
						'property' => 'border-color',
						'units' => ''
				),
    )

));
/*=============================================>>>>>
= Header Options =
===============================================>>>>>*/
Kirki::add_field('best_blog', array(
	'type'        		=> 'custom',
	'settings'    		=> 'main_bgheader_style_notice',
	'label'       		=> esc_html__( 'Notice', 'best-blog' ),
	'section'     		=> 'header_image',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'For show Wordpress core header image you should select Header image background style (Header Image),theme option => Header Options => Header Background Style => Header image
', 'best-blog' ) . '</div>',
	'priority'    		=> 1,
	'active_callback' => array(
			array(
					'setting' => 'main_bgheader_style',
					'operator' => '!==',
					'value' => 'img_header'
			)
	),
));

Kirki::add_field('best_blog', array(
    'type' => 'select',
    'settings' => 'main_bgheader_style',
    'label' => esc_attr__('Header Background Style', 'best-blog'),
    'section' => 'bestblog_header_options',
    'default' => 'gradient_header',
    'priority' => 10,
    'choices' => array(
        'img_header' => esc_attr__(' Header Image', 'best-blog'),
        'gradient_header' => esc_attr__(' Header gradient Color', 'best-blog'),
				'solid_bgheader' => esc_attr__(' Header Solid Color', 'best-blog')
    ),
));
Kirki::add_field( 'best_blog', array(
	'type'        => 'color-palette',
	'settings'    => 'main_header_gradient',
	'label'       => esc_attr__( 'Select gradient ', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => 'gradient_2',
	'choices'     => array(
		'colors' => Kirki_Helper::get_material_design_colors( 'gradient' ),
		'size'   => 50,
    'style'  => 'round',
	),
  'active_callback' => array(
      array(
          'setting' => 'main_bgheader_style',
          'operator' => '==',
          'value' => 'gradient_header'
      )
  ),
) );
// Add Fields Solid Color.
Kirki::add_field( 'best_blog', array(
	'type'        => 'color',
	'settings'    => 'header_solidbg_color',
	'label'       => __( 'background color', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => '#fff',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header-wrap .banner-warp,.mobile-header',
					'property' => 'background',
					'units' => ''
			)
	),
	'active_callback' => array(
			array(
					'setting' => 'main_bgheader_style',
					'operator' => '==',
					'value' => 'solid_bgheader'
			)
	),
) );

Kirki::add_field( 'best_blog', array(
	'type'        => 'color',
	'settings'    => 'header_titledic_text',
	'label'       => __( 'Title And description color', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.header-wrap .banner-warp .site-branding p,.site-branding h1 a',
					'property' => 'color',
					'units' => ''
			)
	),

) );



Kirki::add_field('best_blog', array(
    'type' => 'custom',
    'settings' => 'imonthemes_seperator_menustyle',
    'section' => 'bestblog_header_options',
    'default' => '<h2 class="imonthemes-kirki-seperator">' . esc_html__('Menu Options', 'best-blog') . '</h2>'
));

Kirki::add_field( 'best_blog', array(
	'type'        => 'switch',
	'settings'    => 'sticky_menu_onof',
	'label'       => esc_attr__( 'Enable/Disable sticky Menu', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'on'  => esc_attr__( 'Enable', 'best-blog' ),
		'off' => esc_attr__( 'Disable', 'best-blog' ),
	),
) );

Kirki::add_field( 'best_blog', array(
	'type'        => 'color',
	'settings'    => 'menu_text_color',
	'label'       => esc_attr__( 'Menu Text color', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => '#0a0a0a',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '.menu-outer .menu-icon::after,.main-menu-wrap .dropdown.menu a,.navbar-search .navbar-search-button .fa,.offcanvas-trigger,#sub_banner .top-bar .subheader,#sub_banner .top-bar .breadcrumbs li ',
					'property' => 'color',
					'units' => ''
			),
			array(
					'element' => '.is-dropdown-submenu .is-dropdown-submenu-parent.opens-right > a::after',
					'property' => 'border-left-color',
					'units' => ''
			)
	),

) );

Kirki::add_field( 'best_blog', array(
	'type'        => 'color',
	'settings'    => 'menu_bg_color',
	'label'       => __( 'Menu background color', 'best-blog' ),
	'section'     => 'bestblog_header_options',
	'default'     => '#fcfcfc',
	'transport' => 'auto',
	'choices'     => array(
		'alpha' => true,
	),
	'output' => array(
			array(
					'element' => '#sub_banner_page,.menu-outer,#sub_banner,.main-menu-wrap .is-dropdown-submenu-parent .submenu li a',
					'property' => 'background-color',
					'units' => ''
			)
	),

) );

Kirki::add_field('best_blog', array(
    'type' => 'repeater',
    'label' => esc_attr__('Add social icon', 'best-blog'),
    'section' => 'bestblog_header_options',
    'priority' => 10,
    'row_label' => array(
        'type' => 'field',
        'value' => esc_attr__('Social', 'best-blog'),
        'field' => 'social_icon'
    ),
    'settings' => 'social_icons_top',
    'fields' => array(
        'social_icon' => array(
            'type' => 'select',
            'label' => esc_attr__('Icon', 'best-blog'),
            'default' => '',
            'choices' =>$socialarray,
        ),
        'social_url' => array(
            'type' => 'url',
            'label' => esc_attr__('Link URL', 'best-blog'),
            'default' => ''
        ),
    )
));
/*=============================================>>>>>
= Footer Options =
===============================================>>>>>*/
Kirki::add_field('best_blog', array(
    'type' => 'color',
    'settings' => 'best_widgets_bgcolor',
    'label' => esc_attr__('Widgets background color', 'best-blog'),
    'section' => 'bestblog_copyright_settings',
    'default' => '#fff',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .top-footer-wrap',
            'property' => 'background-color',
            'units' => ''
        )
    )

));



/*----------- Footer COPYRIGHT options -----------*/

Kirki::add_field('best_blog', array(
    'type' => 'color',
    'settings' => 'best_copyright_bgcolor',
    'label' => esc_attr__('Copyright background color', 'best-blog'),
    'section' => 'bestblog_copyright_settings',
    'default' => '#242424',
    'transport' => 'auto',
    'priority' => 10,
    'choices' => array(
        'alpha' => true
    ),
    'output' => array(
        array(
            'element' => '#footer .footer-copyright-wrap',
            'property' => 'background-color',
            'units' => ''
        )
    )

));

Kirki::add_field( 'best_blog', array(
	'type'        => 'typography',
	'settings'    => 'best_copyright_typography',
	'label'       => esc_attr__( 'Copyright typography', 'best-blog' ),
	'section'     => 'bestblog_copyright_settings',
  'transport' => 'auto',
	'default'     => array(
		'font-family'    => 'Roboto',
		'variant'        => '400',
		'font-size'      => '16px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'subsets'        => array( 'latin-ext' ),
		'color'          => '#fff',
		'text-transform' => 'none',
	),
	'priority'    => 10,
  'output' => array(
      array(
          'element' => '.copy-text,#footer .footer-copyright-wrap,.footer-copyright-text p,.footer-copyright-wrap a,.footer-copyright-wrap li,.footer-copyright-wrap ul,.footer-copyright-text ol',
          'property' => 'color',
          'units' => ''
      ),
  ),
	'choices' => array(
			'fonts' => array(
				'google' => array( 'popularity', 20 ),
			),
		),
) );

Kirki::add_field('best_blog', array(
    'type' => 'editor',
    'settings' => 'bestblog_footertext',
    'label' => __('Copyright text', 'best-blog'),
    'section' => 'bestblog_copyright_settings',
    'priority' => 10,
		'transport' => 'postMessage',
		'partial_refresh' => array(
				'bestblog_footertext' => array(
						'selector' => '#footer-copyright',
						'render_callback' => function()
							{
								get_template_part('template-parts/footer/site-info');
							}
				),
		),
	));

/*=============================================>>>>>
= slider options =
===============================================>>>>>*/
Kirki::add_field('best_blog', array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice_homepagesettings',
	'label'       		=> esc_html__( 'Notice', 'best-blog' ),
	'section'     		=> 'static_front_page',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'For show Home page like demo . setup home page', 'best-blog' ) . '</div>',
	'priority'    		=> 1,
	'active_callback' 	=> 'bestblog_inactive_creative'
));
Kirki::add_field('best_blog', array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice_url',
	'label'       		=> esc_html__( 'Create a custom homepage.', 'best-blog' ),
	'section'     		=> 'static_front_page',
	'default'     		=> '<a href="'. esc_url( admin_url( 'themes.php?page=bestblog-welcome' ) ) .'" target="_blank">' . esc_html__('Learn How to create a custom homepage','best-blog') . '<a><br/><br/>',
	'priority'    		=> 1,
	'active_callback' 	=> 'bestblog_inactive_creative'
));
Kirki::add_field('best_blog', array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice',
	'label'       		=> esc_html__( 'Notice', 'best-blog' ),
	'section'     		=> 'bestblog_slider_settings',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider displays on Creative homepage only.', 'best-blog' ) . '</div>',
	'priority'    		=> 1,
	'active_callback' 	=> 'bestblog_inactive_creative'
));

Kirki::add_field('best_blog', array(
    'type' => 'switch',
    'settings' => 'bestblog_slider_enabel',
    'label' => esc_attr__('Enable/disabel Static image', 'best-blog'),
    'section' => 'slider_setup',
    'default' => '1',
    'priority' => 1,
    'choices' => array(
        'off' => esc_attr__('off', 'best-blog'),
        'on' => esc_attr__('on', 'best-blog')
    )
));


/* Slider */

Kirki::add_field( 'best_blog', array(
	'type'        => 'checkbox',
	'settings'    => 'sticky_checkbox_slider',
	'label'       => esc_attr__( 'Hide sticky Post', 'best-blog' ),
	'section'     => 'bestblog_slider_settings',
	'default'     => false,
) );
Kirki::add_field('best_blog', array(
	'type'        		=> 'custom',
	'settings'    		=> 'slider_notice_hight',
	'label'       		=> esc_html__( 'Notice', 'best-blog' ),
	'section'     		=> 'bestblog_slider_settings',
	'default'     		=> '<div style="padding: 8px; background-color: #e74c3c; color: #fff; border-radius: 3px;">' . esc_html__( 'Slider height should be 1440 x 600 px', 'best-blog' ) . '</div>',
	'priority'    		=> 1,
	));

Kirki::add_field('best_blog', array(
    'type' => 'select',
    'settings' => 'category_show_slider',
    'label' => esc_attr__('Select Category', 'best-blog'),
    'section' => 'bestblog_slider_settings',
    'priority' => 10,
    'multiple' => 999,
    'choices' =>Kirki_Helper::get_terms( array('taxonomy' => 'category') )

));



Kirki::add_field('best_blog', array(
    'type' => 'select',
    'settings' => 'slider_post_order_by',
    'label' => esc_attr__('Show post orderby', 'best-blog'),
    'section' => 'bestblog_slider_settings',
    'default' => 'date',
    'priority' => 10,
    'choices' => array(
        'none' => esc_attr__('None', 'best-blog'),
        'date' => esc_attr__('Date', 'best-blog'),
        'ID' => esc_attr__('ID', 'best-blog'),
        'author' => esc_attr__('Author', 'best-blog'),
        'title' => esc_attr__('Title', 'best-blog'),
        'rand' => esc_attr__('Random', 'best-blog')
    )
));



Kirki::add_field( 'best_blog', array(
	'type'        => 'color',
	'settings'    => 'slide_title_bgcolor',
	'label'       => __( 'Slider title background color', 'best-blog' ),
	'section'     => 'bestblog_slider_settings',
	'default'     => 'rgba(0, 0, 0, 0)',
  'transport'   => 'auto',
  'choices'     => array(
		'alpha' => true,
	),
  'output'      => array(
    array(
      'element' => '#slider .post-header-outer',
      'property' => 'background',
      'units'   => '',
    ),
  ),
) );


Kirki::add_field( 'best_blog', array(
	'type'        => 'slider',
	'settings'    => 'slider_titlefontsize_setting',
	'label'       => esc_attr__( 'Slider Title text size', 'best-blog' ),
	'section'     => 'bestblog_slider_settings',
	'default'     =>  2.866,
  'transport'   => 'auto',
	'choices'     => array(
		'min'  => '0',
		'max'  => '12',
		'step' => '.02',
	),
	'output'      => array(
		array(
			'element' => '#slider .post-header-outer .post-header .post-title a',
			'property' => 'font-size',
			'prefix'=>'calc( ',
			'units'   => 'vw',
			'suffix'=>' + 3.8661417323px)',
		),
	),
) );


Kirki::add_field( 'best_blog', array(
	'type'        => 'checkbox',
	'settings'    => 'onof_slider_cat',
	'label'       => esc_attr__( 'Show/Hide Slider Category', 'best-blog' ),
	'section'     => 'bestblog_slider_settings',
	'default'     => true,
  'output' => array(
	array(
		'element'       => '#slider .post-header-outer .slider-cat-info  ',
		'property'      => 'display',
		'value_pattern' => 'none',
		'exclude'       => array( true ),
	),
),
) );

/*=============================================>>>>>
= post layout options =
===============================================>>>>>*/

Kirki::add_field('best_blog', array(
    'type' => 'radio-image',
    'settings' => 'layout_page_gen',
    'label' => esc_html__('Post Layout', 'best-blog'),
    'section' => 'bestblog_postlayout_settings',
    'default' => 'content1',
    'priority' => 10,
    'choices' => array(
        'content1' => get_template_directory_uri() . '/images/list-layout-listing.svg',
        'content2' => get_template_directory_uri() . '/images/list-layout-grid.svg',
    )
));

Kirki::add_field('best_blog', array(
    'type' => 'radio-image',
    'settings' => 'sidbar_position_gen',
    'label' => esc_html__('Layout Sidebar', 'best-blog'),
    'section' => 'bestblog_postlayout_settings',
    'default' => 'right',
    'priority' => 10,
    'choices' => array(
        'full' => get_template_directory_uri() . '/images/fullwidth.svg',
        'left' => get_template_directory_uri() . '/images/left-sidebar.svg',
        'right' => get_template_directory_uri() . '/images/right-sidebar.svg',
    )
));
