<div class="block ui-tabs-panel deactive" id="option-ui-id-3" >	
	<?php $current_options = get_option('corpbiz_options');
	if(isset($_POST['webriti_settings_save_3']))
	{	
		if($_POST['webriti_settings_save_3'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				
				$current_options['site_title_one']=sanitize_text_field($_POST['site_title_one']);
				$current_options['site_title_two']=sanitize_text_field($_POST['site_title_two']);
				$current_options['site_description']=sanitize_text_field($_POST['site_description']);
				$current_options['siteinfo_button_one_text']=sanitize_text_field($_POST['siteinfo_button_one_text']);
				$current_options['siteinfo_button_two_text']=sanitize_text_field($_POST['siteinfo_button_two_text']);
				
				update_option('corpbiz_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_3'] == 2) 
		{
			$current_options['site_title_one']='40+';
			$current_options['site_title_two']='Sample Pages';
			$current_options['site_description']='Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam scelerisque faucibus risus non iaculis. Fusce a augue ante, pellentesque pretium erat. Fusce in turpis in velit tempor pretium. Integer a leo libero';
			$current_options['siteinfo_button_one_text']='Buy it now';
			$current_options['siteinfo_button_two_text']='View Portfolio';			
			update_option('corpbiz_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_3">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Site Info settings','corpbiz');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_3_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_3_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
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
			<h3><?php _e('Site Info title one','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="site_title_one" id="site_title_one" value="<?php echo $current_options['site_title_one']; ?>" >
			<span class="explain"><?php _e('Enter the Site Info title.','corpbiz'); ?></span>
		</div>
		<div class="section">			
			<h3><?php _e('Site Info title Two','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="site_title_two" id="site_title_two" value="<?php echo $current_options['site_title_two']; ?>" >
			<span class="explain"><?php _e('Enter the Site Info title.','corpbiz'); ?></span>
		</div>
		<div class="section">	
		<h3><?php _e('Site Info Description','corpbiz'); ?></h3>
			<textarea rows="3" cols="8" id="site_description" name="site_description"><?php if($current_options['site_description']!='') { echo esc_attr($current_options['site_description']); } ?></textarea>
			<span class="explain"><?php _e('Enter the Site info description.','corpbiz'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Label one Text','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="siteinfo_button_one_text" id="siteinfo_button_one_text" value="<?php echo $current_options['siteinfo_button_one_text']; ?>" >
			<span class="explain"><?php _e('Enter the Site Info text.','corpbiz'); ?></span>
			
			<h3><?php _e('Label one Link','corpbiz'); ?></h3>
			<span class="explain"><?php _e('To Add Link Upgrade to Pro','corpbiz'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Label two Text','corpbiz'); ?></h3>
			<input class="webriti_inpute"  type="text" name="siteinfo_button_two_text" id="siteinfo_button_two_text" value="<?php echo $current_options['siteinfo_button_two_text']; ?>" >
			<span class="explain"><?php _e('Enter the Site Info text.','corpbiz'); ?></span>
			
			<h3><?php _e('Label Two Link','corpbiz'); ?></h3>
			<span class="explain"><?php _e('To Add Link Upgrade to Pro','corpbiz'); ?></span>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_3" name="webriti_settings_save_3" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('3');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('3')" >
		</div>
	</form>
</div>