<?php 
$becorp_options=becorp_theme_default_data(); 
$home_service_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); ?>
<div class="container services-section">
	<div class="row">
     <div class="col-md-12">
		<div class="main-heading">
		
		   <h2><?php if($home_service_setting['service_heading_title_one'] !='') { echo esc_html($home_service_setting['service_heading_title_one']); } ?>&nbsp;<span><?php if($home_service_setting['service_heading_title_two'] !='') { echo esc_html($home_service_setting['service_heading_title_two']); } ?></span> </h2>
		   <p><?php echo esc_html($home_service_setting['service_heading_desc']); ?></p>
		</div>
      </div>	
    </div>
	
	<div class="row">		
		<div class="col-md-4 services">
		  <?php if($home_service_setting['service_one_icon'] !='') { ?>
				<a href=""><i class="fa <?php echo $home_service_setting['service_one_icon']; ?>"></i></a>
		  <?php } ?>
          <div class="desc">
			<h4><?php echo $home_service_setting['service_title_one']; ?></h4>
           <p><?php echo $home_service_setting['service_desc_one']; ?></p>
          </div>		  
		</div>
		<div class="col-md-4 services">
		  <?php if($home_service_setting['service_two_icon'] !='') { ?>
				<a href=""><i class="fa <?php echo $home_service_setting['service_two_icon']; ?>"></i></a>
		  <?php } ?>
          <div class="desc">
			<h4><?php echo $home_service_setting['service_title_two']; ?></h4>
           <p><?php echo $home_service_setting['service_desc_two']; ?></p>
          </div>		  
		</div>
		<div class="col-md-4 services">
		  <?php if($home_service_setting['service_three_icon'] !='') { ?>
				<a href=""><i class="fa <?php echo $home_service_setting['service_three_icon']; ?>"></i></a>
		  <?php } ?>
          <div class="desc">
			<h4><?php echo $home_service_setting['service_title_three']; ?></h4>
           <p><?php echo $home_service_setting['service_desc_three']; ?></p>
          </div>		  
		</div>
		
	</div>	
</div>