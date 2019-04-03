<?php
/*
 * fGymm functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'fgymm_setup' ) ) :
/**
 * fgymm setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function fgymm_setup() {

	load_theme_textdomain( 'fgymm', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'fgymm' ),
		'footer'    => __( 'Footer Menu', 'fgymm' ),
	) );

	add_theme_support( 'post-thumbnails' );
	

	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 900;

	add_theme_support( 'automatic-feed-links' );

	// add Custom background				 
	$args = array(
		'default-color' 	 => '#FFFFFF',
	);
	add_theme_support( 'custom-background', $args );

	// add custom header
    add_theme_support( 'custom-header', array (
                       'default-image'          => '',
                       'random-default'         => '',
                       'flex-height'            => true,
                       'flex-width'             => true,
                       'uploads'                => true,
                       'width'                  => 900,
                       'height'                 => 100,
                       'default-text-color'        => '#cccccc',
                       'wp-head-callback'       => 'fgymm_header_style',
                    ) );

    // add custom logo
    add_theme_support( 'custom-logo', array (
                       'width'                  => 145,
                       'height'                 => 36,
                       'flex-height'            => true,
                       'flex-width'             => true,
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
	add_editor_style( array( 'css/editor-style.css', get_template_directory_uri() . '/style.css' ) );

	// add WooCommerce support
	add_theme_support( 'woocommerce' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(

		'widgets' => array(
			'sidebar-widget-area' => array(
				'search',
				'recent-posts',
				'categories',
				'archives',
			),

			'homepage-column-1-widget-area' => array(
				'text_business_info'
			),

			'homepage-column-2-widget-area' => array(
				'text_about'
			),

			'homepage-column-3-widget-area' => array(
				'meta'
			),

			'footer-column-1-widget-area' => array(
				'recent-comments'
			),

			'footer-column-2-widget-area' => array(
				'recent-posts'
			),

			'footer-column-3-widget-area' => array(
				'calendar'
			),
		),

		'posts' => array(
			'home',
			'blog',
			'about',
			'contact'
		),

		// Create the custom image attachments used as slides
		'attachments' => array(
			'image-slide-1' => array(
				'post_title' => _x( 'Slider Image 1', 'Theme starter content', 'fgymm' ),
				'file' => 'images/slider/1.jpg', // URL relative to the template directory.
			),
			'image-slide-2' => array(
				'post_title' => _x( 'Slider Image 2', 'Theme starter content', 'fgymm' ),
				'file' => 'images/slider/2.jpg', // URL relative to the template directory.
			),
			'image-slide-3' => array(
				'post_title' => _x( 'Slider Image 3', 'Theme starter content', 'fgymm' ),
				'file' => 'images/slider/3.jpg', // URL relative to the template directory.
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'fgymm_slider_display' => 1,
			'fgymm_slide1_image' => '{{image-slider-1}}',
			'fgymm_slide1_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fgymm' ),
			'fgymm_slide2_image' => '{{image-slider-2}}',
			'fgymm_slide2_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fgymm' ),
			'fgymm_slide3_image' => '{{image-slider-3}}',
			'fgymm_slide3_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fgymm' ),
			'fgymm_social_facebook' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_twitter' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_linkedin' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_instagram' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_rss' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_tumblr' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_youtube' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_pinterest' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_vk' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_flickr' => _x( '#', 'Theme starter content', 'fgymm' ),
			'fgymm_social_vine' => _x( '#', 'Theme starter content', 'fgymm' ),
		),

		'nav_menus' => array(
			// Assign a menu to the "primary" location.
			'primary' => array(
				'name' => __( 'Primary Menu', 'fgymm' ),
				'items' => array(
					'link_home',
					'page_blog',
					'page_contact',
					'page_about',
				),
			),

			// Assign a menu to the "footer" location.
			'footer' => array(
				'name' => __( 'Footer Menu', 'fgymm' ),
				'items' => array(
					'link_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
		),
	);

	$starter_content = apply_filters( 'fgymm_starter_content', $starter_content );
	add_theme_support( 'starter-content', $starter_content );
}
endif; // fgymm_setup
add_action( 'after_setup_theme', 'fgymm_setup' );

/**
 * the main function to load scripts in the fgymm theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fgymm_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'fgymm-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'fgymm-fonts', fgymm_fonts_url(), array(), null );
	
	// Load thread comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	
	// Load Utilities JS Script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );

	wp_enqueue_script( 'fgymm-utilities-js', get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('fgymm_animations_display', 1) == 1 ),
	);
	wp_localize_script('fgymm-utilities-js', 'fgymm_options', $data);
	
	
	wp_enqueue_script( 'jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'fgymm_load_scripts' );

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fgymm_widgets_init() {

	// Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fgymm'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fgymm'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	/**
	 * Add Homepage Columns Widget areas
	 */
	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #1', 'fgymm' ),
							'id' 			 =>  'homepage-column-1-widget-area',
							'description'	 =>  __( 'The Homepage Column #1 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="home-col-title">',
							'after_title'	 =>  '</h2><div class="home-col-after-title"></div>',
						) );
						
	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #2', 'fgymm' ),
							'id' 			 =>  'homepage-column-2-widget-area',
							'description'	 =>  __( 'The Homepage Column #2 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="home-col-title">',
							'after_title'	 =>  '</h2><div class="home-col-after-title"></div>',
						) );

	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #3', 'fgymm' ),
							'id' 			 =>  'homepage-column-3-widget-area',
							'description'	 =>  __( 'The Homepage Column #3 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="home-col-title">',
							'after_title'	 =>  '</h2><div class="home-col-after-title"></div>',
						) );


	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'fgymm' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'fgymm' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'fgymm' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'fgymm' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}
add_action( 'widgets_init', 'fgymm_widgets_init' );

/**
 *	Load google font url used in the fgymm theme
 */
function fgymm_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $pt_sans = _x( 'on', 'PT Sans font: on or off', 'fgymm' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'fgymm' );
 
    if ( 'off' !== $pt_sans || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $pt_sans ) {
            $font_families[] = 'PT+Sans:400,400italic,700,700italic';
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

function fgymm_show_social_sites() {

	$socialURL = get_theme_mod('fgymm_social_facebook');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'fgymm') . '" class="facebook16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_twitter');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'fgymm') . '" class="twitter16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_linkedin');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkedIn', 'fgymm') . '" class="linkedin16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_instagram');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'fgymm') . '" class="instagram16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_rss');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'fgymm') . '" class="rss16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_tumblr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Tumblr', 'fgymm') . '" class="tumblr16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_youtube');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'fgymm') . '" class="youtube16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_pinterest');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Pinterest', 'fgymm') . '" class="pinterest16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_vk');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on VK', 'fgymm') . '" class="vk16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_flickr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Flickr', 'fgymm') . '" class="flickr16"></a></li>';
	}

	$socialURL = get_theme_mod('fgymm_social_vine');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Vine', 'fgymm') . '" class="vine16"></a></li>';
	}
}

/**
 * Display website's logo image
 */
function fgymm_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">' . esc_html( get_bloginfo('name') ) . '</h1>';
        echo '</a>';
        echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function fgymm_show_copyright_text() {
	
	$footerText = get_theme_mod('fgymm_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 * Displays the slider
 */
function fgymm_display_slider() {
?>
	<div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'fgymm_slide'.$i.'_content' );
					$slideImage = get_theme_mod( 'fgymm_slide'.$i.'_image', $defaultSlideImage );
				?>
					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<?php if ($slideContent) : ?>
								<div class="camera_caption fadeFromBottom">
									<?php echo $slideContent; ?>
								</div>
						<?php endif; ?>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
<?php 
}

/**
 *	Used to load the content for posts and pages.
 */
function fgymm_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
?>

		<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
								
<?php
	}
	the_content( __( 'Read More', 'fgymm') );
}

/**
 *	Displays the single content.
 */
function fgymm_the_content_single() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {

		the_post_thumbnail();
	}
	the_content( __( 'Read More...', 'fgymm') );
}

if ( ! function_exists( 'fgymm_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function fgymm_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // fgymm_sanitize_checkbox

if ( ! function_exists( 'fgymm_sanitize_html' ) ) :

	function fgymm_sanitize_html( $html ) {
		return wp_filter_post_kses( $html );
	}

endif; // fgymm_sanitize_html

if ( ! function_exists( 'fgymm_sanitize_url' ) ) :

	function fgymm_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // fgymm_sanitize_url

/**
 * Register theme settings in the customizer
 */
function fgymm_customize_register( $wp_customize ) {

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'fgymm_slider_section',
		array(
			'title'       => __( 'Slider', 'fgymm' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display slider option
	$wp_customize->add_setting(
			'fgymm_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'fgymm_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_slider_display',
							array(
								'label'          => __( 'Display Slider on a Static Front Page', 'fgymm' ),
								'section'        => 'fgymm_slider_section',
								'settings'       => 'fgymm_slider_display',
								'type'           => 'checkbox',
							)
						)
	);
	
	for ($i = 1; $i <= 3; ++$i) {
	
		$slideContentId = 'fgymm_slide'.$i.'_content';
		$slideImageId = 'fgymm_slide'.$i.'_image';
		$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
	
		// Add Slide Content
		$wp_customize->add_setting(
			$slideContentId,
			array(
				'sanitize_callback' => 'fgymm_sanitize_html',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
									array(
										'label'          => sprintf( esc_html__( 'Slide #%s Content', 'fgymm' ), $i ),
										'section'        => 'fgymm_slider_section',
										'settings'       => $slideContentId,
										'type'           => 'textarea',
										)
									)
		);
		
		// Add Slide Background Image
		$wp_customize->add_setting( $slideImageId,
			array(
				'default' => $defaultSliderImagePath,
				'sanitize_callback' => 'fgymm_sanitize_url'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'fgymm' ), $i ),
					'section' 	 => 'fgymm_slider_section',
					'settings'   => $slideImageId,
				) 
			)
		);
	}

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'fgymm_footer_section',
		array(
			'title'       => __( 'Footer', 'fgymm' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'fgymm_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'fgymm' ),
            'section'        => 'fgymm_footer_section',
            'settings'       => 'fgymm_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'fgymm_social_section',
		array(
			'title'       => __( 'Social Sites', 'fgymm' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	$wp_customize->add_setting(
		'fgymm_social_facebook',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_facebook',
        array(
            'label'          => __( 'Facebook Page URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_facebook',
            'type'           => 'text',
            )
        )
	);

	// Add Twitter url
	$wp_customize->add_setting(
		'fgymm_social_twitter',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_twitter',
        array(
            'label'          => __( 'Twitter URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_twitter',
            'type'           => 'text',
            )
        )
	);

	// Add LinkedIn url
	$wp_customize->add_setting(
		'fgymm_social_linkedin',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_linkedin',
        array(
            'label'          => __( 'LinkedIn URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_linkedin',
            'type'           => 'text',
            )
        )
	);

	// Add Instagram url
	$wp_customize->add_setting(
		'fgymm_social_instagram',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_instagram',
        array(
            'label'          => __( 'LinkedIn URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_instagram',
            'type'           => 'text',
            )
        )
	);

	// Add RSS Feeds url
	$wp_customize->add_setting(
		'fgymm_social_rss',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_rss',
        array(
            'label'          => __( 'RSS Feeds URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_rss',
            'type'           => 'text',
            )
        )
	);

	// Add Tumblr url
	$wp_customize->add_setting(
		'fgymm_social_tumblr',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_tumblr',
        array(
            'label'          => __( 'Tumblr URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_tumblr',
            'type'           => 'text',
            )
        )
	);

	// Add YouTube channel url
	$wp_customize->add_setting(
		'fgymm_social_youtube',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_youtube',
        array(
            'label'          => __( 'YouTube channel URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_youtube',
            'type'           => 'text',
            )
        )
	);

	// Add Pinterest url
	$wp_customize->add_setting(
		'fgymm_social_pinterest',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_pinterest',
        array(
            'label'          => __( 'Pinterest URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_pinterest',
            'type'           => 'text',
            )
        )
	);

	// Add VK url
	$wp_customize->add_setting(
		'fgymm_social_vk',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_vk',
        array(
            'label'          => __( 'VK URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_vk',
            'type'           => 'text',
            )
        )
	);

	// Add Flickr url
	$wp_customize->add_setting(
		'fgymm_social_flickr',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_flickr',
        array(
            'label'          => __( 'Flickr URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_flickr',
            'type'           => 'text',
            )
        )
	);

	// Add Vine url
	$wp_customize->add_setting(
		'fgymm_social_vine',
		array(
		    'sanitize_callback' => 'fgymm_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_vine',
        array(
            'label'          => __( 'Vine URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_vine',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'fgymm_animations_display',
		array(
			'title'       => __( 'Animations', 'fgymm' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'fgymm_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'fgymm_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'fgymm_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'fgymm' ),
								'section'        => 'fgymm_animations_display',
								'settings'       => 'fgymm_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}
add_action('customize_register', 'fgymm_customize_register');

/**
 *	Displays date for blog posts
 */
function fgymm_show_post_date() { 

	?>
	<div class="postdate">
		<div class="day">
			<?php echo get_the_date( 'd' ); ?>
		</div>
		<div class="month">
			<?php echo get_the_date( 'M' ); ?>
		</div>
		<div class="year">
			<?php echo get_the_date( 'Y' ); ?>
		</div>
	</div>
<?php
}

function fgymm_header_style() {

    $header_text_color = get_header_textcolor();

    if ( ! has_header_image()
        && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
             || 'blank' === $header_text_color ) ) {

        return;
    }

    $headerImage = get_header_image();
?>
    <style type="text/css">
        <?php if ( has_header_image() ) : ?>

                #header-main-fixed {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

        <?php endif; ?>

        <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                    && 'blank' !== $header_text_color ) : ?>

                #header-main-fixed, #header-main-fixed h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

        <?php endif; ?>
    </style>
<?php

}

function fgymm_nav_wrap() {

	// open the <ul>, set 'menu_class' and 'menu_id' values
	$wrap  = '<ul id="%1$s" class="%2$s">';

  	// get nav items as configured in /wp-admin/
  	$wrap .= '%3$s';

  	if ( class_exists( 'WooCommerce' ) ) {

  		global $woocommerce;

		$wrap .= '<li><a class="cart-contents-icon" href="'.wc_get_cart_url().'" title="'.__('View your shopping cart', 'fgymm')
				   .'"></a><div id="cart-popup-content"><div class="widget_shopping_cart_content"></div></div></li>';

	}

	// close the <ul>
	$wrap .= '</ul>';

	// return the result
	return $wrap;
}

?>