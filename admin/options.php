<?php
/**
 * This function generates the theme's option page in Wordpress administration.
*/
function graphene_options(){

	// Initialise messages array
	$errors = array();
	$messages = array();
	
	// Updates the database
	if (isset($_POST['graphene_submitted']) && $_POST['graphene_submitted'] == true) {
		
		// Process the adsense options
		if (!empty($_POST['show_adsense'])) {
			if (!empty($_POST['adsense_code'])) {
				$show_adsense = $_POST['show_adsense'];
			} else {
				if (empty($_POST['adsense_code']))
					$errors[] = "You must enter your Adsense code to enable Adsense advertising";
				$show_adsense = false;
			}
		} else {
			$show_adsense = false;
		}
		$adsense_code = $_POST['adsense_code'];
		
		// Process the AddThis options
		if (!empty($_POST['show_addthis'])) {
			if (!empty($_POST['addthis_code'])) {
				$show_addthis = $_POST['show_addthis'];
			} else {
				if (empty($_POST['addthis_code']))
					$errors[] = "You must enter your AddThis Publisher's ID to enable the AddThis social sharing button";
				$show_addthis = false;
			}
		} else {
			$show_addthis = false;
		}
		$addthis_code = html_entity_decode($_POST['addthis_code']);
		
		// Process the Google Analytics options
		if (!empty($_POST['show_ga'])) {
			if (!empty($_POST['ga_code'])) {
				$show_ga = $_POST['show_ga'];
			} else {
				if (empty($_POST['ga_code']))
					$errors[] = "You must enter your Google Analytics tracking code to enable Google Analytics tracking.";
				$show_ga = false;
			}
		} else {
			$show_ga = false;
		}
		$ga_code = html_entity_decode($_POST['ga_code']);
		
		
		// Process the Footer options
		if (!empty($_POST['show_cc'])){
			$show_cc = $_POST['show_cc'];
		} else {
			$show_cc = false;	
		}
		$copy_text = $_POST['copy_text'];
		
		
		// Updates all options
		if (empty($errors)) {
			
			// AdSense options
			update_option('graphene_show_adsense', $show_adsense);
			update_option('graphene_adsense_code', $adsense_code);
			
			// AddThis options
			update_option('graphene_show_addthis', $show_addthis);
			update_option('graphene_addthis_code', $addthis_code);
			
			// Google Analytics options
			update_option('graphene_show_ga', $show_ga);
			update_option('graphene_ga_code', $ga_code);
			
			// Footer options
			update_option('graphene_show_cc', $show_cc);
			update_option('graphene_copy_text', $copy_text);
			
			
			// Print successful message
			$messages[] = 'Settings updated.';
		}
	}
	
	// Uninstall the theme and remove all theme options from the database
	if (isset($_POST['graphene_uninstall'])) {
		include('uninstall.php');
		}
	
	// Get the current options from database
	$show_adsense = get_option('graphene_show_adsense');
	$adsense_code = get_option('graphene_adsense_code');
	
	$show_addthis = get_option('graphene_show_addthis');
	$addthis_code = get_option('graphene_addthis_code');
	
	$show_ga = get_option('graphene_show_ga');
	$ga_code = get_option('graphene_ga_code');
	
	$show_cc = get_option('graphene_show_cc');
	$copy_text = get_option('graphene_copy_text');

	?>
    
    
    
    <?php 
		/**
		 * The main option page display is defined here.
		 * This determines how the option page is displayed in the Wordpress admin,
		 * including all the form inputs and messages
		*/
	?>
	<div class="wrap">
		<h2><?php _e('Graphene Theme Options', 'graphene'); ?></h2>
		<?php 
			// Display errors if exist
			if (!empty($errors)) {
				echo '<div class="error">';
				foreach ($errors as $error) : ?>
					<p><strong>ERROR: </strong><?php echo $error; ?></p>
				<?php endforeach;
				echo '</div>';
			}
		?>
		
		<?php 
			// Display other messages if exist
			if (!empty($messages)) {
				echo '<div id="message" class="updated fade">';
				foreach ($messages as $message) : ?>
					<p><?php echo $message; ?></p>
				<?php endforeach;
				echo '</div>';
			}
		?>
        
        
        <?php /* AdSense Options */ ?>
        <h3><?php _e('Adsense Options', 'graphene'); ?></h3>
        
        <?php // Begins the main html form. Note that one html form is used for *all* options ?>
        <form action="" method="post">
            <table class="form-table">
                <tr>
                    <th scope="row" style="width:260px;">
                    	<label><?php _e('Show Adsense advertising', 'graphene'); ?></label>
                    </th>
                    <td><input type="checkbox" name="show_adsense" <?php if ($show_adsense == true) echo 'checked="checked"' ?> value="true" /></td>
                </tr>
                <tr>
                    <th scope="row">
                    	<label><?php _e("Your Adsense code", 'graphene'); ?></label>
                    </th>
                    <td><textarea name="adsense_code" cols="60" rows="7"><?php echo htmlentities(stripslashes($adsense_code)); ?></textarea></td>
                </tr>
            </table>
        
        
                
        <?php /* AddThis Options */ ?>
        <h3><?php _e('AddThis Options', 'graphene'); ?></h3> 
        <table class="form-table">       	
            <tr>
                <th scope="row" style="width:260px;"><label><?php _e('Show AddThis social sharing button', 'graphene'); ?></label></th>
                <td><input type="checkbox" name="show_addthis" <?php if ($show_addthis == true) echo 'checked="checked"' ?> value="true" /></td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e("Your AddThis button code", 'graphene'); ?></label></th>
                <td><textarea name="addthis_code" cols="60" rows="7"><?php echo htmlentities(stripslashes($addthis_code)); ?></textarea></td>
            </tr>
        </table>
        
        
        <?php /* Google Analytics Options */ ?>
        <h3><?php _e('Google Analytics Options', 'graphene'); ?></h3> 
        <table class="form-table">       	
            <tr>
                <th scope="row" style="width:260px;"><label><?php _e('Enable Google Analytics tracking', 'graphene'); ?></label></th>
                <td><input type="checkbox" name="show_ga" <?php if ($show_ga == true) echo 'checked="checked"' ?> value="true" /></td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e("Google Analytics tracking code", 'graphene'); ?></label></th>
                <td><textarea name="ga_code" cols="60" rows="7"><?php echo htmlentities(stripslashes($ga_code)); ?></textarea></td>
            </tr>
        </table>
        
        
        <?php /* Footer Options */ ?>
        <h3><?php _e('Footer Options', 'graphene'); ?></h3> 
        <table class="form-table">       	
            <tr>
                <th scope="row" style="width:260px;"><label><?php _e('Show Creative Commons logo', 'graphene'); ?></label><br />
                <img src="http://i.creativecommons.org/l/by-nc-nd/2.5/my/88x31.png" alt="" /></th>
                <td><input type="checkbox" name="show_cc" <?php if ($show_cc == true) echo 'checked="checked"' ?> value="true" /></td>
            </tr>
            <tr>
                <th scope="row"><label><?php _e("Copyright text (html allowed)", 'graphene'); ?></label>
                <br /><small><?php _e('If this field is empty, the following default copyright text will be displayed:', 'graphene'); ?></small>
                <p style="background-color:#fff;padding:5px;border:1px solid #ddd;"><small><?php _e('Except where otherwise noted, content on this site is licensed under a <a href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Licence</a>.','graphene'); ?></small></p>
                </th>
                <td><textarea name="copy_text" cols="60" rows="7"><?php echo stripslashes($copy_text); ?></textarea></td>
            </tr>
        </table>
        
        
            <?php /* Ends the main form */ ?>
            <input type="hidden" name="graphene_submitted" value="true" />
            <input type="submit" class="button-primary" value="<?php _e('Update Settings', 'graphene'); ?>" style="margin-top:20px;" />
        </form>
        
        
        
        <?php /* PayPal's donation button */ ?>
        <h2 style="margin-top:50px;"><?php _e('Support the developer', 'graphene'); ?></h2>
        <p><?php _e('Developing this awesome theme took a lot of effort and time, weeks and weeks of voluntary unpaid work. If you like this theme or if you are using it for commercial websites, please consider a donation to the developer to help support future updates and development.', 'graphene'); ?></p>
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="SJRVDSEJF6VPU" />
            <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" />
            <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
        </form>
        
        
        <?php /* Theme's uninstall */ ?>
        <h2 style="margin-top:20px;"><?php _e('Uninstall theme', 'graphene'); ?></h2>
        	<p><?php _e("<strong>Be careful!</strong> Uninstalling the theme will remove all of the theme's options from the database. Do this only if you decide not to use the theme anymore.",'graphene'); ?></p>
            <p><?php _e('If you just want to try another theme, there is no need to uninstall this theme. Simply activate the other theme in the Appearance > Themes admin page.','graphene'); ?></p>
            <p><?php _e("Note that uninstalling this theme <strong>does not remove</strong> the theme's files. To delete the files after you have uninstalled this theme, go to Appearances > Themes and delete the theme from there.",'graphene'); ?></p>
            <form action="" method="post">
                <input type="hidden" name="graphene_uninstall" value="true" />
                <input type="submit" class="button" value="<?php _e('Uninstall Theme', 'graphene'); ?>" style="text-shadow:0 -1px 0 rgba(0, 0, 0, 0.3);margin-bottom:50px;background:#ff0000;color:#fff;border-color:#aa0000;font-weight:bold;" />
            </form>
    </div>
    
<?php } // Closes the graphene_options() function definition ?>