<?php

/*--------------------------------------------------------------------*/
/*     Register Google Fonts
/*--------------------------------------------------------------------*/
function spasalon_fonts_url() {
	
	$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
	
    $fonts_url = '';
		
    $font_families = array();
	
	if(!in_array( $current_options['home_section_title_fontfamily'] , $font_families ))
    {
		$font_families[] = $current_options['home_section_title_fontfamily'].':100,300,400,400italic,700';
    }
	
	if(!in_array( $current_options['menu_title_fontfamily'] , $font_families ))
    {
		$font_families[] = $current_options['menu_title_fontfamily'].':100,300,400,400italic,700';
    }
	
	if(!in_array( $current_options['post_title_fontfamily'] , $font_families ))
    {
		$font_families[] = $current_options['post_title_fontfamily'].':100,300,400,400italic,700';
    }
	
	if(!in_array( $current_options['postexcerpt_fontfamily'] , $font_families ))
    {
		$font_families[] = $current_options['postexcerpt_fontfamily'].':100,300,400,400italic,700';
    }
	
	if(!in_array( $current_options['widget_title_fontfamily'] , $font_families ))
    {
		$font_families[] = $current_options['widget_title_fontfamily'].':100,300,400,400italic,700';
    }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;
}
function spasalon_scripts_styles() {
	
    wp_enqueue_style( 'spasalon-fonts', spasalon_fonts_url(), array(), null );
	
}
add_action( 'wp_enqueue_scripts', 'spasalon_scripts_styles' );