<?php get_header(); ?>
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title"><?php the_title(); ?></h1>
        </div><!--header-->
        <div class="breadcrumbs">
          <?php woocommerce_breadcrumb(); ?>
        </div><!--breadcrumbs-->
      </div><!--col-->
    </div><!--row-->
  </div><!--container-->
</section><!--inner-page-bg-->
<section id="content">
  <section class="container right-sidebar">
    <!--page-header-->
    <div class="row sidebar-products main">
   <?php /* Single Product Page Layout */ if(is_single()){ ?>
    
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left">
        <div class="products_row row" id="primary">
         <?php if (have_posts()): woocommerce_content(); endif; ?> 
        </div><!--main-->
      </div><!--col-->
      <?php } else {
		  /*Product Page Layout */
		  global $abaya_option;
		   if(isset($abaya_option['shop_sidebar']) && $abaya_option['shop_sidebar']==1)
		   {
			   get_template_part('includes/productpageoption/product_page', 'with_rightsidebar');
			   
		   }else if(isset($abaya_option['shop_sidebar']) && $abaya_option['shop_sidebar']==2)
		   {
			   get_template_part('includes/productpageoption/product_page', 'with_leftsidebar');
			   
		   }else 
		   {
			  get_template_part('includes/productpageoption/product_page', 'without_sidebar');  
		   }
		  
		   } ?>
    </div><!--row-->
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>