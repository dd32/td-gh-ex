<?php
/*
===========================================================================================================
Silver Quantum - functions-head.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme. This framework.php template file allows you to add features and functionality that has been preset 
to be use in this WordPress theme which is stored in the theme's framework directory in the theme folder.

@package        Silver Quantum WordPress Theme
@copyright      Copyright (C) 2014-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/

/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Custom Header
 2.0 - Custom Header CSS
===========================================================================================================
*/

/*
===========================================================================================================
1.0 - Meta Charset
===========================================================================================================
*/
function silver_quantum_custom_header_setup() {
    $args = array(
        /*
        =======================================================================================================
        Default Text Color and Default Image when used for a custom header.
        =======================================================================================================
        */
        'default-text-color'     => 'ffffff',
        'default-image'          => get_template_directory_uri() . '/images/header-image.jpg',
        /*
        =======================================================================================================
        This will set height and width of the image and set the max width as well.
        =======================================================================================================
        */
        'height'                 => 320,
        'width'                  => 1208,
        'max-width'             =>  2000,
        /*
        =======================================================================================================
        Support flexible Height and Width
        =======================================================================================================
        */
        'flex-height'            => false,
        'flex-width'             => false,
        /*
        =======================================================================================================
        Callbacks for styling the custom header style.
        =======================================================================================================
        */
        'wp-head-callback'       => 'silver_quantum_header_style',
    );
    add_theme_support('custom-header', $args);
    
    /*
    ===========================================================================================================
    This will set the default headers for header image. 
    ===========================================================================================================
    */
    register_default_headers(array(
        'header-image' => array(
            'url'           => '%s/images/header-image.jpg',
            'thumbnail_url' => '%s/images/header-image.jpg',
            'description'   => esc_html__('Header Image', 'silver-quantum')
    )));
}
add_action('after_setup_theme', 'silver_quantum_custom_header_setup');
/*
===============================================================================================================
2.0 - Custom Header CSS 
===============================================================================================================
*/
function silver_quantum_header_style() {
	$text_color = get_header_textcolor();
	
	if ($text_color == get_theme_support('custom-header', 'default-text-color')) {
            return;
        }
?>
	<style type="text/css">
	<?php if (!display_header_text()) : ?>
            .header-image,
            .site-branding {
                display: none;
            }
	<?php else : ?>
            .site-title a,
            .site-description {
                color: #<?php echo esc_html($text_color); ?>;
            }
	<?php endif; ?>
	</style>
<?php }