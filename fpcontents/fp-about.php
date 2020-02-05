<?php 
/* 	AssociationX Theme's About Part
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$associationx_showaboutus = esc_attr(associationx_get_option('showaboutus', '')); if(!$associationx_showaboutus) return;
$associationx_aboutus = '';
$associationx_aboutus_fromm_page = esc_attr(associationx_get_option('aboutus_fromm_page', '0'));
$associationx_aboutus_page = esc_attr(associationx_get_option('aboutus_page', '0'));

if($associationx_aboutus_fromm_page && $associationx_aboutus_page ):
	$associationx_my_query = new WP_Query('page_id='.$associationx_aboutus_page); while ($associationx_my_query->have_posts()) : $associationx_my_query->the_post(); $associationx_aboutus = get_the_content(); endwhile; wp_reset_query();
endif;

if ( !$associationx_aboutus ) return;
?>
<div id="about-us-box-item">
	<div class="box90 about-us-part" data-sr='enter top, move 50px, over 1s, wait 0.3s'>    
		<?php echo wp_kses_post($associationx_aboutus);  ?>
     </div>
</div>