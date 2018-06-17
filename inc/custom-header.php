<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>

 *
 * @package _s
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * @uses athenea_header_style()
 * @uses athenea_admin_header_style()
 * @uses athenea_admin_header_image()
 *
 * @package _s
 */
function athenea_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'athenea_custom_header_args', array(
		'default-image'          => get_template_directory_uri() . '/images/head-acrop.jpg',
		'default-text-color'     => '660000',
		'width'                  => 1000,
		'height'                 => 300,
		'flex-height'            => true,
		'wp-head-callback'       => 'athenea_header_style',
		'admin-head-callback'    => 'athenea_admin_header_style',
		'admin-preview-callback' => 'athenea_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'athenea_custom_header_setup' );

if ( ! function_exists( 'athenea_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see athenea_custom_header_setup().
 */
function athenea_header_style() {
	$header_text_color = get_header_textcolor();

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo $header_text_color; ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // athenea_header_style

if ( ! function_exists( 'athenea_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see athenea_custom_header_setup().
 */
function athenea_admin_header_style() {
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
endif; // athenea_admin_header_style

if ( ! function_exists( 'athenea_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see athenea_custom_header_setup().
 */
function athenea_admin_header_image() {
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
endif; // athenea_admin_header_image

function athenea_print_imghead_style() { ?>
	<style type="text/css">
	
	<?php if ( get_header_image() ) : ?>
	#imgHead {
	background: url(<?php header_image(); ?>) no-repeat center bottom fixed;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
	background-size: cover;
	height: 200px;
	width: 100%;
	z-index:-999;
	top:0px;
	bottom:0px;
	left:0px;
	padding: 20px 0px 10px 0px;
	}
	<?php endif; ?>
	
	</style>
	<?php }
	add_action( 'wp_head', 'athenea_print_imghead_style' );