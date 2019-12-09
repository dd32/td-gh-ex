<?php
/**
 * fCorpo functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage fCorpo
 * @author tishonator
 * @since fCorpo 1.0.0
 *
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'FCORPO_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'fcorpo_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function fcorpo_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, FCORPO_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'fcorpo_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function fcorpo_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'fcorpo' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'fcorpo' ),
				PHP_VERSION,
				FCORPO_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'fcorpo_setup' ) ) {
	/**
	 * fCorpo setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function fcorpo_setup() {

		load_theme_textdomain( 'fcorpo', get_template_directory() . '/languages' );

		add_theme_support( "title-tag" );

		// add the visual editor to resemble the theme style
		add_editor_style( 'css/editor-style.css' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'top'   => __( 'top menu', 'fcorpo' ),
			'primary'   => __( 'Primary Menu', 'fcorpo' ),
			'footer'   => __( 'Footer Menu', 'fcorpo' ),
		) );

		// add Custom background				 
		add_theme_support( 'custom-background', 
					   array ('default-color'  => '#FFFFFF')
					 );


		add_theme_support( 'post-thumbnails' );
	

		global $content_width;
		if ( ! isset( $content_width ) )
			$content_width = 900;

		add_theme_support( 'automatic-feed-links' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form', 'comment-list',
		) );

		// add custom header
	    add_theme_support( 'custom-header', array (
	                       'default-image'          => '',
	                       'random-default'         => '',
	                       'flex-height'            => true,
	                       'flex-width'             => true,
	                       'uploads'                => true,
	                       'width'                  => 900,
	                       'height'                 => 100,
	                       'default-text-color'        => '#000000',
	                       'wp-head-callback'       => 'fcorpo_header_style',
	                    ) );

	    // add custom logo
	    add_theme_support( 'custom-logo', array (
	                       'width'                  => 145,
	                       'height'                 => 36,
	                       'flex-height'            => true,
	                       'flex-width'             => true,
	                    ) );

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
					'post_title' => _x( 'Slider Image 1', 'Theme starter content', 'fcorpo' ),
					'file' => 'images/slider/1.jpg', // URL relative to the template directory.
				),
				'image-slide-2' => array(
					'post_title' => _x( 'Slider Image 2', 'Theme starter content', 'fcorpo' ),
					'file' => 'images/slider/2.jpg', // URL relative to the template directory.
				),
				'image-slide-3' => array(
					'post_title' => _x( 'Slider Image 3', 'Theme starter content', 'fcorpo' ),
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
				'fcorpo_slider_display' => 1,
				'fcorpo_slide1_image' => '{{image-slider-1}}',
				'fcorpo_slide1_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fcorpo' ),
				'fcorpo_slide2_image' => '{{image-slider-2}}',
				'fcorpo_slide2_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fcorpo' ),
				'fcorpo_slide3_image' => '{{image-slider-3}}',
				'fcorpo_slide3_content' => _x( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_facebook' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_twitter' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_linkedin' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_instagram' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_rss' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_tumblr' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_youtube' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_pinterest' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_vk' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_flickr' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_social_vine' => _x( '#', 'Theme starter content', 'fcorpo' ),
				'fcorpo_header_phone' => _x( 'info@example.com', 'Theme starter content', 'fcorpo' ),
				'fcorpo_header_email' => _x( '1.555.555.555', 'Theme starter content', 'fcorpo' ),
			),

			'nav_menus' => array(
				// Assign a menu to the "top" location.
				'top' => array(
					'name' => __( 'Top Menu', 'fcorpo' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),

				// Assign a menu to the "primary" location.
				'primary' => array(
					'name' => __( 'Primary Menu', 'fcorpo' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),

				// Assign a menu to the "footer" location.
				'footer' => array(
					'name' => __( 'Footer Menu', 'fcorpo' ),
					'items' => array(
						'link_home',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
			),
		);

		$starter_content = apply_filters( 'fcorpo_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );
	}
} // fcorpo_setup
add_action( 'after_setup_theme', 'fcorpo_setup' );

/**
 * the main function to load scripts in the fCorpo theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fcorpo_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'fcorpo-style', get_stylesheet_uri(), array( ) );
	
	wp_enqueue_style( 'fcorpo-fonts', fcorpo_fonts_url(), array(), null );
	
	// Load thread comments reply script	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );

	wp_enqueue_script( 'fcorpo-js', get_template_directory_uri() . '/js/utilities.js',
			array( 'jquery', 'viewportchecker' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('fcorpo_animations_display', 1) == 1 ),
	);
	wp_localize_script('fcorpo-js', 'fcorpo_options', $data);

	// Load Slider JS Scripts
	
	wp_enqueue_script( 'jquery.easing.1.3', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'fcorpo_load_scripts' );

/**
 *	Load google font url used in the fCorpo theme
 */
function fcorpo_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by PT Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $cantarell = _x( 'on', 'Dosis font: on or off', 'fcorpo' );

    if ( 'off' !== $cantarell ) {
        $font_families = array();
 
        $font_families[] = 'Dosis:400,300,200,500,700';
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            //t 'subset' => urlencode( 'latin,cyrillic-ext,cyrillic,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Display website's logo image
 */
function fcorpo_show_website_logo_image_and_title() {

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
 *	Displays the header phone.
 */
function fcorpo_show_header_phone() {

	$phone = get_theme_mod('fcorpo_header_phone');

	if ( !empty( $phone ) ) {

		echo '<span id="header-phone">' . esc_html($phone) . '</span>';
	}
}

/**
 *	Displays the header email.
 */
function fcorpo_show_header_email() {

	$email = get_theme_mod('fcorpo_header_email');

	if ( !empty( $email ) ) {

		echo '<span id="header-email"><a href="mailto:' . antispambot($email, 1) . '" title="' . esc_attr($email) . '">'
				. esc_html($email) . '</a></span>';
	}
}

/**
 *	Displays the copyright text.
 */
function fcorpo_show_copyright_text() {

	$footerText = get_theme_mod('fcorpo_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function fcorpo_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'fcorpo'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'fcorpo'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	/**
	 * Add Homepage Columns Widget areas
	 */
	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #1', 'fcorpo' ),
							'id' 			 =>  'homepage-column-1-widget-area',
							'description'	 =>  __( 'The Homepage Column #1 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );
						
	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #2', 'fcorpo' ),
							'id' 			 =>  'homepage-column-2-widget-area',
							'description'	 =>  __( 'The Homepage Column #2 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );

	register_sidebar( array (
							'name'			 =>  __( 'Homepage Column #3', 'fcorpo' ),
							'id' 			 =>  'homepage-column-3-widget-area',
							'description'	 =>  __( 'The Homepage Column #3 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );

	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'fcorpo' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'fcorpo' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'fcorpo' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'fcorpo' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}
add_action( 'widgets_init', 'fcorpo_widgets_init' );

/**
 * Displays the slider
 */
function fcorpo_display_slider() { ?>
	 
	<div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'fcorpo_slide'.$i.'_content' );
					$slideImage = get_theme_mod( 'fcorpo_slide'.$i.'_image' );

				?>

					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<?php if ( $slideContent ) : ?>
								<div class="camera_caption fadeFromBottom">
									<?php echo $slideContent; ?>
								</div>
						<?php endif; ?>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
<?php  
}

function fcorpo_display_social_sites() {

	echo '<ul class="header-social-widget">';

	$socialURL = get_theme_mod('fcorpo_social_facebook');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'fcorpo') . '" class="facebook16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_twitter');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'fcorpo') . '" class="twitter16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_linkedin');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkedIn', 'fcorpo') . '" class="linkedin16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_instagram');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'fcorpo') . '" class="instagram16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_rss');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'fcorpo') . '" class="rss16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_tumblr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Tumblr', 'fcorpo') . '" class="tumblr16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_youtube');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'fcorpo') . '" class="youtube16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_pinterest');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Pinterest', 'fcorpo') . '" class="pinterest16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_vk');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on VK', 'fcorpo') . '" class="vk16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_flickr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Flickr', 'fcorpo') . '" class="flickr16"></a></li>';
	}

	$socialURL = get_theme_mod('fcorpo_social_vine');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Vine', 'fcorpo') . '" class="vine16"></a></li>';
	}

	echo '</ul>';
}

if ( ! function_exists( 'fcorpo_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function fcorpo_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // fcorpo_sanitize_checkbox

if ( ! function_exists( 'fcorpo_sanitize_html' ) ) :

	function fcorpo_sanitize_html( $html ) {
		return wp_filter_post_kses( $html );
	}

endif; // fcorpo_sanitize_html

if ( ! function_exists( 'fcorpo_sanitize_url' ) ) :

	function fcorpo_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // fcorpo_sanitize_url

if ( ! function_exists( 'fcorpo_sanitize_email' ) ) :

	function fcorpo_sanitize_email( $email, $setting ) {
		// Strips out all characters that are not allowable in an email address.
		$email = sanitize_email( $email );
		
		// If $email is a valid email, return it; otherwise, return the default.
		return ( ! is_null( $email ) ? $email : $setting->default );
	}

endif; // fcorpo_sanitize_email


/**
 * Register theme settings in the customizer
 */
function fcorpo_customize_register( $wp_customize ) {

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'fcorpo_slider_section',
		array(
			'title'       => __( 'Slider', 'fcorpo' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display slider option
	$wp_customize->add_setting(
			'fcorpo_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'fcorpo_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_slider_display',
							array(
								'label'          => __( 'Display Slider on a Static Front Page', 'fcorpo' ),
								'section'        => 'fcorpo_slider_section',
								'settings'       => 'fcorpo_slider_display',
								'type'           => 'checkbox',
							)
						)
	);
	
	for ($i = 1; $i <= 3; ++$i) {
	
		$slideContentId = 'fcorpo_slide'.$i.'_content';
		$slideImageId = 'fcorpo_slide'.$i.'_image';
		$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
	
		// Add Slide Content
		$wp_customize->add_setting(
			$slideContentId,
			array(
				'sanitize_callback' => 'fcorpo_sanitize_html',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
									array(
										'label'          => sprintf( esc_html__( 'Slide #%s Content', 'fcorpo' ), $i ),
										'section'        => 'fcorpo_slider_section',
										'settings'       => $slideContentId,
										'type'           => 'textarea',
										)
									)
		);
		
		// Add Slide Background Image
		$wp_customize->add_setting( $slideImageId,
			array(
				'default' => $defaultSliderImagePath,
				'sanitize_callback' => 'fcorpo_sanitize_url'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'fcorpo' ), $i ),
					'section' 	 => 'fcorpo_slider_section',
					'settings'   => $slideImageId,
				) 
			)
		);
	}

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'fcorpo_header_and_footer_section',
		array(
			'title'       => __( 'Header and Footer', 'fcorpo' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add header phone
	$wp_customize->add_setting(
		'fcorpo_header_phone',
		array(
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_header_phone',
        array(
            'label'          => __( 'Your phone to appear in the website header', 'fcorpo' ),
            'section'        => 'fcorpo_header_and_footer_section',
            'settings'       => 'fcorpo_header_phone',
            'type'           => 'text',
            )
        )
	);

	// Add header email
	$wp_customize->add_setting(
		'fcorpo_header_email',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_email',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_header_email',
        array(
            'label'          => __( 'Your e-mail to appear in the website header', 'fcorpo' ),
            'section'        => 'fcorpo_header_and_footer_section',
            'settings'       => 'fcorpo_header_email',
            'type'           => 'text',
            )
        )
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'fcorpo_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'fcorpo' ),
            'section'        => 'fcorpo_header_and_footer_section',
            'settings'       => 'fcorpo_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'fcorpo_social_section',
		array(
			'title'       => __( 'Social Sites', 'fcorpo' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add facebook url
	$wp_customize->add_setting(
		'fcorpo_social_facebook',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_facebook',
        array(
            'label'          => __( 'Facebook Page URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_facebook',
            'type'           => 'text',
            )
        )
	);

	// Add Twitter url
	$wp_customize->add_setting(
		'fcorpo_social_twitter',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_twitter',
        array(
            'label'          => __( 'Twitter URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_twitter',
            'type'           => 'text',
            )
        )
	);

	// Add LinkedIn url
	$wp_customize->add_setting(
		'fcorpo_social_linkedin',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_linkedin',
        array(
            'label'          => __( 'LinkedIn URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_linkedin',
            'type'           => 'text',
            )
        )
	);

	// Add Instagram url
	$wp_customize->add_setting(
		'fcorpo_social_instagram',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_instagram',
        array(
            'label'          => __( 'LinkedIn URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_instagram',
            'type'           => 'text',
            )
        )
	);

	// Add RSS Feeds url
	$wp_customize->add_setting(
		'fcorpo_social_rss',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_rss',
        array(
            'label'          => __( 'RSS Feeds URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_rss',
            'type'           => 'text',
            )
        )
	);

	// Add Tumblr url
	$wp_customize->add_setting(
		'fcorpo_social_tumblr',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_tumblr',
        array(
            'label'          => __( 'Tumblr URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_tumblr',
            'type'           => 'text',
            )
        )
	);

	// Add YouTube channel url
	$wp_customize->add_setting(
		'fcorpo_social_youtube',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_youtube',
        array(
            'label'          => __( 'YouTube channel URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_youtube',
            'type'           => 'text',
            )
        )
	);

	// Add Pinterest url
	$wp_customize->add_setting(
		'fcorpo_social_pinterest',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_pinterest',
        array(
            'label'          => __( 'Pinterest URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_pinterest',
            'type'           => 'text',
            )
        )
	);

	// Add VK url
	$wp_customize->add_setting(
		'fcorpo_social_vk',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_vk',
        array(
            'label'          => __( 'VK URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_vk',
            'type'           => 'text',
            )
        )
	);

	// Add Flickr url
	$wp_customize->add_setting(
		'fcorpo_social_flickr',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_flickr',
        array(
            'label'          => __( 'Flickr URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_flickr',
            'type'           => 'text',
            )
        )
	);

	// Add Vine url
	$wp_customize->add_setting(
		'fcorpo_social_vine',
		array(
		    'sanitize_callback' => 'fcorpo_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fcorpo_social_vine',
        array(
            'label'          => __( 'Vine URL', 'fcorpo' ),
            'section'        => 'fcorpo_social_section',
            'settings'       => 'fcorpo_social_vine',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'fcorpo_animations_display',
		array(
			'title'       => __( 'Animations', 'fcorpo' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'fcorpo_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'fcorpo_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'fcorpo_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'fcorpo' ),
								'section'        => 'fcorpo_animations_display',
								'settings'       => 'fcorpo_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}
add_action('customize_register', 'fcorpo_customize_register');

function fcorpo_header_style() {

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

function fcorpo_nav_wrap() {

	// open the <ul>, set 'menu_class' and 'menu_id' values
		$wrap  = '<ul id="%1$s" class="%2$s">';

  	// get nav items as configured in /wp-admin/
  	$wrap .= '%3$s';

  	if ( class_exists( 'WooCommerce' ) ) {

  		global $woocommerce;

		$wrap .= '<li><a class="cart-contents-icon" href="'.wc_get_cart_url().'" title="'.__('View your shopping cart', 'fcorpo')
				   .'"></a><div id="cart-popup-content"><div class="widget_shopping_cart_content"></div></div></li>';

	}

		// close the <ul>
		$wrap .= '</ul>';

		// return the result
		return $wrap;
}

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function fcorpo_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'fcorpo_skip_link_focus_fix' );

?>
