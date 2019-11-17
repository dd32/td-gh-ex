<?php
/* 	AssociationX Theme's General Page to display WooCommerce Pages
	Copyright: 2012-2019, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since AssociationX 1.0
*/

get_header(); 
$associationx_pagelayout = 'leftcontent';
if(!is_active_sidebar('sidebar-woo')) $associationx_pagelayout = 'fullcontent';
?>
<div id="pagename" class="d5_woo_page"></div>
<div id="container" class="sinpagepostcon woopagecon box90 <?php echo $associationx_pagelayout; ?>">	
	<div id="containerin">
   		<?php do_action('associationx_before_content'); ?>	
    	<div id="content"><?php do_action('associationx_starting_content'); woocommerce_content(); do_action('associationx_ending_content'); ?></div>
		<?php 
		do_action('associationx_after_content');
		if ( $associationx_pagelayout != 'fullcontent') get_sidebar( 'ecommerce' ); ?>
	</div>
	<?php  ?>
</div>
<?php get_footer();