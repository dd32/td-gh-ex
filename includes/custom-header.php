<?php
function digital_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'digital_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1284,
		'height'                 => 250,           
		'flex-height'            => true,
		'admin-head-callback'    => 'digital_admin_header_style',
		'admin-preview-callback' => 'digital_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'digital_custom_header_setup' );

if ( ! function_exists( 'digital_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see digital_custom_header_setup().
 */
function digital_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // digital_admin_header_style

if ( ! function_exists( 'digital_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see digital_custom_header_setup().
 */
function digital_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // digital_admin_header_image