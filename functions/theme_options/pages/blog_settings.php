<div class="block ui-tabs-panel deactive" id="option-ui-id-5" >	
	<?php $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), theme_data_setup() );
	if(isset($_POST['webriti_settings_save_5']))
	{	
		if($_POST['webriti_settings_save_5'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  printf (__('Sorry, your nonce did not verify.','appointment'));	exit; }
			else  
			{
			
				$i=0;
				$val=($_POST['blog_selected_category_id']);
				foreach($val as $value)
				{
					$arr[$i]=$value;
					$i++;
				}


				
				
				$current_options['blog_heading']=sanitize_text_field($_POST['blog_heading']);
				$current_options['blog_description']=sanitize_text_field($_POST['blog_description']);
				$current_options['post_display_count']=sanitize_text_field($_POST['post_display_count']);
				$current_options['blog_selected_category_id']=$arr;
				//blog enabled setting	
                if(isset($_POST['home_blog_enabled']))
				{ echo $current_options['home_blog_enabled']='on'; 
				} 
                 else 
                { echo $current_options['home_blog_enabled']='off';
                }	
				
				//Meta section Enable or Disable
				if(isset($_POST['home_meta_section_settings']))
				{ echo $current_options['home_meta_section_settings']= "on"; } 
				else { echo $current_options['home_meta_section_settings']="off"; }
				
				
				update_option('appointment_options',$current_options);
			}
		}	
		if($_POST['webriti_settings_save_5'] == 2) 
		{	
			
			$current_options['home_blog_enabled']='on';			
			
			$current_options['blog_heading']= __('Latest News','appointment');
			$current_options['blog_description']= __('Aipsum therefore always','appointment');
			
			$current_options['home_meta_section_settings']= 'on';
			$current_options['post_display_count']=2;
			$current_options['blog_selected_category_id']=array(get_option('default_category'));
			update_option('appointment_options',$current_options);
		}
		
		
		
	}  ?>
	<form method="post" id="webriti_theme_options_5">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Home News Settings','appointment');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_5_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_success" ><?php _e('Options data successfully Saved','appointment');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_5_reset" ><?php _e('Options data successfully reset','appointment');?></div>
				</td>
				<td style="text-align:right;">
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
					<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
				</td>
				</tr>
			</table>	
		</div>	
		
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable News on HOME Section','appointment'); ?></h3>
			<input type="checkbox" <?php if($current_options['home_blog_enabled']=='on') echo "checked='checked'"; ?> id="home_blog_enabled" name="home_blog_enabled" > <span class="explain"><?php _e('Enable News section in front page.','appointment'); ?></span>
			<h3><?php _e('News Heading','appointment'); ?></h3>
			<input class="webriti_inpute" type="text" value="<?php if(isset($current_options['blog_heading'])) { echo $current_options['blog_heading']; } ?>" id="blog_heading" name="blog_heading" size="36" />
			<span class="icons help"><span class="tooltip"><?php  _e('News Section Heading','appointment');?></span></span>
			
			<h3><?php _e('Enter Latest News Description','appointment');?></h3>
			<textarea rows="3" cols="8" id="blog_description" name="blog_description"><?php if($current_options['blog_description']!='') { echo esc_attr($current_options['blog_description']); } ?></textarea>		
			<span class="explain"><?php  _e('Enter Latest News Description.','appointment');?></span>
		
		
		</div>

	<div class="section">
		<h3><?php _e('Number of News on News section','appointment');?></h3>
			<?php $post_display_count = $current_options['post_display_count']; ?>		
			<select name="post_display_count" class="webriti_inpute" >					
				<option value="2" <?php selected($post_display_count, '2' ); ?>>2</option>
				<option value="4" <?php selected($post_display_count, '4' ); ?>>4</option>
				<option value="6" <?php selected($post_display_count, '6' ); ?>>6</option>
				<option value="8" <?php selected($post_display_count, '8' ); ?>>8</option>
				<option value="10" <?php selected($post_display_count, '10' ); ?>>10</option>
				<option value="12" <?php selected($post_display_count, '12' ); ?>>12</option>
				<option value="14" <?php selected($post_display_count, '14' ); ?>>14</option>
				<option value="16" <?php selected($post_display_count, '16' ); ?>>16</option>
			</select>
			<span class="explain"><?php _e('Select number of News','appointment'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Select News Category','appointment'); ?></h3>
			<select multiple id="blog_category" name="blog_selected_category_id[]"  style="height:auto;width:300px;" >
			<?php	
			$val=$current_options['blog_selected_category_id'];
			$cat_list = get_categories();
			foreach($cat_list as $value)
			{
			?>
			<option value="<?php echo $value->term_id; ?>" <?php if(in_array($value->term_id, $val)){ echo 'selected';} ?>  ><?php echo $value->name; ?></option>
			<?php } ?>
			</select>
		</div>
		
		<div class="section">
			<h3><?php _e('Enable Meta on Home page:','appointment'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['home_meta_section_settings']=='on') echo "checked='checked'"; ?> id="home_meta_section_settings" name="home_meta_section_settings" > <span class="explain"><?php _e('Enable Meta On Home page.','appointment'); ?></span>
			</p> <?php _e('If you only want to remove Author, Date and Category from the posts.','appointment'); ?></p>
		</div>
		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_5" name="webriti_settings_save_5" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('5');">
			<input class="button button-primary button-large" type="button" value="Save Options" onclick="webriti_option_data_save('5')" >
		</div>
	</form>
</div>