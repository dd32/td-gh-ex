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
$booster_slider = array(0 => $booster_options['first-slider-image'],1 => $booster_options['second-slider-image'],2 => $booster_options['third-slider-image'],3 => $booster_options['forth-slider-image'],4 => $booster_options['fifth-slider-image']);	
$booster_link = array(0 => $booster_options['first-slider-link'], 1 => $booster_options['second-slider-link'],2 => $booster_options['third-slider-link'],								3 => $booster_options['forth-slider-link'],4 => $booster_options['fifth-slider-link']);										
$booster_value = array_filter($booster_slider);
?>
<?php if(!empty($booster_value)) { ?>
<div id="myCarousel" class="carousel slide col-md-12 no-padding-left subscribe-box" data-ride="carousel"> 
  <!-- Indicators -->
    <ol class="carousel-indicators">
    <?php $booster_count = 0; 
		  foreach ($booster_slider as $booster_slide) { 
		  if (empty($booster_slide)) { continue; } ?>
        <li data-target="#myCarousel" data-slide-to="0" class="<?php if($booster_count==0){ echo'active'; } ?>"></li>
    <?php $booster_count++; } ?>
    </ol>
  	<div class="carousel-inner">
    <?php $booster_count_img = 0; 
		  foreach ($booster_slider as $booster_key => $booster_slide) { 
		  if (empty($booster_slide)) { continue; } ?>
    <div class="item <?php if($booster_count_img==0){ echo'active'; } ?>">
     <a href="<?php echo $booster_link[$booster_key]; ?>" target="_blank"><img src="<?php echo $booster_slide; ?>" class="img-responsive booster-slider-image"></a> 
    </div>
	<?php $booster_count_img++; } ?>
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
      <div class="col-md-4"> <?php if($booster_options['welcome-image'] != '') { ?><img class="img-banner welcome-image" src="<?php echo $booster_options['welcome-image']; ?>" alt=""  /><?php } ?></div>
      <div class="col-md-8 font-type font-color font-type-roboto">
        <h1><?php echo $booster_options['welcome-title']; ?></h1>
        <p class="font-type"><?php echo $booster_options['welcome-content']; ?> </p>
      </div>
    </div>
  </div>
</section>
<section class="section-main container no-padding">
  <h2 class="font-color-text">Latest Post</h2>
  <div class="col-md-12 no-padding-left padding-br">
    <?php     
	$booster_args1 = array(
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
			'posts_per_page'   => 3
			);
    $booster_posts = new WP_Query( $booster_args1 );
    while ( $booster_posts->have_posts() ) {
    $booster_posts->the_post();
	$booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
	?>

    <div class="col-md-3 clear-data no-padding-left">
      <div class="img-laft"> 
      <?php if($booster_feature_img) { ?>
      	<img src="<?php echo $booster_feature_img; ?>"  alt=""  class="img-responsive home-services-image"/>
      <?php } else { ?>
      	<img src="<?php echo get_template_directory_uri(); ?>/images/no-image.png"  alt=""  class="img-responsive home-services-image"/>
      <?php } ?>
      </div>
      <div class="img-test-padding"> <strong>
        <p class="sp"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
        </strong>
        <p class="font-size-14">
		<?php echo get_the_excerpt(); ?></p>
		</div>
    </div>
	<?php }	 ?>
  </div>
</section>
<div class="separator"></div>
<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left">
    <div class="col-lg-5 img-banner1"><?php  if($booster_options['why-chooseus-image'] != '') { ?><img src="<?php echo $booster_options['why-chooseus-image']; ?>" alt="" class="img-responsive why-chooseus-image"  /><?php } ?></div>
    <div class="col-lg-7 font-type-roboto why-chooseus-content">
      <h2 class="font-color-text"><?php echo $booster_options['why-chooseus-title']; ?></h2>
      <p class="sp"><?php echo $booster_options['why-chooseus-content']; ?></p>
    </div>
  </div>
</section>
<?php get_footer(); ?>