<?php

/* 	AssociationX Theme's Top Menu Bar
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$showtmbar = esc_html(associationx_get_option('showtmbar','1'));
$tmnucls=''; if(!$showtmbar) $tmnucls='notopmenu'; 
?>
<div class="box100 top-menu-con-container <?php echo $tmnucls; ?>"><?php 
	if($showtmbar): ?>
		<div class="box90">
			<div class="top-menu-con-items">
				<nav class="top-menu-con"><?php if ( has_nav_menu( 'top-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'top-menu', 'depth' => 1 )); endif; ?></nav><?php 
				$connumber = wp_kses_post(associationx_get_option ('contactnumber', ''));
				$extnumber = wp_kses_post(associationx_get_option('extra-num', '')); 
				associationx_social_links('1'); 
				if ($connumber):echo '<div class="flexcenter connumber">'.$connumber. '</div>';  endif; 
				if ($extnumber): echo '<div class="flexcenter extranumber fa-envelope">'.$extnumber.'</div>'; endif;
				if (esc_html(associationx_get_option ('sbox-check', '1'))) get_search_form();
				?>  	
			</div>
		</div><?php 
	endif; ?>   
</div>		