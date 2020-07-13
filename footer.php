	
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
    <div id="site-generator">

        <?php echo __('&copy; ', 'hardpressed') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
        <?php if ( is_front_page() && ! is_paged() ) : ?>
        <?php echo __(' - Built with','hardpressed'); ?> <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'hardpressed' ) ); ?>" rel="nofollow" target="_blank"><?php printf( esc_html( '%s', 'hardpressed' ), 'WordPress' ); ?></a><span><?php esc_html_e(' and ','hardpressed'); ?></span><a href="<?php echo esc_url( __( 'https://wpdevshed.com/hardpressed-theme/', 'hardpressed' ) ); ?>" rel="nofollow" target="_blank"><?php printf( esc_html( '%s', 'hardpressed' ), 'Hardpressed' ); ?></a>
        <?php endif; ?>
        <?php hardpressed_footer_nav(); ?>
        
    </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>