<?php
$becorp_options=becorp_theme_default_data(); 
$collout_options = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); 
if($collout_options['home_call_out_area_enabled'] == 1 ) {  ?>
<div class="buy-it-area">
  <div class="solid-bg">
	<div class="container">
	     <div class="row">
			<?php if($collout_options['home_call_out_description'] !=''){ ?>
	        <div class="col-md-9"><?php  echo $collout_options['home_call_out_description']; ?> </div>
			<?php } ?>			
			<div class="col-md-3"><?php if($collout_options['home_call_out_button_title'] !=''){ ?> <a href="<?php echo esc_url($collout_options['home_call_out_btn_link']); ?>" <?php if( $collout_options['home_call_out_btn_link_target'] ==1 ) { echo "target='_blank'"; } ?> class="buy-it-now"><i class="fa fa-location-arrow fa-lg"></i><?php echo $collout_options['home_call_out_button_title']; 
						?></a> <?php  } ?> </div>
		 </div>
	</div>
  </div>	
</div>
<?php } ?>