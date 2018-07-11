<?php
/*
* Template Name:Home Page
*/
get_header();
$multishop_options = get_option( 'multishop_theme_options' ); ?>
<div class="clearfix"></div>
  <!-- HOME BANNER -->
 <div class="multishop-home-banner">
    <?php if(get_header_image()){ ?>
    <div class="custom-header-img"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" alt="" class="img-responsive"> </a> </div>
    <?php } ?>
    <div class='site-title-text'>
	<h1 class="site-title"><?php   bloginfo( 'name' ); ?></h1>
	<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
  </div>
  </div>  
  <!-- END HOME BANNER -->
<section>
  <div class="container multishop-container">
    <div class="row multishop-home-section">
       <?php $multishop_slider_count = 1;
            for ($multishop_loop = 1; $multishop_loop <= 3; $multishop_loop++):
                $sliderimage_image = get_theme_mod ( 'multishop_homepage_sliderimage'.$multishop_loop.'_image');

                $sliderimage_title = get_theme_mod ( 'multishop_homepage_sliderimage'.$multishop_loop.'_title',$multishop_options['text-section-' . $multishop_loop]);
                $sliderimage_discount = get_theme_mod ( 'multishop_homepage_sliderimage'.$multishop_loop.'_content',$multishop_options['discount-section-' . $multishop_loop]);

               if($sliderimage_image!=''){                
                $sliderimage_image_url = wp_get_attachment_image_src($sliderimage_image,'multishop-full-width');
                $column_class = 4;  ?>
                    <div class="col-md-<?php echo esc_html($column_class); ?> col-sm-12">
                      <div class="home-section1">
                        <div class="ImageWrapper chrome-fix">
                          <?php if(isset($sliderimage_image_url[0])) { ?>
                          <img src="<?php echo esc_url($sliderimage_image_url[0]); ?>" alt="" class="img-responsive" />
                          <?php } ?>
                          <div class="ImageOverlayC"></div>
                          <div class="Buttons StyleH">
                            <div class="WhiteRounded">
                              <h2>
                                <?php echo esc_html($sliderimage_title); ?>
                              </h2>
                              <p>
                                <?php echo esc_html($sliderimage_discount);?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php }
         endfor; ?>      
    </div>
    <?php    
    if (is_plugin_active('woocommerce/woocommerce.php')) {    ?>
    <div class="woocommerce-product">
      <div class="product-header">
        <h2 class="widget-title"> <span class="product-title"><?php esc_html_e('TOP RATED PRODUCTS','multishop') ?></span> </h2>
      </div>
      <div class="col-md-12 next-prev-button"> <span id="prev2" class="prev black-box prev3"><i class="fa fa-angle-right"></i></span> <span id="next2" class="next black-box next3"><i class="fa fa-angle-left"></i></span> </div>
      <div class="clearfix"></div>
      <div class="inner-row" id="top-product">
        <?php $args = array(
							'post_type' => 'product',
							'stock' => 1,
							'posts_per_page' => 9,
							'orderby' =>'date',
							'order' => 'DESC' );
					  $loop = new WP_Query( $args );
					  while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
        <div class="item">
          <?php $multishop_feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );  ?>
          <div class="main-border">
            <?php if($multishop_feat_image!="") { ?>
            <img src="<?php echo esc_url($multishop_feat_image); ?>" alt="<?php esc_html_e('Banner','multishop'); ?>" class="img-responsive"  />
            <?php } ?>
            <div class="product-details"> <span><?php echo $product->get_price_html(); ?></span>
              <h5>
                <?php the_title(); ?>
              </h5>
              <div class="product-button"> <a id="id-<?php the_id(); ?>" href="<?php echo esc_url(get_permalink()); ?>" class="details-button"><?php esc_html_e('DETAILS','multishop') ?></a> <a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>" class="addtocart-button"><?php esc_html_e('ADD TO CART','multishop'); ?></a> </div>
            </div>
          </div>
        </div>
        <?php endwhile;
						wp_reset_query(); // Remember to reset
						remove_filter( 'posts_clauses', array( $woocommerce->query, 'order_by_rating_post_clauses' ) ); ?>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
<?php get_footer(); ?>