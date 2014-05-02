<div class="block ui-tabs-panel deactive" id="option-ui-id-15" >	
	<?php $current_options = get_option('quality_pro_options');
	if(isset($_POST['webriti_settings_save_15']))
	{	
		if($_POST['webriti_settings_save_15'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{		
				$current_options['home_blog']=sanitize_text_field($_POST['home_blog']);
				$current_options['home_testimonial_title']= sanitize_text_field($_POST['home_testimonial_title']);
				$current_options['home_testimonial_desciption']= sanitize_text_field($_POST['home_testimonial_desciption']);				
				$current_options['head_one_team']= sanitize_text_field($_POST['head_one_team']);
				$current_options['head_two_team']= sanitize_text_field($_POST['head_two_team']);
				
				update_option('quality_pro_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_15'] == 2) 
		{	
			$current_options['home_blog']='Latest From Blog';			
			$current_options['home_testimonial_title']= 'What Our Client Say';
			$current_options['home_testimonial_desciption']= 'Here is the best part of our impressive services';			
			$current_options['head_one_team']= 'Meet Our';
			$current_options['head_two_team']= 'Great Team';
				
			update_option('quality_pro_options',$current_options);
		}
	}  ?>
	<form method="post" id="webriti_theme_options_15">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Section Headings','quality');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_15_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_success" ><?php _e('Options data successfully Saved','quality');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_15_reset" ><?php _e('Options data successfully reset','quality');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		
		<div class="section">
			<h3><?php _e('Home Page Blog Section Heading','quality');?></h3>
			<input class="webriti_inpute"  type="text" name="home_blog" id="home_blog" value="<?php if($current_options['home_blog']!='') { echo esc_attr($current_options['home_blog']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for blog Section.','quality');?></span>
		</div>
		
		<div class="section">
			<h3><?php _e('Home Page Testimonials Heading','quality');?></h3>
			<input class="webriti_inpute"  type="text" name="home_testimonial_title" id="home_testimonial_title" value="<?php if($current_options['home_testimonial_title']!='') { echo esc_attr($current_options['home_testimonial_title']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for Testimonials Section.','quality');?></span>
			<h3><?php _e('Home Page Testimonials Description','quality');?></h3>
			<input class="webriti_inpute"  type="text" name="home_testimonial_desciption" id="home_testimonial_desciption" value="<?php if($current_options['home_testimonial_desciption']!='') { echo esc_attr($current_options['home_testimonial_desciption']); } ?>" >		
				<span class="explain"><?php  _e('Enter Heading for Testimonials Section.','quality');?></span>
		</div>		
		
		<div class="section">
			<h3><?php _e('About Us Page Team Heading One','quality');?></h3>
			<input class="webriti_inpute"  type="text" name="head_one_team" id="head_one_team" value="<?php if($current_options['head_one_team']!='') { echo esc_attr($current_options['head_one_team']); } ?>" >		
				<span class="explain"><?php  _e('Enter Team Heading One for ABOUT US Page.','quality');?></span>
		</div>
		<div class="section">
			<h3><?php _e('About Us Page Team Heading Two','quality');?></h3>
			<input class="webriti_inpute"  type="text" name="head_two_team" id="head_two_team" value="<?php if($current_options['head_two_team']!='') { echo esc_attr($current_options['head_two_team']); } ?>" >		
				<span class="explain"><?php  _e('Enter Team Heading Two for ABOUT US Page.','quality');?></span>
		</div>			
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_15" name="webriti_settings_save_15" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('15');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('15')" >
		</div>
	</form>
</div>