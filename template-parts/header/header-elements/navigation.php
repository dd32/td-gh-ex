<div id="main-navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'main-menu',
        'menu_class' => 'top-menu',
        'container' => 'nav',
        'container_class' => 'main-menu-nav',
        'fallback_cb' => 'atlast_business_wp_menu_fallback'
    ));
    ?>
</div>
