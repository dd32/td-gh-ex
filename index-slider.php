<!-- Slider Section -->
<?php $current_options = get_option('elitepress_lite_options',theme_data_setup()); ?>
<div class="homepage-mycarousel">
	<div class="flexslider">
        <div class="flex-viewport">
		<?php if($current_options['home_banner_enabled'] == 'on') { ?>
			
				<li>
					<?php if($current_options['slider_image']){ ?>
					<img class="img-responsive" src="<?php echo esc_url($current_options['slider_image']); ?>">
					<?php } ?>
					<div class="flex-slider-center">
					
					<?php if($current_options['slider_title_one']){ ?>
						<div class="slide-text-bg1"><h1><?php echo esc_html ($current_options['slider_title_one']); ?></h1></div>
					<?php }  
					if($current_options['slider_description']) { ?>
						<div class="slide-text-bg2"><h3><?php echo esc_html ($current_options['slider_description']); ?></h3></div>
					<?php } ?>
					</div>
				</li>
				<?php } ?>				
			</div>
		</div> 
	</div>
<!-- /Slider Section -->

