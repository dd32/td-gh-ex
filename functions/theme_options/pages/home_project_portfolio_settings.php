<div class="block ui-tabs-panel deactive" id="option-ui-id-4" >	
	<?php $current_options = get_option('wallstreet_lite_options');
	if(isset($_POST['webriti_settings_save_4']))
	{	
		if($_POST['webriti_settings_save_4'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$current_options['portfolio_title_one'] = sanitize_text_field($_POST['portfolio_title_one']);
				$current_options['portfolio_description_one']= sanitize_text_field($_POST['portfolio_description_one']);
				$current_options['portfolio_image_one'] = sanitize_text_field($_POST['portfolio_image_one']);
				
				$current_options['portfolio_title_two'] = sanitize_text_field($_POST['portfolio_title_two']);
				$current_options['portfolio_description_two']= sanitize_text_field($_POST['portfolio_description_two']);
				$current_options['portfolio_image_two'] = sanitize_text_field($_POST['portfolio_image_two']);
				
				$current_options['portfolio_title_three'] = sanitize_text_field($_POST['portfolio_title_three']);
				$current_options['portfolio_description_three']= sanitize_text_field($_POST['portfolio_description_three']);
				$current_options['portfolio_image_three'] = sanitize_text_field($_POST['portfolio_image_three']);
				
				$current_options['portfolio_title_four'] = sanitize_text_field($_POST['portfolio_title_four']);
				$current_options['portfolio_description_four']= sanitize_text_field($_POST['portfolio_description_four']);
				$current_options['portfolio_image_four'] = sanitize_text_field($_POST['portfolio_image_four']);
				
				
				
				
				if(isset($_POST['portfolio_section_enabled']))
				{ echo $current_options['portfolio_section_enabled']=sanitize_text_field($_POST['portfolio_section_enabled']); } 
				else
				{ echo $current_options['portfolio_section_enabled']="off"; } 
				
				update_option('wallstreet_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_4'] == 2) 
		{
			$portfolio_image = WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio.jpg";
			$current_options['portfolio_section_enabled'] = 'on';
			
			$current_options['portfolio_title_one'] => __('Wall Street Style','wallstreet'),
			$current_options['portfolio_description_one'] => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			$current_options['portfolio_image_one'] => $portfolio_image,
			
			$current_options['portfolio_title_two'] => __('Wall Street Style','wallstreet'),
			$current_options['portfolio_description_two'] => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			$current_options['portfolio_image_two'] => $portfolio_image,
			
			$current_options['portfolio_title_three'] => __('Wall Street Style','wallstreet'),
			$current_options['portfolio_description_three'] => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			$current_options['portfolio_image_three'] => $portfolio_image,
			
			$current_options['portfolio_title_four'] => __('Wall Street Style','wallstreet'),
			$current_options['portfolio_description_four'] => __('A wonderful serenity has taken possession of my entire soul, like these sweet mornings.','wallstreet'),
			$current_options['portfolio_image_four'] => $portfolio_image,
			
			
			update_option('wallstreet_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_4">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Portfolio ','wallstreet');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_4_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_success" ><?php _e('Options data successfully Saved','wallstreet');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_reset" ><?php _e('Options data successfully reset','wallstreet');?></div>
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
			<h3><?php _e('Enable Portfolio Section :','wallstreet'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['portfolio_section_enabled']=='on') echo "checked='checked'"; ?> id="portfolio_section_enabled" name="portfolio_section_enabled" > <span class="explain"><?php _e('Enable portfolio section on home page(project section).','wallstreet'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Portfolio One Settings','wallstreet'); ?></h3>
		</div>	
		<div class="section">		
			<h3><?php _e('Portfolio Title One','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_one" id="portfolio_title_one" value="<?php if($current_options['portfolio_title_one']!='') { echo esc_attr($current_options['portfolio_title_one']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title One.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description One','wallstreet'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description_one" name="portfolio_description_one"><?php if($current_options['portfolio_description_one']!='') { echo esc_attr($current_options['portfolio_description_one']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description One .','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Image One','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_one']!='') { echo esc_attr($current_options['portfolio_image_one']); } ?>" id="portfolio_image_one" name="portfolio_image_one" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Two Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Title Two','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_two" id="portfolio_title_two" value="<?php if($current_options['portfolio_title_two']!='') { echo esc_attr($current_options['portfolio_title_two']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title Two.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description Two','wallstreet'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description_two" name="portfolio_description_two"><?php if($current_options['portfolio_description_two']!='') { echo esc_attr($current_options['portfolio_description_two']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description Two.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Image Two','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_two']!='') { echo esc_attr($current_options['portfolio_image_two']); } ?>" id="portfolio_image_two" name="portfolio_image_two" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Three Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Title Three','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_three" id="portfolio_title_three" value="<?php if($current_options['portfolio_title_three']!='') { echo esc_attr($current_options['portfolio_title_three']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title Three.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description Three','wallstreet'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description_three" name="portfolio_description_three"><?php if($current_options['portfolio_description_three']!='') { echo esc_attr($current_options['portfolio_description_three']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description Three.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Image Three','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_three']!='') { echo esc_attr($current_options['portfolio_image_three']); } ?>" id="portfolio_image_three" name="portfolio_image_three" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Four Settings','wallstreet'); ?></h3>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Title Four','wallstreet'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_title_four" id="portfolio_title_four" value="<?php if($current_options['portfolio_title_four']!='') { echo esc_attr($current_options['portfolio_title_four']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title Four.','wallstreet'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description Four','wallstreet'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_description_four" name="portfolio_description_four"><?php if($current_options['portfolio_description_four']!='') { echo esc_attr($current_options['portfolio_description_four']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description Four.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Image Four','wallstreet'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','wallstreet');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_image_four']!='') { echo esc_attr($current_options['portfolio_image_four']); } ?>" id="portfolio_image_four" name="portfolio_image_four" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_4" name="webriti_settings_save_4" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('4');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('4')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>