<?php 

/* Sanitization for Image Type */
function accesspress_lite_sanitize_templayout($accesspress_lite_input){
    $accesspress_lite_output = array(
        'template_one'   => esc_html__( 'Template One', 'accesspress-lite' ),
        'template_two' => esc_html__( 'Template Two', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

/* Sanitization for Check Box */
function accesspress_lite_sanitize_checkbox($accesspress_lite_input){
    if($accesspress_lite_input){
        return 1;
    }else{
        return '';
    }
}


function accesspress_lite_sanitize_yes_no($accesspress_lite_input){
    $accesspress_lite_input = 'no';
    if($accesspress_lite_input){
        $accesspress_lite_input = 'yes';
    }
    $accesspress_lite_output = array(
        'yes'  => esc_html__( 'Yes', 'accesspress-lite' ),
        'no' => esc_html__( 'No', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_yes1_no1( $accesspress_lite_input ) {
    $accesspress_lite_input = 'no1';
    if($accesspress_lite_input){
        $accesspress_lite_input = 'yes1';
    }
    $accesspress_lite_output = array(
        'yes1'  => esc_html__( 'Yes', 'accesspress-lite' ),
        'no1' => esc_html__( 'No', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_yes2_no2( $accesspress_lite_input ) {
    $accesspress_lite_input = 'no2';
    if($accesspress_lite_input){
        $accesspress_lite_input = 'yes2';
    }
    $accesspress_lite_output = array(
        'yes2'  => esc_html__( 'Yes', 'accesspress-lite' ),
        'no2' => esc_html__( 'No', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_yes3_no3( $accesspress_lite_input ) {
    $accesspress_lite_input = 'no3';
    if($accesspress_lite_input){
        $accesspress_lite_input = 'yes3';
    }
    $accesspress_lite_output = array(
        'yes3'  => esc_html__( 'Yes', 'accesspress-lite' ),
        'no3' => esc_html__( 'No', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_sl_trsn($accesspress_lite_input){
    $accesspress_lite_output = array(
        'fade'   => esc_html__( 'fade', 'accesspress-lite' ),
        'slide' => esc_html__( 'slide', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}


/* Sanitization for Image Type */
function accesspress_lite_sanitize_weblayout($accesspress_lite_input){
    $accesspress_lite_output = array(
        'Fullwidth'   => esc_html__( 'Fullwidth', 'accesspress-lite' ),
        'Boxed' => esc_html__( 'Boxed', 'accesspress-lite' ),
    );
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

/* Sanitization for Textarea */     
function accesspress_lite_sanitize_textarea($accesspress_lite_input){
    return wp_kses_post( force_balance_tags( $accesspress_lite_input ) );
}

/* Sanitization for 3 Layout radio */
function accesspress_lite_sanitize_menu($accesspress_lite_input){
    $accesspress_lite_output = array(
        'Left'   => esc_html__( 'Left', 'accesspress-lite' ),
        'Right'   => esc_html__( 'Right', 'accesspress-lite' ),
        'Center' => esc_html__( 'Center', 'accesspress-lite' ),
    );  
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_category_lists($accesspress_lite_input) {
    $accesspress_lite_output = accesspress_lite_category_lists();
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_post_lists($accesspress_lite_input) {
    $accesspress_lite_output = accesspress_lite_post_list();
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}

function accesspress_lite_sanitize_number($accesspress_lite_input){
    return intval($accesspress_lite_input);
}

/* Sanitization for slider type */
function accesspress_lite_sanitize_slider($accesspress_lite_input){
    $accesspress_lite_output = array(
        'single_post_slider'   => esc_html__( 'Single Post Slider', 'accesspress-lite' ),
        'cat_post_slider' => esc_html__( 'Category Posts as a Slider', 'accesspress-lite' ),
    );  
    if(array_key_exists($accesspress_lite_input,$accesspress_lite_output)){
        return $accesspress_lite_input;
    }else{
        return '';
    }
}   