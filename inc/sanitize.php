<?php

// Icon show hide Sanitize Value
if ( ! function_exists( 'footer_socail_icon_show_hide_sanitize' ) ){
    function footer_socail_icon_show_hide_sanitize( $checked ) {
        return ( ( isset( $checked ) && true == $checked ) ? true : false );
    }
}
