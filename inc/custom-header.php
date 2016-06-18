<?php
/**
 * @package Animals
 * Setup the WordPress core custom header feature.
 *
 * @uses animals_header_style()
 * @uses animals_admin_header_style()
 * @uses animals_admin_header_image()

 */
function animals_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'animals_custom_header_args', array(
		'default-text-color'     => '000000',
		'width'                  => 1600,
		'height'                 => 400,
		'header-text'			 => true,
		'header-image'			=> false,
		'wp-head-callback'       => 'animals_header_style',
		'admin-head-callback'    => 'animals_admin_header_style',
		'admin-preview-callback' => 'animals_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'animals_custom_header_setup' );

if ( ! function_exists( 'animals_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see animals_custom_header_setup().
 */
function animals_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() || get_header_textcolor() ) :
	?>
		#header{
			background: url(<?php echo get_header_image(); ?>) no-repeat;
			background-position: center top;
		}
		.logo h1 a{color:#<?php echo get_header_textcolor(); ?>}
	<?php endif; ?>	
	</style>
	<?php
	// If the header text option is untouched, let's bail.
	if ( display_header_text() ) {
		return;
	}

	// If the header text has been hidden.
	?>
    <style type="text/css">
		.logo {
			margin: 0 auto 0 0;
		}

		.logo h1,
		.logo p{
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
    </style>
	
    <?php
	
}
endif; // animals_header_style

if ( ! function_exists( 'animals_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see animals_custom_header_setup().
 */
function animals_admin_header_style() {?>
	<style type="text/css">
	.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // animals_admin_header_style


add_action( 'admin_head', 'admin_header_css' );
function admin_header_css(){ ?>
	<style>pre{white-space: pre-wrap;}</style><?php
}


if ( ! function_exists( 'animals_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see animals_custom_header_setup().
 */
function animals_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // animals_admin_header_image 