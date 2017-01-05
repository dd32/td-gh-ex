 <?php /* Footer Template */?>
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
							<?php printf( __( 'Powered by %1$s', 'avocation' ),'<a href="http://fruitthemes.com/wordpress-themes/avocation" target="_blank">Avocation WordPress Theme</a>' ); ?>
							</span>
						<?php $copyright_check = get_theme_mod( 'copyright_url_setting' );
						if(!empty($copyright_check)) { ?>
							<p><?php echo esc_html( get_theme_mod('copyright_url_setting', '') ); ?></p> 
						<?php } ?>
					</div>
				</div>              	
			</div>
		</footer>
    <?php wp_footer(); ?>
    </body>
</html>