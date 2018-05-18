<?php

/**
 * Theme Post/Page Top Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
if(!is_paged()){
 if(!is_404()) {
 				
			$admela_postpgtpscd_matchexp = "/\/|\[|\]/";  
			
			if(admela_get_option('admela_postpgtpad_act') != false): ?>

			<div class="admela_themead admela_entrycontentad admela_ectpad">
			<?php			
			if(preg_match($admela_postpgtpscd_matchexp , admela_get_option('admela_postpgtpad_code'))) {
			  echo do_shortcode(''.admela_get_option('admela_postpgtpad_code').'');
			}
			else {
			  echo wp_kses_stripslashes(admela_get_option('admela_postpgtpad_code'));
			}
			?>
			</div>
				
		<?php 
		endif;		
		}
		}