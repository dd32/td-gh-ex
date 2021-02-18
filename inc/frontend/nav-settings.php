<?php



function benjamin_get_benjamin_nav_title() {
    $output = '';
    $link = '<a href="' . esc_url( home_url( '/' ) ) . '"
        accesskey="1" title="Home" aria-label="Home"> '.get_bloginfo( 'name' ).'
    </a>';
    if ( is_front_page() ) :
        $output .= '<h1 class="site-title">' . $link . '</h1>';
    else :
        $output .= '<h2 class="site-title">' . $link . '</h2>';
    endif;

    return $output;
}


function benjamin_nav_title() {
    echo benjamin_get_benjamin_nav_title();
}


// because why not?
function benjamin_navbar_header_class() {
    $color = get_theme_mod('navbar_color_setting');
    $color = $color ? 'usa-header--'.$color : 'usa-header--light';

    return $color;
}


function benjamin_navbar_class() {

    $size = get_theme_mod('navbar_size_setting');
    $size = $size ? 'usa-nav-container--'.$size : 'usa-nav-container--slim';

    return $size;
}
