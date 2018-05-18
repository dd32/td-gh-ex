<?php

/**
 * Theme Layout1 After the Post Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
if(!is_paged()){
 if(!is_404()) { 			
          
			$admela_lyt1latstafpstscd_matchexp = "/\/|\[|\]/";  
			
			if(admela_get_option('admela_lyt1latstafpstad_act') != false): ?>

			<div class="admela_themead admela_entrycontentad">
			
			<?php     		
			if(preg_match($admela_lyt1latstafpstscd_matchexp , admela_get_option('admela_lyt1latstafpstad_code'))) {
			  echo do_shortcode(''.admela_get_option('admela_lyt1latstafpstad_code').'');
			}
			else {
			  echo wp_kses_stripslashes(admela_get_option('admela_lyt1latstafpstad_code'));
			}			
			?>
	        </div>
			<?php 
			endif;		
			}
			}	