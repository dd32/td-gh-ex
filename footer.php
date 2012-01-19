</div><!-- #main -->

<div class="clear"></div><!-- .clear  to clear the floats loacted in the main section -->

<footer class="clearfix" id="footer-bottom">
        
			<div id="footer-content" class="clearfix">
            
                <div class="column">         
				     <?php if ( ! dynamic_sidebar( 'Footer One' ) ) : ?><!--Wigitized Footer One--><?php endif ?>
                </div>
                
                <div class="column">         
				     <?php if ( ! dynamic_sidebar( 'Footer Two' ) ) : ?><!--Wigitized Footer Two--><?php endif ?>
                </div>
                
                <div class="column">         
				     <?php if ( ! dynamic_sidebar( 'Footer Three' ) ) : ?><!--Wigitized Footer Three--><?php endif ?>
                </div>
                
                <div class="column last">
                   <?php if ( ! dynamic_sidebar( 'Footer Four' ) ) : ?><!--Wigitized Footer Four--><?php endif ?>
                </div>
                
			</div><!--#footer-content-->
            
           <div id="site-credits">
           
           <div id="theme-credit">
           <?php do_action( 'azurebasic_credits' ); ?>

				<?php _e( 'Proudly powered by', 'azurebasic' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'azurebasic' ); ?>" rel="generator"><?php printf( 'WordPress' ); ?></a>. <a href="<?php echo esc_url( __( 'http://silverglass.net/2012/01/02/azure-basic-wordpress-theme/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'Azure Basic Theme', 'azurebasic' ); ?>" rel="generator"><?php printf( 'Azure Basic' ); ?></a> <?php _e( 'theme based on the', 'azurebasic' ); ?> <a href="<?php echo esc_url( __( 'http://silverglass.net/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'Silverglass Basic and Premium Themes', 'azurebasic' ); ?>" rel="generator"><?php printf( 'Silverglass Framework' ); ?></a> <?php _e( 'by', 'azurebasic' ); ?> <a href="<?php echo esc_url( __( 'http://cabrown.net/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'C. A. Brown', 'azurebasic' ); ?>" rel="generator"><?php printf( 'C. A. Brown' ); ?></a>.
		   </div><!-- #theme-credit -->
           
           </div><!-- #site-credits -->

</footer>

</div><!--.container -->

</div><!--#wrap-->

<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>


</body>

</html>