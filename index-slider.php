<!-- Slider Section -->
<?php $current_options = get_option('appointment_lite_options',theme_data_setup()); ?>	
<div class="homepage-mycarousel">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
	<?php if($current_options['home_banner_enabled'] == 'on') { ?>
	<div class="carousel-inner" role="listbox">
		<div class="item active">
		<?php if($current_options['slider_image']){ ?>
		  <img class="img-responsive" src="<?php echo esc_url($current_options['slider_image']); ?>">
					<?php } ?>
			<div class="slide-caption">
			<?php if($current_options['slider_title_one']){ ?>
				<div class="slide-text-bg1"><h2><?php echo esc_html ($current_options['slider_title_one']); ?></h2></div>
				<?php }  
					if($current_options['slider_description']) { ?>
				<div class="slide-text-bg2"><span><?php echo esc_html ($current_options['slider_description']); ?></span></div>	
				<?php } ?>
				<div class="slide-btn-area-sm"><?php if($current_options['slider_btn_text']){ ?>
						<a href="<?php echo $current_options['slider_btn_link']; ?>" <?php if($current_options['slider_btn_link_target'] =="on") { echo "target='_blank'"; } ?> class="slide-btn-sm"><?php echo $current_options['slider_btn_text']; ?></a>
						<?php } ?><?php if($current_options['slider_btn_text']){ ?></a></div>
						<?php } ?>
			</div>
		</div>
	</div>  
	<?php } ?>	
		
	</div>
</div>
<!-- /Slider Section -->
<div class="clearfix"></div>
<!-- /Slider Section -->