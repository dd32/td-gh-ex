<footer id="colophon" class="site-footer site-footer-social" role="contentinfo">
	
	<div class="site-footer-icons">
        <div class="site-container">
        	
        	<?php if ( ! get_theme_mod( 'conica-footer-hide-social' ) ) : ?>
	            
	            <?php
				if( get_theme_mod( 'conica-social-email' ) ) :
				    echo '<a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'conica-social-email' ), 1 ) ) . '" title="' . esc_attr__( 'Send Us an Email', 'conica' ) . '" class="footer-social-icon footer-social-email"><i class="fab fa-envelope-o"></i></a>';
				endif;

				if( get_theme_mod( 'conica-social-facebook' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-facebook' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'conica' ) . '" class="footer-social-icon footer-social-facebook"><i class="fab fa-facebook"></i></a>';
				endif;
                
                if( get_theme_mod( 'conica-social-twitter' ) ) :
                    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-twitter' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Facebook', 'conica' ) . '" class="footer-social-icon footer-social-twitter"><i class="fab fa-twitter"></i></a>';
                endif;

				if( get_theme_mod( 'conica-social-google-plus' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-google-plus' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Google Plus', 'conica' ) . '" class="footer-social-icon footer-social-gplus"><i class="fab fa-google-plus"></i></a>';
				endif;
				
				if( get_theme_mod( 'conica-social-linkedin' ) ) :
				    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-linkedin' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on LinkedIn', 'conica' ) . '" class="footer-social-icon footer-social-linkedin"><i class="fab fa-linkedin"></i></a>';
				endif;
                
                if( get_theme_mod( 'conica-social-behance' ) ) :
                    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-behance' ) ) . '" target="_blank" title="' . esc_attr__( 'Find us on Behance', 'conica' ) . '" class="footer-social-icon social-behance"><i class="fab fa-behance"></i></a>';
                endif;
                
                if( get_theme_mod( 'conica-social-tumblr' ) ) :
                    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-tumblr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Tumblr', 'conica' ) . '" class="footer-social-icon footer-social-tumblr"><i class="fab fa-tumblr"></i></a>';
                endif;

                if( get_theme_mod( 'conica-social-flickr' ) ) :
                    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-flickr' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on Flickr', 'conica' ) . '" class="footer-social-icon footer-social-flickr"><i class="fab fa-flickr"></i></a>';
                endif;
                
                if( get_theme_mod( 'conica-social-vk' ) ) :
                    echo '<a href="' . esc_url( get_theme_mod( 'conica-social-vk' ) ) . '" target="_blank" title="' . esc_attr__( 'Find Us on VK', 'conica' ) . '" class="footer-social-icon social-vk"><i class="fab fa-vk"></i></a>';
                endif; ?>
			
			<?php endif; ?>
			
			<?php if ( get_theme_mod( 'conica-website-footer-add' ) ) : ?>
	        	<div class="site-footer-social-ad">
                    <i class="fa <?php echo ( get_theme_mod( 'conica-website-footer-icon' ) ) ? sanitize_html_class( get_theme_mod( 'conica-website-footer-icon' ) ) : sanitize_html_class( 'fa-map-marker' ); ?>"></i> <?php echo wp_kses_post( get_theme_mod( 'conica-website-footer-add' ) ) ?>
	        	</div>
			<?php endif; ?>
			
			<div class="site-footer-social-copy">
				<?php printf( __( 'Theme: %1$s by %2$s', 'conica' ), '<a href="https://kairaweb.com/theme/conica/">Conica</a>', '<a href="https://kairaweb.com/">Kaira</a>' ); ?>
			</div>
            
            <div class="clearboth"></div>
        </div>
    </div>
    
</footer>

<div class="site-footer-bottom-bar">

	<div class="site-container">
		
		<?php do_action ( 'conica_footer_bottombar_left' ); ?>
		
        <?php wp_nav_menu( array( 'theme_location' => 'conica-footer-menu','container' => false, 'fallback_cb' => false, 'depth'  => 1 ) ); ?>
        
        <?php do_action ( 'conica_footer_bottombar_right' ); ?>
            
    </div>
	
    <div class="clearboth"></div>
</div>