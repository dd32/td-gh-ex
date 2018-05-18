<?php

/**
 * Theme After Header Section Ad for our theme.
 *
 * @package WordPress
 * @subpackage Admela
 * @since Admela 1.0
 */
	if(!is_paged()){
	if(!is_404())  { 
			
			$admela_afhdscd_matchexp = "/\/|\[|\]/";  
			
			if(admela_get_option('admela_afhdad_act') != false): ?>

			<div class="admela_afterheaderad admela_themead admela_headerinner">
			
			<?php     	
			if(preg_match($admela_afhdscd_matchexp , admela_get_option('admela_afhdad_code'))) {
			  echo do_shortcode(''.admela_get_option('admela_afhdad_code').'');
			}
			else {
			  echo wp_kses_stripslashes(admela_get_option('admela_afhdad_code'));
			}
			?>
			
			</div>	
			<?php 
			endif;
			}
			}
			?>