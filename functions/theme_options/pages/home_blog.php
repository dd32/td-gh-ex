<div class="block ui-tabs-panel deactive" id="option-ui-id-5" >	
	<?php $current_options = get_option('wallstreet_lite_options');
	if(isset($_POST['webriti_settings_save_5']))
	{	
		if($_POST['webriti_settings_save_5'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{				
				// Home blog section enable & disable
				if(isset($_POST['blog_section_enabled']))
				{ echo $current_options['blog_section_enabled']= sanitize_text_field($_POST['blog_section_enabled']); } 
				else { echo $current_options['blog_section_enabled']="off"; }
				
				update_option('wallstreet_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_5'] == 2) 
		{
			
			$current_options['blog_section_enabled']= 'on';
			update_option('wallstreet_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_5">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Home blog Settings','wallstreet');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_5_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_success" ><?php _e('Options data successfully Saved','wallstreet');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_reset" ><?php _e('Options data successfully reset','wallstreet');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('5');">
					<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('5')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Home Blog Section','wallstreet'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['blog_section_enabled']=='on') echo "checked='checked'"; ?> id="blog_section_enabled" name="blog_section_enabled" >
			<span class="explain"><?php _e('Enable Home blog Section on front page.','wallstreet'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_5" name="webriti_settings_save_5" />
			<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('5');">
			<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('5')" >
		</div>
	</form>
</div>