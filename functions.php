<?php
/**
 * AccessPress Store functions and definitions
 *
 * @package AccessPress Store
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'accesspress_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function accesspress_store_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on AccessPress Store, use a find and replace
	 * to change 'accesspress-store' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'accesspress-store', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    add_theme_support( 'woocommerce' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    
    add_image_size('accesspress-prod-cat-size', 600, 300, true);
    
    add_image_size('accesspress-service-thumbnail', 380, 252, true);
    
    add_image_size('accesspress-blog-big-thumbnail', 760, 300, true);

    add_image_size('accesspress-slider', 1350, 570, true);
    
    
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'accesspress-store' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'accesspress_store_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // accesspress_store_setup
add_action( 'after_setup_theme', 'accesspress_store_setup' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-function.php';
/**
 * Implement the Custom Metabox feature.
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Option Framework file.
 */
 define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/option-framework/' );
//require get_template_directory() . '/inc/option-framework/options-framework.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/accesspress-widget.php';

/**
 * Load General Setting
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Load Sanitizer Functions
 */
require get_template_directory() . '/inc/accesspress-sanitizer.php';
/**
 * Load General Setting
 */
require get_template_directory() . '/inc/assets/assets-general-setting.php';

/**
 * Load Slider Setting
 */
require get_template_directory() . '/inc/assets/assets-slider-setting.php';

/**
 * Load Woocommerce Setting
 */
require get_template_directory() . '/inc/assets/assets-woocommerce-setting.php';

/**
 * Load Social Setting
 */
//require get_template_directory() . '/inc/assets/assets-social-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-pagepost-setting.php';


/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-blog-setting.php';

/**
 * Load Page/Post Setting
 */
require get_template_directory() . '/inc/assets/assets-paymentlogo-setting.php';

/**
 * Load Class Custom Radio
 */
require get_template_directory() . '/inc/class/class-image-radio.php';

/**
 * Load Class Custom Switch
 */
require get_template_directory() . '/inc/class/class-custom-switch.php';
/**
 * Load Class Custom Categories
 */
require get_template_directory() . '/inc/class/class-custom-categories.php';

/**
 * AccessPress More Themes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Add stylesheet and JS for upsell page.
function accesspress_store_upsell_style() {
	wp_enqueue_style( 'upsell-style', get_template_directory_uri() . '/css/upsell.css');
}

// Add upsell page to the menu.
function accesspress_store_add_upsell() {
	$page = add_theme_page(
		__( 'More Themes', 'accesspress-store' ),
		__( 'More Themes', 'accesspress-store' ),
		'administrator',
		'accesspress-store-themes',
		'accesspress_store_display_upsell'
	);

	add_action( 'admin_print_styles-' . $page, 'accesspress_store_upsell_style' );
}
add_action( 'admin_menu', 'accesspress_store_add_upsell', 11 );

// Define markup for the upsell page.
function accesspress_store_display_upsell() {
	// Set template directory uri
	$directory_uri = get_template_directory_uri();
	?>
	<div class="wrap">
		<div class="container-fluid">
			<div id="upsell_container">  
				<div class="row">
					<div id="upsell_header" class="col-md-12">
						<h2>
							<a href="https://accesspressthemes.com/" target="_blank">
								<img src="<?php echo get_template_directory_uri(); ?>/inc/images/logo.png"/>
							</a>
						</h2>
						<h3><?php _e( 'Product of AccessPress Themes', 'accesspress-store' ); ?></h3>
					</div>
				</div>
				<div id="upsell_themes" class="row">
					<?php
					// Set the argument array with author name.
					$args = array(
						'author' => 'access-keys',
					);
					// Set the $request array.
					$request = array(
						'body' => array(
							'action'  => 'query_themes',
							'request' => serialize( (object)$args )
						)
					);
					$themes = accesspress_store_get_themes( $request );
					$active_theme = wp_get_theme()->get( 'Name' );
					$counter = 1;
					// For currently active theme.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme == $theme->name ) {?>

							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>
									<div class="theme-description">
										<p><?php echo $theme->description; ?></p>
									</div>
								</div>
								<div class="theme-details active">
									<span class="theme-name"><?php echo $theme->name; ?></span>
									

									<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>">Customize</a>
									<a class="button button-secondary customize right activate" target="_blank" href="javascript:void(0)">Activate</a>
								</div>
							</div>
						<?php
						$counter++;
						break;
						}
					}
					// For all other themes.
					foreach ( $themes->themes as $theme ) {
						if( $active_theme != $theme->name ) {
							// Set the argument array with author name.
							$args = array(
								'slug' => $theme->slug,
							);
							// Set the $request array.
							$request = array(
								'body' => array(
									'action'  => 'theme_information',
									'request' => serialize( (object)$args )
								)
							);
							$theme_details = accesspress_store_get_themes( $request );
						?>
							<div id="<?php echo $theme->slug; ?>" class="theme-container col-md-6 col-lg-4 <?php echo $counter % 3 == 1 ? 'no-left-megin' : ""; ?>">
								<div class="image-container">
									<img class="theme-screenshot" src="<?php echo $theme->screenshot_url ?>"/>
									<!-- <div class="theme-description">
										<p><?php //echo $theme->description; ?></p>
									</div> -->
								</div>
								<div class="theme-details">
									<span class="theme-name"><?php echo $theme->name; ?></span>
									<!-- Check if the theme is installed -->
									<?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
										<!-- Show the tick image notifying the theme is already installed. -->
										<img data-toggle="tooltip" title="<?php _e( 'Already installed', 'accesspress-store' ); ?>" data-placement="bottom" class="theme-exists" src="<?php echo $directory_uri ?>/core/images/tick.png"/>
										<!-- Activate Button -->
										<a  class="button button-primary activate right"
											href="<?php echo wp_nonce_url( admin_url( 'themes.php?action=activate&amp;stylesheet=' . urlencode( $theme->slug ) ), 'switch-theme_' . $theme->slug );?>" >Activate</a>
									<?php }
									else {
										// Set the install url for the theme.
										$install_url = add_query_arg( array(
												'action' => 'install-theme',
												'theme'  => $theme->slug,
											), self_admin_url( 'update.php' ) );
									?>
										<!-- Install Button -->
										<a data-toggle="tooltip" data-placement="bottom" title="<?php echo 'Downloaded ' . number_format( $theme_details->downloaded ) . ' times'; ?>" class="button button-primary install right" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" ><?php _e( 'Install Now', 'accesspress-store' ); ?></a>
									<?php } ?>
									<!-- Preview button -->
									<a class="button button-secondary preview right" target="_blank" href="<?php echo $theme->preview_url; ?>"><?php _e( 'Live Preview', 'accesspress-store' ); ?></a>
								</div>
							</div>
							<?php
							$counter++;
						}
					}?>
				</div>
			</div>
		</div>
	</div>
<script>
	jQuery(function () {
		jQuery('.download').tooltip();
		jQuery('.theme-exists').tooltip();
	});
</script>
<?php
}

// Get all themeisle themes by using API.
function accesspress_store_get_themes( $request ) {

	// Generate a cache key that would hold the response for this request:
	$key = 'accesspress-store_' . md5( serialize( $request ) );

	// Check transient. If it's there - use that, if not re fetch the theme
	if ( false === ( $themes = get_transient( $key ) ) ) {

		// Transient expired/does not exist. Send request to the API.
		$response = wp_remote_post( 'http://api.wordpress.org/themes/info/1.0/', $request );

		// Check for the error.
		if ( !is_wp_error( $response ) ) {

			$themes = unserialize( wp_remote_retrieve_body( $response ) );

			if ( !is_object( $themes ) && !is_array( $themes ) ) {

				// Response body does not contain an object/array
				return new WP_Error( 'theme_api_error', 'An unexpected error has occurred' );
			}

			// Set transient for next time... keep it for 24 hours should be good
			set_transient( $key, $themes, 60 * 60 * 24 );
		}
		else {
			// Error object returned
			return $response;
		}
	}
	return $themes;
}