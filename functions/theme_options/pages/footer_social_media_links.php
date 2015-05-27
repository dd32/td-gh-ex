<div class="block ui-tabs-panel deactive" id="option-ui-id-22" >	
	<?php $current_options = get_option('wallstreet_lite_options');
	if(isset($_POST['webriti_settings_save_22']))
	{	
		if($_POST['webriti_settings_save_22'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['social_media_twitter_link']=sanitize_text_field($_POST['social_media_twitter_link']);
				$current_options['social_media_facebook_link']=sanitize_text_field($_POST['social_media_facebook_link']);
				$current_options['social_media_googleplus_link']=sanitize_text_field($_POST['social_media_googleplus_link']);
				$current_options['social_media_linkedin_link']=sanitize_text_field($_POST['social_media_linkedin_link']);
				$current_options['social_media_youtube_link']=sanitize_text_field($_POST['social_media_youtube_link']);
				
				// social media in contact page yes ya on
				if(isset($_POST['header_social_media_enabled']))
				{ echo $current_options['header_social_media_enabled']= sanitize_text_field($_POST['header_social_media_enabled']); } 
				else { echo $current_options['header_social_media_enabled']="off"; }

				// social media in contact page yes ya on
				if(isset($_POST['footer_social_media_enabled']))
				{ echo $current_options['footer_social_media_enabled']= sanitize_text_field($_POST['footer_social_media_enabled']); } 
				else { echo $current_options['footer_social_media_enabled']="off"; } 
				
				update_option('wallstreet_lite_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_22'] == 2) 
		{
			$current_options['header_social_media_enabled']="on";
			$current_options['footer_social_media_enabled']="on";			
			$current_options['social_media_twitter_link']="#";
			$current_options['social_media_facebook_link']="#";
			$current_options['social_media_googleplus_link']="#";
			$current_options['social_media_linkedin_link']="#";
			$current_options['social_media_youtube_link']="#";		
			update_option('wallstreet_lite_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_22">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Social Media Links Settings','wallstreet');?></h2></td>
				<td><div class="webriti_settings_loding" id="webriti_loding_22_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_22_success" ><?php _e('Options data successfully Saved','wallstreet');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_22_reset" ><?php _e('Options data successfully reset','wallstreet');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('22');">
					<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('22')" >
				</td>
				</tr>
			</table>	
		</div>		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable social media links:','wallstreet'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['header_social_media_enabled']=='on') echo "checked='checked'"; ?> id="header_social_media_enabled" name="header_social_media_enabled" > <span class="explain"><?php _e('Enable social media links on header section.','wallstreet'); ?></span>
			<input type="checkbox" <?php if($current_options['footer_social_media_enabled']=='on') echo "checked='checked'"; ?> id="footer_social_media_enabled" name="footer_social_media_enabled" > <span class="explain"><?php _e('Enable social media links on footer section.','wallstreet'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Twitter Profile Link:','wallstreet');?></h3>
			<input class="webriti_inpute" placeholder="Enter http://twitter.com"  type="text" name="social_media_twitter_link" id="social_media_twitter_link" value="<?php if($current_options['social_media_twitter_link']!='') { echo esc_attr($current_options['social_media_twitter_link']); } ?>" >
			<span class="explain"><?php  _e('Enter twitter link.','wallstreet');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Facebook Profile Link:','wallstreet');?></h3>
			<input class="webriti_inpute"  placeholder="Enter http://facebook.com"  type="text" name="social_media_facebook_link" id="social_media_facebook_link" value="<?php if($current_options['social_media_facebook_link']!='') { echo esc_attr($current_options['social_media_facebook_link']); } ?>" >
			<span class="explain"><?php  _e('Enter facebook link.','wallstreet');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Google Plus Profile Link:','wallstreet');?></h3>
			<input class="webriti_inpute" placeholder="Enter http://google.com"  type="text" name="social_media_googleplus_link" id="social_media_googleplus_link" value="<?php if($current_options['social_media_googleplus_link']!='') { echo esc_attr($current_options['social_media_googleplus_link']); } ?>" >
			<span class="explain"><?php  _e('Enter google plus link.','wallstreet');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Linkedin Profile Link:','wallstreet');?></h3>
			<input class="webriti_inpute" placeholder="Enter http://linkedin.com"  type="text" name="social_media_linkedin_link" id="social_media_linkedin_link" value="<?php if($current_options['social_media_linkedin_link']!='') { echo esc_attr($current_options['social_media_linkedin_link']); } ?>" >
			<span class="explain"><?php  _e('Enter linkedin link.','wallstreet');?></span>
		</div>
		<div class="section">
			<h3><?php _e('Youtube Profile Link:','wallstreet');?></h3>
			<input class="webriti_inpute" placeholder="Enter http://youtube.com"  type="text" name="social_media_youtube_link" id="social_media_youtube_link" value="<?php if($current_options['social_media_youtube_link']!='') { echo esc_attr($current_options['social_media_youtube_link']); } ?>" >
			<span class="explain"><?php  _e('Enter youtube profile link.','wallstreet');?></span>
		</div>

		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_22" name="webriti_settings_save_22" />
			<input class="reset-button btn" type="button" name="reset" value="<?php _e('Restore Defaults','wallstreet');?>" onclick="webriti_option_data_reset('22');">
			<input class="btn btn-primary" type="button" value="<?php _e('Save Options','wallstreet');?>" onclick="webriti_option_data_save('22')" >
		</div>
	</form>
</div>