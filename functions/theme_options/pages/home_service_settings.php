<div class="block ui-tabs-panel deactive" id="option-ui-id-14" >	
	<?php $current_options = get_option('corpbiz_options');
	if(isset($_POST['webriti_settings_save_14']))
	{	
		if($_POST['webriti_settings_save_14'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['home_service_title'] = sanitize_text_field($_POST['home_service_title']);
				$current_options['home_service_description']= sanitize_text_field($_POST['home_service_description']);
				
				$current_options['service_icon_one'] = sanitize_text_field($_POST['service_icon_one']);
				$current_options['service_title_one'] = sanitize_text_field($_POST['service_title_one']);
				$current_options['service_description_one'] = sanitize_text_field($_POST['service_description_one']);
				
				$current_options['service_icon_two'] = sanitize_text_field($_POST['service_icon_two']);
				$current_options['service_title_two'] = sanitize_text_field($_POST['service_title_two']);
				$current_options['service_description_two'] = sanitize_text_field($_POST['service_description_two']);
				
				$current_options['service_icon_three'] = sanitize_text_field($_POST['service_icon_three']);
				$current_options['service_title_three'] = sanitize_text_field($_POST['service_title_three']);
				$current_options['service_description_three'] = sanitize_text_field($_POST['service_description_three']);
				
				$current_options['service_icon_four'] = sanitize_text_field($_POST['service_icon_four']);
				$current_options['service_title_four'] = sanitize_text_field($_POST['service_title_four']);
				$current_options['service_description_four'] = sanitize_text_field($_POST['service_description_four']);
				
				update_option('corpbiz_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_14'] == 2) 
		{
			$current_options['home_service_title'] ='Our Nice Services';
			$current_options['home_service_description'] ='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis.';
			
			$current_options['service_icon_one'] = "fa-mobile";
			$current_options['service_title_one'] = "Responsive Design";
			$current_options['service_description_one'] = "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv";
				
			$current_options['service_icon_two'] = "fa-rocket";
			$current_options['service_title_two'] = "Power full Admin";
			$current_options['service_description_two'] = "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv";
			
			$current_options['service_icon_three'] = "fa-thumbs-o-up";
			$current_options['service_title_three'] = "Great Support";
			$current_options['service_description_three'] ="Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv";
			
			$current_options['service_icon_four'] = "fa-laptop";
			$current_options['service_title_four'] = "Clean Minimal Design";
			$current_options['service_description_four'] = "Lorem ipsum dolor sit amet, consect adipiscing elit.ivamus eget cvdn fdjnv";
			
			update_option('corpbiz_options',$current_options);
			
		}
	}  ?>
	<form method="post" id="webriti_theme_options_14">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Service Settings ','corpbiz');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_14_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_14_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_14_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('14');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('14')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Service Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="home_service_title" id="home_service_title" value="<?php echo $current_options['home_service_title']; ?>" >
			<span class="explain"><?php _e('Enter the Service Title.','corpbiz'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="home_service_description" name="home_service_description"><?php if($current_options['home_service_description']!='') { echo esc_attr($current_options['home_service_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Service Description.','corpbiz'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service One','corpbiz'); ?></h3>
			<h3><?php _e('Service Icons','corpbiz'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="service_icon_one" id="service_icon_one" value="<?php echo $current_options['service_icon_one']; ?>" >
			<h4 class="heading">Service Icon (Using Font Awesome icons name) like: fa-rub. <label style="margin-left:10px;"><a href="http://fontawesome.io/icons/" target="_blank"> Get your fontawesome icons.</a></label></h4>
			<h3><?php _e('Service Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_one" id="service_title_one" value="<?php echo $current_options['service_title_one']; ?>" >
			<span class="explain"><?php _e('Enter the Service Title.','corpbiz'); ?></span>
			<h3><?php _e('Service Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="service_description_one" name="service_description_one"><?php if($current_options['service_description_one']!='') { echo esc_attr($current_options['service_description_one']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Service Description.','corpbiz'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Service Two','corpbiz'); ?></h3>
			<h3><?php _e('Service Icons','corpbiz'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="service_icon_two" id="service_icon_two" value="<?php echo $current_options['service_icon_two']; ?>" >
			<h4 class="heading">Service Icon (Using Font Awesome icons name) like: fa-rub. <label style="margin-left:10px;"><a href="http://fontawesome.io/icons/" target="_blank"> Get your fontawesome icons.</a></label></h4>
			<h3><?php _e('Service Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_two" id="service_title_two" value="<?php echo $current_options['service_title_two']; ?>" >
			<span class="explain"><?php _e('Enter the Service Title.','corpbiz'); ?></span>
			<h3><?php _e('Service Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="service_description_two" name="service_description_two"><?php if($current_options['service_description_two']!='') { echo esc_attr($current_options['service_description_two']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Service Description.','corpbiz'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Service Three','corpbiz'); ?></h3>
			<h3><?php _e('Service Icons','corpbiz'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="service_icon_three" id="service_icon_three" value="<?php echo $current_options['service_icon_three']; ?>" >
			<h4 class="heading">Service Icon (Using Font Awesome icons name) like: fa-rub. <label style="margin-left:10px;"><a href="http://fontawesome.io/icons/" target="_blank"> Get your fontawesome icons.</a></label></h4>
			<h3><?php _e('Service Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_three" id="service_title_three" value="<?php echo $current_options['service_title_three']; ?>" >
			<span class="explain"><?php _e('Enter the Service Title.','corpbiz'); ?></span>
			<h3><?php _e('Service Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="service_description_three" name="service_description_three"><?php if($current_options['service_description_three']!='') { echo esc_attr($current_options['service_description_three']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Service Description.','corpbiz'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Service Four','corpbiz'); ?></h3>
			<h3><?php _e('Service Icons','corpbiz'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="service_icon_four" id="service_icon_four" value="<?php echo $current_options['service_icon_four']; ?>" >
			<h4 class="heading">Service Icon (Using Font Awesome icons name) like: fa-rub. <label style="margin-left:10px;"><a href="http://fontawesome.io/icons/" target="_blank"> Get your fontawesome icons.</a></label></h4>
			<h3><?php _e('Service Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_title_four" id="service_title_four" value="<?php echo $current_options['service_title_four']; ?>" >
			<span class="explain"><?php _e('Enter the Service Title.','corpbiz'); ?></span>
			<h3><?php _e('Service Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="service_description_four" name="service_description_four"><?php if($current_options['service_description_four']!='') { echo esc_attr($current_options['service_description_four']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Service Description.','corpbiz'); ?></span>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_14" name="webriti_settings_save_14" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('14');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('14')" >
		</div>
		
		<div class="webriti_spacer"></div>
	</form>
</div>