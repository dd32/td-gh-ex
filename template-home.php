<?php 
/*
Template Name: Home Page
*/
get_header()?>
<div class="slider">
  <ul class="anim-slider">
    <?php  $sliderpost=get_theme_mod('service_cat_slider'); ?>
    <?php
        $args = array( 'post_type' => 'product', 'posts_per_page' => 3, 'product_cat' =>$sliderpost, 'orderby' => 'rand' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
    <li class="anim-slide">
      <img src="<?php the_post_thumbnail_url();?>" class="animated" id="slider_img" alt=""/>
      <h1 id="slider_h1"> <?php the_title(); ?></h1>
      <p id="slider_p">Checkout our most recent collection and pick the one that best suits you</p>
      <a href="<?php echo get_permalink( $loop->post->ID ) ?>" class="click" id="slider_btn">Click Here</a>
    </li>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <nav class="anim-arrows"> 
      <span class="anim-arrows-prev"> <i class="fa fa-angle-left fa-3x"></i> </span> 
      <span class="anim-arrows-next"> <i class="fa fa-angle-right fa-3x"></i> </span>
    </nav>  <!-- Dynamically created dots -->
  </ul>
</div><!--slider-->
<section id="content">
  <section class="container">
    <div class="home-products">
        <div class="featured row">
          <div class="col-lg-12">
            <h6 class="page_title"><?php _e('FEATURED PRODUCT','abaya') ?></h6>
            <ul class="products">
            <?php echo do_shortcode('[featured_products per_page="8" columns="4" orderby="date" order="desc"]'); ?>
            </ul><!--products-row-->
          </div><!--col-->
        </div><!--featured-->
        <div class="featured row">
          <div class="col-lg-12">
            <h6 class="page_title"><?php _e('RECENT PRODUCT','abaya') ?></h6>
            <ul class="products">
            <?php echo do_shortcode('[recent_products per_page="12" columns="4"]'); ?>
            </ul><!--products-row-->
          </div><!--col-->
        </div><!--featured-->
    </div><!--home_product-->
  </section><!--container-->
</section><!--content-->
 <?php get_footer();?>