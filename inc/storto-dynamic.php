<?php
/**
 * storto functions and dynamic template
 *
 * @package storto
 */
 
 /**
 * Register Custom Settings
 */
function storto_custom_settings_register( $wp_customize ) {
	/*
	Theme Colors
	=====================================================
	*/
	$colors = array();
	
	$colors[] = array(
	'slug'=>'storto_color_primary', 
	'default' => '#aaaaaa',
	'label' => __('Primary Color ', 'storto')
	);
	
	$colors[] = array(
	'slug'=>'storto_color_link', 
	'default' => '#e08557',
	'label' => __('Link Color ', 'storto')
	);
		
	foreach( $colors as $storto_theme_options ) {
		// SETTINGS
			$wp_customize->add_setting(
				'storto_theme_options[' . $storto_theme_options['slug'] . ']', array(
				'default' => $storto_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$storto_theme_options['slug'], 
				array('label' => $storto_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'storto_theme_options[' . $storto_theme_options['slug'] . ']',
				)
			)
		);
	}
	
	/*
	Social Icons
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_social_icons', array(
	     'title'    => esc_html__( 'Social Icons', 'storto' ),
	     'priority' => 50,
	) );
	
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '#',
	'label' => __('Facebook URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '#',
	'label' => __('Twitter URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '#',
	'label' => __('Google Plus URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '#',
	'label' => __('Linkedin URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '#',
	'label' => __('Instagram URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '#',
	'label' => __('YouTube URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '#',
	'label' => __('Pinterest URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '#',
	'label' => __('Tumblr URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '#',
	'label' => __('VK URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'twitchurl', 
	'default' => '',
	'label' => __('Twitch URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'spotifyurl', 
	'default' => '',
	'label' => __('Spotify URL', 'storto')
	);
	$socialmedia[] = array(
	'slug'=>'whatsappurl', 
	'default' => '',
	'label' => __('WhatsApp URL', 'storto')
	);
	
	foreach( $socialmedia as $storto_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'storto_theme_options_' . $storto_theme_options['slug'], array(
				'default' => $storto_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$storto_theme_options['slug'], 
			array('label' => $storto_theme_options['label'], 
			'section'    => 'cresta_social_icons',
			'settings' =>'storto_theme_options_' . $storto_theme_options['slug'],
			)
		);
	}
	
	/*
	Search Button
	=====================================================
	*/
	$wp_customize->add_setting('storto_theme_options_hidesearch', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'storto_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('hidesearch', array(
        'label'      => __( 'Show Search Button', 'storto' ),
        'section'    => 'cresta_social_icons',
        'settings'   => 'storto_theme_options_hidesearch',
        'type'       => 'checkbox',
    ) );
	
	/*
	Copyright Text
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_copyright_text', array(
	     'title'    => esc_html__( 'Copyright Text', 'storto' ),
	     'priority' => 50,
	) );
	
	$wp_customize->add_setting('storto_theme_options_copyrighttext', array(
		'sanitize_callback' => 'storto_sanitize_text',
		'default'    => '&copy; '.date('Y').' '. get_bloginfo('name'),
		'type'       => 'theme_mod',
		'capability' => 'edit_theme_options',
	) );
	$wp_customize->add_control('storto_theme_options_copyrighttext', array(
		'label'      => __( 'Copyright Text', 'storto' ),
		'section'    => 'cresta_copyright_text',
		'settings'   => 'storto_theme_options_copyrighttext',
		'type'       => 'text',
	) );
	
	/*
	Upgrade to PRO
	=====================================================
	*/
    class Storto_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="storto-upgrade-title">
        		<span class="customize-control-title">
					<h3 style="text-align:center;"><div class="dashicons dashicons-megaphone"></div> <?php esc_html_e('Get Gigante WP Theme for only', 'storto'); ?> 24,90&euro;</h3>
        		</span>
        	</p>
			<p style="text-align:center;" class="storto-upgrade-button">
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/demo/gigante/" class="button button-secondary">
					<?php esc_html_e('Watch the demo', 'storto'); ?>
				</a>
				<a style="margin: 10px;" target="_blank" href="https://crestaproject.com/downloads/gigante/" class="button button-secondary">
					<?php esc_html_e('Get Gigante Theme', 'storto'); ?>
				</a>
			</p>
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Advanced Theme Options', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Logo Upload', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Choose sidebar position', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Font switcher', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Loading Page', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Unlimited Colors and Skin', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Post views counter', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Post format', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('7 Shortcodes', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('12 Exclusive Widgets', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Related Posts Box', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('Information About Author Box', 'storto'); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php esc_html_e('And much more...', 'storto'); ?></b></li>
			<ul><?php
        }
    }
	
	$wp_customize->add_section( 'cresta_upgrade_pro', array(
	     'title'    => esc_html__( 'More features? Upgrade to PRO', 'storto' ),
	     'priority' => 999,
	));
	
	$wp_customize->add_setting('storto_section_upgrade_pro', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(new Storto_Customize_Upgrade_Control($wp_customize, 'storto_section_upgrade_pro', array(
		'section' => 'cresta_upgrade_pro',
		'settings' => 'storto_section_upgrade_pro',
	)));
	
}
add_action( 'customize_register', 'storto_custom_settings_register' );

function storto_sanitize_text( $input ) {
	return wp_kses($input, storto_allowed_html());
}

if( ! function_exists('storto_allowed_html')){
	function storto_allowed_html() {
		$allowed_tags = array(
			'a' => array(
				'class' => array(),
				'id'    => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array(),
			),
			'abbr' => array(
				'title' => array(),
			),
			'b' => array(),
			'blockquote' => array(
				'cite'  => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'code' => array(),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(
				'class' => array(),
			),
			'h2' => array(
				'class' => array(),
			),
			'h3' => array(
				'class' => array(),
			),
			'h4' => array(
				'class' => array(),
			),
			'h5' => array(
				'class' => array(),
			),
			'h6' => array(
				'class' => array(),
			),
			'i' => array(
				'class' => array(),
			),
			'br' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'p' => array(
				'class' => array(),
			),
			'q' => array(
				'cite' => array(),
				'title' => array(),
			),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'strike' => array(),
			'strong' => array(),
			'ul' => array(
				'class' => array(),
			),
			'iframe' => array(
				'width' => array(),
				'height' => array(),
				'src' => array(),
				'frameborder' => array(),
				'allow' => array(),
				'style' => array(),
				'name' => array(),
				'id' => array(),
				'class' => array(),
			),
		);
		return $allowed_tags;
	}
}

/**
 * Add Custom CSS to Header 
 */
function storto_custom_css_styles() { 
	global $storto_theme_options;
	$color_options = get_option( 'storto_theme_options', $storto_theme_options );	
	if( isset( $color_options[ 'storto_color_primary' ] ) ) {
		$color_primary = $color_options['storto_color_primary'];
	}
	if( isset( $color_options[ 'storto_color_link' ] ) ) {
		$color_link = $color_options['storto_color_link'];
	}
?>

<style id="storto-custom-css">
	<?php if (!empty($color_primary)) : ?>
	body,
	button,
	input,
	select,
	textarea,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus {
		color: <?php echo esc_html($color_primary); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($color_link)) : ?>
	blockquote {
		border-left: 5px solid <?php echo esc_html($color_link); ?>;
		border-right: 2px solid <?php echo esc_html($color_link); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	input[type="text"]:focus,
	input[type="email"]:focus,
	input[type="url"]:focus,
	input[type="password"]:focus,
	input[type="search"]:focus,
	input[type="number"]:focus,
	input[type="tel"]:focus,
	input[type="range"]:focus,
	input[type="date"]:focus,
	input[type="month"]:focus,
	input[type="week"]:focus,
	input[type="time"]:focus,
	input[type="datetime"]:focus,
	input[type="datetime-local"]:focus,
	input[type="color"]:focus,
	textarea:focus,
	#wp-calendar tbody td#today,
	.readMoreLink a:hover, 
	.dataBottom a:hover,
	#toTop:hover	{
		border: 1px solid <?php echo esc_html($color_link); ?>;
	}
	a, a:hover, a:focus, a:active, .main-navigation ul li .indicator, .content-area .sticky:before {
		color: <?php echo esc_html($color_link); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'storto_custom_css_styles');

function storto_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}