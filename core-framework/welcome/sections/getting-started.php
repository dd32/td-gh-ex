<?php
/**
 * Welcome screen getting started template
 */
?>
<?php
// get theme customizer url
$url 	= admin_url() . 'customize.php?';
?>
<div id="getting_started" class="feature-section col two-col panel" style="padding-top: 1.618em; overflow: hidden;">

    <h2><?php esc_html_e( 'Using', 'base-wp' ); ?> <?php echo wp_get_theme()->get( "Name" );?> </h2>
    <p><?php esc_html_e( 'Thank you for use our theme. You can read detailed information on theme features and how to develop on top of it in the documentation.', 'base-wp' ); ?></p>
    <p><a href="<?php echo esc_url('http://www.iograficathemes.com/documentation/');?>" class="button"><?php esc_html_e( 'View Documentation', 'base-wp' ); ?></a></p>
    <p><?php esc_html_e( 'Here are some common theme-setup tasks: ', 'base-wp' ); ?></p>

    <div class="col-1">
        <h3><?php esc_html_e( 'Customize your theme' ,'base-wp' ); ?></h3>
        <p><?php esc_html_e( 'Customize your website with the WordPress Customizer.', 'base-wp' ); ?></p>
        <p><a href="<?php echo esc_url( $url ); ?>" class="button"><?php esc_html_e( 'Open the Customizer', 'base-wp' ); ?></a></p>
    </div>

    <div class="col-2 last">
        <h3><?php esc_html_e( 'Configure menu locations' ,'base-wp' ); ?></h3>
        <p><?php esc_html_e( 'Add and use your custom navigation menus.', 'base-wp' ); ?></p>
        <p><a href="<?php echo esc_url( self_admin_url( 'nav-menus.php' ) ); ?>" class="button"><?php esc_html_e( 'Configure menus', 'base-wp' ); ?></a></p>
    </div>
</div>
