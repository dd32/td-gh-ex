<?php

/**
 * Theme Layout1 After the Category Section1 Post Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
if(!is_paged()){
 if(!is_404()) {
 							
			$admela_lyt1ct1sn1afpstscd_matchexp = "/\/|\[|\]/";  
			
			if(admela_get_option('admela_lyt1ct1sn1afpstad_act') != false): ?>

			<div class="admela_themead">
			
			<?php     	
			
			if(preg_match($admela_lyt1ct1sn1afpstscd_matchexp , admela_get_option('admela_lyt1ct1sn1afpstad_code'))) {
			  echo do_shortcode(''.admela_get_option('admela_lyt1ct1sn1afpstad_code').'');
			}
			else {
			  echo wp_kses_stripslashes(admela_get_option('admela_lyt1ct1sn1afpstad_code'));
			}
			
             ?>
	    </div>
		<?php 
		endif;		
		}
		}
		?>