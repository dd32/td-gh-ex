<?php
/**
 * Welcome screen add-ons template
 */
?>
<div id="themes" class="feature-section panel" style="padding-top: 1.618em; clear: both;">
    <h2><?php esc_html_e( 'More themes', 'base-wp' ); ?></h2>
    <p><?php esc_html_e( 'Try one of our free themes.', 'base-wp' ); ?></p>
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
        echo esc_html__('An error has occurred', 'base-wp');
    }
    else {
        // Display a list of the plug-ins and the number of downloads
        if ( $theme ) {
            foreach ( $theme as $theme ) { ?>

    <div class="item-container">
        <div class="image-container theme">
            <img class="theme-screenshot" src="<?php echo esc_url($theme->screenshot_url);?>"/>
                <div class="item-description">
                    <p><?php echo esc_html(substr( $theme->description, 0, 140). __( '&#8230;', 'base-wp' ));?></p>
                </div>
        </div>
        <div class="item-details">
            <span class="item-name"><?php echo esc_html($theme->name); ?></span>
            <!-- Check if the theme is installed -->
            <?php if( wp_get_theme( $theme->slug )->exists() ) { ?>
            <!-- Show the tick image notifying the theme is already installed. -->
            <span class="item-status"><?php esc_html_e( 'installed', 'base-wp' ); ?></span>
            <?php }	else {
                // Set the install url for the theme.
                $install_url = add_query_arg( array(
                'action' => 'install-theme',
                'theme'  => $theme->slug,
                ), self_admin_url( 'update.php' ) );
                ?>
            <!-- Install Button -->
            <span class="item-buttons">
                <a class="button button-primary install" href="<?php echo esc_url( wp_nonce_url( $install_url, 'install-theme_' . $theme->slug ) ); ?>" >
                    <?php esc_html_e( 'Install Now', 'base-wp' ); ?>
                </a>
                <?php } ?>
            </span>
        </div>
    </div>

           <?php }
        }
    }
}
else {
    // Error object returned
    echo esc_html__('An error has occurred', 'base-wp');
}
    ?>
</div>
