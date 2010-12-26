<!-- Begin Secondary Menu -->
<div class="secondarymenubox">
  <div class="secondarymenuboxdata">            
    
	<?php if ( function_exists( 'wp_nav_menu' ) ){
			wp_nav_menu( array( 
				
				'menu'            	=> 'secondary', 
				'container'       	=> 'div', 
				'container_class' 	=> 'secondary-container', 
				'theme_location'	=> 'secondary-menu',
				'menu_class'		=> 'sf-menu2',
				'depth'				=> 0,
				'fallback_cb'		=> 'secondary_menu'
				
				)
			);
		}else{
			secondary_menu();
	}?>
  
  </div>
</div>
<!-- End Secondary Menu -->