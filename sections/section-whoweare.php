<?php
/**
* section-whoweare.php
* @author    Denis Franchi
* @package   Atomy
*
*/
?>

<!-- Section Who we are -->
<section class="at-text-image-about <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
     <?php 
         $atomy_post_name_whoweare = esc_attr(get_theme_mod('at_post_whoweare'));
         $atomy_args_whoweare = array(
             'post_type'      => 'post',
             'order'          => 'ASC',
             'posts_per_page' => '-1',
             'post__in' => array($atomy_post_name_whoweare));
         $atomy_query_whoweare = new WP_Query( $atomy_args_whoweare);
         // The Loop
     if  ($atomy_query_whoweare->have_posts() ) {
     while  ($atomy_query_whoweare->have_posts() ) {
         $atomy_query_whoweare->the_post();  
       } 
      } 
    ?>
<div class="row">
<div class="pr-lg-5 mb-sm-5 mb-lg-0 at-text-image-about-img col-md-12 col-lg-6">
    <h2 data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_title_whoweare'));?>" data-aos-duration="700">
    <?php the_title_attribute(); ?>
    </h2>
    <?php the_content()?>
</div>
<div class="col-sm-8 offset-sm-5 mt-sm-5 pt-sm-5 col-md-6 offset-lg-2 col-lg-4 offset-md-4">
            <div class="at-three-img-about-text">
            <?php if ( false == get_theme_mod( 'atomy_enable_image_1_woweare', true) ):?>
                <div class="at-first-img-about-text position-absolute d-none d-sm-block" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_img_text_1_about'));?>" data-aos-duration="<?php echo esc_attr(get_theme_mod( 'at_d_effect_img_text_1_about'));?>" data-aos-delay="300">
                    <div class="at_wrapper">
                        <div class="at-single-img-wrapper">
                            <img src="<?php echo esc_url(get_theme_mod('at_upload_img_whoweare_1'));?>"/>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if ( false ==  get_theme_mod( 'atomy_enable_image_2_woweare', true) ):?>
                <div class="at-second-img-about-text position-absolute d-none d-sm-block" data-aos="<?php echo esc_attr(get_theme_mod('at_effect_img_text_2_about'));?>" data-aos-duration="<?php echo esc_attr(get_theme_mod( 'at_d_effect_img_text_2_about'));?>" data-aos-delay="100">
                    <div class="at_wrapper">
                        <div class="at-single-img-wrapper">
                            <img src="<?php echo esc_url(get_theme_mod('at_upload_img_whoweare_2'));?>"/>
                        </div>
                    </div>
                </div>
                <?php endif;?>
                <div class="at-third-imh-about-text position-relative mb-0" data-aos="<?php echo esc_attr(get_theme_mod('at_effect_img_text_3_about'));?>" data-aos-duration="<?php echo esc_attr(get_theme_mod('at_d_effect_img_text_3_about'));?>" data-aos-delay="600">
                    <div class="at_wrapper">
                        <div class="at-single-img-wrapper">
                          <?php if (has_post_thumbnail()) : the_post_thumbnail();else :?>
                            <img src="<?php echo esc_url(get_template_directory_uri()).'/images/atomy-default.jpg'; ?>"/>
                          <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <?php
   wp_reset_postdata(); ?>
</section>