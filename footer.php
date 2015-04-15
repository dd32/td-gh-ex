 <?php /* Footer Template */?>
  <?php $avocation_options = get_option( 'avocation_theme_options' ); ?>
   <!--==============================Footer start=================================-->
        <footer>
            <div class="footer-bg">
                <div class="avocation-container  container">
					<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )) {?>
                    <div class="row footer-sidebar">
                       <?php if ( is_active_sidebar( 'footer-1' ) ) {?>
                        <aside class="col-md-3 col-sm-6">
                             <?php dynamic_sidebar( 'footer-1' );?> 
                        </aside><?php } ?>
                         <?php if ( is_active_sidebar( 'footer-2' ) ) {?>
                        <aside class="col-md-3 col-sm-6">
                             <?php dynamic_sidebar( 'footer-2' );?> 
                        </aside><?php } ?>
                        <?php if ( is_active_sidebar( 'footer-3' ) ) {?>
                        <aside class="col-md-3 col-sm-6">
                             <?php dynamic_sidebar( 'footer-3' );?> 
                        </aside><?php } ?>
                        <?php if ( is_active_sidebar( 'footer-4' ) ) {?>
                        <aside class="col-md-3 col-sm-6">
                             <?php dynamic_sidebar( 'footer-4' );?> 
                        </aside><?php } ?>
                    </div>
                   <?php }?>
                    <div class="copyright">  
					    <span>
		<?php printf( __( 'Powered by %1$s and %2$s.', 'avocation' ), '<a href="http://wordpress.org" target="_blank">WordPress</a>', '<a href="http://fruitthemes.com/wordpress-themes/avocation" target="_blank">Avocation</a>' ); ?>
		</span>                   
                       <?php if(!empty($avocation_options['avocation-footertext'])) { ?>
						<p><?php echo esc_html($avocation_options['avocation-footertext']).' ';  ?></p> <?php } 
						 ?>
						
       
                    </div>
                </div>              	
            </div>
        </footer>
      
    <?php wp_footer(); ?>

    </body>


</html>
