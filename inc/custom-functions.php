<?php

/**
 * All theme custom functions are delared here
 */

/*************************************************************************************************************************
 * Loads google fonts to the theme
 * Thanks to themeshaper.com
 ************************************************************************************************************************/

if ( ! function_exists( 'apex_business_fonts_url' ) ) :

function apex_business_fonts_url() {
  $apex_business_fonts_url  = '';
  $apex_business_poppins   = _x( 'on', 'Poppins font: on or off', 'apex-business' );
  $apex_business_sspro = _x( 'on', 'Source Sans Pro font: on or off', 'apex-business' );

  if ( 'off' !== $apex_business_poppins || 'off' !== $apex_business_sspro ) {
    $apex_business_font_families = array();

    if ( 'off' !== $apex_business_poppins ) {
      $apex_business_font_families[] = 'Poppins:400,500,600';
    }

    if ( 'off' !== $apex_business_sspro ) {
      $apex_business_font_families[] = 'Sourse+Sans+Pro:300,400';
    }
  }

  $apex_business_query_args = array(
    'family' => urlencode( implode( '|', $apex_business_font_families ) ),
    'subset' => urlencode( 'cyrillic-ext,cyrillic,vietnamese,latin-ext,latin' )
  );

  $apex_business_fonts_url = add_query_arg( $apex_business_query_args, 'https://fonts.googleapis.com/css' );

  return esc_url_raw( $apex_business_fonts_url );
}

endif;

/*************************************************************************************************************************
 * Set the content width
 ************************************************************************************************************************/

if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

/*************************************************************************************************************************
 *  Adds a span tag with dropdown icon after the unordered list
 *  that has a sub menu on the mobile menu.
 ************************************************************************************************************************/

class Apex_Business_Dropdown_Toggle_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl( &$apex_business_output, $apex_business_depth = 0, $apex_business_args = array() ) {
        $apex_business_indent = str_repeat( "\t", $apex_business_depth );
        if( 'mobile_menu' == $apex_business_args->theme_location ) {
            $apex_business_output .='<i class="fa fa-ellipsis-v dropdown-toggle"></i>';
        }
        $apex_business_output .= "\n$apex_business_indent<ul class=\"sub-menu\">\n";
    }
}

/*************************************************************************************************************************
 *  Filter the excerpt "read more" string.
 ************************************************************************************************************************/

function apex_business_excerpt_more() {
    return '...';
}

add_filter( 'excerpt_more', 'apex_business_excerpt_more' );
