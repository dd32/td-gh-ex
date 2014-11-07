<div class="block ui-tabs-panel active" id="option-ui-id-1" >
<?php $current_options = get_option('corpbiz_options');
	if(isset($_POST['webriti_settings_save_1']))
	{	
		if($_POST['webriti_settings_save_1'] == 1) 
		{
			if ( empty($_POST) || !wp_verify_nonce($_POST['webriti_gernalsetting_nonce_customization'],'webriti_customization_nonce_gernalsetting') )
			{  print 'Sorry, your nonce did not verify.';	exit; }
			else  
			{	
			$current_options['front_page']=sanitize_text_field(isset($_POST['front_page'])); 
				
				$current_options['upload_image_logo']=sanitize_text_field($_POST['upload_image_logo']);			
				$current_options['height']=sanitize_text_field($_POST['height']);
				$current_options['width']=sanitize_text_field($_POST['width']);
				$current_options['upload_image_favicon']=sanitize_text_field($_POST['upload_image_favicon']);
				$current_options['webrit_custom_css'] =$_POST['webrit_custom_css'];				
				$current_options['text_title']=sanitize_text_field(isset($_POST['text_title']));
				
				
				update_option('corpbiz_options', stripslashes_deep($current_options));
			}
		}	
		if($_POST['webriti_settings_save_1'] == 2) 
		{
			$current_options['front_page'] = "on" ;			
			$current_options['upload_image_logo']="";
			$current_options['height']=50;
			$current_options['width']=100;
			$current_options['upload_image_favicon']="";
			$current_options['text_title']="on";			
			$current_options['webrit_custom_css']="";		
			update_option('corpbiz_options',$current_options);
		}
	}  ?>
	<?php $current_options['front_page']; ?>
	<form method="post" id="webriti_theme_options_1">
		<div id="heading">
			<table style="width:100%;"><tr>
				<td><h2><?php _e('Quick Start Settings','corpbiz');?></h2></td>
				<td style="width:30%;">
					<div class="webriti_settings_loding" id="webriti_loding_1_image"></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_success" ><?php _e('Options data successfully Saved','corpbiz');?></div>
					<div class="webriti_settings_massage" id="webriti_settings_save_1_reset" ><?php _e('Options data successfully reset','corpbiz');?></div>
				</td>
				<td style="text-align:right;">					
					<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
					<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
				</td>
				</tr>
			</table>			
		</div>	
		<?php wp_nonce_field('webriti_customization_nonce_gernalsetting','webriti_gernalsetting_nonce_customization'); ?>
		<div class="section">
			<h3><?php _e('Enable Front Page','corpbiz'); ?>  </h3>
			<input type="checkbox" <?php if($current_options['front_page']=='on') echo "checked='checked'"; ?> id="front_page" name="front_page" > <span class="explain"><?php _e('Enable front page .','corpbiz'); ?></span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Logo','corpbiz'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Add custom logo from here suggested size is 150X50 px','corpbiz');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" id="upload_image_logo" name="upload_image_logo" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Custom Logo" class="upload_image_button" />
			
			<?php if($current_options['upload_image_logo']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php if($current_options['upload_image_logo']!='') { echo esc_attr($current_options['upload_image_logo']); } ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Logo Height','corpbiz'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Height : 50px, if you want to increase than specify your value','corpbiz'); ?></span></span>
			</h3>
			<input class="webriti_inpute"  type="text" name="height" id="height" value="<?php echo $current_options['height']; ?>" >						
		</div>
		<div class="section">
			<h3><?php _e('Logo Width','corpbiz'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Default Logo Width : 150px, if you want to increase than specify your value','corpbiz');?></span></span>
			</h3>
			<input  class="webriti_inpute" type="text" name="width" id="width"  value="<?php echo $current_options['width']; ?>" >			
		</div>
		<div class="section">
			<h3><?php _e('Text Title','corpbiz'); ?></h3>
			<input type="checkbox" <?php if($current_options['text_title']=='on') echo "checked='checked'"; ?> id="text_title" name="text_title" > <span class="explain"><?php _e('Enable text-based Site Title.   Setup title','corpbiz');?> <a href="<?php echo home_url( '/' ); ?>wp-admin/options-general.php"><?php _e('Click Here','corpbiz');?></a>.</span>
		</div>
		<div class="section">
			<h3><?php _e('Custom Favicon','corpbiz'); ?>
				<span class="icons help"><span class="tooltip"><?php  _e('Make sure you upload .icon image type which is not more then 25X25 px.','corpbiz');?></span></span>
			</h3>
			<input class="webriti_inpute" type="text" value="<?php if($current_options['upload_image_favicon']!='') { echo esc_attr($current_options['upload_image_favicon']); } ?>" id="upload_image_favicon" name="upload_image_favicon" size="36" class="upload has-file"/>
			<input type="button" id="upload_button" value="Favicon Icon" class="upload_image_button"  />			
			<?php if($current_options['upload_image_favicon']!='') { ?>
			<p><img style="height:60px;width:100px;" src="<?php  echo esc_attr($current_options['upload_image_favicon']);  ?>" /></p>
			<?php } ?>
		</div>
		<div class="section">
			<h3><?php _e('Custom css','corpbiz'); ?></h3>
			<textarea rows="8" cols="8" id="webrit_custom_css" name="webrit_custom_css"><?php if($current_options['webrit_custom_css']!='') { echo esc_attr($current_options['webrit_custom_css']); } ?></textarea>
			<div class="explain"><?php _e('This is a powerful feature provided here. No need to use custom css plugin, just paste your css code and see the magic.','corpbiz'); ?><br></div>
		</div>		
		<div id="button_section">
			<input type="hidden" value="1" id="webriti_settings_save_1" name="webriti_settings_save_1" />
			<input class="reset-button btn" type="button" name="reset" value="Restore Defaults" onclick="webriti_option_data_reset('1');">
			<input class="btn btn-primary" type="button" value="Save Options" onclick="webriti_option_data_save('1')" >
			<!--  alert massage when data saved and reset -->
		</div>
	</form>	
</div>