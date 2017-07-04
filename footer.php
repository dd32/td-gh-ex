    <footer id="footer">
    	<?php
			if ( get_theme_mod( 'enable_footer_widget',1) ){
		?>
        <div class="footer-top">
            <div class="wrap">              
			<?php
                if (  is_active_sidebar( 'sidebar-1' )|| is_active_sidebar( 'sidebar-2' )|| is_active_sidebar( 'sidebar-3' ) || is_active_sidebar( 'sidebar-4' ) )
                 {

					$footer_sidebars = array( 'sidebar-1', 'sidebar-2', 'sidebar-3', 'sidebar-4' );
			
					foreach ( $footer_sidebars as $key => $footer_sidebar ) :
						if ( is_active_sidebar( $footer_sidebar ) ) :
			
							dynamic_sidebar( $footer_sidebar );
			
						endif;
					endforeach;
				
				}
            ?> 
            </div>
        </div>
               
        <?php
		}
		
		?>
        <div class="footer-bottom">
            <p class="copyright"><?php if( get_theme_mod( 'footer_code','')!='' ){echo get_theme_mod( 'footer_code','');}?>  <?php printf(__('Powered by <a href="%s">WordPress</a>.  Ascreen theme by <a href="%s">CooThemes.com</a>','ascreen'),esc_url('http://wordpress.org/'),esc_url('http://www.coothemes.com/'));?></p>
            
        </div>
    </footer>
    
    <div id="toolitembar">  

        <?php if( get_theme_mod( 'enable_return_top',1) ){?>    
        <a href="javascript:;" id="back-top"><i class="icon-top"></i></a>
        <?php }?>    
    </div> 

    <?php wp_footer(); ?>   
      
    
</body>
</html>