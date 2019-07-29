<?php
    if ( is_active_sidebar( 'apex-business-footer-left' )
        || is_active_sidebar( 'apex-business-footer-middle' )
        || is_active_sidebar( 'apex-business-footer-right' ) ) :
?>
        <footer id="ct-footer-tag">
            <div class="ct-footer container" id="ct-footer-section">
                <div class="row">
                    <div class="four columns">
                       <?php
                            if ( is_active_sidebar( 'apex-business-footer-left' ) ) {
                                dynamic_sidebar( 'apex-business-footer-left' );
                            }
                        ?>
                    </div><!-- /.four columns -->

                    <div class="four columns">
                        <?php
                            if ( is_active_sidebar( 'apex-business-footer-middle' ) ) {
                                dynamic_sidebar( 'apex-business-footer-middle' );
                            }
                        ?>
                    </div><!-- /.four columns -->

                    <div class="four columns">
                        <?php
                            if ( is_active_sidebar( 'apex-business-footer-right' ) ) {
                                dynamic_sidebar( 'apex-business-footer-right' );
                            }
                        ?>
                    </div><!-- /.four columns -->
                </div><!-- /.row -->
            </div><!-- /.ct-footer container -->
        </footer>
        <?php endif; ?>

        <div class="row ct-bottom-bar">
            <div class="twelve columns ct-bb-right">
                <p><?php esc_html_e( 'Copyright', 'apex-business' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><?php esc_html_e( '. All rights reserved.', 'apex-business' ); ?>
                <?php echo esc_html__(' | Designed by', 'apex-business') ?> <a href="<?php echo esc_url('https://www.crafthemes.com/', 'minimalist-blog'); ?>"><?php echo esc_html__(' Crafthemes.com', 'apex-business') ?></a></p>
            </div><!-- /.six columns -->
        </div><!-- /.row -->
    </div><!-- /.ct-content -->

    <?php wp_footer(); ?>
</body>
</html>
