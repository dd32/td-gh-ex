<?php
/**
 * Barista - Custom Header
 *
 * This file displays custom header images.
 * 
 * @package         Barista WordPress Theme
 * @copyright       Copyright (C) 2015  Benjamin Lu
 * @license         GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @author          Benjamin Lu (http://www.benluwp.com/contact/
 */
function barista_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => 'FFFFFF',
		'default-image'          => '',
                'uploads'                => true,

		// Set height and width, with a maximum value for the width.
		'height'                 => 200,
		'width'                  => 900,
		'max-width'             =>  2000,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'barista_header_style',
	);
	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'barista_custom_header_setup' );

function barista_header_style() {
	$text_color = get_header_textcolor();
	
	if ($text_color == get_theme_support('custom-header', 'default-text-color')) {
            return;
        }
?>
	<style type="text/css">
	<?php if (!display_header_text()) : ?>
            .site-title,
            .site-description {
                display: none;
            }
	<?php else : ?>
            .site-title a,
            .site-description {
                color: #<?php echo $text_color; ?>;
            }
	<?php endif; ?>
	</style>
<?php } ?>