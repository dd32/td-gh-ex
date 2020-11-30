<?php
/**
 * Avadanta functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Avadanta
 */

if( ! defined( 'ABSPATH' ) )
{
	exit;
}

define('AVADANTA_THEME_DIR', get_template_directory());
define('AVADANTA_THEME_URI', get_template_directory_uri() );

/**
 * Custom Header feature.
 */
require( AVADANTA_THEME_DIR . '/theme-setup.php');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avadanta_content_width() {

	$GLOBALS['content_width'] = apply_filters( 'avadanta_content_width', 696 );
}
add_action( 'after_setup_theme', 'avadanta_content_width', 0 );	

$theme = wp_get_theme();


    function avadanta_custom_header_setup()
    {
        add_theme_support('custom-header', apply_filters('avadanta_custom_header_args', array(
            'default-image'          => get_template_directory_uri() . '/assets/images/header-bg.jpg',
            'default-text-color' => '#000',
            'width'              => 1000,
            'height'             => 250,
            'flex-height'        => true,
            'wp-head-callback'   => 'avadanta_header_style',
        )));
    }

    add_action( 'after_setup_theme', 'avadanta_custom_header_setup' );


if ( !function_exists('avadanta_header_style') ) :
    /**
     * Adding Header Image or color
     */
    function avadanta_header_style()
    {
        $header_text_color = get_header_textcolor();

        ?>
        <style type="text/css">
            <?php
                // When Text Is Hidden
                if (  display_header_text() ) :
            ?>
            .header-bg-image
           {
            background-image:url('<?php header_image(); ?>') !important;
           }
           
            .avadanta-title a,
            .avadanta-desc
            {
                color: #<?php echo esc_attr( $header_text_color ); ?> !important;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;

require( AVADANTA_THEME_DIR .'/library/customizer/customizer-alpha-color-picker/class-avadanta-customize-alpha-color-control.php');

require( AVADANTA_THEME_DIR . '/library/breadcrumbs-trail.php');

require( AVADANTA_THEME_DIR . '/script/enqueue-scripts.php');

require( AVADANTA_THEME_DIR . '/library/template-functions.php');

require(AVADANTA_THEME_DIR . '/library/template-tags.php');

require(AVADANTA_THEME_DIR . '/library/class-tgm-plugin-activation.php');

require(AVADANTA_THEME_DIR . '/library/hook-tgm.php');

require(AVADANTA_THEME_DIR . '/library/avadanta-typography.php');

require(AVADANTA_THEME_DIR . '/library/customizer/avadanta_customizer_sections.php');

require ( AVADANTA_THEME_DIR . '/library/customizer/avadanta-customizer.php' );