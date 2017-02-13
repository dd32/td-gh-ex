<?php
// functions for theme Appeal
// @since 1.0.2

// Declaration of theme supported features
function appeal_theme_support() {
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' ); // rss feederz
    add_theme_support( 'post-thumbnails' );      // wp thumbnails (sizes handled below)

    set_post_thumbnail_size( 180, 180, true );   // default thumb size

    //page background image and color support
    $defaults = array(
	   'default-color'      => '#fcfcfc',
	   'default-image'       => '',
	   'wp-head-callback'     => '_custom_background_cb',
	   'admin-head-callback'   => '',
	   'admin-preview-callback' => ''
    );
    add_theme_support( 'custom-background', $defaults );
    add_theme_support( 'custom-logo' );

    // main nav in header (not sticky)
    register_nav_menus(
        array(
            'primary' => __('Main Menu Top', 'appeal'),
            'author_modal' => __('Footer and Author Links', 'appeal')
        )
    );

    load_theme_textdomain( 'appeal', get_template_directory_uri() . '/languages' );
}
add_action('after_setup_theme','appeal_theme_support');


//include (enqueue) scripts and stylesheets
function appeal_theme_scripts() {

    // register all scripts with WP
    wp_register_style( 'appeal-google-fonts',
                       'http://fonts.googleapis.com/css?family=Raleway',
                       false );
    // For use of child themes
    wp_register_style( 'appeal-style',
                        get_stylesheet_directory_uri() . '/style.css',
                        array(),
                        null,
                        'all' );

    //enqueue (sane and include) scripts into WP
    wp_enqueue_style( 'appeal-google-fonts');
    wp_enqueue_style( 'appeal-style' );
    wp_enqueue_script( 'bootstrap-script',
                        get_template_directory_uri() . '/assets/bootstrap.js',
                        array ( 'jquery' ),
                        '3.3.7',
                        true);

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'appeal_theme_scripts' );


/**
 * support for logo upload, output
 */
function appeal_theme_custom_logo() {

    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('get_custom_logo'))
        $output = '<div class="header-logo">';
        $output .= get_custom_logo();
        $output .= '</div>';

    // If Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    if (empty($output))
        $output = '';

    echo $output;
}


/**
 * page excerpt support
 * @init
 * add_post__support
 */
function appeal_theme_excerpt_support()
{
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'appeal_theme_excerpt_support' );

function appeal_theme_modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">[ + ]</a>';
}
add_filter( 'the_content_more_link', 'appeal_theme_modify_read_more_link' );


/**
 * Implementation of the Custom Header feature.
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 *  @uses appeal_header_style()
 */
function appeal_custom_header_setup()
{
    add_theme_support( 'custom-header',
        apply_filters( 'appeal_custom_header_args', array(
            'default-image'          => get_template_directory_uri()
                                        . '/assets/default-header-img.jpg',
            'default-text-color'    => '0000a0',
            'width'                => 1000,
            'height'              => 250,
            'flex-height'        => true,
            'flex-width'        => true,
            'wp-head-callback' => 'appeal_theme_header_style',
        ) ) );
}
add_action( 'after_setup_theme', 'appeal_custom_header_setup' );

if ( ! function_exists( 'appeal_theme_header_style' ) ) :
function appeal_theme_header_style()
{
    $header_text_color = get_header_textcolor();
    $header_image = get_header_image();

    if ( $header_image )
    { ?>
        <style type="text/css">
            .site-head {
                position: relative;
                background-image: url( <?php echo esc_url( $header_image ); ?>);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                content: "";
                display: block;
                height: 220px;
                left: 0;
                top: 0;
                width: auto;
                z-index: -1;
            }
        </style>
    <?php
    }

    /*
     * If no custom options for text are set, let's bail.
     * get_header_textcolor() options: Any hex value, 'blank' to hide text.
     */
    $header_text_color = get_header_textcolor();

    echo '<style type="text/css">';

        if ( ! display_header_text() )
        {
        echo '
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);';
        }
            else
            {
            echo '
            #inner-footer li a, #inner-footer h4, .site-title a, .site-description {
            color: '; ?> #<?php echo esc_attr( $header_text_color ); ?>;
            <?php
            }
     echo '</style>';
}
endif;


// Set unknown media content width
$GLOBALS['content_width'] = 750;

// Sidebar and Footer declarations
function appeal_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar-right',
        'name' => __('Right Sidebar', 'appeal'),
        'description' => __('Used on every page.', 'appeal'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
    	'id' => 'sidebar-left',
    	'name' => __('Left Sidebar', 'appeal'),
    	'description' => __('Used on every page.', 'appeal'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widgettitle">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer-left',
      'name' => __('Footer Left', 'appeal'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer-middle',
      'name' => __('Footer Middle', 'appeal'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

    register_sidebar(array(
      'id' => 'footer-right',
      'name' => __('Footer Right', 'appeal'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h4 class="widgettitle">',
      'after_title' => '</h4>',
    ));

}
add_action( 'widgets_init', 'appeal_register_sidebars' );



/**
 * Add Photographer Name and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
function appeal_attachment_field_credit( $form_fields, $post ) {
	$form_fields['appeal-photographer-name'] = array(
		'label' => __( 'Photographer Name', 'appeal' ),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'appeal_photographer_name', true ),
		'helps' => __( 'If provided, photo credit will be displayed', 'appeal' ),
	);

	$form_fields['appeal-photographer-url'] = array(
		'label' => __( 'Photographer URL', 'appeal' ),
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'appeal_photographer_url', true ),
		'helps' => __( 'Add Photographer URL', 'appeal' ),
	);

	return $form_fields;
}
add_filter( 'attachment_fields_to_edit', 'appeal_attachment_field_credit', 10, 2 );

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function appeal_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['appeal-photographer-name'] ) )
		update_post_meta( $post['ID'], 'appeal_photographer_name', $attachment['appeal-photographer-name'] );

	if( isset( $attachment['appeal-photographer-url'] ) )
update_post_meta( $post['ID'], 'appeal_photographer_url', esc_url( $attachment['appeal-photographer-url'] ) );

	return $post;
}
add_filter( 'attachment_fields_to_save', 'appeal_attachment_field_credit_save', 10, 2 );



/**
 * Header for singular articles
 * Add pingback url auto-discovery header for singular articles.
 */
function appeal_pingback_header() {

	if ( is_singular() && pings_open() ) {

		printf( '<link rel="pingback" href="%s">'
                 . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'appeal_pingback_header' );


// Register Custom Navigation Walker
require_once get_template_directory() . '/assets/wp_bootstrap_navwalker.php';

//Register Customizer assets
require_once get_template_directory() . '/customize.php';
?>