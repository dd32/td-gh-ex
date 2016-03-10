    <footer id="footer">
        <div class="footer-top">
            <div class="wrap">              
			<?php
                if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) && ! is_active_sidebar( 'sidebar-3' ) && ! is_active_sidebar( 'sidebar-4' ) )
                    return;

                $footer_sidebars = array( 'sidebar-1', 'sidebar-2', 'sidebar-3', 'sidebar-4' );
        
                foreach ( $footer_sidebars as $key => $footer_sidebar ) :
                    if ( is_active_sidebar( $footer_sidebar ) ) :
        
                        dynamic_sidebar( $footer_sidebar );
        
                    endif;
                endforeach;
            ?> 
            </div>
        </div>
               
        <div class="footer-bottom">
            <p class="copyright"><?php printf(__('Powered by <a href="%s">WordPress</a>. Ascreen @ 2015 Design by <a href="%s">CooThemes.com</a>.','ascreen'),esc_url('http://wordpress.org/'),esc_url('http://www.coothemes.com/'));?></p>
            
        </div>
    </footer>
    
  	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
    <?php wp_footer(); ?>   
</body>
</html>