<?php

function semperfi_footer_widgets() {
    
    function semperfi_footer_widgets_html() {
        
        require get_parent_theme_file_path( '/inc/footer-widgets/html.php' );

    }
    
    add_action( 'footer_widgets' , 'semperfi_footer_widgets_html' );
    
    
}

add_action( 'functions-hook' , 'semperfi_footer_widgets' );