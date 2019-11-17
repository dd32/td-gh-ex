<?php

/* 	AssociationX Theme's Featured Box Part of Front Page
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.9
*/
$frfbox = esc_attr(associationx_get_option('frfbox', ''));
if(!$frfbox) return;
?>
<!--- ============  FEATURED BOXES  =========== ------------>
<div id="featured-box-item">
	<?php get_template_part( 'fpcontents/featured' ); ?>
	<div class="lsep"></div> 
</div>
<!--- ============  END OF FEATURED BOXES  =========== ------------>
