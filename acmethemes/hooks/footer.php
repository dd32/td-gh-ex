<?php
/**
 * Footer content
 *
 * @since AcmePhoto 0.0.1
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_footer' ) ) :

    function acmephoto_footer() {

        global $acmephoto_customizer_all_values;
        ?>
    <div class="clearfix"></div>
	<footer class="site-footer">
		<div class="container">
            <?php if( isset( $acmephoto_customizer_all_values['acmephoto-footer-copyright'] ) ): ?>
                <p class="init-animate text-center animated fadeInLeft">
                    <?php echo wp_kses_post( $acmephoto_customizer_all_values['acmephoto-footer-copyright'] ); ?>
                </p>
            <?php endif; ?>
            <?php
             if ( 1 == $acmephoto_customizer_all_values['acmephoto-enable-social'] ) {
                    /**
                     * Social Sharing
                     * acmephoto_action_social_links
                     * @since AcmePhoto 1.1.0
                     *
                     * @hooked acmephoto_social_links -  10
                     */
                    do_action('acmephoto_action_social_links');
                }
             ?>
			<div class="clearfix"></div>
			<div class="footer-copyright border text-center init-animate animated fadeInRight">
                <div class="site-info">
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'acmephoto' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'acmephoto' ), 'WordPress' ); ?></a>
                    <span class="sep"> | </span>
                    <?php printf( esc_html__( 'Theme: %1$s by %2$s', 'acmephoto' ), 'AcmePhoto', '<a href="http://www.acmethemes.com/" rel="designer">AcmeThemes</a>' ); ?>
                </div><!-- .site-info -->
            </div>
            <a href="#page" class="sm-up-container"><i class="fa fa-arrow-circle-up sm-up"></i></a>
		</div>
    </footer>
    <?php
    }
endif;
add_action( 'acmephoto_action_footer', 'acmephoto_footer', 10 );

/**
 * Page end
 *
 * @since AcmePhoto 1.1.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'acmephoto_page_end' ) ) :

    function acmephoto_page_end() {
        ?>
        </div><!-- #page -->
    <?php
    }
endif;
add_action( 'acmephoto_action_after', 'acmephoto_page_end', 10 );