<div class="footer-bottomm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <p><?php  $options = get_option( 'arinio_theme_options' );  if($options['footertext'] != '') { echo $options['footertext']; }else{ echo '&#169; 2015 Arinio Theme.'; } ?></p>
            </div>
           <div class="col-md-6">
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
 
		<?php wp_nav_menu( array( 'theme_location' => 'secondary','menu_class' => 'nav navbar-nav nkkl navbar-right' ) ); ?>
	 
	<?php endif; ?>
                                        
                                        
									</div>
								</nav>
							</div>
          </div>
        </div>
      </div>

<!--end / footer-->
<?php wp_footer(); ?>



 <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>





<!--++++++++++++++ Footer Section End +++++++++++++++++++++++++-->
 


</body></html>