<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best Minimalist
 */

?>

    </div><!-- .wrap -->
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="wrap">
            <div class="site-info">
                <div class="left">
                    <p><?php esc_html_e( 'Copyright &copy;', 'best-minimalist' ); bloginfo(); ?></p>
                </div>
                <div class="right">
                    
                    <p><?php
                        /* translators: 1: Theme name */
                        printf( esc_html__( '%1$s', 'best-minimalist' ), '<a href="'. esc_url( __('https://wpvkp.com/minimalist-wordpress-theme/', 'best-minimalist')) .'">Best Minimalist</a> by WPVKP' );
                    ?></p>
                </div>
            </div><!-- .site-info -->
        </div>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>