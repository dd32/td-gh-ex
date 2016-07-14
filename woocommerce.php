<?php get_header(); ?>   
<section class="inner-page-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-page-title">
          <h1 class="title">Shop</h1>
        </div><!--header-->
        <div class="breadcrumbs">
<?php woocommerce_breadcrumb(); ?>
          
        </div><!--breadcrumbs-->
      </div><!--col-->
    </div><!--row-->
  </div><!--container-->
</section><!--inner-page-bg-->
<section id="content">
  <section class="container">
  
    <?php /*?><div class="page-header">
    <?php if(!is_product()){?>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
          <ul class="show_style">
            <li><a href="#" class="grid" id="grid"><i class="fa fa-th-large"></i></a></li>
            <li><a href="#" class="list" id="list"><i class="fa fa-bars"></i></i></a></li>
          </ul>
        </div><!--col-->
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
              <?php woocommerce_result_count();?>
              <?php woocommerce_catalog_ordering();?>
        </div><!--col-->
      </div><?php }?><!--row-->
    </div><!--page-header--><?php */?>
    
    <div class="row sidebar-products main">
  <?php if(get_theme_mod('sidebar_position')=='left') {if ( is_woocommerce() &&!is_single()) { get_sidebar();}}?>
  <?php if(is_single()){?>
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <?php }else{?>
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"><?php }?>
       <div class="products_row" id="primary">
	   <?php woocommerce_content(); ?>
       </div>
       </div><!--col-->
        <?php if(get_theme_mod('sidebar_position')=='right') {if ( is_woocommerce() &&!is_single()) { get_sidebar();}}?>
      <!--col-->
    </div><!--row-->
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>