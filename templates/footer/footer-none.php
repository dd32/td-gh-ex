<footer id="colophon" class="site-footer site-footer-none" role="contentinfo">
	
	<div class="site-footer-bottom-bar">
	
		<div class="site-container">
			
			<div class="site-footer-bottom-bar-left">
                
                <?php printf( __( 'Theme: %1$s by %2$s', 'conica' ), 'Conica', '<a href="https://kairaweb.com/">Kaira</a>' ); ?>
                
                <?php do_action ( 'conica_footer_bottombar_left' ); ?>
                
			</div>
	        
	        <div class="site-footer-bottom-bar-right">
	        	
	        	<?php do_action ( 'conica_footer_bottombar_right' ); ?>
                
	            <?php wp_nav_menu( array( 'theme_location' => 'conica-footer-menu','container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
                
                <?php if ( ! get_theme_mod( 'conica-footer-hide-social' ) ) : ?>
                	
                	<?php get_template_part( '/templates/social-links' ); ?>
                	
                <?php endif; ?>
                
	        </div>
	        
	    </div>
		
        <div class="clearboth"></div>
	</div>
	
</footer>