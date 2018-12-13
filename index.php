<?php
/**
 * The main template file
 */
$booster_options = get_option( 'faster_theme_options' );
get_header(); ?>
<div class="separator"></div>
<section class="section-main booster-slider-setion">
  <div class="col-md-12 no-padding"> 
<!--========================= Carousel ========================= -->
<?php 
$slider_val=array('first','second','third','forth','fifth'); 
$img_cnt=0;
for($i=0;$i<count($slider_val);$i++) { 
  if(get_theme_mod($slider_val[$i].'_slider_image') != ''){
  $image_url = wp_get_attachment_url(get_theme_mod($slider_val[$i].'_slider_image'));
  }else{ $image_url=$booster_options[$slider_val[$i].'-slider-image']; }
  if($image_url != ''){ $img_cnt=1; }
}
if($img_cnt > 0) {
?>
<div id="myCarousel" class="carousel slide col-md-12 no-padding-left subscribe-box" data-ride="carousel"> 
  <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php
      $booster_count = 0; 
      $slider_val=array('first','second','third','forth','fifth'); 
      for($i=0;$i<count($slider_val);$i++) { 
         if(get_theme_mod($slider_val[$i].'_slider_image') != ''){
          $image_url = wp_get_attachment_url(get_theme_mod($slider_val[$i].'_slider_image'));
        }else{
          $image_url=$booster_options[$slider_val[$i].'-slider-image'];
        }
      if (!empty($image_url)) { ?>
        <li data-target="#myCarousel" data-slide-to="0" class="<?php if($booster_count==0){ echo'active'; } ?>"></li>
    <?php $booster_count++; } 
     } ?>
    </ol>
    <div class="carousel-inner">
    <?php $booster_count_img = 0;
    $slider_val=array('first','second','third','forth','fifth'); 
    for($i=0;$i<count($slider_val);$i++)
    {
        if(get_theme_mod($slider_val[$i].'_slider_image') != ''){
          $image_url = wp_get_attachment_url(get_theme_mod($slider_val[$i].'_slider_image'));
        }else{
          $image_url=$booster_options[$slider_val[$i].'-slider-image'];
        }
        if($image_url != ''){
     ?>
       <div class="item <?php if($booster_count_img==0){ echo'active'; } ?>">
       <?php if(get_theme_mod($slider_val[$i].'_slider_link',isset($booster_options[$slider_val[$i].'-slider-link'])?$booster_options[$slider_val[$i].'-slider-link']:'') != ''){ ?>
     <a href="<?php echo esc_url(get_theme_mod($slider_val[$i].'_slider_link',isset($booster_options[$slider_val[$i].'-slider-link'])?$booster_options[$slider_val[$i].'-slider-link']:'')); ?>" target="_blank"><img src="<?php echo esc_url($image_url); ?>" class="img-responsive booster-slider-image"></a> <?php }
     else{ ?>
      <img src="<?php echo esc_url($image_url); ?>" class="img-responsive booster-slider-image">
    <?php } ?>
    </div>
    <?php $booster_count_img++; }
     } ?>
  </div>  
      <a class="left carousel-control banner-nav-bg" href="#myCarousel" data-slide="prev"><span class="banner-nav-left sprite"></span></a> 
      <a class="right carousel-control banner-nav-bg" href="#myCarousel" data-slide="next"><span class="banner-nav-right sprite"></span></a> 
    </div>
<?php } ?>  
<!-- /.carousel -->
</div>
</section> 
<section class="section-main back-img">
  <div class="container">
    <div class="col-md-12 no-padding">
      <div class="row">
    <?php
     if(get_theme_mod('about_us_image') != ''){
          $image_url = wp_get_attachment_url(get_theme_mod('about_us_image'));
      }else{
        $image_url=$booster_options['welcome-image'];
      }
      if($image_url != ''){ $image_col_cls="9"; ?>
      <div class="col-md-3"><img class="img-banner welcome-image" src="<?php echo esc_url($image_url); ?>" alt=""  /></div>
      <?php }else{ $image_col_cls="12"; } ?>
      <div class="col-md-<?php echo esc_attr($image_col_cls); ?> font-type font-color font-type-roboto">
        <h1><?php if(get_theme_mod('about_us_title',isset($booster_options['welcome-title'])?$booster_options['welcome-title']:'') != 'Welcome') { echo esc_html(get_theme_mod('about_us_title',isset($booster_options['welcome-title'])?$booster_options['welcome-title']:'Welcome')); } ?></h1>
        <p class="font-type"><?php if(get_theme_mod('about_us_description',isset($booster_options['welcome-content'])?$booster_options['welcome-content']:'') != '') { echo wp_kses_post(get_theme_mod('about_us_description',isset($booster_options['welcome-content'])?$booster_options['welcome-content']:'')); } ?></p>
      </div>
    </div>
    </div>
  </div>
</section>
<section class="section-main container">
    <div class="row"><div class="col-md-12"><h2 class="font-color-text latest-pos"><?php esc_html_e("Latest Posts", "booster"); ?></h2></div></div>
  <div class="row"> 
    <?php
    $flag=1;
     $booster_args1 = array(
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
      'posts_per_page'   => 4
      );
    $booster_posts = new WP_Query( $booster_args1 );
    while ( $booster_posts->have_posts() ) { $booster_posts->the_post();
    if($flag < 5){
    
  $booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
    <div class="col-md-3 clear-data no-padding-left">
      <div class="img-laft"> 
      <?php if($booster_feature_img) { ?>
        <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url($booster_feature_img); ?>"  alt=""  class="img-responsive home-services-image"/></a>
      <?php } else { ?>
        <a href="<?php echo esc_url(get_permalink()); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/no-image.png"  alt=""  class="img-responsive home-services-image"/></a>
      <?php } ?>
      </div>
      <div class="img-test-padding"> <strong>
        <p class="sp"><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></p>
        </strong>
        <p class="font-size-14">
    <?php echo get_the_excerpt(); ?></p>
    </div>
    </div>
  <?php $flag++; } } ?>
  </div>
</section>
<div class="separator"></div>
<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left">
  <?php if(get_theme_mod('why_choose_image') != ''){
          $image_url = wp_get_attachment_url(get_theme_mod('why_choose_image'));
        }else{
          $image_url=$booster_options['why-chooseus-image'];
        }
      if($image_url != ''){ $image_col_cls="7"; ?>
    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 img-banner1"><img src="<?php echo esc_url($image_url); ?>" alt="" class="img-responsive why-chooseus-image"  /></div>
    <?php }else{ $image_col_cls="12"; } ?>
    <div class="col-lg-<?php echo esc_attr($image_col_cls); ?> col-md-7 col-sm-12 col-xs-12 font-type-roboto why-chooseus-content">
      <h2 class="font-color-text"><?php if(get_theme_mod('why_choose_title',isset($booster_options['why-chooseus-title'])?$booster_options['why-chooseus-title']:'Why Choose Us?') != '') { echo esc_html(get_theme_mod('why_choose_title',isset($booster_options['why-chooseus-title'])?$booster_options['why-chooseus-title']:'Why Choose Us?')); } ?></h2>
      <p class="sp"><?php if(get_theme_mod('why_choose_description',isset($booster_options['why-chooseus-content'])?$booster_options['why-chooseus-content']:'') != '') { echo wp_kses_post(get_theme_mod('why_choose_description',isset($booster_options['why-chooseus-content'])?$booster_options['why-chooseus-content']:'')); } ?></p>
    </div>
  </div>
</section>
<?php get_footer(); ?>