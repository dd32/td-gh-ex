<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
 * <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package appdetail
 * @subpackage appdetail
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses appdetail_header_style()
 */
if (!function_exists('appdetail_custom_header_setup')) :
    function appdetail_custom_header_setup()
    {
        add_theme_support('custom-header', apply_filters('appdetail_custom_header_args', array(
            'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
            'default-text-color' => 'fff',
            'width'              => 1000,
            'height'             => 250,
            'flex-height'        => true,
            'wp-head-callback'   => 'appdetail_header_style',
        )));
    }

    add_action( 'after_setup_theme', 'appdetail_custom_header_setup' );

endif;

if ( !function_exists('appdetail_header_style') ) :
    /**
     * Styles the header image and text displayed on the blog.
     *
     * @see appdetail_custom_header_setup().
     */
    function appdetail_header_style()
    {
        $header_text_color = get_header_textcolor();

       
        // If we get this far, we have custom styles. Let's do this.
        ?>
        <style type="text/css">
            <?php
                // Has the text been hidden?
                if (  display_header_text() ) :
            ?>
            .inner-banner-area
           {
            background-image:url('<?php header_image(); ?>');

           }
           
            .site-title a,
            .site-description {
                color: #<?php echo esc_attr( $header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;