<?php 
/* 	AssociationX Theme's E-Commerce Part
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 2.5
*/

$associationx_shopurl = esc_url( home_url( '/' ) ).'shop';
$associationx_shopttl = ''; $associationx_shopttl = wp_kses_post(__('Our <b>Awesome</b> Products', 'associationx'));
if($associationx_shopttl) $associationx_shopttl = '<h2 class="boxtoptitle">'.$associationx_shopttl.'</h2>';

$associationx_shopcontent = ''; $associationx_shopcontent = absint(associationx_get_option('woo_page', '')); 

if($associationx_shopcontent):
?>
<div id="ecom-box-item" class="box100 ecom-box-part boxrel">
	<div class="box90 ecom-part" data-sr="enter bottom, move 50px, over 1s, wait 0.3s">
		<?php 
		echo associationx_linkandtarget($associationx_shopttl, $associationx_shopurl,'1', '', 'ecomtlinks');
     	if($associationx_shopcontent): ?>
     		<div class="d5woospace">
     			<?php $associationx_query = new WP_Query('page_id='.$associationx_shopcontent); while ($associationx_query->have_posts()) : $associationx_query->the_post(); the_content(); endwhile; wp_reset_postdata(); ?>
     		</div>
     	<?php endif; ?>
    </div>
</div>
<?php endif;