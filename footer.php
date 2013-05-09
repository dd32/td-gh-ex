    <footer id="footer">
        <div class="footer-widgets">
            <?php if ( 
                is_active_sidebar( 'sidebar-5' ) 
                && is_active_sidebar( 'sidebar-6' ) 
                && is_active_sidebar( 'sidebar-7' )
            )
            return; ?>
            <div class="cols">
                <?php if ( ! dynamic_sidebar( 'sidebar-5' ) ) : 
                    the_widget( 'WP_Widget_Recent_Comments' );
                endif; ?>
            </div>
            <div class="cols">
                <?php if ( ! dynamic_sidebar( 'sidebar-6' ) ) : 
                    the_widget( 'WP_Widget_Archives' );
                endif; ?>
            </div>
            <div class="cols">
                <?php if ( ! dynamic_sidebar( 'sidebar-7' ) ) : 
                    the_widget( 'WP_Widget_Recent_Posts' );
                endif; ?>
            </div>
        </div>
        <p class="footer-notes"><?php do_action( 'content_credits' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> <?php printf( __( 'is based on', 'content' ) ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'content' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'content' ); ?>" rel="generator"><?php printf( __( '%s', 'content' ), 'WordPress' ); ?></a>.</p>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>