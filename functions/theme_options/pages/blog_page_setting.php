<div class="block ui-tabs-panel " id="option-ui-id-12" >	
	<?php $current_options = wp_parse_args(  get_option( 'corpbiz_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_12']))
	{	
		if($_POST['webriti_settings_save_12'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{
				
				//Meta section Enable or Disable
				if(isset($_POST['blog_meta_section_settings']))
				{ echo $current_options['blog_meta_section_settings']= "on"; } 
				else { echo $current_options['blog_meta_section_settings']="off"; }
				update_option('corpbiz_options', stripslashes_deep($current_options));
				
			}
		}	
		if($_POST['webriti_settings_save_12'] == 2) 
		{
			//Meta section Enable or Disable 
			$current_options['blog_meta_section_settings']= "on";
			update_option('corpbiz_options',$current_options);
		}
	} 
	?>
	<form method="post" id="webriti_theme_options_12">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Meta Settings','corpbiz');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_12_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_12_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_12_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('12');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('12')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Enable Meta on post:','corpbiz'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['blog_meta_section_settings']=='on') echo "checked='checked'"; ?> id="blog_meta_section_settings" name="blog_meta_section_settings" > <span class="explain"><?php _e('Enable Meta On page.','corpbiz'); ?></span>
			</p> <?php _e('If you only want to remove Author, Date and Category from the posts.','corpbiz'); ?></p>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_12" name="webriti_settings_save_12" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('12');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('12')" >
		</div>
		<div class="webriti_spacer"></div>
	</form>
</div>