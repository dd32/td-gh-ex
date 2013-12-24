<?php 
/**
* @Theme Name	:	rambo
* @file         :	index-slider.php
* @package      :	rambo
* @author       :	webriti
* @license      :	license.txt
* @filesource   :	wp-content/themes/rambo/index-slider.php
*/
$current_options=get_option('rambo_theme_options');
if($current_options['home_slider_enabled']=="on")
{ 	
?>
<div class="main_slider">	
	<div class="slides">			
		<li><img  class="main_slide_img webrit_slides" src="<?php if($current_options['home_custom_image']!='') { echo $current_options['home_custom_image']; } ?>">
			<div class="slider_con">
				<h2><?php if(isset($current_options['home_image_title']))	{ echo $current_options['home_image_title']; } else { _e('Theme Feature Goes Here !','rambo'); } ?></h2>
				<h5 class="slide-title"><span><?php if(isset($current_options['home_image_description']))	{ echo $current_options['home_image_description']; } else { _e('Furniot makes content easy to view on any device with any resolution. You may check this with resizing. Fully Responsive Theme Amazing Design.','rambo'); } ?></span></h5>
			</div>
		</li>
	</div>			
</div>
<?php } ?>
<!-- /Slider -->