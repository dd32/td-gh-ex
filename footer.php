<footer id="footer">
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
    
    <div id="copyright">
    	<div class="container">
            <div class="row">
                <div class="col-md-12">
            
				<?php echo __('&copy; ', 'wp-fanzone') . esc_attr( get_bloginfo( 'name', 'display' ) );  ?>
                <?php if(is_home() && !is_paged()){?>            
					<?php _e('- Powered by ', 'wp-fanzone'); ?><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wp-fanzone' ) ); ?>" title="<?php esc_attr_e( '' ); ?>"><?php _e('WordPress' ,'wp-fanzone'); ?></a>
                    <?php _e(' and ', 'wp-fanzone'); ?><a href="<?php echo esc_url( __( 'http://hostmarks.com/', 'wp-fanzone' ) ); ?>"><?php _e('Hostmarks', 'wp-fanzone'); ?></a>
           		<?php } ?>
                </div>
            </div>
    	</div>
    </div>
    
</footer>

<!-- WP Footer -->
<script type="text/javascript">
jQuery(document).ready(function($) {	
		  $('#posts').imagesLoaded( function(){
			$('#posts').isotope({
			  itemSelector : '.item'
			});
		  }); 

	/*Slider*/
	$('.pgwSlider').pgwSlider({
	<?php if ( get_theme_mod( 'wp_fanzone_slider_speed' ) ) : ?>
		intervalDuration :<?php echo get_theme_mod( 'wp_fanzone_slider_speed' ) ; ?>
	<?php endif; ?>
	});
});
</script>
<?php wp_footer(); ?>
</body>
</html>