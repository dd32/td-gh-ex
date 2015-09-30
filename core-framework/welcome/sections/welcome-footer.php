<?php
/**
 * Welcome screen who are woo template
 */
?>
<div id="welcome_footer" class="feature-section three-col" style="margin-bottom: 1.618em; overflow: hidden;">
    <div class="col">
        <h4>
            <?php esc_html_e( 'Iografica Themes', 'base-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Our goal is make the best free and premium WordPress themes and plugins.', 'base-wp' ); ?>
        </p>
        <p>
            <?php esc_html_e( 'Follow us on:', 'base-wp' ); ?><br>
            <a href="<?php echo esc_url('https://www.facebook.com/iograficathemes'); ?>"><?php esc_html_e( 'Facebook','base-wp'); ?></a> |
            <a href="<?php echo esc_url('https://twitter.com/iograficathemes'); ?>"><?php esc_html_e( 'Twitter','base-wp'); ?></a> |
            <a href="<?php echo esc_url('https://plus.google.com/+Iograficathemes/'); ?>"><?php esc_html_e( 'Google Plus','base-wp'); ?></a>
        </p>
        <p>
            <a href="<?php echo esc_url('http://iograficathemes.com'); ?>" class="button">
                <?php esc_html_e( 'Visit the website', 'base-wp' ); ?>
            </a>
        </p>
    </div>

    <div class="col">
        <h4>
            <?php esc_html_e( 'Can i contribute?', 'base-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Would you like to translate the theme into your language? Send us your language file and it will be included in the next theme release.', 'base-wp' ); ?>
        </p>
        <p>
            <a href="<?php echo esc_url('http://www.iograficathemes.com/document/make-a-translation/'); ?>" class="button">
                <?php esc_html_e( 'Read how to make a translation', 'base-wp' ); ?>
            </a>
        </p>
    </div>

    <div class="col">
        <h4>
            <?php esc_html_e( 'Can\'t find a feature?', 'base-wp' ); ?>
        </h4>
        <p>
            <?php esc_html_e( 'Please suggest and vote on ideas / feature requests at the ', 'base-wp' ); ?>
            <a href="<?php echo esc_url('https://iograficathemes.uservoice.com'); ?>">
                <?php esc_html_e( 'feedback forum', 'base-wp' ); ?>
            </a>
        </p>

        <h4>
            <?php esc_html_e( 'Do you like the theme?', 'base-wp' ); ?>
        </h4>
        <p>
            <?php echo sprintf( esc_html__( 'Why not leave a review on %sWordPress.org%s? We\'d really appreciate it! :-)', 'base-wp' ), '<a href="'. esc_url(wp_get_theme()->get( 'ThemeURI' )) .'">', '</a>' ); ?>
        </p>
    </div>
</div>
