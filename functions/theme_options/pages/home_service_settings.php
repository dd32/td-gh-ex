<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >	
	<?php $current_options = get_option('wallstreet_lite_options');
	if(isset($_POST['webriti_settings_save_3']))
	{	
		if($_POST['webriti_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{				
				$current_options['service_title_one'] = sanitize_text_field($_POST['service_title_one']);
				$current_options['service_description_one'] = sanitize_text_field($_POST['service_description_one']);
				$current_options['service_image_one']= sanitize_text_field($_POST['service_image_one']);
				
				$current_options['service_title_two'] = sanitize_text_field($_POST['service_title_two']);
				$current_options['service_description_two'] = sanitize_text_field($_POST['service_description_two']);
				$current_options['service_image_two']= sanitize_text_field($_POST['service_image_two']);
				
				$current_options['service_title_three'] = sanitize_text_field($_POST['service_title_three']);
				$current_options['service_description_three'] = sanitize_text_field($_POST['service_description_three']);
				$current_options['service_image_three']= sanitize_text_field($_POST['service_image_three']);

				// Other Service Section in Service Template
				if($_POST['service_section_enabled'])
				{ echo $current_options['service_section_enabled']= sanitize_text_field($_POST['service_section_enabled']); } 
				else { echo $current_options['service_section_enabled']="off"; }
				
				update_option('wallstreet_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_3'] == 2) 
		{
			// Other Service Section in Service Template
			$service_image = WEBRITI_TEMPLATE_DIR_URI . "/images/service.jpg";
			$current_options['service_section_enabled']= 'on';

			$current_options['service_title_one']='Product Designing';
			$current_options['service_description_one'] ='Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.';
			$current_options['service_image_one']= $service_image;
			
			$current_options['service_title_two']='WordPress Themes';
			$current_options['service_description_two'] ='Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.';
			$current_options['service_image_two']= $service_image;
			
			$current_options['service_title_three']='Responsive Designs';
			$current_options['service_description_three'] ='Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit dignissim dapib tumst dign eger porta nisl.';
			$current_options['service_image_three']= $service_image;
			
			update_option('wallstreet_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_3">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Service Settings','wallstreet');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_3_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_success" ><?php _e('Options data successfully Saved','wallstreet');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_reset" ><?php _e('Options data successfully reset','wallstreet');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Service Section','wallstreet'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['service_section_enabled']=='on') echo "checked='checked'"; ?> id="service_section_enabled" name="service_section_enabled" >
			<span class="explain"><?php _e('Enable Service Section on front page.','wallstreet'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Service One Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">
			<h3><?php _e('Service Title One','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_one" id="service_title_one" value="<?php if($current_options['service_title_one']!='') { echo esc_attr($current_options['service_title_one']); } ?>" >
			<span class="explain"><?php _e('Enter the service title one.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Description One','wallstreet'); ?></h3>
			<textarea rows="3" cols="8" id="service_description_one" name="service_description_one"><?php if($current_options['service_description_one']!='') { echo esc_attr($current_options['service_description_one']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service description one.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Image One','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['service_image_one']!='') { echo esc_attr($current_options['service_image_one']); } ?>" id="service_image_one" name="service_image_one" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<div class="section">		
			<h3><?php _e('Service Two Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">
			<h3><?php _e('Service Title Two','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_two" id="service_title_two" value="<?php if($current_options['service_title_two']!='') { echo esc_attr($current_options['service_title_two']); } ?>" >
			<span class="explain"><?php _e('Enter the service title two.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Description Two','wallstreet'); ?></h3>
			<textarea rows="3" cols="8" id="service_description_two" name="service_description_two"><?php if($current_options['service_description_two']!='') { echo esc_attr($current_options['service_description_two']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service description one.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Image Two','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['service_image_two']!='') { echo esc_attr($current_options['service_image_two']); } ?>" id="service_image_two" name="service_image_two" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<div class="section">		
			<h3><?php _e('Service Three Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">
			<h3><?php _e('Service Title Three','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_three" id="service_title_three" value="<?php if($current_options['service_title_three']!='') { echo esc_attr($current_options['service_title_three']); } ?>" >
			<span class="explain"><?php _e('Enter the service title three.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Description Three','wallstreet'); ?></h3>
			<textarea rows="3" cols="8" id="service_description_three" name="service_description_three"><?php if($current_options['service_description_three']!='') { echo esc_attr($current_options['service_description_three']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service description three.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Image Three','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['service_image_three']!='') { echo esc_attr($current_options['service_image_three']); } ?>" id="service_image_three" name="service_image_three" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_3" name="webriti_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
		</div>
	</form>
</div>