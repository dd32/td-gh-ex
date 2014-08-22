<div class="block ui-tabs-panel deactive" id="option-ui-id-4" >	
	<?php $current_options = get_option('corpbiz_options');
	if(isset($_POST['webriti_settings_save_4']))
	{	
		if($_POST['webriti_settings_save_4'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['portfolio_title'] = sanitize_text_field($_POST['portfolio_title']);
				$current_options['portfolio_description']= sanitize_text_field($_POST['portfolio_description']);
				
				$current_options['portfolio_title_one'] = sanitize_text_field($_POST['portfolio_title_one']);
				$current_options['portfolio_image_one'] = sanitize_text_field($_POST['portfolio_image_one']);
				
				$current_options['portfolio_title_two'] = sanitize_text_field($_POST['portfolio_title_two']);
				$current_options['portfolio_image_two'] = sanitize_text_field($_POST['portfolio_image_two']);
				
				$current_options['portfolio_title_three'] = sanitize_text_field($_POST['portfolio_title_three']);
				$current_options['portfolio_image_three'] = sanitize_text_field($_POST['portfolio_image_three']);
				
				$current_options['portfolio_title_four'] = sanitize_text_field($_POST['portfolio_title_four']);
				$current_options['portfolio_image_four'] = sanitize_text_field($_POST['portfolio_image_four']);
				
				update_option('corpbiz_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_4'] == 2) 
		{
			$port_image1= WEBRITI_TEMPLATE_DIR_URI . "/images/port1.jpg";
			$port_image2= WEBRITI_TEMPLATE_DIR_URI . "/images/port2.jpg";
			
			$current_options['portfolio_title'] ='Our Work Speaks Thousand Words';
			$current_options['portfolio_description'] ='We have successfully completed over 2500 projects in mobile and web. Here are few of them';
			
			$current_options['portfolio_title_one'] = "Portfolio One";
			$current_options['portfolio_image_one'] = $port_image1;
			
			$current_options['portfolio_title_two'] = "Portfolio Two";
			$current_options['portfolio_image_two'] = $port_image2;
			
			$current_options['portfolio_title_three'] = "Portfolio Three";
			$current_options['portfolio_image_three'] = $port_image1;
			
			$current_options['portfolio_title_four'] = "Portfolio Four";
			$current_options['portfolio_image_four'] = $port_image2;
				
			
			update_option('corpbiz_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_4">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Portfolio ','corpbiz');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_4_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">		
			<h3><?php _e('Portfolio Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title" id="portfolio_title" value="<?php echo $current_options['portfolio_title']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','corpbiz'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description','corpbiz'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description" name="portfolio_description"><?php if($current_options['portfolio_description']!='') { echo esc_attr($current_options['portfolio_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description.','corpbiz'); ?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Portfolio One','corpbiz'); ?></h3>			
			<h3><?php _e('Portfolio Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_one" id="portfolio_title_one" value="<?php echo $current_options['portfolio_title_one']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','corpbiz'); ?></span>
			
			<h3><?php _e('Portfolio image','corpbiz'); ?></h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_one']!='') { echo esc_attr($current_options['portfolio_image_one']); } ?>" id="portfolio_image_one" name="portfolio_image_one"  class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Portfolio Image" class="upload_image_button" />
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Two','corpbiz'); ?></h3>
			
			<h3><?php _e('Portfolio Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_two" id="portfolio_title_two" value="<?php echo $current_options['portfolio_title_two']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','corpbiz'); ?></span>
			
			<h3><?php _e('Portfolio image','corpbiz'); ?></h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_two']!='') { echo esc_attr($current_options['portfolio_image_two']); } ?>" id="portfolio_image_two" name="portfolio_image_two"  class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Portfolio Image" class="upload_image_button" />
		</div>
		
		<div class="section">
			<h3><?php _e('Portfolio Three','corpbiz'); ?></h3>
			
			<h3><?php _e('Portfolio Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_three" id="portfolio_title_three" value="<?php echo $current_options['portfolio_title_three']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','corpbiz'); ?></span>
			
			<h3><?php _e('Portfolio image','corpbiz'); ?></h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_three']!='') { echo esc_attr($current_options['portfolio_image_three']); } ?>" id="portfolio_image_three" name="portfolio_image_three"  class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Portfolio Image" class="upload_image_button" />
		</div>
		
		<div class="section">
			<h3><?php _e('Portfolio Four','corpbiz'); ?></h3>
			
			<h3><?php _e('Portfolio Title','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_four" id="portfolio_title_four" value="<?php echo $current_options['portfolio_title_four']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','corpbiz'); ?></span>
			
			<h3><?php _e('Portfolio image','corpbiz'); ?></h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_four']!='') { echo esc_attr($current_options['portfolio_image_four']); } ?>" id="portfolio_image_four" name="portfolio_image_four"  class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Portfolio Image" class="upload_image_button" />
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_4" name="webriti_settings_save_4" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>