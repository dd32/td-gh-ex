<div class="block ui-tabs-panel" id="option-ui-id-23" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_23']))
	{	
		if($_POST['webriti_settings_save_23'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else  
			{		
				$current_options['footer_copyright_text']=wp_kses_post(balanceTags($_POST['footer_copyright_text'],true));
				
				$current_options['footer_social_media_facebook_link']=esc_url_raw($_POST['footer_social_media_facebook_link']);
				$current_options['footer_social_media_twitter_link']=esc_url_raw($_POST['footer_social_media_twitter_link']);
				$current_options['footer_social_media_googleplus_link']=esc_url_raw($_POST['footer_social_media_googleplus_link']);
				$current_options['footer_social_media_linkedin_link']=esc_url_raw($_POST['footer_social_media_linkedin_link']);
				$current_options['footer_social_media_skype_link']=esc_url_raw($_POST['footer_social_media_skype_link']);
				
				if(isset($_POST['footer_social_media_enabled']))
				{ echo $current_options['footer_social_media_enabled']="on"; } 
				else { echo $current_options['footer_social_media_enabled']="off"; }
				
				// facebook media open in new tab
				if(isset($_POST['footer_facebook_media_enabled']))
				{ echo $current_options['footer_facebook_media_enabled']="on"; } 
				else { echo $current_options['footer_facebook_media_enabled']="off"; }
				// twitter media open in new tab
				if(isset($_POST['footer_twitter_media_enabled']))
				{ echo $current_options['footer_twitter_media_enabled']= "on"; } 
				else { echo $current_options['footer_twitter_media_enabled']="off"; }
				// googleplus media open in new tab
				if(isset($_POST['footer_googleplus_media_enabled']))
				{ echo $current_options['footer_googleplus_media_enabled']= "on"; } 
				else { echo $current_options['footer_googleplus_media_enabled']="off"; }
				// linkedin media open in new tab
				if(isset($_POST['footer_linkedin_media_enabled']))
				{ echo $current_options['footer_linkedin_media_enabled']= "on"; } 
				else { echo $current_options['footer_linkedin_media_enabled']="off"; }
				// skype media open in new tab
				if(isset($_POST['footer_skype_media_enabled']))
				{ echo $current_options['footer_skype_media_enabled']= "on"; } 
				else { echo $current_options['footer_skype_media_enabled']="off"; }
				
				
				
				update_option('appointment_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_23'] == 2) 
		{
			$current_options['footer_menu_bar_enabled'] = 'on';
			$current_options['footer_copyright_text']= __('<p>Copyright 2014 appointment <a href="#">WordPress Theme</a>. All rights reserved</p>','appointment');
			$current_options['footer_social_media_enabled']="on";
			$current_options['footer_facebook_media_enabled']="on";
			$current_options['footer_twitter_media_enabled']="on";
			$current_options['footer_googleplus_media_enabled']="on";
			$current_options['footer_linkedin_media_enabled']="on";
			$current_options['footer_skype_media_enabled']="on";
			
			$current_options['footer_social_media_facebook_link']="#";
			$current_options['footer_social_media_twitter_link']="#";
			$current_options['footer_social_media_googleplus_link']="#";
			$current_options['footer_social_media_linkedin_link']="#";
			$current_options['footer_social_media_skype_link']="#";
			
			update_option('appointment_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_23">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Footer customization','appointment');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_23_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_23_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_23_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				
				<td style="text-align:right;">
                                        <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('23');">
                                        <input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('23')" >
                 </td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
				
		<div class="section">		
			<h3><?php _e('Footer Customization text','appointment'); ?></h3>
			<textarea rows="10" cols="50" class="webriti_inpute" name="footer_copyright_text" id="footer_copyright_text" ><?php if(isset($current_options['footer_copyright_text'])) 
			{ esc_attr_e($current_options['footer_copyright_text']); } ?> </textarea>
			<span class="explain"><?php  _e('Enter the Footer Customization text','appointment');?></span>
		</div>
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Footer Social Link Setting','appointment');?></h2></td></tr>
			</table>	
	  </div>
		<div class="section">
			<h3><?php _e('Enable Social Media Links on footer:','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['footer_social_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_social_media_enabled" name="footer_social_media_enabled" > <span class="explain"><?php _e('Enable social media links on Footer section.','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Facebook Profile Link:','appointment');?></h3>
			<input placeholder="Enter http://facebook.com"  type="text" name="footer_social_media_facebook_link" id="footer_social_media_facebook_link" value="<?php if($current_options['footer_social_media_facebook_link']!='') { echo esc_attr($current_options['footer_social_media_facebook_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['footer_facebook_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_facebook_media_enabled" name="footer_facebook_media_enabled" > <span class="explain"><?php _e('Open facebook media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Profile Link:','appointment');?></h3>
			<input  placeholder="Enter http://twitter.com"  type="text" name="footer_social_media_twitter_link" id="footer_social_media_twitter_link" value="<?php if($current_options['footer_social_media_twitter_link']!='') { echo esc_attr($current_options['footer_social_media_twitter_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['footer_twitter_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_twitter_media_enabled" name="footer_twitter_media_enabled" > <span class="explain"><?php _e('Open twitter media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Google Plus Profile Link:','appointment');?></h3>
			<input placeholder="Enter http://google.com"  type="text" name="footer_social_media_googleplus_link" id="footer_social_media_googleplus_link" value="<?php if($current_options['footer_social_media_googleplus_link']!='') { echo esc_attr($current_options['footer_social_media_googleplus_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['footer_googleplus_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_googleplus_media_enabled" name="footer_googleplus_media_enabled" > <span class="explain"><?php _e('Open googleplus media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Linkedin Profile Link:','appointment');?></h3>
			<input  placeholder="Enter http://linkedin.com"  type="text" name="footer_social_media_linkedin_link" id="footer_social_media_linkedin_link" value="<?php if($current_options['footer_social_media_linkedin_link']!='') { echo esc_attr($current_options['footer_social_media_linkedin_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['footer_linkedin_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_linkedin_media_enabled" name="footer_linkedin_media_enabled" > <span class="explain"><?php _e('Open linkedin media link in new tab/window','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Skype Profile Link:','appointment');?></h3>
			<input  placeholder="Enter http://skype.com"  type="text" name="footer_social_media_skype_link" id="footer_social_media_skype_link" value="<?php if($current_options['footer_social_media_skype_link']!='') { echo esc_attr($current_options['footer_social_media_skype_link']); } ?>" >
			<input type="checkbox" <?php if($current_options['footer_skype_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_skype_media_enabled" name="footer_skype_media_enabled" > <span class="explain"><?php _e('Open skype media link in new tab/window','appointment'); ?></span>
		</div>
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_23" name="webriti_settings_save_23" />
			 <input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('23');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('23')" >
		</div>
	</form>
</div>