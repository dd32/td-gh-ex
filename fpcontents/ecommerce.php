<?php 
/* 	AssociationX Theme's E-Commerce Part
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 2.5
*/

$shopurl = esc_url( home_url( '/' ) ).'shop';
$shopttl = ''; $shopttl = wp_kses_post(__('Our <b>Awesome</b> Products', 'associationx'));
if($shopttl) $shopttl = '<h2 class="boxtoptitle">'.$shopttl.'</h2>';

$shopscode = ''; $shopscode = wp_kses_post(associationx_get_option('wooshortcod', '[products limit="4"]')); 

if($shopscode):
?>
<div id="ecom-box-item" class="box100 ecom-box-part boxrel">
	<div class="box90 ecom-part" data-sr="enter bottom, move 50px, over 1s, wait 0.3s">
		<?php 
		echo associationx_linkandtarget($shopttl, $shopurl,'1', '', 'ecomtlinks');
     	if($shopscode): ?><div class="d5woospace"><?php   echo do_shortcode($shopscode); ?></div><?php endif; 
		?>
    </div>
</div>
<?php endif;