<!--Homepage Service Section-->
<?php $corpbiz_options=theme_data_setup(); 
$current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), $corpbiz_options ); 
if($current_options['service_section_enabled'] == true) { 
?>
<div class="service_section">
	<div class="container">
		<div class="row">
			<div class="section_title">
				<?php if($current_options['home_service_title'] !="") { ?>
				<h1><?php echo esc_html($current_options['home_service_title']); ?></h1>
				<?php } ?>
				<?php if($current_options['home_service_description'] !="") { ?>
				<p> <?php echo esc_html($current_options['home_service_description']); ?> </p>
				<?php } ?>
			</div>	 
		</div>
		<div class="row">		
			<div class="col-md-3 col-sm-6">
				<div class="service_area">
					<div class="service_box">
						<?php if($current_options['home_service_one_link']!='') { ?>
					<a href="<?php echo $current_options['home_service_one_link']; ?>"<?php if($current_options['home_service_one_link_target'] =="on") { echo "target='_blank'"; } ?> >
						<i class="fa <?php echo $current_options['service_icon_one']; ?> service_icon_green"></i></a>
						<?php } ?>
					</div>
				
					<?php if($current_options['service_title_one']!='') { ?>
					<h2><a href="<?php echo $current_options['home_service_one_link']; ?>"<?php if($current_options['home_service_one_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_title_one']; ?></a></h2>
					<?php } ?>
					<p><?php echo esc_html($current_options['service_description_one']); ?></p>
				</div>	
			</div>		
			<div class="col-md-3 col-sm-6">
				<div class="service_area">
					<div class="service_box">
						<?php if($current_options['home_service_two_link']!='') { ?>
					<a href="<?php echo $current_options['home_service_two_link']; ?>"<?php if($current_options['home_service_two_link_target'] =="on") { echo "target='_blank'"; } ?> >
						<i class="fa <?php echo esc_attr($current_options['service_icon_two']); ?>  service_icon_red"></i></a>
						<?php } ?>
					</div>	
					<?php if($current_options['service_title_two']!='') { ?>
					<h2><a href="<?php echo $current_options['home_service_two_link']; ?>"<?php if($current_options['home_service_two_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_title_two']; ?></a></h2>
					<?php } ?>
					<p><?php echo esc_html($current_options['service_description_two']); ?></p>
				</div>
			</div>		
			<div class="col-md-3 col-sm-6">
				<div class="service_area">
					<div class="service_box">
					<?php if($current_options['home_service_third_link']!='') { ?>
					<a href="<?php echo $current_options['home_service_third_link']; ?>"<?php if($current_options['home_service_third_link_target'] =="on") { echo "target='_blank'"; } ?> >
						<i class="fa <?php echo esc_attr($current_options['service_icon_three']); ?> service_icon_blue"></i></a>
						<?php } ?>
					</div>	
					<?php if($current_options['service_title_three']!='') { ?>
					<h2><a href="<?php echo $current_options['home_service_third_link']; ?>"<?php if($current_options['home_service_third_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_title_three']; ?></a></h2>
					<?php } ?>
					<p><?php echo esc_html($current_options['service_description_three']); ?></p>
				</div>				
			</div>		
			<div class="col-md-3 col-sm-6">
				<div class="service_area">
					<div class="service_box">
						<?php if($current_options['home_service_fourth_link']!='') { ?>
					<a href="<?php echo $current_options['home_service_fourth_link']; ?>"<?php if($current_options['home_service_fourth_link_target'] =="on") { echo "target='_blank'"; } ?> >
						<i class="fa <?php echo esc_attr($current_options['service_icon_four']); ?> service_icon_orange"></i></a>
						<?php } ?>
					</div>
					<?php if($current_options['service_title_four']!='') { ?>
					<h2><a href="<?php echo $current_options['home_service_fourth_link']; ?>"<?php if($current_options['home_service_fourth_link_target'] =="on") { echo "target='_blank'"; } ?>><?php echo $current_options['service_title_four']; ?></a></h2>
					<?php } ?>
					<p><?php echo esc_html($current_options['service_description_four']); ?></p>
				</div>
			</div>				
		</div>	
	</div>
</div>	
<!--/Homepage Service Section-->
<?php } ?>