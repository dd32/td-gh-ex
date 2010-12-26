<!-- Begin Primary Menu -->
<div class="primarymenubox">
  <div class="primarymenuboxdata">            
    
	
	<?php if ( function_exists( 'wp_nav_menu' ) ){
            wp_nav_menu( array( 
                
                'menu'            	=> 'primary', 
                'container'       	=> 'div', 
                'container_class' 	=> 'primary-container', 
                'theme_location'	=> 'primary-menu',
                'menu_class'		=> 'sf-menu1',
                'depth'				=> 0,
                'fallback_cb'		=> 'primary_menu'
                
                )
            );
        }else{
            primary_menu();
    }?>    
    
  
  </div>
</div>
<!-- End Primary Menu -->