<?php

    
    add_action('admin_menu', 'aripop_setup_menu');
     
    function aripop_setup_menu(){
    	add_theme_page( __('AR Theme Details', 'aripop' ), __('AR Theme Details', 'aripop' ), 'edit_theme_options', 'aripop-setup', 'aripop_init' ); 
    }  
     
 	function aripop_init(){ 
	 	echo '<div class="grid grid-pad"><div class="col-1-1"><h1 style="text-align: center;">';
		printf( __('Thank you for using Aripop Theme :)', 'aripop' ));  
        echo "</h1></div></div>";
			
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 40px; margin-bottom: 30px;" ><div class="col-1-3"><h2>'; 
		printf( __('View Theme Demo', 'aripop' ));
        echo '</h2>';
		
		echo '<p>';
		printf( __('You can see more feature & functionality in our PRO Virsion. Watch the Demo by clicking the link below.', 'aripop' )); 
		echo '</p>'; 
		
		echo '<a href="http://arinio.com/aripop-responsive-multipurpose-wordpress-theme/" target="_blank"><button>';  
		printf( __('View Demo', 'aripop' )); 
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('Get Pro Free This Theme', 'aripop' ));
        echo '</h2>';  
		
		echo '<p>';
		printf( __('If you want to get Pro version of this theme Totally Free. Click the link below.', 'aripop' )); 
		echo '</p>'; 
		
		echo '<a href="http://arinio.com/get-free-our-theme/" target="_blank"><button>'; 
		printf( __('Read More', 'aripop' ));
		echo "</button></a></div>";
		
		echo '<div class="col-1-3"><h2>'; 
		printf( __('View More Our Themes', 'aripop' )); 
        echo '</h2>';  
		
		echo '<p>';
		printf( __('Want to see more our themes you simply visit our site. Click the link below.', 'aripop' ));
		echo '</p>';
		
		echo '<a href="http://arinio.com/" target="_blank"><button>';
		printf( __('Visit Site', 'aripop' ));
		echo '</button></a></div></div>';
		
		echo '<div class="grid grid-pad senswp"><div class="col-1-1"><h1 style="padding-bottom: 30px; text-align: center;">';
		printf( __('Get Aripop PRO Theme! Just $19', 'aripop' )); 
		echo '</h1></div>';
		
        echo '<div class="col-1-12 adcenter"><i class="fa fa-cogs"></i><h4>';
		printf( __('You are using the Aripop, Free Version of Aripop Pro Theme. Upgrade to Pro for extra features like Home Page Unlimited Slider, Work Gallery, Team section, Client Section, Contact Page and many more Page Templates, Social Link Section, Life time theme support and much more.', 'aripop' ));
		echo '</h4>';
		
        
		echo ' </div></div>';
		
       
            
        
		
		echo '<div class="grid grid-pad" style="border-bottom: 1px solid #ccc; padding-bottom: 50px; margin-bottom: 30px;"><div class="col-1-1"><a href="http://arinio.com/aripop-responsive-multipurpose-wordpress-theme/" target="_blank"><button class="pro">'; 
		printf( __( 'Upgrade to Aripop PRO', 'aripop' ));
		echo '</button></a></div></div>';
		
    }
?>