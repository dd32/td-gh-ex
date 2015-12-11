<!-- service section -->
<?php $cpm_theme_options = bhumi_get_options(); ?>
<div class="bhumi_service">
<?php if($cpm_theme_options['home_service_heading'] !='') { ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="bhumi_heading_title">
				<h3><?php echo esc_attr($cpm_theme_options['home_service_heading']); ?></h3>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div class="container">
		<div class="row isotope" id="isotope-service-container">
			<?php for($i=1; $i<5; $i++ ) { 
				    if($cpm_theme_options['service_'.$i.'_icons'] !='' && $cpm_theme_options['service_'.$i.'_title'] !='' && $cpm_theme_options['service_'.$i.'_text'] !='' ) { ?>
						<div class=" col-md-3 service">
							<div class="bhumi_service_area appear-animation bounceIn appear-animation-visible">
								<?php if($cpm_theme_options['service_'.$i.'_icons'] !='') { ?>
									<a class="bhumi_service_icon" href="#"><i class="<?php echo esc_attr($cpm_theme_options['service_'.$i.'_icons']); ?>"></i></a><?php } ?>
									<div class="bhumi_service_detail media-body">
										<?php if($cpm_theme_options['service_'.$i.'_title'] !='') { ?><h3><a href="<?php echo esc_url($cpm_theme_options['service_'.$i.'_link']); ?>"><?php echo esc_attr($cpm_theme_options['service_'.$i.'_title']); ?></a></h3><?php } ?>
										<?php if($cpm_theme_options['service_'.$i.'_text'] !='') { ?><p><?php echo apply_filters('the_content', $cpm_theme_options['service_'.$i.'_text'], true); ?></p><?php } ?>
									</div>
							</div>
						</div>
			        <?php } 
			} ?>
		</div>
	</div>
</div>
<!-- /Service section -->