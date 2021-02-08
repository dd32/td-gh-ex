<?php
/**
 * AyaSpirit functions and definitions
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
 * @subpackage AyaSpirit
 * @author ayatemplates
 * @since AyaSpirit 1.0.0
 *
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'AYASPIRIT_MIN_PHP_VERSION', '5.6' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ayaspirit_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ayaspirit_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, AYASPIRIT_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ayaspirit_min_php_not_met_notice' );
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
function ayaspirit_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ayaspirit' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ayaspirit' ),
				PHP_VERSION,
				AYASPIRIT_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'ayaspirit_setup' ) ) :
/**
 * AyaSpirit setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 *
 */
function ayaspirit_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain( 'ayaspirit', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 0, true );

	// This theme uses wp_nav_menu() in header menu
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'ayaspirit' ),
		'footer'    => esc_html__( 'Footer Menu', 'ayaspirit' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );

	// add the visual editor to resemble the theme style
	add_editor_style( 'css/editor-style.css' );

	// add custom background				 
	add_theme_support( 'custom-background', 
				   array ('default-color'  => '#ffffff')
				 );

	// add content width
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 900;
	}

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
                       'wp-head-callback'       => 'ayaspirit_header_style',
                    ) );

    // add custom logo
    add_theme_support( 'custom-logo', array (
                       'width'                  => 75,
                       'height'                 => 75,
                       'flex-height'            => true,
                       'flex-width'             => true,
                    ) );


}
endif; // ayaspirit_setup
add_action( 'after_setup_theme', 'ayaspirit_setup' );

/**
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function ayaspirit_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Register theme settings in the customizer
 */
function ayaspirit_customize_register( $wp_customize ) {

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'ayaspirit_slider_section',
		array(
			'title'       => esc_html__( 'Slider', 'ayaspirit' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add display slider option
	$wp_customize->add_setting(
			'ayaspirit_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'ayaspirit_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaspirit_slider_display',
							array(
								'label'          => esc_html__( 'Display Slider', 'ayaspirit' ),
								'section'        => 'ayaspirit_slider_section',
								'settings'       => 'ayaspirit_slider_display',
								'type'           => 'checkbox',
							)
						)
	);

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'ayaspirit_footer_section',
		array(
			'title'       => esc_html__( 'Footer', 'ayaspirit' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'ayaspirit_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ayaspirit_footer_copyright',
        array(
            'label'          => esc_html__( 'Copyright Text', 'ayaspirit' ),
            'section'        => 'ayaspirit_footer_section',
            'settings'       => 'ayaspirit_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'ayaspirit_animations_display',
		array(
			'title'       => __( 'Animations', 'ayaspirit' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'ayaspirit_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'ayaspirit_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'ayaspirit_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'ayaspirit' ),
								'section'        => 'ayaspirit_animations_display',
								'settings'       => 'ayaspirit_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}

add_action('customize_register', 'ayaspirit_customize_register');

/**
 * the main function to load scripts in the AyaSpirit theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function ayaspirit_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'ayaspirit-style', get_stylesheet_uri(), array() );
	
	wp_enqueue_style( 'ayaspirit-fonts', ayaspirit_fonts_url(), array(), null );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	// Load Utilities JS Script
	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js', array( 'jquery' ) );

	// Load Slider JS Script
	wp_enqueue_script( 'modernizr-custom-79639',
		get_template_directory_uri() . '/js/modernizr.custom.79639.js',
		array( 'jquery' ) );

	wp_enqueue_script( 'jquery-ba-cond', get_template_directory_uri() . '/js/jquery.ba-cond.js',
		array( 'modernizr-custom-79639' ) );

	wp_enqueue_script( 'jquery-slitslider', get_template_directory_uri() . '/js/jquery.slitslider.js',
		array( 'jquery-ba-cond' ) );

	wp_enqueue_script( 'ayaspirit-utilities', get_template_directory_uri() . '/js/utilities.js', array( 'jquery', 'viewportchecker', 'jquery-slitslider' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('ayaspirit_animations_display', 1) == 1 ),
	);
	wp_localize_script('ayaspirit-utilities', 'ayaspirit_options', $data);
}

add_action( 'wp_enqueue_scripts', 'ayaspirit_load_scripts' );

/**
 *	Load google font url used in the AyaSpirit theme
 */
function ayaspirit_fonts_url() {

    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Titillium Web, translate this to 'off'. Do not translate
    * into your own language.
    */
    $cantarell = _x( 'on', 'Titillium Web font: on or off', 'ayaspirit' );

    if ( 'off' !== $cantarell ) {
        $font_families = array();
 
        $font_families[] = 'Titillium Web';
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
    }
 
    return $fonts_url;
}

/**
 * Display website's logo image
 */
function ayaspirit_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">' . esc_html(get_bloginfo('name') ) . '</h1>';
        echo '</a>';
        echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function ayaspirit_show_copyright_text() {

	$footerText = get_theme_mod('ayaspirit_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function ayaspirit_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 esc_html__( 'Sidebar Widget Area', 'ayaspirit'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  esc_html__( 'The sidebar widget area', 'ayaspirit'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );

	// Register Footer Column #1
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'ayaspirit' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'ayaspirit' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #2
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'ayaspirit' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'ayaspirit' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
	
	// Register Footer Column #3
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #3', 'ayaspirit' ),
							'id' 			 =>  'footer-column-3-widget-area',
							'description'	 =>  __( 'The Footer Column #3 widget area', 'ayaspirit' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="footer-title">',
							'after_title'	 =>  '</h2><div class="footer-after-title"></div>',
						) );
}

add_action( 'widgets_init', 'ayaspirit_widgets_init' );

/**
 * Displays the slider
 */
function ayaspirit_display_slider() {

?>
	<div id="slider" class="sl-slider-wrapper">
		<div class="sl-slider">
<?php
			$args = array( 'numberposts' => '5',
					   	   'post_status'=>'publish',
						 );
			$recent_posts = wp_get_recent_posts( $args );

			for ( $i = 0; $i < 5; ++$i ) {

				$recent = $recent_posts[ $i ];

				/**
				 *	If post has thumbnail image we display it as slide image
				 *  else we display the default slider image
				 */
				$slideImageURL = has_post_thumbnail( $recent['ID'] ) ?
								wp_get_attachment_url( get_post_thumbnail_id( $recent['ID'] ) )
							: get_template_directory_uri().'/images/slider/' . ($i + 1) . '.jpg';
?>
				<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25"
					 data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-<?php echo esc_attr($i); ?>"
								style="background-image: url(<?php echo esc_url($slideImageURL); ?>);">
						</div>
					</div><!-- .sl-slide-inner -->
				</div><!-- .sl-slide -->
<?php 		
			}
?>
		</div><!-- .sl-slider -->

		<nav id="nav-dots" class="nav-dots">
			<?php for ($i = 0; $i < 5; ++$i) { ?>

				<span <?php if ($i == 0) : echo 'class="nav-dot-current"'; endif; ?>></span>

			<?php } ?>
		</nav>
	</div><!-- .sl-slider-wrapper -->
<?php
}

function ayaspirit_header_style() {

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

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ayaspirit_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ayaspirit_skip_link_focus_fix' );

?>
