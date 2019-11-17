<?php 
/* 	AssociationX Theme's E-Commerce Part
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 2.5
*/

$associationx_shopurl = esc_url( home_url( '/' ) ).'shop';
$associationx_shopttl = ''; $associationx_shopttl = wp_kses_post(__('Our <b>Awesome</b> Products', 'associationx'));
if($associationx_shopttl) $associationx_shopttl = '<h2 class="boxtoptitle">'.$associationx_shopttl.'</h2>';

$associationx_shopscode = ''; $associationx_shopscode = wp_kses_post(associationx_get_option('wooshortcod', '[products limit="4"]')); 

if($associationx_shopscode):
?>
<div id="ecom-box-item" class="box100 ecom-box-part boxrel">
	<div class="box90 ecom-part" data-sr="enter bottom, move 50px, over 1s, wait 0.3s">
		<?php 
		echo associationx_linkandtarget($associationx_shopttl, $associationx_shopurl,'1', '', 'ecomtlinks');
     	if($associationx_shopscode): ?><div class="d5woospace"><?php   echo do_shortcode($associationx_shopscode); ?></div><?php endif; 
		?>
    </div>
</div>
<?php endif;