<div id="main-header">
	<?php $current_options = get_option('corpbiz_options'); ?>
	<div class="row"><div class="slide_star_seperate"></div></div>
	<div class="flexslider et_slider_auto et_slider_speed_7000" id="featured">		
		<ul class="slides">
			<li class="slide flex-active-slide">
				<?php if($current_options['slider_title']) { ?>
				<h2><a href="#"><?php echo esc_html($current_options['slider_title']); ?></a></h2><br>
				<?php } if($current_options['slider_description']) { ?>
				<div class="description"><?php echo esc_html($current_options['slider_description']); ?></div>
				<?php } if($current_options['slider_image']) { ?>
				<img style="width:1140px; height:420px;"  src="<?php echo esc_url($current_options['slider_image']); ?>">
				<?php } ?>
			</li> <!-- end .slide -->				
		</ul>	
	</div>
</div>