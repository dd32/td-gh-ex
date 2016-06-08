<?php

/*--------------------------------------------------------------------*/
/*   Register Google Fonts
/*--------------------------------------------------------------------*/

function becorp_fonts_url() {
	
    $fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Lato:100,200,300,400,500,600,700,800,900',
	'LatoMedium:100,300,400,700,900','roboto:100,200,300,400,500,700,900',
	'italic','Courgette'); 	
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}

function becorp_scripts_styles() {
    wp_enqueue_style( 'becorp-fonts', becorp_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'becorp_scripts_styles' );
?>