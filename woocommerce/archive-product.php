<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>
<div class="clearfix"></div>
<div class="col-md-12 site-title">
  <div class="multishop-container multishop-breadcrumb">    
    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
    <ol class="site-breadcumb">
      <?php if (function_exists('multishop_custom_breadcrumbs')) multishop_custom_breadcrumbs(); ?>
    </ol>
  </div> 
</div>

<!--section start-->
<section class="shoap-section">
  <div class="multishop-container">
    <div class="col-md-9">
       <div class="col-md-12 top-pagination no-padding-lr">
        <div class="col-md-5 pagination-icon no-padding-lr"> 
        <i class="fa fa-th-large"></i> 
          <?php   global $wp_query;?>
          <p class="woocommerce-result-count">
            <?php $paged = max( 1, $wp_query->get( 'paged' ) );
				$per_page = $wp_query->get( 'posts_per_page' );
				$total = $wp_query->found_posts;
				$first = ( $per_page * $paged ) - $per_page + 1;
				$last = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
				if ( 1 == $total ) {
				esc_html_e( 'Showing the single result', 'multishop' );
				} elseif ( $total <= $per_page || -1 == $per_page ) {
				printf(/* translators: 1 is total */ esc_html__( 'Showing all %d results', 'multishop' ), esc_html($total) );
				} else {
				printf(/* translators: 1 is first, 2 is last, 3 is total. */ _x( 'Showing %1$d&ndash;%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'multishop' ), esc_html($first), esc_html($last), esc_html($total) );
				} ?>
          </p>
          
        </div>
        <div class="col-md-7 no-padding-lr">
          <div class="pagination-sorting">
         	  <div class="sorting-all">
			  <label class="sele-label"><?php esc_html_e('Show All','multishop'); ?></label>
              <form action="" method="POST" name="results" class="woocommerce-ordering">
                <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="form-control select-sort" onchange="this.form.submit()">
                  <?php
					$numberOfProductsPerPage='';
								//Get products on page reload
								if(!empty($_POST['woocommerce-sort-by-columns'])){
								if  (isset($_POST['woocommerce-sort-by-columns']) && (!empty($_COOKIE['shop_pageResults']))) {
									if($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns'])
										$numberOfProductsPerPage = sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns']));
										  } else {
											  if(!empty($_COOKIE['shop_pageResults']))
												$numberOfProductsPerPage = sanitize_text_field(wp_unslash($_COOKIE['shop_pageResults']));
												else
												$numberOfProductsPerPage=sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns']));
										  }
									  }else  $numberOfProductsPerPage=4;
									$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
												'5'=> '5','9'=> '9','12'=> '12',
												'15'=> '15','20'=> '20','-1'=> esc_html__('All', 'multishop'),
											));
			foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
				echo '<option value="' . esc_attr($sort_id) . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . esc_html($sort_name) . '</option>'; ?>
                </select>
              </form>
              
            </div>  

          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row shoap-row">
        <?php 
        /**
			 * Hook: woocommerce_before_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
		do_action( 'woocommerce_before_main_content' );
        if ( have_posts() ) :
	        /**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked wc_print_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			do_action( 'woocommerce_before_shop_loop' );
        	woocommerce_product_loop_start();

        	woocommerce_product_subcategories();
        	while ( have_posts() ) : the_post(); ?>
        <div class="col-md-4 col-sm-4 resp-grid woocommerce-product">
          <div class="item">
            <?php $multishop_feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );  ?>
            <div class="main-border">
              <?php if($multishop_feat_image!="") { ?>
              <img src="<?php echo esc_url($multishop_feat_image); ?>" alt="<?php esc_attr_e('Banner','multishop'); ?>" class="img-responsive"  />
              <?php } ?>
              <div class="product-details"> 
              <div class="product-text">
			  <?php if (!isset($product)) global $product; ?>
              	<span><?php if( $product->is_on_sale() ) : echo $product->get_price_html(); endif; ?></span>
                <h5><?php the_title(); ?></h5>
               </div> 
                <div class="product-button"> <a id="id-<?php echo esc_attr(get_the_id()); ?>" href="<?php echo esc_url(get_permalink()); ?>" class="details-button"><?php esc_html_e('DETAILS','multishop'); ?></a> <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="addtocart-button"><?php esc_html_e('ADD TO CART','multishop'); ?></a> </div>
              </div>
            </div>
          </div>
        </div>
        <?php endwhile; // end of the loop.
        	woocommerce_product_loop_end();
        	/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
        	elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :
        	wc_get_template( 'loop/no-products-found.php' );
        	endif;
        	/**
			 * Hook: woocommerce_after_main_content.
			 *
			 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
			 */
			do_action( 'woocommerce_after_main_content' ); ?>
      </div>
      <div class="col-md-12 top-pagination no-padding-lr">
        <div class="col-md-4 pagination-icon no-padding-lr"> 
        			<i class="fa fa-th-large"></i>
          <?php   global $wp_query;
					if ( ! woocommerce_products_will_display() )
					return; ?>
          <p class="woocommerce-result-count">
            <?php $paged = max( 1, $wp_query->get( 'paged' ) );
				$per_page = $wp_query->get( 'posts_per_page' );
				$total = $wp_query->found_posts;
				$first = ( $per_page * $paged ) - $per_page + 1;
				$last = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );
				if ( 1 == $total ) {
				esc_html_e( 'Showing the single result', 'multishop' );
				} elseif ( $total <= $per_page || -1 == $per_page ) {
				printf(/* translators: 1 is total */ esc_html__( 'Showing all %d results', 'multishop' ), esc_html($total) );
				} else {
				printf( /* translators: 1 is first, 2 is last, 3 is total. */_x( 'Showing %1$d&ndash;%2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'multishop' ), esc_html($first), esc_html($last), esc_html($total) );
				} ?>
          </p>
        </div>
			 <div class="col-md-8 no-padding-lr">
          <div class="pagination-sorting">
            <div class="sorting-all"> 

              <label class="sele-label"><?php esc_html_e('Show All','multishop'); ?></label>
              <form action="" method="POST" name="results" class="woocommerce-ordering">
                <select name="woocommerce-sort-by-columns" id="woocommerce-sort-by-columns" class="form-control select-sort" onchange="this.form.submit()">
                  <?php //Get products on page reload
			  		if(!empty($_POST['woocommerce-sort-by-columns'])):
						if  (isset($_POST['woocommerce-sort-by-columns']) && (!empty($_COOKIE['shop_pageResults']))): 
							if($_COOKIE['shop_pageResults'] <> $_POST['woocommerce-sort-by-columns']):
								$numberOfProductsPerPage = sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns']));
							 endif;
						else :						
							if(!empty($_COOKIE['shop_pageResults'])):
								$numberOfProductsPerPage = sanitize_text_field(wp_unslash($_COOKIE['shop_pageResults']));
							else:
								$numberOfProductsPerPage=sanitize_text_field(wp_unslash($_POST['woocommerce-sort-by-columns']));
							endif;
						endif;
					else :
						$numberOfProductsPerPage=4;  
					endif;
					$shopCatalog_orderby = apply_filters('woocommerce_sortby_page', array(
						'5'=> '5','9'=> '9','12'=> '12',
						'15'=> '15','20'=> '20','-1'=> esc_html__('All', 'multishop'),
					));
					foreach ( $shopCatalog_orderby as $sort_id => $sort_name )
					echo '<option value="' . esc_attr($sort_id) . '" ' . selected( $numberOfProductsPerPage, $sort_id, true ) . ' >' . esc_html($sort_name) . '</option>'; ?>
                </select>
              </form>
            </div>  
          </div>
        </div>  
      </div>
    </div>
    <!--section end-->
    <?php do_action( 'woocommerce_sidebar' ); ?>
  </div>
</section>
<div class="clearfix"></div>
<?php get_footer( 'shop' );