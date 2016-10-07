<?php
/*-----------------------------------------------------------------
 * HEADER
-----------------------------------------------------------------*/
add_action( 'igthemes_header', 'igthemes_header_navigation', 10 );
add_action( 'igthemes_header', 'igthemes_site_logo', 20 );
add_action( 'igthemes_header', 'igthemes_site_title', 30 );
add_action( 'igthemes_header', 'igthemes_site_description', 40 );
add_action( 'igthemes_header', 'igthemes_main_navigation', 50 );

// SITE TITLE
if ( ! function_exists( 'igthemes_site_title' ) ) {
    //start
    function igthemes_site_title() {
        echo '<div class="site-title"><h1><a href="'. esc_url( home_url( '/' ) ).'" rel="home"> ' . get_bloginfo( "name" ) . '</a></h1></div>';
    }
}
// SITE DESCRIPTION
if ( ! function_exists( 'igthemes_site_description' ) ) {
    //start
    function igthemes_site_description() { 
        if ( '' != get_bloginfo( 'description' ) ) {
            echo '<div class="site-description">' . get_bloginfo( 'description' ) . '</div>';
        }
    }
}
// SITE DESCRIPTION
if ( ! function_exists( 'igthemes_site_logo' ) ) {
    //start
    function igthemes_site_logo() { 
        if ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
            jetpack_the_site_logo();
        } else {
            the_custom_logo();
        }
    }
}
// MAIN NAVIGATION
if ( ! function_exists( 'igthemes_main_navigation' ) ) {
    //start function
    function igthemes_main_navigation() { ?>
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <?php esc_html_e( 'Menu', 'base-wp' ); ?>
        </button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
    </nav><!-- #site-navigation -->
<?php  }
}
// HEADER NAVIGATION
if ( ! function_exists( 'igthemes_header_navigation' ) ) {
    //start function
    function igthemes_header_navigation() { ?>
    <nav id="header-navigation" class="header-nav" role="navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'header-menu', 'fallback_cb' => false ) ); ?>
    </nav><!-- #site-navigation -->
<?php  }
}

