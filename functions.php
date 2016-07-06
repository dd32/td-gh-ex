<?php
/*
 * fKidd functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

if ( ! function_exists( 'fkidd_setup' ) ) :
/**
 * fKidd setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fkidd_setup() {

	load_theme_textdomain( 'fkidd', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'primary menu', 'fkidd' ),
		'footer'   => __( 'footer menu', 'fkidd' ),
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	if ( ! isset( $content_width ) )
		$content_width = 900;

	add_theme_support( 'automatic-feed-links' );

	// add Custom background				 
	$args = array(
		'default-color' 	 => '#ffffff',
	);
	add_theme_support( 'custom-background', $args );

	// add custom header
	add_theme_support( 'custom-header', array (
					   'default-image'          => '',
					   'random-default'         => false,
					   'width'                  => 113,
					   'height'                 => 40,
					   'flex-height'            => true,
					   'flex-width'             => true,
					   'default-text-color'     => '',
					   'header-text'            => '',
					   'uploads'                => true,
					   'wp-head-callback'       => '',
					   'admin-head-callback'    => '',
					   'admin-preview-callback' => '',
					) );
					
	add_theme_support( "title-tag" );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form', 'comment-list',
	) );

	

	// add the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // fkidd_setup
add_action( 'after_setup_theme', 'fkidd_setup' );

/**
 * Add Social Site control into Customizer
 */
function fkidd_customize_add_social_site($wp_customize, $controlId, $label, $defaultValue) {

	$wp_customize->add_setting(
		$controlId,
		array(
		    'default'           => $defaultValue,
		    'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $controlId,
        array(
            'label'          => $label,
            'section'        => 'fkidd_social_section',
            'settings'       => $controlId,
            'type'           => 'text',
            )
        )
	);
}

/**
 * Register theme settings in the customizer
 */
function fkidd_customize_register( $wp_customize ) {

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'fkidd_slider_section',
		array(
			'title'       => __( 'Slider', 'fkidd' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	for ($i = 1; $i <= 3; ++$i) {
	
		$slideContentId = 'fkidd_slide'.$i.'_content';
		$slideImageId = 'fkidd_slide'.$i.'_image';
		$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
	
		// Add Slide Content
		$wp_customize->add_setting(
			$slideContentId,
			array(
				'default'           => __( '<h2>Lorem ipsum dolor</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fkidd' ),
				'sanitize_callback' => 'force_balance_tags',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
									array(
										'label'          => sprintf( __( 'Slide #%s Content', 'fkidd' ), $i ),
										'section'        => 'fkidd_slider_section',
										'settings'       => $slideContentId,
										'type'           => 'textarea',
										)
									)
		);
		
		// Add Slide Background Image
		$wp_customize->add_setting( $slideImageId,
			array(
				'default' => $defaultSliderImagePath,
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( __( 'Slide #%s Image', 'fkidd' ), $i ),
					'section' 	 => 'fkidd_slider_section',
					'settings'   => $slideImageId,
				) 
			)
		);
	}

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'fkidd_header_and_footer_section',
		array(
			'title'       => __( 'Header and Footer', 'fkidd' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add header phone
	$wp_customize->add_setting(
		'fkidd_header_phone',
		array(
		    'default'           => '1.555.555.555',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fkidd_header_phone',
        array(
            'label'          => __( 'Your phone to appear in the website header', 'fkidd' ),
            'section'        => 'fkidd_header_and_footer_section',
            'settings'       => 'fkidd_header_phone',
            'type'           => 'text',
            )
        )
	);

	// Add header email
	$wp_customize->add_setting(
		'fkidd_header_email',
		array(
		    'default'           => 'info@yoursite.com',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fkidd_header_email',
        array(
            'label'          => __( 'Your e-mail to appear in the website header', 'fkidd' ),
            'section'        => 'fkidd_header_and_footer_section',
            'settings'       => 'fkidd_header_email',
            'type'           => 'text',
            )
        )
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'fkidd_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fkidd_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'fkidd' ),
            'section'        => 'fkidd_header_and_footer_section',
            'settings'       => 'fkidd_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'fkidd_social_section',
		array(
			'title'       => __( 'Social Sites', 'fkidd' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_facebook',
		__( 'Facebook Page URL', 'fkidd' ), '#');

	// Add google+ url
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_google',
		__( 'Google+ Page URL', 'fkidd' ), '#');

	// Add twitter url
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_twitter',
		__( 'Twitter URL', 'fkidd' ), '#');

	// Add LinkedIn
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_linkedin',
		__( 'LinkedIn', 'fkidd' ), '#');

	// Add Instagram
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_instagram',
		__( 'Instagram', 'fkidd' ), '#');

	// Add RSS Feeds url
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_rss',
		__( 'RSS Feeds URL', 'fkidd' ), get_bloginfo( 'rss2_url' ));

	// Add Tumblr Text Control
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_tumblr',
		__( 'Tumblr', 'fkidd' ), '#');

	// Add YouTube channel url
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_youtube',
		__( 'YouTube channel URL', 'fkidd' ), '#');

	// Add Pinterest Text Control
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_pinterest',
		__( 'Pinterest', 'fkidd' ), '#');

	// Add VK Text Control
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_vk',
		__( 'VK', 'fkidd' ), '#');

	// Add Flickr Text Control
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_flickr',
		__( 'Flickr', 'fkidd' ), '#');

	// Add Vine Text Control
	fkidd_customize_add_social_site($wp_customize, 'fkidd_social_vine',
		__( 'Vine', 'fkidd' ), '#');
}
add_action('customize_register', 'fkidd_customize_register');

/**
 * the main function to load scripts in the fKidd theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fkidd_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'fkidd-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'fkidd-fonts', fkidd_fonts_url(), array(), null );
	
	// Load thread comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	
	// Load Utilities JS Script
	wp_enqueue_script( 'fkidd-utilities-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );
	
	wp_enqueue_script( 'jquery.mobile.customized', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'fkidd_load_scripts' );

/**
 *	Load google font url used in the fKidd theme
 */
function fkidd_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lato, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'fkidd' );

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'fkidd' );
 
    if ( 'off' !== $lato || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:400,700,300';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:700italic,400,800,600';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fkidd_widgets_init() {

	// Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fkidd'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fkidd'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
}
add_action( 'widgets_init', 'fkidd_widgets_init' );

function fkidd_display_single_social_site($socialSiteID, $defaultValue, $title, $cssClass) {

	$socialURL = get_theme_mod( $socialSiteID, $defaultValue );
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . esc_url( $title )
							. '" class="' . esc_attr( $cssClass ) . '"></a></li>';
	}

}

/**
 * Display Social Websites
 */
function fkidd_display_social_sites() {

	fkidd_display_single_social_site('fkidd_social_facebook', '#', __('Follow us on Facebook', 'fkidd'), 'facebook16' );

	fkidd_display_single_social_site('fkidd_social_google', '#', __('Follow us on Google+', 'fkidd'), 'google16' );

	fkidd_display_single_social_site('fkidd_social_twitter', '#', __('Follow us on Twitter', 'fkidd'), 'twitter16' );

	fkidd_display_single_social_site('fkidd_social_linkedin', '#', __('Follow us on LinkedIn', 'fkidd'), 'linkedin16' );

	fkidd_display_single_social_site('fkidd_social_instagram', '#', __('Follow us on Instagram', 'fkidd'), 'instagram16' );

	fkidd_display_single_social_site('fkidd_social_rss', get_bloginfo( 'rss2_url' ), __('Follow our RSS Feeds', 'fkidd'), 'rss16' );

	fkidd_display_single_social_site('fkidd_social_tumblr', '#', __('Follow us on Tumblr', 'fkidd'), 'tumblr16' );

	fkidd_display_single_social_site('fkidd_social_youtube', '#', __('Follow us on Youtube', 'fkidd'), 'youtube16' );

	fkidd_display_single_social_site('fkidd_social_pinterest', '#', __('Follow us on Pinterest', 'fkidd'), 'pinterest16' );

	fkidd_display_single_social_site('fkidd_social_vk', '#', __('Follow us on VK', 'fkidd'), 'vk16' );

	fkidd_display_single_social_site('fkidd_social_flickr', '#', __('Follow us on Flickr', 'fkidd'), 'flickr16' );

	fkidd_display_single_social_site('fkidd_social_vine', '#', __('Follow us on Vine', 'fkidd'), 'vine16' );
}

/**
 *	Displays the header phone.
 */
function fkidd_show_header_phone() {

	$phone = get_theme_mod('fkidd_header_phone', '1.555.555.555');

	if ( !empty( $phone ) ) {

		echo '<span id="header-phone">' . esc_html($phone) . '</span>';
	}
}

/**
 *	Displays the header email.
 */
function fkidd_show_header_email() {

	$email = get_theme_mod('fkidd_header_email', 'info@yoursite.com');

	if ( !empty( $email ) ) {

		echo '<span id="header-email"><a href="mailto:' . antispambot($email, 1) . '" title="' . esc_attr($email) . '">'
				. esc_html($email) . '</a></span>';
	}
}

/**
 *	Displays the copyright text.
 */
function fkidd_show_copyright_text() {

	$footerText = get_theme_mod('fkidd_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

function fkidd_show_website_logo_image_or_title() {

	if ( get_header_image() != '' ) {
	
		// Check if the user selected a header Image in the Customizer or the Header Menu
		$logoImgPath = get_header_image();
		$siteTitle = get_bloginfo( 'name' );
		$imageWidth = get_custom_header()->width;
		$imageHeight = get_custom_header()->height;
		
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		echo '<img src="' . esc_url( $logoImgPath ) . '" alt="' . esc_attr( $siteTitle ) . '" title="' . esc_attr( $siteTitle ) . '" width="' . esc_attr( $imageWidth ) . '" height="' . esc_attr( $imageHeight ) . '" />';
		
		echo '</a>';

	} else {
	
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		echo '<h1>'.get_bloginfo('name').'</h1>';
		
		echo '</a>';
		
		echo '<strong>'.get_bloginfo('description').'</strong>';
	}
}

/**
 * Displays the slider
 */
function fkidd_display_slider() { ?>
	 
	<div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {

					$defaultSlideContent = __( '<h3>Lorem ipsum dolor</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fkidd' );
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'fkidd_slide'.$i.'_content', html_entity_decode( $defaultSlideContent ) );
					$slideImage = get_theme_mod( 'fkidd_slide'.$i.'_image', $defaultSlideImage );

				?>

					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<div class="camera_caption fadeFromBottom">
							<?php echo $slideContent; ?>
						</div>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
<?php  
}

/**
 *	Used to load the content for posts and pages.
 */
function fkidd_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
?>

		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
								
<?php
	}
	the_content( __( 'Read More', 'fkidd') );
}

/**
 *	Displays the single content.
 */
function fkidd_the_content_single() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {

		the_post_thumbnail();
	}
	the_content( __( 'Read More...', 'fkidd') );
}

/*
Enqueue Script for top buttons
*/
function fkidd_customizer_controls(){

	wp_register_script( 'fkidd_customizer_top_buttons', get_template_directory_uri() . '/js/customizer-top-buttons.js', array( 'jquery' ), true  );
	wp_enqueue_script( 'fkidd_customizer_top_buttons' );

	wp_localize_script( 'fkidd_customizer_top_buttons', 'customBtns', array(
		'prodemo' => esc_html__( 'Demo Premium version', 'fkidd' ),
        'proget' => esc_html__( 'Get Premium version', 'fkidd' )
	) );
}
add_action( 'customize_controls_enqueue_scripts', 'fkidd_customizer_controls' );

?>