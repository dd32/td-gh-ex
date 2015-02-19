<div class="block ui-tabs-panel deactive" id="option-ui-id-9" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_lite_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_9']))
	{	
		if($_POST['webriti_settings_save_9'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else
			{
				if(isset($_POST['front_callout_enable']))
				{ 
			      echo $current_options['front_callout_enable']= "on"; 
				} 
				else
				{ 
				  echo $current_options['front_callout_enable']="off"; 
				 }

				$current_options['front_contact1_title'] = esc_html($_POST['front_contact1_title']);
				$current_options['front_contact1_val'] = esc_html($_POST['front_contact1_val']);
				$current_options['contact_one_icon'] = sanitize_text_field($_POST['contact_one_icon']);
				
				$current_options['front_contact2_title'] = esc_html($_POST['front_contact2_title']);
				$current_options['front_contact2_val'] = esc_html($_POST['front_contact2_val']);
				$current_options['contact_two_icon'] = sanitize_text_field($_POST['contact_two_icon']);
				
				$current_options['front_contact3_title'] = esc_html($_POST['front_contact3_title']);
				$current_options['front_contact3_val'] = esc_html($_POST['front_contact3_val']);
				$current_options['contact_three_icon'] = sanitize_text_field($_POST['contact_three_icon']);
				
				update_option('appointment_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_9'] == 2) 
		{	
			$current_options['front_callout_enable']= 'on';
			$current_options['front_contact1_title']= __('Have a question? Call us now','appointment');
			$current_options['front_contact1_val']= __('+82 334 843 52','appointment');
			$current_options['contact_one_icon'] = 'fa fa-phone';
			
			$current_options['front_contact2_title']= __('We are open Mon-Fri','appointment');
			$current_options['front_contact2_val']= __('Mon - Fri 08.00 - 18.00','appointment');
			$current_options['contact_two_icon'] = 'fa fa-clock-o';
			
			$current_options['front_contact3_title']= __('Drop us an mail','appointment');
			$current_options['front_contact3_val']= __('info@yoursupport.com','appointment');
			$current_options['contact_three_icon'] = 'fa fa-envelope';
			update_option('appointment_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_9">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Front page Header Contact section','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_9_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_9_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_9_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('9');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('9')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable front page call out section','appointment'); ?></h3>
			<input type="checkbox" <?php if($current_options['front_callout_enable']=='on') echo "checked='checked'"; ?> id="front_callout_enable" name="front_callout_enable" > <span class="explain"><?php _e('Enable front page call out section','appointment'); ?></span>
		</div>

		<div class="section">	
		<h3><?php _e('Add Phone Number icon ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="contact_one_icon" id="contact_one_icon" value="<?php echo $current_options['contact_one_icon']; ?>" >
			<span class="explain"><?php _e('Enter the Phone Number icon.','appointment'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Phone Phone number title','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact1_title" name="front_contact1_title" value="<?php if(!empty($current_options['front_contact1_title'])){ echo $current_options['front_contact1_title']; } ?>">
		</div>
		
		<div class="section">
			<h3><?php _e('Add Phone number','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact1_val" name="front_contact1_val" value="<?php if(!empty($current_options['front_contact1_val'])){ echo $current_options['front_contact1_val']; } ?>">
		</div>
		
		<div class="section">	
		<h3><?php _e('Add Clock Time icon ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="contact_two_icon" id="contact_two_icon" value="<?php echo $current_options['contact_two_icon']; ?>" >
			<span class="explain"><?php _e('Enter the Clock Time icon.','appointment'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Add Clock Time title','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact2_title" name="front_contact2_title" value="<?php if(!empty($current_options['front_contact2_title'])){ echo $current_options['front_contact2_title']; } ?>">
		</div>
		
		<div class="section">
			<h3><?php _e('Add Clock Time information','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact2_val" name="front_contact2_val" value="<?php if(!empty($current_options['front_contact2_val'])){ echo $current_options['front_contact2_val']; } ?>">
		</div>
		<div class="section">	
		<h3><?php _e('Add Email icon ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="contact_three_icon" id="contact_three_icon" value="<?php echo $current_options['contact_three_icon']; ?>" >
			<span class="explain"><?php _e('Enter the Email icon.','appointment'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Add Email Title','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact3_title" name="front_contact3_title" value="<?php if(!empty($current_options['front_contact3_title'])){ echo $current_options['front_contact3_title']; } ?>">
		</div>
		
		<div class="section">
			<h3><?php _e('Add Email information','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" id="front_contact3_val" name="front_contact3_val" value="<?php if(!empty($current_options['front_contact3_val'])){ echo $current_options['front_contact3_val']; } ?>">
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_9" name="webriti_settings_save_9" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('9');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('9')" >
		</div>
	</form>
</div>