<footer id="footer">
   
    <div class="container">
	
         <div class="row copyright" >
            <div class="span6" >
            
            <p>
            
				<?php if (wip_setting('wip_copyright_text')): ?>
                   <?php echo stripslashes(wip_setting('wip_copyright_text')); ?>
                <?php else: ?>
                  <?php _e('Copyright','wip'); ?> <?php echo get_bloginfo("name"); ?> <?php echo date("Y"); ?> 
                <?php endif; ?> 
                | <?php _e('Theme by','wip'); ?> <a href="http://www.themeinprogress.com/" target="_blank">Theme in Progress</a> |
                <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', '_s' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', '_s' ), 'WordPress' ); ?></a>

            </p>
            
            </div>
            <div class="span6" >
                <!-- start social -->
                <div class="socials">
                    <?php do_action( 'wip_socials' ); ?>
                </div>
                <!-- end social -->

            </div>
		</div>
	</div>
</footer>

<?php wp_footer() ?>

</body>

</html>