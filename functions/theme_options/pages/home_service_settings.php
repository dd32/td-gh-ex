<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_3']))
	{	
		if($_POST['webriti_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{   printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else  
			{
			$current_options['service_title']=sanitize_text_field($_POST['service_title']);
			$current_options['service_description']=sanitize_text_field($_POST['service_description']);
			
			$current_options['service_one_title'] = sanitize_text_field($_POST['service_one_title']);
			$current_options['service_one_description'] = sanitize_text_field($_POST['service_one_description']);
			$current_options['service_one_icon'] = sanitize_text_field($_POST['service_one_icon']);
			
			$current_options['service_two_title'] = sanitize_text_field($_POST['service_two_title']);
			$current_options['service_two_description'] = sanitize_text_field($_POST['service_two_description']);
			$current_options['service_two_icon'] = sanitize_text_field($_POST['service_two_icon']);
			
			$current_options['service_three_title'] = sanitize_text_field($_POST['service_three_title']);
			$current_options['service_three_description'] = sanitize_text_field($_POST['service_three_description']);
			$current_options['service_three_icon'] = sanitize_text_field($_POST['service_three_icon']);
			
			$current_options['service_four_title'] = sanitize_text_field($_POST['service_four_title']);
			$current_options['service_four_description'] = sanitize_text_field($_POST['service_four_description']);
			$current_options['service_four_icon'] = sanitize_text_field($_POST['service_four_icon']);
			
			$current_options['service_five_title'] = sanitize_text_field($_POST['service_five_title']);
			$current_options['service_five_description'] = sanitize_text_field($_POST['service_five_description']);
			$current_options['service_five_icon'] = sanitize_text_field($_POST['service_five_icon']);
			
			$current_options['service_six_title'] = sanitize_text_field($_POST['service_six_title']);
			$current_options['service_six_description'] = sanitize_text_field($_POST['service_six_description']);
			$current_options['service_six_icon'] = sanitize_text_field($_POST['service_six_icon']);
			
			// service section enabled yes ya on
			if(isset($_POST['service_section_enabled']))
			{ echo $current_options['service_section_enabled']="on"; } 
			else { echo $current_options['service_section_enabled']="off"; } 
				
			update_option('appointment_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_3'] == 2) 
		{
			// Other Service Section in Service Template
			$current_options['service_section_enabled']="on";
			
			$current_options['service_title']=__('Why Choose Us', 'appointment');	
			$current_options['service_description']=__('We Work with New Customers anad Grow Their Businesses..', 'appointment');
			
			$current_options['service_one_title'] = __('Easy to Use', 'appointment');
			$current_options['service_one_description'] = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst', 'appointment');
			$current_options['service_one_icon'] = 'fa fa-bell-o';
			
			$current_options['service_two_title'] = __('Responsive Design', 'appointment');
			$current_options['service_two_description'] = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'appointment');
			$current_options['service_two_icon'] = 'fa fa-mobile';
			
			$current_options['service_three_title'] = __('Very Flexible', 'appointment');
			$current_options['service_three_description'] = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'appointment');
			$current_options['service_three_icon'] = 'fa fa-laptop';
			
			$current_options['service_four_title'] = __('Well Support', 'appointment');
			$current_options['service_four_description'] = __('Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet ferment etiam porta sem malesuada magna mollis.', 'appointment');
			$current_options['service_four_icon'] = 'fa fa-support';
			
			$current_options['service_five_title'] = __('Clean Code', 'appointment');
			$current_options['service_five_description'] = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'appointment');
			$current_options['service_five_icon'] = 'fa fa-code';
			
			$current_options['service_six_title'] = __('Customizable', 'appointment');
			$current_options['service_six_description'] = __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.', 'appointment');
			$current_options['service_six_icon'] = 'fa fa-cog';
			
			update_option('appointment_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_3">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Service Settings','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_3_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Home Service Section','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['service_section_enabled']=='on') echo "checked='checked'"; ?> id="service_section_enabled" name="service_section_enabled">
			<span class="explain"><?php _e('Enable service on front page.','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service section Heading on Home page','appointment');?></h3>
			<input class="webriti_inpute"  type="text" name="service_title" id="service_title" value="<?php if($current_options['service_title']!='') { echo esc_attr($current_options['service_title']); } ?>" >		
			<span class="explain"><?php  _e('Enter Service Heading for Service Section.','appointment');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Service section Description on Home page','appointment');?></h3>
			<textarea rows="3" cols="8" id="service_description" name="service_description"><?php if($current_options['service_description']!='') { echo esc_attr($current_options['service_description']); } ?></textarea>		
			<span class="explain"><?php  _e('Enter Service Description for Service Section.','appointment');?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Service One Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon One ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_one_icon" id="service_one_icon" value="<?php echo $current_options['service_one_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Service One Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_one_title" id="service_one_title" value="<?php if($current_options['service_one_title']!='') { echo esc_attr($current_options['service_one_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service one title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service one Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_one_description" name="service_one_description"><?php if($current_options['service_one_description']!='') { echo esc_attr($current_options['service_one_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service one description.','appointment'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Service Two Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon Two ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_two_icon" id="service_two_icon" value="<?php echo $current_options['service_two_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
			 
		</div>
		<div class="section">
			<h3><?php _e('Service Two Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_two_title" id="service_two_title" value="<?php if($current_options['service_two_title']!='') { echo esc_attr($current_options['service_two_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service two title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Two Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_two_description" name="service_two_description"><?php if($current_options['service_two_description']!='') { echo esc_attr($current_options['service_two_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service two description.','appointment'); ?></span>
		</div>
		<div class="section">		
			<h3><?php _e('Service Three Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon Three ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_three_icon" id="service_three_icon" value="<?php echo $current_options['service_three_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Three Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_three_title" id="service_three_title" value="<?php if($current_options['service_three_title']!='') { echo esc_attr($current_options['service_three_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service three title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Three Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_three_description" name="service_three_description"><?php if($current_options['service_three_description']!='') { echo esc_attr($current_options['service_three_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service three description.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Service Four Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon Four ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_four_icon" id="service_four_icon" value="<?php echo $current_options['service_four_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Four Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_four_title" id="service_four_title" value="<?php if($current_options['service_four_title']!='') { echo esc_attr($current_options['service_four_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service Four title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Four Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_four_description" name="service_four_description"><?php if($current_options['service_four_description']!='') { echo esc_attr($current_options['service_four_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service Four description.','appointment'); ?></span>
		</div>
		
		
		<div class="section">		
			<h3><?php _e('Service Five Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon Five ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_five_icon" id="service_five_icon" value="<?php echo $current_options['service_five_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
		</div>
		<div class="section">
			<h3><?php _e('Service FIve Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_five_title" id="service_five_title" value="<?php if($current_options['service_five_title']!='') { echo esc_attr($current_options['service_five_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service five title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Five Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_five_description" name="service_five_description"><?php if($current_options['service_five_description']!='') { echo esc_attr($current_options['service_five_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service five description.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('Service Six Settings','appointment'); ?></h3>
		</div>
		<div class="section">	
		<h3><?php _e('Service Icon Six ','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_six_icon" id="service_six_icon" value="<?php echo $current_options['service_six_icon']; ?>" >
			<span class="explain"><?php _e('Enter the service icon. like : fa-rub','appointment'); ?></span><span></span> &nbsp <span><a href="http://fontawesome.io/icons/" target="_blank"> <?php _e('Get your fontawesome icons.','appointment') ?></a></span>
		</div>
		<div class="section">
			<h3><?php _e('Service Six Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="service_six_title" id="service_six_title" value="<?php if($current_options['service_six_title']!='') { echo esc_attr($current_options['service_six_title']); } ?>" >
			<span class="explain"><?php _e('Enter the service Six title.','appointment'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Service Six Description','appointment'); ?></h3>
			<textarea rows="3" cols="8" id="service_six_description" name="service_six_description"><?php if($current_options['service_six_description']!='') { echo esc_attr($current_options['service_six_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the service six description.','appointment'); ?></span>
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_3" name="webriti_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
		</div>
	</form>
</div>