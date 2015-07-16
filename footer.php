<footer id="footer">
   
    <div class="container">
	
         <div class="row copyright" >
            <div class="span6" >
            
            <p>
            
				<?php if (alhenalite_setting('wip_copyright_text')): ?>
                   <?php echo stripslashes(alhenalite_setting('wip_copyright_text')); ?>
                <?php else: ?>
                  <?php _e('Copyright',"alhenalite"); ?> <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> 
                <?php endif; ?> 
                | <?php _e('Theme by',"alhenalite"); ?> <a href="http://www.themeinprogress.com/" target="_blank">Theme in Progress</a> |
                <a href="<?php echo esc_url( __( 'http://wordpress.org/', "alhenalite" ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', "alhenalite" ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', "alhenalite" ), 'WordPress' ); ?></a>
                
            </p>
            
            </div>
            <div class="span6" >
                <!-- start social -->
                <div class="socials">
                    <?php do_action( 'alhenalite_socials' ); ?>
                </div>
                <!-- end social -->

            </div>
		</div>
	</div>
</footer>

<?php wp_footer() ?>

</body>

</html>