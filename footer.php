<?php
/**
 * the footer template file.
 */
 $top_mag_options = get_option( 'topmag_theme_options' ); ?>
</div>
<footer>
  <div class="footer-post">
    <div class="container">
     <div class="row">
    <?php
     /* Footer */
    if ( is_active_sidebar( 'footer-area-one' ) || is_active_sidebar( 'footer-area-two' ) || is_active_sidebar( 'footer-area-three' ) ){ ?>
      
          <!-- Recent Posts -->
          <div class="col-md-4">
            <?php if ( is_active_sidebar( 'footer-area-one' ) ) : dynamic_sidebar( 'footer-area-one' ); endif; ?>
          </div>
          <div class="col-md-4">
            <?php if ( is_active_sidebar( 'footer-area-two' ) ) : dynamic_sidebar( 'footer-area-two' ); endif; ?>
          </div>
          <div class="col-md-4">
            <?php if ( is_active_sidebar( 'footer-area-three' ) ) : dynamic_sidebar( 'footer-area-three' ); endif; ?>
          </div>
      
    <?php } ?>
  </div>
</div>
</div>
  <div class="copyright">
    <div class="container">
     <div class="row">  
      <div class="col-md-12">
        <p><?php if(get_theme_mod('footerCopyright',isset($top_mag_options['footertext'])?$top_mag_options['footertext']:'') != '') { 
                 	 echo wp_kses_post(get_theme_mod('footerCopyright',$top_mag_options['footertext'])).' '; 
  			}
        /* translators: 1: footer text*/
  			printf( esc_html__( 'Powered by %1$s ', 'top-mag' ), '<a href="'.esc_url("http://fasterthemes.com/wordpress-themes/topmag").'" target="_blank">Top Magazine WordPress Theme</a>' ); ?></p>
      </div>
     </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>