<?php
if ( ! function_exists( 'acmeblog_after_content' ) ) :
    /**
     * if front page div end
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_after_content() {
      ?>
        </div><!-- #content -->
        </div><!-- content-wrapper-->
    <?php
    }
endif;
add_action( 'acmeblog_action_after_content', 'acmeblog_after_content', 10 );

if ( ! function_exists( 'acmeblog_footer' ) ) :
    /**
     * Footer content
     *
     * @since acmeblog 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function acmeblog_footer() {
        global $acmeblog_customizer_all_values;
        ?>
        <!-- *****************************************
             Footer section starts
         ****************************************** -->
        <div class="clearfix"></div>
        <footer id="colophon" class="site-footer" role="contentinfo">
            <div class="wrapper footer-wrapper">
                <div class="top-bottom">
                    <div id="footer-top">
                        <div class="footer-columns">

                            <?php if( is_active_sidebar( 'footer-col-one' ) ) : ?>
                                <div class="footer-sidebar col-3">
                                    <?php dynamic_sidebar( 'footer-col-one' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( is_active_sidebar( 'footer-col-two' ) ) : ?>
                                <div class="footer-sidebar col-3">
                                    <?php dynamic_sidebar( 'footer-col-two' ); ?>
                                </div>
                            <?php endif; ?>

                            <?php if( is_active_sidebar( 'footer-col-three' ) ) : ?>
                                <div class="footer-sidebar col-3">
                                    <?php dynamic_sidebar( 'footer-col-three' ); ?>
                                </div>
                            <?php endif; ?>

                            <div class="clear"></div>
                        </div>
                    </div><!-- #foter-top -->
                    <div class="clearfix"></div>
                 </div><!-- top-bottom-->
                <div class="footer-copyright border text-center">
                    <p>
                        <?php if( isset( $acmeblog_customizer_all_values['acmeblog-footer-copyright'] ) ): ?>
                            <?php echo  wp_kses_post($acmeblog_customizer_all_values['acmeblog-footer-copyright']); ?>
                        <?php endif; ?>
                    </p>
                    <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'acmeblog' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'acmeblog' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'acmeblog' ), 'AcmeBlog', '<a href="http://www.acmethemes.com/" rel="designer">AcmeThemes</a>' ); ?>
                    </div><!-- .site-info -->
                </div>
                <?php if( isset( $acmeblog_customizer_all_values['acmeblog-footer-up-enable'] ) && 1 == $acmeblog_customizer_all_values['acmeblog-footer-up-enable']): ?>
                    <div id="hide" class="sm-up-container">
                        <a href="#page" class="fa fa-angle-up sm-up"></a>
                    </div>
                <?php endif; ?>
            </div><!-- footer-wrapper-->
        </footer><!-- #colophon -->
        <!-- *****************************************
                 Footer section ends
        ****************************************** -->
    <?php
    }
endif;
add_action( 'acmeblog_action_footer', 'acmeblog_footer', 10 );