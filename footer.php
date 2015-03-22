<div class="footer-bottomm">
        <div class="container">
          <div class="row">
            <div class="col-md-6 avfoo">
              <p><?php  $options = get_option( 'arinio_theme_options' );  if($options['footertext'] != '') { echo esc_attr($options['footertext']); }else{ ?> <?php _e( ' Copyright &#169; 2015 Your Company. All Rights Reserved.', 'avnii' ); ?> <?php } ?></p>
              <p>
<?php _e('Powered by','avnii'); ?> <a href="<?php echo esc_url( 'http://wordpress.org' ); ?>" rel="nofollow"><?php _e('WordPress','avnii'); ?></a>. <?php _e('Theme by','avnii'); ?> <a href="<?php echo esc_url( 'http://arinio.com' ); ?>" rel="nofollow"><?php _e('Arinio','avnii'); ?></a>
                  </p>
            </div>
           <div class="col-md-6">
								<nav class="navbar navbar-default" role="navigation">
									<!-- Toggle get grouped for better mobile display -->
									<div class="navbar-header">
										<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
											<span class="sr-only"><?php _e( 'Toggle navigation', 'avnii' ); ?></span>
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

<!--end / footer-->
<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->

<?php wp_footer(); ?>
</body></html>