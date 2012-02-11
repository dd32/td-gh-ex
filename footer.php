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
           
                 <p class="clearfix">&copy;<?php echo date('Y'); ?> <?php _e( 'Powered by', 'azurebasic' ); ?> <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'azurebasic' ); ?>"><?php printf( 'Wordpress' ); ?></a>. <?php _e( 'Azure Basic Theme by', 'azurebasic' ); ?> <a href="<?php echo esc_url( __( 'http://cabrown.net/', 'azurebasic' ) ); ?>" title="<?php esc_attr_e( 'C. A. Brown', 'azurebasic' ); ?>"><?php printf( 'C. A. Brown' ); ?></a>.</p>

		   </div><!-- #theme-credit -->
           
           </div><!-- #site-credits -->

</footer>

<div class="clear"></div><!-- .clear the floats -->

</div><!--.container -->

</div><!--#wrap-->

<?php wp_footer(); /* this is used by many Wordpress features and plugins to work proporly */ ?>


</body>

</html>