<?php
/**
* section-whoweare.php
* @author    Denis Franchi
* @package   Atomy
* @version   1.0.2
*
*/
?>

<!-- Section Who we are -->
<section class="at-text-image-about <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
<div class="row">
<div class="pr-lg-5 mb-sm-5 mb-lg-0 at-text-image-about-img col-md-12 col-lg-6">
    <h2 data-aos="<?php echo esc_html(get_theme_mod( 'at_effect_title_whoweare'));?>" data-aos-duration="700">
       <?php echo esc_html(get_theme_mod( 'at_title_whoweare',__('Who We Are','atomy')));?>
    </h2>
    <p class="at-subtitle-whoweare lead">
       <?php echo esc_html(get_theme_mod( 'at_subtitle_whoweare',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.','atomy')));?>
    </p>
    <p class="at-content-whoweare">
      <?php echo esc_html(get_theme_mod( 'at_content_whoweare',__('Lorem ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.','atomy')));?>
    </p>
</div>
<div class="col-sm-8 offset-sm-5 mt-sm-5 pt-sm-5 col-md-6 offset-lg-2 col-lg-4 offset-md-4">
            <div class="at-three-img-about-text">
            <?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_image_1_woweare', true) )):?>
                <div class="at-first-img-about-text position-absolute d-none d-sm-block" data-aos="<?php echo esc_attr(get_theme_mod( 'at_effect_img_text_1_about'));?>" data-aos-duration="<?php echo esc_attr(get_theme_mod( 'at_d_effect_img_text_1_about'));?>" data-aos-delay="300">
                    <div class="at_wrapper">
                        <div class="at-single-img-wrapper">
                            <img src="<?php echo esc_url(get_theme_mod('at_upload_img_whoweare_1'));?>"/>
                        </div>
                    </div>
                </div>
            <?php endif;?>
            <?php if ( false == esc_attr( get_theme_mod( 'atomy_enable_image_2_woweare', true) )):?>
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
                            <img src="<?php echo esc_url(get_theme_mod('at_upload_img_whoweare_3'));?>"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>