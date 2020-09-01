<?php
/**
 * The sidebar containing the main widget area
 * 
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @package Theme-Vision
 * @subpackage Agama Blue
 * @since 1.0.1
 */

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
} ?>

<?php
/**
 * The Sidebar
 *
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 *
 * @author  Theme Vision <support@theme-vision.com>
 * @package Agama
 * @since   1.0.0
 */

// No direct access allowed.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

$class[] = 'widget-area tv-col-md-3';

if ( 'right' == agama_sidebar_position() ) {
    $class[] = 'tv-order-2';
} else if ( 'left' == agama_sidebar_position() ) {
    $class[] = 'tv-order-1';
} ?>

<?php if ( is_active_sidebar( 'sidebar-1' ) && ! is_home() ) : ?>
<div id="secondary" class="<?php echo esc_attr( implode( ' ', $class ) ); ?>" role="complementary"><?php 
    if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'main-sidebar' ) ) {
        dynamic_sidebar( 'sidebar-1' );
    }
    ?>
</div>
<?php endif; ?>
