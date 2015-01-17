<div class="block ui-tabs-panel deactive" id="option-ui-id-4" >	
	<?php $current_options = get_option('elegance_lite_options');
	if(isset($_POST['webriti_settings_save_4']))
	{	
		if($_POST['webriti_settings_save_4'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				$current_options['front_portfolio_title'] = sanitize_text_field($_POST['front_portfolio_title']);
				$current_options['front_portfolio_description']= sanitize_text_field($_POST['front_portfolio_description']);
				
				
				//portfolio one setting
				$current_options['portfolio_one_title'] = sanitize_text_field($_POST['portfolio_one_title']);
				$current_options['portfolio_one_description']= sanitize_text_field($_POST['portfolio_one_description']);
				$current_options['portfolio_one_image'] = sanitize_text_field($_POST['portfolio_one_image']);
				//portfolio two setting
				$current_options['portfolio_two_title'] = sanitize_text_field($_POST['portfolio_two_title']);
				$current_options['portfolio_two_description']= sanitize_text_field($_POST['portfolio_two_description']);
				$current_options['portfolio_two_image'] = sanitize_text_field($_POST['portfolio_two_image']);
				//portfolio three setting
				$current_options['portfolio_three_title'] = sanitize_text_field($_POST['portfolio_three_title']);
				$current_options['portfolio_three_description']= sanitize_text_field($_POST['portfolio_three_description']);
				$current_options['portfolio_three_image'] = sanitize_text_field($_POST['portfolio_three_image']);
				
				// portfolio section enabled yes ya on
				if(isset($_POST['portfolio_section_enabled']))
				{ echo $current_options['portfolio_section_enabled']= "on"; } 
				else { echo $current_options['portfolio_section_enabled']="off"; } 
			
				update_option('elegance_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_4'] == 2) 
		{
			$portfolio_image = WEBRITI_TEMPLATE_DIR_URI . "/images/portfolio.jpg";
			$current_options['portfolio_section_enabled']="on";
			$current_options['front_portfolio_title'] = __('Latest Projects','elegance');
			$current_options['front_portfolio_description'] = __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...', 'elegance');
			
			//portfolio one setting
			$current_options['portfolio_one_title'] = __('Business Growth', 'elegance');
			$current_options['portfolio_one_description']= __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...', 'elegance');
			$current_options['portfolio_one_image'] = $portfolio_image;
			//portfolio two setting
			$current_options['portfolio_two_title'] = __('Functional Beauty', 'elegance');
			$current_options['portfolio_two_description']= __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...', 'elegance');
			$current_options['portfolio_two_image'] = $portfolio_image;
			//portfolio three setting
			$current_options['portfolio_three_title'] = __('Planning Around', 'elegance');
			$current_options['portfolio_three_description']= __('Morbi leo risus, porta ac consectetur vestibulum eros cras mattis consectetur purus sit...', 'elegance');
			$current_options['portfolio_three_image'] = $portfolio_image;
			update_option('elegance_lite_options',$current_options);
		}
	} 
	?>
	<form method="post" id="webriti_theme_options_4">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Portfolio ','elegance');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_4_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_success" ><?php _e('Options data successfully Saved','elegance');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_4_reset" ><?php _e('Options data successfully reset','elegance');?></div>
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
			<h3><?php _e('Enable Home Portfolio Section','elegance'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['portfolio_section_enabled']=='on') echo "checked='checked'"; ?> id="portfolio_section_enabled" name="portfolio_section_enabled">
			<span class="explain"><?php _e('Enable portfolio on front page.','elegance'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Portfolio Title','elegance'); ?></h3>
			<input class="webriti_inpute"  type="text" name="front_portfolio_title" id="front_portfolio_title" value="<?php echo $current_options['front_portfolio_title']; ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Title.','elegance'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Description','elegance'); ?></h3>			
			<textarea rows="3" cols="8" id="front_portfolio_description" name="front_portfolio_description"><?php if($current_options['front_portfolio_description']!='') { echo esc_attr($current_options['front_portfolio_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Description.','elegance'); ?></span>
		</div>
		
		
		<!--- Portfolio One Setting --->
		<div class="section">		
			<h3><?php _e('Portfolio One Settings','elegance'); ?></h3>
		</div>	
		<div class="section">		
			<h3><?php _e('Portfolio One Title','elegance'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_one_title" id="portfolio_one_title" value="<?php if($current_options['portfolio_one_title']!='') { echo esc_attr($current_options['portfolio_one_title']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio One Title.','elegance'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio One Description','elegance'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_one_description" name="portfolio_one_description"><?php if($current_options['portfolio_one_description']!='') { echo esc_attr($current_options['portfolio_one_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio One Description.','elegance'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio One Image','elegance'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','elegance');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_one_image']!='') { echo esc_attr($current_options['portfolio_one_image']); } ?>" id="portfolio_one_image" name="portfolio_one_image" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<!--- Portfolio Two Setting --->
		<div class="section">		
			<h3><?php _e('Portfolio Two Settings','elegance'); ?></h3>
		</div>	
		<div class="section">		
			<h3><?php _e('Portfolio Two Title','elegance'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_two_title" id="portfolio_two_title" value="<?php if($current_options['portfolio_two_title']!='') { echo esc_attr($current_options['portfolio_two_title']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Two Title.','elegance'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Two Description','elegance'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_two_description" name="portfolio_two_description"><?php if($current_options['portfolio_two_description']!='') { echo esc_attr($current_options['portfolio_two_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Two Description.','elegance'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Two Image','elegance'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','elegance');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_two_image']!='') { echo esc_attr($current_options['portfolio_two_image']); } ?>" id="portfolio_two_image" name="portfolio_two_image" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Upload Image" class="upload_image_button" />
		</div>
		<!--- Portfolio Three Setting --->
		<div class="section">		
			<h3><?php _e('Portfolio Three Settings','elegance'); ?></h3>
		</div>	
		<div class="section">		
			<h3><?php _e('Portfolio Three Title','elegance'); ?></h3>
			<input class="webriti_inpute"  type="text" name="portfolio_three_title" id="portfolio_three_title" value="<?php if($current_options['portfolio_three_title']!='') { echo esc_attr($current_options['portfolio_three_title']); } ?>" >
			<span class="explain"><?php _e('Enter the Portfolio Three Title.','elegance'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Portfolio Three Description','elegance'); ?></h3>			
			<textarea rows="3" cols="8" id="portfolio_three_description" name="portfolio_three_description"><?php if($current_options['portfolio_three_description']!='') { echo esc_attr($current_options['portfolio_three_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Portfolio Three Description.','elegance'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Portfolio Three Image','elegance'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add a image with size of 250 X 250 px. ','elegance');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['portfolio_three_image']!='') { echo esc_attr($current_options['portfolio_three_image']); } ?>" id="portfolio_three_image" name="portfolio_three_image" size="36" class="upload has-file"/>
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