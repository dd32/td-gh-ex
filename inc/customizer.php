<?php

add_action( 'customize_register', 'unlimited_add_customizer_content' );

function unlimited_add_customizer_content( $wp_customize ) {

	/***** Reorder default sections *****/

	$wp_customize->get_section( 'title_tagline' )->priority = 1;

	// check if exists in case user has no pages
	if ( is_object( $wp_customize->get_section( 'static_front_page' ) ) ) {
		$wp_customize->get_section( 'static_front_page' )->priority = 5;
		$wp_customize->get_section( 'static_front_page' )->title    = __( 'Front Page', 'unlimited' );
	}

	/***** Add PostMessage Support *****/

	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/***** Add Custom Controls *****/

	class unlimited_Multi_Checkbox_Control extends WP_Customize_Control {
		public $type = 'multi-checkbox';

		public function render_content() {

			if ( empty( $this->choices ) ) {
				return;
			}
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<select id="comment-display-control" <?php $this->link(); ?> multiple="multiple" style="height: 100%;">
					<?php
					foreach ( $this->choices as $value => $label ) {
						$selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
						echo '<option value="' . esc_attr( $value ) . '"' . $selected . '>' . $label . '</option>';
					}
					?>
				</select>
			</label>
		<?php }
	}

	/***** Logo Upload *****/

	// section
	$wp_customize->add_section( 'unlimited_logo_upload', array(
		'title'    => __( 'Logo', 'unlimited' ),
		'priority' => 20
	) );
	// setting
	$wp_customize->add_setting( 'logo_upload', array(
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize, 'logo_image', array(
			'label'    => __( 'Upload custom logo.', 'unlimited' ),
			'section'  => 'unlimited_logo_upload',
			'settings' => 'logo_upload'
		)
	) );

	/***** Social Media Icons *****/

	// get the social sites array
	$social_sites = unlimited_social_array();

	// set a priority used to order the social sites
	$priority = 5;

	// section
	$wp_customize->add_section( 'unlimited_social_media_icons', array(
		'title'       => __( 'Social Media Icons', 'unlimited' ),
		'priority'    => 25,
		'description' => __( 'Add the URL for each of your social profiles.', 'unlimited' )
	) );

	// create a setting and control for each social site
	foreach ( $social_sites as $social_site => $value ) {
		// if email icon
		if ( $social_site == 'email' ) {
			// setting
			$wp_customize->add_setting( "$social_site", array(
				'sanitize_callback' => 'unlimited_sanitize_email',
				'transport'         => 'postMessage'
			) );
			// control
			$wp_customize->add_control( $social_site, array(
				'label'    => __( 'Email Address:', 'unlimited' ),
				'section'  => 'unlimited_social_media_icons',
				'priority' => $priority,
			) );
		} else {

			$label = ucfirst( $social_site );

			if ( $social_site == 'google-plus' ) {
				$label = 'Google Plus';
			} elseif ( $social_site == 'rss' ) {
				$label = 'RSS';
			} elseif ( $social_site == 'soundcloud' ) {
				$label = 'SoundCloud';
			} elseif ( $social_site == 'slideshare' ) {
				$label = 'SlideShare';
			} elseif ( $social_site == 'codepen' ) {
				$label = 'CodePen';
			} elseif ( $social_site == 'stumbleupon' ) {
				$label = 'StumbleUpon';
			} elseif ( $social_site == 'deviantart' ) {
				$label = 'DeviantArt';
			} elseif ( $social_site == 'hacker-news' ) {
				$label = 'Hacker News';
			} elseif ( $social_site == 'whatsapp' ) {
				$label = 'WhatsApp';
			} elseif ( $social_site == 'qq' ) {
				$label = 'QQ';
			} elseif ( $social_site == 'vk' ) {
				$label = 'VK';
			} elseif ( $social_site == 'wechat' ) {
				$label = 'WeChat';
			} elseif ( $social_site == 'tencent-weibo' ) {
				$label = 'Tencent Weibo';
			} elseif ( $social_site == 'paypal' ) {
				$label = 'PayPal';
			} elseif ( $social_site == 'email_form' ) {
				$label = 'Contact Form';
			}

			if ( $social_site == 'skype' ) {
				// setting
				$wp_customize->add_setting( $social_site, array(
					'sanitize_callback' => 'ct_unlimited_sanitize_skype',
					'transport'         => 'postMessage'
				) );
				// control
				$wp_customize->add_control( $social_site, array(
					'type'        => 'url',
					'label'       => $label,
					'description' => sprintf( __( 'Accepts Skype link protocol (<a href="%s" target="_blank">learn more</a>)', 'unlimited' ), 'https://www.competethemes.com/blog/skype-links-wordpress/' ),
					'section'     => 'unlimited_social_media_icons',
					'priority'    => $priority
				) );
			} else {
				// setting
				$wp_customize->add_setting( $social_site, array(
					'sanitize_callback' => 'esc_url_raw',
					'transport'         => 'postMessage'
				) );
				// control
				$wp_customize->add_control( $social_site, array(
					'type'     => 'url',
					'label'    => $label,
					'section'  => 'unlimited_social_media_icons',
					'priority' => $priority
				) );
			}
		}
		// increment the priority for next site
		$priority = $priority + 5;
	}

	/***** Search Bar *****/

	// section
	$wp_customize->add_section( 'unlimited_search_bar', array(
		'title'    => __( 'Search Bar', 'unlimited' ),
		'priority' => 30
	) );
	// setting
	$wp_customize->add_setting( 'search_bar', array(
		'default'           => 'show',
		'sanitize_callback' => 'unlimited_sanitize_all_show_hide_settings',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'search_bar', array(
		'type'    => 'radio',
		'label'   => __( 'Show search bar at top of site?', 'unlimited' ),
		'section' => 'unlimited_search_bar',
		'setting' => 'search_bar',
		'choices' => array(
			'show' => __( 'Show', 'unlimited' ),
			'hide' => __( 'Hide', 'unlimited' )
		),
	) );

	/***** Layout *****/

	// section
	$wp_customize->add_section( 'unlimited_layout', array(
		'title'    => __( 'Layouts', 'unlimited' ),
		'priority' => 45
	) );
	// setting
	$wp_customize->add_setting( 'layout', array(
		'default'           => 'right',
		'sanitize_callback' => 'unlimited_sanitize_layout_settings',
		'transport'         => 'postMessage'
	) );

	// control
	$wp_customize->add_control( 'layout', array(
		'label'       => __( 'Choose your layout:', 'unlimited' ),
		'description' => sprintf( __( 'Want more layouts? <a target="_blank" href="%s">Check out Unlimited Pro</a>.', 'unlimited' ), 'https://www.competethemes.com/unlimited-pro/' ),
		'section'     => 'unlimited_layout',
		'settings'    => 'layout',
		'type'        => 'radio',
		'choices'     => array(
			'right' => __( 'Right sidebar', 'unlimited' ),
			'left'  => __( 'Left sidebar', 'unlimited' ),
		)
	) );

	/***** Blog *****/

	// section
	$wp_customize->add_section( 'unlimited_blog', array(
		'title'    => __( 'Blog', 'unlimited' ),
		'priority' => 60
	) );
	// setting
	$wp_customize->add_setting( 'full_post', array(
		'default'           => 'no',
		'sanitize_callback' => 'unlimited_sanitize_yes_no_settings'
	) );
	// control
	$wp_customize->add_control( 'full_post', array(
		'label'    => __( 'Show full posts on blog?', 'unlimited' ),
		'section'  => 'unlimited_blog',
		'settings' => 'full_post',
		'type'     => 'radio',
		'choices'  => array(
			'yes' => __( 'Yes', 'unlimited' ),
			'no'  => __( 'No', 'unlimited' ),
		)
	) );
	// setting
	$wp_customize->add_setting( 'excerpt_length', array(
		'default'           => '25',
		'sanitize_callback' => 'absint'
	) );
	// control
	$wp_customize->add_control( 'excerpt_length', array(
		'label'    => __( 'Excerpt word count', 'unlimited' ),
		'section'  => 'unlimited_blog',
		'settings' => 'excerpt_length',
		'type'     => 'number'
	) );
	// Read More text - setting
	$wp_customize->add_setting( 'read_more_text', array(
		'default'           => __( 'Read More', 'unlimited' ),
		'sanitize_callback' => 'unlimited_sanitize_text'
	) );
	// Read More text - control
	$wp_customize->add_control( 'read_more_text', array(
		'label'    => __( 'Read More button text', 'unlimited' ),
		'section'  => 'unlimited_blog',
		'settings' => 'read_more_text',
		'type'     => 'text'
	) );

	/***** Comment Display *****/

	// section
	$wp_customize->add_section( 'unlimited_comments_display', array(
		'title'    => __( 'Comment Display', 'unlimited' ),
		'priority' => 65
	) );
	// setting
	$wp_customize->add_setting( 'comments_display', array(
		'default'           => array( 'post', 'page', 'attachment', 'none' ),
		'sanitize_callback' => 'unlimited_sanitize_comments_setting'
	) );
	// control
	$wp_customize->add_control( new unlimited_Multi_Checkbox_Control(
		$wp_customize, 'comments_display', array(
			'label'    => __( 'Show comments on:', 'unlimited' ),
			'section'  => 'unlimited_comments_display',
			'settings' => 'comments_display',
			'type'     => 'multi-checkbox',
			'choices'  => array(
				'post'       => __( 'Posts', 'unlimited' ),
				'page'       => __( 'Pages', 'unlimited' ),
				'attachment' => __( 'Attachments', 'unlimited' ),
				'none'       => __( 'Do not show', 'unlimited' )
			)
		)
	) );

	/***** Custom CSS *****/

	// section
	$wp_customize->add_section( 'unlimited_custom_css', array(
		'title'    => __( 'Custom CSS', 'unlimited' ),
		'priority' => 80
	) );
	// setting
	$wp_customize->add_setting( 'custom_css', array(
		'sanitize_callback' => 'ct_unlimited_sanitize_css',
		'transport'         => 'postMessage'
	) );
	// control
	$wp_customize->add_control( 'custom_css', array(
		'type'     => 'textarea',
		'label'    => __( 'Add Custom CSS Here:', 'unlimited' ),
		'section'  => 'unlimited_custom_css',
		'settings' => 'custom_css'
	) );

}

/***** Custom Sanitization Functions *****/

/*
 * Sanitize settings with show/hide as options
 * Used in: search bar
 */
function unlimited_sanitize_all_show_hide_settings( $input ) {

	$valid = array(
		'show' => __( 'Show', 'unlimited' ),
		'hide' => __( 'Hide', 'unlimited' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

/*
 * sanitize email address
 * Used in: Social Media Icons
 */
function unlimited_sanitize_email( $input ) {
	return sanitize_email( $input );
}

// sanitize layout selection
function unlimited_sanitize_layout_settings( $input ) {

	/*
	 * Also allow layouts only included in the premium plugin.
	 * Needs to be done this way b/c sanitize_callback cannot by updated
	 * via get_setting()
	 */
	$valid = array(
		'right'      => __( 'Right sidebar', 'unlimited' ),
		'left'       => __( 'Left sidebar', 'unlimited' ),
		'narrow'     => __( 'No sidebar - Narrow', 'unlimited' ),
		'wide'       => __( 'No sidebar - Wide', 'unlimited' ),
		'two-right'  => __( 'Two column - Right sidebar', 'unlimited' ),
		'two-left'   => __( 'Two column - Left sidebar', 'unlimited' ),
		'two-narrow' => __( 'Two column - No Sidebar - Narrow', 'unlimited' ),
		'two-wide'   => __( 'Two column - No Sidebar - Wide', 'unlimited' )
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

// sanitize yes/no settings
function unlimited_sanitize_yes_no_settings( $input ) {

	$valid = array(
		'yes' => __( 'Yes', 'unlimited' ),
		'no'  => __( 'No', 'unlimited' ),
	);

	return array_key_exists( $input, $valid ) ? $input : '';
}

function unlimited_sanitize_comments_setting( $input ) {

	$valid = array(
		'post'       => __( 'Posts', 'unlimited' ),
		'page'       => __( 'Pages', 'unlimited' ),
		'attachment' => __( 'Attachments', 'unlimited' ),
		'none'       => __( 'Do not show', 'unlimited' )
	);

	foreach ( $input as $selection ) {

		return array_key_exists( $selection, $valid ) ? $input : '';
	}
}

function unlimited_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function ct_unlimited_sanitize_skype( $input ) {
	return esc_url_raw( $input, array( 'http', 'https', 'skype' ) );
}

/***** Helper Functions *****/

// ajax in search bar content when updated
function unlimited_update_search_bar_ajax() {

	// get the search bar content
	$response = get_template_part( 'content/search-bar' );

	// return it
	echo $response;

	die();
}
add_action( 'wp_ajax_update_search_bar', 'unlimited_update_search_bar_ajax' );

// enable ajaxurl global variable on front-end / customizer
function unlimited_ajaxurl() { ?>
	<script type="text/javascript">
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
	<?php
}
add_action( 'wp_head', 'unlimited_ajaxurl' );

function unlimited_customize_preview_js() {
	$content = "<script>jQuery('#customize-info').prepend('<div class=\"upgrades-ad\"><a href=\"https://www.competethemes.com/unlimited-pro/\" target=\"_blank\">" . __( 'View the Unlimited Pro Plugin', 'unlimited' ) . " <span>&rarr;</span></a></div>');</script>";
	echo apply_filters( 'unlimited_customizer_ad', $content );
}
add_action( 'customize_controls_print_footer_scripts', 'unlimited_customize_preview_js' );

function ct_unlimited_sanitize_css( $css ) {
	$css = wp_kses( $css, array( '\'', '\"' ) );
	$css = str_replace( '&gt;', '>', $css );

	return $css;
}