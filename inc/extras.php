<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Absolutte
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function absolutte_body_classes( $classes ) {

    $absolutte_theme_data = wp_get_theme();

    $classes[] = sanitize_title( $absolutte_theme_data['Name'] );
    $classes[] = 'v' . $absolutte_theme_data['Version'];


    // Add Animations Class
    $absolutte_site_animations = get_theme_mod( 'absolutte_site_animations', 'true' );
    if ( 'true' == $absolutte_site_animations ) {
        $classes[] = 'absolutte-animations';
    }

    //Add class for Blog Layout
    $absolutte_blog_layout = get_theme_mod( 'absolutte_blog_layout', 'layout-1' );
    if ( isset( $_GET[ 'blog_layout' ] ) ) {
        $absolutte_blog_layout = sanitize_text_field( wp_unslash( $_GET[ 'blog_layout' ] ) );
    }
    $classes[] = 'absolutte-blog-' . esc_attr( $absolutte_blog_layout );

    //Add class for Site Layout
    $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
    if ( isset( $_GET[ 'site_layout' ] ) ) {
        $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
    }
    $classes[] = 'absolutte-' . esc_attr( $absolutte_site_layout );

    
    //Add class if there is Sidebar
    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'absolutte-with-sidebar';
    }else{
        $classes[] = 'absolutte-with-out-sidebar';
    }

    //Add class for Header
    $absolutte_header_layout = get_theme_mod( 'absolutte_header_layout', 'header-1' );
    if ( isset( $_GET[ 'header_layout' ] ) ) {
        $absolutte_header_layout = sanitize_text_field( wp_unslash( $_GET[ 'header_layout' ] ) );
    }
    $classes[] = 'absolutte-' . esc_attr( $absolutte_header_layout );

    //Add class for Header Position
    $absolutte_header_position = get_theme_mod( 'absolutte_header_position', 'header-top' );
    if ( isset( $_GET[ 'header_position' ] ) ) {
        $absolutte_header_position = sanitize_text_field( wp_unslash( $_GET[ 'header_position' ] ) );
    }
    if ( 'header-side' == $absolutte_header_position ) {
        $classes[] = 'absolutte-header-side-small';
    }else{
        $classes[] = 'absolutte-header-top';
    }

    //Add class for Header Menu Type
    $absolutte_menu_type = get_theme_mod( 'absolutte_header_menu_type', 'regular-menu' );
    if ( isset( $_GET[ 'menu_type' ] ) ) {
        $absolutte_menu_type = sanitize_text_field( wp_unslash( $_GET[ 'menu_type' ] ) );
    }
    if ( 'mega-menu' == $absolutte_menu_type ) {
        $classes[] = 'absolutte-mega-menu';
    }else{
        $classes[] = 'absolutte-regular-menu';
    }

    //Add class for Header Absolutte
    $absolutte_header_absolute = get_theme_mod( 'absolutte_header_absolute', false );
    $absolutte_header_single_absolute = rwmb_meta( 'absolutte_header_position', 'normal' );
    if( function_exists( 'is_shop' ) && is_shop() ) {
        $shop_id = get_option( 'woocommerce_shop_page_id' );
        $absolutte_header_single_absolute = rwmb_meta( 'absolutte_header_position', 'normal', $shop_id );
    }
    if ( isset( $_GET[ 'header_absolute' ] ) ) {
        $absolutte_header_absolute = sanitize_text_field( wp_unslash( $_GET[ 'header_absolute' ] ) );
    }
    if ( $absolutte_header_absolute || 'absolutte' == $absolutte_header_single_absolute ) {
        $classes[] = 'absolutte-header-absolute';
    }  

    //Add class for Sticky Header
    $absolutte_header_sticky = get_theme_mod( 'absolutte_header_sticky', '0' );
    if ( ( isset( $_GET[ 'header_sticky' ] ) || $absolutte_header_sticky ) && 'sidenav' != $absolutte_site_layout ) {
        $classes[] = 'absolutte-header-sticky';
    }

	return $classes;
}
add_filter( 'body_class', 'absolutte_body_classes' );


if ( ! function_exists( 'absolutte_new_content_more' ) ){
    function absolutte_new_content_more($more) {
           global $post;
           return ' <br><a href="' . esc_url( get_permalink() ) . '" class="more-link read-more">' . esc_html__( 'Read more', 'absolutte' ) . ' <i class="absolutte-icon-arrow-right"></i></a>';
    }
}// end function_exists
    add_filter( 'the_content_more_link', 'absolutte_new_content_more' );


/**
 * Convert HEX colors to RGB
 */
function absolutte_hex2rgb( $colour ) {
    $colour = str_replace("#", "", $colour);
    if ( strlen( $colour ) == 6 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
    } elseif ( strlen( $colour ) == 3 ) {
            list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
    } else {
            return false;
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
* Avoid undefined functions if Meta Box is not activated
*
* @return bool
*/
if ( ! function_exists( 'rwmb_meta' ) ) {
    function rwmb_meta( $key, $args = '', $post_id = null ) {
        return false;
    }
}



/**
* Display Portfolio or Post navigation
*
* @return html
*/
if ( ! function_exists( 'absolutte_post_navigation' ) ) {
    function absolutte_post_navigation() {

        $post_nav_bck = '';
        $post_nav_bck_next = '';
        $prev_post = get_previous_post();
        if ( ! empty( $prev_post ) ):
            $portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_post->ID ), 'absolutte_portfolio' );
            if ( ! empty( $portfolio_image ) ) {
                $post_nav_bck = ' style="background-image: url(' . esc_url( $portfolio_image[0] ) . ');"';
            }
        endif;
        $next_post = get_next_post();
        if ( ! empty( $next_post ) ):
            $portfolio_image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'absolutte_portfolio' );
            if ( ! empty( $portfolio_image ) ) {
                $post_nav_bck_next = ' style="background-image: url(' . esc_url( $portfolio_image[0] ) . ');"';
            }
        endif;

        if ( ! empty( $prev_post ) || ! empty( $next_post ) ):
        ?>
            <nav class="navigation post-navigation" >
                <div class="nav-links">
                    <?php if ( ! empty( $prev_post ) ): ?>
                    <div class="nav-previous" <?php echo wp_kses_post( $post_nav_bck ); ?>>
                        <?php
                        $prev_text = esc_html__( 'Previous Post', 'absolutte' );
                        if ( absolutte_is_portfolio_type( get_post_type() ) ) {
                            $prev_text = esc_html__( 'Previous Project', 'absolutte' );
                        }
                        ?>
                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" rel="prev"><span><?php echo wp_kses_post( $prev_text ); ?></span><?php echo esc_html( $prev_post->post_title ); ?></a>
                    </div>
                    <?php endif; ?>
                    <?php if ( ! empty( $next_post ) ): ?>
                    <div class="nav-next" <?php echo wp_kses_post( $post_nav_bck_next ); ?>>
                        <?php
                        $next_text = esc_html__( 'Next Post', 'absolutte' );
                        if ( absolutte_is_portfolio_type( get_post_type() ) ) {
                            $next_text = esc_html__( 'Next Project', 'absolutte' );
                        }
                        ?>
                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" rel="next"><span><?php echo wp_kses_post( $next_text ); ?></span><?php echo esc_html( $next_post->post_title ); ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </nav>
        <?php endif;

    }
}

/**
* Return a darker color in HEX
*
* @return string
*/
function absolutte_darken_color( $rgb, $darker = 2 ) {

    $hash = (strpos($rgb, '#') !== false) ? '#' : '';
    $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
    if(strlen($rgb) != 6) return $hash.'000000';
    $darker = ($darker > 1) ? $darker : 1;

    list($R16,$G16,$B16) = str_split($rgb,2);

    $R = sprintf("%02X", floor(hexdec($R16)/$darker));
    $G = sprintf("%02X", floor(hexdec($G16)/$darker));
    $B = sprintf("%02X", floor(hexdec($B16)/$darker));

    return $hash.$R.$G.$B;
}



/**
* Return CSS class for #content
*
* @return bool
*/
if ( ! function_exists( 'absolutte_content_css_class' ) ) {
    function absolutte_content_css_class() {

        if ( is_page_template( 'template-full-width.php' ) ) {
            return '';
        }
        if ( is_page_template( 'template-narrow.php' ) ) {
            return 'col-md-8 col-md-push-2';
        }
        if ( is_page_template( 'template-fullscreen.php' ) ) {
            return '';
        }

        if ( absolutte_is_portfolio_type( get_post_type() ) ) {
            return 'col-md-8 col-md-push-2';
        }

        $absolutte_site_layout = absolutte_get_theme_mod( 'absolutte_site_layout', 'default' );
        switch ( $absolutte_site_layout ) {

            case 'default':
                if ( is_active_sidebar( 'sidebar-1' ) && ! is_singular( array( 'product' ) ) ) {
                    return 'col-md-8';
                }else{
                    return 'col-md-12';
                }
                break;

            case 'sidenav':
                if ( is_active_sidebar( 'sidebar-1' ) && ! is_singular( array( 'product' ) ) ) {
                    return 'col-md-6 col-md-push-2';
                }else{
                    return 'col-md-8 col-md-push-2';
                }
                break;            
            default:
                return 'col-md-8 col-md-push-2';
                break;
        }


    }
}



/**
* Return CSS class for #footer
*
* @return bool
*/
if ( ! function_exists( 'absolutte_footer_css_class' ) ) {
    function absolutte_footer_css_class() {

        $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
        if ( isset( $_GET[ 'site_layout' ] ) ) {
            $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
        }

        switch ( $absolutte_site_layout ) {
            case 'default':
                    return 'col-md-8 col-md-push-2';
                break;

            case 'sidenav':
                    return 'col-md-12';
                break;            
            default:
                return 'col-md-8 col-md-push-2';
                break;
        }

    }
}

/**
* Return CSS class for Container
*
* @return bool
*/
if ( ! function_exists( 'absolutte_container_css_class' ) ) {
    function absolutte_container_css_class() {
        $absolutte_site_layout = get_theme_mod( 'absolutte_site_layout', 'default' );
        if ( isset( $_GET[ 'site_layout' ] ) ) {
            $absolutte_site_layout = sanitize_text_field( wp_unslash( $_GET[ 'site_layout' ] ) );
        }

        //Default
        $container_css_class = 'container';

        if ( is_page_template( 'template-full-width.php' ) ) {

            $container_css_class = '';

        }elseif ( ! is_singular( array( 'product' ) ) ) {
    
            if( 'default' == $absolutte_site_layout ){

                $absolutte_shop_page_layout = get_theme_mod( 'absolutte_shop_page_layout', 'shop-narrow' );
                if ( isset( $_GET[ 'shop_page_layout' ] ) ) {
                    $absolutte_shop_page_layout = sanitize_text_field( wp_unslash( $_GET[ 'shop_page_layout' ] ) );
                }

                //If it is Shop or Shop Archive page, show as full width.
                if ( function_exists( 'is_shop' ) ) {
                    if ( ( is_shop() || is_product_category() ) && 'shop-fullwidth' == $absolutte_shop_page_layout ) {
                        $container_css_class = 'container-fluid';                    
                    }
                }
                

            }elseif( 'sidenav' == $absolutte_site_layout ){
                $container_css_class = 'container-fluid';
            }
        }

        if ( is_page_template( 'template-fullscreen.php' ) ) {
            $container_css_class = '';
        }

        return $container_css_class;

    }
}

/**
* Return CSS class for Main
*
* @return bool
*/
if ( ! function_exists( 'absolutte_main_css_class' ) ) {
    function absolutte_main_css_class() {
        //Default
        $main_css_class = 'row';

        if ( is_page_template( 'template-fullscreen.php' ) ) {
            $main_css_class = '';
        }elseif ( is_page_template( 'template-full-width.php' ) ) {
            $main_css_class = '';
        }

        return $main_css_class;

    }
}



/**
 * Return SVG markup.
 *
 * @param array $args {
 *     Parameters needed to display an SVG.
 *
 *     @type string $icon  Required SVG icon filename.
 *     @type string $title Optional SVG title.
 *     @type string $desc  Optional SVG description.
 * }
 * @return string SVG markup.
 */
function absolutte_get_svg( $args = array() ) {
    // Make sure $args are an array.
    if ( empty( $args ) ) {
        return __( 'Please define default parameters in the form of an array.', 'absolutte' );
    }

    // Define an icon.
    if ( false === array_key_exists( 'icon', $args ) ) {
        return __( 'Please define an SVG icon filename.', 'absolutte' );
    }

    // Set defaults.
    $defaults = array(
        'icon'        => '',
        'title'       => '',
        'desc'        => '',
        'fallback'    => false,
    );

    // Parse args.
    $args = wp_parse_args( $args, $defaults );

    // Set aria hidden.
    $aria_hidden = ' aria-hidden="true"';

    // Set ARIA.
    $aria_labelledby = '';

    /*
     * Twenty Seventeen doesn't use the SVG title or description attributes; non-decorative icons are described with .screen-reader-text.
     *
     * However, child themes can use the title and description to add information to non-decorative SVG icons to improve accessibility.
     *
     * Example 1 with title: <?php echo absolutte_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ) ) ); ?>
     *
     * Example 2 with title and description: <?php echo absolutte_get_svg( array( 'icon' => 'arrow-right', 'title' => __( 'This is the title', 'textdomain' ), 'desc' => __( 'This is the description', 'textdomain' ) ) ); ?>
     *
     * See https://www.paciellogroup.com/blog/2013/12/using-aria-enhance-svg-accessibility/.
     */
    if ( $args['title'] ) {
        $aria_hidden     = '';
        $unique_id       = uniqid();
        $aria_labelledby = ' aria-labelledby="title-' . $unique_id . '"';

        if ( $args['desc'] ) {
            $aria_labelledby = ' aria-labelledby="title-' . $unique_id . ' desc-' . $unique_id . '"';
        }
    }

    // Begin SVG markup.
    $svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . $aria_labelledby . ' role="img">';

    // Display the title.
    if ( $args['title'] ) {
        $svg .= '<title id="title-' . $unique_id . '">' . esc_html( $args['title'] ) . '</title>';

        // Display the desc only if the title is already set.
        if ( $args['desc'] ) {
            $svg .= '<desc id="desc-' . $unique_id . '">' . esc_html( $args['desc'] ) . '</desc>';
        }
    }

    /*
     * Display the icon.
     *
     * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
     *
     * See https://core.trac.wordpress.org/ticket/38387.
     */
    $svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';

    // Add some markup to use as a fallback for browsers that do not support SVGs.
    if ( $args['fallback'] ) {
        $svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
    }

    $svg .= '</svg>';

    return $svg;
}


/**
 * Add dropdown icon if menu item has children.
 *
 * @param  string $title The menu item's title.
 * @param  object $item  The current menu item.
 * @param  array  $args  An array of wp_nav_menu() arguments.
 * @param  int    $depth Depth of menu item. Used for padding.
 * @return string $title The menu item's title with dropdown icon.
 */
function absolutte_dropdown_icon_to_menu_link( $title, $item, $args, $depth ) {
    if ( 'primary' === $args->theme_location ) {
        foreach ( $item->classes as $value ) {
            if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
                $title = $title . '<i class="fa-angle-down fa icon"></i>';
            }
        }
    }

    return $title;
}
add_filter( 'nav_menu_item_title', 'absolutte_dropdown_icon_to_menu_link', 10, 4 );



/**
 * Get a theme_mod option and replaces if existe the value on the URL as argument
 * For demos
 *
 * @param  string $option theme_mod option.
 * @param  string $default value .
 */
function absolutte_get_theme_mod( $option, $default ){
    $get_arg = str_replace( 'absolutte_', '', $option );
    $absolutte_option = get_theme_mod( $option, $default );
    if ( isset( $_GET[ $get_arg ] ) ) {
        $absolutte_option = sanitize_text_field( wp_unslash( $_GET[ $get_arg ] ) );
    }
    return $absolutte_option;
}


/**
 * Allow SVG uploads
 *
 */
function absolutte_custom_upload_mimes( $existing_mimes = array() ) {
	// Add the file extension to the array
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}
add_filter( 'upload_mimes', 'absolutte_custom_upload_mimes' );


/**
* Check if the post type is a Portfolio post type
*
* @return bool
*/
if ( ! function_exists( 'absolutte_is_portfolio_type' ) ) {
    function absolutte_is_portfolio_type( $post_type ) {

    	$absolutte_portfolios_post_types = absolutte_get_portfolios_slug();
        if ( ! is_wp_error( $absolutte_portfolios_post_types ) ) {
        	if ( in_array( $post_type, $absolutte_portfolios_post_types ) ) :
                return true;
            else:
                return false;
            endif;
        }else{
            return false;
        }

    }
}


/**
 * Return only slug from all portfolios CPT
 *
 * @return array
 */
function absolutte_get_portfolios_slug(){

    if ( class_exists( 'Multiple_Portfolios' ) ) {

        $absolutte_portfolio_types = Multiple_Portfolios::get_post_types();
        $absolutte_portfolio_types_slugs = array();
        foreach ( $absolutte_portfolio_types as $portfolio ) {
            $absolutte_portfolio_types_slugs[] = $portfolio['slug'];
        }
        return $absolutte_portfolio_types_slugs;
    }else{
        return new WP_Error( 'plugin_missing', esc_html__( 'Multiple Portfolios plugin not installed', 'absolutte' ) );
    }

 }


 /**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function absolutte_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'absolutte_pingback_header' );