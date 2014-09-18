<?php
/**
 * the footer template file.
 */
 $topmag_options = get_option( 'topmag_theme_options' );
?>
<!-- footer -->
<div class="col-md-12 footer-post"> 
  <!-- Recent Posts -->
  <div class="col-md-4 no-padding-left">
    <?php if ( is_active_sidebar( 'footer-area-one' ) ) : dynamic_sidebar( 'footer-area-one' ); endif; ?>
  </div>
  <div class="col-md-4 no-padding-left">
    <?php if ( is_active_sidebar( 'footer-area-two' ) ) : dynamic_sidebar( 'footer-area-two' ); endif; ?>
  </div>
  <div class="col-md-4 no-padding-left">
    <?php if ( is_active_sidebar( 'footer-area-three' ) ) : dynamic_sidebar( 'footer-area-three' ); endif; ?>
  </div>
</div>
<footer>
  <div class="copyright col-lg-12">
    <div class="col-md-7 no-padding">
      <p><?php if(!empty($topmag_options['footertext'])) { 
               	 echo wp_filter_nohtml_kses($topmag_options['footertext']).' '; 
			}
				echo '<p>Proudly Powered by <a href="http://wordpress.org" target="_blank">WordPress</a> and <a href="http://fasterthemes.com/wordpress-themes/topmag">Top Mag</a>.';
		?></p>
    </div>
  </div>
</footer>
</div>
<?php wp_footer(); ?>
</body></html>