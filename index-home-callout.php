<?php $current_options = get_option('appointment_options',theme_data_setup()); 
if($current_options['home_call_out_area_enabled']=='on'){ ?>
 <div class="callout-section">
	<div class="overlay">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">	
						<?php if($current_options['home_call_out_title']){ ?>
						<h1><?php echo $current_options['home_call_out_title']; ?></h1>
						<?php } 
						if($current_options['home_call_out_description']){ ?> 
						<p><?php echo $current_options['home_call_out_description']; ?></p>
						<?php } ?>
					<div class="btn-area">
					<?php if($current_options['home_call_out_btn1_text']){ ?>
						<a href="<?php echo $current_options['home_call_out_btn1_link']; ?>" <?php if($current_options['home_call_out_btn1_link_target'] =="on") { echo "target='_blank'"; } ?> class="callout-btn1"><?php echo $current_options['home_call_out_btn1_text']; ?></a>
						<?php } ?>
						<?php if($current_options['home_call_out_btn2_text']){ ?>
						<a href="<?php echo $current_options['home_call_out_btn2_link']; ?>" <?php if($current_options['home_call_out_btn2_link_target'] =="on") { echo "target='_blank'"; } ?> class="callout-btn2"><?php echo $current_options['home_call_out_btn2_text']; ?></a>
						<?php } ?>
					</div>
				</div>	
			</div>			
		
		</div>
			
	</div>	
</div> 
<!-- /Callout Section -->
<?php } ?>
<div class="clearfix"></div>