	
	</div><!-- #container -->

	<div class="push"></div>

</div><!-- #wrapper -->

<footer id="colophon" role="contentinfo">
	<div class="footer-wrap">
    
    	<div class="footer-wfix">
    
    	<?php virality_footer_nav(); ?>
        
        <div id="site-generator">
            <?php echo __('&copy; ', 'virality') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
            <?php if ( is_front_page() && ! is_paged() ) : ?>
            <?php _e('- Built with ', 'virality'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'virality' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'virality' ); ?>"><?php _e('WordPress' ,'virality'); ?></a>
            <?php _e(' and ', 'virality'); ?><a href="<?php echo esc_url( __( 'http://wpdevshed.com/themes/virality/', 'virality' ) ); ?>"><?php _e('Virality', 'virality'); ?></a>
            <?php endif; ?>
        </div>
        
        </div>
     	
     </div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>


</body>
</html>