<?php
/**
 * Welcome screen child plugins template
 */
?>
<div id="plugins" class="feature-section panel" style="padding-top: 1.618em; clear: both;">
    <h2><?php esc_html_e( 'More plugins', 'base-wp' ); ?></h2>
    <p><?php esc_html_e( 'Try one of our free plugins.', 'base-wp' ); ?></p>
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
        echo esc_html__('An error has occurred', 'base-wp');
    }
    else {
        // Display a list of the plug-ins and the number of downloads
        if ( $plugins ) {
            foreach ( $plugins as $plugin ) { ?>
     <div class="item-container plugin">
        <div class="item-details">
            <span class="item-name">
                <?php echo esc_html($plugin->name) ?>
            </span>
            <!-- Download button -->
            <span class="item-buttons">
                <a class="button button-secondary" target="_blank" href="<?php echo esc_url($plugin->download_link); ?>">
                    <?php esc_html_e( 'Download Now', 'base-wp' ); ?>
                </a>
            </span>
        </div>
            <div class="item-description">
                    <p><?php echo esc_html(substr($plugin->short_description, 0, 60). __( '&#8230;', 'base-wp' ));?></p>
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
