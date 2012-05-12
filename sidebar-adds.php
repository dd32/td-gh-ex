<div class="six adds-1">
<?php $options = get_option('batik_theme_options');
			 if (!empty($options['adds_area_one'])) {
					echo $options['adds_area_one'];

			   			
			      } else { 
			        echo '<img src="'.get_stylesheet_directory_uri().'/images/adds-1.jpg" alt="" />';
				    
				  }
			?>
</div>
<div class="six adds-1">
<?php $options = get_option('batik_theme_options');
			
			    if (!empty($options['adds_area_two'])) {
					echo $options['adds_area_two'];
		    
			      } else {             
                    echo '<img src="'.get_stylesheet_directory_uri().'/images/adds-1.jpg" alt="" />'; 
 				  }
			?> 
</div>
<div class="six adds-1">
<?php $options = get_option('batik_theme_options');
			
			    if (!empty($options['adds_area_three'])) {
					echo $options['adds_area_three'];
		    
			      } else {             
                    echo '<img src="'.get_stylesheet_directory_uri().'/images/adds-1.jpg" alt="" />'; 
 				  }
			?> 
</div>
<div class="six adds-1">
<?php $options = get_option('batik_theme_options');
			
			    if (!empty($options['adds_area_four'])) {
					echo $options['adds_area_four'];
		    
			      } else {             
                    echo '<img src="'.get_stylesheet_directory_uri().'/images/adds-1.jpg" alt="" />'; 
 				  }
			?> 
</div>