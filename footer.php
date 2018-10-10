	
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
    <div id="site-generator">

        <?php echo __('&copy; ', 'wp-barrister') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
        <span><?php if(is_home() || is_front_page()): ?>
            - <?php echo __( 'Made using ','wp-barrister' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wp-barrister' ) ); ?>" target="_blank"><?php printf('%s', 'WordPress' ); ?></a> <span><?php _e('and','wp-barrister'); ?></span> <a href="<?php echo esc_url( __( 'https://wpdevshed.com/themes/wp-barrister/', 'wp-barrister' ) ); ?>" target="_blank"><?php printf( esc_html( '%s', 'wp-barrister' ), 'WP Barrister' ); ?></a>
        <?php endif; ?>
        </span>
        <?php wp_barrister_footer_nav(); ?>
        
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>