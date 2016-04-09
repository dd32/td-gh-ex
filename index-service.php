<?php 
$becorp_options=becorp_theme_default_data(); 
$home_service_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options );
if($home_service_setting['service_section_enabled'] == 1 ) { ?>
<!------------Services Section----------------->
 <div class="container services-section">
 
	<div class="row">
     <div class="col-md-12">
		<div class="main-heading">
			<h2 class="animated bounceInRight"><?php if($home_service_setting['service_title_one'] !='') { echo $home_service_setting['service_title_one']; } ?>&nbsp;<span><?php if($home_service_setting['service_title_two'] !='') { echo $home_service_setting['service_title_two']; } ?></span> </h2>
		   <p class="animated bounceInLeft"><?php if($home_service_setting['service_description'] !='') { echo $home_service_setting['service_description']; } ?></p>
		</div>
      </div>	
    </div>

	<div class="row">
	   <div class="col-md-4 services">
	   <?php if($home_service_setting['service_one_icon'] !='') { ?>
		  <i class="fa <?php echo $home_service_setting['service_one_icon']; ?>"></i> 
		  <?php } ?>
			<div class="desc">
			<?php if($home_service_setting['service_one_title'] !='') { ?>
			<h4><?php echo $home_service_setting['service_one_title']; ?></h4>
			<?php } 
			if($home_service_setting['service_one_description'] !='') { ?>
			<p><?php echo $home_service_setting['service_one_description']; ?></p>
			<?php } ?>
          </div>		  
		</div>
		
	    <div class="col-md-4 services">
		<?php if($home_service_setting['service_two_icon'] !='') { ?>
		  <i class="fa <?php echo $home_service_setting['service_two_icon']; ?>"></i>
		  <?php } ?>
			<div class="desc">
			<?php if($home_service_setting['service_two_title'] !='') { ?>
			<h4><?php echo $home_service_setting['service_two_title']; ?></h4>
			<?php } 
			if($home_service_setting['service_two_description'] !='') { ?>
           <p><?php echo $home_service_setting['service_two_description']; ?></p>
		   <?php } ?>
          </div>	  
		</div>
	    <div class="col-md-4 services">
		<?php if($home_service_setting['service_three_icon'] !='') { ?>
		  <i class="fa <?php echo $home_service_setting['service_three_icon']; ?>"></i>
		  <?php } ?>
          <div class="desc">
		  <?php if($home_service_setting['service_three_title'] !='') { ?>
			<h4><?php echo $home_service_setting['service_three_title']; ?></h4>
			<?php } 
			if($home_service_setting['service_three_description'] !='') { ?>
           <p><?php echo $home_service_setting['service_three_description']; ?></p>
		   <?php } ?>
          </div>		  
		</div>
		
	  </div>

 </div>
 <?php } ?>