<?php
/**
 * Welcome screen getting started template
 */
?>
<?php $theme_data = wp_get_theme('basic-shop'); ?>

<div id="getting_started" class="panel">
    <div class="theme_link evidence">
        <?php if ( is_plugin_active( 'basic-shop-premium/'. $theme_data->get( 'TextDomain' ) .'-premium.php' ) )  { ?>
           <h3><?php printf(esc_html__('%s Premium', 'basic-shop'), $theme_data->Name); ?></h3>
           <p>
               <?php esc_html_e( 'Remember to activate your license key to get sproduct support and updates.', 'basic-shop'); ?>
           </p>
           <p><a href="<?php echo esc_url( admin_url() . 'themes.php?page=basic-shop-premium-license' ); ?>" class="button-upgrade">
               <?php esc_html_e('view license key', 'basic-shop'); ?>
          </a></p>
           <p>
           <strong><?php esc_html__('Having troubles?', 'basic-shop'); ?></strong></br>

            <?php printf(__('<a href="%s" target="_blank">Contact us</a> and talk with our support team, we will glad to help you.', 'basic-shop'), esc_url( 'http://www.iograficathemes.com/premium-support/' )); ?>

           </p>
        <?php } else { ?>
        <h3><?php printf(esc_html__('%s Premium', 'basic-shop'), $theme_data->Name); ?></h3>
        <p class="about">
            <?php printf(__('%s Premium expands the already powerful free version of this theme and gives access to our priority support service.', 'basic-shop'), $theme_data->Name); ?>
        </p>    
        <p> 
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/downloads/'. $theme_data->get( 'TextDomain' ) .'-premium' ); ?>" target="_blank" class="button-upgrade"><?php esc_html_e('upgrade to premium', 'basic-shop'); ?></a>
        </p>
        <?php } ?>
    </div>
     <div class="theme_link">
        <h3><?php esc_html_e( 'Enjoying the theme?', 'basic-shop' ); ?></h3>
        <p class="about"><?php esc_html_e( 'If you like this theme why not leave us a review on WordPress.org?  We\'d really appreciate it!', 'basic-shop' ); ?></p>
        <p>
            <a href="<?php echo esc_url( 'https://wordpress.org/support/theme/'. $theme_data->get( 'TextDomain' ) .'/reviews/#new-post' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Add Your Review', 'basic-shop'); ?></a>
        </p>
    </div>
    <div class="theme_link">
        <h3><?php esc_html_e( 'Theme Documentation', 'basic-shop' ); ?></h3>
        <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'basic-shop'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo esc_url( 'http://www.iograficathemes.com/documentation/'. $theme_data->get( 'TextDomain' ) .'-premium/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('View Documentation', 'basic-shop'); ?></a>
        </p>
    </div>
    <div class="theme_link">
        <h3><?php esc_html_e( 'Theme Customizer', 'basic-shop' ); ?></h3>
        <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'basic-shop'), $theme_data->Name); ?></p>
        <p>
            <a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'basic-shop'); ?></a>
        </p>
    </div>


<ul class="items">
    <li class="themes">
        <h3><?php esc_html_e( 'Free themes', 'basic-shop' ); ?></h3>
            <?php
            // Set the arguments. For brevity of code, I will use most of the defaults
            $args = array(
                'author' => 'iografica',
            );
            // Make request and extract plug-in object
            $response = wp_remote_post(
            'http://api.wordpress.org/themes/info/1.0/',
            array(
            'body' => array(
                'action' => 'query_themes',
                'request' => serialize((object)$args)
                    )
                )
            );

            if ( !is_wp_error($response) ) {
                $returned_object =  unserialize(wp_remote_retrieve_body($response));
                $theme = $returned_object->themes;
                if ( !is_object($theme) && !is_array($theme) ) {
                // Response body does not contain an object/array
                echo esc_html__('An error has occurred', 'basic-shop');
            }
            else {
            // Display a list of the plug-ins and the number of downloads
            if ( $theme ) {
                foreach ( $theme as $theme ) { ?>
                <div class="product">
                    <span class="name"><?php echo esc_html($theme->name); ?></span>
                    <!-- Check if the theme is installed -->
                    <?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
                    <!-- Show the tick image notifying the theme is already installed. -->
                    <span class="status"><?php esc_html_e( 'installed', 'basic-shop' ); ?></span>
                    <?php }	else {
                    // Set the install url for the theme.
                    $install_url = add_query_arg( array(
                    'action' => 'install-theme',
                    'theme'  => $theme->slug,
                    ), self_admin_url( 'update.php' ) );
                    ?>
                    <!-- Install Button -->
                    <span class="buttons">
                    <a class="install" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" >
                        <?php esc_html_e( 'Install Now', 'basic-shop' ); ?>
                    </a>
                    <?php } ?>
                    </span><!-- item-buttons -->
                </div><!-- item -->
           <?php }
            }
        }
    }
    else {
        // Error object returned
        echo esc_html__('An error has occurred', 'basic-shop');
    }?>
    </li><!-- themes -->

    <li class="plugins">
    <h3><?php esc_html_e( 'Free plugins', 'basic-shop' ); ?></h3>
    <?php
    $args = array(
        'author' => 'iografica',
        'fields' => array(
            'description' => true,
            'downloadlink' => true
        )
    );
    // Make request and extract plug-in object. Action is query_plugins
    $response = wp_remote_post(
        'http://api.wordpress.org/plugins/info/1.0/',
        array(
        'body' => array(
            'action' => 'query_plugins',
            'request' => serialize((object)$args)
            )
        )
    );
    if ( !is_wp_error($response) ) {
        $returned_object = unserialize(wp_remote_retrieve_body($response));
        $plugins = $returned_object->plugins;
        if ( !is_array($plugins) ) {
            // Response body does not contain an object/array
            echo esc_html__('An error has occurred', 'basic-shop');
        }
        else {
            // Display a list of the plug-ins and the number of downloads
            if ( $plugins ) {
                foreach ( $plugins as $plugin ) { ?>
        <div class="product">
            <span class="name">
                <?php echo esc_html($plugin->name) ?>
            </span><!-- item-name -->
            <span class="buttons">
                <a class="download" target="_blank" href="<?php echo esc_url($plugin->download_link); ?>">
                    <?php esc_html_e( 'Download Now', 'basic-shop' ); ?>
                </a>
            </span><!-- item-buttons -->
        </div><!-- item -->
            <?php }
        }
    }
}
else {
    // Error object returned
        echo esc_html__('An error has occurred', 'basic-shop');
}
    ?>
    </li><!-- plugins -->
</ul><!-- items -->

</div><!-- end ig-started -->
