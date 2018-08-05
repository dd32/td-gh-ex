<?php
function adviso_customize_registere_header($wp_customize) {
    $wp_customize->get_section('title_tagline')->panel = 'adviso_header_panel';
    $wp_customize->get_section('header_image')->panel = 'adviso_header_panel';

    $wp_customize->add_panel('adviso_header_panel', array(
        'title' => __('Header Settings', 'adviso'),
        'priority' => 10,
    ));

}
add_action('customize_register', 'adviso_customize_registere_header');