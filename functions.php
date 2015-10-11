<?php
/*
 * fGymm functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 */

if ( ! function_exists( 'fgymm_setup' ) ) :
/**
 * fGymm setup.
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
		'primary'   => __( 'primary menu', 'fgymm' ),
	) );

	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 'full', 'full', true );

	if ( ! isset( $content_width ) )
		$content_width = 900;

	add_theme_support( 'automatic-feed-links' );

	// add Custom background				 
	$args = array(
		'default-color' 	 => '#555555',
		'default-image' 	 => '%1$s/images/background.jpg',
		'default-attachment' => 'fixed',
	);
	add_theme_support( 'custom-background', $args );

	// add custom header
	add_theme_support( 'custom-header', array (
					   'default-image'          => '',
					   'random-default'         => false,
					   'width'                  => 0,
					   'height'                 => 0,
					   'flex-height'            => false,
					   'flex-width'             => false,
					   'default-text-color'     => '',
					   'header-text'            => true,
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
		'search-form', 'comment-form', 'comment-list',
	) );

	// add support for Post Formats.
	add_theme_support( 'post-formats', array (
											'aside',
											'image',
											'video',
											'audio',
											'quote', 
											'link',
											'gallery',
					) );

	// add the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // fgymm_setup
add_action( 'after_setup_theme', 'fgymm_setup' );

/**
 * the main function to load scripts in the fGymm theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function fgymm_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'fgymm-style', get_stylesheet_uri(), array( ) );
	
	wp_enqueue_style( 'fgymm-fonts', fgymm_fonts_url(), array(), null );
	
	// Load thread comments reply script
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	
	// Load Utilities JS Script
	wp_enqueue_script( 'fgymm-utilities-js', get_template_directory_uri() . '/js/utilities.js', array( 'jquery' ) );
	
	if ( is_front_page() ) {
	
		wp_enqueue_script( 'fgymm-jquery-mobile-js', get_template_directory_uri() . '/js/jquery.mobile.customized.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'fgymm-jquery-easing-js', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
		wp_enqueue_script( 'fgymm-camera-js', get_template_directory_uri() . '/js/camera.min.js', array( 'jquery' ) );
	}
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
}
add_action( 'widgets_init', 'fgymm_widgets_init' );

/**
 *	Load google font url used in the fGymm theme
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

	echo '<ul class="header-social-widget">';

	$socialURL = get_theme_mod('fgymm_social_facebook', '#');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'fgymm') . '" class="facebook16"></a>';
	}

	$socialURL = get_theme_mod('fgymm_social_google', '#');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Google+', 'fgymm') . '" class="google16"></a>';
	}

	$socialURL = get_theme_mod('fgymm_social_rss', get_bloginfo( 'rss2_url' ));
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'fgymm') . '" class="rss16"></a>';
	}

	$socialURL = get_theme_mod('fgymm_social_youtube', '#');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'fgymm') . '" class="youtube16"></a>';
	}

	echo '</ul>';
}

/**
 * Display website's logo image
 */
function fgymm_show_website_logo_image_or_title() {

	if ( get_header_image() != '' ) {
	
		// Check if the user selected a header Image in the Customizer or the Header Menu
		$logoImgPath = get_header_image();
		$siteTitle = get_bloginfo( 'name' );
		$imageWidth = get_custom_header()->width;
		$imageHeight = get_custom_header()->height;
		
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		echo '<img src="' . esc_attr( $logoImgPath ) . '" alt="' . esc_attr( $siteTitle ) . '" title="' . esc_attr( $siteTitle ) . '" width="' . esc_attr( $imageWidth ) . '" height="' . esc_attr( $imageHeight ) . '" />';
		
		echo '</a>';

	} else {
	
		echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
		
		echo '<h1>'.get_bloginfo('name').'</h1>';
		
		echo '</a>';
		
		echo '<strong>'.get_bloginfo('description').'</strong>';
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

					$defaultSlideContent = __( '<h3>Lorem ipsum dolor</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fgymm' );
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'fgymm_slide'.$i.'_content', html_entity_decode( $defaultSlideContent ) );
					$slideImage = get_theme_mod( 'fgymm_slide'.$i.'_image', $defaultSlideImage );

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
function fgymm_the_content() {

	// Display Thumbnails if thumbnail is set for the post
	if ( has_post_thumbnail() ) {
		
		echo '<a href="'. esc_url( get_permalink() ) .'" title="' . esc_attr( get_the_title() ) . '">';
		
		the_post_thumbnail();
		
		echo '</a>';
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

/**
 * Displays the Page Header Section including Page Title and Breadcrumb
 */
function fgymm_show_page_header_section() { 
	global $paged, $page;

	if ( is_single() || is_page() ) :
        $title = single_post_title( '', false );

	elseif ( is_home() ) :
		if ( $paged >= 2 || $page >= 2 ) :
			$title = sprintf( __( '%s - Page %s', 'fgymm' ), single_post_title( '', false ), max( $paged, $page ) );	
		else :
			$title = single_post_title( '', false );	
		endif;

	elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
		$title = __( 'Asides', 'fgymm' );

	elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
		$title = __( 'Images', 'fgymm' );

	elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
		$title = __( 'Videos', 'fgymm' );

	elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
		$title = __( 'Audio', 'fgymm' );

	elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
		$title = __( 'Quotes', 'fgymm' );

	elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
		$title = __( 'Links', 'fgymm' );
		
	elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
		$title = __( 'Galleries', 'fgymm' );
		
	elseif ( is_tag() ) :
		$title = sprintf( __( 'Tag Archives: %s', 'fgymm' ), single_tag_title( '', false ) );

	elseif ( is_category() ) :
		$title = sprintf( __( 'Category Archives: %s', 'fgymm' ), single_cat_title( '', false ) );
		
	elseif ( is_day() ) :
		$title = sprintf( __( 'Daily Archives: %s', 'fgymm' ), get_the_date() );

	elseif ( is_month() ) :
		$title = sprintf( __( 'Monthly Archives: %s', 'fgymm' ),
					get_the_date( _x( 'F Y', 'monthly archives date format', 'fgymm' ) ) );

	elseif ( is_year() ) :
		$title = sprintf( __( 'Yearly Archives: %s', 'fgymm' ),
					get_the_date( _x( 'Y', 'yearly archives date format', 'fgymm' )  ) );

	elseif ( is_archive() ) :
		$title = __( 'Archives', 'fgymm' );
		
	elseif ( is_404() ) :
		$title = __( 'Error 404: Not Found', 'fgymm' );

	else :
		$title = wp_title('', false);

	endif;
	
	
	?>

	<section id="page-header">
		<div id="page-header-content">

			<h1><?php echo $title; ?></h1>

			<div class="clear">
			</div>
		</div>
    </section>
<?php
}

/**
 * Gets additional theme settings description
 */
function fgymm_get_customizer_sectoin_info() {

	$premiumThemeUrl = 'https://tishonator.com/product/tgymm';

	return sprintf( __( 'The fGymm theme is a free version of the professional WordPress theme tGymm. <a href="%s" class="button-primary" target="_blank">Get tGymm Theme</a><br />', 'fgymm' ), $premiumThemeUrl );
}

/**
 * Register theme settings in the customizer
 */
function fgymm_customize_register( $wp_customize ) {

	// Header Image Section
	$wp_customize->add_section( 'header_image', array(
		'title' => __( 'Header Image', 'fgymm' ),
		'description' => fgymm_get_customizer_sectoin_info(),
		'theme_supports' => 'custom-header',
		'priority' => 60,
	) );

	// Colors Section
	$wp_customize->add_section( 'colors', array(
		'title' => __( 'Colors', 'fgymm' ),
		'description' => fgymm_get_customizer_sectoin_info(),
		'priority' => 50,
	) );

	// Background Image Section
	$wp_customize->add_section( 'background_image', array(
			'title' => __( 'Background Image', 'fgymm' ),
			'description' => fgymm_get_customizer_sectoin_info(),
			'priority' => 70,
		) );

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'fgymm_slider_section',
		array(
			'title'       => __( 'Slider', 'fgymm' ),
			'capability'  => 'edit_theme_options',
			'description' => fgymm_get_customizer_sectoin_info(),
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
				'default'           => __( '<h2>Lorem ipsum dolor</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a class="btn" title="Read more" href="#">Read more</a>', 'fgymm' ),
				'sanitize_callback' => 'force_balance_tags',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
									array(
										'label'          => sprintf( __( 'Slide #%s Content', 'fgymm' ), $i ),
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
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( __( 'Slide #%s Image', 'fgymm' ), $i ),
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
			'description' => fgymm_get_customizer_sectoin_info(),
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
			'description' => fgymm_get_customizer_sectoin_info(),
		)
	);
	
	// Add facebook url
	$wp_customize->add_setting(
		'fgymm_social_facebook',
		array(
		    'default'           => '#',
		    'sanitize_callback' => 'esc_url_raw',
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

	// Add google+ url
	$wp_customize->add_setting(
		'fgymm_social_google',
		array(
		    'default'           => '#',
		    'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fgymm_social_google',
        array(
            'label'          => __( 'Google+ Page URL', 'fgymm' ),
            'section'        => 'fgymm_social_section',
            'settings'       => 'fgymm_social_google',
            'type'           => 'text',
            )
        )
	);

	// Add RSS Feeds url
	$wp_customize->add_setting(
		'fgymm_social_rss',
		array(
		    'default'           => get_bloginfo( 'rss2_url' ),
		    'sanitize_callback' => 'esc_url_raw',
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

	// Add YouTube channel url
	$wp_customize->add_setting(
		'fgymm_social_youtube',
		array(
		    'default'           => '#',
		    'sanitize_callback' => 'esc_url_raw',
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
}
add_action('customize_register', 'fgymm_customize_register');

?>