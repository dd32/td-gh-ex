<?php
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @link http://codex.wordpress.org/Custom_Headers
 *
 * @package undedicated
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses undedicated_header_style()
 * @uses undedicated_admin_header_style()
 * @uses undedicated_admin_header_image()
 */
function undedicated_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'undedicated_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1200,
		'height'                 => 200,
		'flex-width'            => true,
		'flex-height'            => true,
		'header-text'            => true,
		'wp-head-callback'       => 'undedicated_header_style',
		'admin-head-callback'    => 'undedicated_admin_header_style',
		'admin-preview-callback' => 'undedicated_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'undedicated_custom_header_setup' );

if ( ! function_exists( 'undedicated_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see undedicated_custom_header_setup().
 */
function undedicated_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	if ( '000000' === $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // undedicated_header_style

if ( ! function_exists( 'undedicated_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see undedicated_custom_header_setup().
 */
function undedicated_admin_header_style() {
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
endif; // undedicated_admin_header_style

if ( ! function_exists( 'undedicated_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see undedicated_custom_header_setup().
 */
function undedicated_admin_header_image() {
?>

		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
			<?php endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
<?php
}
endif; // undedicated_admin_header_image
