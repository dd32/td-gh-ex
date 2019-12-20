<?php
/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'apex_business_default_fonts_url' ) ) :

function apex_business_default_fonts_url() {
  $fonts_url  = '';
  $poppins   = _x( 'on', 'Poppins font: on or off', 'apex-business' );
  $roboto = _x( 'on', 'Roboto font: on or off', 'apex-business' );

  if ( 'off' !== $poppins || 'off' !== $roboto ) {
    $font_families = array();

    if ( 'off' !== $poppins ) {
      $font_families[] = 'poppins:400,500,600';
    }

    if ( 'off' !== $roboto ) {
      $font_families[] = 'Roboto:400,500';
    }
  }

  $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $fonts_url );
}

endif;

/*******************************************************************************
 * Set the content width
 *******************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 1200;
}

/*******************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 *******************************************************************************/

class Apex_Business_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$apex_business_output, $apex_business_depth = 0, $apex_business_args = array() ) {
        $apex_business_indent = str_repeat( "\t", $apex_business_depth );
        if( 'mobile_menu' == $apex_business_args->theme_location ) {
            $apex_business_output .='<a href="#" class="js-ct-dropdown-toggle dropdown-toggle"><i class="fa fa-ellipsis-v"></i></a>';
        }
        $apex_business_output .= "\n$apex_business_indent<ul class=\"sub-menu\">\n";
    }
}

/*******************************************************************************
 *  Filter the excerpt "read more" string.
 *******************************************************************************/

function apex_business_excerpt_more() {
    return '...';
}

add_filter( 'excerpt_more', 'apex_business_excerpt_more' );

/*******************************************************************************
 *  Displays Breadcrumb on post/pages
 *******************************************************************************/

if ( ! function_exists( 'apex_business_the_breadcrumb' ) ) :

function apex_business_the_breadcrumb() {
    //$sep = ' <span class="fa fa-angle-double-right"></span> ';
    if ( !is_front_page() ) {

        // Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumb clearfix">';
        echo '<a href="' . esc_url( home_url() ) . '">';
        echo esc_html__( 'Home', 'apex-business' );
        echo '</a> <span class="fa fa-angle-double-right"></span> ';

        // Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if ( is_category() || is_single() ){
            the_category( ', ' );
        } elseif ( is_archive() || is_single() ){
            if ( is_day() ) {
                echo esc_html( get_the_date() );
            } elseif ( is_month() ) {
                echo esc_html( get_the_date( 'F Y' ) );
            } elseif ( is_year() ) {
                echo esc_html( get_the_date( 'Y' ) );
            } elseif ( is_author() ) {
                echo esc_html( get_the_author_meta( 'display_name' ) );
            } else {
                esc_html__( 'Blog Archives', 'apex-business' );
            }
        }

        // If the current page is a single post, show its title with the separator
        if ( is_single() ) {
            echo ' <span class="fa fa-angle-double-right"></span> ';
            the_title();
        }

        // If the current page is a static page, show its title.
        if ( is_page() ) {
            the_title();
        }

        echo '</div>';
    }
}

endif;

/*******************************************************************************
 *  Decides blog page layout based on user input
 *******************************************************************************/

if ( ! function_exists( 'apex_business_blog_layout' ) ) :

function apex_business_blog_layout() {
    $loop_layout_setting = get_theme_mod( 'apex_business_blog_layout_setting', 'list' );
    $loop_layout         = 'col-md-12 loop-list-layout';

    if ( $loop_layout_setting == 'masonry' ) {
        switch ( get_theme_mod( 'apex_business_masonry_column_number_control', 3 ) ) {
            case 1:
                $loop_layout    = 'col-md-12 grid-item';
                break;
            case 2:
                $loop_layout    = 'col-md-6 grid-item';
                break;
            case 3:
                $loop_layout    = 'col-md-4 grid-item';
                break;
            case 4:
                $loop_layout    = 'col-md-3 grid-item';
                break;

            default:
                $loop_layout    = 'col-md-4 grid-item';
                break;
        }
    }

    return $loop_layout;
}

endif;

/*******************************************************************************
 *  Custom Excerpt Length
 *******************************************************************************/

// Custom excerpt length
function apex_business_custom_excerpt_length( $length ) {

    if( get_theme_mod( 'apex_business_post_excerpt_length_control', 30 ) == 600 ) {
        return 9999;
    }
    return esc_html( get_theme_mod( 'apex_business_post_excerpt_length_control', 30 ) );
}

add_filter( 'excerpt_length', 'apex_business_custom_excerpt_length', 999 );

/*******************************************************************************
 *  Custom Dynamic Class
 *******************************************************************************/

function apex_business_dynamic_class( $customizer_setting, $class_name, $default = 1 ) {

    if( get_theme_mod( $customizer_setting, $default ) == 1 ) {
        return $class_name;
    }
    return false;
}
