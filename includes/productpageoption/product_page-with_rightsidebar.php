<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 pull-left">
        <div class="products_row row" id="primary">
         <?php if (have_posts()): woocommerce_content(); endif; ?> 
        </div><!--main-->
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-right" >
        <div class="sidebar" id="secondary">
         <?php if (is_active_sidebar('product_page_sidebar')){ dynamic_sidebar('product_page_sidebar'); } ?>
        </div><!--sidebar-->
      </div>