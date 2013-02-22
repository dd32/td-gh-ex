<?php



// Default options values

$bartleby_options = array(

	'home_headline' => '',

	'facebook_link' => '',

	'twitter_link' => '',

	'gplus_link' => '',

	'linkedin_link' => '',

	'github_link' => '',

	'pinterest_link' => '',

	'feed_link' => '',

	'social_bar' => true,

	'bartleby_logo' => ''

);



if ( is_admin() ) : // Load only if we are viewing an admin page



function bartleby_register_settings() {

	// Register settings and call sanitation functions

	register_setting( 'bartleby_theme_options', 'bartleby_options', 'bartleby_validate_options' );

}



add_action( 'admin_init', 'bartleby_register_settings' );



function bartleby_theme_options() {

	// Add theme options page to the addmin menu

	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'bartleby_theme_options_page' );

}



add_action( 'admin_menu', 'bartleby_theme_options' );



// Function to generate options page

function bartleby_theme_options_page() {

	global $bartleby_options, $bartleby_categories, $bartleby_layouts;



	if ( ! isset( $_REQUEST['updated'] ) )

		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>



	<div class="wrap">



	<?php screen_icon(); echo "<h2>" . __( ' Theme Options' , 'bartleby' ) . "</h2>";

	// This shows the page's name and an icon if one has been provided ?>



	<?php if ( false !== $_REQUEST['updated'] ) : ?>

	<div class="updated fade"><p><strong><?php _e( 'Options saved' , 'bartleby' ); ?></strong></p></div>

	<?php endif; // If the form has just been submitted, this shows the notification ?>



	<form method="post" action="options.php">



	<?php $settings = get_option( 'bartleby_options', $bartleby_options ); ?>

	

	<?php settings_fields( 'bartleby_theme_options' );

	/* This function outputs some hidden fields required by the form,

	including a nonce, a unique number used to ensure the form has been submitted from the admin page

	and not somewhere else, very important for security */ ?>



<table class="form-table">



<h3><?php esc_attr_e('Site Logo' , 'bartleby' ); ?></h3>



	<p><?php esc_attr_e('Enter the URL for your custom logo here. Use the WordPress media upload tool to upload the logo. PNGs with transparent or white backgrounds work best.' , 'bartleby'); ?></p>



	<tr valign="top"><th scope="row"><label for="home_headline">Custom Logo</label></th>



	<td>



<input id="bartleby_logo" name="bartleby_options[bartleby_logo]" type="url" size="60" value="<?php echo($settings['bartleby_logo']); ?>" />



<label class="description" for="bartleby_options[bartleby_logo]"><?php esc_attr_e( 'Leave blank to use the site title', 'devolution' ); ?></label>



	</td>



	</tr>



</table>


<table class="form-table">

<h3><?php esc_attr_e('Home Page Headline' , 'bartleby' ); ?></h3>

	<p><?php esc_attr_e('This headline will be displayed above the slider on the home page.' , 'bartleby'); ?></p>



	<tr valign="top"><th scope="row"><label for="home_headline">Home Page Headline</label></th>

	<td>

	<input id="home_headline" name="bartleby_options[home_headline]" type="text" size="40" value="<?php echo($settings['home_headline']); ?>" />

	<label class="description" for="bartleby_options[home_headline]"><?php esc_attr_e( 'Leave blank to disable', 'bartleby' ); ?></label>

	</td>

	</tr>

</table>



	<table class="form-table">



	<h3><?php esc_attr_e('Social Media Bar Settings' , 'bartleby' ); ?></h3>

	<p><?php esc_attr_e('Disable the bar if desired, or add your custom profile/page links.' , 'bartleby'); ?></p>



	<tr valign="top"><th scope="row">Social Media Bar</th>

	<td>

	<input type="checkbox" id="social_bar" name="bartleby_options[social_bar]" value="1" <?php checked( true, $settings['social_bar'] ); ?> />

	<label for="social_bar">Uncheck to disable the social media bar. Leave URL fields blank to disable specific icons.</label>

	</td>

	</tr>



	<tr valign="top"><th scope="row"><label for="facebook_link">Facebook URL</label></th>

	<td>

	<input id="facebook_link" name="bartleby_options[facebook_link]" type="url" size="60" value="<?php echo($settings['facebook_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="twitter_link">Twitter URL</label></th>

	<td>

	<input id="twitter_link" name="bartleby_options[twitter_link]" type="url" size="60" value="<?php echo($settings['twitter_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="gplus_link">Google+ URL</label></th>

	<td>

	<input id="gplus_link" name="bartleby_options[gplus_link]" type="url" size="60" value="<?php echo($settings['gplus_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="linkedin_link">LinkedIn URL</label></th>

	<td>

	<input id="linkedin_link" name="bartleby_options[linkedin_link]" type="url" size="60" value="<?php echo($settings['linkedin_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="Github URL">Github URL</label></th>

	<td>

	<input id="github_link" name="bartleby_options[github_link]" type="url" size="60" value="<?php echo($settings['github_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="Pinterest URL">Pinterest URL</label></th>

	<td>

	<input id="pinterest_link" name="bartleby_options[pinterest_link]" type="url" size="60" value="<?php echo($settings['pinterest_link']); ?>" />

	</td>

	</tr>



<tr valign="top"><th scope="row"><label for="RSS Feed URL">RSS Feed URL</label></th>

	<td>

	<input id="feed_link" name="bartleby_options[feed_link]" type="url" size="60" value="<?php echo($settings['feed_link']); ?>" />

	</td>

	</tr>

	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>



	</form>

<p>

<?php esc_attr_e('Thank you for using . A lot of time went into development. Donations small or large always appreciated.' , 'bartleby'); ?></p>

<form action="https://www.paypal.com/cgi-bin/webscr" target="_blank" method="post">

<input type="hidden" name="cmd" value="_s-xclick">

<input type="hidden" name="hosted_button_id" value="G57DBCVACUPA6">

<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">

<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">

</form>

<a href="http://www.cardiganmedia.com/themes/bartleby/" target="_blank"><?php esc_attr_e(' Documentation' , 'bartleby' ); ?></a>



	</div>



	<?php

}



function bartleby_validate_options( $input ) {

	global $bartleby_options;

	$settings = get_option( 'bartleby_options', $bartleby_options );

	$input['home_headline'] = esc_attr( $input['home_headline'] );

	$input['facebook_link'] = esc_url( $input['facebook_link'] );

	$input['twitter_link'] = esc_url( $input['twitter_link'] );

	$input['gplus_link'] = esc_url( $input['gplus_link'] );

	$input['linkedin_link'] = esc_url( $input['linkedin_link'] );

	$input['github_link'] = esc_url( $input['github_link'] );

	$input['pinterest_link'] = esc_url( $input['pinterest_link'] );

	$input['feed_link'] = esc_url( $input['feed_link'] );

	if ( ! isset( $input['social_bar'] ) )

		$input['social_bar'] = null;

	$input['social_bar'] = ( $input['social_bar'] == 1 ? 1 : 0 );

	return $input;

}



endif;  // EndIf is_admin()