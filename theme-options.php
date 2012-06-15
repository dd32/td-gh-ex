<?php 
//theme-options.php
//This is the Theme Options page in the WordPress admin area. It is meant to be included by functions.php
	
//================================================================================================================

//Handle $_POST data after the form was saved

	//Kick the user out if he doesn't have the right permissions
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.','appliance') );
	}
	else{
		//If POST data was submitted, begin saving the options
			if ( isset($_POST['saved']) ){
			//Echo a confirmation message
				echo('<div class="updated"><p><strong>'. __('Your theme settings were saved.', 'appliance' ) .'</strong></p></div>');
			
			//Save the theme options
						
				//Loop through the $_POST checkboxes and set the corresponding wordpress options to true if they are checked
				//This method is more compact than using if/else for each method
					$fields = array(
						'appliance_hide_admin_bar',
						'appliance_hide_admin_bar_logo',
						'appliance_hide_posts_menu',
						'appliance_hide_pages_menu',
						'appliance_hide_media_menu',
						'appliance_hide_links_menu',
						'appliance_hide_comments_menu',
						'appliance_hide_profile_menu',
						'appliance_hide_tools_menu',
						'appliance_hide_comments_disabled',
						'appliance_use_human_readable_dates',
						'appliance_use_dynamic_descriptions',
						'appliance_use_dynamic_suffixes',
						'appliance_hide_attachment_link',
						'appliance_hide_attachment_description',
						'appliance_hide_attachment_caption',
						'appliance_hide_attachment_library'
						);
					//Loop through the checkboxes and save their value
						foreach($fields as $field) {
							update_option($field, isset($_POST[$field]));
						}

						
				//The dynamic suffixes to use
					if ( isset($_POST['appliance_dynamic_suffixes'] ))
						update_option('appliance_dynamic_suffixes',explode("\n", $_POST['appliance_dynamic_suffixes'])); //Split the suffixes into an array, and store it
			}
	}
?>
<div class="wrap">
	<div id="icon-themes" class="icon32"><br/></div><h2><?php _e('Theme options','appliance')?></h2>
	<form name="form1" method="post" action="">
		<table class="form-table">
			<tbody>
				<p>
					<?php _e(
						'Use this page to customize this theme. If you want to use WordPress\' default behavior, leave the boxes unchecked.',
						'appliance'
					)?>
				</p>								

				
				<tr valign="top">
					<td colspan="2">
						<h3><?php _e('Dynamic meta description','appliance')?></h3>
						<p>
							<?php _e(
								'If enabled, the meta description tag will be the post/page description, the excerpt or the blog description, in that order.',
								'appliance'
							)?>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_dynamic_descriptions"><?php _e("Use dynamic meta descriptions", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_dynamic_descriptions" name="appliance_use_dynamic_descriptions" <?php echo(get_option('appliance_use_dynamic_descriptions',false)==true?'checked':'')?>/>
					</td>
				</tr>
				
				<tr valign="top">
					<td colspan="2">
						<h3><?php _e('Human-readable dates','appliance')?></h3>
						<p>
							<?php _e(
								'If enabled, the date will be displayed as 25 days ago.',
								'appliance'
							)?>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_human_dates"><?php _e("Use human-readable dates", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_human_dates" name="appliance_use_human_readable_dates" <?php echo(get_option('appliance_use_human_readable_dates',false)==true?'checked':'')?>/>
					</td>
				</tr>
				
				<tr valign="top">
					<td colspan="2">
						<h3><?php _e('User menus','appliance')?></h3>
						<p>
							<?php _e(
								'You can disable Admin area menus for users that don\'t have administrator privileges to ensure your clients a more streamlined experience.',
								'appliance'
							)?>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_top_bar"><?php _e("Hide the admin top bar on the site", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_top_bar" name="appliance_hide_admin_bar" <?php echo(get_option('appliance_hide_admin_bar',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_top_bar_logo"><?php _e("Remove the logo from the top admin bar", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_top_bar_logo" name="appliance_hide_admin_bar_logo" <?php echo(get_option('appliance_hide_admin_bar_logo',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_posts_menu"><?php _e("Hide Posts menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_posts_menu" name="appliance_hide_posts_menu" <?php echo(get_option('appliance_hide_posts_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_pages_menu"><?php _e("Hide Pages menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_pages_menu" name="appliance_hide_pages_menu" <?php echo(get_option('appliance_hide_pages_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_comments_menu"><?php _e("Hide Comments menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_comments_menu" name="appliance_hide_comments_menu" <?php echo(get_option('appliance_hide_comments_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_media_menu"><?php _e("Hide Media menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_media_menu" name="appliance_hide_media_menu" <?php echo(get_option('appliance_hide_media_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_links_menu"><?php _e("Hide Links menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_links_menu" name="appliance_hide_links_menu" <?php echo(get_option('appliance_hide_links_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_profile_menu"><?php _e("Hide Profile menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_profile_menu" name="appliance_hide_profile_menu" <?php echo(get_option('appliance_hide_profile_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_tools_menu"><?php _e("Hide Tools menu", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_tools_menu" name="appliance_hide_tools_menu" <?php echo(get_option('appliance_hide_tools_menu',false)==true?'checked':'')?>/>
					</td>
				</tr>
				
				<tr valign="top">
					<td colspan="2">
						<h3><?php _e('File uploads','appliance')?></h3>
						<p>
							<?php _e(
								'Check these boxes to hide fields and tabs for file attachments. Less clutter means a more streamlined experience for clients. These settings only apply to non-admins.',
								'appliance'
							)?>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_attachment_library"><?php _e("Hide the Media Library tab", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_attachment_library" name="appliance_hide_attachment_library" <?php echo(get_option('appliance_hide_attachment_library',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_attachment_caption"><?php _e("Hide the caption field", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_attachment_caption" name="appliance_hide_attachment_caption" <?php echo(get_option('appliance_hide_attachment_caption',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_attachment_description"><?php _e("Hide the description field", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_attachment_description" name="appliance_hide_attachment_description" <?php echo(get_option('appliance_hide_attachment_description',false)==true?'checked':'')?>/>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_attachment_link"><?php _e("Hide the URL field", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_attachment_link" name="appliance_hide_attachment_link" <?php echo(get_option('appliance_hide_attachment_link',false)==true?'checked':'')?>/>
					</td>
				</tr>
				
			
				
				<tr valign="top">
					<td colspan="2">
						<h3><?php _e('"Comments disabled" message','appliance')?></h3>
						<p>
							<?php _e(
								'You can hide the "Comments are disabled for this post" message at the bottom of posts by checking this option.',
								'appliance'
							)?>
						</p>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">
						<label for="chk_hide_comments_disabled"><?php _e("Hide the \"Comments disabled\" message", 'appliance' )?></label>
					</th>
					<td>
						<input type="checkbox" id="chk_hide_comments_disabled" name="appliance_hide_comments_disabled" <?php echo(get_option('appliance_hide_comments_disabled',false)==true?'checked':'')?>/>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input type="hidden" name="saved" value="true"/>
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e("Save Changes")?>" />
		</p>
	</form>
</div>