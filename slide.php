<?php 
/* 	Awesome Theme's Slide Part
	Copyright: 2015-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/
?>

<div id="slider-box-item" class="mainslider box100 bcolor-back">
<div id="mslider" class="owl-carousel owl-theme">
 
  <?php 
$awesome_opsin='3';
foreach (range(1, $awesome_opsin) as $awesome_opsinumber)  { ?>
  
 	<div class="item">  
 			<div class="mslider-image">
				<img src="<?php echo esc_url(awesome_get_option('slide-back' . $awesome_opsinumber, get_template_directory_uri() . '/images/slide/slideback'. $awesome_opsinumber . '.jpg')); ?>">
			</div>
	</div>
 <?php  }  ?>   
 
</div>

</div>



