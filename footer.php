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

	<footer id="colophon" class="site-footer" role="contentinfo">
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
                        <?php _e('- Powered by ', 'wp-fanzone'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-fanzone' ) ); ?>" title="<?php esc_attr_e( '' ); ?>"><?php _e('WordPress' ,'wp-fanzone'); ?></a>
                        <?php _e(' and ', 'wp-fanzone'); ?><a href="<?php echo esc_url( __( 'http://hostmarks.com/', 'wp-fanzone' ) ); ?>"><?php _e('Hostmarks', 'wp-fanzone'); ?></a>
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
