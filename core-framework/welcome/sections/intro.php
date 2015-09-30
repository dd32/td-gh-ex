<?php
/**
 * Welcome screen intro template
 */
?>


<div class="feature-section two-col" style="margin-bottom: 1.618em; overflow: hidden;">
    <div class="col">
        <h1 style="margin-right: 0;">
            <?php echo '<strong>'.wp_get_theme()->get( "Name" ).'</strong> <sup style="font-weight: bold; font-size: 14px; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( wp_get_theme()->get( 'Version' ) ) . '</sup>'; ?>
        </h1>

        <p style="font-size: 1.2em;">
            <?php esc_html_e( 'Thank you to use ', 'base-wp'); ?><?php echo wp_get_theme()->get( "Name" ); ?><?php esc_html_e( ' for your website.', 'base-wp' ); ?>
        </p>
        <p>
            <?php esc_html_e( 'Here you can read the documentation and you can know how to get the most out of your new theme.', 'base-wp' ); ?>
        </p>

        <h3>
            <?php esc_html_e( 'UPGRADE TO PREMIUM', 'base-wp' ); ?>
        </h3>
        <p>
            <?php esc_html_e( 'If you like this theme, considering supporting development by purchasing the premium version.', 'base-wp' ); ?>
        </p>
        <p>
            <a href="http://www.iograficathemes.com/downloads/base-wp-premium/" class="button button-primary" style="text-decoration: none;">
                <?php esc_html_e( 'More Info', 'base-wp' ); ?>
            </a>
        </p>
    </div>
    <div class="col">
        <img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" class="image-50" width="440" />
    </div>
</div>
