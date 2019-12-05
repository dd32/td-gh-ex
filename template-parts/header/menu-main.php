<?php
/**
 * Main Menu
 */
?>
<div class="menu-wrapper <?php echo esc_attr( get_theme_mod( 'apex_business_header_layout_control', 'default' ) ); ?>">
    <?php if ( has_nav_menu( 'header_menu' ) ) : ?>
    <div class="header-navigation">
        <?php
            wp_nav_menu( array(
                'theme_location'    => 'header_menu',
                'container'         => 'nav',
                'container_class'   => 'menu-all-pages-container',
                'menu_class'        => 'main-nav',
                'depth'             => 4,
                'fallback_cb'       => 'wp_page_menu',
            ) );
        ?>
    </div><!-- /.header-navigation-->
    <?php endif; ?>

    <?php if ( get_theme_mod( 'apex_business_navigation_last_item_setting', 'none' ) == 'search-icon' ) : ?>
        <span class="fa fa-search search-icon"></span>
    <?php endif; ?>

    <div class="search-dropdown search-default">
        <div class="header-search-form clearfix">
            <?php get_search_form( $echo = true ); ?>
        </div><!-- /.search-form -->
    </div><!-- /.search-dropdown -->

    <?php
            if ( ( get_theme_mod( 'apex_business_navigation_last_item_setting', 'none' ) == 'button' )
             && get_theme_mod( 'apex_business_navigation_last_button_text_setting', __( 'Click Here', 'apex-business' ) ) != '' ) :
    ?>
        <a href="<?php echo esc_url( get_theme_mod( 'apex_business_navigation_last_button_link_setting', '#' ) ); ?>" class="button nav-button"><?php echo esc_html( get_theme_mod( 'apex_business_navigation_last_button_text_setting', __( 'Click Here', 'apex-business' ) ) ); ?></a>
    <?php endif; ?>
</div><!-- /.menu-wrapper -->
