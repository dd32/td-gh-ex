<?php 
/* 	Awesome Theme's Slide Part
	Copyright: 2015, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
?>

<div id="slider-box-item" class="mainslider box100 bcolor-back">
<div id="mslider" class="owl-carousel owl-theme">
 
  <?php 
$opsin=awesome_get_option('slide-number', '3');
foreach (range(1, $opsin) as $opsinumber)  { ?>
  
 	<div class="item">  
 			<div class="mslider-image">
				<img src="<?php echo esc_url(awesome_get_option('slide-back' . $opsinumber, get_template_directory_uri() . '/images/slide/slideback'. $opsinumber . '.jpg')); ?>">
			</div>
	</div>
 <?php  }  ?>   
 
</div>

</div>



