<div class="block ui-tabs-panel deactive" id="option-ui-id-26" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_26']))
	{	
		if($_POST['webriti_settings_save_26'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else
			{
				$current_options['home_call_out_title'] = sanitize_text_field($_POST['home_call_out_title']);
				$current_options['home_call_out_description'] = sanitize_text_field($_POST['home_call_out_description']);
				$current_options['home_call_out_btn1_text'] = sanitize_text_field($_POST['home_call_out_btn1_text']);	
				$current_options['home_call_out_btn1_link']=  esc_url_raw($_POST['home_call_out_btn1_link']);
				$current_options['home_call_out_btn2_text'] = sanitize_text_field($_POST['home_call_out_btn2_text']);	
				$current_options['home_call_out_btn2_link']=   esc_url_raw($_POST['home_call_out_btn2_link']);
				// Call Out Area Button Link Target
				if(isset($_POST['home_call_out_btn1_link_target']))
				{ echo $current_options['home_call_out_btn1_link_target']="on"; } 
				else
				{ echo $current_options['home_call_out_btn1_link_target']="off"; } 
				
				if(isset($_POST['home_call_out_btn2_link_target']))
				{ echo $current_options['home_call_out_btn2_link_target']="on"; } 
				else
				{ echo $current_options['home_call_out_btn2_link_target']="off"; }
				// Call Out Area Enabled on Front Page
				if(isset($_POST['home_call_out_area_enabled']))
				{ echo $current_options['home_call_out_area_enabled']= "on"; } 
				else { echo $current_options['home_call_out_area_enabled']="off"; }
				
				update_option('appointment_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_26'] == 2) 
		{	
			$current_options['home_call_out_area_enabled'] = 'on';
			$current_options['home_call_out_title']=__('Want to say Hey or find out more?','appointment');
			$current_options['home_call_out_description']= __('Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat cupid non proidentse.','appointment');
			$current_options['home_call_out_btn1_text']= __('Purchase Now!','appointment');
			$current_options['home_call_out_btn1_link']="";	
			$current_options['home_call_out_btn1_link_target']= 'on';
			$current_options['home_call_out_btn2_text']= __('Get in touch!','appointment');
			$current_options['home_call_out_btn2_link']="";	
			$current_options['home_call_out_btn2_link_target']= 'on';			
			update_option('appointment_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_26">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Home top call out area','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_26_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_26_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_26_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('26');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('26')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable home Top Call Out Area Section :','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['home_call_out_area_enabled']=='on') echo "checked='checked'"; ?> id="home_call_out_area_enabled" name="home_call_out_area_enabled" > <span class="explain"><?php _e('Enable home top call out area on front page.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('home Top Call Out Title','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="home_call_out_title" id="home_call_out_title" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['home_call_out_title'])) { echo $current_options['home_call_out_title']; } ?>">
			<span class="explain"><?php _e('Enter the home top call out title.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('home Top Call Out Description','appointment'); ?></h3>
			<textarea rows="4" cols="8" id="home_call_out_description" name="home_call_out_description"><?php if($current_options['home_call_out_description']!='') { echo esc_attr($current_options['home_call_out_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the home top call out description.','appointment'); ?></span>
		</div>
		
		<div class="section">		
			<h3><?php _e('home Top Call Out Button Text','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="home_call_out_btn1_text" id="home_call_out_btn1_text" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['home_call_out_btn1_text'])) { echo $current_options['home_call_out_btn1_text']; } ?>">
			<span class="explain"><?php _e('Enter the home call out button text.','appointment'); ?></span>
		</div>

		<div class="section">	
		<h3><?php _e('home Top Call Out Button Link','appointment'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="home_call_out_btn1_link" id="home_call_out_btn1_link" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['home_call_out_btn1_link'])) { echo $current_options['home_call_out_btn1_link']; } ?>" >
			<span class="explain"><?php _e('Enter the home top call out button link.','appointment'); ?></span>
			<p><input type="checkbox" id="home_call_out_btn1_link_target" name="home_call_out_btn1_link_target" <?php if($current_options['home_call_out_btn1_link_target']=='on') echo "checked='checked'"; ?> > <?php _e('Open link in a new window/tab','appointment'); ?></p>
		</div>

		<div class="section">		
			<h3><?php _e('home Top Call Out Button Text','appointment'); ?></h3>
			<input class="webriti_inpute"  type="text" name="home_call_out_btn2_text" id="home_call_out_btn2_text" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['home_call_out_btn2_text'])) { echo $current_options['home_call_out_btn2_text']; } ?>">
			<span class="explain"><?php _e('Enter the home call out button text.','appointment'); ?></span>
		</div>

		<div class="section">	
		<h3><?php _e('home Top Call Out Button Link','appointment'); ?></h3>			
			<input class="webriti_inpute"  type="text" name="home_call_out_btn2_link" id="home_call_out_btn2_link" placeholder="Enter http://example.com"  value="<?php if(isset($current_options['home_call_out_btn2_link'])) { echo $current_options['home_call_out_btn2_link']; } ?>" >
			<span class="explain"><?php _e('Enter the home top call out button link.','appointment'); ?></span>
			<p><input type="checkbox" id="home_call_out_btn2_link_target" name="home_call_out_btn2_link_target" <?php if($current_options['home_call_out_btn2_link_target']=='on') echo "checked='checked'"; ?> > <?php _e('Open link in a new window/tab','appointment'); ?></p>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_26" name="webriti_settings_save_26" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('26');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('26')" >
		</div>
	</form>
</div>