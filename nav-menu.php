<div id="access" role="navigation">

    <?php /*

    Allow screen readers / text browsers to skip the navigation menu and
    get right to the good stuff. */ ?>

    <div class="skip-link screen-reader-text">
        <a href="#content" title="<?php esc_attr_e( 'Skip to content', 'betilu' ); ?>">
        <?php _e( 'Skip to content', 'betilu' ); ?></a>
    </div>

    <?php

    wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

</div><!-- #access -->