<?php $current_options = get_option('appointment_options',theme_data_setup()); 

	if($current_options['service_section_enabled'] == 'on') {
	$service_one_title = $current_options['service_one_title'];
	$service_one_description = $current_options['service_one_description'];
	$service_two_title = $current_options['service_two_title'];
	$service_two_description = $current_options['service_two_description'];
	$service_three_title = $current_options['service_three_title'];
	$service_three_description = $current_options['service_three_description'];
	$service_four_title = $current_options['service_four_title'];
	$service_four_description = $current_options['service_four_description'];
	$service_five_title = $current_options['service_five_title'];
	$service_five_description = $current_options['service_five_description'];
	$service_six_title = $current_options['service_six_title'];
	$service_six_description = $current_options['service_six_description'];
?>
<div class="Service-section">
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
			<?php if($current_options['service_title']) { ?>
				<div class="section-heading-title">
					<h1><?php echo esc_html($current_options['service_title']); ?></h1>
					<?php } 
					if($current_options['service_description']) { ?>
					<p><?php echo esc_html($current_options['service_description']); ?></p>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
						<?php if($current_options['service_one_icon']) { ?>
							<i class="<?php echo $current_options['service_one_icon']; ?>"></i><?php } ?>
						</div>
						<div class="media-body">
							<?php if($service_one_title) { ?>
							<h3><?php echo esc_html($service_one_title); ?></h3>
							<?php } if($service_one_description) { ?>
							<p><?php echo esc_html($service_one_description); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
						<?php if($current_options['service_two_icon']) { ?>
							<i class="<?php echo $current_options['service_two_icon']; ?>"></i>
							<?php } ?>
						</div>
						<?php if($service_two_title) { ?>
						<div class="media-body">
							<h3><?php echo esc_html($service_two_title); ?></a></h3>
							<?php }
							if($service_two_description) { ?>
							<p><?php echo esc_html($service_two_description); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
					<?php if($current_options['service_three_icon']) { ?>
						<div class="service-icon">
							<i class="<?php echo $current_options['service_three_icon']; ?>"></i>
							<?php }?>
						</div>
						<div class="media-body">
						<?php if($service_three_title) { ?>
							<h3><?php echo esc_html($service_three_title); ?></h3>
							<?php }
							if($service_three_description) { ?>
							<p><?php echo esc_html($service_three_description); ?></p>
							<?php } ?>
					  </div>
					</div>
				</div>
			</div>
			
			<div class="clearfix"></div>
			
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
						<?php if($current_options['service_four_icon']) { ?>
							<i class="<?php echo $current_options['service_four_icon']; ?>"></i>
							<?php } ?>
						</div>
						<div class="media-body">
							<?php if($service_four_title) { ?>
							<h3><?php echo esc_html($service_four_title); ?></h3>
							<?php }
							if($service_four_description) { ?>
							<p><?php echo esc_html($service_four_description); ?></p>
							<?php } ?>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<?php if($current_options['service_five_icon']) { ?>
							<i class="<?php echo $current_options['service_five_icon']; ?>"></i><?php } ?>
						</div>
						<div class="media-body">
							<?php if($service_five_title) { ?>
							<h3><?php echo esc_html($service_five_title); ?></h3>
							<?php }
							if($service_five_description) { ?>
							<p><?php echo esc_html($service_five_description); ?></p>
							<?php } ?>
					</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<div class="service-icon">
							<?php if($current_options['service_six_icon']) { ?>
							<i class="<?php echo $current_options['service_six_icon']; ?>"></i><?php } ?>
						</div>
						<div class="media-body">
							<?php if($service_six_title) { ?>
							<h3><?php echo esc_html($service_six_title); ?></h3>
							<?php }
							if($service_six_description) { ?>
							<p><?php echo esc_html($service_six_description); ?></p>
							<?php } ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-- /HomePage Service Section -->
<div class="clearfix"></div>