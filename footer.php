 <!-- Footer -->
        <footer id="footer">
         
        <div id="footer-copyright">
          <div class="container">
            <div class="row">
            
            <div class="col-md-6 avfoo">
            <p><?php if(get_theme_mod('aripop_copyright_text')): echo esc_attr( get_theme_mod( 'aripop_copyright_text' ) ); else: echo __('Copyright &#169; 2016 All Rights Reserved.', 'aripop');  endif;?> </p>
            <p class="copyright">
<?php _e('Powered by','aripop'); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>" rel="nofollow"><?php _e('WordPress','aripop'); ?></a>. <?php _e('Theme by','aripop'); ?> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" rel="nofollow"><?php _e('Arinio','aripop'); ?></a>
                  </p>
             </div>
            
              <div class="col-md-6 clearfix">
                  <nav class="navbar navbar-default" role="navigation">
									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>   
									<div class="navbar-collapse collapse" id="navbar-collapse-2" style="height: 1px;">
										
                                       <?php if ( has_nav_menu( 'secondary' ) ) : ?>
 
		<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_class' => 'nav navbar-nav nkkl navbar-right','depth'=>-1 ) ); ?>
	 
	<?php endif; ?>
                                        
                                            
									</div>
								</nav>
                
                
              </div>
            </div>
          </div>
        </div>
      </footer>
<!--end / footer-->

 
 
<?php wp_footer(); ?>







<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->
 


</body></html>