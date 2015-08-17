<?php
/**
 * Customizer Options
 *
 * @package Theme-Vision
 * @subpackage Agama
 * @since Agama 1.0
 */
 
/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Agama v1.0.7
 *
 */
function agama_textarea_register($wp_customize){
	class Agama_Customize_Agama_upgrade extends WP_Customize_Control {
		public function render_content() { ?>
		<div class="theme-info"> 
			<a title="<?php esc_attr_e( 'Donate', 'agama' ); ?>" href="<?php echo esc_url( 'https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=BR55TPNQEK28L' ); ?>" target="_blank">
			<?php _e( 'Donate', 'agama' ); ?>
			</a>
			<a title="<?php esc_attr_e( 'Review Agama', 'agama' ); ?>" href="<?php echo esc_url( 'http://wordpress.org/support/view/theme-reviews/agama' ); ?>" target="_blank">
			<?php _e( 'Rate Agama', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://theme-vision.com/forums/' ); ?>" title="<?php esc_attr_e( 'Support Forum', 'agama' ); ?>" target="_blank">
			<?php _e( 'Support Forum', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://docs.theme-vision.com/Agama/' ); ?>" title="<?php esc_attr_e( 'Theme Documentation', 'agama' ); ?>" target="_blank">
			<?php _e( 'Theme Documentation', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://demo.theme-vision.com' ); ?>" title="<?php esc_attr_e( 'Agama PRO Demo', 'agama' ); ?>" target="_blank">
			<?php _e( 'Agama PRO Demo', 'agama' ); ?>
			</a>
			<a href="<?php echo esc_url( 'http://theme-vision.com/agama-pro/' ); ?>" title="<?php esc_attr_e( 'Agama PRO Buy', 'agama' ); ?>" target="_blank">
			<?php _e( 'Agama PRO Buy', 'agama' ); ?>
			</a>
		</div>
		<?php
		}
	}
}
add_action('customize_register', 'agama_textarea_register');
 
/**
 * Define Customizer Settings, Controls etc...
 *
 * @since Agama 1.0
 */
function agama_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
/******************** Agama Upgrade ******************************************/
	$wp_customize->add_section( 'agama_support_section', array(
		'title'			=> __('Agama Support', 'agama'),
		'description'	=> __('Hey! Buy us a cofee and we shall come with new features and updates. ','agama'),
		'priority'		=> 1,
	));
	$wp_customize->add_setting( 'agama_support', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));
	$wp_customize->add_control(
		new Agama_Customize_Agama_upgrade(
			$wp_customize,'agama_support', array(
				'label'		=> __('Agama Upgrade', 'agama'),
				'section'	=> 'agama_support_section',
				'settings'	=> 'agama_support',
			)
		)
	);
/******************** Agama Theme Options Panel ******************************************/
	$wp_customize->add_panel('agama_theme_options', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __('Agama Theme Options', 'agama')
	));
/******************** Agama Logo Settings ******************************************/
	$wp_customize->add_section('agama_logo_section', array(
		'title'		=> __( 'Logo', 'agama' ),
		'priority'  => 10,
		'panel'		=> 'agama_theme_options'
	)); // Agama Logo
	$wp_customize->add_setting('agama_logo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_logo', array(
				'label'		=> __( 'Upload Logo', 'agama' ),
				'section'	=> 'agama_logo_section',
				'settings'	=> 'agama_logo',
				'context'	=> '',
				'priority'	=> 1,
			)
		)
	);
/******************** Agama Header Settings ******************************************/
	$wp_customize->add_section('agama_header_section', array(
		'title'		=> __('Header', 'agama'),
		'priority'  => 20,
		'panel'		=> 'agama_theme_options'
	)); // Top Navigation
	$wp_customize->add_setting('agama_top_navigation', array(
		'default'			=> 1,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_top_navigation', array(
				'label' 		=> __('Enable Top Navigation', 'agama'),
				'description'	=> __('Works with normal header only.', 'agama'),
				'section'		=> 'agama_header_section',
				'settings'		=> 'agama_top_navigation',
				'type'			=> 'checkbox',
				'priority'		=> 1,
			) 
		) 
	); // Sticky Header
	$wp_customize->add_setting( 'agama_sticky_header', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_sticky_header', array(
				'label'			=> __('Sticky Header', 'agama'),
				'description'	=> __('Enable sticky header ?', 'agama'),
				'section'		=> 'agama_header_section',
				'settings'		=> 'agama_sticky_header',
				'type'			=> 'checkbox'
			) 
		) 
	); // Header Top Margin
	$wp_customize->add_setting( 'agama_header_top_margin', array(
		'default' 			=> '0px',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_header_top_margin', array(
				'label'			=> __('Top Margin', 'agama'),
				'description'	=> __('If sticky header enabled margin will be 0px!', 'agama'),
				'section'		=> 'agama_header_section',
				'settings'		=> 'agama_header_top_margin',
				'type'			=> 'select',
				'choices'		=> array
				(
					'0px' 		=> '0px',
					'1px' 		=> '1px',
					'2px'		=> '2px',
					'3px'		=> '3px',
					'4px'		=> '4px',
					'5px'		=> '5px',
					'10px'		=> '10px',
					'15px'		=> '15px',
					'20px'		=> '20px',
					'25px'		=> '25px',
					'50px'		=> '50px',
					'100px'		=> '100px'
				)
			) 
		) 
	); // Header Top Border Size
	$wp_customize->add_setting( 'agama_header_top_border_size', array(
		'default' 			=> '3px',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'postMessage',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_header_top_border_size', array(
				'label'		=> __( 'Top Border Size', 'agama' ),
				'section'	=> 'agama_header_section',
				'settings'	=> 'agama_header_top_border_size',
				'type'		=> 'select',
				'choices'	=> array
				(
					'1px'	=> '1px',
					'2px'	=> '2px',
					'3px'	=> '3px',
					'4px'	=> '4px',
					'5px'	=> '5px',
					'6px'	=> '6px',
					'7px'	=> '7px',
					'8px'	=> '8px',
					'9px'	=> '9px',
					'10px'	=> '10px'
				)
			) 
		) 
	);
/******************** Agama General Settings ******************************************/
	$wp_customize->add_section( 'agama_general_section', array(
		'title'		=> __('General Settings', 'agama'),
		'priority'	=> 30,
		'panel'		=> 'agama_theme_options'
	)); // NiceScroll
	$wp_customize->add_setting( 'agama_nicescroll', array(
		'default'			=> '1',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_nicescroll', array(
				'label'			=> __( 'NiceScroll', 'agama' ),
				'description'	=> __( 'Enable NiceScroll ?', 'agama' ),
				'section'		=> 'agama_general_section',
				'settings'		=> 'agama_nicescroll',
				'type'			=> 'checkbox'
			) 
		) 
	);
/******************** Agama Blog Settings ******************************************/
	$wp_customize->add_section( 'agama_blog_section', array(
		'title'		=> __('Blog', 'agama'),
		'priority' 	=> 40,
		'panel'		=> 'agama_theme_options'
	)); // Blog Infinite Scroll
	$wp_customize->add_setting( 'agama_blog_infinite_scroll', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_blog_infinite_scroll', array(
				'label'		=> __('Enable Infinite Scroll ?', 'agama'),
				'section'	=> 'agama_blog_section',
				'settings'	=> 'agama_blog_infinite_scroll',
				'type'		=> 'checkbox'
			) 
		) 
	); // Blog Layout
	$wp_customize->add_setting( 'agama_blog_layout', array(
		'default'			=> 'list',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_blog_layout', array(
				'label'		=> __( 'Blog Layout', 'agama' ),
				'section'	=> 'agama_blog_section',
				'settings'	=> 'agama_blog_layout',
				'type'		=> 'select',
				'choices'	=> array
				(
					'list'	=> __( 'List Style', 'agama' ),
					'grid'	=> __( 'Grid Style', 'agama' )
				)
			) 
		) 
	); // Blog Excerpt Lenght
	$wp_customize->add_setting( 'agama_blog_excerpt', array(
		'default'			=> 60,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_blog_excerpt', array(
				'label'		=> __( 'Blog Excerpt Lenght', 'agama' ),
				'section'	=> 'agama_blog_section',
				'settings'	=> 'agama_blog_excerpt',
				'type'		=> 'select',
				'choices'	=> array
				(
					'20'	=> 20,
					'40'	=> 40,
					'60'	=> 60,
					'80'	=> 80,
					'100'	=> 100,
					'120'	=> 120,
					'140'	=> 140,
					'160'	=> 160,
					'180'	=> 180,
					'200'	=> 200
				)
			) 
		) 
	);
/******************** Agama Slider Settings ******************************************/
	$wp_customize->add_section( 'agama_slider_section', array(
		'title'		=> __( 'Slider', 'agama' ),
		'priority'	=> 50,
		'panel'		=> 'agama_theme_options'
	)); // Enable Slider ?
	$wp_customize->add_setting( 'agama_enable_slider', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_enable_slider', array(
				'label'		=> __( 'Enable Slider', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_enable_slider',
				'type'		=> 'checkbox'
			) 
		) 
	); // Slider max-height
	$wp_customize->add_setting( 'flex_max_height', array(
		'default'			=> '400px',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'flex_max_height', array(
				'label'		=> __( 'Slider max-height', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'flex_max_height'
			) 
		) 
	); // Slide Title 1
	$wp_customize->add_setting( 'agama_slide_1_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_slide_1_title', array(
				'label'			=> __( 'Image 1 Title', 'agama' ),
				'description'	=> __( 'Enter image 1 title.', 'agama' ),
				'section'		=> 'agama_slider_section',
				'settings'		=> 'agama_slide_1_title',
				'type'			=> 'text'
			) 
		) 
	); // Slide Image 1
	$wp_customize->add_setting( 'agama_slide_1', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_slide_1', array(
				'label'		=> __( 'Upload Image #1', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_slide_1',
			) 
		) 
	); // Slide Title 2
	$wp_customize->add_setting( 'agama_slide_2_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_slide_2_title', array(
				'label'			=> __( 'Image 2 Title', 'agama' ),
				'description'	=> __( 'Enter image 2 title.', 'agama' ),
				'section'		=> 'agama_slider_section',
				'settings'		=> 'agama_slide_2_title',
				'type'			=> 'text'
			) 
		) 
	); // Slide Image 2
	$wp_customize->add_setting( 'agama_slide_2', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_slide_2', array(
				'label'		=> __( 'Upload Image #2', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_slide_2',
			) 
		) 
	); // Slide Title 3
	$wp_customize->add_setting( 'agama_slide_3_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_slide_3_title', array(
				'label'			=> __( 'Image 3 Title', 'agama' ),
				'description'	=> __( 'Enter image 3 title.', 'agama' ),
				'section'		=> 'agama_slider_section',
				'settings'		=> 'agama_slide_3_title',
				'type'			=> 'text'
			) 
		) 
	); // Slide Image 3
	$wp_customize->add_setting( 'agama_slide_3', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_slide_3', array(
				'label'		=> __( 'Upload Image #3', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_slide_3',
			) 
		) 
	); // Slide Title 4
	$wp_customize->add_setting( 'agama_slide_4_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_slide_4_title', array(
				'label'			=> __( 'Image 4 Title', 'agama' ),
				'description'	=> __( 'Enter image 4 title.', 'agama' ),
				'section'		=> 'agama_slider_section',
				'settings'		=> 'agama_slide_4_title',
				'type'			=> 'text'
			) 
		) 
	); // Slide Image 4
	$wp_customize->add_setting( 'agama_slide_4', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_slide_4', array(
				'label'		=> __( 'Upload Image #4', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_slide_4',
			) 
		) 
	); // Slide Title 5
	$wp_customize->add_setting( 'agama_slide_5_title', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_slide_5_title', array(
				'label'			=> __( 'Image 5 Title', 'agama' ),
				'description'	=> __( 'Enter image 5 title.', 'agama' ),
				'section'		=> 'agama_slider_section',
				'settings'		=> 'agama_slide_5_title',
				'type'			=> 'text'
			) 
		) 
	); // Slide Image 5
	$wp_customize->add_setting( 'agama_slide_5', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( 
			$wp_customize, 'agama_slide_5', array(
				'label'		=> __( 'Upload Image #5', 'agama' ),
				'section'	=> 'agama_slider_section',
				'settings'	=> 'agama_slide_5',
			) 
		) 
	);
/******************** Agama Typography Settings ******************************************/
	$wp_customize->add_section( 'agama_typography_section', array(
		'title'		=> __( 'Typography', 'agama' ),
		'priority'	=> 60,
		'panel'		=> 'agama_theme_options'
	)); // Headings
//	$wp_customize->add_setting( 'agama_typo_h1', array(
//		'default'			=> '',
//	));
/******************** Agama Colours Settings ******************************************/
	$wp_customize->add_section( 'colors', array(
		'title'		=> __('Colours', 'agama'),
		'priority'	=> 70,
		'panel'		=> 'agama_theme_options'
	)); // Agama Primary Color
	$wp_customize->add_setting('agama_primary_color', array(
		'default'			=> '#f7a805',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
			$wp_customize, 'agama_primary_color', array(
				'label'		=> __( 'Agama Primary Color', 'agama' ),
				'section'	=> 'colors',
				'settings'	=> 'agama_primary_color'
			) 
		) 
	); // Agama Skin
	$wp_customize->add_setting( 'agama_skin', array(
		'default'			=> 'light',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_skin', array(
				'label'		=> __( 'Skin', 'agama' ),
				'section'	=> 'colors',
				'settings'	=> 'agama_skin',
				'type'		=> 'select',
				'choices'	=> array
				(
					'light' => __( 'Light', 'agama' ),
					'dark'	=> __( 'Dark', 'agama' )
				)
			) 
		) 
	);
/******************** Agama Social Icons Settings ******************************************/
	$wp_customize->add_section( 'agama_social_icons_section', array(
		'title'		=> __( 'Social Icons', 'agama' ),
		'priority'	=> 80,
		'panel'		=> 'agama_theme_options'
	)); // Social Icons in Top Navigation ?
	$wp_customize->add_setting( 'agama_top_nav_social', array(
		'default'			=> false,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_top_nav_social', array(
				'label'		=> __( 'Enable social icons in top nav ?', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'agama_top_nav_social',
				'type'		=> 'checkbox',
			) 
		) 
	); // Social Icons in Footer ?
	$wp_customize->add_setting( 'agama_footer_social', array(
		'default'			=> 0,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback' => 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_footer_social', array(
				'label'		=> __( 'Enable social icons in footer ?', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'agama_footer_social',
				'type'		=> 'checkbox',
			) 
		) 
	); // Social URL Target
	$wp_customize->add_setting( 'agama_social_url_target', array(
		'default'			=> '_self',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_social_url_target', array(
				'label'		=> __( 'Icons URL Target', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'agama_social_url_target',
				'type'		=> 'select',
				'choices'	=> array
				(
					'_self' => '_self',
					'_blank'=> '_blank'
				)
			) 
		) 
	); // Social Facebook
	$wp_customize->add_setting( 'social_facebook', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_facebook', array(
				'label'		=> __( 'Facebook URL', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_facebook',
				'type'		=> 'text',
			) 
		) 
	); // Social Twitter
	$wp_customize->add_setting( 'social_twitter', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_twitter', array(
		'label'		=> __( 'Twitter URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_twitter',
		'type'		=> 'text',
			) 
		) 
	); // Social Flickr
	$wp_customize->add_setting( 'social_flickr', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_flickr', array(
				'label'		=> __( 'Flickr URL', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_flickr',
				'type'		=> 'text',
			) 
		) 
	); // Social RSS
	$wp_customize->add_setting( 'social_rss', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_rss', array(
		'label'		=> __( 'RSS URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_rss',
		'type'		=> 'text',
			) 
		) 
	); // Social Vimeo
	$wp_customize->add_setting( 'social_vimeo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_vimeo', array(
				'label'		=> __( 'Vimeo URL', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_vimeo',
				'type'		=> 'text',
			) 
		) 
	); // Social YouTube
	$wp_customize->add_setting( 'social_youtube', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_youtube', array(
				'label'		=> __( 'Youtube URL', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_youtube',
				'type'		=> 'text',
			) 
		) 
	);
	$wp_customize->add_setting( 'social_instagram', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_instagram', array(
				'label'		=> __( 'Instagram URL', 'agama' ),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_instagram',
				'type'		=> 'text',
			) 
		) 
	); // Social Pinterest
	$wp_customize->add_setting( 'social_pinterest', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'social_pinterest', array(
		'label'		=> __( 'Pinterest URL', 'agama' ),
		'section'	=> 'agama_social_icons_section',
		'settings'	=> 'social_pinterest',
		'type'		=> 'text',
			) 
		) 
	); // Social Tumblr
	$wp_customize->add_setting( 'social_tumblr', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_tumblr', array(
				'label'		=> __('Tumblr URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_tumblr',
				'type'		=> 'text',
			) 
		) 
	); // Social Google+
	$wp_customize->add_setting( 'social_google', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_google', array(
				'label'		=> __('Google+ URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_google',
				'type'		=> 'text',
			) 
		) 
	); // Social Dribbble
	$wp_customize->add_setting( 'social_dribbble', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_dribbble', array(
				'label'		=> __('Dribbble URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_dribbble',
				'type'		=> 'text',
			) 
		) 
	); // Social Digg
	$wp_customize->add_setting( 'social_digg', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_digg', array(
				'label'		=> __('Digg URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_digg',
				'type'		=> 'text',
			) 
		) 
	); // Social LinkedIn
	$wp_customize->add_setting( 'social_linkedin', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_linkedin', array(
				'label'		=> __('Linkedin URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_linkedin',
				'type'		=> 'text',
			) 
		) 
	); // Social Blogger
	$wp_customize->add_setting( 'social_blogger', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_blogger', array(
				'label'		=> __('Blogger URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_blogger',
				'type'		=> 'text',
			) 
		) 
	); // Social Skype
	$wp_customize->add_setting( 'social_skype', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_skype', array(
				'label'		=> __('Skype URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_skype',
				'type'		=> 'text',
			) 
		) 
	); // Social Forrst
	$wp_customize->add_setting( 'social_forrst', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_forrst', array(
				'label'		=> __('Forrst URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_forrst',
				'type'		=> 'text',
			) 
		) 
	); // Social MySpace
	$wp_customize->add_setting( 'social_myspace', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_myspace', array(
				'label'		=> __('Myspace URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_myspace',
				'type'		=> 'text',
			) 
		) 
	); // Social Deviantart
	$wp_customize->add_setting( 'social_deviantart', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_deviantart', array(
				'label'		=> __('Deviantart URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_deviantart',
				'type'		=> 'text',
			) 
		) 
	); // Social Yahoo
	$wp_customize->add_setting( 'social_yahoo', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_yahoo', array(
				'label'		=> __('Yahoo URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_yahoo',
				'type'		=> 'text',
			) 
		) 
	); // Social Reddit
	$wp_customize->add_setting( 'social_reddit', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_reddit', array(
				'label'		=> __('Reddit URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_reddit',
				'type'		=> 'text',
			) 
		) 
	); // Social PayPal
	$wp_customize->add_setting( 'social_paypal', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_paypal', array(
				'label'		=> __('PayPal URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_paypal',
				'type'		=> 'text',
			) 
		) 
	); // Social DropBox
	$wp_customize->add_setting( 'social_dropbox', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_dropbox', array(
				'label'		=> __('Dropbox URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_dropbox',
				'type'		=> 'text',
			) 
		) 
	); // Social SoundCloud
	$wp_customize->add_setting( 'social_soundcloud', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_soundcloud', array(
				'label'		=> __('Soundcloud URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_soundcloud',
				'type'		=> 'text',
			) 
		) 
	); // Social VK
	$wp_customize->add_setting( 'social_vk', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_vk', array(
				'label'		=> __('VK URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_vk',
				'type'		=> 'text',
			) 
		) 
	); // Social Email
	$wp_customize->add_setting( 'social_email', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport' 		=> 'refresh',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'social_email', array(
				'label'		=> __('Email URL', 'agama'),
				'section'	=> 'agama_social_icons_section',
				'settings'	=> 'social_email',
				'type'		=> 'text',
			) 
		) 
	);
/******************** Agama WooCommerce Settings ******************************************/
	$wp_customize->add_section( 'agama_woocommerce', array(
		'title'		=> __( 'WooCommerce', 'agama' ),
		'priority'	=> 90,
		'panel'		=> 'agama_theme_options'
	)); // Products per Page
	$wp_customize->add_setting( 'agama_products_per_page', array(
		'default'			=> '12',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_attr'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_products_per_page', array(
				'label'		=> __('Products per Page', 'agama'),
				'section'	=> 'agama_woocommerce',
				'settings'	=> 'agama_products_per_page',
				'type'		=> 'text'
			) 
		) 
	);
/******************** Agama Footer Settings ******************************************/
	$wp_customize->add_section( 'agama_footer_section', array(
		'title'		=> __('Footer', 'agama'),
		'priority'	=> 100,
		'panel'		=> 'agama_theme_options'
	)); // Back to Top
	$wp_customize->add_setting( 'agama_to_top', array(
		'default'			=> true,
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'sanitize_key'
	));
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_to_top', array(
				'label'			=> __( 'Back to Top', 'agama' ),
				'description'	=> __( 'Enable back to top button ?', 'agama' ),
				'section'		=> 'agama_footer_section',
				'settings'		=> 'agama_to_top',
				'type'			=> 'checkbox'
			) 
		) 
	); // Copyright
	$wp_customize->add_setting( 'agama_footer_copyright', array(
		'default'			=> '',
		'capability'		=> 'edit_theme_options',
		'transport'			=> 'refresh',
		'sanitize_callback'	=> 'esc_textarea'
	) );
	$wp_customize->add_control( 
		new WP_Customize_Control( 
			$wp_customize, 'agama_footer_copyright', array(
				'label'			=> __( 'Footer Copyright', 'agama' ),
				'description'	=> __( 'Write your own footer copyright.', 'agama' ),
				'section'		=> 'agama_footer_section',
				'settings'		=> 'agama_footer_copyright',
				'type'			=> 'textarea',
			) 
		) 
	);
}
add_action( 'customize_register', 'agama_customize_register' );

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Agama 1.0
 */
function agama_customize_preview_js() {
	wp_register_script( 'agama-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array( 'customize-preview' ), uniqid(), true );
	$localize = array(
		'skin_url' 			=> esc_url( get_stylesheet_directory_uri() . '/assets/css/skins/' ),
		'top_nav_enable'	=> esc_attr( get_theme_mod( 'agama_top_navigation', true ) )
	);
	wp_localize_script( 'agama-customizer', 'agama', $localize );
	wp_enqueue_script( 'agama-customizer' );
}
add_action( 'customize_preview_init', 'agama_customize_preview_js' );

/**
 * Generating Dynamic CSS
 *
 * @since Agama 1.0
 */
function agama_customize_css() 
{ global $Agama; ?>
	<style type="text/css" id="agama-customize-css"> 
	a:hover,
	.site-header h1 a:hover, 
	.site-header h2 a:hover,
	.list-style .entry-content .entry-title a:hover,
	.entry-content a:hover, .comment-content a:hover,
	a.comment-reply-link:hover, 
	a.comment-edit-link:hover,
	.comments-area article header a:hover,
	.widget-area .widget a:hover,
	.comments-link a:hover, 
	.entry-meta a:hover,
	.format-status .entry-header header a:hover,
	footer[role="contentinfo"] a:hover {
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>; 
	}
	.site-header .logo {
		max-height: 100px;
	}
	.sticky-header .logo {
		max-height: 85px;
	}
	.sticky-header-shrink .logo {
		max-height: 60px;
	}
	.search-form .search-table .search-button input[type="submit"]:hover {
		background: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	#main-wrapper {
		margin-top: <?php echo esc_attr( get_theme_mod( 'agama_header_top_margin', '0px' ) ); ?>;
	}
	.sticky-header,
	.top-nav-wrapper { 
		border-top-width: <?php echo esc_attr( get_theme_mod( 'agama_header_top_border_size', '3px' ) ); ?>; 
		border-top-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
		border-top-style: solid;
	}
	.flexslider {
		max-height: <?php echo esc_attr( get_theme_mod('flex_max_height', '400px') ); ?> !important;
		overflow: hidden;
		border: 0 !important;
	}
	.sticky-nav > li > ul {
		border-top: 2px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.sticky-nav > li > ul > li > ul {
		border-right: 2px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	<?php if( get_theme_mod('agama_blog_infinite_scroll', false) && get_theme_mod('agama_blog_layout', 'list') == 'grid' ): ?>
	#infscr-loading {
		position: absolute;
		bottom: 0;
		left: 25%;
	}
	<?php endif; ?>
	.entry-date .date-box {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.entry-date .format-box i {
		color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.blog figure.effect-bubba, 
	.agama-portfolio figure.effect-bubba {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	.vision_tabs #tabs li.active a {
		border-top: 3px solid <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	#toTop:hover {
		background-color: <?php echo esc_attr( get_theme_mod( 'agama_primary_color', '#f7a805' ) ); ?>;
	}
	</style>
	<?php
}
add_action( 'wp_head', 'agama_customize_css' );

/**
 * Styling Agama Support Section
 *
 * @since 1.0.7
 */
function customize_styles_agama_support( $input ) { ?>
	<style type="text/css">
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:after {
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title {
			background-color: rgba(247, 168, 5, 0.9);
			color: #fff;
		}
		#customize-theme-controls #accordion-section-agama_support_section .accordion-section-title:hover {
			background-color: rgba(247, 168, 5, 1);
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a {
			padding: 10px 8px;
			display: block;
			border-bottom: 1px solid #eee;
			color: #555;
		}
		#customize-theme-controls #accordion-section-agama_support_section .theme-info a:hover {
			color: #222;
			background-color: #f5f5f5;
		}
	</style>
<?php }
add_action( 'customize_controls_print_styles', 'customize_styles_agama_support');