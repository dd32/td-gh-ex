 <?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
global $woocommerce, $woocommerce_loop, $pinnacle;
 if ( empty( $woocommerce_loop['columns'] ) ) $woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
 $woocommerce_loop['rand'] = $woocommerce_loop['columns'];

  if(kadence_display_sidebar()) {
            $columns = "shopcolumn".$woocommerce_loop['columns']." shopsidebarwidth"; 
      } else {
			$columns = "shopcolumn".$woocommerce_loop['columns']." shopfullwidth"; 
      }
      if(is_cart()) {
      	$columns = "shopcolumn-cart".$woocommerce_loop['columns']." shopfullwidth";
      }
?>
<div id="product_wrapper<?php echo $woocommerce_loop['rand'];?>" class="products kad_product_wrapper rowtight <?php echo $columns; ?> kad_shop_default">