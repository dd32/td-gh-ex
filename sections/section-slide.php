<?php
/**
* section-slide.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- Section Slide --> 
<section class="container-fluid at-slide">
<div class="row">
<!-- Banner -->
<div class="col-md-3 at-col-slide offset-md-3 col-xs-12" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_banner_slide'));?>" data-aos-duration="800">
<a href="<?php echo esc_url(get_theme_mod('atomy_link_slide'))?>" class="at-banner-slide text-center" style="background-image:url('<?php echo esc_url(get_template_directory_uri()).'/images/bg_banner_club.png'?>')">
     <h2><?php echo esc_html(get_theme_mod( 'at_title_slide',__('Join the Atomy World','atomy')));?></h2>
     <h5><?php echo esc_html(get_theme_mod( 'at_subtitle_slide',__('Ask where you can find the nearest Atomy store!','atomy')));?></h5>
     <i class="fas fa-arrow-right"></i>
</a>
</div>
<!-- Carousel -->
<div class="col-md-4 offset-md-1 text-center col-xs-12" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_carousel_slide'));?>" data-aos-duration="800">
<div id="carouselslide" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

  <?php
			$atomy_slide_cat = esc_attr(get_theme_mod('atomy_category_slide'));
			$atomy_product_slide = esc_attr(get_theme_mod('at_post_type_slide','post'));
			$atomy_product_slide_cat = esc_attr(get_theme_mod('at_cat_product_slide'));
			$atomy_carousel_slide_count = 0;
			$atomy_args = array(
			'cat' => $atomy_slide_cat ,
			'product_cat' => $atomy_product_slide_cat, 
			'post_type' => $atomy_product_slide,
			'showposts' => $atomy_carousel_slide_count );
			$atomy_carousel_slide = new WP_Query($atomy_args);
			if( $atomy_carousel_slide->have_posts() ) :
				while ( $atomy_carousel_slide->have_posts() ) : $atomy_carousel_slide->the_post();
				$atomy_image_attributes =  wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ),'atomy_slide');?>
    <div class="carousel-item <?php if($atomy_carousel_slide_count == 0){ echo 'active'; } ?>">
    <?php $atomy_carousel_slide_count ++; ?>
    <a href="<?php the_permalink();?>" class="at-a-img-slide">
    <img src="<?php if ( $atomy_image_attributes[0] ) :
             echo esc_url($atomy_image_attributes[0]); else: echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; endif; ?>" alt="<?php the_title_attribute ();?>">
    </a>
    <div class="title-img-slide">
    <h2><?php the_title_attribute (); ?></h2>
    </div>
  </div>
    <?php endwhile;
        endif;
        wp_reset_postdata(); // End Query Slider Header ?>
  </div>
</div>
  <!-- Carousel Control -->
   <div class="at-carousel-control at-abot-team-carousel text-center">
      <a class="at-carousel-control-prev at-prev-team mr-2" href="#carouselslide" role="button" data-slide="prev">
          <i class="fas fa-angle-left"></i>
      </a>
      <a class="at-carousel-control-next at-next-team" href="#carouselslide" role="button" data-slide="next">
          <i class="fas fa-angle-right"></i>
      </a>
    </div>
</div>
</div>
</section>





 

