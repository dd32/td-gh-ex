<?php 
/* 	AssociationX Theme's Specific Page Part
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 2.5
*/

$pagev = esc_html(associationx_get_option('fp-pagecheck', ''));
$fppage = esc_html(associationx_get_option('fp-page', ''));
if(!$pagev || !$fppage ) return;
?>
<!--- ============  SPECIFIC PAGE  =========== ------------>
<div class="clear"></div>
<div id="fpagec-box-item" class="fpagecbox boxrel box90">
	<?php $my_query = new WP_Query('page_id='.$fppage); while ($my_query->have_posts()) : $my_query->the_post(); the_content(); endwhile; wp_reset_query(); ?>
</div>
<div class="clear"></div>
<!--- ============  END OF SPECIFIC PAGE  =========== ------------>