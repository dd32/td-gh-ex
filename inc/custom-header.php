<?php
/**
 * @package Adventure Lite
 * Setup the WordPress core custom header feature.
 *
 * @uses adventure_lite_header_style()
 * @uses adventure_lite_admin_header_style()
 * @uses adventure_lite_admin_header_image()
 */
function adventure_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adventure_lite_custom_header_args', array(
		'default-text-color'     => 'ffffff',
		'width'                  => 1600,
		'height'                 => 80,
		'wp-head-callback'       => 'adventure_lite_header_style',
		'admin-head-callback'    => 'adventure_lite_admin_header_style',
		'admin-preview-callback' => 'adventure_lite_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'adventure_lite_custom_header_setup' );

if ( ! function_exists( 'adventure_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see adventure_lite_custom_header_setup().
 */
function adventure_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo get_header_image(); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // adventure_lite_header_style

if ( ! function_exists( 'adventure_lite_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see adventure_lite_custom_header_setup().
 */
function adventure_lite_admin_header_style() {?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // adventure_lite_admin_header_style

if ( ! function_exists( 'adventure_lite_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see adventure_lite_custom_header_setup().
 */
function adventure_lite_admin_header_image() {
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php           
}
endif; // adventure_lite_admin_header_image 