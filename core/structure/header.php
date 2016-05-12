<?php
/**
 * Template functions used for the site header.
 */
//SITE TITLE
function igthemes_site_title() {
        if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();
		} elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
			jetpack_the_site_logo();
		} elseif ( '' != get_bloginfo( 'name' ) ) { ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php bloginfo( 'name' ); ?>
            </a>
        </h1>
<?php  
    }
}
//SITE DESCRIPTION
function igthemes_site_description() { 
   	$description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
            <p class="site-description">
                <?php echo $description; /* WPCS: xss ok. */ ?>
            </p>
<?php
    endif; 
}

//MAIN MENU
if ( ! function_exists( 'igthemes_site_main_menu' ) ) {
    function igthemes_site_main_menu() { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'basic-shop' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'fallback_cb' => '__return_false') ); ?>
		</nav><!-- #site-navigation -->
    <?php  }
}

//MAIN MENU
if ( ! function_exists( 'igthemes_site_header_menu' ) ) {
    function igthemes_site_header_menu() { ?>
		<nav id="header-navigation" class="header-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'header', 'menu_id' => 'header-menu', 'depth' => 1,  'fallback_cb' => '__return_false') ); ?>
		</nav><!-- #header-navigation -->
        <?php if ( get_header_image() ) : ?>
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" class="header-image">
        <?php endif; // End header image check. ?>
    <?php  }
}

