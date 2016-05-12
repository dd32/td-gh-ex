<?php
/**
 * Welcome screen getting started template
 */
?>
<?php $theme_data = wp_get_theme('basic-shop'); ?>

<div id="getting_started" class="panel">
            <div class="theme_link">
                <div class="evidence">
                    <h3><?php esc_html_e( 'Upgrade to premium', 'basic-shop' ); ?></h3>
                    <p class="about"><?php printf(esc_html__('If you like this theme, considering supporting development by purchasing the  premium version.', 'basic-shop'), $theme_data->Name); ?></p>
                    <a href="<?php echo admin_url('themes.php?page='. $theme_data->Template .'-license'); ?>" class="button-upgrade"><?php esc_html_e('Upgrade To Premium', 'basic-shop'); ?></a>
                </div>
            </div>
            <div class="theme_link">
                <h3><?php esc_html_e( 'Theme Customizer', 'basic-shop' ); ?></h3>
                <p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'basic-shop'), $theme_data->Name); ?></p>
                <p>
                    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-secondary"><?php esc_html_e('Start Customize', 'basic-shop'); ?></a>
                </p>
            </div>
            <div class="theme_link">
                <h3><?php esc_html_e( 'Theme Documentation', 'basic-shop' ); ?></h3>
                <p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'basic-shop'), $theme_data->Name); ?></p>
                <p>
                    <a href="<?php echo esc_url( 'http://www.iograficathemes.com/documentation/basic-shop-premium/' ); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('View Documentation', 'basic-shop'); ?></a>
                </p>
            </div>
            <div class="theme_link">
                <h3><?php esc_html_e( 'Having Trouble, Need Support?', 'basic-shop' ); ?></h3>
                <p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through our support system.', 'basic-shop'), $theme_data->Name); ?></p>
                <p>
                    <a href="<?php echo esc_url('http://www.iograficathemes.com/premium-support/' ); ?>" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Ask for support', 'basic-shop'), $theme_data->Name); ?></a>
                </p>
            </div>
</div><!-- end ig-started -->
