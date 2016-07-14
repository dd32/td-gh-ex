 <?php 
  ob_start();
add_filter( 'woocommerce_show_page_title', 'ridolfi_shop_cat_title_hide' );
 function ridolfi_shop_cat_title_hide()
 {
	 return false;
 }
 add_filter( 'woocommerce_before_shop_loop', 'ridolfi_sorting_order');
 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
 add_filter( 'woocommerce_before_shop_loop', 'ridolfi_result_count');
  function ridolfi_sorting_order()
 {
	 add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10 );
 }
 function ridolfi_result_count()
 {
	 add_action( 'woocommerce_before_shop_loop', 'ridolfi_result_count', 10 );
 }
 
 ?>
