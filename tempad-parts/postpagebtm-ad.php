<?php

/**
 * Theme Post/Page Bottom Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
if(!is_paged()){
 if(!is_404()) {
 			
			$admela_postpgbtmscd_matchexp = "/\/|\[|\]/";  
						
			if(admela_get_option('admela_postpgbtmad_act') != false): ?>

			<div class="admela_themead admela_entrycontentad admela_ecbtmad">
			
			<?php
     	
			if(preg_match($admela_postpgbtmscd_matchexp , admela_get_option('admela_postpgbtmad_code'))) {
			  echo do_shortcode(''.admela_get_option('admela_postpgbtmad_code').'');
			}
			else {
			  echo wp_kses_stripslashes(admela_get_option('admela_postpgbtmad_code'));
			}		
			
			?>
			</div>
			<?php 
			endif;		
			}
			}	