<div class="block ui-tabs-panel" id="option-ui-id-22" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_22']))
	{	
		if($_POST['webriti_settings_save_22'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else  
			{
				$current_options['social_media_facebook_link']=esc_url_raw($_POST['social_media_facebook_link']);
				$current_options['social_media_twitter_link']=esc_url_raw($_POST['social_media_twitter_link']);
				$current_options['social_media_linkedin_link']=esc_url_raw($_POST['social_media_linkedin_link']);
				// social media on header section in front page
				if(isset($_POST['header_social_media_enabled']))
				{ echo $current_options['header_social_media_enabled']="on"; } 
				else { echo $current_options['header_social_media_enabled']="off"; }
				
				// facebook media open in new tab
				if(isset($_POST['facebook_media_enabled']))
				{ echo $current_options['facebook_media_enabled']="on"; } 
				else { echo $current_options['facebook_media_enabled']="off"; }
				// twitter media open in new tab
				if(isset($_POST['twitter_media_enabled']))
				{ echo $current_options['twitter_media_enabled']= "on"; } 
				else { echo $current_options['twitter_media_enabled']="off"; }
				// linkedin media open in new tab
				if(isset($_POST['linkedin_media_enabled']))
				{ echo $current_options['linkedin_media_enabled']= "on"; } 
				else { echo $current_options['linkedin_media_enabled']="off"; }
				
				//Meta section Enable or Disable
				if(isset($_POST['meta_section_settings']))
				{ echo $current_options['meta_section_settings']= "on"; } 
				else { echo $current_options['meta_section_settings']="off"; }
				
				update_option('appointment_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_22'] == 2) 
		{	
			
			// social media on header section
			$current_options['header_social_media_enabled']="on";
			$current_options['facebook_media_enabled']="on";
			$current_options['twitter_media_enabled']="on";
			$current_options['linkedin_media_enabled']="on";
			
			$current_options['social_media_facebook_link']="#";
			$current_options['social_media_twitter_link']="#";
			$current_options['social_media_linkedin_link']="#";

			//Meta section Enable or Disable 
			$current_options['meta_section_settings']= 'on';
			
			update_option('appointment_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_22">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Social Media & Meta tag settings','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_22_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_22_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_22_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				
				<td style="text-align:right;">
                                        <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('22');">
                                        <input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('22')" >
                 </td>
				
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
	<div class="section">
			<h3><?php _e('Enable Social Media Links on Header:','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['header_social_media_enabled']=='on') echo "checked='checked'"; ?> id="header_social_media_enabled" name="header_social_media_enabled" > <span class="explain"><?php _e('Enable social media links on header section.','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Facebook Profile Link:','appointment');?></h3>
			<input  placeholder="Enter http://facebook.com"  type="text" name="social_media_facebook_link" id="social_media_facebook_link" value="<?php if($current_options['social_media_facebook_link']!='') { echo esc_attr($current_options['social_media_facebook_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['facebook_media_enabled']=='on') echo "checked='checked'"; ?> id="facebook_media_enabled" name="facebook_media_enabled" > <span class="explain"><?php _e('Open facebook media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Profile Link:','appointment');?></h3>
			<input placeholder="Enter http://twitter.com"  type="text" name="social_media_twitter_link" id="social_media_twitter_link" value="<?php if($current_options['social_media_twitter_link']!='') { echo esc_attr($current_options['social_media_twitter_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['twitter_media_enabled']=='on') echo "checked='checked'"; ?> id="twitter_media_enabled" name="twitter_media_enabled" > <span class="explain"><?php _e('Open twitter media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Linkedin Profile Link:','appointment');?></h3>
			<input placeholder="Enter http://linkedin.com"  type="text" name="social_media_linkedin_link" id="social_media_linkedin_link" value="<?php if($current_options['social_media_linkedin_link']!='') { echo esc_attr($current_options['social_media_linkedin_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['linkedin_media_enabled']=='on') echo "checked='checked'"; ?> id="linkedin_media_enabled" name="linkedin_media_enabled" > <span class="explain"><?php _e('Open linkedin media link in new tab/window','appointment'); ?></span>
		</div>
		
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Meta setting','appointment');?></h2></td></tr>
			</table>	
		</div>
		<div class="section">
			<h3><?php _e('Enable Meta or page:','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['meta_section_settings']=='on') echo "checked='checked'"; ?> id="meta_section_settings" name="meta_section_settings" > <span class="explain"><?php _e('Enable Meta On page.','appointment'); ?></span>
			</p> <?php _e('If you only want to remove Author, Date and Category from the posts.','appointment'); ?></p>
	</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_22" name="webriti_settings_save_22" />
			 <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('22');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('22')" >
		</div>
		
	</form>
</div>