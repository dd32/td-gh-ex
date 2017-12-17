<?php
/**
 * appsetter Theme Customizer.
 *
 * @package appsetter
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function appsetter_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	$wp_customize->add_section('appsetter_footer_settings', array(
		'title' => __('Footer Settings', 'appsetter') ,
		'priority' => 67
	));
	$wp_customize->add_section('appsetter_theme_settings', array(
		'title' => __('Theme Settings', 'appsetter') ,
		'priority' => 68
	));
	$wp_customize->add_section('appsetter_theme_support', array(
		'title' => __('Theme Support', 'appsetter') ,
		'priority' => 201
	));
	$wp_customize->add_setting('accent_color', array(
		'sanitize_callback' => 'appsetter_sanitize_text',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
		'label' => __('Accent color', 'appsetter') ,
		'description' => __('Pick a bold, contrasty color for best results.', 'appsetter') ,
		'section' => 'colors',
		'default' => 'a4c639'
	)));
	/*
	* Options for showing tagline
	*/
	$wp_customize->add_setting('show_desc', array(
		'default' => 1,
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'appsetter_sanitize_text'
	));
	$wp_customize->add_control('show_desc', array(
		'label' => __('Display tagline', 'appsetter') ,
		'section' => 'title_tagline',
		'settings' => 'show_desc',
		'type' => 'checkbox',
		'std' => 1
	));
	/*
	* Options for showing logo
	*/
	$wp_customize->add_setting('show_logo', array(
		'default' => 1,
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'appsetter_sanitize_text'
	));
	$wp_customize->add_control('show_logo', array(
		'label' => __('Display logo', 'appsetter') ,
		'section' => 'title_tagline',
		'settings' => 'show_logo',
		'type' => 'checkbox',
		'std' => 1
	));
	$wp_customize->add_setting('appsetter_logo', array(
		'default' => get_template_directory_uri() . '/images/default-logo.png',
		'sanitize_callback' => 'esc_url'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'appsetter_logo', array(
		'label' => __('Logo', 'appsetter') ,
		'section' => 'title_tagline',
		'settings' => 'appsetter_logo'
	)));
	/*
	* Options for setting missing square image
	*/
	$wp_customize->add_setting('appsetter_default_thumb', array(
		'default' => get_template_directory_uri() . '/images/default-image.jpg',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'appsetter_default_thumb', array(
		'label' => __('Default image placeholder', 'appsetter') ,
		'section' => 'appsetter_theme_settings',
		'settings' => 'appsetter_default_thumb'
	)));
	/*
	* Options for setting missing large image
	*/
	$wp_customize->add_setting('appsetter_default_large', array(
		'default' => get_template_directory_uri() . '/images/default-image-large.jpg',
		'sanitize_callback' => 'esc_url',
		'transport' => 'postMessage'
	));
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'appsetter_default_large', array(
		'label' => __('Large image placeholder', 'appsetter') ,
		'section' => 'appsetter_theme_settings',
		'settings' => 'appsetter_default_large'
	)));
	
	/*
	* Footer settings
	*/
	$wp_customize->add_setting('footer_text', array(
		'default' => 'Copyright',
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
		'transport' => 'postMessage',
		'sanitize_callback' => 'appsetter_sanitize_text'
	));
	$wp_customize->add_control('footer_text', array(
		'label' => __('Copyright text for bottom of footer', 'appsetter') ,
		'section' => 'appsetter_footer_settings',
		'settings' => 'footer_text',
		'type' => 'text'
	));
	$wp_customize->add_setting('appsetter_upgrade_notice', array(
		'sanitize_callback' => 'appsetter_sanitize_text'
	));
	
	$upgrade_link = "https://appsetter.com/appsetter";
	$author_link = "https://appsetter.com";
	
	if (!class_exists('incredible_planet_license')) {
		$wp_customize->add_control(new appsetter_support_info($wp_customize, 'appsetter_upgrade_notice', array(
			'settings' => 'appsetter_upgrade_notice',
			'section' => 'appsetter_footer_settings',
			'description' => '<div class="support-text"><p>Please <a href=" '. $upgrade_link .' " target="_blank">upgrade</a> to the paid version of this theme for an easy way of disabling the footer credits, as well as other benefits such as dedicated support and more features. Thank you!</p></div>'
		)));
	}
	/*
	* Support and help links
	*/
	$wp_customize->add_setting('appsetter_support_text', array(
		'sanitize_callback' => 'appsetter_sanitize_text'
	));
	$wp_customize->add_control(new appsetter_support_info($wp_customize, 'appsetter_support_text', array(
		'settings' => 'appsetter_support_text',
		'section' => 'appsetter_theme_support',
		'description' => '<div class="support-text"><h3>Setting up the theme</h3><ol><li>Configure all sections in the customizer (Appearance -> Customize)</li><li>Set menu locations to respective settings</li><li>Drag menu widgets to footer area for footer menus</li><li>Regenerate thumbnails (use free plugin found on wordpress.org)</li></ol></div>'
	)));
	
	if (!class_exists('incredible_planet_license')) {
		
		$wp_customize->add_setting('appsetter_links', array(
			'sanitize_callback' => 'appsetter_sanitize_text'
		));
		
		$wp_customize->add_control(new appsetter_support_info($wp_customize, 'appsetter_links', array(
			'settings' => 'appsetter_links',
			'section' => 'appsetter_theme_support',
			'description' => '<div class="links"><a href=" '. $author_link .' " target="_blank">' . __('Demo', 'appsetter') . '</a><br /><a href=" '. $upgrade_link .' " target="_blank">' . __('Documentation', 'appsetter') . '</a><br /><a href=" '. $upgrade_link .' " target="_blank">' . __('Upgrade to remove footer link', 'appsetter') . '</a>',
		)));
		
		$wp_customize->add_setting('appsetter_support_text_after', array(
			'sanitize_callback' => 'appsetter_sanitize_text'
		));
		$wp_customize->add_control(new appsetter_support_info($wp_customize, 'appsetter_support_text_after', array(
			'settings' => 'appsetter_support_text_after',
			'section' => 'appsetter_theme_support',
			'description' => '<div class="support-text"><p>Thanks for trying out this theme! We hope you like it. Please use the links above to find out more details about how to use this theme.</p></div>'
		)));
	}	

}

add_action('customize_register', 'appsetter_customize_register');

function appsetter_sanitize_text($input)
{
	return wp_kses_post(force_balance_tags($input));
}

function appsetter_custom_css()
{
	$bg_img = get_header_image();
	
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');
	
	if ('' == get_theme_mod('background_color')) {
		$background_color = '#ffffff';
	}
	else {
		$background_color = get_theme_mod('background_color');
	}

	if ('' == get_theme_mod('accent_color')) {
		$accent_color = '#a4c639';
	}
	else {
		$accent_color = get_theme_mod('accent_color');
	}

	// Start adding all the css rules together in one joined variable called $custom_css then join to the actual custom.css file.

	if ($background_color != '') {
		$custom_css = "
				body.custom-background {
					background-color:#{$background_color};
                }
				[canvas=container] {
					background:transparent;
				}
			";
	}
	
	if ($accent_color != '') {
		$custom_css.= "
			.entry-header i.fa.fa-bolt, 
			.mini i.fa.fa-bolt, 
			.list-articles i.fa.fa-newspaper-o, 
			.title-positioning .entry-meta, 
			.sidebar-news input[type=submit], 
			.mini-category, 
			.tnp-widget-minimal input.tnp-submit, 
			a.read-more-link,
			p.author_links a,
			.type-post .cat-links a, .type-post .tags-links a,
			span.load-more,
			.single-post .title-positioning,
			.pagination a:hover,
			.pagination .current 
			{
				background:{$accent_color};
			}
			.current-menu-item a,
			.sub-menu .current-menu-item li a			
			{
				border-bottom: 2px solid {$accent_color};
			}
		";
	}

	if ($accent_color != '') {
		$custom_css.= "
			.title-positioning .entry-meta
			
			{
				-webkit-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-moz-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-ms-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				-o-box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
				box-shadow: 10px 0 0 {$accent_color}, -10px 0 0 {$accent_color};
			}
		";
	}

	if ($accent_color != '') {
		$custom_css.= "
			.list-articles .entry-footer a, 
			body a, 
			.author-short .author_links a, 
			.pop-category a,
			.type-post h3, 
			.list-articles .entry-footer a,
			p.pop-category i,
			.entry-footer i			
			{
				color:{$accent_color};
			}
		";
	}

	// End of Color Options and my energy for the day

	wp_add_inline_style('custom-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'appsetter_custom_css');

if (class_exists('WP_Customize_Control')):
	class appsetter_support_info extends WP_Customize_Control

	{
		public

		function render_content()
		{
?>
	    <span class="customize-control-title">
			<?php
			echo esc_html($this->label); ?>
		</span>

		<?php
			if ($this->description) { ?>
			<span class="description customize-control-description">
			<?php
				echo wp_kses_post($this->description); ?>
			</span>
		<?php
			}
		}
	}

endif;
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */

function appsetter_customize_preview_js()
{
	wp_enqueue_script('appsetter_customizer', get_template_directory_uri() . '/js/customizer.js', array(
		'customize-preview'
	) , '20151215', true);
}

add_action('customize_preview_init', 'appsetter_customize_preview_js');