        <footer id="footer">
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

            
            <div id="copyright">
                    <div class="row">
                        <div class="col-md-12">                    
                        <?php echo __('&copy; ', 'wp-newsstream') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
                        <?php if(is_home() && !is_paged()){?>            
                            <?php _e('- Powered by ', 'wp-newsstream'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-newsstream' ) ); ?>" title="<?php esc_attr_e( '' ); ?>"><?php _e('WordPress' ,'wp-newsstream'); ?></a>
                            <?php _e(' and ', 'wp-newsstream'); ?><a href="<?php echo esc_url( __( 'http://hostmarks.com/', 'wp-newsstream' ) ); ?>"><?php _e('Hostmarks', 'wp-newsstream'); ?></a>
                        <?php } ?>
                        </div>
                    </div>
            </div>
            
        </footer>
        <!-- WP Footer -->
	</div> <!--end id main-container-->
</div> <!--end id wrapper-->

<script>
jQuery(document).ready(function($){
			$('#wpslide').skdslider({
			<?php if ( get_theme_mod( 'wp_newsstream_slider_speed' ) ) : ?>
				'delay' :<?php echo get_theme_mod( 'wp_newsstream_slider_speed' ) ; ?>,
			<?php endif; ?>
			'animationSpeed': 2000,
			'showNextPrev':false,
			'showPlayButton':false,
			'autoSlide':true,
			'animationType':'fading'
			});		
			
});
</script>
<?php wp_footer(); ?>

</body>
</html>