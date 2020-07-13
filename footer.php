<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WP FanZone
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
    	<div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-one'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-two'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-three'); ?>
                    </div>
                </div>
        </div>
        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                
                    <?php echo __('&copy; ', 'wp-fanzone') . esc_attr( get_bloginfo( 'name', 'wp-fanzone' ) );  ?>
                    <?php if(is_home() && !is_paged()){?>            
                        <?php echo __('Built with','wp-fanzone'); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-fanzone' ) ); ?>" rel="nofollow" target="_blank"><?php printf( esc_html( '%s', 'wp-fanzone' ), 'WordPress' ); ?></a><span><?php esc_html_e(' and ','wp-fanzone'); ?></span><a href="<?php echo esc_url( __( 'https://wpdevshed.com/wp-fanzone-theme/', 'wp-fanzone' ) ); ?>" rel="nofollow" target="_blank"><?php printf( esc_html( '%s', 'wp-fanzone' ), 'WP FanZone' ); ?></a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
