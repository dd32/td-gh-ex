<?php
/**
 * Implemention of Custom Header 
 */

/**
 * Set up the WordPress core custom header settings.
 *
 */
function advent_custom_header_setup() {
    /**
     *     @param array $args {
     *     An array of custom-header support arguments.
     *
     *     @type bool   $header_text            Whether to display custom header text. Default false.
     *     @type int    $width                  Width in pixels of the custom header image. Default 1260.
     *     @type int    $height                 Height in pixels of the custom header image. Default 240.
     *     @type bool   $flex_height            Whether to allow flexible-height header images. Default true.
     *     @type string $admin_head_callback    Callback function used to style the image displayed in
     *                                          the Appearance > Header screen.
     *     @type string $admin_preview_callback Callback function used to create the custom header markup in
     *                                          the Appearance > Header screen.
     * }
     */
   /* add_theme_support('custom-header', apply_filters('advent_custom_header_args', array(
        'default-text-color' => 'fff',
        'width' => 1260,
        'height' => 240,
        'flex-height' => true,
        'wp-head-callback' => 'advent_header_style',
        'admin-head-callback' => 'advent_admin_header_style',
        'admin-preview-callback' => 'advent_admin_header_image',
    ))); */
    
    $advent_args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '220e10',
	
		// Set height and width, with a maximum value for the width.
		'height'                 => 1260,
		'width'                  => 240,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'advent_header_style',
		'admin-head-callback'    => 'advent_admin_header_style',
		'admin-preview-callback' => 'advent_admin_header_image',
	);

	add_theme_support( 'custom-header', $advent_args );

	/*
	 * Default custom headers packaged with the theme.
	 * %s is a placeholder for the theme template directory URI.
	 */
	register_default_headers( array(
		'circle' => array(
			'url'           => '%s/images/headers/home-banner.jpg',
			'thumbnail_url' => '%s/images/headers/home-banner-thumbnail.jpg',
			'description'   => _x( 'Circle', 'header image description', 'advent' )
		),
	) );
    
    
    
}

add_action('after_setup_theme', 'advent_custom_header_setup');


/**
 * Loads our special font CSS files.
 */
function advent_custom_header_fonts() {
	// Add Open Sans and Bitter fonts.
	wp_enqueue_style( 'advent-fonts', advent_font_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'advent_custom_header_fonts' );

/*
 * Styles the header text displayed on the blog.
 */
function advent_header_style() {
	$advent_header_image = get_header_image();
	$advent_text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $advent_header_image ) && $advent_text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="advent-header-css">
	<?php
		if ( ! empty( $advent_header_image ) ) :
	?>
		.site-header {
			background: url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 750px auto;
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $advent_header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $advent_text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $advent_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

/*
 * Styles the header image displayed on the Appearance > Header admin panel.
 */
function advent_admin_header_style() {
	$advent_header_image = get_header_image();
?>
	<style type="text/css" id="advent-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $advent_header_image ) ) {
			echo 'background: url(' . esc_url( $advent_header_image ) . ') no-repeat scroll top; background-size: 750px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 750px;
		<?php
		if ( ! empty( $advent_header_image ) || display_header_text() ) {
			echo 'min-height: 82px;';
		} ?>
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	#headimg h1 {
		font: bold 60px/1 Bitter, Georgia, serif;
		margin: 0;
		padding: 58px 0 10px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h1 a:hover {
		text-decoration: underline;
	}
	#headimg h2 {
		font: 200 italic 24px "Source Sans Pro", Helvetica, sans-serif;
		margin: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 230px;
		width: auto;
	}
	</style>
<?php
}
if ( ! function_exists( 'advent_admin_header_image' ) ) :
/*
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 */
function advent_admin_header_image() {
	?>
	<div id="headimg" style="background: url(<?php header_image(); ?>) no-repeat scroll top; background-size: 750px auto;">
		<?php $advent_style = ' style="color:#' . get_header_textcolor() . ';"'; ?>
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name"<?php echo $advent_style; ?> onclick="return false;" href="#"><?php bloginfo( 'name' ); ?></a></h1>
			
			<h2 id="desc" class="displaying-header-text"<?php echo $advent_style; ?>><?php bloginfo( 'description' ); ?></h2>
		</div>
	</div>
<?php }

endif; // advent_admin_header_image
