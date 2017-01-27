<?php
/*
Template Name: Home Page
*/
get_header();
 ?>
<section id="main-slider">
<?php get_template_part('includes/home/flexslider'); ?>
</section>
<section id="content">
  <section class="container">
    <div class="home-products">     
        <!--featured-->
        <div class="featured">
        <aside id="woocommerce_products-2" class="widget voffset3">
        <h6 class="page_title"><?php _e('New Arrival','abaya');?></h6>
        <ul class="product_list_widget">
        <?php
$params = array('posts_per_page' => 8, 'post_type' => 'product','orderby' => 'DESC');
$wc_query = new WP_Query($params);
?>
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
                $wc_query->the_post(); ?>
       <li>
	<a href="<?php echo get_permalink( $wc_query->post->ID ) ?>" title="<?php echo esc_attr($wc_query->post->post_title ? $wc_query->post->post_title : $wc_query->post->ID); ?>">
    <?php if (has_post_thumbnail( $wc_query->post->ID )) echo get_the_post_thumbnail($wc_query->post->ID);?>	
<span class="product-title"><?php the_title(); ?></span>
	</a>
    <div class="front_price"><?php echo $product->get_price_html(); ?></div>
        <?php woocommerce_template_loop_add_to_cart( $wc_query->post); ?>
        </li>        
        <?php endwhile; endif;?>
   </ul>
      </aside></div>
    </div><!--home_product-->
  </section><!--container-->
</section><!--content-->
<?php get_footer(); ?>