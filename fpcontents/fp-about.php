<?php 
/* 	AssociationX Theme's About Part
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/
$showaboutus = esc_html(associationx_get_option('showaboutus', '')); if(!$showaboutus) return;
$aboutus = '';
$aboutus_fromm_page = esc_html(associationx_get_option('aboutus_fromm_page', '0'));
$aboutus_page = esc_html(associationx_get_option('aboutus_page', '0'));

if($aboutus_fromm_page && $aboutus_page ):
	$my_query = new WP_Query('page_id='.$aboutus_page); while ($my_query->have_posts()) : $my_query->the_post(); $aboutus = get_the_content(); endwhile; wp_reset_query();
endif;

if ( !$aboutus ) return;
?>
<div id="about-us-box-item">
	<div class="box90 about-us-part" data-sr='enter top, move 50px, over 1s, wait 0.3s'>    
		<?php echo $aboutus;  ?>
     </div>
</div>