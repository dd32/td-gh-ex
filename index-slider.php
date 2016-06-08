<?php
/**
* @Theme Name	:	Becorp
* @file         :	index-slider.php
* @package      :	Becorp
* @author       :	sim
* @license      :	license.txt
* @filesource   :	wp-content/themes/becorp/index-slider.php
*/
?>

<!-- Slider Section -->	
<?php 
$becorp_options=becorp_theme_default_data(); 
$slider_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); 
if($slider_setting['home_banner_enabled'] == 1 ) {
?>
<div class="main-slider">
	<div id="main-slider" class="carousel <?php echo $slider_setting['slider_options']; ?> " data-ride="carousel"
	<?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>" >
	 <?php 
			$t=true;
			//$the_query = new WP_Query($query_args);
		?>
		<!-- Indicators -->
		<ol class="carousel-indicators">
		<li data-target="#main-slider" data-slide-to="0" class="active"></li>
		<li data-target="#main-slider" data-slide-to="1"></li>
		<li data-target="#main-slider" data-slide-to="2"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<?php if($slider_setting['slider_image_one'] !='') { ?>
					<img src="<?php echo esc_url($slider_setting['slider_image_one']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_one']); ?>">
				<?php } ?>
		     <!-- Caption -->
                    <div class="slider-caption">
                        <div class="col-md-12 text-center">
                            <h2 class="wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><span> <?php if($slider_setting['slider_image_title_one'] !='') {  echo esc_attr($slider_setting['slider_image_title_one']); } ?></span></h2>
							
                            <p class="wow slideInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><span><?php if($slider_setting['slider_image_description_one'] !='') { echo esc_attr($slider_setting['slider_image_description_one']); } ?></span></p>
                            <a class="btn btn-theme btn-sm btn-min-block wow animated slideInUp" href="<?php echo esc_url($slider_setting['slider_image_link_one']); ?>"<?php if( $slider_setting['slider_button_tab_one'] == 'on' ) { echo "target='_blank'"; } ?>><?php echo $slider_setting['slider_button_one_title']; ?></a></div>
                     </div>
				<!-- /Caption -->
			</div>
			<div class="item">
				<?php if($slider_setting['slider_image_two'] !='') { ?>
					<img src="<?php echo esc_url($slider_setting['slider_image_two']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_two']); ?>">
				<?php } ?>
		     <!-- Caption -->
                    <div class="slider-caption">
                        <div class="col-md-12 text-center">
                            <h2 class="wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><span> <?php if($slider_setting['slider_image_title_two'] !='') {  echo esc_attr($slider_setting['slider_image_title_two']); } ?></span></h2>
							
                            <p class="wow slideInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><span><?php if($slider_setting['slider_image_description_two'] !='') { echo esc_attr($slider_setting['slider_image_description_two']); } ?></span></p>
                            <a class="btn btn-theme btn-sm btn-min-block wow animated slideInUp" href="<?php echo esc_url($slider_setting['slider_image_link_two']); ?>"<?php if( $slider_setting['slider_button_tab_two'] == 'on' ) { echo "target='_blank'"; } ?>><?php echo $slider_setting['slider_button_two_title']; ?></a></div>
                     </div>
				<!-- /Caption -->
			</div>
			<div class="item">
				<?php if($slider_setting['slider_image_three'] !='') { ?>
					<img src="<?php echo esc_url($slider_setting['slider_image_three']); ?>" class="img-responsive" alt="<?php echo esc_attr($slider_setting['slider_image_title_three']); ?>">
				<?php } ?>
		     <!-- Caption -->
                    <div class="slider-caption">
                        <div class="col-md-12 text-center">
                            <h2 class="wow slideInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;"><span> <?php if($slider_setting['slider_image_title_three'] !='') {  echo esc_attr($slider_setting['slider_image_title_three']); } ?></span></h2>
							
                            <p class="wow slideInRight animated" data-wow-delay=".8s" style="visibility: visible; -webkit-animation-delay: .8s;"><span><?php if($slider_setting['slider_image_description_three'] !='') { echo esc_attr($slider_setting['slider_image_description_three']); } ?></span></p>
                            <a class="btn btn-theme btn-sm btn-min-block wow animated slideInUp" href="<?php echo esc_url($slider_setting['slider_image_link_three']); ?>"<?php if( $slider_setting['slider_button_tab_three'] == 'on' ) { echo "target='_blank'"; } ?>><?php echo $slider_setting['slider_button_three_title']; ?></a></div>
                     </div>
				<!-- /Caption -->
			</div>
		</div>  
		
		<!-- Pagination --> 
		<ul class="carou-direction-nav">
			<li><a class="carou-prev" href="#main-slider" data-slide="prev"></a></li>
			<li><a class="carou-next" href="#main-slider" data-slide="next"></a></li>
		</ul>
		<!-- /Pagination -->
	</div>
</div>
<!-- /Slider Section -->
<?php } ?>