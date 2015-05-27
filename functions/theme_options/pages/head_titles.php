<div class="block ui-tabs-panel deactive" id="option-ui-id-15" >	
	<?php $current_options = get_option('wallstreet_lite_options');
	if(isset($_POST['webriti_settings_save_15']))
	{	
		if($_POST['webriti_settings_save_15'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$current_options['contact_phone_number'] = sanitize_text_field($_POST['contact_phone_number']);
				$current_options['contact_email'] = sanitize_text_field($_POST['contact_email']);
				$current_options['service_title'] = sanitize_text_field($_POST['service_title']);
				$current_options['service_description'] = sanitize_text_field($_POST['service_description']);
				$current_options['portfolio_title'] = sanitize_text_field($_POST['portfolio_title']);
				$current_options['portfolio_description']= sanitize_text_field($_POST['portfolio_description']);
				
				// Contact Heading Section Enabled on Home Page
				if(isset($_POST['contact_header_settings']))
				{ echo $current_options['contact_header_settings']= sanitize_text_field($_POST['contact_header_settings']); } 
				else { echo $current_options['contact_header_settings']="off"; }
				
				update_option('wallstreet_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_15'] == 2) 
		{	
			$current_options['contact_header_settings']="on";
			$current_options['contact_phone_number'] = "1-800-123-789";
			$current_options['contact_email'] = "info@webriti.com";
			$current_options['service_title'] = __('Our Services','wallstreet');
			$current_options['service_description'] = __('We Offer Great Services to our Clients','wallstreet');
			$current_options['portfolio_title'] =__('Featured Portfolio Project','wallstreet');
			$current_options['portfolio_description'] =__('Most Popular of Our Works','wallstreet');
			update_option('wallstreet_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_15">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Section Headings','wallstreet');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_15_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_success" ><?php _e('Options data successfully Saved','wallstreet');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_reset" ><?php _e('Options data successfully reset','wallstreet');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('15');">
					<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('15')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Contact Information On Front Page','wallstreet'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['contact_header_settings']=='on') echo "checked='checked'"; ?> id="contact_header_settings" name="contact_header_settings" >
			<span class="explain"><?php _e('Enable Contact Information On Front Page.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Contact Phone Number on Front Page:','wallstreet');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_phone_number" id="contact_phone_number" value="<?php if($current_options['contact_phone_number']!='') { echo esc_attr($current_options['contact_phone_number']); } ?>" >
		</div>
		<div class="section">
			<h3><?php _e('Contact Email on Front Page:','wallstreet');?></h3>
			<input class="webriti_inpute"  type="text" name="contact_email" id="contact_email" value="<?php if($current_options['contact_email']!='') { echo esc_attr($current_options['contact_email']); } ?>" >
		</div>
		<div class="section">		
			<h3><?php _e('Service Tag Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">
			<h3><?php _e('Services Title','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title" id="service_title" value="<?php if($current_options['service_title']!='') { echo esc_attr($current_options['service_title']); } ?>" >
			<span class="explain"><?php _e('Enter the services title.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Services Description','wallstreet'); ?></h3>
			<textarea rows="3" cols="8" id="service_description" name="service_description"><?php if($current_options['service_description']!='') { echo esc_attr($current_options['service_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the services description.','wallstreet'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Tag Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Title','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title" id="portfolio_title" value="<?php if($current_options['portfolio_title']!='') { echo esc_attr($current_options['portfolio_title']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description','wallstreet'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description" name="portfolio_description"><?php if($current_options['portfolio_description']!='') { echo esc_attr($current_options['portfolio_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description.','wallstreet'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_15" name="webriti_settings_save_15" />
			<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('15');">
			<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('15')" >
		</div>
	</form>
</div>