<!--Homepage Service Section-->
<?php $current_options = get_option('corpbiz_options'); ?>
<div class="container">
	<div class="row">
		<div class="service_heading_title">
			<?php if($current_options['home_service_title'] !="") { ?>
			<h1><?php echo esc_html($current_options['home_service_title']); ?></h1>
			<?php } ?>
			<?php if($current_options['home_service_description'] !="") { ?>
			<p> <?php echo esc_html($current_options['home_service_description']); ?> </p>
			<?php } ?>
		</div>	 
	</div>
	<div class="row">		
		<div class="col-md-3 col-sm-6 homepage_service_section">
			<div class="service_box">
				<i class="fa <?php echo esc_attr($current_options['service_icon_one']); ?> color_green"></i>
			</div>
			<h2><?php echo esc_html($current_options['service_title_one']); ?></h2>
			<p><?php echo esc_html($current_options['service_description_one']); ?></p>
		</div>		
		<div class="col-md-3 col-sm-6 homepage_service_section">
			<div class="service_box">
				<i class="fa <?php echo esc_attr($current_options['service_icon_two']); ?>  color_red"></i>
			</div>
			<h2><?php echo esc_html($current_options['service_title_two']); ?></h2>
			<p><?php echo esc_html($current_options['service_description_two']); ?></p>
		</div>		
		<div class="col-md-3 col-sm-6 homepage_service_section">
			<div class="service_box">
				<i class="fa <?php echo esc_attr($current_options['service_icon_three']); ?> color_blue"></i>
			</div>
			<h2><?php echo esc_html($current_options['service_title_three']); ?></h2>
			<p><?php echo esc_html($current_options['service_description_three']); ?></p>			
		</div>		
		<div class="col-md-3 col-sm-6 homepage_service_section">
			<div class="service_box">
				<i class="fa <?php echo esc_attr($current_options['service_icon_four']); ?> color_orange"></i>
			</div>
			<h2><?php echo esc_html($current_options['service_title_four']); ?></h2>
			<p><?php echo esc_html($current_options['service_description_four']); ?></p>			
		</div>				
	</div>	
</div>
<!--/Homepage Service Section-->