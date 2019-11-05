<?php
/**
 * Header Logo
 */
if ( has_custom_logo() ) {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
} else {
    ?>
        <div><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
    <?php
}

if ( get_theme_mod( 'apex_business_site_description_switch_setting', 0 ) ) {
    ?>
        <p><?php bloginfo( 'description' ); ?></p>
    <?php
}
