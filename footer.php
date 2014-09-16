<?php 
/**
 * The Footer template.
 */
 $multishop_options = get_option( 'multishop_theme_options' ); 
 ?>

<div class="clearfix"></div>
<footer>
  <div class="container multishop-container multishop-footer">
    <div class="row">
      <div class="col-md-3 col-sm-6 footer-box">
        <?php if ( is_active_sidebar( 'footer-1' ) ) {  dynamic_sidebar( 'footer-1' ); } ?>
      </div>
      <div class="col-md-3 col-sm-6 footer-box">
        <?php if ( is_active_sidebar( 'footer-2' ) ) {  dynamic_sidebar( 'footer-2' ); } ?>
      </div>
      <div class="col-md-3 col-sm-6 footer-box">
        <?php if ( is_active_sidebar( 'footer-3' ) ) {  dynamic_sidebar( 'footer-3' ); } ?>
      </div>
      <div class="col-md-3 col-sm-6 footer-box">
        <?php if ( is_active_sidebar( 'footer-4' ) ) {  dynamic_sidebar( 'footer-4' ); } ?>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container multishop-container">
      <div class="col-md-6 foot-copy-right no-padding-lr">
        <?php if(!empty($multishop_options['footertext'])) {
			 	echo '<p>'. $multishop_options['footertext'].' '; 
			  } else {
			  	echo '<p>Proudly Powered by <a href="http://wordpress.org" target="_blank">WordPress</a>';
			  }
                echo"<span class='multishop-poweredby'> <a href='http://fasterthemes.com/themes/multishop'>Multishop theme</a> by FasterThemes.</span>";
		 ?>
        </p>
      </div>
      <div class="col-md-6  no-padding-lr social-icon">
        <ul>
          <?php if(!empty($multishop_options['fburl'])) { ?>
          <li><a href="<?php echo esc_url($multishop_options['fburl']); ?>"><i class="fa fa-facebook-square twitt"></i></a></li>
          <?php } ?>
          <?php if(!empty($multishop_options['twitter'])) { ?>
          <li><a href="<?php echo esc_url($multishop_options['twitter']);?>"><i class="fa fa-twitter-square linkin"></i></a></li>
          <?php } ?>
          <?php if(!empty($multishop_options['googleplus'])) { ?>
          <li><a href="<?php echo esc_url($multishop_options['googleplus']); ?>"><i class="fa fa-google-plus-square"></i></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body></html>