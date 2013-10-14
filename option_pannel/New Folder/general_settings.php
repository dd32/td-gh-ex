<?php  $action='';

$current_options = get_option( 'spa_theme_options' );

if(isset($_GET['action'])){
/* below code show functionality of remove image in custom logo (media upload) */
$action = $_GET['action'];
}


if(isset($_POST['spa_settings_save']))
{

if($_POST['spa_settings_save'] == 1) 
{

if ( empty($_POST) || !wp_verify_nonce($_POST['spa_gernalsetting_nonce_customization'],'spa_customization_nonce_gernalsetting') )
		{
   			print 'Sorry, your nonce did not verify.';
   			exit;
		}
	
	else  
	{
          	 //echo $page; 
			$current_options['spa_Site_Title']['site_title_px']=sanitize_text_field($_POST['site_title_px']);
			$current_options['spa_Site_Title']['color_title']=sanitize_text_field($_POST['color_title']);
			$current_options['spa_Site_Title']['font_family']=sanitize_text_field($_POST['font_family']);
			$current_options['spa_Site_Title']['font_style']=sanitize_text_field($_POST['font_style']);
			$current_options['checkbox_title']=sanitize_text_field($_POST['checkbox_title']);
			$current_options['contactus_title']=sanitize_text_field($_POST['contactus_title']);
			$current_options['contactus_description']=sanitize_text_field($_POST['contactus_description']);
			$current_options['upload_image']=sanitize_text_field($_POST['upload_image']);
		    $current_options['height']=sanitize_text_field($_POST['height']);
		    $current_options['width']=sanitize_text_field($_POST['width']);
			$current_options['upload_image_favicon']=sanitize_text_field($_POST['upload_image_favicon']);
			$current_options['posts_per_page']=sanitize_text_field($_POST['posts_per_page']);
	         $current_options['map']=sanitize_text_field($_POST['map']);
		
			update_option('spa_theme_options' , $current_options);
								  

		}

	
}
}
?>

<div class="block ui-tabs-panel ui-widget-content ui-corner-bottom" id="option_general" aria-labelledby="ui-id-1" role="tabpanel" aria-expanded="true" aria-hidden="false">
<form method="post" action = ""  id="spa_general_setting">
<?php wp_nonce_field('spa_customization_nonce_gernalsetting','spa_gernalsetting_nonce_customization'); ?>

<div class="option option-upload">
<span class="option_tab_title"><?php _e('General Settings','sis_spa');?></span>
    <h3><?php _e('Custom Logo','sis_spa');?></h3>
    
    <div class="section">
	  
        <div class="element">
		      <input type="text" value="<?php if($current_options['upload_image']!='') { echo esc_attr($current_options['upload_image']); } ?>" id="upload_image1" name="upload_image" size="36" />
               <input type="button" id="upload_button" value="Custom Logo" class="upload_image_button" class="upload_button" /><br>
            <?php if($current_options['upload_image']!=''){ ?>
			<img  src="<?php echo $current_options['upload_image'];?>" height="60px" width="250px" />

			<?php  } ?>
           </div>
        <div class="description">
          <?php  _e('The placeholder image that will be used as a custom logo','sis_spa');?> </div>
    </div>
</div>

<div class="option option-input">
    <h3><?php _e('Header Logo Height','sis_spa');?></h3>

    <div class="section">
        <div class="element">
            <input type="text" value="<?php if($current_options['height']!='') { echo esc_attr($current_options['height']); } ?>" id="height" name="height" class="" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
        </div>
        <div class="description">
           <?php _e('The width of the header logo image.','sis_spa'); ?>
		   </div>
    </div>
</div>

<div class="option option-input">
    <h3><?php _e('Header Logo width','sis_spa');?></h3>

    <div class="section">
        <div class="element">
            <input type="text" value="<?php if($current_options['width']!='') { echo esc_attr($current_options['width']); } ?>" id="width" name="width" onkeyup="this.value=this.value.replace(/\D/g,'')"/>
        </div>
        <div class="description">
            <?php _e('The width of the header logo image.','sis_spa'); ?>       </div>
    </div>
</div>

<div class="option option-upload">
    <h3><?php _e('Custom Favicon','sis_spa'); ?></h3>
         															
    <div class="section">
        <div class="element">
            <input type="text" value="<?php if($current_options['upload_image_favicon']!='') { echo esc_attr($current_options['upload_image_favicon']); } ?>" name="upload_image_favicon" size="36" class="upload has-file"/>
               <input type="button" value="Custom Logo" class="upload_image_button" id="upload_button"><br>
           </div>
        <div class="description">
          <?php _e('The placeholder image that will be used if a featured image isnt specified.','sis_spa')?> </div>
    </div>
</div>


             
<input type="hidden" value="1" id="spa_settings_save" name="spa_settings_save" />

<input type="button" class="button-framework save-options"  value= "<?php _e('Save Changes', 'sis_spa');?>" onclick="datasave_generalsetting()"/>									
<input type="button" class="button-framework reset"  value="<?php _e('Restore Defaults','sis_spa');?>" onclick="reset_data_generalsetting()" />
			  
           

          <div id="success_message_reset_general" ><?php _e('Data reset sucessfully','sis_spa');?></div>
		<div id="success_message_save_general" ><?php _e('Data save sucessfully','sis_spa');?></div>
 </form>



</div>		
		



