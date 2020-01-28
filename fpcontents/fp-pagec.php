<?php 
/* 	AssociationX Theme's Specific Page Part
	Copyright: 2012-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 2.5
*/

$pagev = esc_attr(associationx_get_option('fp-pagecheck', ''));
$fppage = esc_attr(associationx_get_option('fp-page', ''));
if(!$pagev || !$fppage ) return;
?>
<!--- ============  SPECIFIC PAGE  =========== ------------>
<div class="clear"></div>
<div id="fpagec-box-item" class="fpagecbox boxrel box90">
	<?php $associationx_query = new WP_Query('page_id='.$fppage); while ($associationx_query->have_posts()) : $associationx_query->the_post(); the_content(); endwhile; wp_reset_query(); ?>
</div>
<div class="clear"></div>
<!--- ============  END OF SPECIFIC PAGE  =========== ------------>