<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * @package miranda
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses miranda_customize_css()
 * @uses miranda_admin_header_style()
 * @uses miranda_admin_header_image()
 */
function miranda_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'miranda_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/rose.png',
		'default-text-color'     => '861a50',
		'width'                  => 700,
		'height'                 => 280,
		'flex-height'            => true,
		'wp-head-callback'       => 'miranda_customize_css',
		'admin-head-callback'    => 'miranda_admin_header_style',
		'admin-preview-callback' => 'miranda_admin_header_image',
	)
	) );
	
	register_default_headers( array(
			'Rose' => array(
				'url' => '%s/images/rose.png',
				'thumbnail_url' => '%s/images/rose-thumb.png',
				/* translators: header image description */
				'description' => __( 'Rose', 'miranda' )
			),
			'Purple' => array(
				'url' => '%s/images/purple-flower.png',
				'thumbnail_url' => '%s/images/purple-thumb.png',
				/* translators: header image description */
				'description' => __( 'Purple Flower', 'miranda' )
			)

		) );
	
}
add_action( 'after_setup_theme', 'miranda_custom_header_setup' );


if ( ! function_exists( 'miranda_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see miranda_custom_header_setup().
 */
function miranda_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
			#headimg{text-align:center;}
			#name{font-size:60px; line-height:1; margin:0 auto; text-decoration:none;}
			#desc{font-size:16px; margin:0 auto 30px auto;}
		}
	</style>
<?php
}
endif; // miranda_admin_header_style


if ( ! function_exists( 'miranda_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see miranda_custom_header_setup().
 */
function miranda_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="displaying-header-text" id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
			<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // miranda_admin_header_image