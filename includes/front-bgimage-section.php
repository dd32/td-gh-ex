
<?php $front_bg_image = avis_get_option($avis_shortname."_home_bgimage"); ?>
<?php if($front_bg_image != '') { ?>
<div class="Skt-header-image">
	<!-- header image -->
		<div class="avis-front-bgimg"><img alt="Background Image" class="ad-slider-image" width="1585"  src="<?php if($front_bg_image) { echo $front_bg_image; } else { echo get_template_directory_uri().'/images/1600x500.png';}?>" ></div>
	<!-- end  header image  -->
</div>
<?php } ?>