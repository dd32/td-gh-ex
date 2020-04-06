<?php

function semper_fi_lite_footer_widgets() {
    
    function semper_fi_lite_footer_widgets_html() {
        
        require get_parent_theme_file_path( '/inc/footer-widgets/html.php' );

    }
    
    add_action( 'semper_fi_lite_footer_widgets_action' , 'semper_fi_lite_footer_widgets_html' );
    
    
}

add_action( 'semper_fi_lite-functions-hook' , 'semper_fi_lite_footer_widgets' );