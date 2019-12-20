<?php
/**
 * Semper Fi Lite: Customizer
 *
 * @package WordPress
 * @subpackage Semper_Fi
 * @since 78
 */


// Only update Setting after a save
function semperfi_theme_mod_css_finalizing() {
    
    
    // Get all the Theme Customizer Options that theme currently supports
    require get_parent_theme_file_path( '/inc/customizer/customizer-options.php' );
        
    $semperfi_all_sheet_style_handles = array();
    
    // We need to go though all the options to find all the possible sheet style handles
    foreach( $semperfi_customizer_array_of_options as $option => $values ) {
        
        if ( !empty( $values[ 'input_attrs' ][ 'stylesheet_handle' ] ) ) {
            
            array_push( $semperfi_all_sheet_style_handles , $values[ 'input_attrs' ][ 'stylesheet_handle' ] );
            
        }
        
    }
    
    // 
    foreach ( $semperfi_all_sheet_style_handles as $key => $value ) {
        
        
        $current_sheet_style_handle = get_theme_mod( 'semperfi_customizer_' . $value . '_temporary' );
        
        $final_customized_css = '';
            
        foreach( $current_sheet_style_handle as $key2 => $value2 ) {

            $final_customized_css .= $value2;

            set_theme_mod( 'semperfi_customizer_all_sheet_style_handles' , $value2 );

        }

        set_theme_mod( 'semperfi_customizer_' . $value . '_finalized' , $final_customized_css );
        
    }

}

add_action( 'customize_save_after', 'semperfi_theme_mod_css_finalizing' );
