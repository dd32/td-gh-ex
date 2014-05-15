<div id="back-to-top"> <i class="fa fa-chevron-up"></i> </div>

<footer id="footer">
	
    <div class="container">

		<?php if ( is_active_sidebar('bottom-sidebar-area') ) : ?>
        
			<section class="row widgets">
                    
				<?php dynamic_sidebar('bottom-sidebar-area') ?>
                    
            </section>
                
        <?php endif; ?>

        <div class="row" >
             
			<div class="col-md-12" >

                <div class="copyright">

                    <p>
                        <?php if (diarjolite_setting('diarjolite_copyright_text')): ?>
                           <?php echo stripslashes(diarjolite_setting('diarjolite_copyright_text')); ?>
                        <?php else: ?>
                          <?php _e('Copyright','diarjolite'); ?> <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> 
                        <?php endif; ?> 
                        | <?php _e('Theme by','diarjolite'); ?> <a href="<?php echo esc_url('http://www.themeinprogress.com/'); ?>" target="_blank">Theme in Progress</a> |
                        <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'diarjolite' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'diarjolite' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'diarjolite' ), 'WordPress' ); ?></a>
                    
                    </p>

				</div>
                
                <?php do_action('diarjolite_socials'); ?>

                <div class="clear"></div>
                
			</div>
                
		</div>
        
	</div>
    
</footer>

<?php wp_footer() ?>  
 
</body>

</html>