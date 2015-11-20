<?php 
/**
 * blogghiamo functions and dynamic template
 *
 * @package blogghiamo
 */
 
 /**
 * Delete font size style from tag cloud widget
 */
function blogghiamo_fix_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}
add_filter('wp_generate_tag_cloud', 'blogghiamo_fix_tag_cloud',10,3);

/**
 * Replace more Excerpt
 */
function blogghiamo_new_excerpt_more($more) {
       global $post;
	return ' ...';
}
add_filter('excerpt_more', 'blogghiamo_new_excerpt_more');

 /**
 * Register All Colors and Section
 */
function blogghiamo_color_primary_register( $wp_customize ) {
	$colors = array();
	
	$colors[] = array(
		'slug'=>'text_color_first', 
		'default' => '#404040',
		'label' => __('Text Color', 'blogghiamo')
	);
	
	$colors[] = array(
		'slug'=>'box_color_second', 
		'default' => '#ffffff',
		'label' => __('Box Color', 'blogghiamo')
	);
	
	$colors[] = array(
		'slug'=>'special_color_third', 
		'default' => '#0a7db0',
		'label' => __('Special Color', 'blogghiamo')
	);
	
	foreach( $colors as $blogghiamo_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting( 'blogghiamo_theme_options[' . $blogghiamo_theme_options['slug'] . ']', array(
				'default' => $blogghiamo_theme_options['default'],
				'type' => 'option', 
				'sanitize_callback' => 'sanitize_hex_color',
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$blogghiamo_theme_options['slug'], 
				array('label' => $blogghiamo_theme_options['label'], 
				'section' => 'colors',
				'settings' =>'blogghiamo_theme_options[' . $blogghiamo_theme_options['slug'] . ']',
				)
			)
		);
	}
	
	/*
	Start Blogghiamo Options
	=====================================================
	*/
	$wp_customize->add_section( 'cresta_blogghiamo_options', array(
	     'title'    => esc_attr__( 'Blogghiamo Theme Options', 'blogghiamo' ),
	     'priority' => 50,
	) );
	
	/*
	Social Icons
	=====================================================
	*/
	$socialmedia = array();
	
	$socialmedia[] = array(
	'slug'=>'facebookurl', 
	'default' => '#',
	'label' => __('Facebook URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'twitterurl', 
	'default' => '#',
	'label' => __('Twitter URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'googleplusurl', 
	'default' => '#',
	'label' => __('Google Plus URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'linkedinurl', 
	'default' => '#',
	'label' => __('Linkedin URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'instagramurl', 
	'default' => '#',
	'label' => __('Instagram URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'youtubeurl', 
	'default' => '#',
	'label' => __('YouTube URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'pinteresturl', 
	'default' => '#',
	'label' => __('Pinterest URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'tumblrurl', 
	'default' => '#',
	'label' => __('Tumblr URL', 'blogghiamo')
	);
	$socialmedia[] = array(
	'slug'=>'vkurl', 
	'default' => '#',
	'label' => __('VK URL', 'blogghiamo')
	);
	
	foreach( $socialmedia as $blogghiamo_theme_options ) {
		// SETTINGS
		$wp_customize->add_setting(
			'blogghiamo_theme_options_' . $blogghiamo_theme_options['slug'], array(
				'default' => $blogghiamo_theme_options['default'],
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw',
				'type'     => 'theme_mod',
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			$blogghiamo_theme_options['slug'], 
			array('label' => $blogghiamo_theme_options['label'], 
			'section'    => 'cresta_blogghiamo_options',
			'settings' =>'blogghiamo_theme_options_' . $blogghiamo_theme_options['slug'],
			)
		);
	}
	
	/*
	Email Button
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_emailurl', array(
        'default'    => '#',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'is_email'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_emailurl', array(
        'label'      => __( 'Your Email', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_emailurl',
    ) );
	
	/*
	Search Button
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_hidesearch', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_hidesearch', array(
        'label'      => __( 'Show Search Button', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_hidesearch',
        'type'       => 'checkbox',
    ) );
	
	/*
	RSS Icon
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_rss', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_rss', array(
        'label'      => __( 'Show RSS Icon', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_rss',
        'type'       => 'checkbox',
    ) );
	
	/*
	Full or Excerpt post
	=====================================================
	*/
	$wp_customize->add_setting('blogghiamo_theme_options_postshow', array(
        'default'    => '1',
        'type'       => 'theme_mod',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'blogghiamo_sanitize_checkbox'
    ) );
	
	$wp_customize->add_control('blogghiamo_theme_options_postshow', array(
        'label'      => __( 'Check if you want to show excerpt, uncheck if you want to show full post', 'blogghiamo' ),
        'section'    => 'cresta_blogghiamo_options',
        'settings'   => 'blogghiamo_theme_options_postshow',
        'type'       => 'checkbox',
    ) );
	
	/*
	Upgrade to PRO
	=====================================================
	*/
    class Blogghiamo_Customize_Upgrade_Control extends WP_Customize_Control {
        public function render_content() {  ?>
        	<p class="blogghiamo-upgrade-title">
        		<span class="customize-control-title">
					<h3 style="text-align:center;"><div class="dashicons dashicons-megaphone"></div> <?php _e('Get Blogghiamo PRO WP Theme for only', 'blogghiamo'); ?> 24,90&euro;</h3>
        		</span>
        	</p>
			<p style="text-align:center;" class="blogghiamo-upgrade-button">
				<a style="margin: 10px;" target="_blank" href="http://crestaproject.com/demo/blogghiamo-pro/" class="button button-secondary">
					<?php _e('Watch the demo', 'blogghiamo'); ?>
				</a>
				<a style="margin: 10px;" target="_blank" href="http://crestaproject.com/downloads/blogghiamo/" class="button button-secondary">
					<?php _e('Get Blogghiamo PRO Theme', 'blogghiamo'); ?>
				</a>
			</p>
			<ul>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Advanced Theme Options', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Logo Upload', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Font switcher', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Loading Page', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Unlimited Colors and Skin', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Beautiful Slider', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Breaking News', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Post views counter', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Breadcrumb', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Post format', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( '7 Shortcodes', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( '12 Exclusive Widgets', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Related Posts Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Information About Author Box', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'Advertising System', 'blogghiamo' ); ?></b></li>
				<li><div class="dashicons dashicons-yes" style="color: #1fa67a;"></div><b><?php _e( 'And much more...', 'blogghiamo' ); ?></b></li>
			<ul><?php
        }
    }
	
	$wp_customize->add_section( 'cresta_upgrade_pro', array(
	     'title'    => __( 'More features? Upgrade to PRO', 'blogghiamo' ),
	     'priority' => 999,
	));
	
	$wp_customize->add_setting('blogghiamo_section_upgrade_pro', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'esc_attr'
	));
	
	$wp_customize->add_control(new Blogghiamo_Customize_Upgrade_Control($wp_customize, 'blogghiamo_section_upgrade_pro', array(
		'section' => 'cresta_upgrade_pro',
		'settings' => 'blogghiamo_section_upgrade_pro',
	)));
	
}
add_action( 'customize_register', 'blogghiamo_color_primary_register' );

function blogghiamo_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Add Custom CSS to Header 
 */
function blogghiamo_custom_css_styles() { 
	global $blogghiamo_theme_options;
	$se_options = get_option( 'blogghiamo_theme_options', $blogghiamo_theme_options );
	if( isset( $se_options[ 'text_color_first' ] ) ) {
		$text_color_first = $se_options['text_color_first'];
	}
	if( isset( $se_options[ 'box_color_second' ] ) ) {
		$box_color_second = $se_options['box_color_second'];
	}
	if( isset( $se_options[ 'special_color_third' ] ) ) {
		$special_color_third = $se_options['special_color_third'];
	}
?>

<style type="text/css">
	<?php if (!empty($text_color_first) && $text_color_first != '#404040' ) : ?>
	body,
	button,
	input,
	select,
	textarea,
	a,
	.menu-toggle {
		color: <?php echo esc_attr($text_color_first); ?>;
	}
	<?php endif; ?>
	
	<?php if (!empty($box_color_second) && $box_color_second != '#ffffff' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation ul li .indicator,
	.main-navigation a,
	.main-navigation a:hover, 
	.main-navigation a:focus, 
	.main-navigation a:active,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .tagcloud a,
	#comments .reply a,
	.menu-toggle:hover,
	.menu-toggle:focus	{
		color: <?php echo esc_attr($box_color_second); ?>;
	}
	.theTop, footer.site-footer, .hentry, .widget, .comments-area, #toTop, .paging-navigation .nav-links a, .page-header,
	.crestaPostStripeInner,
	.page-content,
	.entry-content,
	.entry-summary,
	.menu-toggle {
		background: <?php echo esc_attr($box_color_second); ?>;
	}
	.site-title {
		text-shadow: 4px 3px 0px <?php echo esc_attr($box_color_second); ?>, 9px 8px 0px rgba(0, 0, 0, 0.1);
	}
	<?php endif; ?>
	
	<?php if (!empty($special_color_third) && $special_color_third != '#0a7db0' ) : ?>
	button,
	input[type="button"],
	input[type="reset"],
	input[type="submit"],
	.main-navigation,
	.main-navigation ul ul,
	.post-navigation .meta-nav,
	.widget-title,
	.edit-link a, .tagcloud a,
	#comments .reply,
	.menu-toggle:focus, .menu-toggle:hover {
		background: <?php echo esc_attr($special_color_third); ?>;
	}
	button:hover,
	input[type="button"]:hover,
	input[type="reset"]:hover,
	input[type="submit"]:hover,
	a:hover,
	a:focus,
	a:active,
	.post-navigation .meta-nav:hover,
	.top-search.active,
	.edit-link a:hover, .tagcloud a:hover,
	.page-links a span {
		color: <?php echo esc_attr($special_color_third); ?>;
	}
	blockquote {
		border-left: 5px solid <?php echo esc_attr($special_color_third); ?>;
		border-right: 2px solid <?php echo esc_attr($special_color_third); ?>;
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
	textarea:focus,
	.post-navigation .meta-nav:hover,
	#wp-calendar tbody td#today,
	.edit-link a:hover, .tagcloud a:hover	{
		border: 1px solid <?php echo esc_attr($special_color_third); ?>;
	}
	.widget-title:before, .theShareSpace:before {
		border-top: 1.5em solid <?php echo esc_attr($special_color_third); ?>;
	}
	<?php endif; ?>
	
</style>
    <?php
}
add_action('wp_head', 'blogghiamo_custom_css_styles');