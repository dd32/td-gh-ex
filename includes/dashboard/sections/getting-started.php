<?php
/**
 * Display Welcome page Getting started section.
 *
 * @package Aakriti Personal Blog
 * @since 1.0
 * 
 */ 

?>
<div id="getting-started" class="gt-tab-pane gt-is-active">
    <div class="feature-section two-col">
        <div class="col">
                <h3><?php esc_html_e( 'Customize The Theme', 'aakriti-personal-blog' ); ?></h3>
                <p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'aakriti-personal-blog' ); ?></p>
                <p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Start Customize', 'aakriti-personal-blog' ); ?></a>
				<a href="<?php echo esc_url( 'http://demo.wponlinesupport.com/themes/aakriti-personal-blog/' ); ?>" target="_blank" class="button button-primary"><?php esc_html_e( 'View Demo', 'aakriti-personal-blog' ); ?></a> </p>
				
        </div>

        <div class="col">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.jpg" alt="<?php esc_attr_e( 'screenshot', 'aakriti-personal-blog' ); ?>">
        </div>
    </div>
</div>