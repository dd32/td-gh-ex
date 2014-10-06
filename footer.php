<footer id="footer">
	<div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-two') ) : ?>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-three') ) : ?>
                <?php endif; ?>
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

<?php wp_footer(); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$.getScript('<?php echo get_template_directory_uri(); ?>/js/jquery.imagesloaded.min.js',function(){
		$.getScript('<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js',function(){
		  /* activate jquery isotope */
		  $('#posts').imagesLoaded( function(){
			$('#posts').isotope({
			  itemSelector : '.item'
			});
		  }); 
		
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
</body>
</html>