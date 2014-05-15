<?php
/**
 * The main template file
 */
$booster_options = get_option( 'faster_theme_options' );
get_header(); ?>


<div class="separator"></div>

<section class="section-main ">
  <div class="container no-padding">
    <div class="col-md-12 no-padding-left"> 

<!--========================= Carousel ========================= -->
<div id="myCarousel" class="carousel slide col-md-8 no-padding-left subscribe-box" data-ride="carousel"> 
  <!-- Indicators -->
    <?php $booster_args = array(
					'orderby'          => 'post_date',
					'order'            => 'DESC',
					'post_type'        => 'homeslider',
					'post_status'      => 'publish'
		  );
    $booster_slider = new WP_Query( $booster_args );?>
    <ol class="carousel-indicators">
    <?php for($i=0;$i<$booster_slider->post_count;$i++){
	  if($i==0){$booster_class='active';}else{$booster_class='';} ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $booster_class; ?>"></li>
    <?php } ?>
  	</ol>
  <div class="carousel-inner">
    <?php
   	$booster_count = 0;
	if($booster_slider->post_count != 0) {
    while ( $booster_slider->have_posts() ) {
    $booster_slider->the_post();
	$booster_class='';
	if($booster_count==0){ $booster_class='active'; }
	$booster_slider_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id())); ?>
    <div class="item <?php echo $booster_class;?>">
     <a href="#"><img src="<?php echo $booster_slider_image; ?>" alt="First slide" class="img-responsive booster-slider-image"></a> 
      <div class="container">
        <div class="carousel-caption carousel-caption1">
          <h1 class="home-slider-caption font-type-roboto"><?php echo get_the_title(); ?></h1>
          <h6-home><p class="font-color-black"><?php echo get_the_content(); ?></h6-home>
        </div>
      </div>
    </div>
    <?php $booster_count++; } 
	} else {
	?>
    <div class="item active">
     <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/home_img.png" alt="First slide" class="img-responsive booster-slider-image"></a> 
      <div class="container">
        <div class="carousel-caption carousel-caption1">
          <h1 class="home-slider-caption font-type-roboto">Booster</h1>
          <h6-home><p class="font-color-black">Booster Slider</h6-home>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  <a class="left carousel-control banner-nav-bg" href="#myCarousel" data-slide="prev"><span class="banner-nav-left sprite"></span></a> 
  <a class="right carousel-control banner-nav-bg" href="#myCarousel" data-slide="next"><span class="banner-nav-right sprite"></span></a> </div>
<!-- /.carousel --> 
  
      <div class="panel panel-default subscribe-box col-md-4">
        <h3 class="Label-book">BOOK AN APPOINTMENT</h3>
        <div class="panel-body">
		<div id="displaymessage"></div>
          <form id="appointment" name="appointment" method="post">
            <fieldset>
              <div class="form-group">
                <input id="appointment_name" class="table-width" type="text" placeholder="Name" name="name" />
              </div>
              <div class="form-group">
                <input id="appointment_email" class="table-width" type="text" placeholder="E-mail" name="email" />
              </div>
              <div class="form-group">
                <input id="appointment_phone" class="table-width" type="text" placeholder="Phone" name="phone" />
              </div>
              <div class="form-group">
                <input type="text" id="datetime" class="table-width" placeholder="Date & Time" name="datetime" autocomplete="off" />
              </div>
              <div class="form-group">
                <textarea id="appointement_comment" class="table-width" placeholder="Comment" name="comment" ></textarea>
              </div>
              <input type="button" name="submit" id="appointment_insert" class="btn-subscribe" value="Submit" />
            </fieldset>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section-main back-img">
  <div class="container">
    <div class="col-md-12 no-padding-left ">
      <div class="col-md-4"> <img class="img-banner welcome-image" src="<?php echo $booster_options['welcome-image']; ?>" alt=""  /> </div>
      <div class="col-md-8 font-type font-color font-type-roboto">
        <h1><?php echo $booster_options['welcome-title']; ?></h1>
        <p class="font-type"><?php echo $booster_options['welcome-content']; ?> </p>
      </div>
    </div>
  </div>
</section>
<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left padding-br">
    <?php     
	$booster_args = array(
			'posts_per_page'   => '4',
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'service',
            'post_status'      => 'publish'
        );
    $booster_services = new WP_Query( $booster_args );
   
    while ( $booster_services->have_posts() ) {
    $booster_services->the_post();
	
	$booster_feature_img = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
	?>
    <div class="col-md-3 clear-data">
      <div class="img-laft"> <img src="<?php echo $booster_feature_img; ?>"  alt=""  class="img-responsive home-services-image"/></div>
      <div class="img-test-padding"> <strong>
        <p class="sp"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></p>
        </strong>
        <p class="font-size-14">
		<?php echo get_the_excerpt(); ?></p>
		</div>
    </div>
	<?php } ?>
  </div>
</section>
<div class="separator"></div>
<section class="section-main container no-padding">
  <div class="col-md-12 no-padding-left">
    <div class="col-lg-5 img-banner1"> <img src="<?php echo $booster_options['why-chooseus-image']; ?>" alt="" class="img-responsive why-chooseus-image"  /> </div>
    <div class="col-lg-7 font-type-roboto">
      <h2 class="font-color-text"><?php echo $booster_options['why-chooseus-title']; ?></h2>
      <p class="sp"><?php echo $booster_options['why-chooseus-content']; ?></p>
    </div>
  </div>
</section>
<?php get_footer(); ?>