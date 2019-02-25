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
 * @version 3.4.0
 */


defined( 'ABSPATH' ) || exit;

get_header();?>

<!-- Slider -->
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="9000">
  <div class="carousel-inner atom-slider-height">
	<?php
	        $atom_header_slider_cat = esc_html( get_theme_mod('atom_category_header_slider'));
					$atom_carousel_slider_count = 0;
					$args = array(
					'cat' => $atom_header_slider_cat ,
					//'post_type' => 'product',
					'showposts' => $atom_carousel_slider_count );
					$atom_carousel_slider = new WP_Query($args);
					if( $atom_carousel_slider->have_posts() ) :
						while ( $atom_carousel_slider->have_posts() ) : $atom_carousel_slider->the_post();
						$atom_image_attributes =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'atom_big');?>
		<div class="carousel-item <?php if($atom_carousel_slider_count == 0){ echo 'active'; } ?>">
		<?php $atom_carousel_slider_count ++; ?>
		<!-- Image -->
			<img class="d-block w-100" src="<?php if ( $atom_image_attributes[0] ) :
                        echo esc_url($atom_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/atom-default.jpg'; endif; ?>" alt="<?php the_title();?>">
			<div class="carousel-caption d-none d-md-block text-right">
			<a href="<?php the_permalink();?>">
			<!-- Text -->
		<h2><?php the_title(); ?></h2>
			</a>
			
		
  </div>
    </div>
		<?php endwhile;
             endif;
      wp_reset_query(); // End Query Slider Carousel ?>
  </div>
  <a class="carousel-control-prev at-slider-header" href="#carouselExampleIndicators" role="button" data-slide="prev">
	<i class="fas fa-angle-left"></i>
  </a>
  <a class="carousel-control-next at-slider-header" href="#carouselExampleIndicators" role="button" data-slide="next">
	<i class="fas fa-angle-right"></i>
  </a>
</div>
</div>
<!-- Block icons header -->
		<div class="container mt-5 mb-5">
				<div class="row atom-header-ecommerce mr-0 ml-0">
				<div class="col-md-4 atom-col-1">
					<div class="atom-icon-header">
				    <i class="fas fa-truck"></i>
          </div>
        <div class="atom-text-header">
					 <h4><?php esc_html_e('WORLDWIDE DELIVERY','atom');?></h4>
					 <p><?php esc_html_e('Shipments in over 200 countries','atom');?></p>
        </div>
				</div>
				<div class="col-md-4 atom-col-2">
					<div class="atom-icon-header">
					<i class="far fa-credit-card"></i>
        </div>
          <div class="atom-text-header">
					 <h4><?php esc_html_e('SECURE PAYMENT','atom');?></h4>
					 <p><?php esc_html_e('Secure payment methods','atom');?></p>
         </div>
				</div>
				<div class="col-md-4 atom-col-3">
					<div class="atom-icon-header">
					<i class="fas fa-phone-volume"></i>
        </div>
        <div class="atom-text-header-s">
					 <h4><?php esc_html_e('SUPPORTO 24/7','atom');?></h4>
					 <p><?php esc_html_e('Online 24 ore al giorno','atom');?></p>
        </div>
				</div>
   </div>
</div>
<!-- Section Category -->
<section class="container at-content-woocommerce-page">
<h1 class="pb-3"><?php esc_html_e('Categorie','atom');?></h1>
  <div class="row ml-4 mr-0">
  <div class="col-lg-12 col-md-12 col-sx-12 col-xs-12 pl-0">

		<?php
		if ( woocommerce_product_loop() ) {

			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked woocommerce_output_all_notices - 10
			 * @hooked woocommerce_result_count - 20
			 * @hooked woocommerce_catalog_ordering - 30
			 */
			 ?>
			
			<?php
			woocommerce_product_loop_start();

			if ( wc_get_loop_prop( 'total' ) ) {
				while ( have_posts() ) {
					the_post();

					/**
					 * Hook: woocommerce_shop_loop.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action( 'woocommerce_shop_loop' );

					wc_get_template_part( 'content', 'product' );
				}
			}

			woocommerce_product_loop_end();

			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action( 'woocommerce_after_shop_loop' );
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}

		?>
</div>
</div>
</section>

<!-- Section Featured Product Carousel -->
<section class="container">
<div class="container">
<div class="row featured at-section-featured-product pt-5">
	    <!-- Sidebar Featured -->
			<div class="col-lg-3 col-md-12 col-xs-12 pl-0 at-sidebar-featured-product">
					<h2><?php esc_html_e('Featured Product','atom');?></h2>
					<!-- Carousel Control -->
					<div class="at-carousel-control">
						<a class="at-carousel-control-prev mr-2" href="#featuredCarousel" role="button" data-slide="prev">
						  <i class="fas fa-angle-left"></i>
            </a>
            <a class="at-carousel-control-next" href="#featuredCarousel" role="button" data-slide="next">
              <i class="fas fa-angle-right"></i>
	          </a>
	        </div>
						<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>
			<!-- Carousel -->
          <div class="col-lg-9 col-md-12 col-xs-12 at-carousel-oadding">
					<div id="featuredCarousel" class="carousel slide container-featured" data-ride="carousel">
               <!-- Indicators -->
							 <ol class="at-indicators carousel-indicators">
                  <li data-target="#featuredCarousel" data-slide-to="0" class="active"></li>
									<li data-target="#featuredCarousel" data-slide-to="1"></li>
                  <li data-target="#featuredCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel 1 -->
                <div class="carousel-inner">
              <div class="carousel-item active">
              <div class="row">   
							<?php
							  $atom_featured_carousel_1_count = 3;
							  $args = array(
								'post_type' => 'product',
								'showposts' => $atom_featured_carousel_1_count );
								$atom_featured_carousel_1 = new WP_Query($args);
								if( $atom_featured_carousel_1->have_posts() ) :
									while ( $atom_featured_carousel_1->have_posts() ) : $atom_featured_carousel_1->the_post(); ?>
									<div class="col-md-4">
                        <div class="item-box-featured">
                          <div class="item-box-featured-image">
														<!--Image-->
														<a href="<?php echo esc_url(get_permalink($product_id))?>">
														<figure> 
															<?php the_post_thumbnail()?>
												    </figure>
                          </div>
                          <div class="item-box-featured-body">
                            <!--Title-->
                            <div class="item-box-featured-heading">
																<h5><?php echo esc_html(get_the_title($product_id))?></h5>
																<?php
                                  global $atom_woocommerce;
                                  $currency = get_woocommerce_currency_symbol();
                                  $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                  $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                 ?>
                                <?php if($sale) : ?>
                                  <p class="at-product-price"><del><?php echo esc_html($currency); echo esc_html($price); ?></del><?php echo esc_html($currency); echo esc_html($sale); ?></p>    
                                 <?php elseif($price) : ?>
                                  <p class="at-product-price"><?php echo esc_html($currency); echo esc_html($price); ?></p>    
                                 <?php endif; ?>	
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
											<?php endwhile;
                        endif;
                         wp_reset_query(); // End Query featured Carousel 1 ?>
                    </div>
                    <!--.row-->
									</div>
				            <!-- Carousel 2 -->
              <div class="carousel-item">
              <div class="row">   
							<?php
							  $atom_featured_carousel_2_count = 3;
							  $args = array(
								'post_type' => 'product',
								'showposts' => $atom_featured_carousel_2_count );
								$atom_featured_carousel_2 = new WP_Query($args);
								if( $atom_featured_carousel_2->have_posts() ) :
									while ( $atom_featured_carousel_2->have_posts() ) : $atom_featured_carousel_2->the_post(); ?>
									<div class="col-md-4">
                        <div class="item-box-featured">
                          <div class="item-box-featured-image">
														<!--Image-->
														<a href="<?php echo esc_url(get_permalink($product_id))?>">
														<figure> 
															<?php the_post_thumbnail()?>
												    </figure>
                          </div>
                          <div class="item-box-featured-body">
                            <!--Title-->
														<div class="item-box-featured-heading">
																<h5><?php echo esc_html(get_the_title($product_id))?></h5>
																<?php
                                  global $atom_woocommerce;
                                  $currency = get_woocommerce_currency_symbol();
                                  $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                  $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                 ?>
                                <?php if($sale) : ?>
                                  <p class="at-product-price"><del><?php echo esc_html($currency); echo esc_html($price); ?></del><?php echo esc_html($currency); echo esc_html($sale); ?></p>    
                                 <?php elseif($price) : ?>
                                  <p class="at-product-price"><?php echo esc_html($currency); echo esc_html($price); ?></p>    
                                 <?php endif; ?>	
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
											<?php endwhile;
                        endif;
                         wp_reset_query(); // End Query featured Carousel 2 ?>
                    </div>
                    <!--.row-->
									</div>
								<!-- Carousel 3 -->
								<div class="carousel-item">
              <div class="row">   
							<?php
							  $atom_featured_carousel_3_count = 3;
							  $args = array(
								'post_type' => 'product',
								'showposts' => $atom_featured_carousel_3_count );
								$atom_featured_carousel_3 = new WP_Query($args);
								if( $atom_featured_carousel_3->have_posts() ) :
									while ( $atom_featured_carousel_3->have_posts() ) : $atom_featured_carousel_3->the_post(); ?>
									<div class="col-md-4">
                        <div class="item-box-featured">
                          <div class="item-box-featured-image">
														<!--Image-->
														<a href="<?php echo esc_url(get_permalink($product_id))?>">
														<figure> 
															<?php the_post_thumbnail()?>
												    </figure>
                          </div>
                          <div class="item-box-featured-body">
                            <!--Title-->
														<div class="item-box-featured-heading">
																<h5><?php echo esc_html(get_the_title($product_id))?></h5>
																<?php
                                  global $atom_woocommerce;
                                  $currency = get_woocommerce_currency_symbol();
                                  $price = get_post_meta( get_the_ID(), '_regular_price', true);
                                  $sale = get_post_meta( get_the_ID(), '_sale_price', true);
                                 ?>
                                <?php if($sale) : ?>
                                  <p class="at-product-price"><del><?php echo esc_html($currency); echo esc_html($price); ?></del><?php echo esc_html($currency); echo esc_html($sale); ?></p>    
                                 <?php elseif($price) : ?>
                                  <p class="at-product-price"><?php echo esc_html($currency); echo esc_html($price); ?></p>    
                                 <?php endif; ?>	
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
											<?php endwhile;
                        endif;
                         wp_reset_query(); // End Query featured Carousel 2 ?>
                    </div>
                    <!--.row-->
									</div>
                </div>
                <!--.carousel-inner-->
              </div>
              <!--.Carousel-->
            </div>
          </div>
       </div>
      </section>
	 <!--================Feature Big Add Area =================-->
   <section class="feature_big_add_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="card bg-dark text-white">
  <img class="card-img" src="<?php echo esc_url(get_template_directory_uri()).'/images/3.jpg';?>" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>
                    </div>
                    <div class="col-lg-6">
                    <div class="card bg-dark text-white">
  <img class="card-img" src="<?php echo esc_url(get_template_directory_uri()).'/images/3.jpg';?>" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>
                    </div>
                </div>
            </div>
        </section>






<?php get_footer(); ?>













